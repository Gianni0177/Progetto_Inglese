-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 12, 2024 alle 21:29
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

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
  `n_progressivo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `corso_utente`
--

INSERT INTO `corso_utente` (`username_utente`, `nome_corso`, `n_progressivo`) VALUES
('d.carraro', 'Modal Verbs', 15),
('d.carraro', 'Science of earth', 16),
('d.carraro', 'Android App Developer', 17);

-- --------------------------------------------------------

--
-- Struttura della tabella `lista_corsi`
--

CREATE TABLE `lista_corsi` (
  `nome` varchar(30) NOT NULL,
  `materia` varchar(20) NOT NULL,
  `grado` varchar(20) NOT NULL,
  `autore` varchar(30) NOT NULL,
  `data_inizio` date NOT NULL,
  `costo` double NOT NULL,
  `id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dump dei dati per la tabella `lista_corsi`
--

INSERT INTO `lista_corsi` (`nome`, `materia`, `grado`, `autore`, `data_inizio`, `costo`, `id`) VALUES
('Android App Developer', 'IT Technology', 'High school diploma', 'Gianni Nacu', '2023-02-20', 19.99, 0),
('Modal Verbs', 'English', 'High school diploma', 'Denise De Gobbi', '2024-03-08', 14.99, 1),
('Networks', 'IT Technology', 'High School Diploma', 'Davide Carraro', '2024-03-29', 14.99, 2),
('Science of earth', 'Science', 'Doctor of Philosophy', 'Maria Serafina Barbano', '2024-01-10', 15.99, 3),
('Electricity and Magnetism', 'Phisics', 'Doctor of Philosophy', 'Giacomo Artoni', '2023-11-05', 18.99, 4),
('Probability', 'Mathematics', 'High school diploma', 'Gabriele Morosinotto', '2023-03-07', 17.99, 5),
('Subnetting', 'Network', 'High school diploma', 'Davide Carraro', '2023-09-12', 21.99, 6),
('Dante', 'Litherature', 'High school diploma', 'Denise De Gobbi', '2023-04-25', 23.99, 7),
('II World War', 'History', 'Master\'s degree', 'Federico Giudica', '2024-04-03', 19.99, 8),
('C++', 'IT Technology', 'Master\'s degree', 'Andrea Bettanin', '2024-02-12', 17.99, 9),
('History of Alan Turing', 'English', 'Doctor of Philosophy', 'Alice Moio', '2023-11-13', 18.99, 10),
('English Literature Appreciatio', 'English', 'Master\'s degree', 'John Doe', '2023-12-20', 14.99, 11),
('Introduction to IT Security', 'IT Technology', 'High school diploma', 'Alice Smith', '2023-11-03', 12.99, 12),
('Advanced Physics Concepts', 'Physics', 'Doctor of Philosophy', 'Michael Johnson', '2024-02-02', 19.99, 13),
('Mathematics for Engineers', 'Mathematics', 'Master\'s degree', 'Emily Brown', '2023-08-20', 16.99, 14);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `id` int(11) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `ruolo` varchar(10) NOT NULL,
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

INSERT INTO `utente` (`id`, `username`, `ruolo`, `pwd`, `email`, `nome`, `cognome`, `nome_scuola`, `data_registrazione`) VALUES
(1, 'd.carraro', 'admin', 'newton', 'davidecarraro04@gmail.com', 'Davide', 'Carraro', 'Newton-Pertini', '2024-03-27'),
(2, 'd.degobbi', 'user', 'newton', 'degobbidenise22@gmail.com', 'Denise', 'De Gobbi', 'Newton-Pertini', '2024-03-27'),
(3, 'g.nacu', 'admin', 'newton', 'gianni.nacu.4055@gmail.com', 'Gianni', 'Mihai Nacu', 'Newton-Pertini', '2024-03-27'),
(4, 'g.morosinotto', 'user', 'newton', 'gabriele31012004@gmail.com', 'Gabriele', 'Morosinotto', 'Newton-Pertini', '2024-03-27');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `corso_utente`
--
ALTER TABLE `corso_utente`
  ADD PRIMARY KEY (`n_progressivo`);

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
-- AUTO_INCREMENT per la tabella `corso_utente`
--
ALTER TABLE `corso_utente`
  MODIFY `n_progressivo` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT per la tabella `utente`
--
ALTER TABLE `utente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
