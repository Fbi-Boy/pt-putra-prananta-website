@extends('components.layout.app')

@section('title', 'Karier — ' . config('company.name'))

@section('content')

@php
    // ============ DATA DUMMY LOWONGAN ============
    $jobs = [
        [
            'title'    => 'Marketing Property',
            'type'     => 'Full-time',
            'location' => 'Jember',
            'dept'     => 'Marketing',
            'desc'     => 'Bertanggung jawab memasarkan properti, mencari klien potensial, dan melakukan presentasi kepada calon pembeli.',
            'requirements' => [
                'Pria/Wanita, usia maksimal 35 tahun',
                'Minimal SMA/SMK sederajat',
                'Memiliki pengalaman di bidang marketing (diutamakan properti)',
                'Komunikatif dan memiliki kemampuan negosiasi yang baik',
                'Memiliki kendaraan pribadi',
            ],
        ],
        [
            'title'    => 'Admin Kantor',
            'type'     => 'Full-time',
            'location' => 'Jember',
            'dept'     => 'Operasional',
            'desc'     => 'Mengelola administrasi kantor, dokumen transaksi properti, dan mendukung kegiatan operasional harian.',
            'requirements' => [
                'Pria/Wanita, usia maksimal 30 tahun',
                'Minimal D3/S1 semua jurusan',
                'Menguasai Microsoft Office (Word, Excel)',
                'Teliti, rapi, dan bertanggung jawab',
                'Mampu bekerja secara individu maupun tim',
            ],
        ],
        [
            'title'    => 'Property Agent (Freelance)',
            'type'     => 'Freelance',
            'location' => 'Jember',
            'dept'     => 'Marketing',
            'desc'     => 'Agen properti lepas yang dapat bekerja dengan jam fleksibel untuk mencari dan memasarkan properti.',
            'requirements' => [
                'Pria/Wanita, usia 20-45 tahun',
                'Memiliki jaringan atau relasi yang luas',
                'Memiliki kendaraan pribadi',
                'Tidak terikat dengan institusi lain',
                'Siap bekerja dengan sistem komisi',
            ],
        ],
        [
            'title'    => 'Legal & Documentation Staff',
            'type'     => 'Full-time',
            'location' => 'Jember',
            'dept'     => 'Operasional',
            'desc'     => 'Menangani proses legalitas properti, mulai dari pengecekan sertifikat hingga pengurusan dokumen transaksi.',
            'requirements' => [
                'Pria/Wanita, usia maksimal 35 tahun',
                'Minimal S1 Hukum / Kenotariatan',
                'Memahami proses legalitas properti (SHM, HGB, AJB, dll)',
                'Teliti dan memiliki kemampuan analisis yang baik',
                'Diutamakan memiliki pengalaman di bidang properti',
            ],
        ],
    ];
@endphp

