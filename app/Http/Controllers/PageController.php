<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    // Menampilkan halaman Coming Soon dengan parameter nama halaman
    public function comingSoon($slug = 'Halaman Ini')
    {
        // Mengubah slug (contoh: 'tim-kami') menjadi teks yang rapi ('Tim Kami')
        $pageName = ucwords(str_replace('-', ' ', $slug));

        return view('coming-soon', compact('pageName'));
    }
}
