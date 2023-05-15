-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 15, 2023 alle 21:57
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
-- Database: `dbecommerce`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `id` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `categorie`
--

INSERT INTO `categorie` (`id`, `nome`) VALUES
(1, 'anello'),
(2, 'collana'),
(3, 'Bracciale'),
(4, 'orecchini');

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `id` int(11) NOT NULL,
  `id_utente` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini_prodotti`
--

CREATE TABLE `ordini_prodotti` (
  `id_ordine` int(11) NOT NULL,
  `id_prodotto` int(11) NOT NULL,
  `quantita` int(40) NOT NULL,
  `prezzo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

CREATE TABLE `prodotti` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prezzo` float NOT NULL,
  `immagine` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descrizione` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id`, `nome`, `prezzo`, `immagine`, `descrizione`, `id_categoria`) VALUES
(1, 'Anello Dell\'infinito', 99, 'Anello.png', 'Questo anello con l\'infinito è il simbolo perfetto dell\'amore eterno e della continuità senza fine. Realizzato con materiali di prima qualità e con un design elegante e contemporaneo, questo anello incarna la forza e la bellezza dell\'infinito. Perfetto come regalo per una persona speciale nella tua vita, questo anello rappresenta un\'impronta indelebile dell\'amore che non avrà mai fine. Fai sentire ancora di più il tuo amore e la tua devozione alla persona che ami con questo anello elegante e senza tempo.', 1),
(2, 'Bracciale Con Paperella', 30, 'Bracciale.png', 'Questo delizioso bracciale con paperella è l\'accessorio perfetto per aggiungere un tocco di dolcezza al tuo look. La paperella, realizzata con cura dai nostri artigiani, è realizzata in materiale morbido e resistente che si adatta perfettamente al polso. Il braccialetto, in tinta con la paperella, è realizzato con materiali di alta qualità, garantendo una lunga durata e una perfetta tenuta. Questo bracciale con paperella non solo aggiunge un tocco di colore al tuo outfit, ma è anche l\'accessorio perfetto per mostrare la tua dolcezza e il tuo amore per gli animali. È anche un\'ottima idea regalo per amici e familiari amanti degli animali o per i fan di tutto ciò che è kawaii. Acquista il tuo bracciale con paperella oggi e aggiungi un tocco di dolcezza al tuo outfit!', 3),
(3, 'Collana Paperella', 15, 'Collana.png', 'Questa bellissima collana a tema acquatico è l\'accessorio perfetto per chi ama il mare e gli animali che lo abitano. La sua protagonista è una simpatica paperella, realizzata in oro bianco e adornata da piccoli diamanti glitterati, che graziosamente si appoggia sul petto di chi la indossa. Il filo della collana è leggero ma robusto, ed è formato da un\'elegante catenina a maglia rolo d\'oro bianco 18 carati. Comoda e facile da indossare, questa collana è perfetta per tutti coloro che cercano un tocco di allegria e originalità per completare il proprio look. Non perdere l\'occasione di portare sempre con te il tuo animale preferito, e acquista subito questa incredibile collana con la paperella!', 2),
(4, 'Orecchini Paperella', 9, 'Orecchini.png', 'Questi orecchini a forma di paperelle sono l\'accessorio giocoso e divertente che non può mancare nel tuo look! Realizzati in lega di alta qualità placcata in oro rosa, questi orecchini sono adornati con piccole perle per dare un tocco di brillantezza. Le paperelle, quantomeno adorabili, si accoccolano dolcemente sul lobo dell\'orecchio, aggiungendo un tocco di fantasia e di allegria al tuo outfit. Sono perfetti da indossare tutti i giorni o per dare un tocco di originalità a un look più formale. Se vuoi distinguerti con stile e originalità, questi orecchini a forma di paperelle fanno al caso tuo!', 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `cognome` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `username` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `nome`, `cognome`, `email`, `password`, `username`) VALUES
(1, 'Gabriele', 'Galeandro', 'galegabry1@gmail.com', '6f98f6e5210f287dc739178d8cb2d27c', 'Gale'),
(2, 'emanuele', 'Galeandro', 'galegabry2@gmail.com', '3755bfa11545e790c84168cb4026a306', 'Ema'),
(3, 'Laura', 'Cembrani', 'lauracembrani72@libero.it', 'd64d64171558e1a98c6d00380aa387c6', 'Lalla');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_prodotto` (`id_prodotto`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_utente` (`id_utente`);

--
-- Indici per le tabelle `ordini_prodotti`
--
ALTER TABLE `ordini_prodotti`
  ADD KEY `id_ordine` (`id_ordine`),
  ADD KEY `id_prodotto` (`id_prodotto`);

--
-- Indici per le tabelle `prodotti`
--
ALTER TABLE `prodotti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `ordini`
--
ALTER TABLE `ordini`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id`),
  ADD CONSTRAINT `carrello_ibfk_2` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`id`);

--
-- Limiti per la tabella `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `ordini_ibfk_1` FOREIGN KEY (`id_utente`) REFERENCES `utenti` (`id`);

--
-- Limiti per la tabella `ordini_prodotti`
--
ALTER TABLE `ordini_prodotti`
  ADD CONSTRAINT `ordini_prodotti_ibfk_1` FOREIGN KEY (`id_ordine`) REFERENCES `ordini` (`id`),
  ADD CONSTRAINT `ordini_prodotti_ibfk_2` FOREIGN KEY (`id_prodotto`) REFERENCES `prodotti` (`id`);

--
-- Limiti per la tabella `prodotti`
--
ALTER TABLE `prodotti`
  ADD CONSTRAINT `prodotti_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