<div class="bg-stone-50 min-h-screen">

    {{-- HERO SECTION --}}
    <section class="bg-[#09251C] py-20 relative overflow-hidden text-center">
        <div class="absolute top-0 right-0 w-64 h-64 bg-orange-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-3xl mx-auto px-4">
            <span class="text-xs font-bold text-orange-400 uppercase tracking-[0.2em] mb-3 block">
                Karier di {{ config('company.name') }}
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Bergabung Bersama Kami
            </h1>
            <p class="text-stone-300 text-lg leading-relaxed">
                Kami selalu mencari individu berbakat yang memiliki passion di industri properti untuk tumbuh bersama.
            </p>
        </div>
    </section>

    {{-- KEUNTUNGAN --}}
    <section class="py-16 max-w-7xl mx-auto px-4 lg:px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-2xl p-6 border border-stone-200 text-center">
                <div class="w-12 h-12 bg-orange-100 text-orange-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="trending-up" class="w-6 h-6"></i>
                </div>
                <h3 class="text-lg font-bold text-stone-900 mb-2">Pengembangan Karir</h3>
                <p class="text-sm text-stone-500">Kesempatan untuk tumbuh dan berkembang bersama perusahaan yang terus berinovasi.</p>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-stone-200 text-center">
                <div class="w-12 h-12 bg-orange-100 text-orange-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="handshake" class="w-6 h-6"></i>
                </div>
                <h3 class="text-lg font-bold text-stone-900 mb-2">Lingkungan Suportif</h3>
                <p class="text-sm text-stone-500">Tim yang solid, kolaboratif, dan saling mendukung satu sama lain.</p>
            </div>

            <div class="bg-white rounded-2xl p-6 border border-stone-200 text-center">
                <div class="w-12 h-12 bg-orange-100 text-orange-500 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <i data-lucide="award" class="w-6 h-6"></i>
                </div>
                <h3 class="text-lg font-bold text-stone-900 mb-2">Reward Kompetitif</h3>
                <p class="text-sm text-stone-500">Sistem kompensasi dan bonus yang menarik sesuai dengan performa.</p>
            </div>
        </div>
    </section>

    {{-- DAFTAR LOWONGAN --}}
    <section class="pb-20 max-w-5xl mx-auto px-4 lg:px-6">
        <div class="text-center mb-10">
            <h2 class="text-2xl md:text-3xl font-bold text-stone-900 mb-3">Lowongan Tersedia</h2>
            <p class="text-stone-600">Pilih posisi yang sesuai dengan keahlian dan passion Anda.</p>
        </div>

        <div class="space-y-4">
            @foreach($jobs as $job)
                <div class="group bg-white rounded-2xl border border-stone-200 overflow-hidden shadow-sm hover:shadow-lg hover:border-orange-200 transition-all duration-300">
                    {{-- Header Card --}}
                    <div class="p-6 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                        <div class="flex-1">
                            <div class="flex flex-wrap items-center gap-2 mb-2">
                                <span class="px-2.5 py-1 rounded-md bg-orange-100 text-orange-700 text-[10px] font-bold uppercase tracking-wider">
                                    {{ $job['dept'] }}
                                </span>
                                <span class="px-2.5 py-1 rounded-md bg-stone-100 text-stone-700 text-[10px] font-bold uppercase tracking-wider">
                                    {{ $job['type'] }}
                                </span>
                            </div>
                            <h3 class="text-xl font-bold text-stone-900">{{ $job['title'] }}</h3>
                            <p class="text-sm text-stone-500 mt-1 flex items-center gap-1.5">
                                <i data-lucide="map-pin" class="w-3.5 h-3.5 text-orange-500"></i>
                                {{ $job['location'] }}
                            </p>
                        </div>

                        <button
                            type="button"
                            onclick="document.getElementById('detail-{{ $loop->index }}').classList.toggle('hidden')"
                            class="shrink-0 px-5 py-2.5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-sm font-bold transition shadow-sm flex items-center gap-2">
                            Lihat Detail
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </button>
                    </div>

                    {{-- Detail (Hidden by default) --}}
                    <div id="detail-{{ $loop->index }}" class="hidden border-t border-stone-100 bg-stone-50 p-6">
                        <div class="mb-5">
                            <h4 class="text-sm font-bold text-stone-900 mb-2 uppercase tracking-wider">Deskripsi Pekerjaan</h4>
                            <p class="text-sm text-stone-600 leading-relaxed">{{ $job['desc'] }}</p>
                        </div>

                        <div class="mb-5">
                            <h4 class="text-sm font-bold text-stone-900 mb-2 uppercase tracking-wider">Kualifikasi</h4>
                            <ul class="space-y-2">
                                @foreach($job['requirements'] as $req)
                                    <li class="flex gap-2 text-sm text-stone-600">
                                        <i data-lucide="check-circle-2" class="w-4 h-4 text-orange-500 shrink-0 mt-0.5"></i>
                                        <span>{{ $req }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('company.whatsapp', '')) }}?text={{ rawurlencode('Halo, saya ingin melamar posisi ' . $job['title'] . ' di ' . config('company.name')) }}"
                           target="_blank"
                           rel="noopener"
                           class="inline-flex items-center gap-2 px-6 py-3 bg-emerald-500 hover:bg-emerald-600 text-white text-sm font-bold rounded-xl transition shadow-sm">
                            <i data-lucide="message-circle" class="w-4 h-4"></i>
                            Lamar via WhatsApp
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- CTA --}}
    <section class="pb-20 max-w-4xl mx-auto px-4 text-center">
        <div class="bg-[#09251C] rounded-3xl p-8 md:p-12 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-orange-500/10 rounded-full blur-3xl"></div>
            <div class="relative z-10">
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-3">Belum Menemukan Posisi yang Cocok?</h2>
                <p class="text-stone-300 mb-6 max-w-lg mx-auto">
                    Kirimkan CV dan portofolio Anda. Kami akan menghubungi jika ada posisi yang sesuai.
                </p>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('company.whatsapp', '')) }}?text={{ rawurlencode('Halo, saya ingin mengirimkan lamaran untuk posisi yang tersedia di ' . config('company.name')) }}"
                    target="_blank" rel="noopener"
                    class="inline-flex items-center gap-2 px-6 py-3 bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-xl transition shadow-md">
                        Kirim Lamaran <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
    </section>

</div>

@endsection
