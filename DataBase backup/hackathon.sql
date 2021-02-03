-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 03 2021 г., 04:40
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `hackathon`
--

-- --------------------------------------------------------

--
-- Структура таблицы `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `subjects`
--

INSERT INTO `subjects` (`id`, `subject`, `class`) VALUES
(1, 'Русский язык', 11),
(2, 'Русская литература', 11),
(3, 'Родной язык', 11),
(4, 'Родная литература', 11),
(5, 'Алгебра', 11),
(6, 'Геометрия', 11),
(7, 'Физика', 11),
(8, 'Химия', 11),
(9, 'Биология', 11),
(10, 'География', 11),
(11, 'Анлгийский язык', 11),
(12, 'Культура народов РС(Я)', 11),
(13, 'История россии', 11),
(14, 'Обществознание', 11),
(15, 'Черчение', 11),
(16, 'Всеобщая история', 11),
(17, 'Физическая культура', 11),
(18, 'МХК', 11),
(19, 'ОБЖ', 11),
(20, 'Информатика', 11),
(21, 'Право', 11),
(22, 'Математика', 1),
(23, 'Письмо', 1),
(24, 'Азбука', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `uploads`
--

CREATE TABLE `uploads` (
  `id` int(11) NOT NULL,
  `user_id` int(255) NOT NULL,
  `subject_id` int(255) NOT NULL,
  `class` int(255) NOT NULL,
  `date` date NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `uploads`
--

INSERT INTO `uploads` (`id`, `user_id`, `subject_id`, `class`, `date`, `path`) VALUES
(44, 12, 4, 11, '2021-02-03', 'uploads/12/4/2021-02-03/16123162452.jpg'),
(45, 12, 4, 11, '2021-02-03', 'uploads/12/4/2021-02-03/1612316268IMG_2121.JPG'),
(46, 12, 4, 11, '2021-02-03', 'uploads/12/4/2021-02-03/1612316275IMG_2121.JPG');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bday` date NOT NULL,
  `school` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `classnumber` int(11) NOT NULL,
  `classname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `email`, `lastname`, `firstname`, `secondname`, `bday`, `school`, `classnumber`, `classname`, `password`, `admin`) VALUES
(1, 'a@mail.ru', 'Альмуалимов', 'Альтаир', 'Альбертович', '2017-11-21', 'МБОУ Вилюйская НОШ №1', 1, 'в', '$2y$10$MRaXQcIIC98An3GLzAxvMuHNXtvSfCgLEUYQXPig6QrmCXiYJggL2', 0),
(12, 'nik_soldat@mail.ru', 'Солдатов', 'Николай', 'Николаевич', '1993-10-15', 'МБОУ Вилюйская СОШ №1', 11, 'б', '$2y$10$r0tRjfXY32/F7tjm6EPkt.31f561wjg7RqmQs/NJDIzPsQantxJ2a', 0),
(13, 'innokentevna.2020@gmail.com', 'Панькова', 'Диана', 'Иннокентьевна', '1993-05-20', 'МБОУ Вилюйская НОШ №1', 11, 'а', '$2y$10$qCX1qlKsQKxtZHPrucKWoejF2t129UqDZeN92X/zlHVQQzliF41Me', 0),
(15, 'vasya@mail.ru', 'Прокопьев', 'Василий', 'Андреевич', '1992-05-05', 'МБОУ Вилюйская СОШ №2', 1, 'в', '$2y$10$YRaNv6yL9N5Xs.eCCZmQcOrrlcOmzte9UkGQKvxkMdGXLQhVxXXcy', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
