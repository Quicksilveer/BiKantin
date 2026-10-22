-- Setup tabel BI-Kantin di database db_bikantin (aman dijalankan berulang kali)
--
-- Cara yang disarankan: pakai migration + seeder Laravel
--   php artisan migrate --seed
--
-- File ini hanya untuk DB lama yang sudah berisi tabel kantin, siswa, menu,
-- transaksi, dan detail_transaksi. Akun uji dibuat lewat `php artisan db:seed`
-- agar password-nya otomatis di-hash.

CREATE DATABASE IF NOT EXISTS db_bikantin;
USE db_bikantin;

-- Tabel users (akun login admin & siswa)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'siswa') NOT NULL
);

-- Tabel pesanan (relasi ke users dan menu)
-- Catatan: tabel menu yang sudah ada memakai primary key id_menu
CREATE TABLE IF NOT EXISTS pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    menu_id INT NOT NULL,
    jumlah INT NOT NULL,
    total_harga INT NOT NULL,
    status VARCHAR(100) DEFAULT 'Menunggu Konfirmasi',
    FOREIGN KEY (user_id) REFERENCES users (id),
    FOREIGN KEY (menu_id) REFERENCES menu (id_menu)
);

-- Data uji coba menu (masuk ke kantin id 1)
INSERT INTO menu (id_kantin, nama_menu, harga, kategori, stok)
SELECT 1, 'Nasi Goreng Spesial', 15000, 'Makanan', 20 FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM menu WHERE nama_menu = 'Nasi Goreng Spesial');

INSERT INTO menu (id_kantin, nama_menu, harga, kategori, stok)
SELECT 1, 'Es Teh Manis', 4000, 'Minuman', 20 FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM menu WHERE nama_menu = 'Es Teh Manis');
