<div x-show="openLogin" x-cloak class="fixed inset-0 z-[100] flex items-center justify-center p-4 sm:p-6" role="dialog" aria-modal="true">
    {{-- Backdrop --}}
    <div x-show="openLogin" x-transition.opacity class="fixed inset-0 bg-stone-900/60 backdrop-blur-sm" @click="openLogin = false"></div>

    {{-- Panel Modal --}}
    <div x-show="openLogin"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
         class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl p-6 sm:p-8 overflow-hidden z-10">

        {{-- Tombol Tutup --}}
        <button @click="openLogin = false" class="absolute top-4 right-4 w-8 h-8 flex items-center justify-center rounded-full bg-stone-100 text-stone-500 hover:bg-stone-200 transition">
            <i data-lucide="x" class="w-4 h-4"></i>
        </button>

        {{-- Header --}}
        <div class="text-center mb-6">
            <div class="w-14 h-14 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center mx-auto mb-4">
                <i data-lucide="user-round" class="w-7 h-7"></i>
            </div>
            <h3 class="text-2xl font-bold text-stone-900">Selamat Datang Kembali</h3>
            <p class="text-sm text-stone-500 mt-2">Masuk untuk menyimpan properti favorit dan mengelola akun Anda.</p>
        </div>

        {{-- Tombol Google --}}
        <a href="#" class="w-full h-12 rounded-xl border border-stone-300 bg-white hover:bg-stone-50 text-stone-700 font-semibold flex items-center justify-center gap-3 transition mb-5">
            <svg class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
                <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
                <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
                <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
            </svg>
            Lanjutkan dengan Google
        </a>

        {{-- Divider --}}
        <div class="relative flex items-center justify-center mb-5">
            <div class="absolute inset-0 flex items-center"><div class="w-full border-t border-stone-200"></div></div>
            <div class="relative bg-white px-4 text-xs font-semibold text-stone-400 uppercase">Atau</div>
        </div>

        {{-- Form Manual --}}
        <form action="#" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-xs font-bold text-stone-700 mb-1.5">Email</label>
                <input type="email" name="email" placeholder="nama@email.com" required
                       class="w-full h-11 px-4 rounded-xl border border-stone-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none text-sm transition">
            </div>
            <div>
                <div class="flex justify-between items-center mb-1.5">
                    <label class="block text-xs font-bold text-stone-700">Password</label>
                    <a href="#" class="text-xs font-semibold text-orange-600 hover:underline">Lupa Password?</a>
                </div>
                <input type="password" name="password" placeholder="••••••••" required
                       class="w-full h-11 px-4 rounded-xl border border-stone-300 focus:border-orange-500 focus:ring-2 focus:ring-orange-100 outline-none text-sm transition">
            </div>

            <button type="submit" class="w-full h-12 mt-2 bg-stone-900 hover:bg-stone-800 text-white font-bold rounded-xl transition shadow-lg">
                Masuk
            </button>
        </form>

        {{-- Footer --}}
        <p class="mt-6 text-center text-sm text-stone-500">
            Belum punya akun?
            <a href="#" class="font-bold text-orange-600 hover:underline">Daftar Sekarang</a>
        </p>
    </div>
</div>
