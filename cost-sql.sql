-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Ápr 19. 18:02
-- Kiszolgáló verziója: 10.4.17-MariaDB
-- PHP verzió: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `cost`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `expenses`
--

CREATE TABLE `expenses` (
  `ID` int(11) NOT NULL,
  `id_person` int(11) NOT NULL,
  `id_expenses_category` int(11) NOT NULL,
  `details` varchar(255) DEFAULT NULL,
  `date` datetime NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `expense_category`
--

CREATE TABLE `expense_category` (
  `ID` int(11) NOT NULL,
  `expenses_category_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `house_manage`
--

CREATE TABLE `house_manage` (
  `ID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Expenses_id` int(11) NOT NULL,
  `Wish_id` int(11) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Date` datetime NOT NULL,
  `PersonID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `login`
--

CREATE TABLE `login` (
  `ID` int(11) NOT NULL,
  `LoginID` int(11) NOT NULL,
  `IP` varchar(15) NOT NULL,
  `Browser` varchar(20) NOT NULL,
  `Time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `person`
--

CREATE TABLE `person` (
  `ID` int(11) NOT NULL,
  `name` varchar(80) DEFAULT NULL,
  `lname` varchar(80) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `address` varchar(120) DEFAULT NULL,
  `pass` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `hash` varchar(1000) DEFAULT NULL,
  `verification` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- A tábla adatainak kiíratása `person`
--

INSERT INTO `person` (`ID`, `name`, `lname`, `phone`, `address`, `pass`, `email`, `hash`, `verification`) VALUES
(1, 'Jacint', 'Juhasz', '0621693382', NULL, NULL, NULL, NULL, NULL),
(2, 'Jacint', 'Juhasz', '0621693382', 'Bolmanska 24', 'asd', 'jacint9876543210@gmail.com', NULL, NULL),
(3, 'Jacint', 'Juhasz', '0621693382', 'Bolmanska 24', '7815696ecbf1c96e6894b779456d330e', 'asd@gmail.com', NULL, NULL),
(4, 'asd', 'Juhaszasd', '0621693382', 'Bolmanska 24', '7815696ecbf1c96e6894b779456d330e', 'asd@asd.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `wish`
--

CREATE TABLE `wish` (
  `ID` int(11) NOT NULL,
  `id_person` int(11) NOT NULL,
  `wish_name` varchar(255) NOT NULL,
  `wish_category` varchar(500) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `house_manage`
--
ALTER TABLE `house_manage`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `PersonID` (`PersonID`),
  ADD KEY `Expenses_id` (`Expenses_id`);

--
-- A tábla indexei `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `LoginID` (`LoginID`);

--
-- A tábla indexei `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`ID`);

--
-- A tábla indexei `wish`
--
ALTER TABLE `wish`
  ADD PRIMARY KEY (`ID`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `expenses`
--
ALTER TABLE `expenses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `house_manage`
--
ALTER TABLE `house_manage`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `person`
--
ALTER TABLE `person`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT a táblához `wish`
--
ALTER TABLE `wish`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `house_manage`
--
ALTER TABLE `house_manage`
  ADD CONSTRAINT `House_manage_ibfk_1` FOREIGN KEY (`PersonID`) REFERENCES `person` (`ID`),
  ADD CONSTRAINT `House_manage_ibfk_2` FOREIGN KEY (`Expenses_id`) REFERENCES `expenses` (`ID`);

--
-- Megkötések a táblához `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `Login_ibfk_1` FOREIGN KEY (`LoginID`) REFERENCES `person` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
