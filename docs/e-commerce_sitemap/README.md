cat > e-commerce_sitemap/README.md << 'EOF'
# E-Commerce Sitemap — PT Putra Prananta Property

Folder ini berisi dokumentasi **per halaman** e-commerce. Setiap file = 1 menu/halaman.

## Daftar File

| File | Menu | URL | Status |
|---|---|---|---|
| `01-home.md` | Homepage | `/` | 🟡 Setengah (mock) |
| `02-beli.md` | Beli Properti | `/beli` | ⚠️ Placeholder |
| `03-sewa.md` | Sewa Properti | `/sewa` | ❌ Belum ada |
| `04-properti-detail.md` | Detail Properti | `/properti/{slug}` | ❌ Belum ada |
| `05-jual.md` | Jual Properti | `/jual` | ⚠️ Placeholder |
| `06-kpr.md` | KPR Hub | `/kpr` | ⚠️ Placeholder |
| `07-cari-agent.md` | Cari Agen | `/cari-agent` | ⚠️ Placeholder |
| `08-profil-agen.md` | Profil Agen | `/agen/{slug}` | ❌ Belum ada |
| `09-panduan.md` | Panduan | `/panduan` | ⚠️ Placeholder |
| `10-news.md` | News / Blog | `/news` | ❌ Belum ada |
| `11-lainnya.md` | Lainnya (7 submenu) | `/tentang-kami` dll | ❌ Belum ada |

## Konvensi Setiap File

1. **Ringkasan** — apa halaman ini
2. **Route & Controller** — URL, name, middleware
3. **Tampilan (UI)** — struktur visual & section
4. **Komponen** — Blade component yang dipakai
5. **File Terkait** — controller, view, model, route
6. **Data & Query** — dari tabel mana
7. **Interaksi User** — apa yang bisa user lakukan
8. **Query Params / Filter** — kalau ada
9. **SEO** — meta & structured data
10. **Status & Catatan** — progress + TODO

## Konvensi Path
[isi file]
