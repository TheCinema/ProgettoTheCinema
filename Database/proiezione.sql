-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 11, 2020 alle 00:22
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thecinema`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `proiezione`
--

CREATE TABLE `proiezione` (
  `idProiezione` int(11) NOT NULL,
  `idSala` int(11) DEFAULT NULL,
  `codiceFilm` int(11) DEFAULT NULL,
  `dataProiezione` date DEFAULT NULL,
  `orarioProiezione` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `proiezione`
--

INSERT INTO `proiezione` (`idProiezione`, `idSala`, `codiceFilm`, `dataProiezione`, `orarioProiezione`) VALUES
(4, 1, 1, '2020-04-15', '19:21:00'),
(5, 2, 1, '2020-04-15', '19:21:00'),
(7, 1, 3, '2020-04-15', '19:21:00');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `proiezione`
--
ALTER TABLE `proiezione`
  ADD PRIMARY KEY (`idProiezione`),
  ADD KEY `idSala` (`idSala`),
  ADD KEY `codiceFilm` (`codiceFilm`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `proiezione`
--
ALTER TABLE `proiezione`
  MODIFY `idProiezione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `proiezione`
--
ALTER TABLE `proiezione`
  ADD CONSTRAINT `proiezione_ibfk_1` FOREIGN KEY (`idSala`) REFERENCES `sala` (`id`),
  ADD CONSTRAINT `proiezione_ibfk_2` FOREIGN KEY (`codiceFilm`) REFERENCES `film` (`codiceFilm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
