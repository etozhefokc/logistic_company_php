-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 18 2019 г., 09:08
-- Версия сервера: 10.1.40-MariaDB
-- Версия PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `base`
--

-- --------------------------------------------------------

--
-- Структура таблицы `drivers`
--

CREATE TABLE `drivers` (
  `id_driver` int(11) NOT NULL,
  `s_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `staj` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `drivers`
--

INSERT INTO `drivers` (`id_driver`, `s_name`, `name`, `f_name`, `staj`) VALUES
(1, 'Петров', 'Иван', 'Петрович', 3),
(2, 'Иванов', 'Петр', 'Иванович', 3),
(3, 'Тимкин', 'Сергей', 'Александрович', 4),
(4, 'Попов', 'Тимур', 'Сергеевич', 5),
(5, 'Гринин', 'Алексей', 'Михайлович', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `payments`
--

CREATE TABLE `payments` (
  `id_driver` int(11) NOT NULL,
  `id_route` int(11) NOT NULL,
  `payment` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `payments`
--

INSERT INTO `payments` (`id_driver`, `id_route`, `payment`) VALUES
(1, 1, 2000),
(1, 2, 3000),
(2, 1, 2000),
(2, 2, 1000),
(3, 1, 2000),
(4, 2, 5000),
(5, 3, 9000);

-- --------------------------------------------------------

--
-- Структура таблицы `route`
--

CREATE TABLE `route` (
  `id_route` int(11) NOT NULL,
  `name_route` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `length` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `route`
--

INSERT INTO `route` (`id_route`, `name_route`, `length`) VALUES
(1, 'Малое кольцо', 10),
(2, 'Средне кольцо', 15),
(3, 'Болшое кольцо', 20);

-- --------------------------------------------------------

--
-- Структура таблицы `work`
--

CREATE TABLE `work` (
  `id_driver` int(11) NOT NULL,
  `id_route` int(11) NOT NULL,
  `dep_date` date NOT NULL,
  `ret_date` date NOT NULL,
  `prem` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `work`
--

INSERT INTO `work` (`id_driver`, `id_route`, `dep_date`, `ret_date`, `prem`) VALUES
(1, 1, '2018-12-01', '2018-12-02', 1000),
(1, 2, '2018-12-02', '2018-12-03', NULL),
(2, 1, '2018-12-01', '2018-12-02', NULL),
(2, 2, '2018-12-04', '2018-12-05', 1000),
(3, 1, '2018-12-01', '2018-12-03', NULL),
(4, 2, '2018-12-02', '2018-12-04', 1000),
(5, 3, '2018-12-01', '2018-12-04', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id_driver`);

--
-- Индексы таблицы `payments`
--
ALTER TABLE `payments`
  ADD KEY `id_driver` (`id_driver`),
  ADD KEY `id_route` (`id_route`);

--
-- Индексы таблицы `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id_route`);

--
-- Индексы таблицы `work`
--
ALTER TABLE `work`
  ADD KEY `id_driver` (`id_driver`),
  ADD KEY `id_route` (`id_route`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id_driver` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `route`
--
ALTER TABLE `route`
  MODIFY `id_route` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`id_driver`) REFERENCES `drivers` (`id_driver`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`id_route`) REFERENCES `route` (`id_route`);

--
-- Ограничения внешнего ключа таблицы `work`
--
ALTER TABLE `work`
  ADD CONSTRAINT `work_ibfk_1` FOREIGN KEY (`id_driver`) REFERENCES `drivers` (`id_driver`),
  ADD CONSTRAINT `work_ibfk_2` FOREIGN KEY (`id_route`) REFERENCES `route` (`id_route`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
