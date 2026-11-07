<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Agent, Inquiry, KprApplication, Property, PropertySubmission};
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Utama
        $stats = [
            'properties_total'     => Property::count(),
            'properties_published' => Property::where('status', 'published')->count(),
            'properties_draft'     => Property::where('status', 'draft')->count(),
            'agents_total'         => Agent::where('status', 'active')->count(),
            'submissions_pending'  => PropertySubmission::where('status', 'pending')->count(),
            'inquiries_new'        => Inquiry::where('status', 'new')->count(),
            'kpr_pending'          => KprApplication::where('status', 'submitted')->count(),
        ];

        // 5 Submission terbaru
        $recentSubmissions = PropertySubmission::with('agent')
            ->latest()
            ->take(5)
            ->get();

        // 5 Properti terbaru
        $recentProperties = Property::with(['area', 'type', 'primaryImage'])
            ->latest()
            ->take(5)
            ->get();

        // Statistik Per Bulan (6 bulan terakhir) — untuk chart
        $monthlyProperties = Property::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('COUNT(*) as total')
            )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        // Distribusi per Tipe Properti
        $propertiesByType = Property::select('property_type_id', DB::raw('COUNT(*) as total'))
            ->with('type')
            ->groupBy('property_type_id')
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentSubmissions',
            'recentProperties',
            'monthlyProperties',
            'propertiesByType'
        ));
    }
}
