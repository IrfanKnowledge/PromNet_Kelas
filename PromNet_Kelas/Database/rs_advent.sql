-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 12:21 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_advent`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `abcd` (IN `no` CHAR(20))  select 4+4$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `build_email_list` (INOUT `email_list` VARCHAR(4000))  BEGIN
 
 DECLARE v_finished INTEGER DEFAULT 0;
        DECLARE v_email varchar(100) DEFAULT "";
 
 
 DEClARE email_cursor CURSOR FOR 
 SELECT email FROM employees;
 
 
 DECLARE CONTINUE HANDLER 
        FOR NOT FOUND SET v_finished = 1;
 
 OPEN email_cursor;
 
 get_email: LOOP
 
 FETCH email_cursor INTO v_email;
 
 IF v_finished = 1 THEN 
 LEAVE get_email;
 END IF;
 
 
 SET email_list = CONCAT(v_email,";",email_list);
 
 END LOOP get_email;
 
 CLOSE email_cursor;
 
END$$

CREATE DEFINER=`irfan`@`localhost` PROCEDURE `check_id` (IN `Id` CHAR(11))  BEGIN

IF length(Id) > 10  THEN
	SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Maaf, batas maksimal Id 10 digit';
END IF;

IF length(Id) = 0 then 
	SIGNAL SQLSTATE '45001'
            SET MESSAGE_TEXT = 'Maaf, input atau data tidak boleh kosong';

END IF;
END$$

CREATE DEFINER=`irfan`@`localhost` PROCEDURE `check_nama_lain` (IN `Nama_Lain` CHAR(21))  BEGIN

#Berikut ini contoh penggunaan Cursor, Deklarasi berikut harus diletakkan disini agar tidak error 
#(sesuai ketetapan aturan dari MYSQL)
/*
DECLARE done INT DEFAULT 0;
declare a VARCHAR(255);
declare b VARCHAR(255);
DECLARE cur2 CURSOR FOR SELECT nama, alamat FROM transaksi;
DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;
*/

IF length(Nama_Lain) > 20 THEN
	SIGNAL SQLSTATE '45001'
            SET MESSAGE_TEXT = 'Maaf, batas maksimal Spesialisasi, Nama Kamar, Nama Obat, dan Paket = 20 digit';
END IF;

IF length(Nama_Lain) = 0 then 
	SIGNAL SQLSTATE '45001'
            SET MESSAGE_TEXT = 'Maaf, input atau data tidak boleh kosong';

END IF;

#Berikut ini contoh lanjutan penggunaan Cursor setelah di atas kita deklarasikan
#variable-variable yang kita butuhkan dalam contoh Cursor
/*
  OPEN cur2;
	
  read_loop: LOOP
    FETCH cur2 INTO a, b;
    #IF a = 'Supratman' THEN
			set @a = a;
			set @b = b;
      LEAVE read_loop;
    #END IF;
  END LOOP;

  CLOSE cur2;
	select @a, @b;
	
	#untuk percobaan, gunakan tabel rs_advent, kemudian panggil
	#prosedur (	misal: check_nama_lain('test'); )
*/
END$$

CREATE DEFINER=`irfan`@`localhost` PROCEDURE `check_orang` (IN `Nama_Manusia` CHAR(41), IN `Jenis_Kelamin` CHAR(2), IN `Alamat` CHAR(61))  BEGIN

IF length(Nama_Manusia) > 40 THEN
	SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Maaf, batas maksimal Nama = 40 digit';
END IF;

IF length(Jenis_Kelamin) > 1 THEN
	SIGNAL SQLSTATE '45001'
            SET MESSAGE_TEXT = 'Maaf, batas maksimal Jenis Kelamin = 1 digit';
END IF;

IF length(Alamat) > 60 THEN
	SIGNAL SQLSTATE '45002'
            SET MESSAGE_TEXT = 'Maaf, batas maksimal Alamat = 60 digit';
END IF;

IF length(Nama_Manusia) = 0 || length(Jenis_Kelamin) = 0 || length(Alamat) = 0 then 
	SIGNAL SQLSTATE '45003'
            SET MESSAGE_TEXT = 'Maaf, input atau data tidak boleh kosong';

END IF;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `check_phone_number` (IN `no` CHAR(20))  NO SQL
BEGIN
    DECLARE panjang_no char(20) default "hello world1";
    DECLARE awal_no char(20) default "hello world2";
    DECLARE str_int_no char(20) default "hello world3";
		DECLARE i int default 1;
    DECLARE kondisi int default 1; /*asumsi data masih benar*/
		
    SET panjang_no = length(no);
    SET awal_no = substring(no, 1, 1);
    SET str_int_no = cast(no AS signed);
		
IF awal_no != '0' THEN 
    	SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Maaf, input nomor harus dimulai nol (0)';
      	/* SELECT 'Maaf, input nomor harus dimulai nol (0)'; */
ELSEIF panjang_no < 7 THEN
		SIGNAL SQLSTATE '45001'
            SET MESSAGE_TEXT = 'Maaf, batas minimal digit nomor telepon = 7';
        /*SELECT 'Maaf, batas minimal digit nomor telepon = 7'; */
ELSEIF panjang_no > 13 THEN
		SIGNAL SQLSTATE '45002'
            SET MESSAGE_TEXT = 'Maaf, batas maksimal digit nomor HP = 13';
        /*SELECT 'Maaf, batas maksimal digit nomor HP = 13';*/
ELSEIF str_int_no < 100000 THEN
		SIGNAL SQLSTATE '45003'
            SET MESSAGE_TEXT = 'Maaf, no telepon harus menggunakan angka';
        /*SELECT 'Maaf, no telepon harus menggunakan angka';*/
END IF;

IF panjang_no = 8 && str_int_no < 1000000 THEN /*Digit ke 8, awal angka nol input tidak dihitung*/
		SIGNAL SQLSTATE '45003'
            SET MESSAGE_TEXT = 'Maaf, no telepon harus menggunakan angka';
        /*SELECT 'Maaf, no telepon harus menggunakan angka';*/
END IF;
IF panjang_no = 9 && str_int_no < 10000000 THEN /*Digit ke 9, awal angka nol input tidak dihitung*/
		SIGNAL SQLSTATE '45003'
            SET MESSAGE_TEXT = 'Maaf, no telepon harus menggunakan angka';
        /*SELECT 'Maaf, no telepon harus menggunakan angka';*/
END IF;
IF panjang_no = 10 && str_int_no < 100000000 THEN /*Digit ke 10, awal angka nol input tidak dihitung*/
		SIGNAL SQLSTATE '45003'
            SET MESSAGE_TEXT = 'Maaf, no telepon harus menggunakan angka';
        /*SELECT 'Maaf, no telepon harus menggunakan angka';*/
END IF;
IF panjang_no = 11 && str_int_no < 1000000000 THEN /*Digit ke 11, awal angka nol input tidak dihitung*/
		SIGNAL SQLSTATE '45003'
            SET MESSAGE_TEXT = 'Maaf, no telepon harus menggunakan angka';
        /*SELECT 'Maaf, no telepon harus menggunakan angka';*/
END IF;
IF panjang_no = 12 && str_int_no < 10000000000 THEN /*Digit ke 12, awal angka nol input tidak dihitung*/
		SIGNAL SQLSTATE '45003'
            SET MESSAGE_TEXT = 'Maaf, no telepon harus menggunakan angka';
        /*SELECT 'Maaf, no telepon harus menggunakan angka';*/
END IF;
IF panjang_no = 13 && str_int_no < 100000000000 THEN /*Digit ke 13, awal angka nol input tidak dihitung*/
		SIGNAL SQLSTATE '45003'
            SET MESSAGE_TEXT = 'Maaf, no telepon harus menggunakan angka';
        /*SELECT 'Maaf, no telepon harus menggunakan angka';*/
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `check_phone_number_salah` (IN `nomor_hp` TINYINT(15))  NO SQL
BEGIN
IF nomor_hp >= 10000000000000 THEN
    SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Maaf, batas maksimal digit nomor HP = 13 digit';
    ELSEIF nomor_hp < 1000000 THEN
        SIGNAL SQLSTATE '45001'
        SET MESSAGE_TEXT = 'Maaf, batas minimal digit nomor HP = 7 digit';
    END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ngetest aja` (IN `ni` INT)  NO SQL
