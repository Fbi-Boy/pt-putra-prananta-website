# 📚 DATABASE SCHEMA v1.1 — Final (Per Domain)

> **Database:** `pre-property` (MySQL)  
> **Framework:** Laravel 11  
> **Total:** 17 tabel dalam 6 domain  
> **Update:** Konsep agent login + submission workflow

---

## 🗂️ Overview Domain

| Domain | Tabel | Fungsi |
|---|---|---|
| 🔐 **Auth** | `users` | Login & role (user/agent/admin) |
| 📖 **Master** | `property_types`, `areas`, `banks`, `facilities` | Data referensi |
| 🕵️ **Agent** | `agents`, `agent_areas` | Profil agen + wilayah |
| 🏠 **Core** | `properties`, `property_images`, `property_facilities` | Properti aktif |
| 📬 **Submission** | `property_submissions` | Submission pending verifikasi |
| 💬 **Interaction** | `favorites`, `inquiries`, `kpr_applications` | Aktivitas user |
| 📰 **Content** | `testimonials`, `news`, `developers`, `advertisements` | Konten website |

---

# 🔐 DOMAIN 1 — AUTH

## `users` — Login & Identitas Dasar

**Fungsi:** Autentikasi semua user (customer, agent, admin). Agent punya baris di sini **dan** di tabel `agents`.

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `name` | varchar(255) | ❌ | — | Nama display dasar |
| 3 | `email` | varchar(255) | ❌ | — | **UNIQUE** — untuk login |
| 4 | `email_verified_at` | timestamp | ✅ | NULL | Auto-set saat Google login |
| 5 | `password` | varchar(255) | ✅ | NULL | **Nullable** — user Google tidak punya password |
| 6 | `google_id` | varchar(255) | ✅ | NULL | **UNIQUE** — Google `sub` claim |
| 7 | `avatar` | varchar(255) | ✅ | NULL | URL foto Google |
| 8 | `role` | varchar(20) | ❌ | `'user'` | `user` \| `agent` \| `admin` |
| 9 | `phone` | varchar(20) | ✅ | NULL | Nomor HP user |
| 10 | `is_active` | tinyint(1) | ❌ | `1` | Nonaktif tanpa hapus |
| 11 | `remember_token` | varchar(100) | ✅ | NULL | Laravel default |
| 12 | `created_at` | timestamp | ✅ | NULL | |
| 13 | `updated_at` | timestamp | ✅ | NULL | |

**Index:** `email` (unique), `google_id` (unique), `role`  
**Relasi keluar:** → `favorites`, `inquiries`, `kpr_applications`, `properties.created_by`, `news.author_id`, `agents.user_id` (1:1), `property_submissions.submitted_by`

---

# 📖 DOMAIN 2 — MASTER DATA

## `property_types` — Kamus Tipe Properti

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `name` | varchar(50) | ❌ | — | "Rumah", "Tanah" |
| 3 | `slug` | varchar(50) | ❌ | — | **UNIQUE** |
| 4 | `icon` | varchar(50) | ✅ | NULL | Nama icon Lucide |
| 5 | `is_active` | tinyint(1) | ❌ | `1` | |
| 6 | `order` | int | ❌ | `0` | Urutan tampil |
| 7 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Seed:** Rumah, Tanah, Ruko, Apartemen, Kos, Villa, Gudang, Kantor

---

## `areas` — Kamus Wilayah (Hirarki)

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `name` | varchar(100) | ❌ | — | "Jember", "Kaliwates" |
| 3 | `slug` | varchar(100) | ❌ | — | **UNIQUE** |
| 4 | `type` | varchar(20) | ❌ | `'district'` | `province` \| `city` \| `district` \| `village` |
| 5 | `parent_id` | bigint unsigned | ✅ | NULL | **FK self** → `areas.id` |
| 6 | `is_active` | tinyint(1) | ❌ | `1` | |
| 7 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**FK:** `parent_id` → `areas.id` **SET NULL**  
**Relasi:** → `agents` (M:N via `agent_areas`), → `properties`

**Seed:** Jawa Timur → Jember (+8 kecamatan), Lumajang, Bondowoso, Situbondo, Banyuwangi

---

