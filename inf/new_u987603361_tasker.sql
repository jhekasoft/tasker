
-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 02 2013 г., 13:35
-- Версия сервера: 5.1.66
-- Версия PHP: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `u987603361_tasker`
--

-- --------------------------------------------------------

--
-- Структура таблицы `diary_notes`
--

CREATE TABLE IF NOT EXISTS `diary_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `txt` text,
  `day` varchar(255) NOT NULL,
  `creation_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `diary_notes`
--

INSERT INTO `diary_notes` (`id`, `txt`, `day`, `creation_time`) VALUES
(1, 'Пока болею, но съездил с народом и переоформился под Влада. Несколько раз мотался туда-обратною. Были ещё Жека, Саша и Андрей.', '2012-12-03 00:00:00', '2012-12-04 15:04:00'),
(2, 'Уже выздоравливаю, делаю Tasker.Diary', '2012-12-04 00:00:00', '2012-12-04 15:04:00');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks_tags`
--

CREATE TABLE IF NOT EXISTS `tasks_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `tasks_tags`
--

INSERT INTO `tasks_tags` (`id`, `title`) VALUES
(1, 'linux'),
(2, 'android');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks_tasks`
--

CREATE TABLE IF NOT EXISTS `tasks_tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creation_time` datetime DEFAULT NULL,
  `txt` text,
  `done` enum('0','1') NOT NULL,
  `done_time` datetime DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `priority` enum('0','5','10') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=137 ;

--
-- Дамп данных таблицы `tasks_tasks`
--

INSERT INTO `tasks_tasks` (`id`, `creation_time`, `txt`, `done`, `done_time`, `tags`, `priority`) VALUES
(1, '2012-10-18 23:40:18', '-= create site "tasker" on zf2! =-', '1', '2012-11-29 12:11:39', '', '0'),
(2, '2012-10-20 00:00:00', 'lern', '1', '2012-11-29 11:51:38', '', '0'),
(3, NULL, '-= -= -= -= lern =- =- =- =-', '1', '2012-11-29 10:56:55', '', '0'),
(4, NULL, '', '1', '2012-11-29 10:58:15', '', '0'),
(5, '2012-11-29 12:08:34', 'Новое задание', '1', '2012-11-29 12:08:38', '', '0'),
(6, '2012-11-29 12:08:46', 'ещё', '1', '2012-11-29 12:11:44', '', '0'),
(7, '2012-11-29 12:12:24', '++', '1', '2012-11-29 16:24:55', '', '0'),
(8, '2012-11-29 16:57:53', '74102290\r\ntunecp', '0', NULL, '', '0'),
(9, '2012-11-29 16:59:29', 'fb reader', '0', NULL, '', '0'),
(12, '2012-11-29 17:01:49', 'lost+found?', '0', NULL, '', '0'),
(14, '2012-11-29 17:03:31', 'ай шёрли донт кноу - я действительно не понимаю, нафига тебе эта фигня???', '0', NULL, '', '0'),
(16, '2012-11-29 17:04:31', 'Сделать дневник на zf2', '0', NULL, '', '0'),
(17, '2012-11-29 17:05:09', 'phpDocumentor\r\nMySQL Workbanch - диаграммы по БД', '0', NULL, '', '0'),
(18, '2012-11-29 19:21:23', 'Whether only the active branch? Только ли активный бренч?\r\nNotice, how pages, that are invisible... Заметьте, как страницы, которые невидимые...', '0', NULL, 'english', '5'),
(19, '2012-11-30 18:32:59', 'при удалении чего-то в админки триггерится событие и запускаются подписанные листенеры. Например, категория не должна знать о товарах, она просто удаляется и триггерит событие "удаляется категория", а товары слушают и если хотят, тоже удаляются. Тоже самое для файлов и картинок товаров, новостей и т.п.', '0', NULL, 'zf2,админка', '0'),
(20, '2012-11-30 18:33:20', 'e.g - example given\r\ni.e -  id est', '0', NULL, 'english', '0'),
(23, '2012-12-02 14:04:17', 'как по английски качалка, тренажерный зал, и вообще всё, с этим связанное', '0', NULL, 'english', '0'),
(25, '2012-12-02 14:08:03', 'evernote - посмотреть фишки, реализовать те, которые понравятся', '0', NULL, '', '0'),
(26, '2012-12-02 14:08:30', 'stas.lan\r\nmanager\r\nmadgahed', '0', NULL, 'mcity', '0'),
(27, '2012-12-02 14:09:32', 'подкасты zf2, Фараздаги', '0', NULL, 'zf2', '0'),
(29, '2012-12-02 14:11:03', 'xterm подизучить, может пригодиться', '0', NULL, '', '0'),
(32, '2012-12-02 14:14:57', 'pacman ILoveCandy', '0', NULL, 'linux', '0'),
(33, '2012-12-02 14:15:08', 'nethack', '0', NULL, '', '0'),
(36, '2012-12-02 14:17:18', 'lsof', '0', NULL, 'linux', '0'),
(48, '2012-12-02 14:24:31', 'график повторений, самому просавлять %\r\nДобавлять выделенный текст, как seltr, добавлять ссылки', '0', NULL, 'tasker', '0'),
(49, '2012-12-02 14:40:44', 'bondvt04\r\nt405b', '0', NULL, 'mcity', '0'),
(50, '2012-12-02 14:41:20', 'Linux Magazine\r\nсписок пакетов, использующих этот пакет/файл', '0', NULL, 'linux', '0'),
(51, '2012-12-02 15:49:16', 'ис дазет мерров - это ничего не значит', '0', NULL, 'english', '0'),
(53, '2012-12-02 18:02:25', 'Чурчхелла: сын-первоклашка возвращается из школы и жалуется, что водитель школьного автобуса постоянно ругается. Мы спросили что говорит. Потом рыдали пацтулом\r\nЧурчхелла: сказал, что постоянно повторяет 2 ругательства - жеваный крот и братская щука)))\r\nPaviski: да жеваный же крот, шож ты делаешь, я ж на обучении сижу - ржать низя, давлюсь тут весь красный...', '0', NULL, 'note', '0'),
(54, '2012-12-02 18:06:36', '[mika] сделал предкам удаленный доступ к моей медиапомойке\r\nну, вы знаете – терабайты натгео, дискавери и прочих энималпланетов\r\nчерез полчаса звонят: что такое /hentai и почему access denied?\r\nок, если так настаиваете...\r\nи вот уже несколько часов – тишина в эфире\r\nволнуюсь', '0', NULL, 'note', '0'),
(55, '2012-12-02 18:18:20', 'xxx:\r\nКотятки, если бы Apple делали IAuto - то они бы запатентовали прозрачное лобовое стекло, открывающиеся наружу двери и вывод выхлопных газов вне салона, а потом таскали по судам тех, кто не сделает газенваген?', '0', NULL, 'note', '0'),
(56, '2012-12-02 20:45:08', 'С баша:\r\nЛинус Торвальдс говорил, что после прочтения Толкиена в оригинале невероятно прокачал английский', '0', NULL, 'english', '0'),
(57, '2012-12-02 20:57:18', '\r\n+46\r\nmshewzov, 16 ноября 2012 в 09:09 #\r\nПо-правде говоря, я первый раз вижу такой проект по изучению другой планеты, который сообщает практически всю информацию о ходе исследований всему миру, снабжая нас массой фотографий и научных данных. Мне иногда кажется, что это словно социальный проект, объединяющий всех людей мира в одну большую команду. Это очень воодушевляет!\r\n+13\r\nZelenyikot, 16 ноября 2012 в 09:19 #\r\n↵\r\n↑\r\nИнформация по многим проектам НАСА имеется в открытом доступе. Большинство даже не представляет в каких масштабах. У НАСА вообще в деле связей с общественностью все поставлено на высшем уровне. Тот же Opportunity регулярно загружает новые фотографии и информация по нему вся открыта. Просто общественное внимание поугасло. А здесь действительно и внимание велико, и перспективы большие, и работа по популяризации проекта ведется активная. ', '0', NULL, 'note', '0'),
(58, '2012-12-02 21:01:09', 'С хабра.\r\n\r\nGeckoPelt: Моя любимая тема! Троллинг спамеров.\r\nВо-первых, заведите привычку вместо «алло» говорить «прачечная», «синагога», или «дежурный капитан Атабаев слушает!».\r\nЭто иногда вызывает смешной разрыв шаблона:)\r\nЕще можно вместо алло сразу сказать: «Добрый день, Сергея Петровича позовите пожалуйста!».\r\n\r\nПару раз на прачечную говорили: «дааа? ой извините...». А однажды был просто чумовой диалог:\r\nЯ: Синагога!\r\nСпамер: Алло! Это квартира?\r\nЯ: Я же вам говорю, это СИНАГОГА!\r\nСпамер: вы организация?\r\nЯ: А по вашему-таки синагога не организация?\r\nСпамер: (вешает трубку).\r\n\r\nДалее, если нет времени. Не отключаетесь, а просто кладете трубку рядом на стол и продолжаете заниматься своими делами. Пусть там себе распинается в пустоту.\r\n\r\nМожно выслушать монолог, а потом сказать: «Простите, я вас не слушал. Повторите, пожалуйста, это все еще раз» :)\r\n\r\nИ самый злобный и жестокий троллинг: сделать вид, что страшно заинтересован в предлагаемой услуге, но слышно просто ужасно плохо. Громко говорите в трубку, просите повторить. «Чтоооо? Какая скорость интернета говорите?? АААА? Простите?? Повторите еще раз! ПЛОХО СЛЫШНО! Ух ты!!! Какое отличное предложение! ЧТО? ПОВТОРИТЕ ГРОМЧЕ ПОЖАЛУЙСТА! Плохо слышно!» :D :D :D Но это очень зло.', '0', NULL, 'note', '0'),
(59, '2012-12-02 21:03:33', 'kungurov@lj:\r\n...У меня один знакомый препод в университете решил приколоться, дал курсовую студентам-экономистам - составить инвестиционный проект строительства СШГЭС, БАМа, атомного ледокольного флота, Норильского меткомбината, Камского автозавода, как будто бы их нет, но надо построить в сегодняшних условиях. Он сам потом офигел, изучив порядка 20 работ своих студентиков. Ни одному из них даже в голову не пришло, что такие масштабные проекты возможно осуществить за счет внутренних резервов (и это в условиях нефтяной халявы, когда баррель за сотку!), а уж сроки окупаемости проектов вообще получились какими-то фантастическими. Например, один будущий рулевой экономики новой России (кстати, закончил вуз с красным дипломом) пришел к выводу о том, что если СШГЭС построить сегодня, то окупаемость проекта будет достигнута через 60 лет. Даже если допустить, что он ошибся вдвое, и окупятся затраты всего лишь через 30 лет, все равно очевидно, что подобный прожект сегодня нереализуем в принципе. Никто не будет вкладывать деньги в затею с таким сроком окупаемости, если можно дать взятку, кому следует, отмутить землю возле оживленной трассы, построить там гипермаркет и отбить баблозатраты через 2-3 года.', '0', NULL, 'note', '0'),
(60, '2012-12-02 21:04:11', 'для наиболее популярных тегов короткую ссылку или чекбокс', '0', NULL, 'tasker', '0'),
(61, '2012-12-03 16:23:42', '23 сезон Симпсонов просмотрел..', '0', NULL, 'просмотреть', '0'),
(62, '2012-12-03 16:31:52', 'http://joyreactor.cc/post/576525\r\nЖеке показать', '0', NULL, '', '0'),
(63, '2012-12-03 18:05:31', 'ххх: Висит ли у вас на кухне пакет за дверью, в котором сотни мелких пакетиков?\r\nyyy: Да, я его называю «метапакет»', '0', NULL, 'note', '0'),
(64, '2012-12-03 18:05:52', 'добавить защиту от F5.', '0', NULL, 'tasker', '0'),
(65, '2012-12-04 13:50:41', 'ПОЧИНИТЬ ТАСКЕР', '1', '2012-12-04 14:05:13', 'tasker', '10'),
(66, '2012-12-04 17:09:27', 'Добавить пагинацию', '0', NULL, 'tasker', '0'),
(67, '2012-12-11 23:44:52', 'http://diveintohtml5.info/', '0', NULL, 'html5', '0'),
(68, '2012-12-11 23:51:21', 'С хабра:\r\n\r\nbandit: Спасибо вам, с недавних пор жена начала интересоваться версткой… :) Думаю будет хорошим началом для нее.\r\nIndexator: Где вы таких жен находите? :C\r\nMAXH0: Надо взять обычную и перепрошить… ', '0', NULL, '', '0'),
(69, '2013-04-01 23:11:17', 'Ну типа текст, затестить на новом хостинге на bondvt04.p.ht - хостингер', '0', NULL, '', '0'),
(70, '2013-04-01 23:46:20', 'Разобраться, какого х отвалилась пагинация.', '0', NULL, 'tasker', '0'),
(71, '2013-04-01 23:48:03', 'ORDER BY WEEK(`datetime`) DESC, `priority` ASC, `datetime` DESC', '0', NULL, 'tasker', '0'),
(72, '2013-04-01 23:52:39', 'Скорость нужно тестировать с директивой SQL_NO_CACHE после SELECT.', '0', NULL, 'mysql', '0'),
(73, '2013-04-02 12:27:33', 'dl=адрес если плеер сможет отдавать в xml', '0', NULL, 'glavtop filmon work mcity', '0'),
(74, '2013-04-02 14:49:47', 'в конфиг админки вкл/выкл кеш', '0', NULL, 'zf2 админка', '0'),
(75, '2013-04-02 17:18:16', 'If additional work has to be done on the database results which cannot be expressed via the provided Zend\\Db\\Sql\\Select object you must extend the adapter and override the getItems() method.', '0', NULL, 'zf2 админка', '0'),
(76, '2013-04-02 23:24:44', 'http://www.youtube.com/watch?feature=player_embedded&v=KHkxkaYHUmc', '0', NULL, '', '0'),
(77, '2013-04-02 23:31:37', 'http://www.youtube.com/watch?feature=player_embedded&v=2MXMZ9Cj0ys', '0', NULL, '', '0'),
(78, '2013-04-03 14:37:08', 'Добавить в базу знаний, как паковать и распаковывать tar, rar и zip, а также как делать chmod только папкам или файлам. Также почехлить команду find.', '0', NULL, '', '0'),
(79, '2013-04-03 14:58:05', 'CREATE DATABASE `my_db` CHARACTER SET utf8 COLLATE utf8_general_ci;', '0', NULL, 'mysql', '0'),
(80, '2013-04-03 15:06:26', 'mysql -u USER-NAME -p -h localhost DATA-BASE-NAME < data.sql', '0', NULL, 'mysql', '0'),
(81, '2013-04-03 15:12:52', 'CREATE USER ''user-name''@''localhost'' IDENTIFIED BY ''password'';\r\nGRANT ALL PRIVILEGES ON * . * TO ''user-name''@''localhost'';', '0', NULL, 'mysql', '0'),
(82, '2013-04-03 15:17:32', 'gunzip file.gz', '0', NULL, 'linux rar zip gz tar archive архив', '0'),
(83, '2013-04-03 21:25:55', 'past participle - неправильные verbs', '0', NULL, 'english', '0'),
(84, '2013-04-03 23:03:58', 'Антонина Боровлева - гомеопат. Шибко умная баба из штатов.', '0', NULL, 'Алиса', '0'),
(85, '2013-04-03 23:59:36', 'Доступы в Dropbox', '0', NULL, '', '0'),
(86, '2013-04-04 09:39:17', 'внешние ссылки делать через js', '0', NULL, '', '0'),
(87, '2013-04-04 09:46:26', 'Кадыров', '0', NULL, '', '0'),
(88, '2013-04-04 15:32:31', 'bzgrep ''CREATE TABLE'' ~/Downloads/ibcser1_filmon.sql.bz2\r\nzcat dump.gz | mysql name_of_database', '0', NULL, 'gz bz gzip bzip zip rar tar archive архив', '0'),
(89, '2013-04-04 16:00:44', 'пинцет от заноз', '0', NULL, '', '0'),
(90, '2013-04-04 16:59:05', 'спизженный контент в no-index, а рядом свой контент с display:none - его уже не нужно читать пользователям, но нужно поисковикам.', '0', NULL, 'seo', '0'),
(91, '2013-04-05 10:18:54', 'Владислав говорил, что правильно хостинг делать так - 5 сайтов=5 db юзеров, ихние пароли и записаны в конфигах сайтов. А для общего юзера пароль есть только у админа, так что если и взломают один из сайтов, то другие не попадут под раздачу.', '0', NULL, 'db mysql администрирование', '0'),
(92, '2013-04-05 10:22:14', 'xxx: когда ходила в гости к своему парню, он всегда сажал меня в кресло перед компом\r\nxxx: говорил, что я такая красивая, что у его торрента на меня скорость поднимается', '0', NULL, '', '0'),
(93, '2013-04-05 12:25:26', 'пусть религиозники не пользуются благами цивилизации', '0', NULL, '', '0'),
(94, '2013-04-05 14:32:29', 'Кипр. Германия - где там море.', '0', NULL, '', '0'),
(95, '2013-04-05 14:34:48', 'http://habrahabr.ru/post/129310/', '0', NULL, '', '0'),
(96, '2013-04-05 16:43:26', 'http://bondvt04.p.ht/\r\n\r\n\r\nip: 31.170.165.10\r\n\r\nns:\r\nИмя Сервера 1: ns1.hostinger.ru 31.170.163.241\r\nИмя Сервера 2: ns2.hostinger.ru 64.191.115.234\r\nИмя Сервера 3: ns3.hostinger.ru 173.192.183.247\r\nИмя Сервера 4: ns4.hostinger.ru 31.170.164.249\r\n\r\n\r\nftp:\r\n31.170.165.10\r\nftp.bondvt04.p.ht\r\nuser: u987603361\r\npass: Anatoliyvt04\r\n\r\ncpanel:\r\nhttp://cpanel.hostinger.ru\r\nemail: bondvt04@gmail.com\r\npass: Anatoliyvt04\r\n\r\n\r\nИнформация о Сервере\r\nИмя Сервера: server17.hostinger.ru\r\nIP Адрес Сервера: 31.170.164.26\r\n', '0', NULL, '', '0'),
(97, '2013-04-05 17:40:54', 'учет средств. сколько денег на что.', '0', NULL, '', '0'),
(98, '2013-04-06 12:55:28', 'http://joyreactor.cc/post/725947', '0', NULL, 'Алиса', '0'),
(99, '2013-04-06 13:15:42', 'Звонок на телефон постепенно нарастающий', '0', NULL, '', '0'),
(100, '2013-04-06 22:03:18', 'weird - странный. как в серии s02e13b adventure time про принцессу. протяжно - она такая страаанная. shes so weeeeird.\r\n\r\nчто-то я очкую - some weird go in on..', '0', NULL, 'english', '0'),
(101, '2013-04-10 13:53:31', 'find -name  "*update*" -print | less', '0', NULL, 'linux find', '0'),
(102, '2013-04-11 13:29:58', 'НЛП''шка', '0', NULL, '', '0'),
(103, '2013-04-11 17:06:55', '$(''.estate_map_container_main'').append( $(''.estate_map'') );\r\nперемещаем элемент в другой нод. т.е, например, уже инициализированную галерейку перемещаем в другой div', '0', NULL, 'js jquery', '0'),
(104, '2013-04-11 17:54:40', 'tuning-primer - для диагностирования mysql сервера. запускаем и смотрим рекомендации.', '0', NULL, 'mysql linux console', '0'),
(105, '2013-04-11 20:31:47', 'Классическая арийская музыка такая, как \r\nВагнер – Полет Валькирий ', '0', NULL, 'музыка', '0'),
(106, '2013-04-12 20:02:52', 'Раздел в tasker типа "проверять" - туда ссылки на страницы, где мне могут ответить. например: http://joyreactor.cc/post/736445', '0', NULL, 'tasker', '0'),
(107, '2013-04-12 20:07:07', 'http://joyreactor.cc/post/736293', '0', NULL, 'иллюзия', '0'),
(108, '2013-04-12 20:17:27', 'http://joyreactor.cc/post/736248\r\nonioncat - IP-Transparent Tor hidden service connector\r\ntor - http://ru.wikipedia.org/wiki/Tor', '0', NULL, 'цензура важно tor onion', '0'),
(109, '2013-04-12 20:23:15', 'http://joyreactor.cc/post/736148', '0', NULL, 'просмотреть', '0'),
(110, '2013-04-12 21:22:38', 'Напомнило:\r\nСрочно требуется опытный хакер! Резюме оставлять на рабочем столе нашего сервера. ', '0', NULL, 'humor joke', '0'),
(111, '2013-04-12 22:04:56', 'http://blackbookskate.com/', '0', NULL, 'sk8', '0'),
(112, '2013-04-14 14:30:30', 'http://www.youtube.com/watch?feature=player_embedded&v=JIS8in3su2c', '0', NULL, 'vim', '0'),
(113, '2013-04-15 17:01:05', 'полнотекстовый поиск', '0', NULL, 'md', '0'),
(114, '2013-04-15 17:01:15', 'креатин', '0', NULL, 'md', '0'),
(115, '2013-04-16 18:51:12', 'http://media.habrahabr.ru/images/thumbs/special/microsoft/ie10/f5/54/42/1813/medium_1813.jpg', '0', NULL, 'ie web', '0'),
(116, '2013-04-16 21:33:31', 'http://img3.joyreactor.cc/pics/comment/%D1%82%D1%80%D0%B0%D0%BD%D0%B7%D0%B8%D1%81%D1%82%D0%BE%D1%80-%D0%9A%D0%BB%D1%83%D0%B1-%D1%80%D0%B0%D0%B4%D0%B8%D0%BE%D0%BB%D1%8E%D0%B1%D0%B8%D1%82%D0%B5%D0%BB%D0%B5%D0%B9-%D1%81%D0%B4%D0%B5%D0%BB%D0%B0%D0%BB-%D1%81%D0%B0%D0%BC-%D0%BF%D0%B5%D1%81%D0%BE%D1%87%D0%BD%D0%B8%D1%86%D0%B0-422513.jpeg\r\n\r\nhttp://img1.joyreactor.cc/pics/post/full/%D1%82%D1%80%D0%B0%D0%BD%D0%B7%D0%B8%D1%81%D1%82%D0%BE%D1%80-%D0%9A%D0%BB%D1%83%D0%B1-%D1%80%D0%B0%D0%B4%D0%B8%D0%BE%D0%BB%D1%8E%D0%B1%D0%B8%D1%82%D0%B5%D0%BB%D0%B5%D0%B9-%D1%81%D0%B4%D0%B5%D0%BB%D0%B0%D0%BB-%D1%81%D0%B0%D0%BC-%D0%BF%D0%B5%D1%81%D0%BE%D1%87%D0%BD%D0%B8%D1%86%D0%B0-651461.png', '0', NULL, 'диод транзистор', '0'),
(117, '2013-04-16 23:06:58', 'Лучшее — враг хорошего: сначала просто сделайте, потом сделайте правильно, потом сделайте лучше;\r\nУбивайте в зародыше, не бойтесь начать всё сначала. Чем быстрее ошибётесь, тем быстрее научитесь;', '0', NULL, '', '0'),
(118, '2013-04-17 20:38:05', 'http://spaceengine.org/', '0', NULL, 'space космос', '0'),
(119, '2013-04-17 21:57:38', 'http://lmgtfy.com/?q=yii+framework', '0', NULL, 'google гугл поищу+за+тебя', '0'),
(120, '2013-04-21 15:01:31', 'первая помощь', '0', NULL, 'task', '0'),
(121, '2013-04-24 15:27:00', 'http://www.dbforums.com/php/1216671-php-mysql-load-data-file.html', '0', NULL, 'mysql', '0'),
(122, '2013-04-24 18:03:17', 'http://www.youtube.com/watch?feature=player_embedded&v=LRGz2pDjfKI#', '0', NULL, 'про', '0'),
(123, '2013-04-24 18:03:46', 'http://habrahabr.ru/post/148446/', '0', NULL, 'про', '0'),
(124, '2013-04-24 18:37:38', 'START TRANSACTION;\r\nSELECT @num:=COUNT(`id`) FROM `hlw_user`;\r\nSELECT @num2:=COUNT(`id`) FROM `hlw_user`;\r\nSELECT @num3:=COUNT(`id`) FROM `hlw_user`;\r\nSELECT concat(@num,@num2,@num3) as str;\r\nCOMMIT;', '0', NULL, 'mysql', '0'),
(125, '2013-04-26 15:57:59', 'QA - quality assurance, тестировщик', '0', NULL, '', '0'),
(126, '2013-04-26 17:53:31', 'http://javascript.ru/unsorted/selenium-rc', '0', NULL, 'selenium php unittest', '0'),
(127, '2013-04-27 13:04:28', 'http://joyreactor.cc/post/757222', '0', NULL, '', '0'),
(128, '2013-04-27 13:15:29', 'http://joyreactor.cc/post/167006', '0', NULL, '', '0'),
(129, '2013-04-27 13:27:19', 'http://joyreactor.cc/post/756784', '0', NULL, 'Египет Алиса', '0'),
(130, '2013-04-27 13:39:23', 'http://joyreactor.cc/post/756603', '0', NULL, '', '0'),
(131, '2013-04-27 13:53:06', 'http://joyreactor.cc/post/756310', '0', NULL, '', '0'),
(132, '2013-04-27 14:07:11', 'http://www.youtube.com/watch?feature=player_embedded&v=SwbP9WLX3fY#!', '0', NULL, '', '0'),
(133, '2013-04-27 14:08:03', 'http://joyreactor.cc/post/755746', '0', NULL, 'Алиса', '0'),
(134, '2013-04-27 14:26:36', 'http://joyreactor.cc/post/755337', '0', NULL, '', '0'),
(135, '2013-04-29 17:33:15', 'http://habrahabr.ru/post/31468/', '0', NULL, 'php профилировка profiling', '0'),
(136, '2013-04-29 18:10:19', 'http://pld.name/installation-xdebug-in-netbeans-for-debug-php-code/', '0', NULL, 'xdebug php', '0');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks_tasks_tags`
--

CREATE TABLE IF NOT EXISTS `tasks_tasks_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `use` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tasks_tasks_tags`
--

INSERT INTO `tasks_tasks_tags` (`id`, `task_id`, `tag_id`, `use`) VALUES
(1, 10, 1, '0'),
(2, 10, 2, '0'),
(3, 10, 1, '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
