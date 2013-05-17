-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 17 Maj 2013, 22:33
-- Wersja serwera: 5.5.27
-- Wersja PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `test`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `idcustomer` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`idcustomer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Zrzut danych tabeli `customer`
--

INSERT INTO `customer` (`idcustomer`, `name`, `surname`, `city`, `street`, `active`) VALUES
(1, 'Jan', 'Janowski', 'Warszawa', 'Obozowa', 0),
(2, 'Krzysztof', 'Kowalski4', 'Warszawa', 'Andersa', 1),
(3, 'Adam', 'Adamski', 'Sopot', 'Bartoka', 1),
(4, 'Piotr', 'Piotrowski1', 'Warszawa', 'Belgijska', 0),
(5, 'Wojciech', 'Wojciechowski', 'Krakow', 'Dembiñskiego', 1),
(6, 'Grzesiek', 'Grzeskowski', 'Bialystok', 'Deotymy', 1),
(7, 'Tomas', 'Tomasowski', 'Gdansk', 'Dereniowa', 0),
(8, 'Zenek', 'Zenkowski', 'Wroclaw', 'Grzesiuka', 1),
(9, 'Wojciech', 'Wojciechowski', 'Gdynia', 'Grzybowska', 1),
(10, 'Adam', 'Janowski', 'Warszawa', 'Jagmina', 0),
(11, 'Grzesiek', 'Kowalski3', 'Warszawa', 'Jakiela', 0),
(12, 'Jan', 'Adamski', 'Sopot', 'Kossaka', 1),
(13, 'Krzysztof', 'Piotrowski', 'Warszawa', 'Koszykowa', 1),
(14, 'Piotr', 'Wojciechowski', 'Krakow', 'Lipowczana', 0),
(15, 'Tomas', 'Grzeskowski', 'Bialystok', 'Lipska', 1),
(16, 'Wojciech', 'Tomasowski', 'Gdansk', 'Morskie Oko', 1),
(17, 'Wojciech', 'Zenkowski', 'Wroclaw', 'Mostowa', 0),
(18, 'Zenek', 'Wojciechowski', 'Gdynia', 'Motorowa', 0),
(19, 'Jan', 'Adamski1', 'Warszawa', 'Obozowa', 0),
(20, 'Krzysztof', 'Adamski2', 'Wroclaw', 'Motorowa', 1),
(21, 'Adam', 'Grzeskowski1', 'Wroclaw', 'Mostowa', 1),
(22, 'Piotr', 'Grzeskowski2', 'Warszawa', 'Morskie Oko', 0),
(23, 'Wojciech', 'Janowski', 'Warszawa', 'Lipska', 1),
(24, 'Grzesiek', 'Janowski2', 'Warszawa', 'Lipowczana', 1),
(25, 'Tomas', 'Kowalski', 'Warszawa', 'Koszykowa', 0),
(26, 'Zenek', 'Kowalski2', 'Warszawa', 'Kossaka', 1),
(27, 'Wojciech', 'Piotrowski2', 'Sopot', 'Jakiela', 1),
(28, 'Adam', 'Piotrowski3', 'Sopot', 'Jagmina', 0),
(29, 'Grzesiek', 'Tusk', 'Krakow', 'Grzybowska', 0),
(30, 'Jan', 'Tomasowski1', 'Krakow', 'Grzesiuka', 1),
(31, 'Krzysztof', 'Wojciechowski', 'Gdynia', 'Dereniowa', 1),
(32, 'Piotr', 'Nowak', 'Gdynia', 'Deotymy', 0),
(33, 'Tomas', 'Danielowski', 'Gdansk', 'Dembiñskiego', 1),
(34, 'Wojciech', 'Wojciechowski', 'Gdansk', 'Belgijska', 1),
(35, 'Wojciech', 'Zenkowski4', 'Bialystok', 'Bartoka', 0),
(36, 'Zenek', 'Zenkowski2', 'Bialystok', 'Andersa', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
