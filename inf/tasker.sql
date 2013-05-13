-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 13 2013 г., 20:24
-- Версия сервера: 5.5.29
-- Версия PHP: 5.4.6-1ubuntu1.2

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `bnd_data`
--

INSERT INTO `bnd_data` (`id`, `data`, `create_time`, `update_time`, `user_id`) VALUES
(1, 'something', '2013-05-02 23:30:46', '2013-05-02 23:31:13', 0),
(2, 'something new', '2013-05-04 17:50:57', '2013-05-04 17:50:57', 0),
(3, 'another thing', '2013-05-04 17:51:15', '2013-05-04 17:51:15', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `bnd_tag`
--

CREATE TABLE IF NOT EXISTS `bnd_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `bnd_tag`
--

INSERT INTO `bnd_tag` (`id`, `title`) VALUES
(1, 'just_tag'),
(2, 'another_tag'),
(3, 'not_involved_tag');

-- --------------------------------------------------------

--
-- Структура таблицы `bnd_tag_preset`
--

CREATE TABLE IF NOT EXISTS `bnd_tag_preset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `bnd_tag_preset`
--

INSERT INTO `bnd_tag_preset` (`id`) VALUES
(1),
(2);

-- --------------------------------------------------------

--
-- Структура таблицы `bnd_tag_rel_data_tag`
--

CREATE TABLE IF NOT EXISTS `bnd_tag_rel_data_tag` (
  `id` int(11) NOT NULL,
  `data_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `bnd_tag_rel_tag_preset`
--

CREATE TABLE IF NOT EXISTS `bnd_tag_rel_tag_preset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag_id` int(11) NOT NULL,
  `preset_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `bnd_tag_rel_tag_preset`
--

INSERT INTO `bnd_tag_rel_tag_preset` (`id`, `tag_id`, `preset_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
