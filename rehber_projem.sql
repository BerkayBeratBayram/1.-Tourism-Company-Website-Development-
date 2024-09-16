-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Eyl 2024, 12:19:39
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `rehber_projem`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kisiler`
--

CREATE TABLE `kisiler` (
  `id` int(11) NOT NULL,
  `adi_soyadi` varchar(80) NOT NULL,
  `cinsiyet` varchar(80) NOT NULL,
  `eposta` varchar(80) NOT NULL,
  `telefon` varchar(80) NOT NULL,
  `durum` enum('Aktif','Pasif') NOT NULL,
  `kullanici_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kisiler`
--

INSERT INTO `kisiler` (`id`, `adi_soyadi`, `cinsiyet`, `eposta`, `telefon`, `durum`, `kullanici_id`) VALUES
(1, 'Atakan Bayram', 'erkek', 'atakanbayram@hotmail.com', '0530 318 48 74', 'Aktif', 1),
(2, 'Mehmet Bayram', 'erkek', 'mehmet@bcworks.tr', '0562 885 29 21', 'Aktif', 1),
(3, 'Brad Pitt', 'erkek', 'bradpitt@hotmail.com', '0562 625 32 69', 'Aktif', 2),
(4, 'Angelia Jolie', 'kadın', 'angelinajolie@gmail.com', '0532 252 652 62', 'Aktif', 2),
(5, 'Donald Trump', 'erkek', 'donaltrump@gmail.com', '0525 456 24 26', 'Aktif', 3),
(6, 'Joe Biden', 'erkek', 'joebiden@gmail.com', '0544 548 52 64', 'Aktif', 3);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanıcılar`
--

CREATE TABLE `kullanıcılar` (
  `id` int(11) NOT NULL,
  `adi_soyadi` varchar(100) NOT NULL,
  `eposta` varchar(100) NOT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `cinsiyet` enum('erkek','kadın','diğer') DEFAULT 'diğer',
  `durum` enum('aktif','pasif') DEFAULT 'aktif'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanıcılar`
--

INSERT INTO `kullanıcılar` (`id`, `adi_soyadi`, `eposta`, `telefon`, `cinsiyet`, `durum`) VALUES
(1, 'Müslüm Gürses', 'muslumbaba@hotmail.com', '0532 626 52 62', 'erkek', 'aktif'),
(2, 'Lana Del Rey', 'lanadelrey@hotmail.com', '0563 265 26 25', 'kadın', 'aktif'),
(3, 'Barack Obama', 'barackobama@hotmail.com', '0545 225 22 64', 'erkek', 'aktif');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `kisiler`
--
ALTER TABLE `kisiler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanıcılar`
--
ALTER TABLE `kullanıcılar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `eposta` (`eposta`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kisiler`
--
ALTER TABLE `kisiler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `kullanıcılar`
--
ALTER TABLE `kullanıcılar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
