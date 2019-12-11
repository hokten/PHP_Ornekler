-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3307
-- Üretim Zamanı: 04 Ara 2019, 08:57:20
-- Sunucu sürümü: 10.3.9-MariaDB
-- PHP Sürümü: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `veritabani`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenciler`
--

DROP TABLE IF EXISTS `ogrenciler`;
CREATE TABLE IF NOT EXISTS `ogrenciler` (
  `ogrenci_id` int(11) NOT NULL AUTO_INCREMENT,
  `ohrenci_numarasi` int(11) NOT NULL,
  `ad` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `soyad` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  `programi` int(11) NOT NULL,
  PRIMARY KEY (`ogrenci_id`),
  UNIQUE KEY `ohrenci_numarasi` (`ohrenci_numarasi`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ogrenciler`
--

INSERT INTO `ogrenciler` (`ogrenci_id`, `ohrenci_numarasi`, `ad`, `soyad`, `programi`) VALUES
(1, 123, 'Ali', 'Veli', 1),
(2, 124, 'Zeynep', 'ŞAHİN', 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `programlar`
--

DROP TABLE IF EXISTS `programlar`;
CREATE TABLE IF NOT EXISTS `programlar` (
  `program_id` int(11) NOT NULL AUTO_INCREMENT,
  `program_adi` varchar(500) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`program_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `programlar`
--

INSERT INTO `programlar` (`program_id`, `program_adi`) VALUES
(1, 'Bilgisayar Programcılığı'),
(2, 'İnşaat Teknolojileri'),
(3, 'Elektrik Teknolojisi'),
(4, 'Makine Teknolojisi');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
