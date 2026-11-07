@extends('components.layout.app')

@section('title', 'FAQ — ' . config('company.name'))

@section('content')

@php
    // ============ DATA DUMMY FAQ ============
    $faqCategories = [
        'all'       => ['label' => 'Semua', 'icon' => 'layers'],
        'beli'      => ['label' => 'Beli Properti', 'icon' => 'tag'],
        'jual'      => ['label' => 'Jual Properti', 'icon' => 'house-plus'],
        'sewa'      => ['label' => 'Sewa Properti', 'icon' => 'key'],
        'kpr'       => ['label' => 'KPR', 'icon' => 'calculator'],
        'legal'     => ['label' => 'Legalitas', 'icon' => 'shield-check'],
        'akun'      => ['label' => 'Akun & Website', 'icon' => 'user-round'],
    ];

    $faqs = [
        // === BELI ===
        [
            'cat' => 'beli',
            'q' => 'Bagaimana cara mencari properti yang sesuai dengan budget saya?',
            'a' => 'Gunakan fitur filter di halaman listing properti (menu "Beli"). Anda dapat memfilter berdasarkan harga maksimal, area, tipe properti, dan jumlah kamar. Anda juga bisa menggunakan fitur "Kami Carikan" di homepage untuk meminta tim kami mencarikan properti sesuai kriteria Anda.',
        ],
        [
            'cat' => 'beli',
            'q' => 'Apakah harga properti bisa dinegosiasi?',
            'a' => 'Sebagian besar properti yang ditandai dengan label "Bisa Nego" dapat dinegosiasi. Namun, untuk properti lain, kami sarankan Anda menghubungi agent yang menangani properti tersebut untuk mendiskusikan kemungkinan negosiasi.',
        ],
        [
            'cat' => 'beli',
            'q' => 'Berapa lama proses pembelian properti sampai sertifikat berpindah nama?',
            'a' => 'Rata-rata proses pembelian properti (non-KPR) memakan waktu 2-4 minggu, tergantung kelengkapan dokumen dan proses balik nama di BPN. Untuk pembelian via KPR, proses bisa lebih lama (4-8 minggu) karena ada proses verifikasi bank.',
        ],
        [
            'cat' => 'beli',
            'q' => 'Apakah saya bisa membeli properti tanpa melihat langsung?',
            'a' => 'Kami sangat menyarankan untuk melihat langsung properti sebelum membeli. Namun, untuk Anda yang berada di luar kota, kami menyediakan layanan video tour. Hubungi agent terkait untuk mengatur jadwal video tour.',
        ],

        // === JUAL ===
        [
            'cat' => 'jual',
            'q' => 'Bagaimana cara memasarkan properti saya di website ini?',
            'a' => 'Klik menu "Jual Properti" di navbar, lalu isi formulir pengajuan properti. Tim kami akan memverifikasi data Anda dalam 1x24 jam. Setelah disetujui, properti Anda akan tayang di website.',
        ],
        [
            'cat' => 'jual',
            'q' => 'Apakah ada biaya untuk memasarkan properti?',
            'a' => 'Untuk saat ini, pemasaran properti di website kami gratis. Namun, untuk layanan pendampingan penjualan (marketing intensif, fotografi profesional, dll), akan ada biaya yang disepakati terpisah dengan tim kami.',
        ],
        [
            'cat' => 'jual',
            'q' => 'Berapa lama proses verifikasi properti yang saya ajukan?',
            'a' => 'Proses verifikasi memakan waktu maksimal 1x24 jam pada hari kerja. Tim kami akan menghubungi Anda via WhatsApp untuk konfirmasi data dan kelengkapan dokumen sebelum properti ditayangkan.',
        ],

        // === SEWA ===
        [
            'cat' => 'sewa',
            'q' => 'Bagaimana sistem pembayaran sewa properti?',
            'a' => 'Sistem sewa umumnya dibayar di muka (per bulan/tahun) sesuai kesepakatan dengan pemilik. Untuk properti tertentu, tersedia opsi pembayaran per 3 bulan atau 6 bulan. Hubungi agent untuk detail lebih lanjut.',
        ],
        [
            'cat' => 'sewa',
            'q' => 'Apakah ada biaya deposit untuk sewa?',
            'a' => 'Ya, sebagian besar properti sewa meminta deposit sebesar 1 bulan sewa. Deposit ini akan dikembalikan saat masa sewa berakhir, dengan syarat tidak ada kerusakan atau tunggakan.',
        ],
        [
            'cat' => 'sewa',
            'q' => 'Apakah saya bisa memperpanjang masa sewa?',
            'a' => 'Tentu. Perpanjangan sewa dapat dinegosiasi dengan pemilik properti. Kami sarankan Anda mengonfirmasi perpanjangan minimal 1 bulan sebelum masa sewa berakhir.',
        ],

        // === KPR ===
        [
            'cat' => 'kpr',
            'q' => 'Bagaimana cara mengajukan KPR di website ini?',
            'a' => 'Kunjungi halaman "KPR" untuk melihat simulasi cicilan tiap bank. Jika tertarik, Anda bisa langsung menghubungi agent atau mengisi formulir pengajuan KPR yang tersedia. Tim kami akan membantu proses pengajuan ke bank.',
        ],
        [
            'cat' => 'kpr',
            'q' => 'Berapa DP minimal untuk KPR?',
            'a' => 'Umumnya bank mensyaratkan DP minimal 10-20% dari harga properti, tergantung jenis properti dan kebijakan bank. Anda bisa menggunakan kalkulator KPR di website untuk melihat estimasi DP tiap bank.',
        ],
        [
            'cat' => 'kpr',
            'q' => 'Apa perbedaan bunga fixed dan floating?',
            'a' => 'Bunga fixed (tetap) berlaku selama periode tertentu (biasanya 1-5 tahun pertama) dengan cicilan yang tetap. Setelah periode fixed berakhir, bunga berubah menjadi floating (mengikuti suku bunga pasar), sehingga cicilan bisa naik atau turun.',
        ],
        [
            'cat' => 'kpr',
            'q' => 'Berapa cicilan KPR yang aman berdasarkan penghasilan saya?',
            'a' => 'Umumnya bank menyarankan cicilan KPR tidak melebihi 30% dari penghasilan bulanan Anda. Gunakan fitur "Cek Kemampuan KPR" di halaman KPR untuk menghitung harga properti maksimal yang sesuai dengan penghasilan Anda.',
        ],
        [
            'cat' => 'kpr',
            'q' => 'Apakah bank yang tersedia bisa bertambah?',
            'a' => 'Saat ini kami bekerja sama dengan beberapa bank terpilih (Bank Mandiri, BRI, BTN, BCA). Kami terus berupaya menambah kerja sama dengan bank lain untuk memberikan lebih banyak pilihan kepada Anda.',
        ],

        // === LEGAL ===
        [
            'cat' => 'legal',
            'q' => 'Apa perbedaan SHM, HGB, dan Girik?',
            'a' => 'SHM (Sertifikat Hak Milik) adalah hak milik penuh atas tanah, berlaku selamanya. HGB (Hak Guna Bangunan) berlaku maksimal 30 tahun (bisa diperpanjang). Girik adalah bukti kepemilikan tanah lama yang belum bersertifikat (umumnya di desa).',
        ],
        [
            'cat' => 'legal',
            'q' => 'Apakah properti yang dijual di sini sudah legal?',
            'a' => 'Ya. Setiap properti yang ditayangkan di website kami telah melalui proses verifikasi dokumen. Namun, kami tetap menyarankan Anda melakukan pengecekan mandiri (due diligence) sebelum transaksi. Tim legal kami siap membantu proses pengecekan dokumen.',
        ],
        [
            'cat' => 'legal',
            'q' => 'Bagaimana cara mengecek keaslian sertifikat properti?',
            'a' => 'Anda dapat mengecek keaslian sertifikat ke Kantor Badan Pertanahan Nasional (BPN) setempat dengan membawa fotokopi sertifikat dan identitas pemilik. Tim kami juga dapat membantu proses pengecekan ini jika Anda melakukan transaksi melalui kami.',
        ],
        [
            'cat' => 'legal',
            'q' => 'Apa itu PPJB dan AJB?',
            'a' => 'PPJB (Perjanjian Pengikatan Jual Beli) adalah perjanjian awal sebelum AJB (Akta Jual Beli) dibuat. PPJB dibuat oleh notaris, sementara AJB dibuat oleh PPAT (Pejabat Pembuat Akta Tanah). AJB adalah dokumen yang sah untuk proses balik nama sertifikat.',
        ],

        // === AKUN ===
        [
            'cat' => 'akun',
            'q' => 'Bagaimana cara membuat akun di website ini?',
            'a' => 'Klik tombol "Masuk" di navbar, lalu pilih "Daftar Sekarang". Anda dapat mendaftar menggunakan akun Google (paling cepat) atau email manual. Setelah verifikasi, akun Anda langsung aktif.',
        ],
        [
            'cat' => 'akun',
            'q' => 'Apakah data pribadi saya aman?',
            'a' => 'Ya. Kami menggunakan enkripsi SSL untuk semua transaksi data. Data pribadi Anda hanya digunakan untuk keperluan internal (verifikasi, komunikasi terkait properti) dan tidak akan dibagikan ke pihak ketiga tanpa izin Anda.',
        ],
        [
            'cat' => 'akun',
            'q' => 'Bagaimana cara menyimpan properti favorit?',
            'a' => 'Klik ikon hati (❤️) pada card properti untuk menyimpannya ke daftar favorit. Anda harus login terlebih dahulu. Properti yang tersimpan bisa dilihat kapan saja dengan klik ikon hati di navbar.',
        ],
        [
            'cat' => 'akun',
            'q' => 'Lupa password, bagaimana cara reset?',
            'a' => 'Klik "Lupa Password" pada halaman login, masukkan email Anda, dan ikuti instruksi yang dikirim ke email. Jika masih bermasalah, hubungi tim customer support kami via WhatsApp.',
        ],
    ];
