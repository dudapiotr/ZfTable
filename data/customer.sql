-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas wygenerowania: 24 Wrz 2013, 01:08
-- Wersja serwera: 5.5.27
-- Wersja PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
  `age` int(11) NOT NULL DEFAULT '10',
  `city` varchar(100) DEFAULT NULL,
  `street` varchar(100) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `edit1` varchar(100) NOT NULL DEFAULT 'edit1',
  `edit2` varchar(100) NOT NULL DEFAULT 'edit2',
  PRIMARY KEY (`idcustomer`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Zrzut danych tabeli `customer`
--

INSERT INTO `customer` (`idcustomer`, `name`, `surname`, `age`, `city`, `street`, `active`, `edit1`, `edit2`) VALUES
(1, 'Jan', 'Janowski', 6, 'Warszawa', 'Obozowa', 0, 'edit1', 'edit2'),
(2, 'Krzysztof', 'Kowalski4', 77, 'Warszawa', 'Andersa', 1, 'edit1 test', 'edit2'),
(3, 'Adam', 'Adamski', 22, 'Sopot', 'Bartoka', 1, 'edit1', 'edit2'),
(4, 'Piotr', 'Piotrowski1', 55, 'Warszawa', 'Belgijska', 0, 'edit1', 'edit2 asbasd fa'),
(5, 'Wojciech', 'Wojciechowski', 22, 'Krakow', 'Dembiñskiego', 1, 'edit1', 'edit2'),
(6, 'Grzesiek', 'Grzeskowski', 88, 'Bialystok', 'Deotymy', 1, 'edit1', 'edit2'),
(7, 'Tomas', 'Tomasowski', 22, 'Gdansk', 'Dereniowa', 0, 'edit1', 'edit2'),
(8, 'Zenek', 'Zenkowski', 99, 'Wroclaw', 'Grzesiuka', 1, 'edit1', 'edit2'),
(9, 'Wojciech', 'Wojciechowski', 33, 'Gdynia', 'Grzybowska', 1, 'edit1', 'edit2'),
(10, 'Adam', 'Janowski', 12, 'Warszawa', 'Jagmina', 0, 'edit1', 'edit2'),
(11, 'Grzesiek', 'Kowalski3', 10, 'Warszawa', 'Jakiela', 0, 'edit1', 'edit2'),
(12, 'Jan', 'Adamski', 2, 'Sopot', 'Kossaka', 1, 'edit1', 'edit2'),
(13, 'Krzysztof', 'Piotrowski', 77, 'Warszawa', 'Koszykowa', 1, 'edit1', 'edit2'),
(14, 'Piotr', 'Wojciechowski', 36, 'Krakow', 'Lipowczana', 0, 'edit1', 'edit2'),
(15, 'Tomas', 'Grzeskowski', 34, 'Bialystok', 'Lipska', 1, 'edit1', 'edit2'),
(16, 'Wojciech', 'Tomasowski', 52, 'Gdansk', 'Morskie Oko', 1, 'edit1', 'edit2'),
(17, 'Wojciech', 'Zenkowski', 17, 'Wroclaw', 'Mostowa', 0, 'edit1', 'edit2'),
(18, 'Zenek', 'Wojciechowski', 44, 'Gdynia', 'Motorowa', 0, 'edit1', 'edit2'),
(19, 'Jan', 'Adamski1', 22, 'Warszawa', 'Obozowa', 0, 'edit1', 'edit2'),
(20, 'Krzysztof', 'Adamski2', 77, 'Wroclaw', 'Motorowa', 1, 'edit1', 'edit2'),
(21, 'Adam', 'Grzeskowski1', 23, 'Wroclaw', 'Mostowa', 1, 'edit1', 'edit2'),
(22, 'Piotr', 'Grzeskowski2', 28, 'Warszawa', 'Morskie Oko', 0, 'edit1', 'edit2'),
(23, 'Wojciech', 'Janowski', 23, 'Warszawa', 'Lipska', 1, 'edit1', 'edit2'),
(24, 'Grzesiek', 'Janowski2', 32, 'Warszawa', 'Lipowczana', 1, 'edit1', 'edit2'),
(25, 'Tomas', 'Kowalski', 27, 'Warszawa', 'Koszykowa', 0, 'edit1', 'edit2'),
(26, 'Zenek', 'Kowalski2', 38, 'Warszawa', 'Kossaka', 1, 'edit1', 'edit2'),
(27, 'Wojciech', 'Piotrowski2', 39, 'Sopot', 'Jakiela', 1, 'edit1', 'edit2'),
(28, 'Adam', 'Piotrowski3', 13, 'Sopot', 'Jagmina', 0, 'edit1', 'edit2'),
(29, 'Grzesiek', 'Tusk', 14, 'Krakow', 'Grzybowska', 0, 'edit1', 'edit2'),
(30, 'Jan', 'Tomasowski1', 16, 'Krakow', 'Grzesiuka', 1, 'edit1', 'edit2'),
(31, 'Krzysztof', 'Wojciechowski', 0, 'Gdynia', 'Dereniowa', 1, 'edit1', 'edit2'),
(32, 'Piotr', 'Nowak', 0, 'Gdynia', 'Deotymy', 0, 'edit1', 'edit2'),
(33, 'Tomas', 'Danielowski', 0, 'Gdansk', 'Dembiñskiego', 1, 'edit1', 'edit2'),
(34, 'Wojciech', 'Wojciechowski', 0, 'Gdansk', 'Belgijska', 1, 'edit1', 'edit2'),
(35, 'Wojciech', 'Zenkowski4', 0, 'Bialystok', 'Bartoka', 0, 'edit1', 'edit2'),
(36, 'Zenek', 'Zenkowski2', 0, 'Bialystok', 'Andersa', 0, 'edit1', 'edit2');