## `banks` — Kamus Bank KPR

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `name` | varchar(100) | ❌ | — | "Bank Mandiri" |
| 3 | `code` | varchar(20) | ❌ | — | **UNIQUE** — `MANDIRI` |
| 4 | `logo` | varchar(255) | ✅ | NULL | |
| 5 | `interest_rate` | decimal(5,2) | ❌ | `7.50` | Bunga tahunan (%) |
| 6 | `min_tenor` | int | ❌ | `5` | Tahun |
| 7 | `max_tenor` | int | ❌ | `20` | Tahun |
| 8 | `min_dp_percent` | decimal(5,2) | ❌ | `10.00` | DP minimal (%) |
| 9 | `is_active` | tinyint(1) | ❌ | `1` | |
| 10 | `order` | int | ❌ | `0` | |
| 11 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Relasi masuk:** ← `kpr_applications.bank_id`  
**Seed:** Bank Mandiri saja

---

## `facilities` — Kamus Fasilitas

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `name` | varchar(100) | ❌ | — | "AC", "Kolam Renang" |
| 3 | `icon` | varchar(50) | ✅ | NULL | Nama icon Lucide |
| 4 | `is_active` | tinyint(1) | ❌ | `1` | |
| 5 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Relasi:** → `properties` (M:N via `property_facilities`)  
**Seed:** AC, Kolam Renang, Garasi, Taman, Keamanan 24J, CCTV, Dapur Set, Wifi, Parkir Luas, Listrik 2200W

---

# 🕵️ DOMAIN 3 — AGENT

## `agents` — Profil Agent (Bisa Login)

**Fungsi:** Profil agent yang **terhubung ke akun login** (`users`). Agent submit properti & dapat submission dari citizen.

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `user_id` | bigint unsigned | ❌ | — | **FK → users.id** — akun login agent |
| 3 | `name` | varchar(100) | ❌ | — | Nama display agent |
| 4 | `slug` | varchar(150) | ❌ | — | **UNIQUE** — `budi-santoso` |
| 5 | `photo` | varchar(255) | ✅ | NULL | |
| 6 | `phone` | varchar(20) | ❌ | — | HP agent |
| 7 | `whatsapp` | varchar(20) | ✅ | NULL | Format `628xxx` (bisa beda dgn phone) |
| 8 | `email` | varchar(100) | ✅ | NULL | Email bisnis (bisa beda dgn login) |
| 9 | `bio` | text | ✅ | NULL | Deskripsi singkat |
| 10 | `status` | varchar(20) | ❌ | `'pending'` | `pending` \| `active` \| `suspended` \| `rejected` |
| 11 | `verified_at` | timestamp | ✅ | NULL | Kapan admin approve |
| 12 | `verified_by` | bigint unsigned | ✅ | NULL | FK → `users.id` (admin yang approve) |
| 13 | `rejection_reason` | text | ✅ | NULL | Alasan reject |
| 14 | `order` | int | ❌ | `0` | Urutan tampil |
| 15 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `user_id` (unique), `slug` (unique), `status`  
**FK:**
- `user_id` → `users.id` **CASCADE**
- `verified_by` → `users.id` **SET NULL**

**Relasi:**
- `belongsTo` → `User` (akun login)
- `belongsTo` → `User` (verifier, via `verified_by`)
- `hasMany` → `properties`
- `hasMany` → `inquiries`
- `hasMany` → `property_submissions`
- `belongsToMany` → `areas` (via `agent_areas`)

**Business rules:**
- Agent registrasi → `status = 'pending'`, **tidak bisa login** sampai admin approve
- Setelah approve → `status = 'active'`, bisa login via Google
- Hanya agent `active` yang tampil di "Cari Agent" & card properti

---

## `agent_areas` — Pivot Agent ↔ Kecamatan

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `agent_id` | bigint unsigned | ❌ | — | FK → `agents.id` |
| 3 | `area_id` | bigint unsigned | ❌ | — | FK → `areas.id` |
| 4 | `is_primary` | tinyint(1) | ❌ | `0` | Area utama agent |
| 5 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Unique:** `(agent_id, area_id)`  
**Index:** `agent_id`, `area_id`, `(area_id, is_primary)`  
**FK:** keduanya **CASCADE**

**Business rules:**
- 1 agent → 1..N area
- 1 area → 0..N agent (**overlap**)
- `is_primary = true` = area utama

---

# 🏠 DOMAIN 4 — CORE

## `properties` ⭐ — Properti Aktif (Hanya yang Valid)

