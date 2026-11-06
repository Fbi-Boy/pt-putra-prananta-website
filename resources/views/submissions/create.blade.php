@extends('components.layout.app')

@section('title', 'Jual Properti — ' . config('company.name'))

@section('content')
@php
    // Field per langkah: dipakai untuk melompat ke langkah yang punya error dari server.
    $stepFields = [
        0 => ['title', 'property_type_id', 'listing_type', 'description'],
        1 => ['land_area', 'building_area', 'bedrooms', 'bathrooms', 'price', 'area_id', 'address'],
        2 => ['photos', 'submitter_name', 'submitter_phone', 'agent_id'],
    ];
    $errorKeys = collect($errors->keys())->map(fn ($k) => \Illuminate\Support\Str::before($k, '.'))->unique()->all();
    $startStep = 0;
    foreach ($stepFields as $i => $fields) {
        if (array_intersect($fields, $errorKeys)) { $startStep = $i; break; }
    }
    $photoError = $errors->first('photos') ?: collect($errors->get('photos.*'))->flatten()->first();

    $base   = 'w-full rounded-xl border border-stone-400 bg-white text-base text-stone-900 placeholder:text-stone-500 outline-none focus:border-orange-700 focus:ring-2 focus:ring-orange-200 transition';
    $input  = $base . ' h-12 px-4';
    $select = $base . ' h-12 px-3 cursor-pointer';
    $label  = 'block text-sm font-semibold text-stone-800 mb-1.5';
@endphp

