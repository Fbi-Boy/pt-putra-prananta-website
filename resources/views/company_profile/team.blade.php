@extends('components.layout.app')

@section('title', 'Tim Kami — ' . config('company.name'))

@section('content')

@php
    // ============ DATA DUMMY TIM ============
    $team = [
        [
            'name'  => 'Muhammad Giovarel',
            'role'  => 'Chief Executive Officer',
            'div'   => 'direksi',
            'image' => 'images/agents/agent.png',
            'bio'   => 'Memimpin visi dan strategi perusahaan dengan inovasi dan integritas.',
            'linkedin' => '#',
            'whatsapp' => '#',
        ],
        [
            'name'  => 'Budi Santoso',
            'role'  => 'Head of Marketing',
            'div'   => 'marketing',
            'image' => 'images/agents/agent.png',
            'bio'   => 'Ahli strategi pemasaran properti di Jember dengan pengalaman lebih dari 5 tahun.',
            'linkedin' => '#',
            'whatsapp' => '#',
        ],
        [
            'name'  => 'Siti Rahmawati',
            'role'  => 'Senior Property Agent',
            'div'   => 'marketing',
            'image' => 'images/agents/agent.png',
            'bio'   => 'Berpengalaman menangani klien premium dan properti mewah di area Jember.',
            'linkedin' => '#',
            'whatsapp' => '#',
        ],
        [
            'name'  => 'Andi Pratama',
            'role'  => 'Legal & Documentation',
            'div'   => 'operasional',
            'image' => 'images/agents/agent.png',
            'bio'   => 'Memastikan semua transaksi aman, legal, dan sesuai regulasi.',
            'linkedin' => '#',
            'whatsapp' => '#',
        ],
        [
            'name'  => 'Dewi Lestari',
            'role'  => 'Customer Support',
            'div'   => 'support',
            'image' => 'images/agents/agent.png',
            'bio'   => 'Siap membantu kebutuhan dan pertanyaan Anda setiap hari kerja.',
            'linkedin' => '#',
            'whatsapp' => '#',
        ],
        [
            'name'  => 'Rizky Firmansyah',
            'role'  => 'Property Appraiser',
            'div'   => 'operasional',
            'image' => 'images/agents/agent.png',
            'bio'   => 'Menghitung valuasi properti secara akurat berdasarkan data pasar.',
            'linkedin' => '#',
            'whatsapp' => '#',
        ],
    ];

    $filters = [
        'all'         => 'Semua Tim',
        'direksi'     => 'Direksi',
        'marketing'   => 'Marketing',
        'operasional' => 'Operasional',
        'support'     => 'Support',
    ];
@endphp

<div x-data="{ filter: 'all' }" class="bg-stone-50 min-h-screen">

    {{-- HERO SECTION --}}
    <section class="bg-[#09251C] py-20 relative overflow-hidden text-center">
        <div class="absolute top-0 right-0 w-64 h-64 bg-orange-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-3xl mx-auto px-4">
            <span class="text-xs font-bold text-orange-400 uppercase tracking-[0.2em] mb-3 block">
                Orang-Orang di Balik Layar
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Kenali Tim Kami
            </h1>
            <p class="text-stone-300 text-lg leading-relaxed">
                Kami adalah kumpulan profesional yang berdedikasi untuk mewujudkan hunian impian Anda dengan integritas dan inovasi.
            </p>
        </div>
    </section>

    {{-- TIM SECTION --}}
    <section class="py-16 md:py-24 max-w-7xl mx-auto px-4 lg:px-6">

        {{-- FILTER BAR --}}
        <div class="flex flex-wrap justify-center gap-2 mb-12">
            @foreach($filters as $key => $label)
                <button
                    @click="filter = '{{ $key }}'"
                    :class="filter === '{{ $key }}' ? 'bg-orange-500 text-white shadow-md' : 'bg-white text-stone-600 border border-stone-200 hover:border-orange-300'"
                    class="px-5 py-2.5 rounded-full text-sm font-bold transition-all duration-300">
                    {{ $label }}
                </button>
            @endforeach
        </div>

        {{-- GRID TEAM --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($team as $member)
                <div x-show="filter === 'all' || filter === '{{ $member['div'] }}'"
                     x-transition:enter="transition ease-out duration-300"
                     x-transition:enter-start="opacity-0 scale-95"
                     x-transition:enter-end="opacity-100 scale-100"
                     class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 border border-stone-100">

                    {{-- Foto --}}
                    <div class="relative aspect-[4/5] overflow-hidden bg-stone-200">
                        <img src="{{ asset($member['image']) }}"
                             alt="{{ $member['name'] }}"
                             class="w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition duration-500">

                        {{-- Overlay Social --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-stone-900/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-6 gap-3">
                            <a href="{{ $member['linkedin'] }}"
                               class="w-10 h-10 rounded-full bg-white/20 backdrop-blur hover:bg-orange-500 text-white flex items-center justify-center transition"
                               title="LinkedIn">
                                <i data-lucide="linkedin" class="w-4 h-4"></i>
                            </a>
                            <a href="{{ $member['whatsapp'] }}"
                               class="w-10 h-10 rounded-full bg-white/20 backdrop-blur hover:bg-emerald-500 text-white flex items-center justify-center transition"
                               title="WhatsApp">
                                <i data-lucide="message-circle" class="w-4 h-4"></i>
                            </a>
                        </div>
                    </div>

                    {{-- Info --}}
                    <div class="p-6 text-center">
                        <h3 class="text-xl font-bold text-stone-900">{{ $member['name'] }}</h3>
                        <p class="text-sm font-semibold text-orange-500 mt-1">{{ $member['role'] }}</p>
                        <p class="text-sm text-stone-500 mt-3 leading-relaxed">{{ $member['bio'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- CTA BERGABUNG --}}
    <section class="pb-20">
        <div class="max-w-4xl mx-auto px-4 text-center">
            <div class="bg-orange-50 border border-orange-100 rounded-3xl p-8 md:p-12">
                <div class="w-16 h-16 bg-orange-500 text-white rounded-full flex items-center justify-center mx-auto mb-6 shadow-lg">
                    <i data-lucide="users" class="w-8 h-8"></i>
                </div>
                <h2 class="text-2xl font-bold text-stone-900 mb-3">Ingin Bergabung dengan Kami?</h2>
                <p class="text-stone-600 mb-6 max-w-lg mx-auto">
                    Kami selalu mencari talenta terbaik yang memiliki passion di industri properti.
                </p>
                <a href="{{ route('company.career') }}"
                   class="inline-flex items-center gap-2 px-6 py-3 bg-stone-900 hover:bg-stone-800 text-white font-bold rounded-xl transition shadow-md">
                    Lihat Lowongan Karier <i data-lucide="arrow-right" class="w-4 h-4"></i>
                </a>
            </div>
        </div>
    </section>

</div>

@endsection