BEGIN
	IF ni = 10 || ni = 11 THEN
     select 'berhasil';
    END if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `salah lagi wkwk :((` (IN `no` CHAR(20))  NO SQL
BEGIN
    DECLARE panjang_no char(20) default "hello world1";
    DECLARE awal_no char(20) default "hello world2";
    DECLARE str_int_no char(20) default "hello world3";
		DECLARE i int default 1;
    DECLARE kondisi int default 1; /*asumsi data masih benar*/
		
    SET panjang_no = length(no);
    SET awal_no = substring(no, 1, 1);
    SET str_int_no = cast(no AS signed);
		SET @test = 10;
		
IF awal_no != '0' THEN 
    	SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Maaf, input nomor harus dimulai nol (0)';
      	/* SELECT 'Maaf, input nomor harus dimulai nol (0)'; */
ELSEIF panjang_no < 7 THEN
		SIGNAL SQLSTATE '45001'
            SET MESSAGE_TEXT = 'Maaf, batas minimal digit nomor telepon = 7';
        /*SELECT 'Maaf, batas minimal digit nomor telepon = 7'; */
ELSEIF panjang_no > 13 THEN
		SIGNAL SQLSTATE '45002'
            SET MESSAGE_TEXT = 'Maaf, batas maksimal digit nomor HP = 13';
        /*SELECT 'Maaf, batas maksimal digit nomor HP = 13';*/
