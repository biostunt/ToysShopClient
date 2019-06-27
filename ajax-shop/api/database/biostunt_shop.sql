-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 27 2019 г., 16:32
-- Версия сервера: 5.7.21-20-beget-5.7.21-20-1-log
-- Версия PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `biostunt_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--
-- Создание: Июн 25 2019 г., 14:04
-- Последнее обновление: Июн 25 2019 г., 14:15
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `name` text NOT NULL,
  `count` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `price`, `name`, `count`, `image`) VALUES
(0, 559, 'ыоръюцла', 1, 'https://yandex.ru/images/U1hzQ3049/ad80e3jL/EHvZpT1gkcspnRyTRUJEpXnnF-lxK8ymtSBdgTF_TgWjEJkQt_b8A7qOhzCdnt5QWZiZFxB4tDrCIIFLA9uoDoEf6KXNRERPbAwJ5_F2wRAdtwdMdO6J8sCw7fFwX15EJvHA'),
(1, 340, 'ччфйпхде', 1, 'http://data.techtimes.com/data/images/full/148176/lego-doctor-who-inside-jpg.jpg'),
(2, 168, 'зьещфърю', 1, 'https://avatars.mds.yandex.net/get-pdb/1478550/e4180c4c-df86-4281-8a7f-2df2dbcbda8c/s1200?webp=false'),
(3, 462, 'аьъфсчжя', 1, 'https://d3fa68hw0m2vcc.cloudfront.net/25d/173332447.jpeg'),
(4, 793, 'гщррэкуо', 1, 'https://avatars.mds.yandex.net/get-pdb/219263/985088b4-e85d-42ed-a53d-036cc3a8d756/s1200?webp=false'),
(5, 845, 'ечндтяьа', 1, 'https://avatars.mds.yandex.net/get-marketpic/247472/market_PiaDeQOsc45ovdLjopiHxA/orig'),
(6, 116, 'зйвмэщрв', 1, 'https://www.toypiter.ru/published/publicdata/B1191221/attachments/SC/products_pictures/70168_enl.png'),
(7, 468, 'жщйымъюо', 1, 'https://luxtec.ru/upload/iblock/177/177cfc246a09fdae5a7e4533b5d7b9f2.jpg'),
(8, 127, 'аанлэнсф', 1, 'https://avatars.mds.yandex.net/get-pdb/1646315/f7039b66-a866-477c-abb4-d37c34db2a21/s1200'),
(9, 226, 'пжвжкижу', 1, 'https://avatars.mds.yandex.net/get-pdb/1478550/e4180c4c-df86-4281-8a7f-2df2dbcbda8c/s1200?webp=false'),
(10, 588, 'ьчьщнксм', 1, 'https://avatars.mds.yandex.net/get-pdb/1756436/10d14425-18c2-41d1-9da1-b606201e5472/s1200?webp=false'),
(11, 820, 'тившйдфх', 1, 'https://yandex.ru/images/U1hzQ1206/ad80e3jL/EHvZpT1gkcspnRyTRUJEpXnnF-lxK8ymtSBdgTF_TgWjEUlBs7O4F59L5uCcbv5gCVkM5yFM0T70xrfu1ltd2fF7SQJaBKM_Gul-QgYnNQHIItbpE'),
(12, 158, 'шгэдьржю', 1, 'https://www.toypiter.ru/published/publicdata/B1191221/attachments/SC/products_pictures/70168_enl.png'),
(13, 706, 'еъщелгъш', 1, 'https://avatars.mds.yandex.net/get-marketpic/367259/market_fxCPiGsCob8up1YzltSTWg/orig'),
(14, 959, 'тбъвйгыщ', 1, 'https://umitoy.ru/upload/iblock/bf6/bf66fdb704574bb39b980202e6b04723.jpg'),
(15, 397, 'рьыбпжъы', 1, 'https://www.1shop.lv/files/products/original/60186-2.jpg'),
(16, 716, 'нхыфэгуь', 1, 'https://avatars.mds.yandex.net/get-pdb/1478550/e4180c4c-df86-4281-8a7f-2df2dbcbda8c/s1200?webp=false'),
(17, 128, 'рьзбпнъб', 1, 'https://avatars.mds.yandex.net/get-pdb/1602331/1ed1787c-1d5d-4645-839f-e2a09b1bad48/s1200'),
(18, 456, 'зчащэххю', 1, 'https://www.brickmerge.de/img/sets/l/LEGO_10712_alt10.jpg'),
(19, 958, 'рапзрбдд', 1, 'https://avatars.mds.yandex.net/get-marketpic/247472/market_PiaDeQOsc45ovdLjopiHxA/orig'),
(20, 516, 'хпжеунлц', 1, 'https://umitoy.ru/upload/iblock/bf6/bf66fdb704574bb39b980202e6b04723.jpg'),
(21, 544, 'сгянкьню', 1, 'https://www.toypiter.ru/published/publicdata/B1191221/attachments/SC/products_pictures/70168_enl.png'),
(22, 919, 'тйьжрйюй', 1, 'https://yandex.ru/images/U1hzQ1206/ad80e3jL/EHvZpT1gkcspnRyTRUJEpXnnF-lxK8ymtSBdgTF_TgWjEUlBs7O4F59L5uCcbv5gCVkM5yFM0T70xrfu1ltd2fF7SQJaBKM_Gul-QgYnNQHIItbpE'),
(23, 793, 'лцюароке', 1, 'https://avatars.mds.yandex.net/get-marketpic/367259/market_fxCPiGsCob8up1YzltSTWg/orig'),
(24, 125, 'аяаккювб', 1, 'https://avatars.mds.yandex.net/get-pdb/1478550/e4180c4c-df86-4281-8a7f-2df2dbcbda8c/s1200?webp=false'),
(25, 260, 'ьчашрчщц', 1, 'https://avatars.mds.yandex.net/get-pdb/1756436/10d14425-18c2-41d1-9da1-b606201e5472/s1200?webp=false'),
(26, 847, 'ждыиэупц', 1, 'https://yandex.ru/images/U1hzQ3049/ad80e3jL/EHvZpT1gkcspnRyTRUJEpXnnF-lxK8ymtSBdgTF_TgWjEJkQt_b8A7qOhzCdnt5QWZiZFxB4tDrCIIFLA9uoDoEf6KXNRERPbAwJ5_F2wRAdtwdMdO6J8sCw7fFwX15EJvHA'),
(27, 951, 'фвамбдэф', 1, 'https://luxtec.ru/upload/iblock/177/177cfc246a09fdae5a7e4533b5d7b9f2.jpg'),
(28, 939, 'сабггпиа', 1, 'https://www.toypiter.ru/published/publicdata/B1191221/attachments/SC/products_pictures/70168_enl.png'),
(29, 462, 'йакдевыь', 1, 'https://avatars.mds.yandex.net/get-pdb/1646315/f7039b66-a866-477c-abb4-d37c34db2a21/s1200');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
