<?php

namespace App\Http\Controllers;

use App\Models\{Area, Bank, Facility, Property, PropertyType};
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        // 1. Deteksi tab aktif dari nama route
        $activeTab = 'all';
        $routeName = $request->route()->getName();

        if ($routeName === 'properties.sale') {
            $activeTab = 'sale';
        } elseif ($routeName === 'properties.rent') {
            $activeTab = 'rent';
        } elseif ($routeName === 'kpr.index') {
            $activeTab = 'kpr';
        }

        // 2. Query dasar
        $query = Property::published()
            ->with(['primaryImage', 'agent.areas', 'area', 'type']);

        // 3. Filter Tab
        if ($activeTab === 'sale') {
            $query->where('listing_type', 'sale');
        } elseif ($activeTab === 'rent') {
            $query->where('listing_type', 'rent');
        } elseif ($activeTab === 'kpr') {
            $query->where('is_kpr_eligible', true);
        }

        // 4. Filter Search (dari URL)
        if ($request->filled('q')) {
            $q = trim($request->q);
            if ($q !== '') {
                $query->where(function ($w) use ($q) {
                    $w->where('title', 'like', "%{$q}%")
                      ->orWhere('address', 'like', "%{$q}%");
                });
            }
        }

        if ($request->filled('area')) {
            $query->where('area_id', $request->area);
        }

        if ($request->filled('type')) {
            $query->where('property_type_id', $request->type);
        }

        // Filter Kamar Tidur
        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', '>=', $request->bedrooms);
        }

        // Filter Kamar Mandi
        if ($request->filled('bathrooms')) {
            $query->where('bathrooms', '>=', $request->bathrooms);
        }

        // Filter Harga Min & Max
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Filter Sertifikat
        if ($request->filled('certificate')) {
            $query->where('certificate', $request->certificate);
        }

        // Filter Bisa KPR (Jika dicentang)
        if ($request->boolean('is_kpr_eligible')) {
            $query->where('is_kpr_eligible', true);
        }

        // Filter Fasilitas (Multi-select checkbox)
        if ($request->filled('facilities') && is_array($request->facilities)) {
            foreach ($request->facilities as $facilityId) {
                $query->whereHas('facilities', function($q) use ($facilityId) {
                    $q->where('facilities.id', $facilityId);
                });
            }
        }

        // [DIPERBAIKI] Filter Berdasarkan Area Peta (Bounding Box)
        // Dipindahkan ke atas sebelum return view agar berfungsi
        if ($request->filled('north') && $request->filled('south') && $request->filled('east') && $request->filled('west')) {
            $query->whereBetween('latitude', [$request->south, $request->north])
                  ->whereBetween('longitude', [$request->west, $request->east]);
        }

        // 5. Sorting
        $sort = $request->get('sort', 'latest');
        match ($sort) {
            'price_asc'  => $query->orderBy('price', 'asc'),
            'price_desc' => $query->orderBy('price', 'desc'),
            'popular'    => $query->orderByDesc('view_count'),
            default      => $query->latest('published_at'),
        };

        // 6. Pagination & ambil data
        $properties = $query->paginate(12)->withQueryString();

        // 7. Data master untuk dropdown filter
        $areas = Area::where('type', 'district')
            ->where('is_active', true)
            ->orderBy('name')
            ->get();

        $types = PropertyType::where('is_active', true)
            ->orderBy('order')
            ->get();

        // Ambil data Fasilitas untuk filter di View
        $facilities = Facility::where('is_active', true)->get();

        // 8. Kirim ke view
        return view('properties.index', compact(
            'properties', 'areas', 'types', 'facilities', 'activeTab', 'sort'
        ));
    }

    /**
     * Menampilkan Halaman Detail Properti
     */
    public function show($slug)
    {
        // Ambil properti berdasarkan slug beserta relasinya
        $property = Property::where('slug', $slug)
            ->with(['images', 'primaryImage', 'agent.areas', 'area', 'type', 'facilities'])
            ->firstOrFail();

        // Tambah view count
        $property->increment('view_count');

        // Ambil data bank untuk simulasi KPR
        $banks = Bank::where('is_active', true)->get();

        // Hitung estimasi cicilan tiap bank (asumsi DP minimal & tenor maksimal)
        foreach ($banks as $bank) {
            $dp = $property->price * ($bank->min_dp_percent / 100);
            $bank->estimated_dp = $dp;
            $bank->estimated_installment = $bank->calculateInstallment($property->price, $dp, $bank->max_tenor);
        }

        // Ambil 3 properti serupa (berdasarkan tipe)
        $similarProperties = Property::published()
            ->where('property_type_id', $property->property_type_id)
            ->where('id', '!=', $property->id)
            ->take(3)
            ->get();

        return view('properties.show', compact('property', 'banks', 'similarProperties'));
    }
}
