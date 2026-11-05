<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Area;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    public function index(Request $request)
    {
        // Query dasar: Hanya agen yang statusnya 'active'
        $query = Agent::where('status', 'active')->with(['areas']);

        // Filter Pencarian Nama
        if ($request->filled('q')) {
            $q = trim($request->q);
            $query->where('name', 'like', "%{$q}%");
        }

        // Filter Berdasarkan Area (Kecamatan)
        if ($request->filled('area')) {
            $areaId = $request->area;
            $query->whereHas('areas', function($q) use ($areaId) {
                $q->where('areas.id', $areaId);
            });
        }

        // Urutkan berdasarkan yang paling lama / urutan kustom
        $agents = $query->orderBy('order', 'asc')->paginate(12)->withQueryString();

        // Ambil data area untuk dropdown filter
        $areas = Area::where('type', 'district')->orderBy('name')->get();

        return view('agents.index', compact('agents', 'areas'));
    }
}
