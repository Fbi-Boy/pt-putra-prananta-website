@extends('components.layout.app')

@section('title', 'Hubungi Kami — ' . config('company.name'))

@section('content')

@php
    $waNumber = preg_replace('/[^0-9]/', '', config('company.whatsapp', '6281234567890'));
    $waMessage = rawurlencode('Halo, saya ingin bertanya seputar layanan ' . config('company.name'));
    $waUrl = 'https://wa.me/' . $waNumber . '?text=' . $waMessage;

    $contactMethods = [
        [
            'icon' => 'message-circle',
            'title' => 'WhatsApp',
            'desc' => 'Respon tercepat, tersedia 24/7',
            'value' => config('company.phone', '+62 812 3456 7890'),
            'url' => $waUrl,
            'color' => 'emerald',
            'badge' => 'Disarankan',
        ],
        [
            'icon' => 'mail',
            'title' => 'Email',
            'desc' => 'Untuk pertanyaan detail & dokumen',
            'value' => config('company.email', 'info@putraprananta.com'),
            'url' => 'mailto:' . config('company.email', 'info@putraprananta.com'),
            'color' => 'blue',
            'badge' => null,
        ],
        [
            'icon' => 'phone',
            'title' => 'Telepon',
            'desc' => 'Senin - Sabtu, 08.00 - 17.00 WIB',
            'value' => config('company.phone', '+62 812 3456 7890'),
            'url' => 'tel:' . preg_replace('/[^+\d]/', '', config('company.phone', '')),
            'color' => 'purple',
            'badge' => null,
        ],
        [
            'icon' => 'map-pin',
            'title' => 'Kantor Pusat',
            'desc' => 'Kunjungi langsung (dengan appointment)',
            'value' => config('company.address', 'Jember, Jawa Timur'),
            'url' => 'https://maps.google.com/?q=' . urlencode(config('company.address', 'Jember')),
            'color' => 'orange',
            'badge' => null,
        ],
    ];
@endphp

