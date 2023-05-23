-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 23, 2023 alle 10:41
-- Versione del server: 10.4.6-MariaDB
-- Versione PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commercegale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `addresses`
--

CREATE TABLE `addresses` (
  `id_address` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `address` varchar(32) NOT NULL,
  `city` varchar(32) NOT NULL,
  `postal_code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `addresses`
--

INSERT INTO `addresses` (`id_address`, `id_user`, `address`, `city`, `postal_code`) VALUES
(3, 2, 'Via Fiammenghini', 'Cantù', 22063),
(4, 1, 'Via Rizzi', 'Milano', 22045);

-- --------------------------------------------------------

--
-- Struttura della tabella `articles`
--

CREATE TABLE `articles` (
  `id_article` int(11) NOT NULL,
  `price` float NOT NULL,
  `amount` int(11) NOT NULL,
  `average_stars` float NOT NULL,
  `id_category` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL DEFAULT 'https://www.ammotor.it/wp-content/uploads/2017/12/default_image_01-1024x1024-570x321.png	'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `articles`
--

INSERT INTO `articles` (`id_article`, `price`, `amount`, `average_stars`, `id_category`, `name`, `description`, `image`) VALUES
(1, 30, 10, 4.3, 1, 'Libro Freud', 'è un libro', 'images/freud.jpg'),
(2, 1299, 10, 4.7, 1, 'libro di svevo', 'é un libro', 'images/zeno.jpg'),
(3, 123, 30, 5, 1, 'Libro della storia', 'è un libro', 'images/chestoria.jpg'),
(4, 20, 100, 4.1, 1, 'libro dei bambini', 'é un libro dei bambini', 'images/librobambini.jpg'),
(10, 10999, 2, 5, 1, 'libro moto', 'è un libro sulle moto per il matte', 'images/enduro.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `carts`
--

CREATE TABLE `carts` (
  `id_cart` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `closed` tinyint(1) NOT NULL DEFAULT 0,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `carts`
--

INSERT INTO `carts` (`id_cart`, `date`, `closed`, `id_user`) VALUES
(4, '2022-04-19 14:44:39', 0, 2),
(5, '2022-04-19 17:37:23', 0, 1),
(6, '2023-05-23 08:41:34', 0, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `categories`
--

CREATE TABLE `categories` (
  `id_category` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `categories`
--

INSERT INTO `categories` (`id_category`, `name`) VALUES
(1, 'Accessori'),
(2, 'Console e Videogiochi'),
(5, 'Tv e Cinema'),
(6, 'Informatica'),
(7, 'Telefonia');

-- --------------------------------------------------------

--
-- Struttura della tabella `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(11) NOT NULL,
  `text` text DEFAULT NULL,
  `stars` enum('1','2','3','4','5') NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `contain`
--

CREATE TABLE `contain` (
  `id_contain` int(11) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `id_cart` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `contain`
--

INSERT INTO `contain` (`id_contain`, `amount`, `id_cart`, `id_article`) VALUES
(16, 2, 4, 2),
(20, 2, 6, 2),
(21, 1, 6, 4);

-- --------------------------------------------------------

--
-- Struttura della tabella `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `price` float DEFAULT NULL,
  `id_cart` int(11) NOT NULL,
  `id_address` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `mail` varchar(32) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `pass` char(32) DEFAULT NULL,
  `name` varchar(32) DEFAULT NULL,
  `surname` varchar(32) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `users`
--

INSERT INTO `users` (`id_user`, `mail`, `username`, `pass`, `name`, `surname`, `admin`) VALUES
(1, 'aleiod@gmail.com', 'L\'ale', '953b78c1829a540f237c46fafabc3080', 'alessandro', 'iodice', 0),
(2, 'mattebiancuz@gmail.com', 'IlMatte', 'd99285f9fb6524f243d9180df4c52e8a', 'Matteo', 'Bianchi', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id_address`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_article`),
  ADD KEY `id_category` (`id_category`);

--
-- Indici per le tabelle `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_user` (`id_user`);

--
-- Indici per le tabelle `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_category`);

--
-- Indici per le tabelle `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_article` (`id_article`);

--
-- Indici per le tabelle `contain`
--
ALTER TABLE `contain`
  ADD PRIMARY KEY (`id_contain`),
  ADD KEY `id_article` (`id_article`),
  ADD KEY `id_cart` (`id_cart`);

--
-- Indici per le tabelle `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_cart` (`id_cart`),
  ADD KEY `orders_ibfk_2` (`id_address`);

--
-- Indici per le tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id_address` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `articles`
--
ALTER TABLE `articles`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `carts`
--
ALTER TABLE `carts`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `categories`
--
ALTER TABLE `categories`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `comments`
--
ALTER TABLE `comments`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `contain`
--
ALTER TABLE `contain`
  MODIFY `id_contain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Limiti per la tabella `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id_category`);

--
-- Limiti per la tabella `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`);

--
-- Limiti per la tabella `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`);

--
-- Limiti per la tabella `contain`
--
ALTER TABLE `contain`
  ADD CONSTRAINT `contain_ibfk_1` FOREIGN KEY (`id_article`) REFERENCES `articles` (`id_article`),
  ADD CONSTRAINT `contain_ibfk_2` FOREIGN KEY (`id_cart`) REFERENCES `carts` (`id_cart`);

--
-- Limiti per la tabella `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_cart`) REFERENCES `carts` (`id_cart`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`id_address`) REFERENCES `addresses` (`id_address`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
