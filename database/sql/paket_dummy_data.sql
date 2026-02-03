-- Migration SQL untuk tabel paket
CREATE TABLE IF NOT EXISTS `paket` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Id_Produk` varchar(50) NOT NULL,
  `Nama_Produk` varchar(100) NOT NULL,
  `Jenis_Produk` varchar(50) NOT NULL,
  `Deskripsi_Produk` text NOT NULL,
  `Harga_Produk` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `paket_id_produk_unique` (`Id_Produk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert 4 data paket
INSERT INTO `paket` (`Id_Produk`, `Nama_Produk`, `Jenis_Produk`, `Deskripsi_Produk`, `Harga_Produk`, `created_at`, `updated_at`) VALUES
('PKT-001', 'Paket Hemat', '10Mbps', 'Paket hemat cocok digunakan untuk satu orang pengguna', 'Rp.150.000', NOW(), NOW()),
('PKT-002', 'Paket Sedang', '20Mbps', 'Paket sedang cocok untuk digunakan keluarga kecil', 'Rp.200.000', NOW(), NOW()),
('PKT-003', 'Paket Senyum', '30Mbps', 'Paket senyum cocok digunakan untuk keluarga 5-6 orang', 'Rp.250.000', NOW(), NOW()),
('PKT-004', 'Paket Bahagia', '50Mbps', 'Paket Bahagia cocok digunakan untuk semua keluarga', 'Rp.350.000', NOW(), NOW());
