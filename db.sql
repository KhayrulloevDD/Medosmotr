-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 03 2018 г., 16:39
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
  `phone` bigint(11) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `type` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `raspisanie`
--

INSERT INTO `raspisanie` (`id`, `name`, `gr`, `email`, `phone`, `date`, `time`, `type`) VALUES
(8, 'Хайруллоев Додулло Додарбегович', 'ФО-440002', 'dissoa@mail.ru', 2147483647, '2018-06-01', '12:30', 31),
(9, 'Болтаев Иемиддин', 'фт-350007', 'iyomiddin@mail.ru', 2147483647, '2018-06-17', '12:30', 33),
(10, 'Мустаджо Каримов', 'Ммт-262216', 'dissoa@mail.ru', 2147483647, '2018-06-09', '12:30', 31),
(11, 'Лебединцев Игорь Вячеславович', 'ФО', 'dissoa@mail.ru', 2147483647, '2018-06-02', '13:00', 33),
(12, 'Иванов Иван Иванович', 'Ммт-262216', 'dissoa@mail.ru', 2147483647, '2018-06-22', '9:45', 33),
(13, 'Ягончи', 'ФО-440002', '123@mail', 89021886835, '2018-06-30', '12:30', 33);

-- --------------------------------------------------------

--
-- Структура таблицы `schedule`
--

CREATE TABLE `schedule` (
  `id` int(10) NOT NULL,
  `id_doc` int(2) NOT NULL,
  `day` int(1) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `day_off` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `schedule`
--

INSERT INTO `schedule` (`id`, `id_doc`, `day`, `start_time`, `end_time`, `day_off`) VALUES
(2, 1, 1, '8:30', '16:00', 1),
(3, 1, 2, '8:30', '16:00', 1),
(4, 1, 3, '8:30', '16:00', 1),
(5, 1, 4, '13:45', '16:00', 0),
(6, 1, 5, '8:30', '16:00', 0),
(7, 1, 6, '8:30', '16:00', 0),
(8, 1, 7, '8:30', '16:00', 0),
(9, 0, 1, '8:30', '16:00', 0),
(10, 0, 2, '8:30', '16:00', 0),
(11, 0, 3, '8:30', '16:00', 0),
(12, 0, 4, '8:30', '16:00', 0),
(13, 0, 5, '8:30', '16:00', 0),
(14, 0, 6, '8:30', '16:00', 0),
(15, 0, 7, '8:30', '16:00', 0),
(16, 0, 1, '8:30', '16:00', 0),
(17, 0, 2, '8:30', '16:00', 0),
(18, 0, 3, '8:30', '16:00', 0),
(19, 0, 4, '8:30', '16:00', 0),
(20, 0, 5, '8:30', '16:00', 0),
(21, 0, 6, '8:30', '16:00', 0),
(22, 0, 7, '8:30', '16:00', 0),
(23, 0, 1, '8:30', '16:00', 0),
(24, 0, 2, '8:30', '16:00', 0),
(25, 0, 3, '8:30', '16:00', 0),
(26, 0, 4, '8:30', '16:00', 0),
(27, 0, 5, '8:30', '16:00', 0),
(28, 0, 6, '8:30', '16:00', 0),
(29, 0, 7, '8:30', '16:00', 0),
(30, 0, 1, '8:30', '16:00', 0),
(31, 0, 2, '8:30', '16:00', 0),
(32, 0, 3, '8:30', '16:00', 0),
(33, 0, 4, '8:30', '16:00', 0),
(34, 0, 5, '8:30', '16:00', 0),
(35, 0, 6, '8:30', '16:00', 0),
(36, 0, 7, '8:30', '16:00', 0),
(37, 0, 1, '8:30', '16:00', 0),
(38, 0, 2, '8:30', '16:00', 0),
(39, 0, 3, '8:30', '16:00', 0),
(40, 0, 4, '8:30', '16:00', 0),
(41, 0, 5, '8:30', '16:00', 0),
(42, 0, 6, '8:30', '16:00', 0),
(43, 0, 7, '8:30', '16:00', 0),
(44, 0, 1, '8:30', '16:00', 0),
(45, 0, 2, '8:30', '16:00', 0),
(46, 0, 3, '8:30', '16:00', 0),
(47, 0, 4, '8:30', '16:00', 0),
(48, 0, 5, '8:30', '16:00', 0),
(49, 0, 6, '8:30', '16:00', 0),
(50, 0, 7, '8:30', '16:00', 0),
(51, 1, 1, '8:30', '16:00', 0),
(52, 1, 2, '8:30', '16:00', 0),
(53, 1, 3, '8:30', '16:00', 0),
(54, 1, 4, '8:30', '16:00', 0),
(55, 1, 5, '8:30', '16:00', 0),
(56, 1, 6, '8:30', '16:00', 0),
(57, 1, 7, '8:30', '16:00', 0),
(58, 45, 1, '8:30', '16:00', 0),
(59, 45, 2, '8:30', '16:00', 0),
(60, 45, 3, '8:30', '16:00', 0),
(61, 45, 4, '8:30', '16:00', 0),
(62, 45, 5, '8:30', '16:00', 0),
(63, 45, 6, '8:30', '16:00', 0),
(64, 45, 7, '8:30', '16:00', 0),
(65, 46, 1, '8:30', '16:00', 0),
(66, 46, 1, '8:30', '16:00', 0),
(67, 46, 1, '8:30', '16:00', 0),
(68, 46, 1, '8:30', '16:00', 0),
(69, 46, 1, '8:30', '16:00', 0),
(70, 46, 1, '8:30', '16:00', 0),
(71, 46, 1, '8:30', '16:00', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
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
(31, 'doc', 'doc', 'Терапевт', 1, 'Шагубатов Елисей Герасимович', 'Описание терепевта'),
(32, 'doc3', 'doc3', 'Венеролог', 1, 'Коротков Пимен Иннокентиевич', 'Описание венеролога'),
(33, 'doc4', 'doc4', 'Невролог', 1, 'Мячин Яков Адамович', 'Описание невролога'),
(37, 'doc5', 'doc5', 'Нарколог', 1, 'Кальченко Игнатий Панкратиевич', 'Описание нарколога'),
(39, 'test2', '123', 'Окулист', 1, 'Геннадий Владимирович', '...'),
(45, 'newDoc', '123', 'Окулист', 1, 'Геннадий Владимирович', 'Пример описания'),
(46, 'pizdyuk', '123', 'Терапевт', 1, 'Геннадий Владимирович', 'Пример описания');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `raspisanie`
--
ALTER TABLE `raspisanie`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `schedule`
--
ALTER TABLE `schedule`
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
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
