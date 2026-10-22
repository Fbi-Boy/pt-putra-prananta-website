$root = "D:\PT PUTRA PRANANTA\PT-PUTRA-PRANANTA"
Set-Location $root

# ══════════════════════════════════════════════════
# properties/README.md
# ══════════════════════════════════════════════════
@'
# Views - Properties

Halaman listing & detail properti (PUBLIC).

## File rencana:
- `index.blade.php`         -> /beli & /sewa (listing dengan filter)
- `show.blade.php`          -> /properti/{slug} (detail + fake coordinate + KPR)
- `by-type.blade.php`       -> /properti/tanah (SEO, filter by tipe)
- `by-area.blade.php`       -> /properti/jember-kaliwates (SEO, filter by area)

## Layout:
Pakai <x-layout.app>

## Komponen:
- <x-property.card>
- <x-property.section>
- <x-property.recommendation>
- <x-public.search-panel>

## Fase: 2
'@ | Set-Content -Path "resources\views\properties\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# agents/README.md
# ══════════════════════════════════════════════════
@'
# Views - Agents

Halaman cari agent & profil agent (PUBLIC).

## File rencana:
- `index.blade.php`   -> /cari-agent (filter by kecamatan)
- `show.blade.php`    -> /agen/{slug} (profil lengkap + properti yang dipegang)

## Layout:
Pakai <x-layout.app>

## Fase: 2
'@ | Set-Content -Path "resources\views\agents\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# kpr/README.md
# ══════════════════════════════════════════════════
@'
# Views - KPR

Halaman terkait KPR (PUBLIC).

## File rencana:
- `index.blade.php`    -> /kpr (kalkulator mandiri)
- `apply.blade.php`    -> /kpr/ajukan (form pengajuan)
- `success.blade.php`  -> /kpr/success (terima kasih)

## Catatan:
Simulasi per properti biasanya embedded di properties/show.blade.php

## Layout:
Pakai <x-layout.app>

## Fase: 2
'@ | Set-Content -Path "resources\views\kpr\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# submissions/README.md
# ══════════════════════════════════════════════════
@'
# Views - Submissions

Form submission "Jual Properti" (PUBLIC).

## File rencana:
- `create.blade.php`   -> /jual-properti (form input)
- `success.blade.php`  -> /submission/{code} (terima kasih + card agent + WA)

## Alur:
User submit -> simpan ke property_submissions -> tampil success page

## Layout:
Pakai <x-layout.app>

## Fase: 3
'@ | Set-Content -Path "resources\views\submissions\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# auth/README.md
# ══════════════════════════════════════════════════
@'
# Views - Auth

Halaman autentikasi (PUBLIC).

## File rencana:
- `login.blade.php`            -> /login (tombol "Masuk dengan Google")
- `register-agent.blade.php`   -> /daftar-agent (form registrasi agent)
- `verify.blade.php`           -> /verify (pending approval screen)

## Layout:
Pakai <x-layout.guest>

## Fase: 3
'@ | Set-Content -Path "resources\views\auth\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# account/README.md
# ══════════════════════════════════════════════════
@'
# Views - Account (Customer)

Dashboard customer setelah login (AUTH required).

## File rencana:
- `dashboard.blade.php`  -> /account (overview)
- `favorites.blade.php`  -> /account/favorites (properti tersimpan)
- `inquiries.blade.php`  -> /account/inquiries (riwayat pertanyaan)
- `kpr.blade.php`        -> /account/kpr (riwayat pengajuan KPR)

## Layout:
Pakai <x-layout.app> atau <x-layout.guest>

## Fase: 3
'@ | Set-Content -Path "resources\views\account\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# static/README.md
# ══════════════════════════════════════════════════
@'
# Views - Static Pages

Halaman statis (PUBLIC) - konten tidak berubah sering.

## File rencana:
- `about.blade.php`    -> /tentang-kami (company profile)
- `contact.blade.php`  -> /kontak (form + peta kantor)
- `faq.blade.php`      -> /faq
- `privacy.blade.php`  -> /kebijakan-privasi
- `terms.blade.php`    -> /syarat-ketentuan
- `guide.blade.php`    -> /panduan (tips beli/jual/KPR)

## Layout:
Pakai <x-layout.app>

## Fase: 2 (about, contact), 3 (faq, privacy, terms)
'@ | Set-Content -Path "resources\views\static\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# admin/README.md
# ══════════════════════════════════════════════════
@'
# Views - Admin (CRM)

Semua view CRM (AUTH: role=admin).

## Layout:
Pakai <x-layout.admin>

## Struktur:
- dashboard.blade.php   -> /admin/dashboard
- properties/           -> CRUD properti
- submissions/          -> approve/reject submission
- agents/               -> verifikasi & manage agent
- inquiries/            -> leads / follow-up
- kpr/                  -> pengajuan KPR
- testimonials/         -> manage testimoni
- news/                 -> manage blog
- developers/           -> manage developer
- advertisements/       -> manage banner
- users/                -> manage user & role
- settings/             -> konfigurasi situs

## Fase: 4
'@ | Set-Content -Path "resources\views\admin\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# admin/properties/README.md
# ══════════════════════════════════════════════════
@'
# Views - Admin / Properties

CRUD properti di CRM.

