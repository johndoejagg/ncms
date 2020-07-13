-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 13. Jul 2020 um 21:51
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `ncms`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE `category` (
  `ID` int(11) NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `sub` text COLLATE utf8_bin NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category_link`
--

CREATE TABLE `category_link` (
  `ID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL,
  `contentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `comment`
--

CREATE TABLE `comment` (
  `ID` int(11) NOT NULL,
  `title` text COLLATE utf8_bin NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `website` text COLLATE utf8_bin NOT NULL,
  `comment` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `published` tinyint(1) NOT NULL,
  `parent` int(11) NOT NULL,
  `contentID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `content`
--

CREATE TABLE `content` (
  `ID` int(11) NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `parent` int(11) NOT NULL,
  `content` text COLLATE utf8_bin NOT NULL,
  `type` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `orginalID` int(11) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `modfied_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `comments_allowed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `imageformat`
--

CREATE TABLE `imageformat` (
  `ID` int(11) NOT NULL,
  `name` text NOT NULL,
  `width` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `cropmode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `imageformat`
--

INSERT INTO `imageformat` (`ID`, `name`, `width`, `height`, `cropmode`) VALUES
(1, 'thump', 600, 600, 0),
(2, 'big', 2000, 2000, 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `name` text COLLATE utf8_bin NOT NULL,
  `password` text COLLATE utf8_bin NOT NULL,
  `email` text COLLATE utf8_bin NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`ID`, `name`, `password`, `email`, `role`) VALUES
(2, 'admin', '5f4dcc3b5aa765d61d8327deb882cf99', 'john.doe.jagg@gmail.com', 0),
(9, 'aut', 'ecb87f8a05d68fb475153aa881865f91', '', 2),
(10, 'mit', 'ecb87f8a05d68fb475153aa881865f91', '', 3),
(13, 'fol', 'ecb87f8a05d68fb475153aa881865f91', '', 4),
(14, 'red', 'ecb87f8a05d68fb475153aa881865f91', '', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `category_link`
--
ALTER TABLE `category_link`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `category`
--
ALTER TABLE `category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `category_link`
--
ALTER TABLE `category_link`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `content`
--
ALTER TABLE `content`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
