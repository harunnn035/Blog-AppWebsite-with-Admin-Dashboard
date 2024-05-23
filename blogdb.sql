-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 May 2024, 13:00:47
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
-- Veritabanı: `blogdb`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`) VALUES
(5, 'qw', 'qw'),
(34, 'ewwqe', 'we');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category` enum('Discovery','Food','Science & Technology','Photography','Travel','Music','Sports','World','Wild Life','Now') NOT NULL,
  `is_featured` tinyint(1) DEFAULT 0,
  `image` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `posts`
--

INSERT INTO `posts` (`id`, `title`, `category`, `is_featured`, `image`, `comment`, `created_at`) VALUES
(84, 'Post1', 'Discovery', 1, 'uploads/_36323a0d-b169-491c-86e5-2b20c8b91d61.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam autem earum possimus iste vel et ipsum fugiat laborum, quam a! Magni hic corrupti quae nisi doloremque odit assumenda autem quos?', '2024-05-22 11:40:37'),
(88, 'Post2', 'Discovery', 0, 'uploads/_cf68cda3-ee21-44ad-a672-8a0462c7ee68.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nam autem earum possimus iste vel et ipsum fugiat laborum, quam a! Magni hic corrupti quae nisi doloremque odit assumenda autem quos?', '2024-05-22 11:46:32'),
(89, 'Post3', 'Discovery', 1, 'uploads/_fba41479-1444-48c8-ac8d-4e659726b0f8.jpg', 'Lorem ipsum, dolor sit amet consectetur adipisicin...', '2024-05-22 11:47:29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userNm` varchar(50) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rol` enum('Admin','Author','guest') NOT NULL DEFAULT 'Author',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_turkish_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`userId`, `userNm`, `pass`, `email`, `rol`, `created_at`) VALUES
(1, '13', '1', '1@1', 'Author', '2024-05-17 11:32:31'),
(2, '1', 'q', '3@3', 'Admin', '2024-05-17 11:32:31'),
(3, '2', '2', '2@22', 'Author', '2024-05-17 11:32:31'),
(4, '4', '4', '4@4', 'Admin', '2024-05-17 11:32:31');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userAd` (`userNm`),
  ADD UNIQUE KEY `unique_userNm` (`userNm`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Tablo için AUTO_INCREMENT değeri `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
