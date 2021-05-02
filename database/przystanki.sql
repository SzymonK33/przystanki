-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Maj 2021, 22:58
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `przystanki`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przystanki`
--

CREATE TABLE `przystanki` (
  `id` int(11) NOT NULL,
  `adresPrzystanku` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `identyfikator` int(11) NOT NULL,
  `zal1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zal2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zal3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `odczytano` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `przystanki`
--
ALTER TABLE `przystanki`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `przystanki`
--
ALTER TABLE `przystanki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=154;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