**Fungsi:** Properti yang **sudah diverifikasi & tayang**. Submission pending TIDAK di sini (ada di `property_submissions`).

### Identitas & Klasifikasi

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `code` | varchar(20) | ❌ | — | **UNIQUE** — `PRP-0001` |
| 3 | `title` | varchar(255) | ❌ | — | |
| 4 | `slug` | varchar(255) | ❌ | — | **UNIQUE** |
| 5 | `description` | longtext | ✅ | NULL | |
| 6 | `listing_type` | enum | ❌ | `'sale'` | `sale` \| `rent` |
| 7 | `property_type_id` | bigint unsigned | ✅ | NULL | FK → `property_types.id` |
| 8 | `area_id` | bigint unsigned | ✅ | NULL | FK → `areas.id` |
| 9 | `agent_id` | bigint unsigned | ✅ | NULL | FK → `agents.id` (nullable) |

### Lokasi & Fake Coordinate

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 10 | `address` | varchar(255) | ✅ | NULL | Tampil publik |
| 11 | `latitude` | decimal(10,8) | ✅ | NULL | Presisi tinggi (internal) |
| 12 | `longitude` | decimal(11,8) | ✅ | NULL | Presisi tinggi (internal) |
| 13 | `show_exact_location` | tinyint(1) | ❌ | `0` | false → lingkaran |
| 14 | `map_radius_meter` | int | ❌ | `500` | Radius lingkaran |

### Harga

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 15 | `price` | bigint | ❌ | `0` | Rupiah |
| 16 | `price_unit` | enum | ✅ | NULL | `day` \| `month` \| `year` (rent) |
| 17 | `price_dropped_at` | timestamp | ✅ | NULL | Badge TURUN HARGA (30 hari) |

### Spesifikasi

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 18 | `land_area` | int | ✅ | NULL | m² |
| 19 | `building_area` | int | ✅ | NULL | m² (NULL = tanah kosong) |
| 20 | `bedrooms` | int | ❌ | `0` | |
| 21 | `bathrooms` | int | ❌ | `0` | |
| 22 | `carports` | int | ❌ | `0` | |
| 23 | `floors` | int | ❌ | `1` | |
| 24 | `year_built` | int | ✅ | NULL | |
| 25 | `certificate` | varchar(50) | ✅ | NULL | SHM, HGB, dll |

### Marketing & Status

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 26 | `status` | enum | ❌ | `'draft'` | `draft` \| `published` \| `sold` \| `rented` \| `archived` |
| 27 | `is_recommended` | tinyint(1) | ❌ | `0` | Tampil di "Rekomendasi" |
| 28 | `is_kpr_eligible` | tinyint(1) | ❌ | `0` | Bisa disimulasikan KPR |
| 29 | `video_provider` | varchar(20) | ✅ | NULL | `youtube` \| `vimeo` |
| 30 | `video_id` | varchar(50) | ✅ | NULL | ID video |
| 31 | `view_count` | int | ❌ | `0` | |
| 32 | `published_at` | timestamp | ✅ | NULL | Badge BARU (7 hari) |

### Submission & Verifikasi (BARU)

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 33 | `submitted_by` | bigint unsigned | ✅ | NULL | FK → `users.id` (siapa submit) |
| 34 | `submission_id` | bigint unsigned | ✅ | NULL | FK → `property_submissions.id` (link ke submission asli) |
| 35 | `verified_by` | bigint unsigned | ✅ | NULL | FK → `users.id` (admin verifikator) |
| 36 | `verified_at` | timestamp | ✅ | NULL | Kapan diverifikasi |

### Audit

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 37 | `created_by` | bigint unsigned | ✅ | NULL | FK → `users.id` (admin input) |
| 38 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |
| 39 | `deleted_at` | timestamp | ✅ | NULL | Soft delete |

**Index:**
```php
$table->unique('code');
$table->unique('slug');
$table->index(['status', 'published_at']);
$table->index(['status', 'area_id', 'property_type_id']);
$table->index(['status', 'listing_type']);
$table->index(['status', 'is_recommended']);
$table->index(['status', 'is_kpr_eligible']);
$table->index('price');
$table->index('agent_id');
```

**FK (semua SET NULL kecuali dinyatakan):**
- `property_type_id`, `area_id`, `agent_id`, `created_by`, `submitted_by`, `verified_by`
- `submission_id` → `property_submissions.id`

