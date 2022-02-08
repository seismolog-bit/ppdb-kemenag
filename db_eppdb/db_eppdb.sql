-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2021 at 01:38 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eppdb_v153`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(10) NOT NULL,
  `nama_berkas` varchar(100) NOT NULL,
  `keterangan_berkas` varchar(100) NOT NULL,
  `tipe_berkas` varchar(100) NOT NULL,
  `ukuran_berkas` float NOT NULL,
  `id_peserta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(10) NOT NULL,
  `id_jalur` int(10) NOT NULL,
  `bobot_jarak` int(4) NOT NULL,
  `bobot_nilai` int(4) NOT NULL,
  `bobot_prestasi` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `id_jalur`, `bobot_jarak`, `bobot_nilai`, `bobot_prestasi`) VALUES
(1, 1, 100, 0, 0),
(2, 2, 0, 60, 40),
(3, 3, 100, 0, 0),
(4, 4, 100, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `formulir`
--

CREATE TABLE `formulir` (
  `id_formulir` int(10) NOT NULL,
  `tahun_pelajaran` varchar(5) NOT NULL,
  `jalur_pendaftaran` varchar(5) NOT NULL,
  `nama_peserta` varchar(5) NOT NULL,
  `jenis_kelamin` varchar(5) NOT NULL,
  `nisn` varchar(5) NOT NULL,
  `nik` varchar(5) NOT NULL,
  `tempat_lahir` varchar(5) NOT NULL,
  `tanggal_lahir` varchar(5) NOT NULL,
  `no_registrasi_akta_lahir` varchar(5) NOT NULL,
  `agama` varchar(5) NOT NULL,
  `kewarganegaraan` varchar(5) NOT NULL,
  `berkebutuhan_khusus` varchar(5) NOT NULL,
  `alamat` varchar(5) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `nama_dusun` varchar(5) NOT NULL,
  `nama_kelurahan` varchar(5) NOT NULL,
  `kecamatan` varchar(5) NOT NULL,
  `kode_pos` varchar(5) NOT NULL,
  `latitude` varchar(5) NOT NULL,
  `longitude` varchar(5) NOT NULL,
  `tempat_tinggal` varchar(5) NOT NULL,
  `moda_transportasi` varchar(5) NOT NULL,
  `no_kks` varchar(5) NOT NULL,
  `anak_ke` varchar(5) NOT NULL,
  `penerima_kps_pkh` varchar(5) NOT NULL,
  `no_kps_pkh` varchar(5) NOT NULL,
  `penerima_kip` varchar(5) NOT NULL,
  `no_kip` varchar(5) NOT NULL,
  `nama_tertera_di_kip` varchar(5) NOT NULL,
  `terima_fisik_kartu_kip` varchar(5) NOT NULL,
  `nama_ayah` varchar(5) NOT NULL,
  `nik_ayah` varchar(5) NOT NULL,
  `tahun_lahir_ayah` varchar(5) NOT NULL,
  `pendidikan_ayah` varchar(5) NOT NULL,
  `pekerjaan_ayah` varchar(5) NOT NULL,
  `penghasilan_bulanan_ayah` varchar(5) NOT NULL,
  `berkebutuhan_khusus_ayah` varchar(5) NOT NULL,
  `nama_ibu` varchar(5) NOT NULL,
  `nik_ibu` varchar(5) NOT NULL,
  `tahun_lahir_ibu` varchar(5) NOT NULL,
  `pendidikan_ibu` varchar(5) NOT NULL,
  `pekerjaan_ibu` varchar(5) NOT NULL,
  `penghasilan_bulanan_ibu` varchar(5) NOT NULL,
  `berkebutuhan_khusus_ibu` varchar(5) NOT NULL,
  `nama_wali` varchar(5) NOT NULL,
  `nik_wali` varchar(5) NOT NULL,
  `tahun_lahir_wali` varchar(5) NOT NULL,
  `pendidikan_wali` varchar(5) NOT NULL,
  `pekerjaan_wali` varchar(5) NOT NULL,
  `penghasilan_bulanan_wali` varchar(5) NOT NULL,
  `no_telepon_rumah` varchar(5) NOT NULL,
  `nomor_hp` varchar(5) NOT NULL,
  `email` varchar(5) NOT NULL,
  `jenis_ekstrakurikuler` varchar(5) NOT NULL,
  `tinggi_badan` varchar(5) NOT NULL,
  `berat_badan` varchar(5) NOT NULL,
  `jarak_ke_sekolah` varchar(5) NOT NULL,
  `jumlah_saudara_kandung` varchar(5) NOT NULL,
  `jurusan` varchar(5) NOT NULL,
  `asal_sekolah` varchar(5) NOT NULL,
  `no_peserta_ujian` varchar(5) NOT NULL,
  `no_seri_ijazah` varchar(5) NOT NULL,
  `no_seri_skhu` varchar(5) NOT NULL,
  `nilai_usbn` varchar(5) NOT NULL,
  `nilai_rapor` varchar(5) NOT NULL,
  `nilai_unbk_unkp` varchar(5) NOT NULL,
  `ketentuan` longtext NOT NULL,
  `foto` varchar(5) NOT NULL,
  `akte_kelahiran` varchar(5) NOT NULL,
  `kartu_keluarga` varchar(5) NOT NULL,
  `skl_skhu` varchar(5) NOT NULL,
  `skd` varchar(5) NOT NULL,
  `berkaslain` varchar(5) NOT NULL,
  `tipe` varchar(1) NOT NULL,
  `kode_daring` varchar(100) NOT NULL,
  `kode_luring` varchar(100) NOT NULL,
  `kode_formulir` varchar(5) NOT NULL,
  `foto_full` varchar(5) NOT NULL,
  `rapor` varchar(5) NOT NULL,
  `sktm` varchar(5) NOT NULL,
  `ktp_ortu` varchar(5) NOT NULL,
  `kartu_bantuan` varchar(5) NOT NULL,
  `sptjm` varchar(5) NOT NULL,
  `sp` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `formulir`
--

INSERT INTO `formulir` (`id_formulir`, `tahun_pelajaran`, `jalur_pendaftaran`, `nama_peserta`, `jenis_kelamin`, `nisn`, `nik`, `tempat_lahir`, `tanggal_lahir`, `no_registrasi_akta_lahir`, `agama`, `kewarganegaraan`, `berkebutuhan_khusus`, `alamat`, `rt`, `rw`, `nama_dusun`, `nama_kelurahan`, `kecamatan`, `kode_pos`, `latitude`, `longitude`, `tempat_tinggal`, `moda_transportasi`, `no_kks`, `anak_ke`, `penerima_kps_pkh`, `no_kps_pkh`, `penerima_kip`, `no_kip`, `nama_tertera_di_kip`, `terima_fisik_kartu_kip`, `nama_ayah`, `nik_ayah`, `tahun_lahir_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_bulanan_ayah`, `berkebutuhan_khusus_ayah`, `nama_ibu`, `nik_ibu`, `tahun_lahir_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_bulanan_ibu`, `berkebutuhan_khusus_ibu`, `nama_wali`, `nik_wali`, `tahun_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_bulanan_wali`, `no_telepon_rumah`, `nomor_hp`, `email`, `jenis_ekstrakurikuler`, `tinggi_badan`, `berat_badan`, `jarak_ke_sekolah`, `jumlah_saudara_kandung`, `jurusan`, `asal_sekolah`, `no_peserta_ujian`, `no_seri_ijazah`, `no_seri_skhu`, `nilai_usbn`, `nilai_rapor`, `nilai_unbk_unkp`, `ketentuan`, `foto`, `akte_kelahiran`, `kartu_keluarga`, `skl_skhu`, `skd`, `berkaslain`, `tipe`, `kode_daring`, `kode_luring`, `kode_formulir`, `foto_full`, `rapor`, `sktm`, `ktp_ortu`, `kartu_bantuan`, `sptjm`, `sp`) VALUES
(1, 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', '', 'Ya', 'Ya', '', 'Ya', '', '', 'Ya', '', '', '', '', '', '', '', '', '', '', '', '', 'Ya', 'Ya', 'Ya', 'Ya', '', '', 'Ya', '', '', '', 'Ya', '', '', 'Ya', '', '', '', 'Ya', '', '', '', '', '', '', '', '', '', 'Ya', '', '', '', '', 'Ya', '', '', 'Ya', '', '', '', '', 'Ya', '', '<ol>\r\n <li>Setiap calon peserta didik wajib mengisi formulir pendaftaran dengan lengkap.</li>\r\n <li>Data-data yang diisikan pada formulir PPDB Online harus sesuai dengan data asli dan benar adanya.</li>\r\n <li>Calon peserta didik yang sudah mendaftar secara online wajib mencetak bukti pendaftaran sebanyak dua rangkap sebagai bukti pendaftaran dan dilampirkan dalam persyaratan yang diminta oleh Panitia PPDB.</li>\r\n <li>Calon peserta didik yang sudah mendaftarkan diri melalui PPDB Online wajib menyerahkan dokumen persyaratan yang sudah ditentukan oleh Panitia PPDB.</li>\r\n <li>Calon peserta didik yang telah mendaftar tidak dapat mencabut berkas pendaftaran dengan alasan apapun.</li>\r\n</ol>', '', '', '', '', '', '', '3', '13-0002', '13-0002', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'panitia', 'Panitia PPDB');

-- --------------------------------------------------------

--
-- Table structure for table `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id_groups` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups_menu`
--

INSERT INTO `groups_menu` (`id_groups`, `id_menu`) VALUES
(1, 1),
(2, 1),
(3, 1),
(1, 3),
(2, 3),
(3, 3),
(1, 106),
(3, 106),
(1, 102),
(3, 102),
(1, 104),
(3, 104),
(1, 108),
(3, 108),
(1, 116),
(3, 116),
(1, 103),
(3, 103),
(1, 109),
(3, 109),
(1, 118),
(3, 118),
(1, 114),
(3, 114),
(1, 110),
(3, 110),
(1, 121),
(3, 121),
(2, 122),
(2, 115),
(2, 112),
(1, 125),
(3, 125),
(1, 126),
(1, 43),
(1, 44),
(1, 117),
(1, 105),
(1, 107),
(1, 113),
(1, 111),
(1, 127);

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(5) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `kode_sekolah` varchar(9) NOT NULL,
  `npsn` varchar(8) NOT NULL,
  `status` varchar(10) NOT NULL,
  `jenjang` varchar(10) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `kepala_sekolah` varchar(50) NOT NULL,
  `nip` varchar(18) NOT NULL,
  `kelurahan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kabupaten` varchar(100) NOT NULL,
  `kode_pos` varchar(6) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  `website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL,
  `gis` varchar(5) NOT NULL,
  `apikey` varchar(200) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `bglogin` varchar(50) NOT NULL,
  `status_pendaftaran` varchar(5) NOT NULL,
  `status_hasil` varchar(5) NOT NULL,
  `status_daftar_ulang` varchar(5) NOT NULL,
  `penomoran` varchar(10) NOT NULL,
  `stempel` varchar(50) NOT NULL,
  `ttd` varchar(50) NOT NULL,
  `header` varchar(50) NOT NULL,
  `hstempel` varchar(3) NOT NULL,
  `httd` varchar(3) NOT NULL,
  `sstempel` varchar(5) NOT NULL,
  `sttd` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_sekolah`, `kode_sekolah`, `npsn`, `status`, `jenjang`, `alamat`, `kepala_sekolah`, `nip`, `kelurahan`, `kecamatan`, `kabupaten`, `kode_pos`, `no_telepon`, `website`, `email`, `latitude`, `longitude`, `gis`, `apikey`, `logo`, `bglogin`, `status_pendaftaran`, `status_hasil`, `status_daftar_ulang`, `penomoran`, `stempel`, `ttd`, `header`, `hstempel`, `httd`, `sstempel`, `sttd`) VALUES
(1, 'SMPN 1 TUMIJAJAR', '12130002', '10808388', 'NEGERI', 'SMP/MTs', 'Jalan Jendral Sudirman No. 1 Murnijaya', 'Sri Mustika Ningsih, S.Pd', '196508151986092003', 'Murnijaya', 'Tumijajar', 'Tulang Bawang Barat', '34592', '07257576180', 'smpn1tumijajar.sch.id', 'smpntumijajar1@gmail.com', '-4.6221235655318225', '105.10049032725532', '', 'AIzaSyBchRI_21q70ikqLxY-SxgiRJUY6BWMav8', 'logo.png', 'background.png', '', '', '', 'otomatis', 'stempel.png', 'bglogin.png', 'header.png', '110', '95', 'Ya', 'Ya');

-- --------------------------------------------------------

--
-- Table structure for table `jalur`
--

CREATE TABLE `jalur` (
  `id_jalur` int(10) NOT NULL,
  `jalur` varchar(50) NOT NULL,
  `persentase` int(3) NOT NULL,
  `status_jalur` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jalur`
--

INSERT INTO `jalur` (`id_jalur`, `jalur`, `persentase`, `status_jalur`) VALUES
(1, 'Zonasi', 60, 'Aktif'),
(2, 'Prestasi', 20, 'Aktif'),
(3, 'Afirmasi', 15, 'Aktif'),
(4, 'Perpindahan', 5, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `jarak`
--

CREATE TABLE `jarak` (
  `id_jarak` int(10) NOT NULL,
  `jarak` varchar(50) NOT NULL,
  `skor_jarak` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jarak`
--

INSERT INTO `jarak` (`id_jarak`, `jarak`, `skor_jarak`) VALUES
(1, '0 - 250 meter', 500),
(2, '251 - 500 meter', 490),
(3, '501 - 750 meter', 480),
(4, '751 - 1000 meter', 470),
(5, '1001 - 1250 meter', 460),
(6, '1251 - 1500 meter', 450),
(7, '1501 - 1750 meter', 440),
(8, '1751 - 2000 meter', 430),
(9, '2001 - 2250 meter', 420),
(10, '2251 - 2500 meter', 410),
(11, '2501 - 2750 meter', 400),
(12, '2751 - 3000 meter', 390),
(13, '3001 - 3250 meter', 380),
(14, '3251 - 3500 meter', 370),
(15, '3501 - 3750 meter', 360),
(16, '3751 - 4000 meter', 350),
(17, '4001 - 4250 meter', 340),
(18, '4251 - 4500 meter', 330),
(19, '4501 - 4750 meter', 320),
(20, '4751 - 5000 meter', 310),
(21, '5001 - 5250 meter', 300),
(22, '5251 - 5500 meter', 290),
(23, '5501 - 5750 meter', 280),
(24, '5751 - 6000 meter', 270),
(25, '6001 - 6250 meter', 260),
(26, '6251 - 6500 meter', 250),
(27, '6501 - 6750 meter', 240),
(28, '6751 - 7000 meter', 230),
(29, '7001 - 7250 meter', 220),
(30, '7251 - 7500 meter', 210),
(31, '7501 - 7750 meter', 200),
(32, '7751 - 8000 meter', 190),
(33, '8001 - 8250 meter', 180),
(34, '8251 - 8500 meter', 170),
(35, '8501 - 8750 meter', 160),
(36, '8751 - 9000 meter', 150),
(37, '9001 - 9250 meter', 140),
(38, '9251 - 9500 meter', 130),
(39, '9501 - 9750 meter', 120),
(40, '9751 - 10000 meter', 110),
(41, 'Lebih dari 10000 meter', 100);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` int(5) NOT NULL,
  `bidang_keahlian` varchar(100) NOT NULL,
  `nama_jurusan` varchar(100) NOT NULL,
  `kuota_jurusan` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `bidang_keahlian`, `nama_jurusan`, `kuota_jurusan`) VALUES
(1, 'Umum', 'Umum', '288'),
(2, 'Teknik', 'Teknik Kendaraan Ringan Otomotif', '100'),
(3, 'Teknik', 'Rekayasa Perangkat Lunak', '90'),
(5, 'Teknik', 'Teknik Komputer dan Jaringan', '90');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `log_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `log_user` varchar(50) NOT NULL,
  `log_tipe` int(11) NOT NULL,
  `log_ket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `log_time`, `log_user`, `log_tipe`, `log_ket`) VALUES
(1, '2021-06-04 07:10:46', 'admin', 4, 'Menghapus data tabel log'),
(2, '2021-06-04 07:12:30', 'admin', 1, 'Logout'),
(3, '2021-12-05 14:12:26', 'admin', 0, 'Login'),
(4, '2021-12-08 12:16:02', 'admin', 0, 'Login'),
(5, '2021-12-08 12:16:41', 'admin', 3, 'Update data pengaturan'),
(6, '2021-12-08 12:24:53', 'admin', 1, 'Logout'),
(7, '2021-12-08 12:25:14', 'admin', 0, 'Login');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '99',
  `level` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(125) NOT NULL,
  `label` varchar(25) NOT NULL,
  `link` varchar(125) NOT NULL,
  `id` varchar(25) NOT NULL DEFAULT '#',
  `id_menu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `sort`, `level`, `parent_id`, `icon`, `label`, `link`, `id`, `id_menu_type`) VALUES
(1, 0, 1, 0, 'empty', 'MAIN NAVIGATION', '#', '#', 1),
(3, 1, 2, 1, 'fas fa-tachometer-alt', 'Dashboard', 'dashboard', '#', 1),
(43, 23, 2, 1, 'fas fa-user-secret', 'Manajemen User', '#', '#', 1),
(44, 25, 3, 43, 'fas fa-angle-double-right', 'Groups', 'groups', '2', 1),
(102, 8, 3, 103, 'fas fa-angle-double-right', 'Asal Sekolah', 'sekolah', '#', 1),
(103, 5, 2, 1, 'fas fa-server', 'Referensi', '#', '#', 1),
(104, 9, 3, 103, 'fas fa-angle-double-right', 'Jalur Pendaftaran', 'jalur', '#', 1),
(105, 7, 3, 103, 'fas fa-angle-double-right', 'Tahun Penerimaan', 'tahunpelajaran', '#', 1),
(106, 6, 3, 103, 'fas fa-angle-double-right', 'Formulir PPDB', 'formulir', '#', 1),
(107, 11, 3, 103, 'fas fa-angle-double-right', 'Poin Jarak', 'jarak', '#', 1),
(108, 10, 3, 103, 'fas fa-angle-double-right', 'Bobot Jalur', 'bobot', '#', 1),
(109, 14, 2, 1, 'fas fa-user-alt', 'Data Peserta', '#', '#', 1),
(110, 15, 3, 109, 'fas fa-angle-double-right', 'List Peserta', 'peserta', '#', 1),
(111, 13, 3, 103, 'fas fa-angle-double-right', 'Jurusan', 'jurusan', '#', 1),
(112, 2, 2, 1, 'fas fa-file', 'Formulir Pendaftaran', 'member/formcreate', '#', 1),
(113, 12, 3, 103, 'fas fa-angle-double-right', 'Poin Prestasi', 'prestasi', '#', 1),
(114, 17, 3, 109, 'fas fa-angle-double-right', 'Prestasi Peserta', 'prestasipeserta', '#', 1),
(115, 3, 2, 1, 'fas fa-user-graduate', 'Prestasi Peserta', 'member/prestasipeserta', '#', 1),
(116, 20, 2, 1, 'fas fa-bullhorn', 'Pengumuman', 'pengumuman', '#', 1),
(117, 22, 2, 1, 'fas fa-cog', 'Pengaturan', 'pengaturan', '#', 1),
(118, 19, 2, 1, 'fas fa-chart-bar', 'Statistik', 'statistik', '#', 1),
(121, 18, 3, 109, 'fas fa-angle-double-right', 'Berkas', 'berkas', '#', 1),
(122, 4, 2, 1, 'fas fa-copy', 'Berkas Pendukung', 'member/berkas', '#', 1),
(125, 16, 3, 109, 'fas fa-angle-double-right', 'Rekap Nilai', 'peserta/nilai_peserta', '#', 1),
(126, 24, 3, 43, 'fas fa-angle-double-right', 'List Users', 'users', '1', 1),
(127, 21, 2, 1, 'fas fa-history', 'Log Pengguna', 'log', '#', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `id_menu_type` int(11) NOT NULL,
  `type` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_type`
--

INSERT INTO `menu_type` (`id_menu_type`, `type`) VALUES
(1, 'Side menu');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(5) NOT NULL,
  `type` varchar(30) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `text` longtext NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `type`, `judul`, `text`, `date`) VALUES
(2, 'Member', 'Syarat Pendaftaran', '<ol>\r\n <li>Mengisi formulir yang telah disediakan melalui online ppdb.smpn1tumijajar.sch.id.</li>\r\n <li>Usia maksimal 15 tahun (1 Juli 2021).</li>\r\n <li>Ijazah terakhir/Surat Keterangan Lulus + foto copy legalisir 2 lembar.</li>\r\n <li>Kartu Keluarga/Surat Keterangan Domisili (minimal sudah 1 tahun) + foto copy legalisir 2 lembar.</li>\r\n <li>KTP Orangtua + foto copy 2 lembar.</li>\r\n <li>Akta Kelahiran + foto copy 2 lembar.</li>\r\n <li>Photo berwarna 3x4 sebanyak 2 lembar.</li>\r\n <li>Kartu bantuan sosial (PKH/KPS/KIP/SKTM) untuk jalur afirmasi.</li>\r\n <li>Surat penugasan dari instansi, lembaga, kantor atau perusahaan yang mempekerjakan (untuk jalur Perpindahan tugas orangtua).</li>\r\n <li>Bukti prestasi nilai rapor semester 1 s.d. 5, hasil perlombaan akademik/non akademik tingkat Internasional/Nasional/Provinsi/Kabupaten/Kecamatan/Sekolah/Hafiz Al Quran yang diterbitkan minimal 6 bulan dan maksimal 3 tahun (untuk jalur prestasi).</li>\r\n <li>Formulir Pendaftaran (2 rangkap) beserta syarat-syarat yang diminta dimasukkan ke dalam stofmap folio (forte/biola) 2 buah dan diserahkan ke sekolah.\r\n <ul>\r\n  <li>Laki-laki warna Merah.</li>\r\n  <li>Perempuan warna Biru.</li>\r\n </ul>\r\n </li>\r\n <li>calon peserta didik yang telah mendaftar tidak dapat mencabut berkas pendaftaran dengan alasan apapun.</li>\r\n</ol>', '2021-05-25 15:30:51'),
(3, 'Formulir', 'Keterangan bawah formulir', '<p>Catatan :</p>\r\n\r\n<ol>\r\n <li>Yang bertandatangan Orangtua/Wali atau Siswa bertanggung jawab secara hukum terhadap kebenaran data yang tercantum.</li>\r\n <li>Formulir Pendaftaran di cetak sebanyak dua rangkap.</li>\r\n <li>Calon Peserta Didik Baru <strong>Wajib</strong> mencantumkan <strong>Nomor Induk Siswa Nasional (NISN)</strong>.</li>\r\n <li>Ijazah/SKL Asli ditunjukkan kepada sekolah yang di daftar.</li>\r\n <li>Pengumuman Calon Peserta Didik Baru yang diterima tanggal 29 s.d 30 Juni 2021.</li>\r\n <li>Daftar ulang bagi calon siswa yang diterima pada tanggal 1 s.d 2 Juli 2021 membawa/menyerahkan formulir pendaftaran.</li>\r\n <li>Calon Peserta Didik Baru yang diterima tetapi tidak mendaftar ulang maka di anggap <strong>GUGUR</strong>.</li>\r\n <li>Calon Peserta Didik Baru yang telah mendaftar tidak dapat mencabut berkas pendaftaran dengan alasan apapun.</li>\r\n</ol>', '2021-05-31 06:01:19'),
(5, 'SKL', 'di isi dengan nomor pengumuman untuk skl', '<p>Ketentuan lainnya :</p>\r\n\r\n<ul>\r\n <li>Menyerahkan Formulir Pendaftaran.</li>\r\n <li>Peserta yang tidak melakukan <strong>REGISTRASI ULANG</strong> sesuai ketentuan dinyatakan <strong>GURUR</strong>.</li>\r\n</ul>', '2021-05-25 15:33:14'),
(6, 'Publik', 'Alur PPDB', '<ol>\r\n <li>Calon peserta didik membuat akun pengguna di <a href=\"http://ppdb.smpn1tumijajar.sch.id/\">http://ppdb.smpn1tumijajar.sch.id/</a></li>\r\n <li>Calon peserta didik login menggunakan NISN dan kata sandi/password yang telah dibuat sebelumnya</li>\r\n <li>Calon peserta didik mengisi formulir pendaftaran</li>\r\n <li>Calon peserta didik menambahkan prestasi akademik/non akademik (jalur prestasi)</li>\r\n <li>Calon peserta didik mencetak bukti pendaftaran sebanyak dua rangkap</li>\r\n <li>Serahkan Bukti Pendaftaran beserta lampirkan syarat-syarat lainnya ke Panitia PPDB untuk diverifikasi</li>\r\n <li>Calon peserta didik yang telah mendaftar tidak dapat mencabut berkas pendaftaran dengan alasan apapun</li>\r\n</ol>', '2021-05-25 15:32:57');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id_peserta` int(10) NOT NULL,
  `no_pendaftaran` varchar(100) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `id_tahun` int(4) NOT NULL,
  `id_jalur` int(10) NOT NULL,
  `nama_peserta` varchar(50) NOT NULL,
  `jenis_kelamin` varchar(1) NOT NULL,
  `nisn` varchar(15) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_registrasi_akta_lahir` varchar(25) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(16) NOT NULL,
  `berkebutuhan_khusus` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `rt` varchar(3) NOT NULL,
  `rw` varchar(3) NOT NULL,
  `nama_dusun` varchar(50) NOT NULL,
  `nama_kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kode_pos` varchar(6) NOT NULL,
  `latitude` varchar(25) NOT NULL,
  `longitude` varchar(25) NOT NULL,
  `tempat_tinggal` varchar(25) NOT NULL,
  `moda_transportasi` varchar(50) NOT NULL,
  `no_kks` varchar(6) NOT NULL,
  `anak_ke` varchar(2) NOT NULL,
  `penerima_kps_pkh` varchar(5) NOT NULL,
  `no_kps_pkh` varchar(20) NOT NULL,
  `penerima_kip` varchar(5) NOT NULL,
  `no_kip` varchar(6) NOT NULL,
  `nama_tertera_di_kip` varchar(50) NOT NULL,
  `terima_fisik_kartu_kip` varchar(5) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nik_ayah` varchar(16) NOT NULL,
  `tahun_lahir_ayah` varchar(4) NOT NULL,
  `pendidikan_ayah` varchar(15) NOT NULL,
  `pekerjaan_ayah` varchar(15) NOT NULL,
  `penghasilan_bulanan_ayah` varchar(25) NOT NULL,
  `berkebutuhan_khusus_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `nik_ibu` varchar(16) NOT NULL,
  `tahun_lahir_ibu` varchar(4) NOT NULL,
  `pendidikan_ibu` varchar(15) NOT NULL,
  `pekerjaan_ibu` varchar(15) NOT NULL,
  `penghasilan_bulanan_ibu` varchar(25) NOT NULL,
  `berkebutuhan_khusus_ibu` varchar(50) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `nik_wali` varchar(16) NOT NULL,
  `tahun_lahir_wali` varchar(4) NOT NULL,
  `pendidikan_wali` varchar(15) NOT NULL,
  `pekerjaan_wali` varchar(15) NOT NULL,
  `penghasilan_bulanan_wali` varchar(25) NOT NULL,
  `no_telepon_rumah` varchar(10) NOT NULL,
  `nomor_hp` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jenis_ekstrakurikuler` varchar(50) NOT NULL,
  `tinggi_badan` varchar(3) NOT NULL,
  `berat_badan` varchar(3) NOT NULL,
  `id_jarak` int(10) NOT NULL,
  `jumlah_saudara_kandung` varchar(2) NOT NULL,
  `id_jurusan` int(5) NOT NULL,
  `pilihan_dua` varchar(100) NOT NULL,
  `id_sekolah` int(10) NOT NULL,
  `no_un` varchar(25) NOT NULL,
  `no_seri_ijazah` varchar(25) NOT NULL,
  `no_seri_skhu` varchar(25) NOT NULL,
  `nilai_rapor` varchar(6) NOT NULL,
  `nilai_usbn` varchar(6) NOT NULL,
  `nilai_unbk_unkp` varchar(6) NOT NULL,
  `status` varchar(25) NOT NULL,
  `status_hasil` varchar(25) NOT NULL,
  `status_daftar_ulang` varchar(25) NOT NULL,
  `id_users` int(11) NOT NULL,
  `qrcode` varchar(100) NOT NULL,
  `pilihan_sekolah_lain` varchar(100) NOT NULL,
  `catatan` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prestasi`
--

CREATE TABLE `prestasi` (
  `id_prestasi` int(10) NOT NULL,
  `tingkat` varchar(50) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `juara` varchar(2) NOT NULL,
  `skor_prestasi` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestasi`
--

INSERT INTO `prestasi` (`id_prestasi`, `tingkat`, `kategori`, `juara`, `skor_prestasi`) VALUES
(12, 'Kecamatan', 'Beregu', '3', 70),
(13, 'Kecamatan', 'Beregu', '2', 80),
(14, 'Kecamatan', 'Beregu', '1', 90),
(15, 'Kecamatan', 'Perorangan', '3', 100),
(16, 'Kecamatan', 'Perorangan', '2', 110),
(17, 'Kecamatan', 'Perorangan', '1', 120),
(18, 'Kabupaten', 'Beregu', '3', 130),
(19, 'Kabupaten', 'Beregu', '2', 140),
(20, 'Kabupaten', 'Beregu', '1', 150),
(21, 'Kabupaten', 'Perorangan', '3', 160),
(22, 'Kabupaten', 'Perorangan', '2', 170),
(23, 'Kabupaten', 'Perorangan', '1', 180),
(24, 'Propinsi', 'Beregu', '3', 190),
(25, 'Propinsi', 'Beregu', '2', 200),
(26, 'Propinsi', 'Beregu', '1', 210),
(27, 'Propinsi', 'Perorangan', '3', 220),
(28, 'Propinsi', 'Perorangan', '2', 230),
(29, 'Propinsi', 'Perorangan', '1', 240),
(30, 'Nasional', 'Beregu', '3', 250),
(31, 'Nasional', 'Beregu', '2', 260),
(32, 'Nasional', 'Beregu', '1', 270),
(33, 'Nasional', 'Perorangan', '3', 280),
(34, 'Nasional', 'Perorangan', '2', 290),
(35, 'Nasional', 'Perorangan', '1', 300),
(36, 'Hafiz Al Quran', 'Beregu', '3', 130),
(37, 'Hafiz Al Quran', 'Beregu', '2', 140),
(38, 'Hafiz Al Quran', 'Beregu', '1', 150),
(39, 'Hafiz Al Quran', 'Perorangan', '3', 160),
(40, 'Hafiz Al Quran', 'Perorangan', '2', 170),
(41, 'Hafiz Al Quran', 'Perorangan', '1', 180),
(42, 'Sekolah', 'Beregu', '3', 10),
(43, 'Sekolah', 'Beregu', '2', 20),
(44, 'Sekolah', 'Beregu', '1', 30),
(45, 'Sekolah', 'Perorangan', '3', 40),
(46, 'Sekolah', 'Perorangan', '2', 50),
(47, 'Sekolah', 'Perorangan', '1', 60);

-- --------------------------------------------------------

--
-- Table structure for table `prestasipeserta`
--

CREATE TABLE `prestasipeserta` (
  `id_prestasipeserta` int(10) NOT NULL,
  `jenis` varchar(50) NOT NULL,
  `nama_prestasi` varchar(100) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `penyelenggara` varchar(150) NOT NULL,
  `id_peserta` int(10) NOT NULL,
  `id_prestasi` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id_sekolah` int(10) NOT NULL,
  `npsn_sekolah` varchar(10) NOT NULL,
  `asal_sekolah` varchar(100) NOT NULL,
  `alamat_sekolah` varchar(100) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `status_sekolah` varchar(10) NOT NULL,
  `kecamatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id_sekolah`, `npsn_sekolah`, `asal_sekolah`, `alamat_sekolah`, `kelurahan`, `status_sekolah`, `kecamatan`) VALUES
(1, '10809656', 'SD N 1 GADING KENCANA', 'Jln. Gajah Mati, Tiyuh Gading Kencana', 'Marga Kencana', 'NEGERI', 'Tulang Bawang Udik'),
(2, '10808607', 'SD N 1 GEDUNG RATU', 'Kampung Gedung Ratu', 'GEDUNG RATU', 'NEGERI', 'Tulang Bawang Udik'),
(3, '10801363', 'SD N 1 KAGUNGAN RATU', 'Kagungan Ratu', 'KAGUNGAN RATU', 'NEGERI', 'Tulang Bawang Udik'),
(4, '10809651', 'SD N 1 KAGUNGAN RATU AGUNG', 'Suku III Tiyuh Kagungan Ratu Agung', 'Kagungan Ratu', 'NEGERI', 'Tulang Bawang Udik'),
(5, '10808624', 'SD N 1 KARTA', 'Karta', 'Karta', 'NEGERI', 'Tulang Bawang Udik'),
(6, '10808625', 'SD N 1 KARTA RAHARJA', 'Karta Raharja', 'KARTA RAHARJA', 'NEGERI', 'Tulang Bawang Udik'),
(7, '10809603', 'SD N 1 KARTA RAYA', 'Jl.ratu Pengadilan', 'Karta Raharja', 'NEGERI', 'Tulang Bawang Udik'),
(8, '10808626', 'SD N 1 KARTA SARI', 'KARTA SARI', 'Karta Sari', 'NEGERI', 'Tulang Bawang Udik'),
(9, '10809681', 'SD N 1 KARTA TANJUNG SELAMAT', 'Karta', 'Karta', 'NEGERI', 'Tulang Bawang Udik'),
(10, '10808647', 'SD N 1 MARGA KENCANA', 'Marga Kencana', 'MARGA KENCANA', 'NEGERI', 'Tulang Bawang Udik'),
(11, '10808755', 'SD N 1 WAY SIDO', 'Way Sido', 'WAY SIDO', 'NEGERI', 'Tulang Bawang Udik'),
(12, '10809594', 'SD N 2 GEDUNG RATU', 'GEDUNG RATU', 'GEDUNG RATU', 'NEGERI', 'Tulang Bawang Udik'),
(13, '10809601', 'SD N 2 KAGUNGAN RATU', 'Kagungan Ratu', 'KAGUNGAN RATU', 'NEGERI', 'Tulang Bawang Udik'),
(14, '10809602', 'SD N 2 KARTA', 'Karta', 'KARTA', 'NEGERI', 'Tulang Bawang Udik'),
(15, '10809653', 'SD N 2 KARTA RAHARJA', 'Jl. Ratu Pengadilan No1', 'Karta Raharja', 'NEGERI', 'Tulang Bawang Udik'),
(16, '10808017', 'SD N 2 KARTASARI', 'Kartasari', 'KARTASARI', 'NEGERI', 'Tulang Bawang Udik'),
(17, '10810624', 'SD N 2 MARGA KENCANA', 'Marga Kencana', 'MARGA KENCANA', 'NEGERI', 'Tulang Bawang Udik'),
(18, '10809638', 'SD N 2 WAY SIDO', 'Jl. Raya Way Sido', 'WAY SIDO', 'NEGERI', 'Tulang Bawang Udik'),
(19, '10809680', 'SD N 3 KAGUNGAN RATU', 'Kagungan Ratu RT 03 RW 05', 'Kagungan Ratu', 'NEGERI', 'Tulang Bawang Udik'),
(20, '10809652', 'SD N 3 KARTA', 'Karta', 'KARTA', 'NEGERI', 'Tulang Bawang Udik'),
(21, '10808610', 'SD N GUNUNG KATUN MALAY', 'Gunung Katun Malay', 'GUNUNG KATUN MALAY', 'NEGERI', 'Tulang Bawang Udik'),
(22, '10810635', 'SD N GUNUNG KATUN TANJUNGAN', 'Gunung Katun Tanjungan', 'Gunung Katun Tanjungan', 'NEGERI', 'Tulang Bawang Udik'),
(23, '69975758', 'MI QUR`AN DAYAMURNI', 'KOMPLEK TELKOMSEL', 'Daya Asri', 'SWASTA', 'Tumijajar'),
(24, '69956124', 'MIS MIFTAHUL HUDA', 'Jalan Terusan Nunyai', 'Gunung Menanti', 'SWASTA', 'Tumijajar'),
(25, '69888432', 'SD ISLAM ASSUNIYAH', 'MURNI JAYA', 'MURNI JAYA', 'SWASTA', 'Tumijajar'),
(26, '69964970', 'SD ISLAM UNGGULAN HIDAYATUL MUBTADIIN', 'RT 03 RW 01 TIYUH DAYA MURNI', 'Daya Murni', 'SWASTA', 'Tumijajar'),
(27, '69945993', 'SD IT AL-BAYAN', 'JL. RATU PENGADILAN, DAYA MURNI, RT 003/ RW 006', 'Daya Murni', 'SWASTA', 'Tumijajar'),
(28, '10808592', 'SD N 1 DAYA ASRI', 'Jln. Jendral Sudirman Daya Asri', 'Daya Asri', 'NEGERI', 'Tumijajar'),
(29, '10808593', 'SD N 1 DAYA MURNI', 'Jl. Ratu Pengadilan Dayamurni Kec.Tumijajar', 'Daya Murni', 'NEGERI', 'Tumijajar'),
(30, '10808594', 'SD N 1 DAYA SAKTI', 'Daya Sakti', 'DAYA SAKTI', 'NEGERI', 'Tumijajar'),
(31, '10808643', 'SD N 1 MAKARTI', 'Makarti', 'MAKARTI', 'NEGERI', 'Tumijajar'),
(32, '10808651', 'SD N 1 Margo Mulyo', 'Margo Mulyo', 'Margo Mulyo', 'NEGERI', 'Tumijajar'),
(33, '10808649', 'SD N 1 MARGODADI', 'Jl. Margomulyo Rk.04 RT. 10 Margodadi', 'Margo Dadi', 'NEGERI', 'Tumijajar'),
(34, '10808671', 'SD N 1 MURNI JAYA', 'Jalan Jendral Sudirman, Desa Murni Jaya', 'Murni Jaya', 'NEGERI', 'Tumijajar'),
(35, '69838554', 'SD N 1 SUMBER REJO', 'Sumber Rejo', 'Sumber Rejo', 'NEGERI', 'Tumijajar'),
(36, '10808790', 'SD N 2 DAYA ASRI', 'Jl. Jenderal Sudirman', 'Daya Asri', 'NEGERI', 'Tumijajar'),
(37, '10808791', 'SD N 2 DAYA MURNI', 'Jl. Ratu Pengadilan No. 290', 'Daya Murni', 'NEGERI', 'Tumijajar'),
(38, '10809646', 'SD N 2 DAYA SAKTI', 'Tiyuh Daya Sakti', 'Daya Sakti', 'NEGERI', 'Tumijajar'),
(39, '10809608', 'SD N 2 MAKARTI', 'Makarti', 'MAKARTI', 'NEGERI', 'Tumijajar'),
(40, '10808031', 'SD N 2 MARGO MULYO', 'Margo Mulyo', 'Margo Mulyo', 'NEGERI', 'Tumijajar'),
(41, '10808030', 'SD N 2 MARGODADI', 'Margo Dadi', 'Margo Dadi', 'NEGERI', 'Tumijajar'),
(42, '10809612', 'SD N 2 MURNI JAYA', 'Jl.raya Lk 4 Murni Jaya', 'MURNI JAYA', 'NEGERI', 'Tumijajar'),
(43, '10809627', 'SD N 2 SUMBER REJO', 'Sumber Rejo', 'SUMBER REJO', 'NEGERI', 'Tumijajar'),
(44, '10809645', 'SD N 3 DAYA MURNI', 'Daya Murni Lk 4 Jl. Ratu Pengadilan', 'Daya Murni', 'NEGERI', 'Tumijajar'),
(45, '10809677', 'SD N 3 DAYA SAKTI', 'Daya Sakti', 'Daya Sakti', 'NEGERI', 'Tumijajar'),
(46, '10809655', 'SD N 3 MAKARTI', 'Jl.Banyuwangi', 'Makarti', 'NEGERI', 'Tumijajar'),
(47, '10811579', 'SD N 3 MARGO MULYO', 'Margo Mulyo', 'Margo Mulyo', 'NEGERI', 'Tumijajar'),
(48, '10808117', 'SD N 3 MARGODADI', 'Margo Dadi', 'Margo Dadi', 'NEGERI', 'Tumijajar'),
(49, '10809660', 'SD N 3 MURNI JAYA', 'Jln Jendral Sudirman', 'Murni Jaya', 'NEGERI', 'Tumijajar'),
(50, '10809676', 'SD N 4 DAYA MURNI', 'Daya Murni', 'DAYA MURNI', 'NEGERI', 'Tumijajar'),
(51, '10808152', 'SD N 4 MARGO DADI', 'Margo Dadi', 'MARGO DADI', 'NEGERI', 'Tumijajar'),
(52, '10810724', 'SD N 5 DAYA MURNI', 'Daya Murni', 'DAYA MURNI', 'NEGERI', 'Tumijajar'),
(53, '10808179', 'SD N GUNUNG MENANTI', 'Jl. Way Terusan', 'GUNUNG MENANTI', 'NEGERI', 'Tumijajar'),
(54, '10808792', 'SD N GUNUNG TIMBUL', 'Jln. Raden Saleh, TIYUH GUNUNG TIMBUL', 'Gunung Timbul', 'NEGERI', 'Tumijajar'),
(55, '69990588', 'SDIT FAVORIT NUR ALIF', 'Daya Murni', 'Daya Murni', 'SWASTA', 'Tumijajar'),
(56, '60705956', 'MIN 1 TULANGBAWANG BARAT', 'Jalan Dua Brebes RT 02 RW 07', 'Panaragan Jaya', 'NEGERI', 'Tulang Bawang Tengah'),
(57, '69726284', 'MIS AL FATAH PANARAGAN', 'Blok Muslimin', 'Panaragan', 'SWASTA', 'Tulang Bawang Tengah'),
(58, '69819484', 'MIS DARUL HASAN', 'Jl. Dua Panaragan Jaya RW 01, RT 02', 'Panaragan Jaya', 'SWASTA', 'Tulang Bawang Tengah'),
(59, '69854314', 'MIS DARUL ULUM', 'Jalan Gajah Mada No. 216', 'Panaragan Jaya', 'SWASTA', 'Tulang Bawang Tengah'),
(60, '60705957', 'MIS MATHOLIUL FALAH', 'Jalan Perintis No. 01', 'Candra Kencana', 'SWASTA', 'Tulang Bawang Tengah'),
(61, '60705958', 'MIS NURUL IMAN', 'Jalan Raya Pulung Kencana', 'Pulung Kencana', 'SWASTA', 'Tulang Bawang Tengah'),
(62, '69726139', 'MIS NURUL MUTTAQIN', 'Jalan Brawijaya No. 740 Suku IV/15', 'Penumangan Baru', 'SWASTA', 'Tulang Bawang Tengah'),
(63, '69831530', 'SD ISLAM TERPADU MADANI', 'Candra Mukti Rt 03, Rw 01', 'Candra Mukti', 'SWASTA', 'Tulang Bawang Tengah'),
(64, '10808224', 'SD MUHAMMADIYAH MULYA ASRI', 'Mulya Asri', 'Mulya Asri', 'SWASTA', 'Tulang Bawang Tengah'),
(65, '10809644', 'SD N 1 CANDRA JAYA', 'Jln. Siliwangi Rt. 14 Rw. 04, Tiyuh Candra Jaya', 'Candra Jaya', 'NEGERI', 'Tulang Bawang Tengah'),
(66, '10808589', 'SD N 1 CANDRA KENCANA', 'Candra Kencana', 'Candra Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(67, '10808786', 'SD N 1 CANDRA MUKTI', 'RK 3 RT 15 Tiyuh Candra Mukti', 'Candra Mukti', 'NEGERI', 'Tulang Bawang Tengah'),
(68, '10808153', 'SD N 1 MARGA ASRI', 'Jln. Peternakan, Tiyuh Marga Asri', 'Mulya Asri', 'NEGERI', 'Tulang Bawang Tengah'),
(69, '10808169', 'SD N 1 MEKAR ASRI', 'Jln. Merdeka Timur No. 109, Tiyuh Mekar Asri', 'Mulya Asri', 'NEGERI', 'Tulang Bawang Tengah'),
(70, '10808660', 'SD N 1 MENGGALA MAS', 'Jl.SD Impres Menggala Mas', 'Menggala Mas', 'NEGERI', 'Tulang Bawang Tengah'),
(71, '10808668', 'SD N 1 MULYA ASRI', 'Jalan Merdeka Barat Gg. Kresna No.193', 'Mulya Asri', 'NEGERI', 'Tulang Bawang Tengah'),
(72, '10809611', 'SD N 1 MULYA JAYA', 'TIYUH MULYA JAYA', 'MULYA JAYA', 'NEGERI', 'Tulang Bawang Tengah'),
(73, '10808670', 'SD N 1 MULYA KENCANA', 'Jl. Diponegoro Desa Mulya Kencana', 'Mulya Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(74, '10808676', 'SD N 1 PANARAGAN', 'Panaragan', 'PANARAGAN', 'NEGERI', 'Tulang Bawang Tengah'),
(75, '10808677', 'SD N 1 PANARAGAN JAYA', 'JL.SILIWANGI RK 03 RT 03', 'PANARAGAN JAYA', 'NEGERI', 'Tulang Bawang Tengah'),
(76, '10809684', 'SD N 1 PANARAGAN JAYA INDAH', 'Jln. PAHLAWAN RT 5 RW 2', 'PANARAGAN JAYA INDAH', 'NEGERI', 'Tulang Bawang Tengah'),
(77, '10808124', 'SD N 1 PANARAGAN JAYA UTAMA', 'Jln. Arjuna 07 RT 03 RW 3', 'PANARAGAN JAYA UTAMA', 'NEGERI', 'Tulang Bawang Tengah'),
(78, '10808693', 'SD N 1 PENUMANGAN', 'Penumangan', 'PENUMANGAN', 'NEGERI', 'Tulang Bawang Tengah'),
(79, '10808694', 'SD N 1 PENUMANGAN BARU', 'Penumangan Baru', 'PENUMANGAN BARU', 'NEGERI', 'Tulang Bawang Tengah'),
(80, '10808695', 'SD N 1 PULUNG KENCANA', 'Jln. Raya Pulung Kencana', 'PULUNG KENCANA', 'NEGERI', 'Tulang Bawang Tengah'),
(81, '10808716', 'SD N 1 SUKA MAJU', 'Jl. Raya Sukamaju', 'Panaragan', 'NEGERI', 'Tulang Bawang Tengah'),
(82, '10808739', 'SD N 1 TIRTA KENCANA', 'Tirta Kencana', 'Tirta Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(83, '10809633', 'SD N 1 TIRTA MAKMUR', 'Tiyuh Tirta Makmur', 'Tirta Makmur', 'NEGERI', 'Tulang Bawang Tengah'),
(84, '10808041', 'SD N 1 TUNAS ASRI', 'Jl. Sendang Gayur 96, Suku 3 Tiyuh Tunas Asri', 'Tunas Asri', 'NEGERI', 'Tulang Bawang Tengah'),
(85, '10808761', 'SD N 1 WONOKERTO', 'Wonokerto', 'Wonokerto', 'NEGERI', 'Tulang Bawang Tengah'),
(86, '10809689', 'SD N 2 CANDRA JAYA', 'Jln. NANGKA NO 2, Tiyuh Candra Jaya', 'Candra Jaya', 'NEGERI', 'Tulang Bawang Tengah'),
(87, '10809675', 'SD N 2 CANDRA MUKTI', 'Jln. Jendral Sudirman, Tiyuh Candra Mukti', 'Candra Mukti', 'NEGERI', 'Tulang Bawang Tengah'),
(88, '10809683', 'SD N 2 MULYA JAYA', 'Mulya Jaya', 'MULYA JAYA', 'NEGERI', 'Tulang Bawang Tengah'),
(89, '10809659', 'SD N 2 MULYA KENCANA', 'Jl. Diponegoro Tiyuh Mulya Kencana', 'Mulya Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(90, '10808119', 'SD N 2 MULYO ASRI', 'Mulyo Asri', 'Mulya Asri', 'NEGERI', 'Tulang Bawang Tengah'),
(91, '10809614', 'SD N 2 PANARAGAN', 'Panaragan', 'Panaragan', 'NEGERI', 'Tulang Bawang Tengah'),
(92, '10809615', 'SD N 2 PANARAGAN JAYA', 'Panaragan Jaya', 'PANARAGAN JAYA', 'NEGERI', 'Tulang Bawang Tengah'),
(93, '10808056', 'SD N 2 PENUMANGAN', 'Penumangan', 'PENUMANGAN', 'NEGERI', 'Tulang Bawang Tengah'),
(94, '10809618', 'SD N 2 PENUMANGAN BARU', 'Jl. Sriwijaya Penumangan Baru', 'Penumangan Baru', 'NEGERI', 'Tulang Bawang Tengah'),
(95, '10809619', 'SD N 2 PULUNG KENCANA', 'Pulung Kencana', 'PULUNG KENCANA', 'NEGERI', 'Tulang Bawang Tengah'),
(96, '10809670', 'SD N 2 TIRTA KENCANA', 'Tiyuh Tirta Kencana', 'Tirta Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(97, '10809693', 'SD N 2 TIRTA MAKMUR', 'Tiyuh Tirta Makmur', 'Tirta Makmur', 'NEGERI', 'Tulang Bawang Tengah'),
(98, '10808164', 'SD N 2 TUNAS ASRI', 'Jl. Raya Tiyuh Tunas Asri', 'Tunas Asri', 'NEGERI', 'Tulang Bawang Tengah'),
(99, '10809691', 'SD N 3 MULYA KENCANA', 'Tiyuh Mulya Kencana', 'Mulya Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(100, '10809692', 'SD N 3 PANARAGAN JAYA', 'Tiyuh Panaragan Jaya', 'Panaragan Jaya', 'NEGERI', 'Tulang Bawang Tengah'),
(101, '10808126', 'SD N 3 PENUMANGAN BARU', 'Jln Brawijaya', 'Penumangan Baru', 'NEGERI', 'Tulang Bawang Tengah'),
(102, '10809662', 'SD N 3 PULUNG KENCANA', 'Pulung Kencana', 'PULUNG KENCANA', 'NEGERI', 'Tulang Bawang Tengah'),
(103, '10809687', 'SD N 3 TIRTA KENCANA', 'Tiyuh Tirta Kencana', 'Tirta Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(104, '10809695', 'SD N 3 TUNAS ASRI', 'Jln. Sindang Gayur, Tiyuh Tunas Asri', 'Tunas Asri', 'NEGERI', 'Tulang Bawang Tengah'),
(105, '10809685', 'SD N 4 PULUNG KENCANA', 'Pulung Kencana', 'Pulung Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(106, '10809694', 'SD N 6 MULYA KENCANA', 'Mulya Kencana', 'Mulya Kencana', 'NEGERI', 'Tulang Bawang Tengah'),
(107, '10808210', 'SD S ISLAM AL FURQON', 'Jl.pahlawan', 'Panaragan Jaya', 'SWASTA', 'Tulang Bawang Tengah'),
(108, '69854313', 'MIS MAKARIMAL AKHLAK', 'Jalan Raya Blok J RT 013/04', 'Kibang Yekti Jaya', 'SWASTA', 'Lambu Kibang'),
(109, '10809924', 'SD N 1 GILANG TUNGGAL MAKARTA', 'Jl. Plamboyan TIYUH GILANG TUNGGAL MAKARTA', 'GILANG TUNGGAL MAKARTA', 'NEGERI', 'Lambu Kibang'),
(110, '10808612', 'SD N 1 GUNUNG SARI', 'RT 007 RW 002', 'Gunung Sari', 'NEGERI', 'Lambu Kibang'),
(111, '10808636', 'SD N 1 KIBANG BUDI JAYA', 'Jl. Lintas Unit 6', 'Kibang Budi Jaya', 'NEGERI', 'Lambu Kibang'),
(112, '10808638', 'SD N 1 KIBANG MULYA JAYA', 'Kibang Mulya Jaya', 'Kibang Mulya Jaya', 'NEGERI', 'Lambu Kibang'),
(113, '10808637', 'SD N 1 KIBANG TRI JAYA', 'Jl.Ethanol No.100', 'Kibang Tri Jaya', 'NEGERI', 'Lambu Kibang'),
(114, '10809606', 'SD N 1 KIBANG YEKTI JAYA', 'Kibang Yekti Jaya', 'Kibang Yekti Jaya', 'NEGERI', 'Lambu Kibang'),
(115, '10808642', 'SD N 1 LESUNG BHAKTI JAYA', 'Jln Taruna Rt6 Rw 2', 'LESUNG BAKTI JAYA', 'NEGERI', 'Lambu Kibang'),
(116, '10808657', 'SD N 1 MEKAR SARI', 'Jl. Raya Mekar Sari Jaya', 'Mekar Sari Jaya', 'NEGERI', 'Lambu Kibang'),
(117, '10808675', 'SD N 1 PAGAR JAYA', 'Pagar Jaya', 'PAGAR JAYA', 'NEGERI', 'Lambu Kibang'),
(118, '10808725', 'SD N 1 SUMBER REJO', 'Sumber Rejo', 'SUMBER REJO', 'NEGERI', 'Lambu Kibang'),
(119, '10809605', 'SD N 2 KIBANG BUDI JAYA', 'Lintas Unit 6', 'Kibang Budi Jaya', 'NEGERI', 'Lambu Kibang'),
(120, '10808113', 'SD N 2 KIBANG YEKTI JAYA', 'KIBANG YEKTI JAYA', 'Kibang Yekti Jaya', 'NEGERI', 'Lambu Kibang'),
(121, '10808112', 'SD N 3 KIBANG BUDI JAYA', 'Kibang Budi Jaya', 'KIBANG BUDI JAYA', 'NEGERI', 'Lambu Kibang'),
(122, '10809682', 'SD N 4 KIBANG BUDI JAYA', 'Kibang Budi Jaya', 'Kibang Budi Jaya', 'NEGERI', 'Lambu Kibang'),
(123, '69754453', 'MIS AMANAH I', 'Jalan Putra Dewa', 'Bujung Sari Marga', 'SWASTA', 'Pagar Dewa'),
(124, '10808558', 'SD N 1 BAKEM SUKA MULYA', 'Bakem Suka Mulya Kec. Pagar Dewa Kab.Tulang Bawang Barat', 'Pagar Dewa Suka Mulya', 'NEGERI', 'Pagar Dewa'),
(125, '69892758', 'SD N 1 CAHYOU RANDU', 'JL. PENDIDIKAN NO 156', 'Cahyou Randu', 'NEGERI', 'Pagar Dewa'),
(126, '10808674', 'SD N 1 PAGAR DEWA', 'Pagar Dewa', 'PAGAR DEWA', 'NEGERI', 'Pagar Dewa'),
(127, '10809613', 'SD N 2 PAGAR DEWA', 'Pagar Dewa', 'PAGAR DEWA', 'NEGERI', 'Pagar Dewa'),
(128, '10812422', 'SDS Bujung Dewa', 'Bujung Dewa', 'Bujung Dewa', 'SWASTA', 'Pagar Dewa'),
(129, '10804273', 'SD N 1 AGUNG JAYA', 'Jalan Poros Tengah Agung Jaya', 'Agung Jaya', 'NEGERI', 'Way Kenanga'),
(130, '10808771', 'SD N 1 BALAM ASRI', 'Jalan Bumi Perkemahan', 'BALAM ASRI', 'NEGERI', 'Way Kenanga'),
(131, '10808562', 'SD N 1 BALAM JAYA', 'Jl. Poros', 'Balam Jaya', 'NEGERI', 'Way Kenanga'),
(132, '10808620', 'SD N 1 INDRALOKA I', 'Jalan Poros Indraloka I', 'Indraloka I', 'NEGERI', 'Way Kenanga'),
(133, '10808621', 'SD N 1 INDRALOKA II', 'Jl. Sulawesi', 'Indraloka II', 'NEGERI', 'Way Kenanga'),
(134, '10808045', 'SD N 1 INDRALOKA JAYA', 'Jl. Sulawesi', 'Indraloka Jaya', 'NEGERI', 'Way Kenanga'),
(135, '10810701', 'SD N 1 INDRALOKA MUKTI', 'Jln. Soekarno Hatta Gg. Jeruk', 'Indraloka Mukti', 'NEGERI', 'Way Kenanga'),
(136, '10808661', 'SD N 1 MERCU BUANA', 'Jln. Poros Utama Kecamatan Way Kenanga', 'Mercu Buana', 'NEGERI', 'Way Kenanga'),
(137, '10808673', 'SD N 1 PAGAR BUANA', 'Jl. Poros', 'Pagar Buana', 'NEGERI', 'Way Kenanga'),
(138, '10809643', 'SD N 1 SIDO AGUNG', 'Jalan Poros Sidorejo', 'Agung Jaya', 'NEGERI', 'Way Kenanga'),
(139, '10808768', 'SD N 2 AGUNG JAYA', 'Jalan Poros Agung Jaya', 'Agung Jaya', 'NEGERI', 'Way Kenanga'),
(140, '69787517', 'SD N 2 INDRALOKA II', 'Jln. Simpang Asahan', 'Indraloka Ii', 'NEGERI', 'Way Kenanga'),
(141, '10809679', 'SD N 2 INDRALOKA MUKTI', 'Jl. SImpang Sulawesi', 'Indraloka Mukti', 'NEGERI', 'Way Kenanga'),
(142, '60705950', 'MIS AL HIDAYAH', 'Jalan Beringin No. 02', 'Setia Bumi', 'SWASTA', 'Gunung Terang'),
(143, '10808609', 'SD N 1 GUNUNG AGUNG', 'jln Ethanol Gunung Agung', 'Gunung Agung', 'NEGERI', 'Gunung Terang'),
(144, '10808614', 'SD N 1 GUNUNG TERANG', 'Gunung Terang', 'Gunung Terang', 'NEGERI', 'Gunung Terang'),
(145, '10808743', 'SD N 1 MULYO JADI', 'Jln. POROS 2 TIYUH MULYO JADI', 'Mulyo Jadi', 'NEGERI', 'Gunung Terang'),
(146, '10808701', 'SD N 1 Setia Bumi', 'Jln Poros Setia Bumi', 'Setia Bumi', 'NEGERI', 'Gunung Terang'),
(147, '10808005', 'SD N 1 TERANG BUMI AGUNG', 'Jln. POSOS 2 TIYUH TERANG BUMI AGUNG', 'Terang Bumi Agung', 'NEGERI', 'Gunung Terang'),
(148, '10809648', 'SD N 1 TERANG MAKMUR', 'Jln. POROS TIYUH TERANG MAKMUR', 'Terang Makmur', 'NEGERI', 'Gunung Terang'),
(149, '10808147', 'SD N 1 TERANG MULYA', 'TERANG MULYA', 'TERANG MULYA', 'NEGERI', 'Gunung Terang'),
(150, '10808084', 'SD N 1 TOTO MULYO', 'Toto Mulyo', 'Toto Mulyo', 'NEGERI', 'Gunung Terang'),
(151, '10809597', 'SD N 2 GUNUNG TERANG', 'Gunung Terang', 'GUNUNG TERANG', 'NEGERI', 'Gunung Terang'),
(152, '10808062', 'SD N 2 SETIA BUMI', 'Setia Bumi', 'SETIA BUMI', 'NEGERI', 'Gunung Terang'),
(153, '10809671', 'SD N 2 TOTO MULYO', 'Jln. POROS 1 TIYUH TOTO MULYO', 'Toto Mulyo', 'NEGERI', 'Gunung Terang'),
(154, '10809664', 'SD N 3 SETIA BUMI', 'JLN Setia Bumi', 'SETIA BUMI', 'NEGERI', 'Gunung Terang'),
(155, '10808738', 'SD S TERANG AGUNG', 'Terang Agung', 'TERANG AGUNG', 'SWASTA', 'Gunung Terang'),
(156, '10808564', 'SD N 1 BANGUN JAYA', 'Bangun Jaya', 'BANGUN JAYA', 'NEGERI', 'Gunung Agung'),
(157, '10809636', 'SD N 1 DWI KORA JAYA', 'Jln. DWI KORA JAYA', 'Dwi Kora Jaya', 'NEGERI', 'Gunung Agung'),
(158, '10810376', 'SD N 1 Jaya Murni', 'Jaya Murni', 'Jaya Murni', 'NEGERI', 'Gunung Agung'),
(159, '69863229', 'SD N 1 MARGA JAYA', 'Marga Jaya', 'Marga Jaya', 'NEGERI', 'Gunung Agung'),
(160, '10808656', 'SD N 1 MEKAR JAYA', 'JALAN POROS', 'Mekar Jaya', 'NEGERI', 'Gunung Agung'),
(161, '10808669', 'SD N 1 MULYA JAYA', 'Kp. Mulya Jaya', 'Mulya Jaya', 'NEGERI', 'Gunung Agung'),
(162, '10809658', 'SD N 1 MULYA SARI', 'TIYUH MULYA SARI', 'MULYA SARI', 'NEGERI', 'Gunung Agung'),
(163, '10808715', 'SD N 1 SUKA JAYA', 'Jln Poros Suka Jaya Indah 01', 'SUKA JAYA', 'NEGERI', 'Gunung Agung'),
(164, '10808723', 'SD N 1 SUMBER JAYA', 'Sumber Jaya', 'SUMBER JAYA', 'NEGERI', 'Gunung Agung'),
(165, '10809625', 'SD N 1 SUMBER REJEKI', 'Jln. POROS TIYUH SUMBER REJEKI', 'SUMBER REJEKI', 'NEGERI', 'Gunung Agung'),
(166, '10808749', 'SD N 1 TRI TUNGGAL JAYA', 'Jalan. Sri Wijaya', 'Tri Tunggal Jaya', 'NEGERI', 'Gunung Agung'),
(167, '10808750', 'SD N 1 TUNAS JAYA', 'Tunas Jaya', 'TUNAS JAYA', 'NEGERI', 'Gunung Agung'),
(168, '10808202', 'SD N 1 WONOREJO', 'Jln. Poros Kampung Wonorejo', 'WONOREJO', 'NEGERI', 'Gunung Agung'),
(169, '10808772', 'SD N 2 BANGUN JAYA', 'Jl. Brawijaya', 'BANGUN JAYA', 'NEGERI', 'Gunung Agung'),
(170, '10804016', 'SD N 2 Marga Jaya', 'Marga Jaya', 'MARGA JAYA', 'NEGERI', 'Gunung Agung'),
(171, '10808035', 'SD N 2 MEKAR JAYA', 'MEKAR JAYA', 'MEKAR JAYA', 'NEGERI', 'Gunung Agung'),
(172, '10809610', 'SD N 2 MULYA JAYA', 'Mulya Jaya', 'Mulya Jaya', 'NEGERI', 'Gunung Agung'),
(173, '10809668', 'SD N 2 SUKA JAYA', 'Jalan Kumboyono', 'Suka Jaya', 'NEGERI', 'Gunung Agung'),
(174, '10808072', 'SD N 2 SUMBER JAYA', 'Sumber Jaya', 'SUMBER JAYA', 'NEGERI', 'Gunung Agung'),
(175, '10809672', 'SD N 2 TUNAS JAYA', 'Tiyuh Tunas Jaya', 'Tunas Jaya', 'NEGERI', 'Gunung Agung'),
(176, '10808212', 'SD S KASIH ABADI', 'Jl Poros Gang 3', 'Mulya Jaya', 'SWASTA', 'Gunung Agung'),
(177, '60705951', 'MIS BUSTANUL ULUM', 'Jalan Poros Inhutani Tiyuh Sakti Jaya', 'Sakti Jaya', 'SWASTA', 'Batu Putih'),
(178, '69726140', 'MIS DARUL ULUM', 'Jalan Poros 2', 'Marga Sari', 'SWASTA', 'Batu Putih'),
(179, '60705952', 'MIS HIDAYATUL MUBTADIIN', 'Jalan Raden Intan RT 05/02', 'Margo Mulyo', 'SWASTA', 'Batu Putih'),
(180, '69854315', 'MIS SABILIL MUHTADIN', 'Jalan Poros 02', 'Toto Makmur', 'SWASTA', 'Batu Putih'),
(181, '10808648', 'SD N 1 MARGA SARI', 'Jln. Marga Sari', 'Marga Sari', 'NEGERI', 'Batu Putih'),
(182, '10808032', 'SD N 1 MARGO DADI', 'Margo Dadi', 'Margo Dadi', 'NEGERI', 'Batu Putih'),
(183, '69775301', 'SD N 1 MARGO MULYO', 'Margo Mulyo Kec.batu putih', 'Margo Mulyo', 'NEGERI', 'Batu Putih'),
(184, '10808033', 'SD N 1 MULYO SARI', 'Mulyo Sari', 'Mulyo Sari', 'NEGERI', 'Batu Putih'),
(185, '10808680', 'SD N 1 PANCA MARGA', 'Panca Marga', 'Panca Marga', 'NEGERI', 'Batu Putih'),
(186, '10808700', 'SD N 1 SAKTI JAYA', 'Sakti Jaya', 'Sakti Jaya', 'NEGERI', 'Batu Putih'),
(187, '10809616', 'SD N 1 SIDO MAKMUR', 'TIYUH SIDO MAKMUR', 'Sido Makmur', 'NEGERI', 'Batu Putih'),
(188, '10808744', 'SD N 1 TOTO KATON', 'Toto Katon', 'Toto Katon', 'NEGERI', 'Batu Putih'),
(189, '10808136', 'SD N 1 TOTO MAKMUR', 'Jln. POROS 1 TIYUH TOTO MAKMUR', 'Toto Makmur', 'NEGERI', 'Batu Putih'),
(190, '10809635', 'SD N 1 TOTO WONODADI', 'Jln. POROS TIYUH TOTO WONODADI', 'Toto Wonodadi', 'NEGERI', 'Batu Putih');

-- --------------------------------------------------------

--
-- Table structure for table `tahunpelajaran`
--

CREATE TABLE `tahunpelajaran` (
  `id_tahun` int(4) NOT NULL,
  `tahun_pelajaran` varchar(4) DEFAULT NULL,
  `kuota` varchar(3) NOT NULL,
  `tanggal_mulai_pendaftaran` date NOT NULL,
  `tanggal_selesai_pendaftaran` date NOT NULL,
  `tanggal_mulai_seleksi` date NOT NULL,
  `tanggal_selesai_seleksi` date NOT NULL,
  `tanggal_pengumuman` date NOT NULL,
  `tanggal_mulai_daftar_ulang` date NOT NULL,
  `tanggal_selesai_daftar_ulang` date NOT NULL,
  `status_tahun` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahunpelajaran`
--

INSERT INTO `tahunpelajaran` (`id_tahun`, `tahun_pelajaran`, `kuota`, `tanggal_mulai_pendaftaran`, `tanggal_selesai_pendaftaran`, `tanggal_mulai_seleksi`, `tanggal_selesai_seleksi`, `tanggal_pengumuman`, `tanggal_mulai_daftar_ulang`, `tanggal_selesai_daftar_ulang`, `status_tahun`) VALUES
(5, '2021', '288', '2021-06-21', '2021-06-26', '2021-06-27', '2021-06-28', '2021-06-29', '2021-07-01', '2021-07-02', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'avatar.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `image`) VALUES
(1, '127.0.0.1', 'admin', '$2y$10$3fVC8VJfm8ElEv6PNLT2R.XalOF.sFq7TOgJE54p5KQm2oL/0N1Im', '', 'admin@admin.com', '', '5vfXw8AFBMJnY.DC95LkHO611d8355408aeba502', 1579613175, 'fmqjlAIj.o/W3cqHnmFqYu', 1268889823, 1638966314, 1, 'Admin', 'istrator', 'nenemo project', '082184032134', 'admin.jpg'),
(96, '::1', 'panitia', '$2y$08$B5EWd7R/qp76l4OKcMbqP..y1/EozVfXIRhwaY7auneZlu.hme.s.', NULL, 'panitia@panitia.com', NULL, NULL, NULL, NULL, 1622028644, NULL, 1, 'Panitia', 'PPDB', '', '', 'panitia.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(47, 1, 1),
(164, 96, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `formulir`
--
ALTER TABLE `formulir`
  ADD PRIMARY KEY (`id_formulir`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `jalur`
--
ALTER TABLE `jalur`
  ADD PRIMARY KEY (`id_jalur`);

--
-- Indexes for table `jarak`
--
ALTER TABLE `jarak`
  ADD PRIMARY KEY (`id_jarak`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id_menu_type`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id_peserta`),
  ADD UNIQUE KEY `no_pendaftaran` (`no_pendaftaran`);

--
-- Indexes for table `prestasi`
--
ALTER TABLE `prestasi`
  ADD PRIMARY KEY (`id_prestasi`);

--
-- Indexes for table `prestasipeserta`
--
ALTER TABLE `prestasipeserta`
  ADD PRIMARY KEY (`id_prestasipeserta`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id_sekolah`);

--
-- Indexes for table `tahunpelajaran`
--
ALTER TABLE `tahunpelajaran`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `formulir`
--
ALTER TABLE `formulir`
  MODIFY `id_formulir` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jalur`
--
ALTER TABLE `jalur`
  MODIFY `id_jalur` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jarak`
--
ALTER TABLE `jarak`
  MODIFY `id_jarak` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id_peserta` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prestasi`
--
ALTER TABLE `prestasi`
  MODIFY `id_prestasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `prestasipeserta`
--
ALTER TABLE `prestasipeserta`
  MODIFY `id_prestasipeserta` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id_sekolah` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `tahunpelajaran`
--
ALTER TABLE `tahunpelajaran`
  MODIFY `id_tahun` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
