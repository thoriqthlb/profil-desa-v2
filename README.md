# Website Profil & Potensi Desa Wiramastra

Platform sistem informasi desa dan portal potensi lokal yang dikembangkan khusus untuk Pemerintah Desa Wiramastra, Kecamatan Bawang, Kabupaten Banjarnegara. Proyek ini dirancang sebagai media keterbukaan informasi publik sekaligus alat promosi desa yang terintegrasi dengan sistem *Content Management System* (CMS) mandiri.

Proyek ini merupakan luaran dedikasi dari program Kuliah Kerja Nyata (KKN) Universitas Negeri Semarang (UNNES) tahun 2026, yang berfokus pada pencapaian **SDG 9** (Infrastruktur dan Digitalisasi) serta **SDG 11** (Pemukiman Berkelanjutan).

## 🚀 Fitur Utama

* **Portal Informasi Terpusat:** Menyajikan berita, pengumuman, dan transparansi kegiatan desa.
* **Katalog Potensi Lokal:** Etalase digital untuk mempromosikan UMKM, pariwisata, dan hasil bumi.
* **Buku Profil Digital:** Integrasi *flipbook* interaktif untuk membaca profil desa secara dinamis.
* **Panel Admin Intuitif:** *Dashboard* pengelolaan konten yang sangat mudah dioperasikan oleh perangkat desa tanpa memerlukan keahlian *coding*.
* **Penyimpanan Mandiri:** Seluruh aset media dan dokumen tersimpan secara lokal di dalam *server* desa.

## 🛠️ Teknologi yang Digunakan

* **Framework:** Laravel 12 (PHP 8.2)
* **Admin Panel:** Filament PHP v5
* **Database:** MySQL
* **Arsitektur Media:** Local/Public Disk Storage

## 💻 Instalasi Lokal (Development)

Untuk menjalankan proyek ini di lingkungan pengembangan lokal (XAMPP/Laragon), ikuti langkah-langkah berikut:

1. Kloning *repository* ini:
   ```bash
   git clone https://github.com/thoriqthlb/profil-desa-v2.git
   cd profil-desa-v2
   ```

2. Instal dependensi PHP:
   ```bash
   composer install
   ```

3. Salin konfigurasi *environment* dan sesuaikan kredensial *database* lokalmu:
   ```bash
   cp .env.example .env
   ```

4. *Generate* kunci aplikasi:
   ```bash
   php artisan key:generate
   ```

5. Jalankan migrasi *database*:
   ```bash
   php artisan migrate
   ```

6. Tautkan penyimpanan untuk media gambar:
   ```bash
   php artisan storage:link
   ```

7. Buat akun admin pertama untuk mengakses panel:
   ```bash
   php artisan make:filament-user
   ```

8. Jalankan *server* pengembangan:
   ```bash
   php artisan serve
   ```
   Akses website publik di `http://localhost:8000` dan panel admin di `http://localhost:8000/kelola`.

## 📦 Panduan Deployment (cPanel)

Proyek ini di-deploy langsung melalui Terminal SSH bawaan cPanel dengan mengkloning *repository* ke `public_html`.

1. Kloning proyek langsung ke `public_html` melalui Terminal cPanel.
2. Jalankan `composer install --ignore-platform-req=ext-intl` (untuk menyesuaikan limitasi ekstensi server yang tidak menyediakan `intl`).
3. Konfigurasi file `.env` dengan kredensial *database* cPanel.
4. Jalankan `php artisan migrate` dan `php artisan storage:link` di Terminal cPanel.
5. Pastikan file `.htaccess` di direktori root telah disesuaikan agar me-rutekan lalu lintas pengunjung ke folder `public`.

## 👥 Pengembang

Dikembangkan oleh **Thoriq** (Pengembangan Sistem & Backend) dan **Afrilza Daffa Naryopramono** (Antarmuka & Pengalaman Pengguna) — Tim KKN UNNES 2026.
