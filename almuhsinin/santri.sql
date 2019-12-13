-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Des 2019 pada 18.21
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `almuhsinin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

CREATE TABLE `santri` (
  `Id` int(100) NOT NULL,
  `Nama` varchar(30) NOT NULL,
  `Asal` varchar(30) NOT NULL,
  `Tgl_lhr` int(11) NOT NULL,
  `Nahwu` int(11) NOT NULL,
  `Shorof` int(11) NOT NULL,
  `Fiqih` int(11) NOT NULL,
  `Hadits` int(11) NOT NULL,
  `Akhlaq` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`Id`, `Nama`, `Asal`, `Tgl_lhr`, `Nahwu`, `Shorof`, `Fiqih`, `Hadits`, `Akhlaq`) VALUES
(1402001, 'Luthfi Yurinanda', 'Grogot', 12, 45, 50, 50, 55, 70),
(1402002, 'Ahmad Al Amin', 'Jambi', 22, 92, 87, 80, 80, 85),
(1402003, 'M. Okgi', 'Nganjuk', 24, 50, 45, 50, 55, 65),
(1402004, 'M. Zaky T', 'Paser', 18, 65, 70, 60, 70, 72),
(1402005, 'Nur Irfan', 'Jambi', 4, 82, 70, 78, 85, 82),
(1402006, 'Syaifur Rizal', 'Gresik', 14, 80, 80, 75, 85, 85),
(1402007, 'Iqfan Jonhar', 'Pare', 18, 80, 80, 80, 80, 70),
(1402008, 'Hasyim Imron', 'Sidoarjo', 28, 90, 90, 80, 85, 80),
(1402009, 'Imam Rofii', 'Tuban', 0, 80, 85, 75, 78, 80),
(1402010, 'Maf\'ul Mihlihin', 'Banjarnegara', 0, 82, 85, 78, 82, 90),
(1402011, 'Damar M. Iqbal', 'Jember', 0, 65, 60, 50, 72, 75),
(1402012, 'M. Zaky T.', 'Pontianak', 0, 60, 55, 50, 70, 70),
(1402013, 'Nur Irfan', 'Sidoarjo', 0, 78, 70, 68, 72, 80),
(1402014, 'Iqfan Jonhar', 'Nganjuk', 0, 55, 60, 50, 70, 65),
(1402015, 'M Reiza', 'Blitar', 0, 62, 65, 55, 70, 80),
(1402016, 'M Fathkul F', 'Pare', 0, 85, 88, 75, 82, 85),
(1402017, 'M Lukman Hakim', 'Jombang', 0, 90, 88, 80, 88, 85),
(1402018, 'M Okgi', 'Pekalongan', 0, 55, 65, 60, 72, 78),
(1402019, 'Khoirul Umam', 'Yogyakarta', 0, 72, 75, 68, 78, 80),
(1402020, 'M Iqbal', 'Tuban', 0, 78, 75, 70, 80, 85),
(1402021, 'M. Iqbal Adi', 'Wonosobo', 0, 75, 70, 72, 80, 85),
(1402022, 'Ariful Muiz', 'Surabaya', 0, 88, 78, 70, 78, 88),
(1402023, 'Syaifullah', 'Madura', 0, 60, 58, 50, 62, 78),
(1402024, 'Ahmad Syamsuri', 'Blitar', 0, 58, 55, 50, 52, 72),
(1402025, 'Ahmad Rifai\'i', 'Jember', 0, 68, 58, 65, 60, 75),
(1402026, 'M Sulthon Fandi', 'Lampung', 0, 65, 68, 60, 60, 72),
(1402027, 'Nur Efendi', 'Palembang', 0, 45, 50, 60, 60, 70),
(1402028, 'M. Abdullah', 'Bontang', 0, 82, 80, 78, 88, 90),
(1402029, 'M. Roby Cahyadi', 'Samarinda', 0, 89, 92, 80, 88, 90),
(1402030, 'M. Ismail', 'Tuban', 0, 74, 80, 78, 82, 88),
(1402031, 'Abdurrahman Muhammad', 'Pekalongan', 0, 62, 65, 60, 70, 80),
(1402032, 'Muhammad Ahsin', 'NTT', 0, 60, 65, 60, 62, 72),
(1402033, 'Ahmad Shodiq', 'Blitar', 0, 55, 62, 60, 55, 70),
(1402034, 'M. Falah', 'Yogyakarta', 0, 78, 75, 70, 75, 80),
(1402035, 'M. Nanda', 'Yogyakarta', 0, 72, 78, 80, 82, 82),
(1402036, 'Abdul Malik', 'Jombang', 0, 83, 85, 80, 85, 88),
(1402037, 'Abdurrahman', 'Kediri', 0, 80, 82, 82, 88, 85),
(1402038, 'Khoirul Anam', 'Palembang', 0, 58, 65, 50, 65, 70),
(1402039, 'M. Habib', 'Jambi', 0, 62, 68, 70, 70, 72),
(1402040, 'M. Habib', 'Cirebon', 0, 78, 82, 78, 85, 80),
(1402041, 'M. Rendy', 'Semarang', 0, 88, 80, 72, 88, 78),
(1402042, 'M. Januar', 'Pacitan', 0, 58, 62, 50, 70, 80),
(1402043, 'Khoirul Anwar', 'Indramayu', 0, 62, 70, 65, 68, 78),
(1402044, 'Abdullah', 'Palembang', 0, 78, 80, 75, 82, 80),
(1402045, 'M. Aldy', 'Pekalongan', 0, 85, 80, 78, 85, 82),
(1402046, 'Ahmad Bahar', 'Pacitan', 0, 65, 60, 55, 68, 80),
(1402047, 'M. Saifullah', 'Nganjuk', 0, 50, 55, 40, 68, 72),
(1402048, 'Rizal Mauludin', 'Sidoarjo', 0, 80, 80, 78, 82, 70),
(1402049, 'M. Itqon', 'Gresik', 0, 85, 80, 82, 88, 85),
(1402050, 'Abdul Rozaq', 'Semarang', 0, 88, 92, 85, 90, 88),
(1402051, 'M. Rendy', 'Blitar', 0, 82, 88, 85, 90, 90),
(1402052, 'Ahmad Zidni', 'Jombang', 0, 74, 80, 85, 82, 88),
(1402053, 'M. Alfan', 'Nganjuk', 0, 55, 60, 55, 70, 75),
(1402054, 'M. Ahsin', 'Tuban', 0, 62, 65, 50, 68, 72);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `santri`
--
ALTER TABLE `santri`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
