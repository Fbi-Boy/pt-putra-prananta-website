# 01 — Homepage

## Ringkasan

Halaman utama website. Menampilkan highlight properti, developer partner, iklan, news, dan testimoni. Halaman pertama yang dilihat user — harus cepat, informatif, dan mengarahkan ke konversi.

## Route & Controller

| Item | Detail |
|---|---|
| URL | `/` |
| Route Name | `home` |
| Controller | `HomeController@index` |
| Middleware | `web` |
| Layout | `company_profile.layouts.navbar` |

## Tampilan (UI)

Urutan section dari atas ke bawah:

1. **Navbar** — mega menu (Beli, Sewa, Jual, KPR, Cari Agen, Panduan, Lainnya) + CTA Masuk & Jual Properti
2. **Hero Banner** — gambar full-width (`banner-property.png`), tinggi 300px
3. **Search Panel** — floating di bawah banner (overlap), search properti
4. **Menu Kategori** — icon kategori properti (Rumah, Tanah, Ruko, dll)
5. **Developer Logo** — grid 8 logo developer partner
6. **Advertisement** — banner iklan (slot `home-mid`)
7. **Rekomendasi Properti** — 8 properti `is_recommended = true`
8. **Properti Terpopuler** — 8 properti `view_count` tertinggi
9. **Properti Terbaru** — 8 properti `published_at` terbaru (background `bg-orange-50`)
10. **News Preview** — 3-4 artikel terbaru
11. **Testimoni** — card testimoni carousel
12. **Footer** — info perusahaan, link, sosmed, kontak kantor

## Komponen
