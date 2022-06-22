-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 21 Haz 2022, 21:14:08
-- Sunucu sürümü: 10.3.22-MariaDB-log
-- PHP Sürümü: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `387144`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bagislar`
--

CREATE TABLE `bagislar` (
  `id` int(11) NOT NULL,
  `bagis_adi` varchar(40) NOT NULL,
  `bagis_tutar` varchar(40) NOT NULL,
  `kullanici_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `bagislar`
--

INSERT INTO `bagislar` (`id`, `bagis_adi`, `bagis_tutar`, `kullanici_id`) VALUES
(1, 'Fidan', '100', 2),
(2, 'Kurban', '1000', 2),
(3, 'Eğitim', '400', 2),
(4, 'Genel Bağış', '1000', 3),
(6, 'Zekat', '500', 3),
(7, 'Su Kuyusu', '500', 2),
(9, 'Eğitim', '500', 4);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `adSoyad` varchar(40) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `telNo` varchar(40) NOT NULL,
  `sifre` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `adSoyad`, `mail`, `telNo`, `sifre`) VALUES
(2, 'Rumeysa Şahin', 'r@gmail.com', '900000000000', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3'),
(3, 'Zeynep', 'zeze@gmail.com', '123456789123', 'b3a8e0e1f9ab1bfe3a36f231f676f78bb30a519d2b21e6c530c0eee8ebb4a5d0'),
(4, 'Ayşe', 'a@gmail.com', '905555555555', '3cfea47ac889ec6e714dddcf5b0ea1c0252d27bea557fc9c59b9d621aabf36a1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bagislar`
--
ALTER TABLE `bagislar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kullanici_id` (`kullanici_id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bagislar`
--
ALTER TABLE `bagislar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