/*ELSEIF str_int_no < 1000000 THEN
		SIGNAL SQLSTATE '45003'
            SET MESSAGE_TEXT = 'Maaf, no telepon harus menggunakan angka'; */
        /*SELECT 'Maaf, no telepon harus menggunakan angka';*/
ELSE WHILE kondisi = 1 DO
	IF (SUBSTRING(no, i, 1) = '0' || SUBSTRING(no, i, 1) = '1' || SUBSTRING(no, i, 1) = '2' || SUBSTRING(no, i, 1) = '3' || SUBSTRING(no, i, 1) = '4' || SUBSTRING(no, i, 1) = '5' || SUBSTRING(no, i, 1) = '6' || SUBSTRING(no, i, 1) = '7' || SUBSTRING(no, i, 1) = '8' || SUBSTRING(no, i, 1) = '9') 
	THEN
    SET kondisi = 1;
	ELSE
    SET kondisi = 0; /*kondisi dianggap false*/
		select substring(no, @test, 1), i, @test;
		select i;
		
	SIGNAL SQLSTATE '45003'
            SET MESSAGE_TEXT = 'Maaf, no telepon harus menggunakan angka';
    END IF;
	SET i = i + 1;
END WHILE;
END IF;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `Id_Dokter` char(10) NOT NULL,
  `Nama_Dokter` char(41) NOT NULL,
  `Jenis_Kelamin` char(2) NOT NULL,
  `Spesialisasi` char(21) NOT NULL,
  `Alamat` char(61) NOT NULL,
  `No_Telepon` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`Id_Dokter`, `Nama_Dokter`, `Jenis_Kelamin`, `Spesialisasi`, `Alamat`, `No_Telepon`) VALUES
('Do_001', 'Yola', 'P', 'Penyakit Dalam', 'Cimahi', '089643122134'),
('Do_002', 'Fitri', 'P', 'Kulit', 'Tasikmalaya', '085794567841'),
('Do_003', 'Irfan', 'P', 'THT', 'Bandung', '085712347777'),
('Do_004', 'Hitness', 'L', 'Gigi', 'Subang', '082122379821'),
('Do_005', 'RIfqi', 'L', 'Gigi', 'Majalengka', '085744221321'),
('Do_006', 'Rita      Prameswari   Nanda', 'P', 'penyakit dalam', 'Cimahi', '0856445533'),
('Do_007', '', 'P', 'penyakit dalam', 'Cimahi', '0856445533');

--
-- Triggers `dokter`
--
DELIMITER $$
CREATE TRIGGER `dokter_phone_before_insert` BEFORE INSERT ON `dokter` FOR EACH ROW BEGIN
CALL check_phone_number(new.No_Telepon);
CALL check_orang(new.Nama_Dokter, new.Jenis_Kelamin, new.Alamat);
CALL check_nama_lain(new.Spesialisasi);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `dokter_phone_before_update` BEFORE UPDATE ON `dokter` FOR EACH ROW BEGIN
CALL check_phone_number(new.No_Telepon);
CALL check_orang(new.Nama_Dokter, new.Jenis_Kelamin, new.Alamat);
CALL check_nama_lain(new.Spesialisasi);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `huni`
--

