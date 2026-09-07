@props([
    'status' => null,
])

@if ($status)

    <div
        class="absolute top-3 left-3
               px-3 py-1.5
               rounded-lg
               bg-orange-500
               text-white
               text-xs font-bold"
    >
        {{ $status }}
    </div>

@endif