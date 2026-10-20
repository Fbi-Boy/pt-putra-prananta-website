# DATABASE SCHEMA — PT Putra Prananta Property

> **Versi:** 1.0  
> **Database:** MySQL (Laragon)  
> **Nama DB:** `pre-property`  
> **Charset:** `utf8mb4` / `utf8mb4_unicode_ci`  
> **Framework:** Laravel 11  
> **Terakhir update:** 2026-10-19

---

## 📋 Daftar Isi

1.  [Overview](                 #overview)
2.  [ERD](                      #erd)
3.  [Domain Auth](              #domain-1--auth)
4.  [Domain Master](            #domain-2--master-data)
5.  [Domain Core](              #domain-3--core)
6.  [Domain Interaction](       #domain-4--interaction)
7.  [Domain Content](           #domain-5--content)
8.  [Matriks Relasi](           #matriks-relasi)
9.  [Seed Data](                #seed-data)
10. [Business Rules](           #business-rules)
11. [Storage Strategy](         #storage-strategy)
12. [Changelog](                #changelog)

---

## Overview

- **Total tabel domain:** 17
- **Domain:** Auth (1), Master (4), Core (5), Interaction (3), Content (4)
- **Konfigurasi:** `config/company.php` (bukan tabel `settings`)

### Ringkasan Tabel

| #  | Tabel                 | Domain       | Estimasi Volume (1 thn) |

| 1  | `users`               | Auth         | 100-1000                |
| 2  | `property_types`      | Master       | 8                       |
| 3  | `areas`               | Master       | 20-50                   |
| 4  | `banks`               | Master       | 1-10                    |
| 5  | `facilities`          | Master       | 10-30                   |
| 6  | `agents`              | Core         | 5-20                    |
| 7  | `agent_areas`         | Core (pivot) | 10-100                  |
| 8  | `properties`          |**Core**      | 100-500                 |
| 9  | `property_images`     | Core         | 1000-5000               |
| 10 | `property_facilities` | Core (pivot) | 500-3000                |
| 11 | `favorites`           | Interaction  | 200-2000                |
| 12 | `inquiries`           | Interaction  | 100-1000                |
| 13 | `kpr_applications`    | Interaction  | 50-500                  |
| 14 | `testimonials`        | Content      | 4-20                    |
| 15 | `news`                | Content      | 20-100                  |
| 16 | `developers`          | Content      | 8-30                    |
| 17 | `advertisements`      | Content      | 1-10                    |

---

## ERD

```
┌─────────────┐
│   users     │
└──┬──────┬───┘
   │      │ 1:N
   │      ├────────► favorites ◄──── N:1 ────┐
   │      ├────────► inquiries ─────────────┤
   │      ├────────► kpr_applications ───┐   │
   │      └────────► news (author)       │   │
   │                                     │   │
   │ 1:N (created_by)                    │   │
   ▼                                     │   │
┌──────────────────────────────────┐    │   │
│          properties ⭐            │◄───┼───┼──┐
│──────────────────────────────────│    │   │  │
│ code, title, slug, description    │    │   │  │
│ listing_type, price, price_unit   │    │   │  │
│ property_type_id ──► property_types  │   │  │
│ area_id ───────────► areas        │    │   │  │
│ agent_id ──────────► agents       │    │   │  │
│ lat, lng, show_exact, map_radius  │    │   │  │
│ is_recommended, is_kpr_eligible   │    │   │  │
│ video_provider, video_id          │    │   │  │
│ status, published_at, view_count  │    │   │  │
└──┬──────────┬────────────┬────────┘    │   │  │
   │          │            │             │   │  │
   │ 1:N      │ N:M        │ N:1         │   │  │
   ▼          ▼            ▼             │   │  │
┌─────────┐ ┌──────────┐ ┌────────┐      │   │  │
│property_│ │facilities│ │ banks  │◄─────┘   │  │
│images   │ └──────────┘ └────────┘          │  │
└─────────┘              (kpr_applications)  │  │
                                              │  │
┌──────────────┐  ┌────────┐  ┌────────────┐ │  │
│ testimonials │  │  news  │  │ developers │ │  │
└──────────────┘  └────────┘  └────────────┘ │  │
                                              │  │
┌────────────────┐                            │  │
│ advertisements │                            │  │
└────────────────┘                            │  │
                                              │  │
     ┌────────────────────────────────────────┘  │
     │ (agent_areas pivot)                       │
     ▼                                           │
┌────────────┐         ┌─────────────────┐       │
│   agents   │ 1:N     │  agent_areas    │ N:1   │
│            │────────▶│ agent_id, area_id│◀──────┤
│            │         │ is_primary      │       │
└────────────┘         └─────────────────┘       │
                              │                  │
                              │ N:1              │
                              ▼                  │
                       ┌──────────────┐          │
                       │    areas     │◀─────────┘
                       │ (self-ref)   │  (properties.area_id)
                       └──────────────┘
                              ▲
                              │ N:1 (parent_id)
                              │ self
                              └─ areas
```

---

## Domain 1 — Auth

### 1. `users`

**Fungsi:** Autentikasi & identitas user. Login via Google OAuth (user) dan manual + Google (admin).

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `name` | varchar(255) | ❌ | — | dari Google / input admin |
| `email` | varchar(255) | ❌ | — | **UNIQUE** |
| `email_verified_at` | timestamp | ✅ | NULL | auto-set saat Google login |
| `password` | varchar(255) | ✅ | NULL | **nullable** — user Google tidak punya password |
| `google_id` | varchar(255) | ✅ | NULL | **UNIQUE** — Google `sub` claim |
| `avatar` | varchar(255) | ✅ | NULL | URL foto Google |
| `role` | varchar(20) | ❌ | `'user'` | `user` \| `admin` (string, bukan enum) |
| `phone` | varchar(20) | ✅ | NULL | |
| `is_active` | tinyint(1) | ❌ | `1` | |
| `remember_token` | varchar(100) | ✅ | NULL | Laravel default |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `email` (unique), `google_id` (unique), `role`
 
**Relasi keluar:**
- `hasMany` → `favorites`
- `hasMany` → `inquiries`
- `hasMany` → `kpr_applications`
- `hasMany` → `properties` (via `created_by`)
- `hasMany` → `news` (via `author_id`)

**Catatan:**
- `role` pakai string, bukan enum → fleksibel tambah role `marketing` tanpa ALTER TABLE
- Login flow: user → Google only; admin → Google atau email+password
- Admin pertama dibuat via seeder/manual

---

## Domain 2 — Master Data

### 2. `property_types`

**Fungsi:** Master tipe properti.

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `name` | varchar(50) | ❌ | — | "Rumah", "Tanah" |
| `slug` | varchar(50) | ❌ | — | **UNIQUE** — `rumah`, `tanah` |
| `icon` | varchar(50) | ✅ | NULL | nama icon Lucide |
| `is_active` | tinyint(1) | ❌ | `1` | |
| `order` | int | ❌ | `0` | sorting tampil |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `slug` (unique), `is_active`

**Relasi masuk:**
- `hasMany` ← `properties` (via `property_type_id`)

---

### 3. `areas`

**Fungsi:** Hirarki wilayah (self-reference).

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `name` | varchar(100) | ❌ | — | "Jember", "Kaliwates" |
| `slug` | varchar(100) | ❌ | — | **UNIQUE** — `jember-kaliwates` |
| `type` | varchar(20) | ❌ | `'district'` | `province` \| `city` \| `district` \| `village` |
| `parent_id` | bigint unsigned | ✅ | NULL | **FK self** → `areas.id` |
| `is_active` | tinyint(1) | ❌ | `1` | |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `slug` (unique), `type`, `parent_id`

**FK:** `parent_id` → `areas.id` **ON DELETE SET NULL**

**Relasi:**
- `belongsTo` → `Area` (parent)
- `hasMany` → `Area` (children)
- `hasMany` → `properties`
- `belongsToMany` → `agents` (via `agent_areas`)

---

### 4. `banks`

**Fungsi:** Master bank untuk simulasi KPR.

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `name` | varchar(100) | ❌ | — | "Bank Mandiri" |
| `code` | varchar(20) | ❌ | — | **UNIQUE** — `MANDIRI` |
| `logo` | varchar(255) | ✅ | NULL | path logo |
| `interest_rate` | decimal(5,2) | ❌ | `7.50` | bunga tahunan (%) |
| `min_tenor` | int | ❌ | `5` | tahun |
| `max_tenor` | int | ❌ | `20` | tahun |
| `min_dp_percent` | decimal(5,2) | ❌ | `10.00` | DP minimal (%) |
| `is_active` | tinyint(1) | ❌ | `1` | |
| `order` | int | ❌ | `0` | |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `code` (unique), `is_active`

**Relasi masuk:**
- `hasMany` ← `kpr_applications`

**Catatan:** `interest_rate` 1 angka (simulasi sederhana). Kalau nanti butuh bunga bertingkat (fixed/floating), tambah tabel `bank_rate_tiers`.

---

### 5. `facilities`

**Fungsi:** Master fasilitas properti.

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `name` | varchar(100) | ❌ | — | "AC", "Kolam Renang" |
| `icon` | varchar(50) | ✅ | NULL | nama icon Lucide |
| `is_active` | tinyint(1) | ❌ | `1` | |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `is_active`

**Relasi masuk:**
- `belongsToMany` ← `properties` (via `property_facilities`)

---

## Domain 3 — Core

### 6. `agents`

**Fungsi:** Profil agen properti. **Data saja** — tanpa login.

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `name` | varchar(100) | ❌ | — | "Budi Santoso" |
| `slug` | varchar(150) | ❌ | — | **UNIQUE** — `budi-santoso` |
| `photo` | varchar(255) | ✅ | NULL | path foto |
| `phone` | varchar(20) | ❌ | — | untuk display |
| `whatsapp` | varchar(20) | ✅ | NULL | format `628xxx` |
| `email` | varchar(100) | ✅ | NULL | |
| `bio` | text | ✅ | NULL | |
| `is_active` | tinyint(1) | ❌ | `1` | |
| `order` | int | ❌ | `0` | sorting di halaman "Cari Agen" |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `slug` (unique), `is_active`

**Relasi:**
- `hasMany` → `properties`
- `hasMany` → `inquiries`
- `belongsToMany` → `areas` (via `agent_areas`)

**Catatan:**
- ❌ **Tidak ada `user_id`** — agent tidak bisa login
- ❌ **Tidak ada `area` string** — area via pivot `agent_areas`
- Agent bisa pegang **1 atau lebih** kecamatan
- 1 kecamatan bisa dipegang **lebih dari 1 agent** (overlap)

---

### 7. `agent_areas`

**Fungsi:** Pivot M:N agent ↔ area (kecamatan).

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `agent_id` | bigint unsigned | ❌ | — | FK → `agents.id` |
| `area_id` | bigint unsigned | ❌ | — | FK → `areas.id` |
| `is_primary` | tinyint(1) | ❌ | `0` | area utama (prioritas tampil) |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Unique:** `(agent_id, area_id)` — 1 agent tidak bisa "pegang" area sama 2x
**Index:** `agent_id`, `area_id`, `(area_id, is_primary)`
**FK:** `agent_id` → `agents.id` **CASCADE**, `area_id` → `areas.id` **CASCADE**

**Relasi:**
- `belongsTo` → `Agent`
- `belongsTo` → `Area`

**Business rules:**
- 1 agent → 1..N area
- 1 area → 0..N agent (**overlap**, bukan eksklusif)
- `is_primary = true` → area utama agent (untuk sort & highlight)
- Agent bisa punya 1 primary + N secondary area

---

### 8. `properties` ⭐ (Tabel Inti)

**Fungsi:** Data properti (jual/sewa/KPR).

#### Kelompok 1: Identitas & Klasifikasi

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `code` | varchar(20) | ❌ | — | **UNIQUE** — `PRP-0001` auto-generate |
| `title` | varchar(255) | ❌ | — | |
| `slug` | varchar(255) | ❌ | — | **UNIQUE** — auto dari title |
| `description` | longtext | ✅ | NULL | plain text dulu |
| `listing_type` | enum | ❌ | `'sale'` | `sale` \| `rent` |
| `property_type_id` | bigint unsigned | ✅ | NULL | FK → `property_types.id` |
| `area_id` | bigint unsigned | ✅ | NULL | FK → `areas.id` |
| `agent_id` | bigint unsigned | ✅ | NULL | FK → `agents.id` — nullable |

#### Kelompok 2: Lokasi & Fake Coordinate

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `address` | varchar(255) | ✅ | NULL | alamat detail (tampil publik) |
| `latitude` | decimal(10,8) | ✅ | NULL | presisi tinggi — **internal** |
| `longitude` | decimal(11,8) | ✅ | NULL | presisi tinggi — **internal** |
| `show_exact_location` | tinyint(1) | ❌ | `0` | false → publik lihat lingkaran |
| `map_radius_meter` | int | ❌ | `500` | radius lingkaran (meter) |

#### Kelompok 3: Harga

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `price` | bigint | ❌ | `0` | rupiah |
| `price_unit` | enum | ✅ | NULL | `day` \| `month` \| `year` — hanya untuk `rent` |
| `price_dropped_at` | timestamp | ✅ | NULL | badge "TURUN HARGA" (30 hari) |

#### Kelompok 4: Spesifikasi

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `land_area` | int | ✅ | NULL | m² |
| `building_area` | int | ✅ | NULL | m² — null untuk tanah kosong |
| `bedrooms` | int | ❌ | `0` | |
| `bathrooms` | int | ❌ | `0` | |
| `carports` | int | ❌ | `0` | |
| `floors` | int | ❌ | `1` | |
| `year_built` | int | ✅ | NULL | |
| `certificate` | varchar(50) | ✅ | NULL | SHM, HGB, dll |

#### Kelompok 5: Marketing & Status

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `status` | enum | ❌ | `'draft'` | `draft` \| `published` \| `sold` \| `rented` \| `archived` |
| `is_recommended` | tinyint(1) | ❌ | `0` | tampil di section "Rekomendasi" |
| `is_kpr_eligible` | tinyint(1) | ❌ | `0` | bisa disimulasikan KPR |
| `video_provider` | varchar(20) | ✅ | NULL | `youtube` \| `vimeo` |
| `video_id` | varchar(50) | ✅ | NULL | ID video (`AbC123xyz`) |
| `view_count` | int | ❌ | `0` | counter sederhana |
| `published_at` | timestamp | ✅ | NULL | untuk badge "BARU" |

#### Kelompok 6: Audit

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `created_by` | bigint unsigned | ✅ | NULL | FK → `users.id` |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |
| `deleted_at` | timestamp | ✅ | NULL | **soft delete** |

**Index (performa):**
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

**FK:**
- `property_type_id` → `property_types.id` **SET NULL**
- `area_id` → `areas.id` **SET NULL**
- `agent_id` → `agents.id` **SET NULL**
- `created_by` → `users.id` **SET NULL**

**Relasi:**
- `hasMany` → `property_images`
- `belongsToMany` → `facilities` (pivot `property_facilities`)
- `hasMany` → `favorites`
- `hasMany` → `inquiries`
- `hasMany` → `kpr_applications`
- `belongsTo` → `PropertyType`, `Area`, `Agent`, `User` (creator)

**Accessor:**
- `badge` → TURUN HARGA (30 hari) → BARU (7 hari) → REKOMENDASI
- `video_embed_url` → URL iframe YouTube/Vimeo
- `video_thumbnail` → thumbnail YouTube
- `price_formatted` → "Rp 850 Juta"

**Scope:** `published()`, `sale()`, `rent()`, `recommended()`, `kprEligible()`

---

### 9. `property_images`

**Fungsi:** Gambar properti (multi, 3 varian WebP).

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `property_id` | bigint unsigned | ❌ | — | FK → `properties.id` |
| `path_thumb` | varchar(255) | ❌ | — | `properties/1/thumb/abc.webp` (~30KB) |
| `path_medium` | varchar(255) | ❌ | — | `properties/1/medium/abc.webp` (~100KB) |
| `path_large` | varchar(255) | ❌ | — | `properties/1/large/abc.webp` (~250KB) |
| `alt_text` | varchar(255) | ✅ | NULL | SEO & aksesibilitas |
| `is_primary` | tinyint(1) | ❌ | `0` | 1 true per properti |
| `order` | int | ❌ | `0` | urutan galeri |
| `file_size_medium` | int unsigned | ✅ | NULL | KB |
| `width` | smallint unsigned | ✅ | NULL | dimensi medium |
| `height` | smallint unsigned | ✅ | NULL | |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `property_id`, `(property_id, is_primary)`
**FK:** `property_id` → `properties.id` **CASCADE**

**Relasi:** `belongsTo` → `Property`

**Business rules:**
- `is_primary = true` di-enforce **1 saja** per properti via model observer
- Saat set primary baru → reset yang lain ke false otomatis

**Accessor:**
- `thumb_url`, `medium_url`, `large_url` → URL publik

---

### 10. `property_facilities`

**Fungsi:** Pivot M:N properti ↔ fasilitas.

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `property_id` | bigint unsigned | ❌ | — | FK → `properties.id` |
| `facility_id` | bigint unsigned | ❌ | — | FK → `facilities.id` |

**PK:** composite `(property_id, facility_id)` — tanpa `id`, tanpa `timestamps`
**FK:** keduanya **CASCADE**

---

## Domain 4 — Interaction

### 11. `favorites`

**Fungsi:** Properti tersimpan user (wajib login).

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `user_id` | bigint unsigned | ❌ | — | FK → `users.id` |
| `property_id` | bigint unsigned | ❌ | — | FK → `properties.id` |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Unique:** `(user_id, property_id)` — 1 user simpan 1x per properti
**FK:** keduanya **CASCADE**

**Relasi:**
- `belongsTo` → `User`, `Property`

---

### 12. `inquiries`

**Fungsi:** Leads dari form kontak / WA CTA.

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `user_id` | bigint unsigned | ✅ | NULL | FK → `users.id` — kalau login |
| `property_id` | bigint unsigned | ✅ | NULL | FK → `properties.id` |
| `agent_id` | bigint unsigned | ✅ | NULL | FK → `agents.id` |
| `name` | varchar(100) | ❌ | — | |
| `phone` | varchar(20) | ❌ | — | |
| `email` | varchar(100) | ✅ | NULL | |
| `message` | text | ✅ | NULL | |
| `source` | varchar(30) | ❌ | `'website'` | `website` \| `whatsapp` \| `phone` |
| `status` | varchar(20) | ❌ | `'new'` | `new` \| `contacted` \| `closed` |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `status`, `property_id`, `agent_id`
**FK:** semua **SET NULL**

**Relasi:**
- `belongsTo` → `User`, `Property`, `Agent`

---

### 13. `kpr_applications`

**Fungsi:** Pengajuan simulasi KPR (snapshot angka saat submit).

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `user_id` | bigint unsigned | ✅ | NULL | FK → `users.id` |
| `property_id` | bigint unsigned | ✅ | NULL | FK → `properties.id` — null jika dari kalkulator mandiri |
| `bank_id` | bigint unsigned | ✅ | NULL | FK → `banks.id` |
| `name` | varchar(100) | ❌ | — | |
| `phone` | varchar(20) | ❌ | — | |
| `email` | varchar(100) | ✅ | NULL | |
| `property_price` | bigint | ❌ | — | **snapshot** harga |
| `down_payment` | bigint | ❌ | `0` | DP |
| `tenor_years` | int | ❌ | — | |
| `interest_rate` | decimal(5,2) | ❌ | — | **snapshot** bunga (%) |
| `monthly_installment` | bigint | ❌ | — | **snapshot** cicilan |
| `status` | varchar(20) | ❌ | `'submitted'` | `draft` \| `submitted` \| `reviewed` \| `approved` \| `rejected` |
| `notes` | text | ✅ | NULL | catatan admin |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `status`, `bank_id`, `property_id`
**FK:** semua **SET NULL**

**Relasi:**
- `belongsTo` → `User`, `Property`, `Bank`

**Business rules:**
- `property_price`, `interest_rate`, `monthly_installment` = **snapshot** saat submit
- Kenapa snapshot? Audit trail — kalau harga properti/bunga berubah, pengajuan lama tetap mencatat angka yang dilihat user

---

## Domain 5 — Content

### 14. `testimonials`

**Fungsi:** Testimoni pelanggan.

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `name` | varchar(100) | ❌ | — | |
| `role` | varchar(100) | ✅ | NULL | "CEO, PT Sejahtera" |
| `photo` | varchar(255) | ✅ | NULL | |
| `rating` | decimal(3,1) | ❌ | `5.0` | 1.0–5.0 |
| `message` | text | ❌ | — | |
| `is_active` | tinyint(1) | ❌ | `1` | |
| `order` | int | ❌ | `0` | |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `is_active`

---

### 15. `news` ⭐

**Fungsi:** Blog artikel properti (SEO).

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `title` | varchar(255) | ❌ | — | |
| `slug` | varchar(255) | ❌ | — | **UNIQUE** — auto dari title |
| `excerpt` | text | ✅ | NULL | ringkasan (card) |
| `content` | longtext | ✅ | NULL | isi lengkap |
| `image` | varchar(255) | ✅ | NULL | thumbnail |
| `category` | varchar(50) | ✅ | NULL | "Tips", "Berita", "Pasar" |
| `author_id` | bigint unsigned | ✅ | NULL | FK → `users.id` |
| `published_at` | timestamp | ✅ | NULL | jadwal publish |
| `is_published` | tinyint(1) | ❌ | `1` | draft/publish |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `slug` (unique), `is_published`, `(is_published, published_at)`, `category`
**FK:** `author_id` → `users.id` **SET NULL**

**Relasi:** `belongsTo` → `User` (author)

---

### 16. `developers`

**Fungsi:** Partner developer properti (logo grid di homepage).

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `name` | varchar(100) | ❌ | — | |
| `logo` | varchar(255) | ❌ | — | path logo |
| `website` | varchar(255) | ✅ | NULL | URL website |
| `is_active` | tinyint(1) | ❌ | `1` | |
| `order` | int | ❌ | `0` | |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `is_active`

---

### 17. `advertisements`

**Fungsi:** Banner iklan/promo di website.

| Kolom | Tipe | Null | Default | Keterangan |
|---|---|---|---|---|
| `id` | bigint unsigned | ❌ | auto | PK |
| `title` | varchar(255) | ✅ | NULL | label internal (bukan tampil) |
| `image` | varchar(255) | ❌ | — | path banner |
| `link` | varchar(255) | ✅ | NULL | URL tujuan klik |
| `position` | varchar(30) | ❌ | `'home'` | `home-banner` \| `home-mid` \| `sidebar` \| `detail-bottom` |
| `is_active` | tinyint(1) | ❌ | `1` | |
| `start_date` | date | ✅ | NULL | jadwal mulai |
| `end_date` | date | ✅ | NULL | jadwal selesai |
| `order` | int | ❌ | `0` | rotasi multiple |
| `created_at`, `updated_at` | timestamp | ✅ | NULL | |

**Index:** `(is_active, position)`, `start_date`, `end_date`

**Scope:** `active()`, `position($name)`

---

## Matriks Relasi

| Parent | Child | Tipe | FK | On Delete |
|---|---|---|---|---|
| `users` | `favorites` | 1:N | `user_id` | CASCADE |
| `users` | `inquiries` | 1:N | `user_id` | SET NULL |
| `users` | `kpr_applications` | 1:N | `user_id` | SET NULL |
| `users` | `properties` | 1:N | `created_by` | SET NULL |
| `users` | `news` | 1:N | `author_id` | SET NULL |
| `properties` | `property_images` | 1:N | `property_id` | CASCADE |
| `properties` | `favorites` | 1:N | `property_id` | CASCADE |
| `properties` | `inquiries` | 1:N | `property_id` | SET NULL |
| `properties` | `kpr_applications` | 1:N | `property_id` | SET NULL |
| `properties` | `facilities` | **M:N** | pivot `property_facilities` | CASCADE |
| `properties` | `property_types` | N:1 | `property_type_id` | SET NULL |
| `properties` | `areas` | N:1 | `area_id` | SET NULL |
| `properties` | `agents` | N:1 | `agent_id` | SET NULL |
| `agents` | `inquiries` | 1:N | `agent_id` | SET NULL |
| `agents` | `areas` | **M:N** | pivot `agent_areas` | CASCADE |
| `areas` | `areas` | 1:N (self) | `parent_id` | SET NULL |
| `banks` | `kpr_applications` | 1:N | `bank_id` | SET NULL |

---

## Seed Data

| Seeder | Isi |
|---|---|
| `PropertyTypeSeeder` | 8 tipe: Rumah, Tanah, Ruko, Apartemen, Kos, Villa, Gudang, Kantor |
| `AreaSeeder` | Jawa Timur (province) → Jember, Lumajang, Bondowoso, Situbondo, Banyuwangi. Jember → 8 kecamatan |
| `BankSeeder` | Bank Mandiri (bunga 7.50%, tenor 5-20, DP min 10%) |
| `FacilitySeeder` | 10 fasilitas: AC, Kolam Renang, Garasi, Taman, Keamanan 24J, CCTV, Dapur, Wifi, Parkir, Listrik |
| `DemoDataSeeder` | 1 agent (Budi) + 2 area, 8 properti, 4 testimonial, 8 developer |

---

## Business Rules

### Fake Coordinate
- `latitude`/`longitude` disimpan **presisi tinggi** — hanya untuk admin/CRM
- Publik melihat **lingkaran** (`map_radius_meter`, default 500m)
- Hanya **admin** yang bisa set `show_exact_location = true`
- Kalau properti sangat besar (gudang), admin bisa naikkan `map_radius_meter` per properti

### Video (Embed, bukan upload)
- `video_provider` + `video_id` (dari URL YouTube/Vimeo)
- **0 byte storage** di server
- Thumbnail auto dari YouTube
- Lazy-load — iframe baru load saat user klik play

### Gambar (3 Varian WebP)
- Setiap upload → generate `thumb` (400px), `medium` (800px), `large` (1600px)
- **Original** disimpan di `storage/app/originals/` (tidak public, tidak backup harian)
- Frontend pakai `srcset` — HP dapat thumb, desktop dapat medium

### Agent ↔ Area
- 1 agent → 1..N kecamatan
- 1 kecamatan → 0..N agent (**overlap**)
- `is_primary = true` = area utama agent

### Badge Dinamis
- **TURUN HARGA** — `price_dropped_at` ≤ 30 hari
- **BARU** — `published_at` ≤ 7 hari
- **REKOMENDASI** — `is_recommended = true`
- Prioritas: TURUN HARGA > BARU > REKOMENDASI

### Snapshot KPR
- `property_price`, `interest_rate`, `monthly_installment` di-snapshot saat submit
- Pengajuan lama **tidak berubah** meskipun harga/bunga berubah
- Audit trail untuk CRM

### Soft Delete
- `properties` pakai `SoftDeletes`
- Properti dihapus → `deleted_at` terisi, data tetap ada
- Query default **otomatis exclude** yang soft-deleted

---

## Storage Strategy

```
storage/app/public/
├── properties/
│   └── {id}/
│       ├── thumb/abc.webp     (~30KB)
│       ├── medium/abc.webp    (~100KB)
│       └── large/abc.webp     (~250KB)
├── agents/
├── developers/
├── news/
└── testimonials/

storage/app/originals/          ← tidak public, tidak backup harian
├── properties/{id}/abc.jpg     (asli 5MB, untuk re-process)
└── ...
```

**Setup:**
```bash
php artisan storage:link
```

**Hemat storage:**
- Video: **0 MB** (embed YouTube)
- Foto per properti (10 gambar): ~3.8 MB (vs 50 MB asli)
- Total 100 properti: ~380 MB

---

## Changelog

### v1.0 — 2026-10-19
- Initial schema — 17 tabel
- Konfigurasi via `config/company.php` (bukan tabel `settings`)
- Auth via Google OAuth (user) + manual+Google (admin)
- Fake coordinate system (circle radius)
- Video embed (YouTube/Vimeo) — 0 storage
- Gambar 3 varian WebP
- Agent-area pivot (overlap, bukan eksklusif)
- Badge dinamis (TURUN HARGA / BARU / REKOMENDASI)
- KPR dengan snapshot angka

---

**Dokumen ini adalah referensi tunggal (single source of truth) untuk struktur database. Setiap perubahan schema wajib update dokumen ini.**
