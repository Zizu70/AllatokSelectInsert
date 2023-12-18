-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2023. Dec 14. 21:48
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `php_elso_dolgozat`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `allatok`
--

CREATE TABLE `allatok` (
  `Id` int(3) NOT NULL,
  `name` varchar(30) NOT NULL,
  `kind_of` varchar(30) NOT NULL,
  `gender` enum('male','famale','other') NOT NULL,
  `born` date NOT NULL,
  `age` int(10) NOT NULL,
  `live` enum('true','false') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `allatok`
--

INSERT INTO `allatok` (`Id`, `name`, `kind_of`, `gender`, `born`, `age`, `live`) VALUES
(1, 'Kockás', 'dog', 'famale', '1987-02-22', 36, 'false'),
(2, 'Harry', 'hamster', 'male', '2010-09-30', 13, 'false'),
(3, 'Picike', 'parrot', 'male', '2017-04-01', 6, 'false'),
(4, 'Gülszi', 'chameleon', 'male', '2020-01-03', 3, 'false'),
(5, 'Rozi', 'dog', 'other', '2012-05-01', 11, 'true'),
(6, 'Mau', 'cat', 'other', '2015-02-28', 8, 'true'),
(7, 'Betti', 'hen', 'famale', '1977-06-15', 46, 'false');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `allatok`
--
ALTER TABLE `allatok`
  ADD PRIMARY KEY (`Id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `allatok`
--
ALTER TABLE `allatok`
  MODIFY `Id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
