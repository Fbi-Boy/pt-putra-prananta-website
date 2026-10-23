<?php

namespace App\Http\Controllers;

use App\Models\{Area, Property, PropertyType};
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
        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', '>=', $request->bedrooms);
        }
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
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

        return view('properties.index', compact(
            'properties', 'areas', 'types', 'activeTab', 'sort'
        ));
    }
}