<style>
    #submission-form [hidden] { display: none !important; }
    #submission-form [aria-invalid="true"] { border-color: #b91c1c; }
    .field-error { margin-top: .375rem; font-size: .8125rem; font-weight: 500; color: #b91c1c; }
    .field-error:empty { display: none; }
    .no-spin { -moz-appearance: textfield; appearance: textfield; }
    .no-spin::-webkit-outer-spin-button, .no-spin::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }

    /* Stepper */
    .stepper { display: flex; align-items: center; }
    .stepper li { display: flex; align-items: center; flex: 1 1 0; }
    .stepper li:last-child { flex: 0 0 auto; }
    .stepper li:not(:last-child)::after { content: ""; flex: 1; height: 2px; margin: 0 .75rem; border-radius: 2px; background: #d6d3d1; }
    .stepper li.is-done:not(:last-child)::after { background: #292524; }
    .step-btn { display: flex; align-items: center; gap: .625rem; padding: .25rem; border-radius: .5rem; color: #57534e; font-size: .875rem; font-weight: 500; }
    .step-btn:disabled { cursor: not-allowed; }
    .step-dot { display: flex; align-items: center; justify-content: center; width: 2rem; height: 2rem; border-radius: 9999px; border: 2px solid #a8a29e; background: #fff; color: #44403c; font-weight: 700; font-size: .875rem; flex-shrink: 0; }
    .step-name { display: none; }
    .step-check { display: none; }
    .is-active .step-dot { background: #c2410c; border-color: #c2410c; color: #fff; }
    .is-active .step-name { display: inline; color: #1c1917; font-weight: 700; }
    .is-done .step-dot { background: #292524; border-color: #292524; color: #fff; }
    .is-done .step-num { display: none; }
    .is-done .step-check { display: block; }
    @media (min-width: 640px) { .step-name { display: inline; } }

    /* Pilihan jenis transaksi */
    .seg { position: relative; }
    .seg input { position: absolute; inset: 0; width: 100%; height: 100%; opacity: 0; cursor: pointer; }
    .seg span { display: flex; align-items: center; justify-content: center; height: 3rem; border: 1px solid #a8a29e; border-radius: .75rem; background: #fff; color: #44403c; font-weight: 600; font-size: .9375rem; transition: background-color .15s, color .15s; }
    .seg input:checked + span { background: #1c1917; border-color: #1c1917; color: #fff; }
    .seg input:focus-visible + span { outline: 2px solid #c2410c; outline-offset: 2px; }

    /* Dropzone foto */
    .dropzone { display: flex; flex-direction: column; align-items: center; gap: .375rem; padding: 1.5rem 1rem; text-align: center; border: 2px dashed #a8a29e; border-radius: .75rem; background: #fff; cursor: pointer; transition: border-color .15s, background-color .15s; }
    .dropzone:hover, .dropzone.is-over { border-color: #c2410c; background: #fff7ed; }
    .dropzone:focus-within { outline: 2px solid #c2410c; outline-offset: 2px; }

    #submission-form button:focus-visible, #stepper button:focus-visible { outline: 2px solid #c2410c; outline-offset: 2px; }
    @media (prefers-reduced-motion: no-preference) {
        .step-card.is-entering { animation: step-in .18s ease-out; }
        @keyframes step-in { from { opacity: 0; transform: translateY(6px); } to { opacity: 1; transform: none; } }
    }
</style>

<div class="bg-stone-50 min-h-screen pt-8 md:pt-12 pb-10">
    <div class="max-w-2xl mx-auto px-4">

        {{-- Header --}}
        <div class="mb-8">
            <h1 class="text-3xl md:text-4xl font-bold tracking-tight text-stone-900 mb-3">Pasarkan properti Anda</h1>
            <p class="text-stone-700 leading-relaxed">Isi dalam 3 langkah. Tim kami memverifikasi data Anda sebelum properti tayang di website. Kolom yang boleh dikosongkan diberi tanda (opsional).</p>
        </div>

        @if ($errors->any())
            <div role="alert" class="mb-6 rounded-xl border border-red-300 bg-red-50 p-4 text-sm text-red-800">
                <p class="font-semibold">Pengajuan belum terkirim.</p>
                <p class="mt-1">Perbaiki kolom yang ditandai merah, lalu kirim ulang. Foto perlu dipilih ulang.</p>
            </div>
        @endif

        {{-- Stepper --}}
        <nav aria-label="Langkah pengisian" class="mb-6 scroll-mt-4" id="stepper">
            <ol class="stepper">
                @foreach (['Properti', 'Detail & lokasi', 'Foto & kontak'] as $n => $name)
                    <li>
                        <button type="button" class="step-btn" data-goto="{{ $n }}">
                            <span class="step-dot" aria-hidden="true">
                                <span class="step-num">{{ $n + 1 }}</span>
                                <svg class="step-check" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                            </span>
                            <span class="step-name">{{ $name }}</span>
                        </button>
                    </li>
                @endforeach
            </ol>
            <p id="step-status" class="sr-only" aria-live="polite"></p>
        </nav>

        <form id="submission-form" action="{{ route('submissions.store') }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf

            {{-- LANGKAH 1: PROPERTI --}}
            <section class="step-card bg-white rounded-2xl p-6 md:p-8 border border-stone-200" data-step="0" aria-labelledby="step-title-0" @if ($startStep !== 0) hidden @endif>
                <h2 id="step-title-0" tabindex="-1" class="text-xl font-bold text-stone-900 outline-none">Informasi properti</h2>
                <p class="text-stone-700 text-sm mt-1 mb-6">Mulai dari judul dan jenis properti Anda.</p>

                <div class="space-y-5">
                    <div>
                        <label for="title" class="{{ $label }}">Judul properti</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required aria-describedby="err-title"
                               placeholder="Contoh: Rumah minimalis modern dekat kampus" class="{{ $input }}">
                        <p id="err-title" class="field-error">@error('title'){{ $message }}@enderror</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="property_type_id" class="{{ $label }}">Tipe properti</label>
                            <select id="property_type_id" name="property_type_id" required aria-describedby="err-property_type_id" class="{{ $select }}">
                                <option value="">Pilih tipe</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @selected(old('property_type_id') == $type->id)>{{ $type->name }}</option>
                                @endforeach
                            </select>
                            <p id="err-property_type_id" class="field-error">@error('property_type_id'){{ $message }}@enderror</p>
                        </div>

                        <fieldset>
                            <legend class="{{ $label }}">Jenis transaksi</legend>
                            <div class="grid grid-cols-2 gap-2">
                                <label class="seg">
                                    <input type="radio" name="listing_type" value="sale" @checked(old('listing_type', 'sale') === 'sale')>
                                    <span>Dijual</span>
                                </label>
                                <label class="seg">
                                    <input type="radio" name="listing_type" value="rent" @checked(old('listing_type') === 'rent')>
                                    <span>Disewakan</span>
                                </label>
                            </div>
                            <p id="err-listing_type" class="field-error">@error('listing_type'){{ $message }}@enderror</p>
                        </fieldset>
                    </div>

                    <div>
                        <label for="description" class="{{ $label }}">Deskripsi lengkap <span class="font-normal text-stone-600">(opsional)</span></label>
                        <textarea id="description" name="description" rows="5" aria-describedby="err-description"
                                  placeholder="Jelaskan keunggulan properti, kondisi bangunan, dan fasilitas sekitar."
                                  class="{{ $base }} px-4 py-3 resize-none">{{ old('description') }}</textarea>
                        <p id="err-description" class="field-error">@error('description'){{ $message }}@enderror</p>
                    </div>
                </div>
            </section>

            {{-- LANGKAH 2: DETAIL & LOKASI --}}
            <section class="step-card bg-white rounded-2xl p-6 md:p-8 border border-stone-200" data-step="1" aria-labelledby="step-title-1" @if ($startStep !== 1) hidden @endif>
                <h2 id="step-title-1" tabindex="-1" class="text-xl font-bold text-stone-900 outline-none">Detail dan lokasi</h2>
                <p class="text-stone-700 text-sm mt-1 mb-6">Semakin lengkap, semakin mudah properti Anda ditemukan.</p>

                <div class="space-y-5">
                    <div class="grid grid-cols-2 items-end gap-4">
                        @foreach ([
                            ['land_area', 'Luas tanah', 'm²', '120'],
                            ['building_area', 'Luas bangunan', 'm²', '100'],
                            ['bedrooms', 'Kamar tidur', null, '3'],
                            ['bathrooms', 'Kamar mandi', null, '2'],
                        ] as [$name, $text, $unit, $example])
                            <div>
                                <label for="{{ $name }}" class="{{ $label }}">{{ $text }} <span class="font-normal text-stone-600">(opsional)</span></label>
                                <div class="relative">
                                    <input type="number" inputmode="numeric" min="0" id="{{ $name }}" name="{{ $name }}" value="{{ old($name) }}"
                                           aria-describedby="err-{{ $name }}" placeholder="Contoh: {{ $example }}"
                                           data-msg="Isi angka 0 atau lebih." class="{{ $input }} no-spin {{ $unit ? 'pr-12' : '' }}">
                                    @if ($unit)
                                        <span class="absolute right-4 top-1/2 -translate-y-1/2 text-sm text-stone-600 pointer-events-none">{{ $unit }}</span>
                                    @endif
                                </div>
                                <p id="err-{{ $name }}" class="field-error">@error($name){{ $message }}@enderror</p>
                            </div>
                        @endforeach
                    </div>

                    <div>
                        <label for="price" class="{{ $label }}">Harga</label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 -translate-y-1/2 text-sm font-semibold text-stone-600 pointer-events-none">Rp</span>
                            <input type="number" inputmode="numeric" min="1" id="price" name="price" value="{{ old('price') }}" required
                                   aria-describedby="price-preview err-price" placeholder="Contoh: 850000000"
                                   data-msg="Harga harus lebih dari 0." class="{{ $input }} no-spin pl-12">
                        </div>
                        <p id="price-preview" class="text-sm font-medium text-stone-800 mt-1.5 empty:hidden"></p>
                        <p id="err-price" class="field-error">@error('price'){{ $message }}@enderror</p>
                    </div>

                    <div>
                        <label for="area_id" class="{{ $label }}">Kecamatan</label>
                        <select id="area_id" name="area_id" required aria-describedby="err-area_id" class="{{ $select }}">
                            <option value="">Pilih kecamatan</option>
                            @foreach ($areas as $area)
                                <option value="{{ $area->id }}" @selected(old('area_id') == $area->id)>{{ $area->name }}</option>
                            @endforeach
                        </select>
                        <p id="err-area_id" class="field-error">@error('area_id'){{ $message }}@enderror</p>
                    </div>

                    <div>
                        <label for="address" class="{{ $label }}">Alamat lengkap</label>
                        <input type="text" id="address" name="address" value="{{ old('address') }}" required aria-describedby="err-address"
                               placeholder="Contoh: Jl. Mawar No. 5, RT 02 RW 03" class="{{ $input }}">
                        <p id="err-address" class="field-error">@error('address'){{ $message }}@enderror</p>
                    </div>
                </div>
            </section>

            {{-- LANGKAH 3: FOTO & KONTAK --}}
            <section class="step-card bg-white rounded-2xl p-6 md:p-8 border border-stone-200" data-step="2" aria-labelledby="step-title-2" @if ($startStep !== 2) hidden @endif>
                <h2 id="step-title-2" tabindex="-1" class="text-xl font-bold text-stone-900 outline-none">Foto dan kontak</h2>
                <p class="text-stone-700 text-sm mt-1 mb-6">Tambahkan foto, lalu beri tahu kami cara menghubungi Anda.</p>

                <div class="space-y-5">
                    <div>
                        <span class="{{ $label }}" id="photos-label">Foto properti <span class="font-normal text-stone-600">(opsional)</span></span>
                        <label for="photos" class="dropzone" id="dropzone">
                            <input type="file" id="photos" name="photos[]" multiple accept="image/*" class="sr-only" aria-labelledby="photos-label" aria-describedby="err-photos">
                            <i data-lucide="image-plus" class="w-7 h-7 text-stone-600" aria-hidden="true"></i>
                            <span class="text-sm font-semibold text-stone-900">Pilih foto atau tarik ke sini</span>
                            <span class="text-xs text-stone-600">Bisa pilih lebih dari satu</span>
                        </label>
                        <p id="photo-count" class="text-sm text-stone-700 mt-2 empty:hidden" aria-live="polite"></p>
                        <ul id="photo-grid" class="grid grid-cols-3 sm:grid-cols-4 gap-2 mt-3" hidden></ul>
                        <p id="err-photos" class="field-error">{{ $photoError }}</p>
                    </div>

                    <div class="border-t border-stone-200 pt-5 grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="submitter_name" class="{{ $label }}">Nama Anda</label>
                            <input type="text" id="submitter_name" name="submitter_name" value="{{ old('submitter_name') }}" required autocomplete="name"
                                   aria-describedby="err-submitter_name" placeholder="Nama lengkap" class="{{ $input }}">
                            <p id="err-submitter_name" class="field-error">@error('submitter_name'){{ $message }}@enderror</p>
                        </div>
                        <div>
                            <label for="submitter_phone" class="{{ $label }}">Nomor WhatsApp</label>
                            <input type="tel" inputmode="tel" id="submitter_phone" name="submitter_phone" value="{{ old('submitter_phone') }}" required autocomplete="tel"
                                   pattern="(\+62|62|0)8[0-9]{7,12}" data-msg="Gunakan nomor WhatsApp yang valid, contoh 08123456789."
                                   aria-describedby="err-submitter_phone" placeholder="08xxxxxxxxxx" class="{{ $input }}">
                            <p id="err-submitter_phone" class="field-error">@error('submitter_phone'){{ $message }}@enderror</p>
                        </div>
                        <div class="md:col-span-2">
                            <label for="agent_id" class="{{ $label }}">Agent pendamping</label>
                            <select id="agent_id" name="agent_id" required aria-describedby="agent-hint err-agent_id" class="{{ $select }}">
                                <option value="">Pilih agent</option>
                                @foreach ($agents as $agent)
                                    <option value="{{ $agent->id }}" @selected(old('agent_id') == $agent->id)>{{ $agent->name }} ({{ $agent->areas->first()?->name ?? 'Jember' }})</option>
                                @endforeach
                            </select>
                            <p id="agent-hint" class="text-xs text-stone-600 mt-1.5">Agent ini akan mendampingi pengajuan Anda.</p>
                            <p id="err-agent_id" class="field-error">@error('agent_id'){{ $message }}@enderror</p>
                        </div>
                    </div>

                    <p class="text-xs text-stone-600 leading-relaxed">Dengan mengirim, Anda setuju tim kami menghubungi nomor WhatsApp di atas untuk verifikasi data.</p>
                </div>
            </section>

            {{-- Navigasi (menempel di bawah layar pada HP) --}}
            <div class="sticky bottom-0 z-10 -mx-4 mt-6 px-4 pt-3 pb-[max(0.75rem,env(safe-area-inset-bottom))] bg-stone-50/95 backdrop-blur border-t border-stone-200 md:static md:mx-0 md:px-0 md:pt-0 md:pb-0 md:bg-transparent md:border-0 md:backdrop-blur-none">
                <div class="flex items-center justify-between gap-3">
                    <button type="button" id="btn-back" class="h-12 px-5 rounded-xl border border-stone-400 bg-white text-stone-800 font-semibold hover:bg-stone-100 transition inline-flex items-center gap-2">
                        <i data-lucide="arrow-left" class="w-4 h-4" aria-hidden="true"></i> Kembali
                    </button>

                    <button type="button" id="btn-next" class="flex-1 md:flex-none md:min-w-[200px] h-12 px-6 rounded-xl bg-orange-700 hover:bg-orange-800 text-white font-semibold transition inline-flex items-center justify-center gap-2">
                        Lanjut <i data-lucide="arrow-right" class="w-4 h-4" aria-hidden="true"></i>
                    </button>

                    <button type="submit" id="btn-submit" hidden class="flex-1 md:flex-none md:min-w-[220px] h-12 px-6 rounded-xl bg-orange-700 hover:bg-orange-800 disabled:opacity-70 disabled:cursor-wait text-white font-semibold transition inline-flex items-center justify-center gap-2">
                        <svg id="submit-spinner" hidden class="w-5 h-5 animate-spin" viewBox="0 0 24 24" fill="none" aria-hidden="true"><circle cx="12" cy="12" r="9" stroke="currentColor" stroke-opacity=".3" stroke-width="3"/><path d="M21 12a9 9 0 0 0-9-9" stroke="currentColor" stroke-width="3" stroke-linecap="round"/></svg>
                        <i data-lucide="send" id="submit-icon" class="w-4 h-4" aria-hidden="true"></i>
                        <span id="submit-label">Kirim pengajuan</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
(() => {
    const form = document.getElementById('submission-form');
    const panels = [...form.querySelectorAll('[data-step]')];
    const stepItems = [...document.querySelectorAll('#stepper li')];
    const stepper = document.getElementById('stepper');
    const status = document.getElementById('step-status');
    const backBtn = document.getElementById('btn-back');
    const nextBtn = document.getElementById('btn-next');
    const submitBtn = document.getElementById('btn-submit');
    const names = ['Properti', 'Detail & lokasi', 'Foto & kontak'];
    const last = panels.length - 1;
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let current = {{ $startStep }};
    let reached = {{ $errors->any() ? count($stepFields) - 1 : $startStep }};
    const done = new Set();

    /* ---------- Validasi ---------- */
    const setError = (field, msg) => {
        const el = document.getElementById('err-' + field.name);
        if (el) el.textContent = msg || '';
        if (msg) field.setAttribute('aria-invalid', 'true'); else field.removeAttribute('aria-invalid');
    };

    const messageFor = (f) => {
        const v = f.validity;
        if (v.valueMissing) return f.tagName === 'SELECT' ? 'Pilih salah satu.' : 'Wajib diisi.';
        if (v.patternMismatch || v.typeMismatch || v.rangeUnderflow) return f.dataset.msg || 'Isian belum sesuai.';
        return f.validationMessage;
    };

    // Menandai semua field bermasalah di satu langkah, mengembalikan yang pertama.
    const firstInvalid = (i) => {
        let first = null;
        panels[i].querySelectorAll('input, select, textarea').forEach((f) => {
            if (f.type === 'file' || f.type === 'radio') return;
            if (f.checkValidity()) { setError(f, ''); return; }
            setError(f, messageFor(f));
            first = first || f;
        });
        return first;
    };

    // Error dari server → tandai field-nya.
    form.querySelectorAll('.field-error').forEach((p) => {
        if (!p.textContent.trim()) return;
        const f = form.querySelector('[name="' + p.id.slice(4) + '"]');
        if (f) f.setAttribute('aria-invalid', 'true');
    });

    const clearIfFixed = (e) => {
        const f = e.target;
        if (f.getAttribute && f.getAttribute('aria-invalid') && f.checkValidity()) setError(f, '');
    };
    form.addEventListener('input', clearIfFixed);
    form.addEventListener('change', clearIfFixed);

    /* ---------- Navigasi langkah ---------- */
    const show = (i, focus = true) => {
        current = i;
        reached = Math.max(reached, i);
        panels.forEach((p, k) => { p.hidden = k !== i; });
        stepItems.forEach((li, k) => {
            const b = li.querySelector('button');
            li.classList.toggle('is-active', k === i);
            li.classList.toggle('is-done', done.has(k) && k !== i);
            if (k === i) b.setAttribute('aria-current', 'step'); else b.removeAttribute('aria-current');
            b.disabled = k > reached;
        });
        backBtn.classList.toggle('invisible', i === 0);
        nextBtn.hidden = i === last;
        submitBtn.hidden = i !== last;
        status.textContent = `Langkah ${i + 1} dari ${panels.length}: ${names[i]}`;

        if (focus) {
            panels[i].classList.add('is-entering');
            stepper.scrollIntoView({ block: 'start', behavior: reduceMotion ? 'auto' : 'smooth' });
            panels[i].querySelector('h2').focus({ preventScroll: true });
        }
    };

    const goTo = (k) => {
        if (k > current) {
            const bad = firstInvalid(current);
            if (bad) { bad.focus(); return; }
            done.add(current);
        }
        show(k);
    };

    nextBtn.addEventListener('click', () => goTo(current + 1));
    backBtn.addEventListener('click', () => show(current - 1));
    stepItems.forEach((li, k) => li.querySelector('button').addEventListener('click', () => { if (k <= reached) goTo(k); }));

    // Enter di tengah alur = lanjut, bukan kirim.
    form.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' && e.target.tagName === 'INPUT' && e.target.type !== 'file' && current !== last) {
            e.preventDefault();
            goTo(current + 1);
        }
    });

    /* ---------- Kirim ---------- */
    const setBusy = (busy) => {
        submitBtn.disabled = busy;
        submitBtn.toggleAttribute('aria-busy', busy);
        document.getElementById('submit-spinner').hidden = !busy;
        document.getElementById('submit-icon').hidden = busy;
        document.getElementById('submit-label').textContent = busy ? 'Mengirim…' : 'Kirim pengajuan';
    };

    form.addEventListener('submit', (e) => {
        for (let i = 0; i < panels.length; i++) {
            const bad = firstInvalid(i);
            if (bad) {
                e.preventDefault();
                show(i, false);
                bad.focus();
                return;
            }
            done.add(i);
        }
        setBusy(true);
    });
    window.addEventListener('pageshow', (e) => { if (e.persisted) setBusy(false); });

    /* ---------- Pratinjau harga ---------- */
    const price = document.getElementById('price');
    const pricePreview = document.getElementById('price-preview');
    const fmt = new Intl.NumberFormat('id-ID');
    const updatePrice = () => {
        const n = Number(price.value);
        pricePreview.textContent = price.value && n > 0 ? 'Rp ' + fmt.format(n) : '';
    };
    price.addEventListener('input', updatePrice);
    updatePrice();

    /* ---------- Nomor WhatsApp: buang spasi dan strip ---------- */
    const phone = document.getElementById('submitter_phone');
    phone.addEventListener('blur', () => { phone.value = phone.value.replace(/[\s-]/g, ''); });

    /* ---------- Foto: pratinjau, hapus, tarik-lepas ---------- */
    const input = document.getElementById('photos');
    const dropzone = document.getElementById('dropzone');
    const grid = document.getElementById('photo-grid');
    const count = document.getElementById('photo-count');
    let files = [];
    const keyOf = (f) => [f.name, f.size, f.lastModified].join('-');

    const syncPhotos = () => {
        const dt = new DataTransfer();
        files.forEach((f) => dt.items.add(f));
        input.files = dt.files;

        grid.replaceChildren();
        files.forEach((f, idx) => {
            const url = URL.createObjectURL(f);
            const li = document.createElement('li');
            li.className = 'relative aspect-square rounded-lg overflow-hidden bg-stone-200';

            const img = document.createElement('img');
            img.src = url;
            img.alt = 'Foto ' + (idx + 1);
            img.className = 'w-full h-full object-cover';
            img.onload = () => URL.revokeObjectURL(url);

            const btn = document.createElement('button');
            btn.type = 'button';
            btn.setAttribute('aria-label', 'Hapus foto ' + (idx + 1));
            btn.className = 'absolute top-1 right-1 w-9 h-9 rounded-full bg-stone-900/80 hover:bg-stone-900 text-white flex items-center justify-center';
            btn.innerHTML = '<svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><path d="M18 6 6 18M6 6l12 12"/></svg>';
            btn.addEventListener('click', () => { files.splice(idx, 1); syncPhotos(); });

            li.append(img, btn);
            grid.append(li);
        });
        grid.hidden = !files.length;
        count.textContent = files.length ? files.length + ' foto dipilih' : '';
    };

    const addPhotos = (list) => {
        [...list].filter((f) => f.type.startsWith('image/')).forEach((f) => {
            if (!files.some((x) => keyOf(x) === keyOf(f))) files.push(f);
        });
        syncPhotos();
    };

    input.addEventListener('change', () => addPhotos(input.files));
    ['dragenter', 'dragover'].forEach((t) => dropzone.addEventListener(t, (e) => { e.preventDefault(); dropzone.classList.add('is-over'); }));
    ['dragleave', 'drop'].forEach((t) => dropzone.addEventListener(t, () => dropzone.classList.remove('is-over')));
    dropzone.addEventListener('drop', (e) => { e.preventDefault(); addPhotos(e.dataTransfer.files); });

    /* ---------- Mulai ---------- */
    show(current, false);
})();
</script>
@endsection
