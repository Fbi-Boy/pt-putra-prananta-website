
@props([
    'name',
    'size'        => 16,
    'strokeWidth' => 2,
    'class'       => '',
])

@php
    static $hotIcons = [
        'arrow-right'   => '<path d="M5 12h14"/><path d="m12 5 7 7-7 7"/>',
        'arrow-left'    => '<path d="M19 12H5"/><path d="m12 19-7-7 7-7"/>',
        'arrow-up'      => '<path d="M12 19V5"/><path d="m5 12 7-7 7 7"/>',
        'arrow-down'    => '<path d="M12 5v14"/><path d="m19 12-7 7-7-7"/>',
        'chevron-right' => '<path d="m9 18 6-6-6-6"/>',
        'chevron-left'  => '<path d="m15 18-6-6 6-6"/>',
        'chevron-down'  => '<path d="m6 9 6 6 6-6"/>',
        'plus'          => '<path d="M5 12h14"/><path d="M12 5v14"/>',
        'minus'         => '<path d="M5 12h14"/>',
        'check'         => '<path d="M20 6 9 17l-5-5"/>',
        'x'             => '<path d="M18 6 6 18"/><path d="m6 6 12 12"/>',
        'search'        => '<circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/>',
        'filter'        => '<polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"/>',
        'heart'         => '<path d="M19 14c1.49-1.46 3-3.21 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.76 0-3 .5-4.5 2-1.5-1.5-2.74-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.05 3 5.5l7 7Z"/>',
        'eye'           => '<path d="M2.06 12.35a1 1 0 0 1 0-.7 10.75 10.75 0 0 1 19.88 0 1 1 0 0 1 0 .7 10.75 10.75 0 0 1-19.88 0"/><circle cx="12" cy="12" r="3"/>',
        'thumbs-up'     => '<path d="M7 10v12"/><path d="M15 5.88 14 10h5.83a2 2 0 0 1 1.92 2.56l-2.33 8A2 2 0 0 1 17.5 22H4a2 2 0 0 1-2-2v-8a2 2 0 0 1 2-2h2.76a2 2 0 0 0 1.79-1.11L12 2a3.13 3.13 0 0 1 3 3.88Z"/>',
        'message-circle'=> '<path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z"/>',
        'star'          => '<polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/>',
        'home'          => '<path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/>',
        'phone'         => '<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>',
        'mail'          => '<rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/>',
        'user'          => '<path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/>',
        'menu'          => '<path d="M4 12h16"/><path d="M4 6h16"/><path d="M4 18h16"/>',
        'calendar'      => '<rect width="18" height="18" x="3" y="4" rx="2"/><path d="M16 2v4"/><path d="M8 2v4"/><path d="M3 10h18"/>',
        'clock'         => '<circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/>',
        'download'      => '<path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/>',
        'share'         => '<circle cx="18" cy="5" r="3"/><circle cx="6" cy="12" r="3"/><circle cx="18" cy="19" r="3"/><line x1="8.59" x2="15.42" y1="13.51" y2="17.49"/><line x1="15.41" x2="8.59" y1="6.51" y2="10.49"/>',
        'trash'         => '<path d="M3 6h18"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>',
        'external-link' => '<path d="M15 3h6v6"/><path d="M10 14 21 3"/><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>',
    ];

    $content = $hotIcons[$name] ?? '';

    if ($content === '') {
        $svgPath = resource_path("icons/lucide/{$name}.svg");
        if (!is_file($svgPath)) {
            $svgPath = base_path("node_modules/lucide-static/icons/{$name}.svg");
        }
        if (is_file($svgPath)) {
            $svg = file_get_contents($svgPath);
            if (preg_match('/<svg[^>]*>(.*?)<\/svg>/s', $svg, $m)) {
                $content = trim($m[1]);
            }
        }
    }
@endphp

<svg xmlns="http://www.w3.org/2000/svg"
     width="{{ $size }}"
     height="{{ $size }}"
     viewBox="0 0 24 24"
     fill="none"
     stroke="currentColor"
     stroke-width="{{ $strokeWidth }}"
     stroke-linecap="round"
     stroke-linejoin="round"
     aria-hidden="true"
     class="{{ $class }}">
    {!! $content !!}
</svg>
