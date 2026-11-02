<x-layout.app>

    <section class="min-h-[70vh] flex items-center justify-center bg-stone-50 py-16">
        <div class="max-w-2xl mx-auto px-4 text-center">

            {{-- Gambar Ilustrasi --}}
            <div class="mb-8 relative">
                {{-- Ornamen Background Orange --}}
                <div class="absolute inset-0 bg-orange-200 blur-3xl opacity-30 rounded-full"></div>

                {{-- Gambar: Mencoba memuat dari lokal, jika gagal (belum ada), pakai gambar dari internet --}}
                <img src="{{ asset('images/coming-soon.jpg') }}"
                     onerror="this.onerror=null; this.src='https://illustrations.popsy.co/amber/under-construction.svg';"
                     alt="Coming Soon"
                     class="relative z-10 w-full max-w-sm mx-auto drop-shadow-xl">
            </div>

            {{-- Teks Dinamis --}}
            <h1 class="text-3xl md:text-5xl font-bold text-stone-900 mb-4 font-serif">
                {{ $pageName }}
            </h1>
            <p class="text-lg text-stone-600 mb-8 max-w-lg mx-auto">
                Halaman ini sedang dalam proses pengembangan. Kami sedang menyiapkan fitur terbaik untuk Anda.
            </p>

            {{-- Tombol Kembali --}}
            <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                <a href="{{ route('home') }}" class="px-6 py-3 rounded-full bg-stone-900 hover:bg-stone-800 text-white font-semibold transition w-full sm:w-auto shadow-md">
                    Kembali ke Beranda
                </a>
                <a href="{{ route('properties.index') }}" class="px-6 py-3 rounded-full border border-orange-500 text-orange-600 font-semibold hover:bg-orange-50 transition w-full sm:w-auto">
                    Lihat Properti
                </a>
            </div>

        </div>
    </section>

</x-layout.app>
