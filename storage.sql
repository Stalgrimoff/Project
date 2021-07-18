-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3307
-- Время создания: Июл 16 2021 г., 12:33
-- Версия сервера: 8.0.19
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `storage`
--

-- --------------------------------------------------------

--
-- Структура таблицы `access`
--

CREATE TABLE `access` (
  `id_access` int NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `access` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `access`
--

INSERT INTO `access` (`id_access`, `login`, `password`, `access`) VALUES
(1, 'admin', 'admin1', 'admin'),
(2, 'user', 'user1', 'user'),
(3, 'guest', 'guest1', 'guest');

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE `client` (
  `id_client` int NOT NULL,
  `FIO` varchar(30) NOT NULL,
  `TEL` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id_client`, `FIO`, `TEL`) VALUES
(1, 'Корнеев К.К.', 89621498752),
(2, 'Иванов К.Т.', 89647512345),
(3, 'Задворнов Е. М.', 89214576255);

-- --------------------------------------------------------

--
-- Структура таблицы `placement`
--

CREATE TABLE `placement` (
  `id_place` int NOT NULL,
  `warehouse` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `string` int NOT NULL,
  `position` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `placement`
--

INSERT INTO `placement` (`id_place`, `warehouse`, `string`, `position`) VALUES
(1, 'Склад1', 6, 7),
(2, 'Москва1', 11, 2);

-- --------------------------------------------------------

--
-- Дублирующая структура для представления `prod`
-- (См. Ниже фактическое представление)
--
CREATE TABLE `prod` (
`id_prod` int
,`warehouse` varchar(40)
,`FIO` varchar(30)
,`name_tarif` varchar(40)
,`summa` int
);

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id_prod` int NOT NULL,
  `id_place` int NOT NULL,
  `id_client` int NOT NULL,
  `id_tariff` int NOT NULL,
  `summa` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id_prod`, `id_place`, `id_client`, `id_tariff`, `summa`) VALUES
(3, 1, 1, 3, 7584),
(4, 2, 2, 4, 4500);

-- --------------------------------------------------------

--
-- Структура таблицы `tariff`
--

CREATE TABLE `tariff` (
  `id_tariff` int NOT NULL,
  `name_tarif` varchar(40) NOT NULL,
  `weight` float(8,2) NOT NULL,
  `storage_life` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tariff`
--

INSERT INTO `tariff` (`id_tariff`, `name_tarif`, `weight`, `storage_life`) VALUES
(3, 'Средний', 110.00, '20:45:39'),
(4, 'Лайт', 50.00, '18:00:00');

-- --------------------------------------------------------

--
-- Структура для представления `prod`
--
DROP TABLE IF EXISTS `prod`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`127.0.0.1` SQL SECURITY DEFINER VIEW `prod`  AS  select `product`.`id_prod` AS `id_prod`,`placement`.`warehouse` AS `warehouse`,`client`.`FIO` AS `FIO`,`tariff`.`name_tarif` AS `name_tarif`,`product`.`summa` AS `summa` from (((`product` join `placement`) join `client`) join `tariff`) where ((`product`.`id_place` = `placement`.`id_place`) and (`product`.`id_client` = `client`.`id_client`) and (`product`.`id_tariff` = `tariff`.`id_tariff`)) ;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id_access`);

--
-- Индексы таблицы `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Индексы таблицы `placement`
--
ALTER TABLE `placement`
  ADD PRIMARY KEY (`id_place`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_prod`),
  ADD UNIQUE KEY `id_place` (`id_place`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_tariff` (`id_tariff`);

--
-- Индексы таблицы `tariff`
--
ALTER TABLE `tariff`
  ADD PRIMARY KEY (`id_tariff`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `access`
--
ALTER TABLE `access`
  MODIFY `id_access` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `placement`
--
ALTER TABLE `placement`
  MODIFY `id_place` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id_prod` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `tariff`
--
ALTER TABLE `tariff`
  MODIFY `id_tariff` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`id_tariff`) REFERENCES `tariff` (`id_tariff`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`id_place`) REFERENCES `placement` (`id_place`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
