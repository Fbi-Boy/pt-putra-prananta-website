# SITEMAP — PT Putra Prananta Property

> **Versi:** 1.0  
> **Terakhir update:** 2026-10-19  
> **Base URL:** `/`  
> **Auth:** Google OAuth (user) + Manual/Google (admin)  
> **Role:** `user`, `admin`

---

## 📋 Daftar Isi

1. [Struktur Utama](#struktur-utama)
2. [Public Pages](#-public-pages-user-facing)
3. [Auth Pages](#-auth-pages)
4. [User Dashboard](#-user-dashboard-auth-required)
5. [Admin/CRM](#-admincrm-admin-only)
6. [Route Naming Convention](#route-naming-convention)
7. [Middleware Mapping](#middleware-mapping)
8. [Prioritas Development](#prioritas-development)

---

## Struktur Utama

```
/                                    → Homepage
├── /beli                            → Listing properti dijual
├── /sewa                            → Listing properti disewa
├── /jual                            → Landing "jual properti"
├── /kpr                             → Hub KPR (kalkulator + listing)
│   ├── /kpr/simulasi                → Kalkulator mandiri
│   ├── /kpr/properti                → Listing properti KPR
│   └── /kpr/ajukan                  → Form pengajuan
├── /cari-agent                      → Direktori agen
├── /panduan                         → Artikel & panduan
├── /properti/{slug}                 → Detail properti
├── /agen/{slug}                     → Profil agen
├── /news                            → Blog/berita
├── /news/{slug}                     → Detail berita
├── /lainnya                         → Hub menu lainnya
│   ├── /tentang-kami
│   ├── /tim-kami
│   ├── /karier
│   ├── /hubungi-kami
│   ├── /faq
│   ├── /kebijakan-privasi
│   └── /syarat-ketentuan
│
├── /auth
│   ├── /auth/google                 → Redirect ke Google
│   ├── /auth/google/callback        → Callback Google
│   ├── /auth/login                  → Login admin (manual)
│   └── /auth/logout                 → Logout
│
├── /favorit                         → Favorit user (auth)
├── /profil                          → Profil user (auth)
├── /profil/edit                     → Edit profil (auth)
├── /riwayat                         → Riwayat inquiry & KPR (auth)
│
└── /admin                           → Admin panel (admin only)
    ├── /admin/dashboard
    ├── /admin/properties
    ├── /admin/agents
    ├── /admin/areas
    ├── /admin/property-types
    ├── /admin/facilities
    ├── /admin/banks
    ├── /admin/inquiries
    ├── /admin/kpr-applications
    ├── /admin/testimonials
    ├── /admin/news
    ├── /admin/developers
    ├── /admin/advertisements
    └── /admin/users
```

---

## 🌐 PUBLIC PAGES (User-Facing)

### 1. Homepage

| Item | Detail |
|---|---|
| **Route** | `GET /` |
| **Name** | `home` |
| **Controller** | `HomeController@index` |
| **Middleware** | `web` |
| **Fitur** | Hero banner, search panel, menu kategori, developer logo, advertisement, rekomendasi properti, properti populer, properti terbaru, news, testimonial |

**Komponen:**
- `x-public.navbar`
- `x-public.search-panel`
- `x-public.menu`
- `x-public.developer-logo`
- `x-public.advertisement`
- `x-property.recommendation` (is_recommended = true)
- `x-property.section` (populer — view_count desc)
- `x-property.section` (terbaru — published_at desc)
- `x-public.news`
- `x-public.testimonial-card`
- `x-public.footer`

---

### 2. Beli Properti

| Item | Detail |
|---|---|
| **Route** | `GET /beli` |
| **Name** | `company.beli` |
| **Controller** | `PropertyController@index` (listing_type = sale) |
| **Middleware** | `web` |
| **Query params** | `?area=kaliwates&type=rumah&price_min=500000000&price_max=1000000000&bedrooms=3&sort=latest` |

**Fitur:**
- Filter: area, tipe properti, range harga, kamar tidur, kamar mandi, sertifikat, fasilitas
- Sort: terbaru, termurah, termahal, terpopuler
- Pagination: 12 per halaman
- Grid/List toggle
- Empty state

---

### 3. Sewa Properti

| Item | Detail |
|---|---|
| **Route** | `GET /sewa` |
| **Name** | `company.sewa` |
| **Controller** | `PropertyController@index` (listing_type = rent) |
| **Middleware** | `web` |
| **Query params** | `?area=&type=&price_min=&price_max=&price_unit=month&sort=` |

**Fitur:** Sama seperti Beli, ditambah filter **periode sewa** (harian/bulanan/tahunan).

---

### 4. Detail Properti

| Item | Detail |
|---|---|
| **Route** | `GET /properti/{slug}` |
| **Name** | `property.show` |
| **Controller** | `PropertyController@show` |
| **Middleware** | `web` |

**Fitur:**
- Galeri gambar (3 varian: thumb → medium → large dengan lightbox)
- Video embed (lazy-load YouTube/Vimeo)
- **Fake coordinate map** (Leaflet + circle radius 500m, tanpa marker)
- Spesifikasi lengkap (luas, kamar, sertifikat, dll)
- Fasilitas (checklist)
- **Simulasi KPR per bank** (kalau `is_kpr_eligible`)
- Info agent + CTA WhatsApp (langsung ke WA agent)
- Form inquiry (kalau user login — auto-isi)
- Properti serupa (same area, same type)
- Tombol favorit (wajib login)
- Badge dinamis (TURUN HARGA / BARU / REKOMENDASI)
- Increment `view_count`

---

### 5. Jual Properti

| Item | Detail |
|---|---|
| **Route** | `GET /jual` |
| **Name** | `company.jual` |
| **Controller** | `CompanyProfileController@jual` |
| **Middleware** | `web` |

**Fitur:**
- Hero "Mau jual properti?"
- 3 langkah: Pemasaran → Pendampingan → Administrasi
- CTA "Mulai Jual Properti" → form inquiry (`source = jual`)
- Testimoni penjual

---

### 6. KPR Hub

| Route | Name | Controller | Fitur |
|---|---|---|---|
| `GET /kpr` | `company.kpr` | `KprController@index` | Hub utama: hero, 4 tools, CTA |
| `GET /kpr/simulasi` | `kpr.simulasi` | `KprController@simulasi` | Kalkulator mandiri (tanpa properti) |
| `GET /kpr/properti` | `kpr.properties` | `KprController@properties` | Listing properti `is_kpr_eligible = true` |
| `POST /kpr/ajukan` | `kpr.submit` | `KprController@submit` | Form pengajuan → simpan `kpr_applications` |

**Fitur KPR Hub (`/kpr`):**
- Hero "Siapkan rumah impian Anda"
- 4 tools card: Simulasi KPR, Cek Cicilan, Hitung DP, Cek Kemampuan
- CTA "Mulai Simulasi"
- Panduan KPR links: Syarat, Dokumen, Alur, Tips

**Fitur Kalkulator (`/kpr/simulasi`):**
- Input: harga properti, DP, tenor, bank (dropdown dari `banks`)
- Output real-time: cicilan bulanan, total bunga, total pembayaran
- Tombol "Ajukan KPR" → form `kpr.submit`
- Bisa tanpa properti (dari kalkulator mandiri)

**Fitur Listing KPR (`/kpr/properti`):**
- Filter properti `is_kpr_eligible = true`
- Card properti menampilkan **perbandingan bank**:
  ```
  BCA 6.5jt  |  BRI 6.2jt  |  Mandiri 6.8jt
  ```

**Fitur Ajukan KPR (`POST /kpr/ajukan`):**
- Form: nama, phone, email, property_price, DP, tenor, bank
- Snapshot: `property_price`, `interest_rate`, `monthly_installment`
- Status awal: `submitted`
- Redirect ke halaman sukses

---

### 7. Cari Agent

| Item | Detail |
|---|---|
| **Route** | `GET /cari-agent` |
| **Name** | `company.cari-agent` |
| **Controller** | `AgentController@index` |
| **Query params** | `?area=kaliwates` |

**Fitur:**
- Grid agen (foto, nama, area, jumlah properti)
- Filter by kecamatan (dari `agent_areas`)
- Search by nama
- CTA WhatsApp per agen
- Link ke profil agen

---

### 8. Profil Agen

| Item | Detail |
|---|---|
| **Route** | `GET /agen/{slug}` |
| **Name** | `agent.show` |
| **Controller** | `AgentController@show` |

**Fitur:**
- Foto, nama, bio
- Area yang dipegang (badge per kecamatan)
- Kontak: phone, WhatsApp, email
- Listing properti agen (grid)
- CTA WhatsApp

---

### 9. Panduan

| Item | Detail |
|---|---|
| **Route** | `GET /panduan` |
| **Name** | `company.panduan` |
| **Controller** | `CompanyProfileController@panduan` |

**Fitur:**
- Artikel panduan properti (dari `news` dengan `category = 'Panduan'`)
- Card: Cara Membeli Rumah, Cek Legalitas, Panduan KPR, Tips Menjual
- Link ke `/news/{slug}`

---

### 10. News / Blog

| Route | Name | Controller | Fitur |
|---|---|---|---|
| `GET /news` | `news.index` | `NewsController@index` | Listing artikel + filter kategori |
| `GET /news/{slug}` | `news.show` | `NewsController@show` | Detail artikel + related |

**Fitur `/news`:**
- Grid artikel (thumbnail, judul, excerpt, tanggal)
- Filter kategori: Tips, Berita, Pasar Properti
- Pagination 9 per halaman
- SEO: meta title, description, OG image

**Fitur `/news/{slug}`:**
- Konten artikel
- Meta: author, tanggal publish, kategori
- Related articles (same category)
- Share buttons

---

### 11. Lainnya — Hub Menu

| Route | Name | Controller | Konten |
|---|---|---|---|
| `GET /tentang-kami` | `company.about` | `CompanyProfileController@about` | Sejarah, visi, misi, nilai |
| `GET /tim-kami` | `company.team` | `CompanyProfileController@team` | Grid agen & staff |
| `GET /karier` | `company.career` | `CompanyProfileController@career` | Lowongan |
| `GET /hubungi-kami` | `company.contact` | `CompanyProfileController@contact` | Form kontak + map kantor + info |
| `GET /faq` | `company.faq` | `CompanyProfileController@faq` | FAQ accordion |
| `GET /kebijakan-privasi` | `company.privacy` | `CompanyProfileController@privacy` | Kebijakan privasi |
| `GET /syarat-ketentuan` | `company.terms` | `CompanyProfileController@terms` | Syarat & ketentuan |

**Fitur `/hubungi-kami`:**
- Form kontak (nama, phone, email, message) → simpan `inquiries` (`source = 'contact'`, tanpa `property_id`/`agent_id`)
- Nomor kantor dari `config('company.*')`
- Map lokasi kantor (pin exact, bukan fake)
- Sosmed links

---

## 🔐 AUTH PAGES

| Route | Name | Controller | Middleware | Fitur |
|---|---|---|---|---|
| `GET /auth/google` | `auth.google` | `GoogleAuthController@redirect` | `guest` | Redirect ke Google OAuth |
| `GET /auth/google/callback` | `auth.google.callback` | `GoogleAuthController@callback` | `guest` | Handle callback, create/login user |
| `GET /auth/login` | `auth.login` | `AuthController@showLogin` | `guest` | Form login admin |
| `POST /auth/login` | `auth.login.post` | `AuthController@login` | `guest` | Proses login admin |
| `POST /auth/logout` | `auth.logout` | `AuthController@logout` | `auth` | Logout |

**Catatan:**
- **User** → login via Google only (tidak ada form manual)
- **Admin** → login manual (`/auth/login`) + bisa Google
- Setelah login user → redirect ke `/` atau intended URL
- Setelah login admin → redirect ke `/admin/dashboard`
- Guest middleware → kalau sudah login, redirect ke home

---

## 👤 USER DASHBOARD (Auth Required)

| Route | Name | Controller | Middleware |
|---|---|---|---|
| `GET /favorit` | `user.favorites` | `FavoriteController@index` | `auth` |
| `POST /favorit/{property}` | `user.favorite.toggle` | `FavoriteController@toggle` | `auth` |
| `GET /profil` | `user.profile` | `ProfileController@show` | `auth` |
| `PUT /profil` | `user.profile.update` | `ProfileController@update` | `auth` |
| `GET /riwayat` | `user.history` | `UserHistoryController@index` | `auth` |

**`/favorit`:**
- Grid properti yang disimpan user
- Tombol hapus dari favorit
- Empty state kalau belum ada

**`/profil`:**
- Info user: nama, email, avatar (dari Google)
- Edit: phone, nama
- Tombol logout

**`/riwayat`:**
- Tab 1: Inquiry terkirim (property, agent, tanggal, status)
- Tab 2: Pengajuan KPR (properti, bank, cicilan, status)
- Filter by status

---

## 🔧 ADMIN/CRM (Admin Only)

**Semua route admin pakai middleware `auth` + `admin`** (custom middleware cek `role === 'admin'`).

**Prefix:** `/admin`  
**Layout:** `components.layout.admin`  
**Komponen:** `components.admin.*` (navbar, sidebar, breadcrumb, stat-card, dll)

### Dashboard

| Route | Controller | Fitur |
|---|---|---|
| `GET /admin/dashboard` | `Admin\DashboardController@index` | Stat cards, activity feed, chart |

**Stat cards:**
- Total properti (published, draft, sold)
- Total agent aktif
- Inquiry baru (7 hari)
- KPR pengajuan (30 hari)
- Total user

---

### Properties

| Route | Controller | Fitur |
|---|---|---|
| `GET /admin/properties` | `Admin\PropertyController@index` | Tabel properti + filter |
| `GET /admin/properties/create` | `Admin\PropertyController@create` | Form tambah |
| `POST /admin/properties` | `Admin\PropertyController@store` | Simpan + upload gambar |
| `GET /admin/properties/{id}/edit` | `Admin\PropertyController@edit` | Form edit |
| `PUT /admin/properties/{id}` | `Admin\PropertyController@update` | Update + proses `price_dropped_at` |
| `DELETE /admin/properties/{id}` | `Admin\PropertyController@destroy` | Soft delete |
| `POST /admin/properties/{id}/publish` | `Admin\PropertyController@publish` | Publish + set `published_at` |
| `POST /admin/properties/{id}/images` | `Admin\PropertyImageController@store` | Upload gambar |
| `DELETE /admin/properties/{id}/images/{imgId}` | `Admin\PropertyImageController@destroy` | Hapus gambar |
| `POST /admin/properties/{id}/images/{imgId}/primary` | `Admin\PropertyImageController@setPrimary` | Set primary |

**Fitur form:**
- Input: title, description, listing_type, property_type, area, agent, address
- Lokasi: latitude, longitude, show_exact_location, map_radius_meter (dengan peta Leaflet)
- Harga: price, price_unit, is_negotiable
- Spesifikasi: land, building, bed, bath, carport, floors, year, certificate
- Marketing: status, is_recommended, is_kpr_eligible
- Video: video_provider, video_id (paste URL YouTube)
- **Multi-upload gambar** (drag & drop) → auto WebP + 3 varian
- Set primary image

---

### Agents

| Route | Controller | Fitur |
|---|---|---|
| `GET /admin/agents` | `Admin\AgentController@index` | Tabel agen |
| `GET /admin/agents/create` | `Admin\AgentController@create` | Form |
| `POST /admin/agents` | `Admin\AgentController@store` | Simpan + **attach area** (multi) |
| `GET /admin/agents/{id}/edit` | `Admin\AgentController@edit` | Form edit |
| `PUT /admin/agents/{id}` | `Admin\AgentController@update` | Update + sync areas |
| `DELETE /admin/agents/{id}` | `Admin\AgentController@destroy` | Hapus |

**Form:**
- Nama, photo, phone, whatsapp, email, bio
- **Multi-select kecamatan** (dari `areas` type=district)
- Set primary area
- is_active, order

---

### Master Data

| Route | Controller | Fitur |
|---|---|---|
| `GET /admin/property-types` | `Admin\PropertyTypeController@index` | CRUD tipe properti |
| `GET /admin/areas` | `Admin\AreaController@index` | Tree area (province → city → district) |
| `GET /admin/facilities` | `Admin\FacilityController@index` | CRUD fasilitas |
| `GET /admin/banks` | `Admin\BankController@index` | CRUD bank |

---

### Inquiries (Leads)

| Route | Controller | Fitur |
|---|---|---|
| `GET /admin/inquiries` | `Admin\InquiryController@index` | Tabel leads + filter |
| `GET /admin/inquiries/{id}` | `Admin\InquiryController@show` | Detail + timeline |
| `PUT /admin/inquiries/{id}` | `Admin\InquiryController@update` | Update status + notes |
| `POST /admin/inquiries/{id}/notes` | `Admin\InquiryController@addNote` | Tambah catatan follow-up |

**Filter:** status (new/contacted/closed), source, agent, tanggal  
**Fitur:** Export CSV, bulk update status

---

### KPR Applications

| Route | Controller | Fitur |
|---|---|---|
| `GET /admin/kpr-applications` | `Admin\KprApplicationController@index` | Tabel pengajuan |
| `GET /admin/kpr-applications/{id}` | `Admin\KprApplicationController@show` | Detail + snapshot angka |
| `PUT /admin/kpr-applications/{id}` | `Admin\KprApplicationController@update` | Update status + notes |

**Filter:** status, bank, tanggal  
**Detail:** semua snapshot (property_price, interest_rate, monthly_installment)

---

### Content

| Route | Controller | Fitur |
|---|---|---|
| `GET /admin/testimonials` | `Admin\TestimonialController@index` | CRUD testimoni |
| `GET /admin/news` | `Admin\NewsController@index` | CRUD artikel |
| `GET /admin/developers` | `Admin\DeveloperController@index` | CRUD developer |
| `GET /admin/advertisements` | `Admin\AdvertisementController@index` | CRUD banner |

**News form:**
- Title, slug (auto), excerpt, content (rich text editor)
- Image upload
- Category (dropdown)
- is_published, published_at
- Preview

**Advertisement form:**
- Image, link, position, is_active
- start_date, end_date
- Preview

---

### Users

| Route | Controller | Fitur |
|---|---|---|
| `GET /admin/users` | `Admin\UserController@index` | Tabel user |
| `GET /admin/users/{id}` | `Admin\UserController@show` | Detail user + aktivitas |
| `PUT /admin/users/{id}` | `Admin\UserController@update` | Update role, is_active |

**Fitur:**
- Filter by role
- Toggle is_active
- Promote user → admin
- Lihat riwayat inquiry & favorit user

---

## 🏷️ Route Naming Convention

**Format:** `{domain}.{action}`

| Domain | Contoh |
|---|---|
| Company profile | `company.beli`, `company.sewa`, `company.jual`, `company.kpr` |
| Property | `property.show` |
| Agent | `agent.show` |
| News | `news.index`, `news.show` |
| KPR | `kpr.simulasi`, `kpr.properties`, `kpr.submit` |
| Auth | `auth.google`, `auth.login`, `auth.logout` |
| User | `user.favorites`, `user.profile`, `user.history` |
| Admin | `admin.properties.index`, `admin.properties.create`, dll |

**Helper di blade:**
```blade
{{ route('property.show', $property->slug) }}
{{ route('company.beli') }}
{{ route('admin.properties.index') }}
```

---

## 🛡️ Middleware Mapping

| Route Group | Middleware | Efek |
|---|---|---|
| Public (home, beli, sewa, dll) | `web` | Guest & user bisa akses |
| `/auth/*` | `web`, `guest` | Kalau sudah login → redirect home |
| `/favorit`, `/profil`, `/riwayat` | `web`, `auth` | Wajib login |
| `/admin/*` | `web`, `auth`, `admin` | Wajib login + role = admin |

**Custom middleware `admin`:**
```php
// app/Http/Middleware/EnsureUserIsAdmin.php
public function handle($request, Closure $next) {
    if (! auth()->check() || auth()->user()->role !== 'admin') {
        abort(403, 'Akses ditolak.');
    }
    return $next($request);
}
```

---

## 🎯 Prioritas Development

### 🔴 Fase 1 — Public Core (Sekarang)
```
1. Home (refactor dari mock → DB)          ← Blocking
2. Detail properti                          ← Fitur utama
3. Beli (listing + filter)                  ← Fitur utama
4. Sewa (listing + filter)                  ← Fitur utama
5. Cari agent + profil agent                ← Fitur utama
```

### 🟡 Fase 2 — KPR & Content
```
6. KPR hub + kalkulator                     ← Fitur pembeda
7. KPR listing properti
8. News (listing + detail)                  ← SEO
9. Panduan
10. Lainnya (tentang, tim, hubungi, dll)
```

### 🟢 Fase 3 — Auth & User
```
11. Google OAuth
12. Favorit (wajib login)
13. Profil user
14. Riwayat
```

### 🔵 Fase 4 — Admin/CRM
```
15. Admin dashboard
16. CRUD Properties (upload gambar, video, fake coord)
17. CRUD Agents (multi-area)
18. CRUD Master (types, areas, banks, facilities)
19. Inquiries management
20. KPR applications management
21. Content (testimonials, news, developers, ads)
22. Users management
```

---

## 📝 Catatan Penting

### URL Slug Rules
- Proper properties: `/properti/rumah-minimalis-kaliwates-abc123`
- Agent: `/agen/budi-santoso`
- News: `/news/cara-cek-shm`

### Query Params (Filter)
Semua filter pakai **query string** — bukan POST:
```
/beli?area=kaliwates&type=rumah&price_min=500000000&price_max=1000000000
/sewa?area=sumbersari&price_unit=month&sort=termurah
/cari-agent?area=patrang
```

**Alasan:** SEO-friendly (bisa di-share, di-bookmark, di-crawl Google).

### Redirect Rules
- Guest akses `/favorit` → redirect `/auth/google` (intended URL saved)
- Setelah login → redirect ke intended URL (fallback `/`)
- Admin akses `/admin/*` tanpa login → redirect `/auth/login`
- User biasa akses `/admin/*` → 403

### 404 Handling
- Properti `slug` tidak ada → 404 custom page
- Properti `status != published` → 404 (kecuali admin)
- Agent nonaktif → 404

---

## Changelog

### v1.0 — 2026-10-19
- Initial sitemap — 40+ route
- 5 domain: Public, Auth, User, Admin, Master
- Route naming convention
- Middleware mapping
- 4 fase prioritas development

---

**Dokumen ini adalah referensi tunggal (single source of truth) untuk navigasi website. Setiap penambahan route wajib update dokumen ini.**
