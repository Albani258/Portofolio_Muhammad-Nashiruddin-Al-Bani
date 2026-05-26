-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2026 at 05:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pengajuan`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(5, '2026_05_05_070546_create_stocks_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengadaans`
--

CREATE TABLE `pengadaans` (
  `id` int(11) NOT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `jumlah_pengadaan` int(11) NOT NULL,
  `satuan` varchar(50) NOT NULL DEFAULT 'Pcs',
  `minimal_stock` int(11) NOT NULL DEFAULT 0,
  `lokasi` varchar(255) DEFAULT NULL,
  `harga_satuan` decimal(15,2) DEFAULT NULL,
  `nama_supplier` varchar(255) DEFAULT NULL,
  `kontak_supplier` varchar(100) DEFAULT NULL,
  `tanggal_pengadaan` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Selesai',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_barang`
--

CREATE TABLE `pengajuan_barang` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` int(11) NOT NULL,
  `jumlah_pengajuan` int(11) NOT NULL,
  `jumlah_disetujui` int(11) DEFAULT NULL,
  `satuan` enum('Pcs','Box','Paket','Unit','Set','Lembar','Buah') DEFAULT 'Pcs',
  `perkiraan_harga` decimal(15,2) DEFAULT NULL,
  `status_pengajuan` enum('Pending','Disetujui semua','Disetujui sebagian','Ditolak','Revisi') NOT NULL DEFAULT 'Pending',
  `prioritas` enum('Normal','Urgent','Critical') DEFAULT 'Normal',
  `tanggal_pengajuan` date DEFAULT curdate(),
  `tanggal_dibutuhkan` date DEFAULT NULL,
  `divisi_pengaju` varchar(100) DEFAULT NULL,
  `nama_pengaju` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `supplier_nama` varchar(255) DEFAULT NULL,
  `supplier_kontak` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_barang_baru`
--

CREATE TABLE `pengajuan_barang_baru` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stock_id` int(11) DEFAULT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `satuan` enum('Pcs','Box','Paket','Unit','Set','Lembar','Roll') DEFAULT 'Pcs',
  `jumlah_pengajuan` int(11) NOT NULL,
  `jumlah_disetujui` int(11) DEFAULT NULL,
  `perkiraan_harga` decimal(15,2) DEFAULT NULL,
  `prioritas` enum('Normal','Urgent','Critical') DEFAULT 'Normal',
  `tanggal_pengajuan` date NOT NULL,
  `tanggal_dibutuhkan` date DEFAULT NULL,
  `divisi_pengaju` varchar(100) DEFAULT NULL,
  `nama_pengaju` varchar(255) DEFAULT NULL,
  `supplier_nama` varchar(255) DEFAULT NULL,
  `supplier_kontak` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status_pengajuan` enum('Pending','Disetujui semua','Disetujui sebagian','Ditolak') DEFAULT 'Pending',
  `created_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `jumlah_stock` int(11) NOT NULL DEFAULT 0,
  `satuan` varchar(50) NOT NULL DEFAULT 'Pcs',
  `minimal_stock` int(11) NOT NULL DEFAULT 0,
  `lokasi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `nama_barang`, `kode_barang`, `kategori`, `jumlah_stock`, `satuan`, `minimal_stock`, `lokasi`, `created_at`, `updated_at`) VALUES
