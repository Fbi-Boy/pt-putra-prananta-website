<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    public function comingSoon($slug = 'Halaman Ini')
    {
        $pageName = ucwords(str_replace('-', ' ', $slug));
        return view('coming-soon', compact('pageName'));
    }

    public function faq()
    {
        return view('static.faq');
    }

    /**
     * Pusat Bantuan
     * URL: /pusat-bantuan
     */
    public function helpCenter()
    {
        return view('static.help-center');
    }

    /**
     * Hubungi Kami
     * URL: /hubungi-kami
     */
    public function contact()
    {
        return view('static.contact');
    }
}
