-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 29 2022 г., 13:49
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `category_id` int NOT NULL,
  `name` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`category_id`, `name`) VALUES
(3, 'Laptop'),
(1, 'Phones'),
(4, 'Smart Watch'),
(2, 'Tablets'),
(5, 'TVs');

-- --------------------------------------------------------

--
-- Структура таблицы `items`
--

CREATE TABLE `items` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `price` double UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `items`
--

INSERT INTO `items` (`id`, `name`, `price`, `date`, `category_id`) VALUES
(1, 'Samsung Galaxy M32 6/128GB', 8999, '2022-09-13', 1),
(2, 'Apple iPhone 14 128GB', 41499, '2022-09-14', 1),
(3, 'Samsung Galaxy S22 8/128GB', 33199, '2022-09-15', 1),
(4, 'Xiaomi Redmi 10 2022 4/128GB', 7699, '2022-09-14', 1),
(5, 'Nokia G11 4/64', 5499, '2022-09-09', 1),
(6, 'Huawei MatePad T10 (2nd Gen) Wi-Fi 64GB', 6699, '2022-09-21', 2),
(7, 'Lenovo Tab M8 HD 2/32 LTE', 6799, '2022-09-22', 2),
(8, 'Samsung Galaxy Tab S6 Lite Wi-Fi 64GB', 12499, '2022-09-13', 2),
(9, 'Huawei Matepad 10.4 2nd Gen 4+128 WIFI', 11999, '2022-09-08', 2),
(10, 'Xiaomi Mi Pad 5 Wi-Fi 6/128GB', 14999, '2022-09-27', 2),
(11, 'ASUS Laptop X515JA-BQ4074', 22999, '2022-09-10', 3),
(12, 'Acer Aspire 5 A515-56G-50WE', 29499, '2022-09-17', 3),
(13, 'ASUS Laptop X515JA-EJ1814', 18499, '2022-09-12', 3),
(14, 'ASUS TUF Gaming F15 FX506LH-HN236', 37999, '2022-09-15', 3),
(15, 'Apple MacBook Pro 16\" M1 Pro 512GB 2021', 114999, '2022-09-15', 3),
(16, 'Huawei Watch GT3 42mm', 8699, '2022-09-17', 4),
(17, 'Samsung Galaxy Watch 5 40mm', 10999, '2022-09-10', 4),
(18, 'Huawei Watch Fit', 3499, '2022-09-04', 4),
(19, 'Apple Watch SE (2022) GPS 40mm', 12599, '2022-09-15', 4),
(20, 'Michael Kors Gen 6', 16999, '2022-09-12', 4),
(21, 'Samsung UE43AU7100UXUA', 17899, '2022-09-02', 5),
(22, 'Hisense 43A63H UltraHD 4K SmartTV', 13999, '2022-09-01', 5),
(23, 'Hoffson A32HD500T2', 4799, '2022-09-04', 5),
(24, 'Xiaomi Mi TV P1 32 Black', 8999, '2022-09-14', 5),
(25, 'Akai UA32HD19T2', 5399, '2022-09-20', 5);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_category_id_uindex` (`category_id`),
  ADD UNIQUE KEY `category_name_uindex` (`name`);

--
-- Индексы таблицы `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `items_id_uindex` (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `items`
--
ALTER TABLE `items`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
