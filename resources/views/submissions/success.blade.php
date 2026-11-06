@extends('components.layout.app')

@section('title', 'Pengajuan Berhasil — ' . config('company.name'))

@section('content')
<div class="bg-stone-50 min-h-screen py-16 flex items-center justify-center">
    <div class="max-w-lg mx-auto px-4 w-full">

        {{-- Icon Sukses --}}
        <div class="text-center mb-8">
            <div class="w-20 h-20 bg-emerald-100 text-emerald-500 rounded-full flex items-center justify-center mx-auto mb-5 shadow-sm">
                <i data-lucide="check-circle-2" class="w-10 h-10"></i>
            </div>
            <h1 class="text-3xl font-bold text-stone-900 mb-2">Pengajuan Diterima!</h1>
            <p class="text-stone-600">Terima kasih, <span class="font-bold">{{ $submission->submitter_name }}</span>. Tim kami akan segera memverifikasi data properti Anda.</p>
            <div class="mt-4 inline-block bg-stone-200 px-4 py-1.5 rounded-full text-sm font-bold text-stone-700">
                Kode: {{ $submission->submission_code }}
            </div>
        </div>

        {{-- Card Agent --}}
        @if($submission->agent)
        <div class="bg-white rounded-3xl p-6 border border-stone-200 shadow-xl text-center relative overflow-hidden">
            <div class="absolute top-0 right-0 w-32 h-32 bg-orange-50 rounded-bl-full pointer-events-none"></div>

            <p class="text-xs font-bold text-stone-400 uppercase tracking-wider mb-4 relative z-10">Agent yang akan menghubungi Anda</p>

            <img src="{{ $submission->agent->photo ? asset($submission->agent->photo) : asset('images/agents/agent.png') }}"
                 alt="{{ $submission->agent->name }}"
                 class="w-24 h-24 rounded-full object-cover mx-auto border-4 border-white shadow-lg relative z-10 mb-4">

            <h3 class="text-xl font-bold text-stone-900 relative z-10">{{ $submission->agent->name }}</h3>
            <p class="text-sm text-stone-500 mt-1 relative z-10">Spesialis {{ $submission->agent->areas->first()?->name ?? 'Jember' }}</p>

            <div class="mt-6 relative z-10">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $submission->agent->whatsapp ?? $submission->agent->phone) }}?text={{ rawurlencode('Halo ' . $submission->agent->name . ', saya baru saja mengajukan properti dengan kode ' . $submission->submission_code) }}"
                   target="_blank" rel="noopener"
                   class="w-full h-12 rounded-xl bg-emerald-500 hover:bg-emerald-600 text-white font-bold flex items-center justify-center gap-2 transition shadow-lg shadow-emerald-500/30">
                    <i data-lucide="message-circle" class="w-5 h-5"></i> Hubungi Agent via WA
                </a>
            </div>
        </div>
        @endif

        <div class="mt-8 flex flex-col sm:flex-row gap-3">
            <a href="{{ route('home') }}" class="flex-1 h-12 rounded-xl bg-stone-900 hover:bg-stone-800 text-white font-bold flex items-center justify-center transition">
                Kembali ke Beranda
            </a>
            <a href="{{ route('submissions.create') }}" class="flex-1 h-12 rounded-xl border border-stone-300 hover:bg-stone-100 text-stone-700 font-bold flex items-center justify-center transition">
                Ajukan Properti Lain
            </a>
        </div>
    </div>
</div>
@endsection
