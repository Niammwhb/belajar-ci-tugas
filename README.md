# Toko Online CodeIgniter 4

Proyek ini adalah platform toko online berbasis web yang dibangun menggunakan framework _CodeIgniter 4, dilengkapi dengan integrasi \*\*NiceAdmin template_ untuk tampilan UI yang profesional dan responsif. Sistem mendukung fungsi e-commerce dasar seperti katalog produk, keranjang belanja, checkout dengan ongkos kirim otomatis (API RajaOngkir), serta manajemen produk melalui panel admin.

---

## Daftar Isi

- [Fitur](#fitur)
- [Persyaratan Sistem](#persyaratan-sistem)
- [Instalasi](#instalasi)
- [Struktur Proyek](#struktur-proyek)

---

## Fitur

### 🎯 Katalog Produk

- Menampilkan daftar produk lengkap dengan:
  - Gambar
  - Nama produk
  - Harga asli dan harga setelah diskon (jika tersedia)
- Fitur pencarian nama produk
- Kategori produk untuk memfilter berdasarkan jenis
- Detail produk individual

### 🛒 Keranjang Belanja

- Tambahkan produk ke keranjang dari katalog
- Simpan dan tampilkan:
  - Foto produk
  - Harga asli
  - Diskon aktif (berbasis tanggal)
  - Harga setelah diskon
  - Jumlah item yang bisa disesuaikan
- Edit atau hapus item di keranjang
- Informasi subtotal dan total harga

### 💳 Sistem Checkout dan Transaksi

- Halaman checkout dengan isian:
  - Nama pengguna (otomatis dari sesi login)
  - Alamat lengkap
  - Kelurahan tujuan (menggunakan Select2 + API RajaOngkir)
  - Pilih layanan ekspedisi dan estimasi ongkir
- Hitung total transaksi secara dinamis (harga + ongkir)
- Simpan data transaksi ke database
- Simpan detail produk yang dibeli (termasuk qty, diskon, subtotal)

### 📦 Riwayat Transaksi

- Menampilkan semua transaksi pengguna (fitur tambahan)

### ⚙ Panel Admin

- Login khusus untuk admin
- Manajemen Produk:
  - CRUD produk dengan gambar, harga, dan kategori
- Manajemen Diskon:
  - Tambah diskon harian berbasis tanggal
- Manajemen Kategori:
  - Tambah/hapus/edit kategori produk
- Laporan Transaksi:
  - Tampilkan semua transaksi yang masuk
  - Filter laporan dan _export ke PDF_

### 🔐 Sistem Autentikasi

- Login dan Register pengguna
- Hak akses berdasarkan peran (user dan admin)
- Logout dan session manajemen

### 💅 Tampilan Responsif

- Menggunakan [NiceAdmin Bootstrap Template](https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/) yang modern dan mobile-friendly

---

## Persyaratan Sistem

- PHP >= 8.2
- Composer
- Web server (XAMPP atau Laravel Valet)
- MySQL / MariaDB
- Koneksi Internet (untuk akses API RajaOngkir)

---

## Instalasi

1. _Clone repository ini_
   bash
   git clone [URL repository]
   cd belajar-ci-tugas
