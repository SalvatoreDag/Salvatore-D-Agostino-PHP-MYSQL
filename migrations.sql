-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Apr 23, 2023 alle 14:50
-- Versione del server: 8.0.30
-- Versione PHP: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `migrations`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `services_offered`
--

CREATE TABLE `services_offered` (
  `id` int NOT NULL,
  `Name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Time` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dump dei dati per la tabella `services_offered`
--

INSERT INTO `services_offered` (`id`, `Name`, `Time`) VALUES
(2, 'Tv Bonus', 20),
(3, 'Money Bonus', 10),
(4, 'Cars Bonus', 10),
(5, 'Social Bonus', 5),
(25, 'Babysitter Bonus', 10),
(26, 'Solar Bonus', 10);

-- --------------------------------------------------------

--
-- Struttura della tabella `services_provided`
--

CREATE TABLE `services_provided` (
  `id` int NOT NULL,
  `Date` date NOT NULL,
  `Title` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dump dei dati per la tabella `services_provided`
--

INSERT INTO `services_provided` (`id`, `Date`, `Title`, `Quantity`) VALUES
(15, '2023-04-23', 'Cars Bonus', 10),
(16, '2023-04-23', 'Money Bonus', 21),
(17, '2023-04-23', 'Tv Bonus', 8),
(18, '2023-04-23', 'Babysitter Bonus', 5),
(19, '2023-04-23', 'Solar Bonus', 5),
(20, '2023-04-23', 'Social Bonus', 13);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `services_offered`
--
ALTER TABLE `services_offered`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `services_provided`
--
ALTER TABLE `services_provided`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `services_offered`
--
ALTER TABLE `services_offered`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT per la tabella `services_provided`
--
ALTER TABLE `services_provided`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
