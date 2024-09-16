-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Eyl 2024, 12:25:07
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
-- Veritabanı: `atakan_turizm`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `biletler`
--

CREATE TABLE `biletler` (
  `id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `biletler`
--

INSERT INTO `biletler` (`id`, `bus_id`, `name`, `email`, `phone`, `purchase_date`) VALUES
(11, 1, 'asavsas', 'adasd@hotmail.com', '25424534', '2024-09-10 16:15:24'),
(12, 1, 'saSY', 'asAS@ccc', '868', '2024-09-10 16:15:46'),
(13, 1, 'Sas', 'ADASD@ADASD', 'ASDSDASD', '2024-09-10 16:16:51'),
(14, 1, 'Meryem Rana Türker', 'meryemrana@gmail.com', '0536 624 56 25', '2024-09-11 09:56:18'),
(15, 1, 'asdasd', 'adsad@gmail.com', '55555', '2024-09-12 09:45:45'),
(16, 1, 'Melih Yeyer', 'melihte@gmail.com', '242424', '2024-09-13 11:39:16'),
(17, 1, 'adasdsad', 'asdsd@gmail.com', '242423424', '2024-09-13 11:39:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `istatistikler`
--

CREATE TABLE `istatistikler` (
  `id` int(11) NOT NULL,
  `sefer_sayisi` int(11) NOT NULL,
  `otobus_sayisi` int(11) NOT NULL,
  `kayitli_kullanici_sayisi` int(11) NOT NULL,
  `aktif_kullanici_sayisi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `istatistikler`
--

INSERT INTO `istatistikler` (`id`, `sefer_sayisi`, `otobus_sayisi`, `kayitli_kullanici_sayisi`, `aktif_kullanici_sayisi`) VALUES
(1, 4, 4, 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `adi_soyadi` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefon` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `adi_soyadi`, `email`, `telefon`, `password`) VALUES
(1, 'Melih Yeter', 'melihyeter@gmail.com', '0536 621 25 26', '$2y$10$x//obGi/jeKgdWjFAPC8duP1GaAXPxXqCigISaCuxbqV2/xQYbqxO'),
(2, 'Berkay Berat Bayram', 'b.beratbayram@gmail.com', '0532 625 15 98', '$2y$10$7j0MjcVv/ohNjtMP9rZ3ueGfIA0oIg.X6OP95Ed6jno.T1FffHuN6');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `otobusler`
--

CREATE TABLE `otobusler` (
  `id` int(11) NOT NULL,
  `marka` varchar(50) NOT NULL,
  `plaka` varchar(10) NOT NULL,
  `sefer` varchar(100) NOT NULL,
  `tarih` datetime NOT NULL,
  `koltuk_sayisi` int(11) NOT NULL,
  `doluluk` int(11) NOT NULL,
  `kapasite` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `otobusler`
--

INSERT INTO `otobusler` (`id`, `marka`, `plaka`, `sefer`, `tarih`, `koltuk_sayisi`, `doluluk`, `kapasite`) VALUES
(1, 'Mercedes', '34 DRT 221', 'Esenler-Bolu', '2024-09-22 15:45:00', 46, 7, 45),
(2, 'BMW', '34 AEK 343', 'Esenler-Trabzon', '2024-09-24 12:45:00', 45, 34, 0),
(3, 'Dacia', '34 KWO 532', 'Alibeyköy-Ağrı', '2024-09-26 16:45:00', 44, 95, 0),
(4, 'Ford', '34 GSO 924', 'Alibeyköy-Muş', '2024-09-28 11:45:00', 43, 24, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tur_paketleri`
--

CREATE TABLE `tur_paketleri` (
  `id` int(11) NOT NULL,
  `tur_adi` varchar(255) NOT NULL,
  `tur_ucreti` decimal(10,2) NOT NULL,
  `kdv_ucreti` decimal(5,2) DEFAULT 9.30,
  `ek_ucretler` decimal(10,2) DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `tur_paketleri`
--

INSERT INTO `tur_paketleri` (`id`, `tur_adi`, `tur_ucreti`, `kdv_ucreti`, `ek_ucretler`, `total`) VALUES
(1, 'Kapadokya Turu', 300.00, 60.00, 40.00, 400.00),
(2, 'İstanbul Turu', 200.00, 50.00, 70.00, 320.00),
(3, 'Ege Kıyıları Turu', 150.00, 70.00, 30.00, 250.00),
(4, 'Paris Turu', 500.00, 50.00, 60.00, 610.00),
(5, 'Machi Picchu Turu', 450.00, 40.00, 60.00, 550.00),
(6, 'Venedik Turu', 600.00, 80.00, 20.00, 700.00);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `biletler`
--
ALTER TABLE `biletler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_id` (`bus_id`);

--
-- Tablo için indeksler `istatistikler`
--
ALTER TABLE `istatistikler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `otobusler`
--
ALTER TABLE `otobusler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `tur_paketleri`
--
ALTER TABLE `tur_paketleri`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `biletler`
--
ALTER TABLE `biletler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Tablo için AUTO_INCREMENT değeri `istatistikler`
--
ALTER TABLE `istatistikler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Tablo için AUTO_INCREMENT değeri `otobusler`
--
ALTER TABLE `otobusler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `tur_paketleri`
--
ALTER TABLE `tur_paketleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `biletler`
--
ALTER TABLE `biletler`
  ADD CONSTRAINT `biletler_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `otobusler` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
