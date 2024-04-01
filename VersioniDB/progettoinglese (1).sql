-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 28, 2024 alle 17:19
-- Versione del server: 10.4.28-MariaDB
-- Versione PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `progettoinglese`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `corso_utente`
--

CREATE TABLE `corso_utente` (
  `username_utente` varchar(30) NOT NULL,
  `nome_corso` varchar(30) NOT NULL,
  `id_corso` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `lista_corsi`
--

CREATE TABLE `lista_corsi` (
  `nome` varchar(30) NOT NULL,
  `materia` varchar(20) NOT NULL,
  `grado` varchar(20) NOT NULL,
  `data_inizio` date NOT NULL,
  `id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `lista_corsi`
--

INSERT INTO `lista_corsi` (`nome`, `materia`, `grado`, `data_inizio`, `id`) VALUES
('Arduino', 'IT Technology', '2nd grade secondary ', '2023-11-20', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `pwd` varchar(12) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `cognome` varchar(30) DEFAULT NULL,
  `nome_scuola` varchar(30) DEFAULT NULL,
  `data_registrazione` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`id`, `username`, `pwd`, `email`, `nome`, `cognome`, `nome_scuola`, `data_registrazione`) VALUES
(1, 'd.carraro', 'newton', 'davidecarraro04@gmail.com', 'Davide', 'Carraro', 'Newton-Pertini', '2024-03-27'),
(2, 'd.degobbi', 'newton', 'degobbidenise22@gmail.com', 'Denise', 'De Gobbi', 'Newton-Pertini', '2024-03-27'),
(3, 'g.nacu', 'newton', 'gianni.nacu.4055@gmail.com', 'Gianni', 'Mihai Nacu', 'Newton-Pertini', '2024-03-27'),
(4, 'g.morosinotto', 'newton', 'gabriele31012004@gmail.com', 'Gabriele', 'Morosinotto', 'Newton-Pertini', '2024-03-27'),
(5, 'g.lamon', 'newton', 'glamon@si.it', 'Gianfranco', 'Lamon', 'NewtonPertini', NULL);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `lista_corsi`
--
ALTER TABLE `lista_corsi`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
