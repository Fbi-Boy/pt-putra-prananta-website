<?php

namespace App\Http\Controllers;

class GuideController extends Controller
{
    public function index()
    {
        // Data kategori (Ikon menggunakan Lucide)
        $categories = [
            ['id' => 'all', 'name' => 'Semua', 'icon' => 'library', 'color' => 'text-stone-500', 'bg' => 'bg-stone-100'],
            ['id' => 'beli', 'name' => 'Beli', 'icon' => 'book-open', 'color' => 'text-blue-500', 'bg' => 'bg-blue-50'],
            ['id' => 'sewa', 'name' => 'Sewa', 'icon' => 'key', 'color' => 'text-emerald-500', 'bg' => 'bg-emerald-50'],
            ['id' => 'jual', 'name' => 'Jual', 'icon' => 'tag', 'color' => 'text-orange-500', 'bg' => 'bg-orange-50'],
            ['id' => 'kpr', 'name' => 'KPR', 'icon' => 'calculator', 'color' => 'text-purple-500', 'bg' => 'bg-purple-50'],
            ['id' => 'legal', 'name' => 'Legalitas', 'icon' => 'shield-check', 'color' => 'text-amber-500', 'bg' => 'bg-amber-50'],
            ['id' => 'invest', 'name' => 'Investasi', 'icon' => 'trending-up', 'color' => 'text-red-500', 'bg' => 'bg-red-50'],
            ['id' => 'tips', 'name' => 'Tips', 'icon' => 'lightbulb', 'color' => 'text-yellow-500', 'bg' => 'bg-yellow-50'],
            ['id' => 'desain', 'name' => 'Desain', 'icon' => 'sofa', 'color' => 'text-indigo-500', 'bg' => 'bg-indigo-50'],
        ];

        // Data Panduan Populer (Bentuk Poster/Pamflet)
        $popularGuides = [
            [
                'category' => 'beli',
                'title' => 'Panduan Lengkap Membeli Rumah Pertama untuk Milenial',
                'excerpt' => 'Jangan buru-buru beli, pahami simulasi KPR, cek legalitas, dan tips memilih lokasi strategis agar tidak menyesal di kemudian hari.',
                'image' => asset('images/property/rumah1.jpg'), // Nanti diganti gambar poster asli
                'read_time' => '5 menit baca',
                'tag' => 'Panduan Pembeli'
            ],
            [
                'category' => 'kpr',
                'title' => 'Cara Cerdas Mengajukan KPR Agar Disetujui Bank',
                'excerpt' => 'Syarat dokumen, skema bunga fixed vs floating, hingga cara menghitung kemampuan cicilan yang aman dari penghasilan bulanan.',
                'image' => asset('images/property/rumah2.jpg'),
                'read_time' => '7 menit baca',
                'tag' => 'Tips KPR'
            ],
            [
                'category' => 'legal',
                'title' => 'Memahami Perbedaan Sertifikat SHM, HGB, dan Girik',
                'excerpt' => 'Panduan lengkap untuk memastikan keamanan transaksi properti Anda sebelum tanda tangan PPJB.',
                'image' => asset('images/property/rumah3.jpg'),
                'read_time' => '4 menit baca',
                'tag' => 'Legalitas'
            ],
            [
                'category' => 'invest',
                'title' => 'Strategi Investasi Properti untuk Pemula di Jember',
                'excerpt' => 'Kenali potensi kawasan, prediksi harga, dan cara pasif income dari sewa ruko dan kos-kosan.',
                'image' => asset('images/property/rumah4.jpg'),
                'read_time' => '6 menit baca',
                'tag' => 'Investasi'
            ]
        ];

        return view('static.guide', compact('categories', 'popularGuides'));
    }
}