CREATE TABLE `huni` (
  `Id_Huni` char(10) NOT NULL,
  `Id_Pasien` char(10) NOT NULL,
  `Id_Kamar` char(10) NOT NULL,
  `Tgl_Masuk` date NOT NULL,
  `Tgl_Keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `huni`
--

INSERT INTO `huni` (`Id_Huni`, `Id_Pasien`, `Id_Kamar`, `Tgl_Masuk`, `Tgl_Keluar`) VALUES
('Hu_001', 'Pa_001', 'Ka_001', '2018-10-01', '2018-10-04'),
('Hu_002', 'Pa_002', 'Ka_002', '2018-10-02', '2018-10-05'),
('Hu_003', 'Pa_002', 'Ka_002', '2018-10-22', '2018-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `Id_Kamar` char(10) NOT NULL,
  `Nama_Kamar` char(21) NOT NULL,
  `Jenis_Kamar` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`Id_Kamar`, `Nama_Kamar`, `Jenis_Kamar`) VALUES
('Ka_001', 'Bunga', 'VVIP'),
('Ka_002', 'Daun', 'VIP'),
('Ka_003', 'Mawar', 'VIP');

--
-- Triggers `kamar`
--
DELIMITER $$
CREATE TRIGGER `check_domain_integrity_before_insert_kamar` BEFORE INSERT ON `kamar` FOR EACH ROW BEGIN
CALL check_nama_lain(new.Nama_Kamar);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_domain_integrity_before_update_kamar` BEFORE UPDATE ON `kamar` FOR EACH ROW BEGIN
CALL check_nama_lain(new.Nama_Kamar);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `Id_Obat` char(10) NOT NULL,
  `Nama_Obat` char(21) NOT NULL,
  `Jenis_Obat` char(21) NOT NULL,
  `Masa_Berlaku` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`Id_Obat`, `Nama_Obat`, `Jenis_Obat`, `Masa_Berlaku`) VALUES
('Ob_001', 'Paracetamol', 'Tablet', '2018-10-26'),
('Ob_002', 'Cetirizine', 'Sirup', '2018-10-27');

--
-- Triggers `obat`
--
DELIMITER $$
CREATE TRIGGER `check_domain_integrity_before_insert` BEFORE INSERT ON `obat` FOR EACH ROW BEGIN
CALL check_nama_lain(new.Nama_Obat);
CALL check_nama_lain(new.Jenis_Obat);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_domain_integrity_before_update` BEFORE UPDATE ON `obat` FOR EACH ROW BEGIN
CALL check_nama_lain(new.Nama_Obat);
CALL check_nama_lain(new.Jenis_Obat);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `Id_Pasien` char(10) NOT NULL,
  `Nama_Pasien` char(41) NOT NULL,
  `Umur_Pasien` tinyint(3) UNSIGNED NOT NULL,
  `Jenis_Kelamin` char(2) NOT NULL,
  `Alamat` char(61) NOT NULL,
  `No_Telepon` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`Id_Pasien`, `Nama_Pasien`, `Umur_Pasien`, `Jenis_Kelamin`, `Alamat`, `No_Telepon`) VALUES
('Pa_001', 'Sriyanto', 70, 'L', 'Cimahi', '089648539854'),
('Pa_002', 'Sriyanti', 90, 'P', 'Bandung', '085745829875'),
('Pa_003', 'Sripurnama', 50, 'P', 'Bandung', '0857123431232'),
('Pa_004', 'Sripurnama', 40, 'P', 'Bandung', '0123456789123'),
('Pa_005', 'Trimaya', 30, 'P', 'Cimahi', '0123456789123'),
('Pa_006', 'Sripurnama', 20, 'P', 'Bandung', '0123321311111'),
('Pa_007', 'Maman', 60, 'L', 'Bandung', '0857123412341');

--
-- Triggers `pasien`
--
DELIMITER $$
CREATE TRIGGER `pasien_phone_before_insert` BEFORE INSERT ON `pasien` FOR EACH ROW BEGIN
CALL check_phone_number(new.No_Telepon);
CALL check_orang(new.Nama_Pasien, new.Jenis_Kelamin, new.Alamat);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pasien_phone_before_update` BEFORE UPDATE ON `pasien` FOR EACH ROW BEGIN
CALL check_phone_number(new.No_Telepon);
CALL check_orang(new.Nama_Pasien, new.Jenis_Kelamin, new.Alamat);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `perawat`
--

