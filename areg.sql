-- phpMyAdmin SQL Dump
-- version 4.4.13.1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Дек 06 2016 г., 12:39
-- Версия сервера: 5.6.26
-- Версия PHP: 5.5.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `areg`
--

-- --------------------------------------------------------

--
-- Структура таблицы `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(100) unsigned NOT NULL,
  `nick` varchar(30) NOT NULL,
  `text` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nickname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `chat`
--

INSERT INTO `chat` (`id`, `nick`, `text`, `time`, `nickname`) VALUES
(1, 'ggggg', 'dfgdgfdg', '2016-12-06 12:11:22', 'ggggg'),
(2, 'ggggg', 'Ggggggggggggggg', '2016-12-06 12:11:49', 'ggggg'),
(3, 'ggggg', 'ttttt', '2016-12-06 12:12:57', 'ggggg'),
(4, 'ggggg', 'ooooooooooo', '2016-12-06 12:23:03', 'ggggg'),
(5, 'ggggg', 'ttttttttttttttttttttt', '2016-12-06 12:23:19', 'ggggg'),
(6, 'ggggg', 'ppppppppppppppppppppppppp', '2016-12-06 12:23:49', 'ggggg'),
(7, 'mmmmmmmmmmmmmmmmmmmmmmmmmmm', 'qqqqqqqqqq', '2016-12-06 12:25:42', 'mmmmmmmmmmmmmmmmmmmmmmmmmmm');

-- --------------------------------------------------------

--
-- Структура таблицы `nametable`
--

CREATE TABLE IF NOT EXISTS `nametable` (
  `id` int(20) NOT NULL,
  `nameTable` varchar(30) NOT NULL,
  `nameUser` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `nametable`
--

INSERT INTO `nametable` (`id`, `nameTable`, `nameUser`) VALUES
(40, 'dsffds', 'sadsa');

-- --------------------------------------------------------

--
-- Структура таблицы `reg_chat`
--

CREATE TABLE IF NOT EXISTS `reg_chat` (
  `id` int(100) unsigned NOT NULL,
  `id_room` int(11) NOT NULL DEFAULT '0',
  `nick` varchar(30) NOT NULL,
  `text` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nickname` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `reg_chat`
--

INSERT INTO `reg_chat` (`id`, `id_room`, `nick`, `text`, `time`, `nickname`) VALUES
(1, 40, 'ggggg', 'wwwwwwww', '2016-12-06 12:22:25', 'ggggg'),
(2, 40, 'ggggg', 'wwwwwwww', '2016-12-06 12:23:12', 'ggggg');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Nickname` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=164 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `time`, `Nickname`) VALUES
(153, 'Poxos', 'martiros', '2016-12-06 11:49:42', 'Petros'),
(154, 'Poxos', 'martiros', '2016-12-06 11:50:50', 'Petros'),
(155, 'sadsad', 'dddd', '2016-12-06 11:51:20', 'sadsa'),
(156, 'sadsad', 'dddd', '2016-12-06 11:51:44', 'sadsa'),
(157, 'sadsad', 'dddd', '2016-12-06 11:52:27', 'sadsa'),
(158, 'sdffsd', 'ffff', '2016-12-06 12:00:40', 'sdfdsf'),
(159, 'sdffsd', 'ffff', '2016-12-06 12:01:02', 'sdfdsf'),
(160, 'gggg', 'gggg', '2016-12-06 12:10:35', 'ggggg'),
(161, 'gggg', 'gggg', '2016-12-06 12:11:00', 'ggggg'),
(162, 'mmmmmmmmmmm', 'mmmmmmmmmmmmmmmmmmmm', '2016-12-06 12:25:31', 'mmmmmmmmmmmmmmmmmmmmmmmmmmm'),
(163, 'qqqqqqqq', 'qqqqqqqqqqq', '2016-12-06 12:27:52', 'qqqqqqqqqqqqq');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `nametable`
--
ALTER TABLE `nametable`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reg_chat`
--
ALTER TABLE `reg_chat`
  ADD KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(100) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `nametable`
--
ALTER TABLE `nametable`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT для таблицы `reg_chat`
--
ALTER TABLE `reg_chat`
  MODIFY `id` int(100) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=164;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
