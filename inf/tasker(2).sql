-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 15 2013 г., 11:07
-- Версия сервера: 5.5.31-0ubuntu0.13.04.1
-- Версия PHP: 5.4.9-4ubuntu2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `tasker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `bnd_data`
--

CREATE TABLE IF NOT EXISTS `bnd_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` text NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `bnd_data`
--

INSERT INTO `bnd_data` (`id`, `data`, `create_time`, `update_time`, `user_id`) VALUES
(1, 'something', '2013-05-02 23:30:46', '2013-05-02 23:31:13', 0),
(2, 'something new', '2013-05-04 17:50:57', '2013-05-04 17:50:57', 0),
(3, 'another thing', '2013-05-04 17:51:15', '2013-05-04 17:51:15', 0),
(4, 'Hello, world!', '2013-06-11 20:48:14', '2013-06-11 20:48:14', -1),
(5, 'ischo', '2013-06-11 21:44:49', '2013-06-11 21:44:49', -1);

-- --------------------------------------------------------

--
-- Структура таблицы `bnd_inbox`
--

CREATE TABLE IF NOT EXISTS `bnd_inbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `bnd_inbox`
--

INSERT INTO `bnd_inbox` (`id`, `data_id`, `user_id`, `create_time`, `update_time`) VALUES
(1, 4, -1, '2013-06-11 20:48:14', '2013-06-11 20:48:14'),
(2, 5, -1, '2013-06-11 21:44:49', '2013-06-11 21:44:49');

-- --------------------------------------------------------

--
-- Структура таблицы `bnd_tag`
--

CREATE TABLE IF NOT EXISTS `bnd_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `bnd_tag`
--

INSERT INTO `bnd_tag` (`id`, `title`, `user_id`) VALUES
(1, 'just_tag', 0),
(2, 'another_tag', 0),
(3, 'not_involved_tag', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `bnd_tag_data`
--

CREATE TABLE IF NOT EXISTS `bnd_tag_data` (
  `id` int(11) NOT NULL,
  `data_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `bnd_tag_preset`
--

CREATE TABLE IF NOT EXISTS `bnd_tag_preset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tags_string` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `bnd_tag_preset`
--

INSERT INTO `bnd_tag_preset` (`id`, `tags_string`, `user_id`) VALUES
(1, '', 0),
(2, '', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `bnd_task`
--

CREATE TABLE IF NOT EXISTS `bnd_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_id` int(11) NOT NULL,
  `task_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `progress` enum('new','done') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