**Accessor:** `badge`, `video_embed_url`, `video_thumbnail`, `price_formatted`  
**Scope:** `published()`, `sale()`, `rent()`, `recommended()`, `kprEligible()`

---

## `property_images` — Galeri Foto (3 Varian WebP)

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `property_id` | bigint unsigned | ❌ | — | FK → `properties.id` |
| 3 | `path_thumb` | varchar(255) | ❌ | — | ~30KB, 400px |
| 4 | `path_medium` | varchar(255) | ❌ | — | ~100KB, 800px |
| 5 | `path_large` | varchar(255) | ❌ | — | ~250KB, 1600px |
| 6 | `alt_text` | varchar(255) | ✅ | NULL | SEO |
| 7 | `is_primary` | tinyint(1) | ❌ | `0` | 1 true per properti |
| 8 | `order` | int | ❌ | `0` | Urutan galeri |
| 9 | `file_size_medium` | int unsigned | ✅ | NULL | KB |
| 10 | `width` | smallint unsigned | ✅ | NULL | |
| 11 | `height` | smallint unsigned | ✅ | NULL | |
| 12 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `property_id`, `(property_id, is_primary)`  
**FK:** `property_id` → `properties.id` **CASCADE**

**Business rule:** `is_primary = true` hanya 1 per properti (enforce via model observer)

---

## `property_facilities` — Pivot M:N

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `property_id` | bigint unsigned | ❌ | — | FK → `properties.id` |
| 2 | `facility_id` | bigint unsigned | ❌ | — | FK → `facilities.id` |

**PK:** composite `(property_id, facility_id)` — tanpa `id`, tanpa `timestamps`  
**FK:** keduanya **CASCADE**

---

# 📬 DOMAIN 5 — SUBMISSION

## `property_submissions` 🆕 — Submission Pending Verifikasi

**Fungsi:** Menampung **semua** submission dari citizen & agent. Setelah diverifikasi admin → **copy** ke `properties`. Yang ditolak tetap di sini dengan `status = 'rejected'`.

### Identitas Submission

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `submission_code` | varchar(30) | ❌ | — | **UNIQUE** — `SUB-2026-0001` |
| 3 | `access_token` | varchar(32) | ❌ | — | **UNIQUE** — akses via link tanpa login |

### Siapa yang Submit

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 4 | `submitted_by` | bigint unsigned | ✅ | NULL | FK → `users.id` (kalau login) |
| 5 | `agent_id` | bigint unsigned | ✅ | NULL | FK → `agents.id` (agent yang dipilih) |
| 6 | `submitter_name` | varchar(100) | ❌ | — | Nama pengirim |
| 7 | `submitter_phone` | varchar(20) | ❌ | — | HP pengirim |
| 8 | `submitter_email` | varchar(100) | ✅ | NULL | |

### Data Properti (Subset)

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 9 | `title` | varchar(255) | ❌ | — | |
| 10 | `description` | text | ✅ | NULL | |
| 11 | `listing_type` | enum | ❌ | `'sale'` | `sale` \| `rent` |
| 12 | `property_type_id` | bigint unsigned | ✅ | NULL | FK → `property_types.id` |
| 13 | `area_id` | bigint unsigned | ✅ | NULL | FK → `areas.id` |
| 14 | `address` | varchar(255) | ✅ | NULL | |
| 15 | `price` | bigint | ✅ | NULL | |
| 16 | `land_area` | int | ✅ | NULL | |
| 17 | `building_area` | int | ✅ | NULL | |
| 18 | `bedrooms` | int | ✅ | NULL | |
| 19 | `bathrooms` | int | ✅ | NULL | |
| 20 | `photo_paths` | json | ✅ | NULL | Array path foto temp |

### Status & Verifikasi

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 21 | `status` | varchar(20) | ❌ | `'pending'` | `pending` \| `verified` \| `rejected` \| `converted` |
| 22 | `auto_check_result` | json | ✅ | NULL | Hasil deteksi (duplicate phone, dll) |
| 23 | `verified_by` | bigint unsigned | ✅ | NULL | FK → `users.id` (admin verifikator) |
| 24 | `verified_at` | timestamp | ✅ | NULL | |
| 25 | `rejection_reason` | text | ✅ | NULL | |
| 26 | `admin_notes` | text | ✅ | NULL | Catatan internal |
| 27 | `converted_property_id` | bigint unsigned | ✅ | NULL | FK → `properties.id` (link ke properti jadi) |
| 28 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `submission_code` (unique), `access_token` (unique), `status`, `(status, created_at)`  
**FK:** semua **SET NULL**

