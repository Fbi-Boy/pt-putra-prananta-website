@props([
    'title' => 'Judul Halaman',
    'description' => null,
])

{{--
    Pemakaian:
    <x-admin.page-header
        title="Daftar Properti"
        description="Kelola semua properti yang terdaftar di sistem."
    >
        <x-slot:actions>
            <x-ui.button>Tambah Properti</x-ui.button>
        </x-slot:actions>
    </x-admin.page-header>
--}}

<div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4 mb-6">
    <div class="min-w-0">
        <h1 class="text-2xl font-bold text-stone-900 tracking-tight">
            {{ $title }}
        </h1>

        @if ($description)
            <p class="mt-1 text-sm text-stone-500 leading-relaxed">
                {{ $description }}
            </p>
        @endif
    </div>

    @isset($actions)
        <div class="flex items-center gap-2 shrink-0">
            {{ $actions }}
        </div>
    @endisset
</div>