CREATE TABLE `perawat` (
  `Id_Perawat` char(10) NOT NULL,
  `Nama_Perawat` char(41) NOT NULL,
  `Jenis_Kelamin` char(2) NOT NULL,
  `Alamat` char(61) NOT NULL,
  `No_Telepon` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `perawat`
--

INSERT INTO `perawat` (`Id_Perawat`, `Nama_Perawat`, `Jenis_Kelamin`, `Alamat`, `No_Telepon`) VALUES
('Pe_001', 'Hitnes', 'L', 'Subang', '0865262'),
('Pe_002', 'Irfan', 'L', 'Bandung', '0938733'),
('Pe_003', 'Fitri', 'P', 'Cimahi', '01234567891'),
('Pe_005', 'Pe_005', 'P', 'Cimahi', '085788889999');

--
-- Triggers `perawat`
--
DELIMITER $$
CREATE TRIGGER `perawat_phone_before_insert` BEFORE INSERT ON `perawat` FOR EACH ROW BEGIN
CALL check_phone_number(new.No_Telepon);
CALL check_orang(new.Nama_Perawat, new.Jenis_Kelamin, new.Alamat);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `perawat_phone_before_update` BEFORE UPDATE ON `perawat` FOR EACH ROW BEGIN
CALL check_phone_number(new.No_Telepon);
CALL check_orang(new.Nama_Perawat, new.Jenis_Kelamin, new.Alamat);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `periksa`
--

CREATE TABLE `periksa` (
  `Id_Periksa` char(10) NOT NULL,
  `Id_Pasien` char(10) NOT NULL,
  `Id_Dokter` char(10) NOT NULL,
  `Jam_Periksa` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periksa`
--

INSERT INTO `periksa` (`Id_Periksa`, `Id_Pasien`, `Id_Dokter`, `Jam_Periksa`) VALUES
('P_001', 'Pa_001', 'Do_002', '17:30:00'),
('P_002', 'Pa_002', 'Do_001', '15:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `rawat`
--

CREATE TABLE `rawat` (
  `Id_Inap` char(10) NOT NULL,
  `Id_Pasien` char(10) NOT NULL,
  `Id_Kamar` char(10) NOT NULL,
  `Id_Perawat` char(10) NOT NULL,
  `Tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rawat`
--

INSERT INTO `rawat` (`Id_Inap`, `Id_Pasien`, `Id_Kamar`, `Id_Perawat`, `Tanggal_masuk`) VALUES
('I_001', 'Pa_001', 'Ka_001', 'Pe_001', '2018-10-09'),
('I_002', 'Pa_002', 'Ka_002', 'Pe_002', '2018-10-02');

-- --------------------------------------------------------

--
-- Table structure for table `tentukan`
--

CREATE TABLE `tentukan` (
  `Id_Tentukan` char(10) NOT NULL,
  `Id_Dokter` char(10) DEFAULT NULL,
  `Id_Obat` char(10) NOT NULL,
  `Diagnosa` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tentukan`
--

INSERT INTO `tentukan` (`Id_Tentukan`, `Id_Dokter`, `Id_Obat`, `Diagnosa`) VALUES
('Te_001', 'Do_001', 'Ob_001', 'Meningithis'),
('Te_002', 'Do_002', 'Ob_002', 'Eksim');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `Id_Transaksi` smallint(5) UNSIGNED ZEROFILL NOT NULL,
  `Nama` char(41) NOT NULL,
  `Jenis_Kelamin` char(1) NOT NULL,
  `Alamat` char(61) NOT NULL,
  `No_Telepon` char(15) NOT NULL,
  `Paket` char(21) NOT NULL,
  `Jumlah_Pemesanan` tinyint(8) NOT NULL,
  `Tanggal_Pemesanan` date NOT NULL,
  `Total_Bayar` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`Id_Transaksi`, `Nama`, `Jenis_Kelamin`, `Alamat`, `No_Telepon`, `Paket`, `Jumlah_Pemesanan`, `Tanggal_Pemesanan`, `Total_Bayar`) VALUES
(00001, 'Irfan', 'L', 'Jl. Anggrek No. 10 Rt: 10 Rw: 08 Kel. Sudrajat Kec. Ngurahra', '085784759922', 'Bronze', 1, '2018-10-22', 250000),
(00002, 'Hitness', 'L', 'Jl. Mawar No. 105 Rt: 08 Rw: 4 Kel. Sumenah Kec. Jarapat Ban', '085721456982', 'Silver', 1, '2018-10-22', 500000),
(00003, 'Ghina', 'P', 'Jl. Teratai No. 89 Rt: 07 Rw: 09 Kel. Dejavu Kec. Marsinah B', '089674588842', 'Bronze', 2, '2018-10-22', 500000),
(00004, 'Sigit', 'L', 'Jl. Bulan No. 45 Rt: 03 Rw: 04 Kel. Unjabar Kec. Merpati Ban', '085237444912', 'Silver', 2, '2018-10-22', 1000000),
(00005, 'Sigit', 'L', 'Jl. Bulan No. 45 Rt: 03 Rw: 04 Kel. Unjabar Kec. Merpati Ban', '085237444912', 'Silver', 2, '2018-10-22', 1000000),
(00006, 'Supratman', 'L', 'Jl. Cendana No. 10', '089677456785', 'Silver', 2, '2018-10-22', 1000000),
(00007, 'Supratman', 'L', 'Jl. Cendana No. 10', '089677456785', 'Silver', 2, '2018-10-22', 1000000),
(00008, 'Rasyid', 'L', 'Jl. Bakung No. 5', '085712344621', 'Silver', 1, '2018-10-23', 500000),
(00009, 'Rasyid', 'L', 'Jl. Bakung No. 5', '085712344621', 'Silver', 1, '2018-10-23', 500000),
(00010, 'Agus Cahyono', 'L', 'Jl. Pajajaran No. 100 RT: 08 RW: 09', '085712344673', 'Silver', 1, '2018-10-23', 500000),
(00011, 'Agus Cahyono', 'L', 'Jl. Pajajaran No. 100 RT: 08 RW: 09', '085712344673', 'Silver', 1, '2018-10-23', 500000),
(00012, 'Agus Cahyono', 'L', 'Jl. Pajajaran No. 100 RT: 08 RW: 09', '085712344673', 'Silver', 1, '2018-10-23', 500000),
(00013, 'Agus Cahyono', 'L', 'Jl. Pajajaran No. 100 RT: 08 RW: 09', '085712344621', 'Bronze', 1, '2018-10-23', 250000),
(00014, 'Agus Cahyono', 'L', 'Jl. Pajajaran No. 100 RT: 08 RW: 09', '085712344621', 'Bronze', 1, '2018-10-23', 250000),
(00015, 'Agus Cahyono', 'L', 'Jl. Pajajaran No. 100 RT: 08 RW: 09', '085712344621', 'Bronze', 1, '2018-10-23', 250000),
(00016, 'Agus Cahyono', 'L', 'Jl. Pajajaran No. 100 RT: 08 RW: 09', '085712344621', 'Bronze', 1, '2018-10-23', 250000),
(00017, 'Agus Cahyono', 'L', 'Jl. Pajajaran No. 100 RT: 08 RW: 09', '085712344621', 'Bronze', 1, '2018-10-23', 250000),
(00018, 'Agus Cahyono', 'L', 'Jl. Pajajaran No. 100 RT: 08 RW: 09', '085712344621', 'Bronze', 1, '2018-10-23', 250000),
(00019, 'Agus Cahyono', 'L', 'Jl. Pajajaran No. 100 RT: 08 RW: 09', '085712344621', 'Bronze', 1, '2018-10-23', 250000),
(00020, 'Bella', 'P', 'Jl. Halauan Timur No. 10', '08974599', 'Silver', 1, '2018-10-24', 500000);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `check_phone_before_insert_transaksi` BEFORE INSERT ON `transaksi` FOR EACH ROW BEGIN
SET new.No_Telepon = TRIM(new.No_Telepon);
SET new.Nama = TRIM(new.Nama);
SET new.Alamat = TRIM(new.Alamat);
SET new.Paket = TRIM(new.Paket);

CALL check_phone_number(new.No_Telepon);
CALL check_orang(new.Nama, new.Jenis_Kelamin, new.Alamat);
CALL check_nama_lain(new.Paket);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `check_phone_before_update_transaksi` BEFORE UPDATE ON `transaksi` FOR EACH ROW BEGIN
SET new.No_Telepon = TRIM(new.No_Telepon);
SET new.Nama = TRIM(new.Nama);
SET new.Alamat = TRIM(new.Alamat);
SET new.Paket = TRIM(new.Paket);

CALL check_phone_number(new.No_Telepon);
CALL check_orang(new.Nama, new.Jenis_Kelamin, new.Alamat);
CALL check_nama_lain(new.Paket);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id_User` char(10) NOT NULL,
  `Nama` char(30) NOT NULL,
  `Jenis_Kelamin` char(1) NOT NULL,
  `Alamat` char(60) NOT NULL,
  `No_Hp` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`Id_Dokter`) USING BTREE;

--
-- Indexes for table `huni`
--
ALTER TABLE `huni`
  ADD PRIMARY KEY (`Id_Huni`) USING BTREE,
  ADD KEY `fk_huni_pasien_1` (`Id_Pasien`),
  ADD KEY `fk_huni_kamar_2` (`Id_Kamar`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`Id_Kamar`) USING BTREE;

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`Id_Obat`) USING BTREE;

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`Id_Pasien`) USING BTREE;

--
-- Indexes for table `perawat`
--
ALTER TABLE `perawat`
  ADD PRIMARY KEY (`Id_Perawat`) USING BTREE;

--
-- Indexes for table `periksa`
--
ALTER TABLE `periksa`
  ADD PRIMARY KEY (`Id_Periksa`) USING BTREE,
  ADD KEY `fk_periksa_pasien_1` (`Id_Pasien`),
  ADD KEY `fk_periksa_dokter_2` (`Id_Dokter`);

--
-- Indexes for table `rawat`
--
ALTER TABLE `rawat`
  ADD PRIMARY KEY (`Id_Inap`) USING BTREE,
  ADD KEY `fk_rawat_pasien_1` (`Id_Pasien`),
  ADD KEY `fk_rawat_kamar_2` (`Id_Kamar`),
  ADD KEY `fk_rawat_perawat_3` (`Id_Perawat`);

--
-- Indexes for table `tentukan`
--
ALTER TABLE `tentukan`
  ADD PRIMARY KEY (`Id_Tentukan`) USING BTREE,
  ADD KEY `fk_tentukan_dokter_1` (`Id_Dokter`),
  ADD KEY `fk_tentukan_obat_2` (`Id_Obat`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`Id_Transaksi`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `Id_Transaksi` smallint(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `huni`
--
ALTER TABLE `huni`
  ADD CONSTRAINT `fk_huni_kamar_2` FOREIGN KEY (`Id_Kamar`) REFERENCES `kamar` (`Id_Kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_huni_pasien_1` FOREIGN KEY (`Id_Pasien`) REFERENCES `pasien` (`Id_Pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `periksa`
--
ALTER TABLE `periksa`
  ADD CONSTRAINT `fk_periksa_dokter_2` FOREIGN KEY (`Id_Dokter`) REFERENCES `dokter` (`Id_Dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_periksa_pasien_1` FOREIGN KEY (`Id_Pasien`) REFERENCES `pasien` (`Id_Pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rawat`
--
ALTER TABLE `rawat`
  ADD CONSTRAINT `fk_rawat_kamar_2` FOREIGN KEY (`Id_Kamar`) REFERENCES `kamar` (`Id_Kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rawat_pasien_1` FOREIGN KEY (`Id_Pasien`) REFERENCES `pasien` (`Id_Pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rawat_perawat_3` FOREIGN KEY (`Id_Perawat`) REFERENCES `perawat` (`Id_Perawat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tentukan`
--
ALTER TABLE `tentukan`
  ADD CONSTRAINT `fk_tentukan_dokter_1` FOREIGN KEY (`Id_Dokter`) REFERENCES `dokter` (`Id_Dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tentukan_obat_2` FOREIGN KEY (`Id_Obat`) REFERENCES `obat` (`Id_Obat`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
