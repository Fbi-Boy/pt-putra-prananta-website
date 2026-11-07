# 🚀 Performance & Security Audit Checklist
**Project:** PT Putra Prananta Property
**Stack:** Laravel 11, MySQL, Tailwind CSS, Alpine.js, Leaflet.js
**Tujuan:** Memastikan website cepat, aman, dan siap menerima banyak pengunjung.

---

## 🛠️ Persiapan Tools (Wajib Install di Local)
Sebelum memulai test, pastikan tools berikut sudah terpasang:
- [ ] **Laravel Debugbar** (Development): `composer require barryvdh/laravel-debugbar --dev`
- [ ] **Laravel Pulse** (Production Monitoring): `composer require laravel/pulse`
- [ ] **Google Lighthouse** (Built-in di Chrome DevTools) atau **PageSpeed Insights** (Web).
- [ ] **k6** (Load Testing): [k6.io](https://k6.io/)

---

## 🗄️ KATEGORI 1: Database & Backend (Paling Krusial)
*Fondasi utama. Jika database lambat, frontend akan tetap terasa lambat.*

- [ ] **1. N+1 Query Test**
  - **Kenapa:** Mencegah query berulang saat mengambil relasi (misal: ambil 10 properti, tapi nge-query agent 10x).
  - **Cara Cek:** Buka halaman `/beli` dengan Laravel Debugbar. Pastikan jumlah query tetap stabil meskipun data properti banyak.
  - **Target:** < 10 query per halaman (dengan eager loading).

- [ ] **2. Query Execution Time Test**
  - **Kenapa:** Mendeteksi query yang lambat (Slow Query).
  - **Cara Cek:** Cek tab "Queries" di Debugbar atau dashboard Laravel Pulse. 
  - **Target:** Tidak ada query di atas 100ms.

- [ ] **3. Database Indexing Test**
  - **Kenapa:** Memastikan filter pencarian cepat meski data ribuan.
  - **Cara Cek:** Buka phpMyAdmin > tabel `properties` > tab "Indexes". Pastikan kolom `status`, `listing_type`, `area_id`, `price`, dan `property_type_id` sudah ter-index.
  - **Target:** Semua kolom filter utama memiliki index.

- [ ] **4. Eager Loading Test**
  - **Kenapa:** Memastikan relasi seperti `agent`, `areas`, `primaryImage` ter-load dengan benar.
  - **Cara Cek:** Cek `PropertyController`, pastikan ada `->with(['primaryImage', 'agent.areas', 'area', 'type'])`.
  - **Target:** Semua relasi yang dipakai di View sudah di-load di Controller.

- [ ] **5. Caching Test**
  - **Kenapa:** Mempercepat loading data statis (Area, Tipe Properti, Fasilitas).
  - **Cara Cek:** Pastikan data master menggunakan `Cache::remember()`. Cek file `config/cache.php` (gunakan Redis/Memcached untuk production).
  - **Target:** Data master tidak di-query ke database setiap kali halaman dibuka.

- [ ] **6. Memory Usage Test**
  - **Kenapa:** Mencegah server *Out of Memory* (OOM) saat mengambil data banyak.
  - **Cara Cek:** Gunakan Laravel Pulse atau pantau `memory_get_peak_usage()`.
  - **Target:** < 128MB per request.

---

## 🎨 KATEGORI 2: Frontend & Core Web Vitals
*Ini yang dirasakan langsung oleh user dan mempengaruhi peringkat SEO Google.*

- [ ] **7. LCP (Largest Contentful Paint)**
  - **Kenapa:** Mengukur seberapa cepat gambar/teks utama muncul.
  - **Cara Cek:** Google PageSpeed Insights / Lighthouse.
  - **Target:** < 2.5 detik.

- [ ] **8. CLS (Cumulative Layout Shift)**
  - **Kenapa:** Mengukur seberapa sering layout "bergeser" (bikin user salah klik).
  - **Cara Cek:** Lighthouse.
  - **Target:** < 0.1 (Pastikan gambar punya `width` & `height` atau `aspect-ratio`).

- [ ] **9. FID (First Input Delay) / INP**
  - **Kenapa:** Mengukur seberapa cepat website merespon klik pertama user.
  - **Cara Cek:** Lighthouse.
  - **Target:** < 100ms.

- [ ] **10. Image Optimization Test**
  - **Kenapa:** Gambar adalah penyumbang berat terbesar.
  - **Cara Cek:** Buka Network tab (F12), refresh halaman. Cek ukuran gambar.
  - **Target:** Format `.webp`, ukuran < 100KB, dan sudah pakai `loading="lazy"`.

- [ ] **11. Asset Size Test (CSS/JS)**
  - **Kenapa:** Memastikan tidak ada *library* yang tidak terpakai.
  - **Cara Cek:** Cek hasil `npm run build`. Lihat ukuran file di folder `public/build`.
  - **Target:** Total CSS < 100KB, Total JS < 200KB.

- [ ] **12. Leaflet Map Render Test**
  - **Kenapa:** Mencegah peta lag saat menampilkan banyak marker properti.
  - **Cara Cek:** Buka halaman listing. Cek *frame rate* saat peta digeser.
  - **Target:** Peta mulus (60fps) meski menampilkan puluhan marker.

- [ ] **13. Alpine.js DOM Test**
  - **Kenapa:** Memastikan halaman dengan banyak card tidak freeze saat di-scroll.
  - **Cara Cek:** Scroll cepat di halaman `/beli` di HP.
  - **Target:** Tidak ada *lag* saat scroll. (Jika lag, kurangi jumlah card per halaman atau pakai *infinite scroll*).

---

## ⚙️ KATEGORI 3: Infrastruktur & Server
*Tentang bagaimana server kamu melayani request.*

- [ ] **14. TTFB (Time to First Byte)**
  - **Kenapa:** Seberapa cepat server merespon request pertama.
  - **Cara Cek:** WebPageTest.org.
  - **Target:** < 200ms.

- [ ] **15. PHP OPcache Test**
  - **Kenapa:** Menyimpan *bytecode* PHP di memori agar tidak di-compile ulang.
  - **Cara Cek:** Cek file `php.ini` atau `php -i | grep opcache`.
  - **Target:** `opcache.enable = On` di server production.

- [ ] **16. Compression Test (Gzip/Brotli)**
  - **Kenapa:** Memperkecil ukuran file yang dikirim ke browser.
  - **Cara Cek:** Buka Network tab (F12), lihat header `Content-Encoding: gzip` atau `br` pada file HTML/CSS/JS.
  - **Target:** Kompresi aktif.

- [ ] **17. Queue Worker Test**
  - **Kenapa:** Memastikan proses *background* (seperti resize gambar properti baru) berjalan.
  - **Cara Cek:** Cek apakah `php artisan queue:work` berjalan di server. Upload properti dan cek apakah job masuk ke tabel `jobs`.
  - **Target:** Queue berjalan tanpa error.

- [ ] **18. HTTP/2 atau HTTP/3 Test**
  - **Kenapa:** Protokol terbaru memungkinkan loading file secara paralel.
  - **Cara Cek:** Cek kolom "Protocol" di Network tab.
  - **Target:** `h2` atau `h3`.

---

## 🛡️ KATEGORI 4: Keamanan (Security)
*Website yang tidak aman bisa di-hack, dan saat di-hack, performanya hancur.*

- [ ] **19. Debug Mode Test**
  - **Kenapa:** Jangan sampai error *coding* terlihat oleh publik.
  - **Cara Cek:** Cek file `.env` di server.
  - **Target:** `APP_DEBUG=false` dan `APP_ENV=production`.

- [ ] **20. Rate Limiting Test**
  - **Kenapa:** Mencegah spam form (seperti form "Kami Carikan").
  - **Cara Cek:** Coba submit form berkali-kali dalam 1 menit. Cek apakah diblokir (HTTP 429).
  - **Target:** Middleware `throttle` aktif di route form.

- [ ] **21. Mass Assignment Test**
  - **Kenapa:** Mencegah user menyisipkan data ke kolom sensitif (misal `is_recommended`).
  - **Cara Cek:** Cek file Model, pastikan ada `$fillable` atau `$guarded`.
  - **Target:** Semua input dari form dibatasi.

- [ ] **22. XSS Test**
  - **Kenapa:** Mencegah script jahat masuk lewat form komentar/deskripsi.
  - **Cara Cek:** Coba input `<script>alert(1)</script>` di form. Pastikan ter-escape saat ditampilkan.
  - **Target:** Semua output menggunakan `{{ }}` bukan `{!! !!}` (kecuali konten terpercaya).

- [ ] **23. CSRF Test**
  - **Kenapa:** Mencegah serangan form dari website lain.
  - **Cara Cek:** Cek source code setiap `<form>`, pastikan ada `@csrf`.
  - **Target:** Semua form POST memiliki token.

---

## 🚀 KATEGORI 5: Load & Stress Testing (Opsional)
*Mengetahui batas maksimal server sebelum crash.*

- [ ] **24. Concurrent User Test**
  - **Kenapa:** Simulasi banyak user bersamaan.
  - **Cara Cek:** Gunakan `k6 run script.js` (simulasi 50-100 VUs selama 30 detik).
  - **Target:** Response time tetap < 1 detik, error rate < 1%.

- [ ] **25. Breaking Point Test**
  - **Kenapa:** Cari tahu pada user ke-berapa server mulai crash.
  - **Cara Cek:** Naikkan beban bertahap (100, 200, 500 VUs).
  - **Target:** Mengetahui kapasitas server saat ini untuk perencanaan *upgrade*.

---

## 🎯 Prioritas Eksekusi (Jika Waktu Terbatas)
Jika kamu hanya punya waktu 1-2 jam, lakukan ini dulu:
1. **Test #1 (N+1 Query)** di halaman `/beli`.
2. **Test #7 (LCP)** menggunakan Google PageSpeed Insights.
3. **Test #10 (Image)** di halaman listing.
4. **Test #19 (Debug Mode)** di `.env` server.
5. **Test #24 (Concurrent User)** dengan `k6` (50 VUs).
