<?php
namespace App\Http\Controllers;

use App\Models\{Advertisement, Developer, Property, Testimonial};

class HomeController extends Controller {
    public function index() {
        // ... (kode sebelumnya) ...

        $recommended = Property::published()
            ->recommended()
            ->with(['primaryImage', 'agent.areas', 'area', 'type'])
            ->latest('published_at')
            ->take(3) // <-- Ubah jadi 3
            ->get();

        $popular = Property::published()
            ->with(['primaryImage', 'agent.areas', 'area', 'type'])
            ->orderByDesc('view_count')
            ->latest('published_at')
            ->take(3) // <-- Ubah jadi 3
            ->get();

        $latest = Property::published()
            ->with(['primaryImage', 'agent.areas', 'area', 'type'])
            ->latest('published_at')
            ->take(3) // <-- Ubah jadi 3
            ->get();

        // ... (kode selanjutnya) ...

        $testimonials = Testimonial::active()->orderBy('order')->take(8)->get();
        $developers = Developer::active()->orderBy('order')->get();
        $banner = Advertisement::active()->position('home-banner')->first();

        return view('welcome', compact(
            'recommended', 'popular', 'latest',
            'testimonials', 'developers', 'banner'
        ));
    }
}
