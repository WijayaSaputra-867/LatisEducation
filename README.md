# LatisEducation - Student Management System

Sistem manajemen data siswa untuk LatisEducation dan TutorIndonesia berbasis Laravel.

## Fitur Utama

- **Authentication**: Login dan registrasi menggunakan Laravel Fortify.
- **Student Management (CRUD)**: Tambah, edit, lihat, dan hapus data siswa (NIS, Nama, Email, Foto, Institusi).
- **Institution Filtering**: Filter data siswa berdasarkan institusi (LatisEducation & TutorIndonesia) secara dinamis menggunakan DataTables.
- **Export to Excel**: Unduh data siswa ke file `.xlsx` dengan heading dan pemetaan kolom yang rapi via Maatwebsite/Laravel-Excel.
- **Photo Upload**: Penyimpanan foto siswa ke storage lokal.

## Tech Stack

- **Backend**: Laravel 13 / PHP 8.4+
- **Frontend**: Blade, Tailwind CSS v4, Vanilla JavaScript
- **Datatable**: DataTables 2.x (`datatables.net-dt`)
- **Excel Export**: `maatwebsite/excel` v4
- **Bundler**: Vite

## Prasyarat

- PHP >= 8.4
- Composer
- Node.js & npm
- MySQL / MariaDB / SQLite

## Instalasi & Menjalankan Project

1. **Clone repository & masuk ke direktori project**:
   ```bash
   git clone <repo-url>
   cd LatisEducation
   ```

2. **Install dependensi PHP & JavaScript**:
   ```bash
   composer install
   npm install
   ```

3. **Konfigurasi Environment**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   *Sesuaikan konfigurasi database pada file `.env`.*

4. **Migrasi Database & Seeding**:
   ```bash
   php artisan migrate --seed
   ```

5. **Storage Symlink**:
   ```bash
   php artisan storage:link
   ```

6. **Jalankan Server Development**:
   ```bash
   # Terminal 1 - Laravel Server
   php artisan serve

   # Terminal 2 - Vite Assets
   npm run dev
   ```
   Aplikasi dapat diakses melalui `http://localhost:8000`.

## Lisensi

[MIT License](LICENSE)
