-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 03. Aug 2018 um 22:00
-- Server-Version: 5.6.35
-- PHP-Version: 7.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `mvc_db`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `holiday`
--

CREATE TABLE `holiday` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `holiday`
--

INSERT INTO `holiday` (`id`, `title`) VALUES
(1, 'Bodensee'),
(2, 'Namibia'),
(3, 'Toscana'),
(4, 'Florida');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `header` varchar(180) NOT NULL,
  `content` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `posts`
--

INSERT INTO `posts` (`id`, `header`, `content`, `timestamp`, `user_id`) VALUES
(1, 'This is the headline of the first post', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Laboriosam ea corporis sequi autem quas ad? Similique inventore adipisci ad voluptatem, voluptate alias dignissimos quisquam. Dolor, sequi, autem amet nemo consectetur impedit assumenda aperiam omnis officia adipisci voluptas in suscipit labore iure sit, aliquid nisi ullam rem illo maxime esse error.', '2018-08-02 15:18:19', 168),
(2, 'This is the headline of the second post', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic asperiores totam nemo facilis itaque optio alias vitae repellat voluptas enim.', '2018-08-02 15:18:19', 168),
(4, 'This is my new post', 'Hello I am a new post', '2018-08-02 15:44:28', 0),
(5, 'My new Post 3', 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Neque, quis aliquid placeat nulla, non quae ab nesciunt veniam iure porro, libero aliquam totam quaerat praesentium esse. Fugit velit unde qui, fugiat delectus praesentium veniam nemo?', '2018-08-02 16:35:45', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login_attempts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `login_attempts`) VALUES
(168, 'Daniel', 'Zeitler', 'dz@test.com', '$2y$10$LITt9slmgR6RVYmBRZlXzeNtuo3vJmo4mSBkj/ZCUxetOARx6x6gO', 0);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `holiday`
--
ALTER TABLE `holiday`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `holiday`
--
ALTER TABLE `holiday`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