@endphp

<div x-data="{
        activeCat: 'all',
        search: '',
        get filteredFaqs() {
            return {{ Js::from($faqs) }}.filter(f => {
                const matchCat = this.activeCat === 'all' || f.cat === this.activeCat;
                const matchSearch = !this.search || f.q.toLowerCase().includes(this.search.toLowerCase()) || f.a.toLowerCase().includes(this.search.toLowerCase());
                return matchCat && matchSearch;
            });
        }
     }"
     class="bg-stone-50 min-h-screen">

    {{-- HERO SECTION --}}
    <section class="bg-[#09251C] py-16 md:py-20 relative overflow-hidden text-center">
        <div class="absolute top-0 right-0 w-64 h-64 bg-orange-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-emerald-500/10 rounded-full blur-3xl"></div>

        <div class="relative z-10 max-w-3xl mx-auto px-4">
            <span class="text-xs font-bold text-orange-400 uppercase tracking-[0.2em] mb-3 block">
                Pusat Bantuan
            </span>
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">
                Ada yang Bisa Kami Bantu?
            </h1>
            <p class="text-stone-300 text-base md:text-lg leading-relaxed mb-8">
                Temukan jawaban dari pertanyaan yang paling sering ditanyakan seputar properti.
            </p>

            {{-- SEARCH BAR --}}
            <div class="relative max-w-xl mx-auto">
                <i data-lucide="search" class="w-5 h-5 absolute left-4 top-1/2 -translate-y-1/2 text-stone-400"></i>
                <input type="text"
                       x-model="search"
                       placeholder="Cari pertanyaan (misal: KPR, DP, sertifikat)..."
                       class="w-full h-14 pl-12 pr-4 rounded-2xl bg-white border-2 border-transparent focus:border-orange-400 outline-none text-stone-900 placeholder-stone-400 text-sm shadow-xl transition">
                <button
                    x-show="search"
                    @click="search = ''"
                    class="absolute right-3 top-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-stone-100 text-stone-500 hover:bg-stone-200 flex items-center justify-center transition">
                    <i data-lucide="x" class="w-4 h-4"></i>
                </button>
            </div>
        </div>
    </section>

    {{-- KATEGORI FILTER --}}
    <section class="py-8 border-b border-stone-200 bg-white sticky top-20 z-30 shadow-sm">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-wrap justify-center gap-2">
                @foreach($faqCategories as $key => $cat)
                    <button
                        @click="activeCat = '{{ $key }}'"
                        :class="activeCat === '{{ $key }}' ? 'bg-orange-500 text-white shadow-md border-orange-500' : 'bg-white text-stone-600 border-stone-200 hover:border-orange-300'"
                        class="flex items-center gap-2 px-4 py-2 rounded-full text-xs sm:text-sm font-bold border-2 transition-all duration-300">
                        <i data-lucide="{{ $cat['icon'] }}" class="w-3.5 h-3.5"></i>
                        <span>{{ $cat['label'] }}</span>
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    {{-- LIST FAQ --}}
    <section class="py-12 md:py-16 max-w-4xl mx-auto px-4">
        {{-- Counter --}}
        <div class="mb-6 flex items-center justify-between">
            <p class="text-sm text-stone-500">
                Menampilkan <span class="font-bold text-stone-900" x-text="filteredFaqs.length"></span> pertanyaan
            </p>
            <button
                x-show="activeCat !== 'all' || search"
                @click="activeCat = 'all'; search = ''"
                class="text-xs font-semibold text-orange-600 hover:underline flex items-center gap-1">
                <i data-lucide="rotate-ccw" class="w-3.5 h-3.5"></i> Reset
            </button>
        </div>

        {{-- Accordion --}}
        <div class="space-y-3">
            <template x-for="(faq, index) in filteredFaqs" :key="index">
                <div x-data="{ open: false }"
                     class="bg-white rounded-2xl border border-stone-200 overflow-hidden transition-all duration-200 hover:border-orange-200"
                     :class="open ? 'shadow-md border-orange-300' : 'shadow-sm'">
                    <button
                        @click="open = !open"
                        class="w-full flex items-start gap-4 p-5 text-left">
                        <div class="shrink-0 w-8 h-8 rounded-lg bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-sm"
                             x-text="index + 1"></div>
                        <div class="flex-1 min-w-0">
                            <h3 class="text-sm md:text-base font-bold text-stone-900 leading-snug pr-4"
                                x-text="faq.q"></h3>
                        </div>
                        <div class="shrink-0 w-8 h-8 rounded-full bg-stone-100 text-stone-500 flex items-center justify-center transition-transform duration-300"
                             :class="open ? 'rotate-180 bg-orange-100 text-orange-600' : ''">
                            <i data-lucide="chevron-down" class="w-4 h-4"></i>
                        </div>
                    </button>

                    <div x-show="open"
                         x-collapse
                         class="px-5 pb-5 pt-0">
                        <div class="pl-12">
                            <p class="text-sm text-stone-600 leading-relaxed"
                               x-text="faq.a"></p>
                        </div>
                    </div>
                </div>
            </template>
        </div>

        {{-- Empty State --}}
        <div x-show="filteredFaqs.length === 0" class="text-center py-16">
            <div class="w-20 h-20 mx-auto rounded-full bg-stone-100 flex items-center justify-center mb-4">
                <i data-lucide="search-x" class="w-10 h-10 text-stone-400"></i>
            </div>
            <h3 class="text-lg font-bold text-stone-900 mb-2">Tidak ada pertanyaan ditemukan</h3>
            <p class="text-sm text-stone-500 mb-6">Coba kata kunci lain atau reset filter.</p>
            <button @click="activeCat = 'all'; search = ''"
                    class="px-5 py-2.5 rounded-xl bg-orange-500 hover:bg-orange-600 text-white text-sm font-bold transition">
                Reset Pencarian
            </button>
        </div>
    </section>

    {{-- CTA KONTAK --}}
    <section class="pb-20 max-w-4xl mx-auto px-4">
        <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-3xl p-8 md:p-12 text-center relative overflow-hidden">
            <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-48 h-48 bg-black/10 rounded-full blur-2xl"></div>

            <div class="relative z-10">
                <div class="w-16 h-16 bg-white/20 backdrop-blur rounded-2xl flex items-center justify-center mx-auto mb-5">
                    <i data-lucide="message-circle" class="w-8 h-8 text-white"></i>
                </div>
                <h2 class="text-2xl md:text-3xl font-bold text-white mb-3">
                    Masih punya pertanyaan?
                </h2>
                <p class="text-orange-50 mb-6 max-w-lg mx-auto">
                    Tim customer support kami siap membantu Anda. Hubungi kami via WhatsApp untuk respon tercepat.
                </p>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', config('company.whatsapp', '')) }}?text={{ rawurlencode('Halo, saya ingin bertanya seputar layanan ' . config('company.name')) }}"
                   target="_blank"
                   rel="noopener"
                   class="inline-flex items-center gap-2 px-6 py-3 bg-white text-orange-600 font-bold rounded-xl hover:bg-orange-50 transition shadow-lg">
                    <i data-lucide="message-circle" class="w-5 h-5"></i>
                    Chat via WhatsApp
                </a>
            </div>
        </div>
    </section>

</div>

@endsection
