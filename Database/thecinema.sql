-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 18, 2020 alle 16:00
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.5

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
-- Struttura della tabella `acquistabiglietto`
--

CREATE TABLE `acquistabiglietto` (
  `codTransazione` int(11) NOT NULL,
  `oraAcquisto` time DEFAULT NULL,
  `dataAcquisto` date DEFAULT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idProiezione` int(11) DEFAULT NULL,
  `id_posto` int(11) DEFAULT NULL,
  `QRCode` varchar(128) DEFAULT NULL,
  `randomString` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `fila`
--

CREATE TABLE `fila` (
  `fila` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `fila`
--

INSERT INTO `fila` (`fila`) VALUES
('A'),
('B');

-- --------------------------------------------------------

--
-- Struttura della tabella `film`
--

CREATE TABLE `film` (
  `codiceFilm` int(11) NOT NULL,
  `nome` varchar(32) DEFAULT NULL,
  `dataInizioProiezione` date DEFAULT NULL,
  `dataFineProiezione` date DEFAULT NULL,
  `durata` time DEFAULT NULL,
  `foto` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `film`
--

INSERT INTO `film` (`codiceFilm`, `nome`, `dataInizioProiezione`, `dataFineProiezione`, `durata`, `foto`) VALUES
(1, 'Forrest Gump', '2020-05-18', '2020-05-22', '02:00:00', 'fg.jpg'),
(2, 'Endgame', '2020-05-18', '2020-05-22', '02:00:00', 'endgame.jpeg'),
(8, 'Tolo Tolo', '2020-05-18', '2020-11-21', '02:00:00', 'to.jpg'),
(9, 'Inception', '2020-05-18', '2020-12-18', '02:00:00', 'in.jpg'),
(10, 'Catch me if you can', '2020-05-18', '2020-11-18', '02:00:00', 'ca.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `posto`
--

CREATE TABLE `posto` (
  `id` int(11) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `fila` char(1) DEFAULT NULL,
  `disabile` enum('si','no') DEFAULT NULL,
  `idSala` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `posto`
--

INSERT INTO `posto` (`id`, `numero`, `fila`, `disabile`, `idSala`) VALUES
(1, 1, 'A', 'no', 1),
(2, 2, 'A', 'no', 1),
(3, 3, 'A', 'no', 1),
(4, 1, 'B', 'no', 1),
(5, 2, 'B', 'no', 1),
(6, 3, 'B', 'no', 1),
(7, 4, 'A', 'no', 1),
(8, 4, 'B', 'no', 1),
(9, 1, 'A', 'no', 2),
(10, 2, 'A', 'no', 2),
(11, 3, 'A', 'no', 2),
(12, 2, 'B', 'no', 2),
(13, 3, 'B', 'no', 2),
(14, 4, 'A', 'no', 2),
(15, 4, 'B', 'no', 2),
(18, 1, 'B', 'no', 2);

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
(1, 1, 8, '2020-05-18', '12:00:00'),
(9, 1, 1, '2020-05-18', '20:00:00'),
(10, 2, 2, '2020-05-18', '21:00:00'),
(11, 2, 9, '2020-05-18', '24:00:00'),
(13, 1, 10, '2020-05-18', '18:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `qualitaSchermo` varchar(32) DEFAULT NULL,
  `costoIntero` decimal(4,2) DEFAULT NULL,
  `costoRidottoU6` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `sala`
--

INSERT INTO `sala` (`id`, `qualitaSchermo`, `costoIntero`, `costoRidottoU6`) VALUES
(1, NULL, '10.00', '8.00'),
(2, NULL, '8.00', '5.00');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `idUtente` int(11) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `mail` varchar(32) DEFAULT NULL,
  `psw` varchar(32) DEFAULT NULL,
  `dataNascita` date DEFAULT NULL,
  `punti` int(11) DEFAULT NULL,
  `ultimoAccesso` varchar(32) DEFAULT NULL,
  `privilegi` varchar(32) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`idUtente`, `username`, `mail`, `psw`, `dataNascita`, `punti`, `ultimoAccesso`, `privilegi`) VALUES
(1, 'f@gmail.com', 'f@gmail.com', 'f@gmail.com', '2001-03-10', NULL, '03:45:34pm', 'admin'),
(2, 'giack@gmail.com', 'giack@gmail.com', 'giack@gmail.com', '2001-04-04', 0, '07:46:20pm', 'user'),
(8, 'a@gmail.com', 'a@gmail.com', 'a@gmail.com', '2001-04-11', 0, '03:14:46am', 'user');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `acquistabiglietto`
--
ALTER TABLE `acquistabiglietto`
  ADD PRIMARY KEY (`codTransazione`),
  ADD KEY `id_posto` (`id_posto`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idProiezione` (`idProiezione`);

--
-- Indici per le tabelle `fila`
--
ALTER TABLE `fila`
  ADD PRIMARY KEY (`fila`);

--
-- Indici per le tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`codiceFilm`);

--
-- Indici per le tabelle `posto`
--
ALTER TABLE `posto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idSala` (`idSala`),
  ADD KEY `fila` (`fila`);

--
-- Indici per le tabelle `proiezione`
--
ALTER TABLE `proiezione`
  ADD PRIMARY KEY (`idProiezione`),
  ADD KEY `idSala` (`idSala`),
  ADD KEY `codiceFilm` (`codiceFilm`);

--
-- Indici per le tabelle `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`idUtente`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `acquistabiglietto`
--
ALTER TABLE `acquistabiglietto`
  MODIFY `codTransazione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT per la tabella `film`
--
ALTER TABLE `film`
  MODIFY `codiceFilm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `posto`
--
ALTER TABLE `posto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT per la tabella `proiezione`
--
ALTER TABLE `proiezione`
  MODIFY `idProiezione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT per la tabella `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `idUtente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `acquistabiglietto`
--
ALTER TABLE `acquistabiglietto`
  ADD CONSTRAINT `acquistabiglietto_ibfk_1` FOREIGN KEY (`id_posto`) REFERENCES `posto` (`id`),
  ADD CONSTRAINT `acquistabiglietto_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `utente` (`idUtente`),
  ADD CONSTRAINT `acquistabiglietto_ibfk_3` FOREIGN KEY (`idProiezione`) REFERENCES `proiezione` (`idProiezione`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `posto`
--
ALTER TABLE `posto`
  ADD CONSTRAINT `posto_ibfk_1` FOREIGN KEY (`idSala`) REFERENCES `sala` (`id`),
  ADD CONSTRAINT `posto_ibfk_2` FOREIGN KEY (`fila`) REFERENCES `fila` (`fila`) ON DELETE CASCADE ON UPDATE CASCADE;

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
