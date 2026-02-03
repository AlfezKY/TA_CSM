-- Migration SQL untuk tabel pelanggan
CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) NOT NULL,
  `paket` varchar(50) NOT NULL,
  `nomor_telepon` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `jatuh_tempo` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert 10 data dummy pelanggan
INSERT INTO `pelanggan` (`nama_lengkap`, `paket`, `nomor_telepon`, `alamat`, `jatuh_tempo`, `created_at`, `updated_at`) VALUES
('Ahmad Rizki Pratama', 'Paket Internet 50 Mbps', '081234567890', 'Jl. Merdeka No. 123, RT 05/RW 02, Kelurahan Sukajadi, Kecamatan Sukajadi, Bandung', DATE_ADD(CURDATE(), INTERVAL 15 DAY), NOW(), NOW()),
('Siti Nurhaliza', 'Paket Internet 100 Mbps', '082345678901', 'Jl. Gatot Subroto No. 45, RT 03/RW 01, Kelurahan Cikini, Kecamatan Menteng, Jakarta Pusat', DATE_ADD(CURDATE(), INTERVAL 20 DAY), NOW(), NOW()),
('Budi Santoso', 'Paket Internet 30 Mbps', '083456789012', 'Jl. Diponegoro No. 78, RT 02/RW 03, Kelurahan Kebon Jeruk, Kecamatan Kebon Jeruk, Jakarta Barat', DATE_ADD(CURDATE(), INTERVAL 10 DAY), NOW(), NOW()),
('Dewi Lestari', 'Paket Internet 200 Mbps', '084567890123', 'Jl. Sudirman No. 12, RT 01/RW 04, Kelurahan Senayan, Kecamatan Kebayoran Baru, Jakarta Selatan', DATE_ADD(CURDATE(), INTERVAL 25 DAY), NOW(), NOW()),
('Eko Wijaya', 'Paket Internet 50 Mbps', '085678901234', 'Jl. Thamrin No. 89, RT 04/RW 02, Kelurahan Menteng, Kecamatan Menteng, Jakarta Pusat', DATE_ADD(CURDATE(), INTERVAL 18 DAY), NOW(), NOW()),
('Fitri Handayani', 'Paket Internet 75 Mbps', '086789012345', 'Jl. Asia Afrika No. 56, RT 06/RW 01, Kelurahan Braga, Kecamatan Sumur Bandung, Bandung', DATE_ADD(CURDATE(), INTERVAL 22 DAY), NOW(), NOW()),
('Gunawan Setiawan', 'Paket Internet 30 Mbps', '087890123456', 'Jl. Ahmad Yani No. 34, RT 03/RW 05, Kelurahan Cipete, Kecamatan Cilandak, Jakarta Selatan', DATE_ADD(CURDATE(), INTERVAL 12 DAY), NOW(), NOW()),
('Hani Permata Sari', 'Paket Internet 100 Mbps', '088901234567', 'Jl. HR Rasuna Said No. 67, RT 05/RW 03, Kelurahan Kuningan, Kecamatan Setiabudi, Jakarta Selatan', DATE_ADD(CURDATE(), INTERVAL 28 DAY), NOW(), NOW()),
('Indra Kurniawan', 'Paket Internet 50 Mbps', '089012345678', 'Jl. Kebon Sirih No. 23, RT 02/RW 04, Kelurahan Kebon Sirih, Kecamatan Menteng, Jakarta Pusat', DATE_ADD(CURDATE(), INTERVAL 16 DAY), NOW(), NOW()),
('Joko Widodo', 'Paket Internet 150 Mbps', '081123456789', 'Jl. Jenderal Sudirman No. 90, RT 01/RW 01, Kelurahan Karet Tengsin, Kecamatan Tanah Abang, Jakarta Pusat', DATE_ADD(CURDATE(), INTERVAL 30 DAY), NOW(), NOW());
