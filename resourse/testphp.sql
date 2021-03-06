-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 30 2019 г., 11:09
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testphp`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `uid` int(6) UNSIGNED NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `birthDay` date NOT NULL,
  `dateChange` date NOT NULL,
  `description` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`uid`, `firstName`, `lastName`, `birthDay`, `dateChange`, `description`) VALUES
(1, 'Tania 1', 'Diaan 1', '1993-01-01', '2019-12-27', 'Some description 1'),
(2, 'Tania 2', 'Diaan 2', '1993-01-02', '2019-12-28', 'Some description 2'),
(3, 'Tania 3', 'Diaan 3', '1993-01-03', '2019-12-29', 'Some description 3'),
(4, 'Tania 4', 'Diaan 4', '1993-01-04', '2019-12-30', 'Some description 4'),
(5, 'Tania 5', 'Diaan 5', '1993-01-05', '2019-12-31', 'Some description 5'),
(6, 'Tania 6', 'Diaan 6', '1993-01-06', '2020-01-01', 'Some description 6'),
(7, 'Tania 7', 'Diaan 7', '1993-01-07', '2020-01-02', 'Some description 7'),
(8, 'Tania 8', 'Diaan 8', '1993-01-08', '2020-01-03', 'Some description 8'),
(9, 'Tania 9', 'Diaan 9', '1993-01-09', '2020-01-04', 'Some description 9'),
(10, 'Tania 10', 'Diaan 10', '1993-01-10', '2020-01-05', 'Some description 10'),
(11, 'Tania 11', 'Diaan 11', '1993-01-11', '2020-01-06', 'Some description 11'),
(12, 'Tania 12', 'Diaan 12', '1993-01-12', '2020-01-07', 'Some description 12'),
(13, 'Tania 13', 'Diaan 13', '1993-01-13', '2020-01-08', 'Some description 13'),
(14, 'Tania 14', 'Diaan 14', '1993-01-14', '2020-01-09', 'Some description 14'),
(15, 'Tania 15', 'Diaan 15', '1993-01-15', '2020-01-10', 'Some description 15'),
(16, 'Tania 16', 'Diaan 16', '1993-01-16', '2020-01-11', 'Some description 16'),
(17, 'Tania 17', 'Diaan 17', '1993-01-17', '2020-01-12', 'Some description 17'),
(18, 'Tania 18', 'Diaan 18', '1993-01-18', '2020-01-13', 'Some description 18'),
(19, 'Tania 19', 'Diaan 19', '1993-01-19', '2020-01-14', 'Some description 19'),
(20, 'Tania 20', 'Diaan 20', '1993-01-20', '2020-01-15', 'Some description 20'),
(21, 'Tania 21', 'Diaan 21', '1993-01-21', '2020-01-16', 'Some description 21'),
(22, 'Tania 22', 'Diaan 22', '1993-01-22', '2020-01-17', 'Some description 22'),
(23, 'Tania 23', 'Diaan 23', '1993-01-23', '2020-01-18', 'Some description 23'),
(24, 'Tania 24', 'Diaan 24', '1993-01-24', '2020-01-19', 'Some description 24'),
(25, 'Tania 25', 'Diaan 25', '1993-01-25', '2020-01-20', 'Some description 25'),
(26, 'Tania 26', 'Diaan 26', '1993-01-26', '2020-01-21', 'Some description 26'),
(27, 'Tania 27', 'Diaan 27', '1993-01-27', '2020-01-22', 'Some description 27');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uid` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