## File rencana:
- index.blade.php   -> daftar properti (filter, search, sort)
- create.blade.php  -> form input properti (multi foto + video)
- edit.blade.php    -> form edit properti
- show.blade.php    -> detail properti (audit trail)

## Fase: 4
'@ | Set-Content -Path "resources\views\admin\properties\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# admin/submissions/README.md
# ══════════════════════════════════════════════════
@'
# Views - Admin / Submissions

Verifikasi submission properti dari user/agent.

## File rencana:
- index.blade.php   -> daftar submission (filter by status)
- show.blade.php    -> detail + tombol approve/reject + auto check result

## Alur:
pending -> admin review -> convert (copy ke properties) / reject

## Fase: 4
'@ | Set-Content -Path "resources\views\admin\submissions\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# admin/agents/README.md
# ══════════════════════════════════════════════════
@'
# Views - Admin / Agents

Verifikasi & manage agent.

## File rencana:
- index.blade.php   -> daftar agent (pending, active, suspended, rejected)
- show.blade.php    -> detail agent + tombol approve/reject
- edit.blade.php    -> edit profil agent + assign area

## Fase: 4
'@ | Set-Content -Path "resources\views\admin\agents\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# admin/inquiries/README.md
# ══════════════════════════════════════════════════
@'
# Views - Admin / Inquiries

Manage leads / pertanyaan dari customer.

## File rencana:
- index.blade.php   -> daftar inquiry (filter by status: new, contacted, closed)
- show.blade.php    -> detail + timeline follow-up + catatan admin

## Fase: 4
'@ | Set-Content -Path "resources\views\admin\inquiries\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# admin/kpr/README.md
# ══════════════════════════════════════════════════
@'
# Views - Admin / KPR

Manage pengajuan KPR.

## File rencana:
- index.blade.php   -> daftar pengajuan (filter by status, bank)
- show.blade.php    -> detail + follow-up actions

## Fase: 4
'@ | Set-Content -Path "resources\views\admin\kpr\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# admin/testimonials/README.md
# ══════════════════════════════════════════════════
@'
# Views - Admin / Testimonials

Manage testimoni (CRUD + toggle active + reorder).

## File rencana:
- index.blade.php   -> daftar testimoni
- create.blade.php  -> form tambah
- edit.blade.php    -> form edit

## Fase: 4
'@ | Set-Content -Path "resources\views\admin\testimonials\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# admin/news/README.md
# ══════════════════════════════════════════════════
@'
# Views - Admin / News

Manage artikel blog (SEO).

## File rencana:
- index.blade.php   -> daftar artikel (draft/published)
- create.blade.php  -> form tambah (editor)
- edit.blade.php    -> form edit

## Fase: 4
'@ | Set-Content -Path "resources\views\admin\news\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# admin/developers/README.md
# ══════════════════════════════════════════════════
@'
# Views - Admin / Developers

Manage partner developer (logo & website).

## File rencana:
- index.blade.php   -> daftar developer
- create.blade.php  -> form tambah
- edit.blade.php    -> form edit

## Fase: 4
'@ | Set-Content -Path "resources\views\admin\developers\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# admin/advertisements/README.md
# ══════════════════════════════════════════════════
@'
# Views - Admin / Advertisements

Manage banner iklan.

## File rencana:
- index.blade.php   -> daftar banner per position (home-banner, sidebar, dll)
- create.blade.php  -> form tambah + jadwal tayang
- edit.blade.php    -> form edit

## Fase: 4
'@ | Set-Content -Path "resources\views\admin\advertisements\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# admin/users/README.md
# ══════════════════════════════════════════════════
@'
# Views - Admin / Users

Manage user (customer + admin).

## File rencana:
- index.blade.php   -> daftar user (filter by role, active)
- show.blade.php    -> detail user + aktivitas

## Fase: 4
'@ | Set-Content -Path "resources\views\admin\users\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# admin/settings/README.md
# ══════════════════════════════════════════════════
@'
# Views - Admin / Settings

Konfigurasi situs (nama, kontak, sosmed, dll).

## File rencana:
- index.blade.php   -> halaman settings (form multi-tab)
  - Tab: Umum, Kontak, Sosmed, SEO, Banner

## Catatan:
Saat ini config di config/company.php.
Nanti migrate ke tabel settings atau tetap config (keputusan Fase 4).

## Fase: 4
'@ | Set-Content -Path "resources\views\admin\settings\README.md" -Encoding UTF8

# ══════════════════════════════════════════════════
# errors/README.md
# ══════════════════════════════════════════════════
@'
# Views - Errors

Custom error page. Laravel auto-detect by filename.

## File rencana:
- 404.blade.php   -> halaman tidak ditemukan
- 403.blade.php   -> akses ditolak
- 500.blade.php   -> server error
- 503.blade.php   -> maintenance

## Catatan:
Tidak perlu route, Laravel otomatis render saat exception terjadi.

## Fase: 2 (404), 3 (403), 4 (500, 503)
'@ | Set-Content -Path "resources\views\errors\README.md" -Encoding UTF8

Write-Host ""
Write-Host "========================================" -ForegroundColor Green
Write-Host "SUKSES! Semua README views dibuat" -ForegroundColor Green
Write-Host "========================================" -ForegroundColor Green
Write-Host ""

Write-Host "Cek hasil:" -ForegroundColor Cyan
Get-ChildItem -Path "resources\views" -Recurse -Filter "README.md" | Select-Object FullName