<div class="bg-stone-50 min-h-screen">

    {{-- HERO --}}
    <section class="bg-[#09251C] py-20 md:py-24 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-emerald-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-3xl mx-auto px-4 text-center">
            <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 backdrop-blur border border-white/20 mb-6">
                <i data-lucide="mail" class="w-4 h-4 text-orange-400"></i>
                <span class="text-xs font-bold text-white uppercase tracking-wider">Hubungi Kami</span>
            </div>

            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
                Mari <span class="text-orange-500">Berdiskusi</span>
            </h1>
            <p class="text-stone-300 text-base md:text-lg max-w-2xl mx-auto">
                Tim kami siap membantu Anda dengan pertanyaan seputar properti, KPR, atau kerja sama. Pilih metode kontak yang paling nyaman untuk Anda.
            </p>
        </div>
    </section>

    {{-- KONTAK METHODS --}}
    <section class="py-16 max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach($contactMethods as $method)
                <a href="{{ $method['url'] }}"
                   target="{{ in_array($method['icon'], ['map-pin', 'message-circle']) ? '_blank' : '_self' }}"
                   rel="noopener"
                   class="group relative bg-white rounded-2xl p-6 border border-stone-200 shadow-sm hover:shadow-xl hover:border-orange-300 hover:-translate-y-1 transition-all duration-300">

                    @if($method['badge'])
                        <span class="absolute top-4 right-4 px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-700 text-[10px] font-bold uppercase tracking-wider">
                            {{ $method['badge'] }}
                        </span>
                    @endif

                    <div class="w-14 h-14 rounded-2xl bg-orange-50 text-orange-500 flex items-center justify-center mb-4 group-hover:bg-orange-500 group-hover:text-white transition-colors duration-300">
                        <i data-lucide="{{ $method['icon'] }}" class="w-7 h-7"></i>
                    </div>
                    <h3 class="text-base font-bold text-stone-900 mb-1">{{ $method['title'] }}</h3>
                    <p class="text-xs text-stone-500 mb-3">{{ $method['desc'] }}</p>
                    <p class="text-sm font-semibold text-orange-600 truncate">{{ $method['value'] }}</p>
                </a>
            @endforeach
        </div>
    </section>

    {{-- FORM + MAP --}}
    <section class="pb-16 max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">

            {{-- FORM --}}
            <div class="bg-white rounded-3xl p-6 md:p-8 border border-stone-200 shadow-sm">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-stone-900 mb-2">Kirim Pesan</h2>
                    <p class="text-sm text-stone-500">Isi form di bawah, kami akan menghubungi Anda dalam 1x24 jam.</p>
                </div>

                @if(session('success'))
                    <div class="mb-5 p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-800 text-sm flex items-start gap-2">
                        <i data-lucide="check-circle-2" class="w-4 h-4 shrink-0 mt-0.5"></i>
                        {{ session('success') }}
                    </div>
                @endif

                <form action="#" method="POST" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold text-stone-700 mb-1.5">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" name="name" required placeholder="Nama Anda"
                                   class="w-full h-11 px-4 rounded-xl border border-stone-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none text-sm transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-stone-700 mb-1.5">Nomor WhatsApp <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" required placeholder="08xxxxxxxxxx"
                                   class="w-full h-11 px-4 rounded-xl border border-stone-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none text-sm transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-stone-700 mb-1.5">Email</label>
                        <input type="email" name="email" placeholder="nama@email.com"
                               class="w-full h-11 px-4 rounded-xl border border-stone-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none text-sm transition">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-stone-700 mb-1.5">Topik</label>
                        <select name="topic" class="w-full h-11 px-4 rounded-xl border border-stone-300 focus:border-orange-500 text-sm outline-none cursor-pointer">
                            <option value="umum">Pertanyaan Umum</option>
                            <option value="beli">Beli Properti</option>
                            <option value="jual">Jual Properti</option>
                            <option value="sewa">Sewa Properti</option>
                            <option value="kpr">KPR</option>
                            <option value="kerjasama">Kerja Sama</option>
                            <option value="lainnya">Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-stone-700 mb-1.5">Pesan <span class="text-red-500">*</span></label>
                        <textarea name="message" required rows="5" placeholder="Tuliskan pertanyaan atau kebutuhan Anda..."
                                  class="w-full px-4 py-3 rounded-xl border border-stone-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none text-sm transition resize-none"></textarea>
                    </div>

                    <button type="submit"
                            class="w-full h-12 rounded-xl bg-orange-500 hover:bg-orange-600 text-white font-bold text-sm transition shadow-lg shadow-orange-500/30 flex items-center justify-center gap-2">
                        <i data-lucide="send" class="w-4 h-4"></i> Kirim Pesan
                    </button>

                    <p class="text-[11px] text-stone-400 text-center leading-relaxed">
                        Dengan mengirim pesan, Anda menyetujui <a href="#" class="font-semibold text-orange-600 hover:underline">Kebijakan Privasi</a> kami.
                    </p>
                </form>
            </div>

            {{-- MAP + INFO --}}
            <div class="space-y-4">
                {{-- MAP --}}
                <div class="bg-white rounded-3xl overflow-hidden border border-stone-200 shadow-sm h-[350px] relative">
                    <iframe
                        src="https://www.google.com/maps?q={{ urlencode(config('company.address', 'Jember, Jawa Timur')) }}&output=embed"
                        class="w-full h-full border-0"
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        title="Lokasi Kantor">
                    </iframe>
                    <a href="https://maps.google.com/?q={{ urlencode(config('company.address', 'Jember')) }}"
                       target="_blank" rel="noopener"
                       class="absolute bottom-4 right-4 inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-stone-900 hover:bg-stone-800 text-white text-xs font-bold shadow-lg transition">
                        <i data-lucide="external-link" class="w-3.5 h-3.5"></i> Buka di Maps
                    </a>
                </div>

                {{-- INFO KANTOR --}}
                <div class="bg-[#09251C] rounded-3xl p-6 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-orange-500/10 rounded-full blur-2xl"></div>

                    <div class="relative z-10">
                        <div class="flex items-center gap-3 mb-4">
                            <div class="w-10 h-10 rounded-xl bg-orange-500 flex items-center justify-center">
                                <i data-lucide="building-2" class="w-5 h-5 text-white"></i>
                            </div>
                            <div>
                                <h3 class="text-base font-bold">Kantor Pusat</h3>
                                <p class="text-[11px] text-stone-400">{{ config('company.full_name', 'PT Putra Prananta Property') }}</p>
                            </div>
                        </div>

                        <div class="space-y-3 text-sm">
                            <div class="flex items-start gap-3">
                                <i data-lucide="map-pin" class="w-4 h-4 text-orange-400 shrink-0 mt-0.5"></i>
                                <span class="text-stone-300">{{ config('company.address', 'Jl. Contoh No. 123, Jember, Jawa Timur') }}</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <i data-lucide="phone" class="w-4 h-4 text-orange-400 shrink-0 mt-0.5"></i>
                                <span class="text-stone-300">{{ config('company.phone', '+62 812 3456 7890') }}</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <i data-lucide="mail" class="w-4 h-4 text-orange-400 shrink-0 mt-0.5"></i>
                                <span class="text-stone-300">{{ config('company.email', 'info@putraprananta.com') }}</span>
                            </div>
                            <div class="flex items-start gap-3">
                                <i data-lucide="clock" class="w-4 h-4 text-orange-400 shrink-0 mt-0.5"></i>
                                <div class="text-stone-300">
                                    <p>Senin - Jumat: 08.00 - 17.00 WIB</p>
                                    <p>Sabtu: 08.00 - 12.00 WIB</p>
                                    <p class="text-stone-500">Minggu & hari libur: Tutup</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    {{-- FAQ SHORTCUT --}}
    <section class="pb-20 max-w-6xl mx-auto px-4">
        <div class="bg-white rounded-3xl p-8 md:p-10 border border-stone-200 text-center">
            <div class="w-14 h-14 bg-orange-100 text-orange-500 rounded-2xl flex items-center justify-center mx-auto mb-4">
                <i data-lucide="circle-help" class="w-7 h-7"></i>
            </div>
            <h2 class="text-xl md:text-2xl font-bold text-stone-900 mb-2">Cari Jawaban Cepat?</h2>
            <p class="text-stone-500 text-sm mb-6 max-w-lg mx-auto">
                Sebelum menghubungi kami, coba cek halaman FAQ & Pusat Bantuan. Mungkin pertanyaan Anda sudah terjawab.
            </p>
            <div class="flex flex-wrap justify-center gap-3">
                <a href="{{ route('static.faq') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl bg-stone-900 hover:bg-stone-800 text-white text-sm font-bold transition">
                    <i data-lucide="circle-help" class="w-4 h-4"></i> Lihat FAQ
                </a>
                <a href="{{ route('static.help') }}"
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl border border-stone-300 hover:bg-stone-50 text-stone-700 text-sm font-bold transition">
                    <i data-lucide="life-buoy" class="w-4 h-4"></i> Pusat Bantuan
                </a>
            </div>
        </div>
    </section>

</div>

@endsection
