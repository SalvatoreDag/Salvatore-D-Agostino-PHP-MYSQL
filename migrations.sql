-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Creato il: Mag 12, 2023 alle 14:16
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
(33, 'Pc Bonus', 15),
(34, 'Tv Bonus', 10),
(35, 'Money Bonus', 20),
(36, 'Car Bonus', 20);

-- --------------------------------------------------------

--
-- Struttura della tabella `services_provided`
--

CREATE TABLE `services_provided` (
  `id` int NOT NULL,
  `service_id` int NOT NULL,
  `Date` date NOT NULL,
  `Title` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Quantity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dump dei dati per la tabella `services_provided`
--

INSERT INTO `services_provided` (`id`, `service_id`, `Date`, `Title`, `Quantity`) VALUES
(1, 33, '2023-05-11', 'Pc Bonus', 10),
(2, 34, '2023-05-11', 'Tv Bonus', 10),
(3, 36, '2023-05-11', 'Car Bonus', 10),
(4, 35, '2023-05-11', 'Money Bonus', 10);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_service` (`service_id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `services_offered`
--
ALTER TABLE `services_offered`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT per la tabella `services_provided`
--
ALTER TABLE `services_provided`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `services_provided`
--
ALTER TABLE `services_provided`
  ADD CONSTRAINT `fk_service` FOREIGN KEY (`service_id`) REFERENCES `services_offered` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_services_offered` FOREIGN KEY (`service_id`) REFERENCES `services_offered` (`id`),
  ADD CONSTRAINT `services_provided` FOREIGN KEY (`service_id`) REFERENCES `services_offered` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_provided_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services_offered` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `services_provided_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services_offered` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
