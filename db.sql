-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 30 2018 г., 23:27
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `medosmotr`
--

-- --------------------------------------------------------

--
-- Структура таблицы `raspisanie`
--

CREATE TABLE `raspisanie` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gr` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` int(10) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `raspisanie`
--

INSERT INTO `raspisanie` (`id`, `name`, `gr`, `email`, `phone`, `date`, `time`, `type`) VALUES
(2, 'FBI', '125125', '123@mail', 6324623, '2018-05-13', '13:00', 11),
(3, 'Ивановец', '125125', 'dissoa@mail.ru', 6324623, '2018-05-06', '13:00', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` tinyint(2) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `role` tinyint(2) NOT NULL DEFAULT '1',
  `fullName` varchar(100) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `type`, `role`, `fullName`, `description`) VALUES
(1, 'admin', 'password', 'NULL', 0, 'Хайруллоев Додулло', 'NULL'),
(2, 'admin2', '123', 'NULL', 0, 'Хайдаров Мурод', 'NULL'),
(9, 'test', 'pass', 'Венеролог', 1, 'Ивановец', 'фдлырпжлфыр'),
(11, 'test2', '123', 'Терапевт', 1, 'Ягончи', 'фдлырпжлфыр'),
(12, 'test3', 'hsdhsdhg', 'Невролог', 1, 'Аноним', 'sdhsdhsdh'),
(13, 'freshdoc', '123', 'Нарколог', 1, 'lkgalks askghak agksh', 'врач терапии..(net)'),
(15, 'log1', '12345', 'Терапевт', 1, 'jkvkjv', 'jgdcjhvkj'),
(22, 'test22', 'pass', 'Окулист', 1, 'Ягончи', 'fjdjfd1251sasf');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `raspisanie`
--
ALTER TABLE `raspisanie`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `raspisanie`
--
ALTER TABLE `raspisanie`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