**Alur status:**
```
pending → converted  (approved → copy ke properties)
pending → rejected   (fake/tidak valid)
```

**Business rules:**
- Semua submission (citizen & agent) → `status = 'pending'`
- Auto-check: duplicate phone (hari ini), duplicate title+address (30 hari), blacklist
- Team kantor verifikasi → convert ke `properties` atau reject
- Setelah convert, `converted_property_id` terisi → link ke properti jadi
- Foto temp di `storage/app/submissions/{id}/` → dipindah ke `storage/app/public/properties/{id}/` saat convert

---

# 💬 DOMAIN 6 — INTERACTION

## `favorites` — Properti Tersimpan

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `user_id` | bigint unsigned | ❌ | — | FK → `users.id` |
| 3 | `property_id` | bigint unsigned | ❌ | — | FK → `properties.id` |
| 4 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Unique:** `(user_id, property_id)`  
**FK:** keduanya **CASCADE**

---

## `inquiries` — Leads Masuk

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `user_id` | bigint unsigned | ✅ | NULL | FK → `users.id` (kalau login) |
| 3 | `property_id` | bigint unsigned | ✅ | NULL | FK → `properties.id` |
| 4 | `agent_id` | bigint unsigned | ✅ | NULL | FK → `agents.id` |
| 5 | `name` | varchar(100) | ❌ | — | Nama pengirim |
| 6 | `phone` | varchar(20) | ❌ | — | |
| 7 | `email` | varchar(100) | ✅ | NULL | |
| 8 | `message` | text | ✅ | NULL | |
| 9 | `source` | varchar(30) | ❌ | `'website'` | `website` \| `whatsapp` \| `phone` |
| 10 | `status` | varchar(20) | ❌ | `'new'` | `new` \| `contacted` \| `closed` |
| 11 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `status`, `property_id`, `agent_id`  
**FK:** semua **SET NULL**

---

## `kpr_applications` — Pengajuan KPR

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `user_id` | bigint unsigned | ✅ | NULL | FK → `users.id` |
| 3 | `property_id` | bigint unsigned | ✅ | NULL | FK → `properties.id` |
| 4 | `bank_id` | bigint unsigned | ✅ | NULL | FK → `banks.id` |
| 5 | `name` | varchar(100) | ❌ | — | |
| 6 | `phone` | varchar(20) | ❌ | — | |
| 7 | `email` | varchar(100) | ✅ | NULL | |
| 8 | `property_price` | bigint | ❌ | — | **Snapshot** harga |
| 9 | `down_payment` | bigint | ❌ | `0` | |
| 10 | `tenor_years` | int | ❌ | — | |
| 11 | `interest_rate` | decimal(5,2) | ❌ | — | **Snapshot** bunga (%) |
| 12 | `monthly_installment` | bigint | ❌ | — | **Snapshot** cicilan |
| 13 | `status` | varchar(20) | ❌ | `'submitted'` | `draft` \| `submitted` \| `reviewed` \| `approved` \| `rejected` |
| 14 | `notes` | text | ✅ | NULL | Catatan admin |
| 15 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `status`, `bank_id`, `property_id`  
**FK:** semua **SET NULL**

---

# 📰 DOMAIN 7 — CONTENT

## `testimonials`

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `name` | varchar(100) | ❌ | — | |
| 3 | `role` | varchar(100) | ✅ | NULL | "CEO, PT Sejahtera" |
| 4 | `photo` | varchar(255) | ✅ | NULL | |
| 5 | `rating` | decimal(3,1) | ❌ | `5.0` | 1.0–5.0 |
| 6 | `message` | text | ❌ | — | |
| 7 | `is_active` | tinyint(1) | ❌ | `1` | |
| 8 | `order` | int | ❌ | `0` | |
| 9 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |

---

## `news` — Blog (SEO)

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `title` | varchar(255) | ❌ | — | |
| 3 | `slug` | varchar(255) | ❌ | — | **UNIQUE** |
| 4 | `excerpt` | text | ✅ | NULL | |
| 5 | `content` | longtext | ✅ | NULL | |
| 6 | `image` | varchar(255) | ✅ | NULL | |
| 7 | `category` | varchar(50) | ✅ | NULL | "Tips" \| "Berita" \| "Pasar" |
| 8 | `author_id` | bigint unsigned | ✅ | NULL | FK → `users.id` |
| 9 | `published_at` | timestamp | ✅ | NULL | |
| 10 | `is_published` | tinyint(1) | ❌ | `1` | |
| 11 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `slug` (unique), `is_published`, `(is_published, published_at)`, `category`

