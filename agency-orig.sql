-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2019. Jún 14. 17:26
-- Kiszolgáló verziója: 10.1.21-MariaDB
-- PHP verzió: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `agency`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `address`
--

CREATE TABLE `address` (
  `aid` int(10) NOT NULL,
  `uid` int(10) NOT NULL,
  `irsz` varchar(5) NOT NULL,
  `telepules` varchar(200) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `cim` varchar(200) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `address`
--

INSERT INTO `address` (`aid`, `uid`, `irsz`, `telepules`, `cim`) VALUES
(1, 0, '', '', ''),
(2, 0, '', '', ''),
(3, 0, '1165', 'Budapest', 'Géza u. 12'),
(4, 4, '1073', 'Budapest', 'Akácfa u. 15'),
(5, 5, '1021', 'Budapest', ''),
(6, 6, '1107', 'Budapest', 'Mázsa u. 9.'),
(14, 8, '2162', 'Budapest', 'Izé u. 4.');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `tips`
--

CREATE TABLE `tips` (
  `term_id` int(5) NOT NULL,
  `term_kod` varchar(100) CHARACTER SET latin1 NOT NULL,
  `term_nev` varchar(100) COLLATE utf8_hungarian_ci NOT NULL,
  `term_ar` varchar(10) CHARACTER SET latin1 NOT NULL,
  `term_fokat` varchar(100) CHARACTER SET latin1 NOT NULL,
  `term_alkat` varchar(100) CHARACTER SET latin1 NOT NULL,
  `term_jell` varchar(500) COLLATE utf8_hungarian_ci NOT NULL,
  `kepnev` varchar(100) CHARACTER SET latin1 NOT NULL,
  `status` varchar(10) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci ROW_FORMAT=COMPACT;

--
-- A tábla adatainak kiíratása `tips`
--

INSERT INTO `tips` (`term_id`, `term_kod`, `term_nev`, `term_ar`, `term_fokat`, `term_alkat`, `term_jell`, `kepnev`, `status`) VALUES
(1, '0001', 'Last minute train trip to London', '29 000', 'train', 'last_minute', 'Maecenas sed eleifend ex. Etiam pellentesque metus sed sem posuere, hendrerit consequat diam volutpat. Suspendisse potenti. Sed suscipit augue ipsum, id convallis metus sodales vitae. ', 'train-index.jpg', 'active'),
(2, '0002', 'Last minute train trip to Cambridge', '49 900', 'train', 'last_minute', 'Fusce a elementum quam, at mollis eros. Donec vel iaculis lorem. Phasellus gravida pellentesque tempor. Cras sapien nulla, interdum ac dignissim in, congue eu felis.', 'train-index.jpg', 'active'),
(3, '0003', 'Last minute plane trip to Cambridge', '4990', 'plane', 'last_minute', 'Praesent eget pharetra lectus. Suspendisse ultrices erat nec mauris sollicitudin, viverra viverra ex tempus. Morbi iaculis lobortis ante, sed ullamcorper purus auctor eu. ', 'plane-index.jpg', 'active'),
(4, '0004', 'First minute plane trip to Paris', '59 900', 'plane', 'first_minute', 'Nunc facilisis vehicula elit eget pharetra. Etiam pulvinar pharetra dolor. Donec est metus, cursus vitae eros sed, feugiat porta mi. Etiam imperdiet vitae tortor sit amet maximus. ', 'plane-index.jpg', 'active'),
(5, '0005', 'First minute cruise trip from Liverpool to Nice', '159 900', 'cruiser', 'first_minute', 'In semper ante vel lorem efficitur, non laoreet mi dictum. Donec ut quam et est gravida suscipit a et sapien. Integer efficitur velit ut magna volutpat, et interdum nulla dictum. Nullam eleifend lacus a gravida ullamcorper. Duis ultricies enim sit amet erat maximus, sed luctus neque viverra.', 'cruiser-index.jpg', 'active'),
(6, '0006', 'First minute cruise trip from Nice to Venice', '259 900', 'cruiser', 'first_minute', 'Donec bibendum placerat ultricies. Praesent vel metus vitae massa mattis imperdiet ut sit amet eros. Maecenas mi neque, dictum a blandit sit amet, bibendum eget lacus.', 'cruiser-index.jpg', 'active'),
(7, '0007', 'All-in cruise trip from Barcelona to New-York', '459 000', 'cruiser', 'all_in', 'Nunc facilisis vehicula elit eget pharetra. Etiam pulvinar pharetra dolor. Donec est metus, cursus vitae eros sed, feugiat porta mi. Etiam imperdiet vitae tortor sit amet maximus. Vivamus pharetra sapien pharetra justo ullamcorper, vitae consectetur lacus tempus. Cras at aliquet mauris, quis cursus erat. Vestibulum venenatis turpis a feugiat ornare. In placerat sed dolor et sagittis.', 'cruiser-index.jpg', 'active');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `uid` int(10) NOT NULL,
  `nev` varchar(100) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(80) NOT NULL,
  `pass` varchar(80) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`uid`, `nev`, `email`, `tel`, `pass`, `status`) VALUES
(1, 'Teszt Elek', 'tesztelek@tesztelek.com', '+361112221', '39e729dbbba063dc87ed00b227320b87a805d8f7', '0'),
(2, 'Mézga Géza', 'mezga.geza@mezga.com', '+361111111', '36f323140d6367c132768cd69fee4706448885fd', '1'),
(3, 'Doktor Bubó', 'doktor.bubo@gmail.com', '+3615055055', '6042c995326b97049118f5d10b29540c966c9ad3', '0'),
(4, 'Lolek Lolka', 'lolka.lolek@gmail.com', '+361234567', '4beaadf560b10a160d30b476d888d8886be06a3b', '0'),
(5, 'Proba Géza', 'proba.geza@proba.hu', '+361111222', '07fa4b200940b440dcee3147dc864649564f088e', '0'),
(6, 'Pável Tibor', 'pavel.tibor@valami.hu', '+36 1 888 9999', '896423f95929303ae8fe37f67316fb62a7b75a7a', '0'),
(8, 'Teszt Magdolna', 'teszt.magdi@valami.hu', '+36 30 888 8974', '5a18d056b9ab1e84da2a0b1a1eeefb607470973b', '0');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`aid`);

--
-- A tábla indexei `tips`
--
ALTER TABLE `tips`
  ADD PRIMARY KEY (`term_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `address`
--
ALTER TABLE `address`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT a táblához `tips`
--
ALTER TABLE `tips`
  MODIFY `term_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