(374, 'Spidol White Board Marker Hitam', '000001', 'ALAT TULIS', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(375, 'Spidol White Board Marker Warna Snowman', '000002', 'ALAT TULIS', 2, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(376, 'Pulpen Zebra Hitam', '000003', 'ALAT TULIS', 0, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(377, 'Pulpen Sakura Ballsign 05 Hitam', '000004', 'ALAT TULIS', 0, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(378, 'Refill Sakura Ballsign 05 Hitam', '000005', 'ALAT TULIS', 0, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(379, 'Pulpen Sakura Ballsign ID 3C', '000006', 'ALAT TULIS', 0, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(380, 'Pensil Joyko', '000007', 'ALAT TULIS', 0, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(381, 'Pulpen Balliner Hitam Pilot', '000008', 'ALAT TULIS', 1, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(382, 'Pulpen Balliner Biru Pilot', '000009', 'ALAT TULIS', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(383, 'Pensil 2B Joyko', '000010', 'ALAT TULIS', 0, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(384, 'Pulpen Gel Joyko GP-265 Hitam', '000011', 'ALAT TULIS', 0, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(385, 'Pulpen Standard AE7 Hitam', '000012', 'ALAT TULIS', 3, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(386, 'Pulpen DIY 4 Warna', '000013', 'ALAT TULIS', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(387, 'Stabilo Boss Warna Mix', '000014', 'ALAT TULIS', 0, 'SET', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(388, 'Pena Balliner Biru', '000015', 'ALAT TULIS', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(389, 'Pulpen Joyko 4 Warna BP-213', '000016', 'ALAT TULIS', 4, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(390, 'Pulpen Tizo TG340', '000017', 'ALAT TULIS', 4, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(391, 'Stabilo Joyko Merah', '000018', 'ALAT TULIS', 10, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(392, 'Stabilo Joyko Kuning', '000019', 'ALAT TULIS', 8, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(393, 'Stabilo Joyko Hijau', '000020', 'ALAT TULIS', 7, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(394, 'Stabilo Joyko Biru', '000021', 'ALAT TULIS', 11, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(395, 'Pensil 2B Staedtler', '000022', 'ALAT TULIS', 5, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(396, 'Pensil Mekanik Rotring Tikky 0.5', '000023', 'ALAT TULIS', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(397, 'Pulpen 4 Warna Zebra A4C 0.7', '000024', 'ALAT TULIS', 1, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(398, 'Spidol WhiteBoard Marker Hitam', '000025', 'ALAT TULIS', 2, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(399, 'Spidol White Board Marker Biru', '000026', 'ALAT TULIS', 1, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(400, 'Spidol White Board Marker Merah', '000027', 'ALAT TULIS', 1, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(401, 'Pena Balliner Hitam Pilot', '000028', 'ALAT TULIS', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(402, 'Tinta Stempel Ungu', '000001', 'TINTA TULIS', 0, 'BOTOL', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(403, 'Tinta Stempel Biru', '000002', 'TINTA TULIS', 0, 'BOTOL', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(404, 'Tinta Stempel Trodat Ungu 100 ml', '000003', 'TINTA TULIS', 5, 'BOTOL', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(405, 'Tinta Stempel Ungu Cap Manis', '000004', 'TINTA TULIS', 0, 'BOTOL', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(406, 'Paperclip M', '000001', 'PENJEPIT KERTAS', 0, 'BOX', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(407, 'Binder Clips Joyko No. 107', '000002', 'PENJEPIT KERTAS', 5, 'BOX', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(408, 'Trigonal Clips Joyko No. 3', '000003', 'PENJEPIT KERTAS', 4, 'BOX', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(409, 'Tipex Pentel ZL62-W', '000001', 'PENGHAPUS', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(410, 'Penghapus Pensil Besar', '000002', 'PENGHAPUS', 0, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(411, 'Tipex Joyko CF-S209A', '000003', 'PENGHAPUS', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(412, 'Correction Tape Joyko CT-522', '000004', 'PENGHAPUS', 21, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(413, 'Penghapus Pensil Joyko 526-B40BL', '000005', 'PENGHAPUS', 5, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(414, 'Buku Tulis Folio', '000001', 'BUKU TULIS', 8, 'BUKU', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(415, 'Notebook A5 DIY', '000002', 'BUKU TULIS', 1, 'BUKU', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(416, 'Notebook Custom BPSDM', '000003', 'BUKU TULIS', 6, 'BUKU', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(417, 'Map L Folio', '000001', 'MAP', 0, 'PCS', 20, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(418, 'Map BPSDM Putih', '000002', 'MAP', 500, 'PCS', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(419, 'Boxfile Bindex Biru', '000003', 'MAP', 2, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(420, 'PP Pockets Bambi isi 20', '000004', 'MAP', 0, 'PACK', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(421, 'Ordner Bindex Folio', '000005', 'MAP', 2, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(422, 'Map A5 Pimti', '000006', 'MAP', 12, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(423, 'Map Zipper Resleting Folio', '000007', 'MAP', 0, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(424, 'Smart Pocket Kancing Bening Daiichi', '000008', 'MAP', 0, 'PACK', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(425, 'Smart Pocket Perekat Merah Daiichi', '000009', 'MAP', 0, 'PACK', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(426, 'Smart Pocket Perekat Kuning Daiichi', '000010', 'MAP', 0, 'PACK', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(427, 'Smart Pocket Perekat Hijau Daiichi', '000011', 'MAP', 0, 'PACK', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(428, 'Smart Pocket Perekat Biru Daiichi', '000012', 'MAP', 0, 'PACK', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(429, 'Map Snelheckter F4 Felix', '000013', 'MAP', 18, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(430, 'Map L Etona F4', '000014', 'MAP', 0, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(431, 'Smart Pocket Dataplus Bening', '000015', 'MAP', 0, 'PACK', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(432, 'Map Kancing', '000016', 'MAP', 0, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(433, 'Map L', '000017', 'MAP', 0, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(434, 'Map Clear Sleeves Folio Daiichi', '000018', 'MAP', 25, 'PACK', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(435, 'Smart Pocket Kancing Bening Daiichi (Pak)', '000019', 'MAP', 20, 'PACK', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(436, 'Map Snelheckter Felix Biru', '000020', 'MAP', 5, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(437, 'Penggaris Besi Deli 50cm', '000001', 'PENGGARIS', 9, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(438, 'Penggaris Besi Joyko 100cm', '000002', 'PENGGARIS', 10, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(439, 'Gunting Kenko 838 Sedang', '000001', 'CUTTER', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(440, 'Alat Pemotong Kertas Origin', '000002', 'CUTTER', 0, 'PCS', 2, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(441, 'Gunting Joyko Sedang', '000003', 'CUTTER', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(442, 'Cutter Kenko A-300AL', '000004', 'CUTTER', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(443, 'Tape Cutter Joyko TD-2', '000005', 'CUTTER', 2, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(444, 'Cutter Kenko L-500', '000006', 'CUTTER', 5, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(445, 'Lem Kertas Joyko 35ml', '000001', 'ALAT PEREKAT', 12, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(446, 'Lakban Bening Taruna', '000002', 'ALAT PEREKAT', 0, 'ROLL', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(447, 'Double Tape Kenko 2', '000003', 'ALAT PEREKAT', 9, 'ROLL', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(448, 'Lakban Coklat Aligator', '000004', 'ALAT PEREKAT', 1, 'ROLL', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(449, 'Lakban Hitam Ginnva', '000005', 'ALAT PEREKAT', 0, 'ROLL', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(450, '3M PE Foam Tape 10mm', '000006', 'ALAT PEREKAT', 0, 'ROLL', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(451, 'Lakban Bening 10mm', '000007', 'ALAT PEREKAT', 6, 'ROLL', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(452, 'Lakban Bening 24mm', '000008', 'ALAT PEREKAT', 0, 'ROLL', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(453, 'Lakban Bening Daimaru 10 mm', '000009', 'ALAT PEREKAT', 1, 'ROLL', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(454, 'Lakban Bening Daimaru 24 mm', '000010', 'ALAT PEREKAT', 2, 'ROLL', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(455, 'Lakban Coklat Daimaru 48 mm', '000011', 'ALAT PEREKAT', 9, 'ROLL', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(456, 'Lakban Hitam Daimaru 48 mm', '000012', 'ALAT PEREKAT', 6, 'ROLL', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(457, 'Stapler HD No. 10 Joyko', '000001', 'STAPLER', 11, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(458, 'Stapler Joyko HD-12N/24', '000001', 'STAPLER', 1, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(459, 'Stapler Joyko HD No. 10', '000002', 'STAPLER', 5, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(460, 'Isi Stapler Joyko No. 10', '000001', 'ISI STAPLES', 7, 'BOX', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(461, 'Isi Stapler Joyko HD-12N/24', '000002', 'ISI STAPLES', 1, 'BOX', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(462, 'Tempat Pulpen Jala Besi (AJS 021)', '000001', 'ALAT KANTOR', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(463, 'Tempat Pulpen Jala Besi (AJS 014)', '000002', 'ALAT KANTOR', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(464, 'Stabilo Zebra Kuning', '000003', 'ALAT KANTOR', 0, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(465, 'Tempat Pulpen Sworld Putih', '000004', 'ALAT KANTOR', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(466, 'Stabilo Zebra Pink', '000005', 'ALAT KANTOR', 0, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(467, 'Rautan Pensil', '000006', 'ALAT KANTOR', 0, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(468, 'Pelubang Kertas Joyko No. 85b', '000007', 'ALAT KANTOR', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(469, 'Kalkulator Kincizen', '000008', 'ALAT KANTOR', 1, 'PCS', 2, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(470, 'Stabilo Boss Mix Warna', '000009', 'ALAT KANTOR', 0, 'SET', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(471, 'Rautan Pensil Joyko B-23', '000010', 'ALAT KANTOR', 9, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(472, 'Papan Nama Akrilik', '000011', 'ALAT KANTOR', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(473, 'Sticky Note TJ 654 Mix 4 Warna', '000012', 'ALAT KANTOR', 0, 'PACK', 20, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(474, 'Sign Here Post It 3M', '000013', 'ALAT KANTOR', 0, 'PACK', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(475, 'Sign Here Joyko', '000014', 'ALAT KANTOR', 0, 'PACK', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(476, 'Rautan Pensil Meja Joyko A-5M', '000015', 'ALAT KANTOR', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(477, 'Tempat Lakban Joyko TD-103', '000016', 'ALAT KANTOR', 12, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(478, 'Rak Dokumen Besi Joyko DT-31', '000017', 'ALAT KANTOR', 2, 'PCS', 2, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(479, 'Sticky Notes Index & Mark 5 Warna TJ 44-5', '000018', 'ALAT KANTOR', 3, 'PACK', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(480, 'Magnet Papan Tulis', '000019', 'ALAT KANTOR', 5, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(481, 'Stabilo Merah Joyko', '000022', 'ALAT KANTOR', 12, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(482, 'Stabilo Kuning Joyko', '000023', 'ALAT KANTOR', 12, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(483, 'Stabilo Hijau Joyko', '000024', 'ALAT KANTOR', 12, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(484, 'Stabilo Biru Joyko', '000025', 'ALAT KANTOR', 11, 'PCS', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(485, 'Kertas HVS Paper One A4 80gr', '000001', 'KERTAS HVS', 122, 'RIM', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(486, 'Kertas HVS Paper One F4 80gr', '000002', 'KERTAS HVS', 77, 'RIM', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(487, 'Sticky Note TJ 654 Mix 4 Colour', '000001', 'KERTAS', 0, 'PACK', 20, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(488, 'Sticker Glossy E-Print', '000002', 'KERTAS', 13, 'LEMBAR', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(489, 'Sticker Labels T&J No. 103', '000003', 'KERTAS', 6, 'PACK', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(490, 'Kertas Pembatas Penjepit Dokumen', '000004', 'KERTAS', 0, 'PACK', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(491, 'Sticky Note 5 Warna Stick Me', '000005', 'KERTAS', 37, 'PACK', 20, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(492, 'Sticky Note Joyko 5 Warna', '000006', 'KERTAS', 39, 'PACK', 20, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(493, 'Kertas Concorde PP A4 90 gr', '000001', 'KERTAS COVER', 9, 'LEMBAR', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(494, 'Kertas Concorde PP A4 90 gr Putih Gading', '000002', 'KERTAS COVER', 15, 'LEMBAR', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(495, 'Amplop Paperline Isi 100', '000001', 'AMPLOP', 19, 'PACK', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(496, 'Amplop BPSDM 39x29cm Coklat', '000002', 'AMPLOP', 100, 'PCS', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(497, 'Amplop BPSDM 23x11cm Coklat', '000003', 'AMPLOP', 81, 'PCS', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(498, 'Amplop BPSDM 25x19cm Putih', '000004', 'AMPLOP', 0, 'PCS', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(499, 'Sign Here 3M Post It', '000001', 'KERTAS LAIN', 0, 'PACK', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(500, 'Sign Here Joyko IM-35', '000002', 'KERTAS LAIN', 42, 'PACK', 20, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(501, 'Tinta Printer Epson L15160 (008)', '000001', 'TINTA PRINTER', 0, 'BOTOL', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(502, 'Tinta Epson 008 L15160', '000002', 'TINTA PRINTER', 0, 'BOTOL', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(503, 'Tinta Epson 008', '000003', 'TINTA PRINTER', 0, 'BOTOL', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(504, 'Tinta Printer Epson 008', '000004', 'TINTA PRINTER', 38, 'BOTOL', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(505, 'Tinta Epson 003', '000005', 'TINTA PRINTER', 49, 'BOTOL', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(506, 'Flashdisk Sandisk 64GB', '000001', 'FLASHDISK', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(507, 'Flasdisk Sandisk Ultra Type C 32 GB', '000002', 'FLASHDISK', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(508, 'Mouse Logitech B100', '000001', 'MOUSE', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(509, 'Mouse Pad Hitam Ugreen 290x225mm', '000001', 'MOUSE PAD', 4, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(510, 'ABC Alkaline AAA', '000001', 'BATERAI', 0, 'PACK', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(511, 'ABC Alkaline AA', '000002', 'BATERAI', 0, 'PACK', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(512, 'Baterai ABC Alkaline 9 Volt', '000003', 'BATERAI', 3, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(513, 'Baterai Alkaline ABC AA', '000004', 'BATERAI', 0, 'PACK', 10, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(514, 'Baterai Alkaline ABC AAA (Isi 48)', '000005', 'BATERAI', 3, 'PACK', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(515, 'Baterai Alkaline ABC AA (Isi 48)', '000006', 'BATERAI', 2, 'PACK', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(516, 'Meterai 10.000', '000001', 'METERAI', 0, 'LEMBAR', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(517, 'Meterai Rp. 10.000', '000002', 'METERAI', 0, 'LEMBAR', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(518, 'Stempel Badan', '000001', 'STEMPEL', 0, 'PCS', 2, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(519, 'Stempel Konseptor', '000002', 'STEMPEL', 0, 'PCS', 2, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(520, 'Box Obat', '000001', 'ALAT KANTOR', 0, 'PCS', 5, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(521, 'Tolak Angin', '000001', 'OBAT CAIR', 0, 'PCS', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(522, 'Susu Bear Brand', '000002', 'OBAT CAIR', 243, 'KALENG', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(523, 'You C1000 140 ML', '000003', 'OBAT CAIR', 243, 'PCS', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(524, 'Susu Steril Tujuh Kurma 189 ML', '000004', 'OBAT CAIR', 243, 'PCS', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(525, 'Madu Murni 325 Gr', '000005', 'OBAT CAIR', 243, 'BOTOL', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(526, 'Madu Murni 650 Gr', '000006', 'OBAT CAIR', 243, 'BOTOL', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(527, 'N Well Magnesium 30 Kapsul', '000001', 'OBAT PADAT', 0, 'BOX', 20, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(528, 'Fitsea Suplemen Sendi 60 Kapsul', '000002', 'OBAT PADAT', 0, 'BOX', 20, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(529, 'N-WELL Magnesium 30 Kapsul', '000003', 'OBAT PADAT', 0, 'BOX', 20, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(530, 'Nutriwell Magnesium', '000004', 'OBAT PADAT', 36, 'BOX', 20, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(531, 'Fitsea', '000005', 'OBAT PADAT', 36, 'BOX', 20, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(532, 'CDR Fortos Vitamin D 10 Kaplet', '000006', 'OBAT PADAT', 0, 'BOX', 20, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(533, 'CDR Vitamin C 10 Kaplet', '000007', 'OBAT PADAT', 0, 'BOX', 20, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(534, 'Imboost Force 10 Kaplet', '000008', 'OBAT PADAT', 243, 'BOX', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(535, 'Vitacimin Lemon Tablet', '000009', 'OBAT PADAT', 0, 'BOX', 20, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(536, 'Vitacimin Fruit Punch', '000010', 'OBAT PADAT', 0, 'BOX', 20, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(537, 'Redoxon', '000011', 'OBAT PADAT', 243, 'BOX', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(538, 'Blackmores Multivitamin & Mineral', '000012', 'OBAT PADAT', 243, 'BOX', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(539, 'Youvit Multivitamin 30 Gum', '000013', 'OBAT PADAT', 243, 'BOX', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46'),
(540, 'Freshcare Matcha', '000001', 'OBAT LAIN', 243, 'PCS', 50, 'Gudang BPSDM', '2026-05-22 15:13:46', '2026-05-22 15:13:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `divisi` varchar(100) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `nip`, `email`, `divisi`, `jabatan`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Rumga BPSDM IMIPAS', 'adminrumga', '01', 'rumahtangga.bpsdmimipas@gmail.com', 'Umum / Rumah Tangga', 'super admin', 'admin', NULL, '$2y$12$5gC9z2KLP6fHrWI.IOAsbe9wd3eFCrZqlsrlRQsQJqoxmEhdnWL9W', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:05'),
(2, 'User Rumga BPSDM IMIPAS', 'userrumga', '02', 'rumahtangga.bpsdmimipas@gmail.com', 'Umum / Rumah Tangga', 'User', 'user', NULL, '$2y$12$f2r16N2VSWdxhlvoH/PiuexNhaUg4qLq.tXE3jvl5rfNJPYGQutmm', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:06'),
(3, 'admin2', 'admin2', '03', 'rumahtangga.bpsdmimipas@gmail.com', 'BPSDM Imigrasi dan Pemasyarakatan', 'BPSDM Imigrasi dan Pemasyarakatan', 'admin', NULL, '$2y$12$Mhov.dow6yaKcf7ZcJbXIuo46kMI8yXhM5/pZcWuURbEv3ILfadQW', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:06'),
(4, 'admin1', 'admin1', '04', 'rumahtangga.bpsdmimipas@gmail.com', 'BPSDM Imigrasi dan Pemasyarakatan', 'BPSDM Imigrasi dan Pemasyarakatan', 'admin', NULL, '$2y$12$PkOcLYblK2Dk1pGRnxqPeORd4cT.1GIgl5OPnncg98tHdTa2KKbzO', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:06'),
(5, 'Muhammad Tito Andrianto', 'tito.andrianto', '197801141997031001', 'rumahtangga.bpsdmimipas@gmail.com', 'BPSDM Imigrasi dan Pemasyarakatan', 'Plt. Kepala BPSDM Imipas / Kepala Pusat Pelatihan', 'admin', NULL, '$2y$12$u2CZoeWl.dZnbKzhi2mapuUib4qE7Mzt909n7pC8yFrpSe1EXg5he', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:06'),
(6, 'Pujo Harinto', 'pujo.harinto', '196703311990011001', 'rumahtangga.bpsdmimipas@gmail.com', 'Pusat Pengembangan & Penilaian Kompetensi', 'Kepala Pusat Pengembangan & Penilaian Kompetensi', 'admin', NULL, '$2y$12$GR4aDTJzxVm3l7yWGjxfbuanLus6uto9jbI74A.hNKHwa.WetYsVa', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:07'),
(7, 'Dadan Gunawan', 'dadan.gunawan', '197103041991031002', 'rumahtangga.bpsdmimipas@gmail.com', 'BPSDM Imigrasi dan Pemasyarakatan', 'Sekretaris BPSDM Imipas', 'admin', NULL, '$2y$12$dlotRn1/Dfl83neSG0zR..w4uRBsTDsaPX1KMLcWcKPIVP3E.uanu', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:07'),
(8, 'Mochammad Sofyan Arief', 'sofyan.arief', '197904111999031001', 'rumahtangga.bpsdmimipas@gmail.com', 'Data & Sistem Informasi', 'Kepala Bagian Data & Sistem Informasi', 'admin', NULL, '$2y$12$OT8tpI.vZlgWPl14KvX55uRBLIZFE5gxirTzciwVjcZ7d6.l5AlHm', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:07'),
(9, 'Aman Budi Manduro', 'aman.manduro', '198002232006041011', 'rumahtangga.bpsdmimipas@gmail.com', 'Umum / Rumah Tangga', 'Kepala Bagian Umum', 'admin', NULL, '$2y$12$ozCVbReNPAdy.LFQL2k/n.ZC0A5lV7Ig7K0XI06fEktv8ei/fAite', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:07'),
(10, 'Dani Yekti Rahajeng', 'dani.rahajeng', '197709292001122001', 'rumahtangga.bpsdmimipas@gmail.com', 'Umum / Keuangan', 'Kepala Bagian Keuangan', 'admin', NULL, '$2y$12$kesj3tcNcCt7TRDkN6Wkh.YHpBy9hY5h/jLl30v1fhbNvBPpPV3ya', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:08'),
(11, 'Ade Irni Rizka', 'ade.rizka', '198304282006042001', 'rumahtangga.bpsdmimipas@gmail.com', 'Perencanaan & Kerja Sama', 'Kepala Bagian Perencanaan & Kerja Sama', 'admin', NULL, '$2y$12$rSTs/1cyq71Cqp8KM7/aOO8nF0jCYVf4mV.NC5r.5RebilcaDZ9gi', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:08'),
(12, 'Dede Irawan', 'dede.irawan', '199207302019011001', 'rumahtangga.bpsdmimipas@gmail.com', 'BPSDM Imigrasi dan Pemasyarakatan', 'Kepala Subbagian Tata Usaha', 'user', NULL, '$2y$12$2BxH2xIT09XJLP.yLHIJ..7DnLjCk/4/BTtKJ63PnPy5RwaGlws3u', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:08'),
(13, 'Sahril Wildani', 'sahril.wildani', '199202032010121004', 'rumahtangga.bpsdmimipas@gmail.com', 'Umum / Pimpinan, Humas, & Protokol', 'Kepala Subbagian TU Pimpinan, Humas & Protokol', 'user', NULL, '$2y$12$DZAwZsrPLsPIX4NQbdTCnOmWTQMXtCIq8izbhArjZsXPUP9B0oe42', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:08'),
(14, 'Jerold', 'jerold.rt', '198702052008011002', 'rumahtangga.bpsdmimipas@gmail.com', 'Umum / Rumah Tangga', 'Kepala Subbagian Rumah Tangga', 'user', NULL, '$2y$12$FkAIQHMnwDzrRXf92Aem9OjsV3pMeXVP9q7WTCgzjdylNix8DV/gG', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:09'),
(15, 'Staff Puslat 1', 'staff.puslat1', 'PUSLAT001', 'rumahtangga.bpsdmimipas@gmail.com', 'Pusat Pelatihan', 'Staff Pusat Pelatihan', 'user', NULL, '$2y$12$HiksH.OIn6UioinMxQumVOCUni06HY/J7gVgOx2jkeMVrx9kF8BH2', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:09'),
(16, 'Staff Puslat 2', 'staff.puslat2', 'PUSLAT002', 'rumahtangga.bpsdmimipas@gmail.com', 'Pusat Pelatihan', 'Staff Pusat Pelatihan', 'user', NULL, '$2y$12$LgFAlTDMxyAfh7a0uSDvHONMwfAeuCKJTVb.RI2WfxKqdlvxRuPm6', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:09'),
(17, 'Staff Pusbang 1', 'staff.pusbang1', 'PUSBANG001', 'rumahtangga.bpsdmimipas@gmail.com', 'Pusat Pengembangan & Penilaian Kompetensi', 'Staff Pusat Pengembangan & Penilaian Kompetensi', 'user', NULL, '$2y$12$y4qgNCU3Qbys.8HxJnNKn.VX.AQ3oVHolov.MKCdsR9nv2i/i6h.C', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:09'),
(18, 'Staff Pusbang 2', 'staff.pusbang2', 'PUSBANG002', 'rumahtangga.bpsdmimipas@gmail.com', 'Pusat Pengembangan & Penilaian Kompetensi', 'Staff Pusat Pengembangan & Penilaian Kompetensi', 'user', NULL, '$2y$12$suVJfNTuPCcarmfuBSs23O88ce8hDvUOqqL7Pc4rwSsv1R5aFjACe', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:09'),
(19, 'Staff Datin', 'staff.datin', 'DATIN001', 'rumahtangga.bpsdmimipas@gmail.com', 'Data & Sistem Informasi', 'Staff Data & Sistem Informasi', 'user', NULL, '$2y$12$RZgESYG7kjYESC79n9kFi.FtqI4s5bv5yLKSkJ6CeXgEOc4SD3qc.', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:10'),
(20, 'Staff Renkerma', 'staff.renkerma', 'RENKERMA001', 'rumahtangga.bpsdmimipas@gmail.com', 'Perencanaan & Kerja Sama', 'Staff Perencanaan & Kerja Sama', 'user', NULL, '$2y$12$yFMm8H9LJrwOO.EnKwiBtO2vU7HyyTWkSB9bnZ4p.McscVPumT6Yq', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:10'),
(21, 'Staff Keuangan', 'staff.keuangan', 'KEUANGAN001', 'rumahtangga.bpsdmimipas@gmail.com', 'Umum / Keuangan', 'Staff Keuangan', 'user', NULL, '$2y$12$7KDRDLk3cmxIK1s0ybR0POQV.Mv6I6OXVHjqFQ5WPysrjCqBpLrK2', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:10'),
(22, 'Staff Umum', 'staff.umum', 'UMUM001', 'rumahtangga.bpsdmimipas@gmail.com', 'Umum / Rumah Tangga', 'Staff Umum', 'user', NULL, '$2y$12$JW1qE5TP2HE1eKtfuwYuy.Rp8Qcn7NNDKN7G3UZFdKpz/ynQqrCOa', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:10'),
(23, 'Staff TU Pim', 'staff.tupim', 'TUPIM001', 'rumahtangga.bpsdmimipas@gmail.com', 'Umum / Pimpinan, Humas, & Protokol', 'Staff TU Pimpinan, Humas & Protokol', 'user', NULL, '$2y$12$Vttlr4UJgf6I6/YdWyHH7ekEIAjsbSiOHqfwTJXxeHC9eKWjZGMEW', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:11'),
(24, 'Staff Sekretaris', 'staff.sekretaris', 'SEKRETARIS001', 'rumahtangga.bpsdmimipas@gmail.com', 'BPSDM Imigrasi dan Pemasyarakatan', 'Staff Sekretaris', 'user', NULL, '$2y$12$iTDeRikFGWFX2moWcEY/SelZQGIN9ctGnJ5GJflUGmj/SYdE4yKL.', NULL, '2026-05-21 01:46:45', '2026-05-20 18:55:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengadaans`
--
ALTER TABLE `pengadaans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pengadaans_stock_id_foreign` (`stock_id`);

--
-- Indexes for table `pengajuan_barang`
--
ALTER TABLE `pengajuan_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`user_id`),
  ADD KEY `fk_stock` (`stock_id`);

--
-- Indexes for table `pengajuan_barang_baru`
--
ALTER TABLE `pengajuan_barang_baru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip` (`nip`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengadaans`
--
ALTER TABLE `pengadaans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengajuan_barang`
--
ALTER TABLE `pengajuan_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pengajuan_barang_baru`
--
ALTER TABLE `pengajuan_barang_baru`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=541;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengadaans`
--
ALTER TABLE `pengadaans`
  ADD CONSTRAINT `pengadaans_stock_id_foreign` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `pengajuan_barang`
--
ALTER TABLE `pengajuan_barang`
  ADD CONSTRAINT `fk_stock` FOREIGN KEY (`stock_id`) REFERENCES `stock` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