---

## `developers` — Partner Developer

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `name` | varchar(100) | ❌ | — | |
| 3 | `logo` | varchar(255) | ❌ | — | |
| 4 | `website` | varchar(255) | ✅ | NULL | |
| 5 | `is_active` | tinyint(1) | ❌ | `1` | |
| 6 | `order` | int | ❌ | `0` | |
| 7 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |

---

## `advertisements` — Banner Iklan

| # | Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|---|
| 1 | `id` | bigint unsigned | ❌ | auto | PK |
| 2 | `title` | varchar(255) | ✅ | NULL | Label internal |
| 3 | `image` | varchar(255) | ❌ | — | Path banner |
| 4 | `link` | varchar(255) | ✅ | NULL | URL tujuan |
| 5 | `position` | varchar(30) | ❌ | `'home'` | `home-banner` \| `home-mid` \| `sidebar` \| `detail-bottom` |
| 6 | `is_active` | tinyint(1) | ❌ | `1` | |
| 7 | `start_date` | date | ✅ | NULL | |
| 8 | `end_date` | date | ✅ | NULL | |
| 9 | `order` | int | ❌ | `0` | |
| 10 | `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `(is_active, position)`, `start_date`, `end_date`

---

# 🔗 MATRIKS RELASI LENGKAP

| Parent | Child | Tipe | FK | On Delete |
|---|---|---|---|---|
| `users` | `agents` | 1:1 | `user_id` | CASCADE |
| `users` | `properties` | 1:N | `created_by` | SET NULL |
| `users` | `properties` | 1:N | `submitted_by` | SET NULL |
| `users` | `properties` | 1:N | `verified_by` | SET NULL |
| `users` | `property_submissions` | 1:N | `submitted_by` | SET NULL |
| `users` | `property_submissions` | 1:N | `verified_by` | SET NULL |
| `users` | `favorites` | 1:N | `user_id` | CASCADE |
| `users` | `inquiries` | 1:N | `user_id` | SET NULL |
| `users` | `kpr_applications` | 1:N | `user_id` | SET NULL |
| `users` | `news` | 1:N | `author_id` | SET NULL |
| `users` | `agents` | 1:N | `verified_by` | SET NULL |
| `agents` | `properties` | 1:N | `agent_id` | SET NULL |
| `agents` | `inquiries` | 1:N | `agent_id` | SET NULL |
| `agents` | `property_submissions` | 1:N | `agent_id` | SET NULL |
| `agents` | `areas` | **M:N** | pivot `agent_areas` | CASCADE |
| `areas` | `areas` | 1:N (self) | `parent_id` | SET NULL |
| `areas` | `properties` | 1:N | `area_id` | SET NULL |
| `property_types` | `properties` | 1:N | `property_type_id` | SET NULL |
| `property_submissions` | `properties` | 1:1 | `converted_property_id` (di submission) | SET NULL |
| `properties` | `property_submissions` | 1:N | `submission_id` (di properties) | SET NULL |
| `properties` | `property_images` | 1:N | `property_id` | CASCADE |
| `properties` | `favorites` | 1:N | `property_id` | CASCADE |
| `properties` | `inquiries` | 1:N | `property_id` | SET NULL |
| `properties` | `kpr_applications` | 1:N | `property_id` | SET NULL |
| `properties` | `facilities` | **M:N** | pivot `property_facilities` | CASCADE |
| `banks` | `kpr_applications` | 1:N | `bank_id` | SET NULL |

---

# 📊 RINGKASAN PERUBAHAN v1.0 → v1.1

| Tabel | Perubahan |
|---|---|
| `users` | Role tambah `'agent'` |
| `agents` | **Restructure:** + `user_id`, + `status`, + `verified_at/by`, + `rejection_reason`. Hapus `is_active` |
| `agent_areas` | Tetap |
| `properties` | + `submitted_by`, + `submission_id`, + `verified_by`, + `verified_at` |
| `property_submissions` | 🆕 **Tabel baru** |
| Lainnya | Tetap |

---
