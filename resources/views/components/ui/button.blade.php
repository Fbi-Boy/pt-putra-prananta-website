
@props([
    'variant'    => 'solid',
    'size'       => 'md',
    'color'      => null,
    'colorHover' => null,
    'textColor'  => null,
    'icon'       => null,
    'iconRight'  => null,
    'iconOnly'   => false,
    'block'      => false,
    'href'       => null,
    'type'       => 'button',
    'disabled'   => false,
])

@php
    $classes = ['property-btn'];

    if ($variant !== 'solid') $classes[] = "property-btn--{$variant}";
    $classes[] = "property-btn--{$size}";
    if ($iconOnly) $classes[] = 'property-btn--icon';
    if ($block)    $classes[] = 'property-btn--block';

    $styles = [];
    if ($color)      $styles[] = "--btn-bg: {$color}";
    if ($colorHover) $styles[] = "--btn-bg-hover: {$colorHover}";
    if ($textColor)  $styles[] = "--btn-fg: {$textColor}";

    $styleAttr = $styles ? implode('; ', $styles) : null;
    $classAttr = implode(' ', $classes);

    $isLink = $href && !$disabled;
@endphp

@if ($isLink)
    <a href="{{ $href }}"
       class="{{ $classAttr }}"
       @if ($styleAttr) style="{{ $styleAttr }}" @endif
       {{ $attributes }}>
        @if ($icon) <x-ui.icon :name="$icon" /> @endif
        {{ $slot }}
        @if ($iconRight) <x-ui.icon :name="$iconRight" /> @endif
    </a>
@else
    <button type="{{ $type }}"
            class="{{ $classAttr }}"
            @if ($styleAttr) style="{{ $styleAttr }}" @endif
            @disabled($disabled)
            {{ $attributes }}>
        @if ($icon) <x-ui.icon :name="$icon" /> @endif
        {{ $slot }}
        @if ($iconRight) <x-ui.icon :name="$iconRight" /> @endif
    </button>
@endif

