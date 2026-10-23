# Property Card System

Folder ini berisi sistem card properti yang terbagi menjadi 2 varian utama:
**small card** (grid/carousel) dan **featured card** (listing besar).

## Peta File

| File | Peran | Dipakai di |
|---|---|---|
| `card.blade.php` | Card vertikal kecil (4:3) | section, recommendation, detail "serupa" |
| `card-featured.blade.php` | Card vertikal besar (16:9) | properties/index.blade.php |
| `image.blade.php` | Gambar dengan aspect prop | card, card-featured |
| `price.blade.php` | Harga + unit | card, card-featured |
| `location.blade.php` | Area/kecamatan | card, card-featured |
| `specification.blade.php` | Luas, KT, KM | card, card-featured |
| `status.blade.php` | Badge dinamis (inline) | image |
| `agent.blade.php` | Footer agent + WA | card |
| `section.blade.php` | Grid 4 kolom | welcome |
| `recommendation.blade.php` | Carousel horizontal | welcome |

## Cara Memakai Card

### Di homepage (grid 4 kolom)
```blade
<x-property.section
    title="Properti Terpopuler"
    :properties="$popular"
    view-all-url="{{ route('properties.index') }}"
/>
