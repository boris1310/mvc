-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:8889
-- Время создания: Ноя 13 2021 г., 16:17
-- Версия сервера: 5.7.32
-- Версия PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mydb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Adres`
--

CREATE TABLE `Adres` (
  `id` smallint(6) NOT NULL,
  `userId` smallint(6) NOT NULL,
  `userName` varchar(100) DEFAULT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Adres`
--

INSERT INTO `Adres` (`id`, `userId`, `userName`, `city`, `address`, `email`, `phone`) VALUES
(68, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+380000000000'),
(69, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+380000000000'),
(70, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+380000000000'),
(71, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+380000000000'),
(72, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+380000000000'),
(73, 2, 'qwewq qweqw', 'qweqwewq', 'wqewqewqewq', 'boris@boris.boris.ua', '+38(234)234-32-43'),
(74, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+380000000000'),
(75, 2, 'wew wew', 'Харьков', 'йцуй', 'boris@boris.boris.ua', '+381231212312'),
(76, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+380000000000'),
(77, 2, 'wew wew', 'Харьков', 'йцуй', 'boris@boris.boris.ua', '+381231212312'),
(78, 2, 'wew wew', 'Харьков', 'йцуй2', 'boris@boris.boris.ua', '+381231212312'),
(79, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+380000000000'),
(80, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+380000000000'),
(81, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+380000000000'),
(82, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+380000000000'),
(83, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+380000000000'),
(84, 2, 'qweqwe qweqweqw', 'wqeqwe', 'qweqweqw', 'boris@boris.boris.ua', '+381231212312'),
(85, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+380000000000'),
(86, 2, 'qweqwe qweqweqw', 'wqeqwe', 'qweqweqw', 'boris@boris.boris.ua', '+381231212312'),
(87, 2, 'qweqwe qweqweqw', 'wqeqwe', 'qweqweqw', 'boris@boris.boris.ua', '+381231212312'),
(88, 2, 'qweqwe qweqweqw', 'wqeqwe', 'qweqweqw', 'boris@boris.boris.ua', '+381231212312'),
(89, 2, 'wew wew', 'Харьков', 'йцуй', 'boris@boris.boris.ua', '+381231212312'),
(90, 2, 'wew wew', 'Харьков', 'йцуй3', 'boris@boris.boris.ua', '+381231212312'),
(91, 2, 'qweqwe qweqweqw', 'wqeqwe', 'qweqweqw', 'boris@boris.boris.ua', '+381231212312'),
(92, 2, 'qweqweqw qweqweqw', 'wqeqw', 'wqeqw', 'boris@boris.boris.ua', '+380000000000'),
(93, 2, 'wqewqe wqeqweqw', 'qweqweqw', 'ewqeqw', 'boris@boris.boris.ua', '+380000000000'),
(94, 2, 'qwewq qweqw', 'qweqwewq', 'wqewqewqewq', 'boris@boris.boris.ua', '+382342343243'),
(95, 2, '32423423 23423423', '23423423', '23423423', 'boris@boris.boris.ua', '+381231212312'),
(96, 2, 'qwewq qweqw', 'qweqwewq', 'wqewqewqewq', 'boris@boris.boris.ua', '+382342343243'),
(97, 2, 'qweqwe qweqweqw', 'wqeqwe', 'qweqweqw', 'boris@boris.boris.ua', '+381231212312'),
(98, 2, 'qweqweqw qweqweqw', 'wqeqw', 'wqeqw', 'boris@boris.boris.ua', '+380000000000'),
(99, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+380000000000'),
(100, 2, 'qweqwe qweqweqw', 'wqeqwe', 'qweqweqw', 'boris@boris.boris.ua', '+381231212312'),
(101, 2, 'qweqwe qweqweqw', 'wqeqwe', 'qweqweqw', 'boris@boris.boris.ua', '+381231212312'),
(102, 2, '32423423 23423423', '23423423', '23423423', 'boris@boris.boris.ua', '+381231212312'),
(103, 2, 'qwewq qweqw', 'qweqwewq', 'wqewqewqewq', 'boris@boris.boris.ua', '+382342343243'),
(104, 2, 'qweqweqw qweqweqw', 'wqeqw', 'wqeqw', 'boris@boris.boris.ua', '+380000000000'),
(105, 2, 'wqewqe wqeqweqw', 'qweqweqw', 'ewqeqw', 'boris@boris.boris.ua', '+380000000000'),
(106, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+38(234)234-23-432'),
(107, 2, 'qwewq qweqw', 'qweqwewq', 'wqewqewqewq', 'boris@boris.boris.ua', '+382342343243'),
(108, 2, 'we2 wew2', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+38(947)899-73-099'),
(109, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+382342342343'),
(110, 8, 'qweqw qweqw', 'qweqw', 'qweqw', 'boris@boris.boris.ua', '+380000000000'),
(111, 28, 'qwewq qweqw', 'qweqwewq', 'wqewqewqewq', 'boris@boris.boris.ua', '+382342343243'),
(112, 28, 'qwewq qweqw', 'qweqwewq', 'wqewqewqewq', 'boris@boris.boris.ua', '+382342343243'),
(113, 2, 'wew wew', 'Харьков', 'qwewew', 'boris@boris.boris.ua', '+380000000000'),
(114, 2, 'qwewq qweqw', 'qweqwewq', 'wqewqewqewq', 'boris@boris.boris.ua', '+382342343243'),
(115, 2, '32423423 23423423', '23423423', '23423423', 'boris@boris.boris.ua', '+381231212312');

-- --------------------------------------------------------

--
-- Структура таблицы `Categories`
--

CREATE TABLE `Categories` (
  `idCategory` int(11) NOT NULL,
  `cat_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Categories`
--

INSERT INTO `Categories` (`idCategory`, `cat_name`) VALUES
(1, 'Телефоны'),
(2, 'Планшеты'),
(3, 'Ноутбуки'),
(4, 'Компьютеры'),
(5, 'Наушники'),
(6, 'Телевизоры'),
(9, 'Другое');

-- --------------------------------------------------------

--
-- Структура таблицы `Comments`
--

CREATE TABLE `Comments` (
  `idComments` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ProductId` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `manufacturer`
--

CREATE TABLE `manufacturer` (
  `idmanufacturer` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `manufacturer`
--

INSERT INTO `manufacturer` (`idmanufacturer`, `name`) VALUES
(1, 'Samsung'),
(2, 'Apple'),
(3, 'Nokia'),
(4, 'Dell'),
(5, 'LG'),
(6, 'Sony'),
(7, 'Xiaomi'),
(8, 'Meizu'),
(9, 'Asus'),
(10, 'Acer');

-- --------------------------------------------------------

--
-- Структура таблицы `Order`
--

CREATE TABLE `Order` (
  `idOrder` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `Products` varchar(300) NOT NULL,
  `addressId` smallint(6) DEFAULT NULL,
  `statusOrder` varchar(20) NOT NULL,
  `statusPayment` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Order`
--

INSERT INTO `Order` (`idOrder`, `userId`, `Products`, `addressId`, `statusOrder`, `statusPayment`, `created_at`) VALUES
(1, 2, '[33,34,35]', 68, 'Добавлен', 'Оплачен', '2021-11-10 19:29:30'),
(2, 2, '[33,34,35]', 68, 'Добавлен', 'Оплачен', '2021-11-10 20:23:50'),
(3, 2, '[33,34,35]', 68, 'Добавлен', 'Ждет оплаты', '2021-11-10 20:28:36'),
(4, 2, '[33,34,35]', 68, 'Добавлен', 'Ждет оплаты', '2021-11-10 20:31:05'),
(5, 2, '[33,34,35]', 68, 'Добавлен', 'Оплачен', '2021-11-10 20:35:50'),
(6, 2, '[33,34,35]', 68, 'Добавлен', 'Ждет оплаты', '2021-11-10 20:41:53'),
(7, 2, '[\"34\",\"33\",\"35\",\"36\"]', 68, 'Добавлен', 'Ждет оплаты', '2021-11-10 20:47:57'),
(8, 2, '[\"34\",\"35\"]', 68, 'Добавлен', 'Оплачен', '2021-11-10 20:51:21'),
(9, 2, '[\"34\",\"33\",\"35\"]', 68, 'Добавлен', 'Оплачен', '2021-11-11 01:51:07'),
(10, 2, '[\"33\",\"34\",\"35\",\"36\"]', 68, 'Добавлен', 'Оплачен', '2021-11-11 01:51:28'),
(11, 2, '[\"35\"]', 68, 'Добавлен', 'Ждет оплаты', '2021-11-11 01:51:42'),
(12, 2, '[\"34\"]', 68, 'Добавлен', 'Оплачен', '2021-11-11 01:51:58'),
(13, 2, '[\"35\"]', 68, 'Добавлен', 'Оплачен', '2021-11-11 01:52:12'),
(14, 2, '[\"34\",\"35\"]', 68, 'Добавлен', 'Оплачен', '2021-11-11 01:52:30'),
(15, 2, '[\"34\"]', 68, 'Добавлен', 'Ждет оплаты', '2021-11-11 01:53:04'),
(16, 2, '[\"35\"]', 68, 'Добавлен', 'Ждет оплаты', '2021-11-11 01:53:18'),
(17, 2, '[\"34\"]', 68, 'Добавлен', 'Оплачен', '2021-11-11 01:53:32'),
(18, 2, '[]', 68, 'Добавлен', 'Ждет оплаты', '2021-11-11 01:53:45'),
(19, 2, '[\"34\"]', 68, 'Добавлен', 'Оплачен', '2021-11-11 01:54:03'),
(20, 2, '[\"35\"]', 68, 'Добавлен', 'Оплачен', '2021-11-11 01:54:20'),
(21, 2, '[\"35\"]', 68, 'Добавлен', 'Ждет оплаты', '2021-11-11 01:54:35'),
(22, 2, '[\"35\"]', 68, 'Добавлен', 'Ждет оплаты', '2021-11-11 01:54:53'),
(23, 2, '[]', 68, 'Добавлен', 'Ждет оплаты', '2021-11-11 02:04:40'),
(24, 2, '[\"35\"]', 68, 'Добавлен', 'Оплачен', '2021-11-11 02:05:55'),
(25, 2, '[34]', 68, 'Добавлен', 'Оплачен', '2021-11-11 20:44:33'),
(26, 2, '[\"33\",\"34\",\"35\"]', 68, 'Добавлен', 'Ждет оплаты', '2021-11-11 21:11:18'),
(27, 2, '[33,34,35]', 68, 'Добавлен', 'Ждет оплаты', '2021-11-12 01:25:50'),
(28, 8, '[35,34,33]', 110, 'Добавлен', 'Оплачен', '2021-11-12 02:56:14'),
(29, 2, '[36,35,34,33,37,38,39]', 68, 'Добавлен', 'Оплачен', '2021-11-13 16:07:43'),
(30, 2, '[36,35,34,33,37,38,39]', 68, 'Добавлен', 'Оплачен', '2021-11-13 16:07:56'),
(31, 2, '[36,35,34,33]', 68, 'Добавлен', 'Оплачен', '2021-11-13 16:10:06');

-- --------------------------------------------------------

--
-- Структура таблицы `Product`
--

CREATE TABLE `Product` (
  `idProduct` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(45) NOT NULL,
  `ManufacturerId` int(11) NOT NULL,
  `CategoryId` int(11) NOT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `Product`
--

INSERT INTO `Product` (`idProduct`, `name`, `description`, `price`, `ManufacturerId`, `CategoryId`, `photo`, `created_at`) VALUES
(33, 'Macbook Pro 121312', 'Macbook Pro Description,Macbook Pro Description,Macbook Pro Description,Macbook Pro Description.', '31000', 2, 3, 'public/img/products/macbook-pro.jpeg', '2021-10-25 08:51:08'),
(34, 'Asus ROG', 'Asus ROG Description,Asus ROG Description,Asus ROG Description,Asus ROG Description,Asus ROG Description.', '34000', 9, 3, 'public/img/products/6.jpeg', '2021-10-25 08:52:38'),
(35, 'MSI 1', 'MSI 1 Description,MSI 1 Description,MSI 1 Description,MSI 1 Description,MSI 1 Description,MSI 1 Description.', '26000', 1, 3, 'public/img/products/7.jpeg', '2021-10-25 08:53:38'),
(36, 'MSI 2', 'MSI 2 Description,MSI 2 Description,MSI 2 Description,MSI 2 Description,MSI 2 Description,MSI 2 Description.', '23000', 1, 3, 'public/img/products/4.jpeg', '2021-10-25 08:54:27'),
(37, 'Lenovo 1', 'Lenovo 1 Description,Lenovo 1 Description,Lenovo 1 Description,Lenovo 1 Description,Lenovo 1 Description.', '13000', 1, 3, 'public/img/products/5.jpeg', '2021-10-25 08:58:01'),
(38, 'Samsung 2', 'Samsung 2 Description,Samsung 2 Description,Samsung 2 Description,Samsung 2 Description.', '20000', 1, 3, 'public/img/products/1.jpeg', '2021-10-25 08:58:48'),
(39, 'Lenovo 2', 'Lenovo 2 Description,Lenovo 2 Description,Lenovo 2 Description,Lenovo 2 Description,Lenovo 2 Description.', '15000', 1, 3, 'public/img/products/2.jpeg', '2021-10-25 08:59:53'),
(40, 'Dell 2', 'Отличный ноутбук', '15000', 4, 3, 'public/img/products/2.jpeg', '2021-10-25 09:51:44'),
(41, 'Macbook Pro', 'Mackbook', '30000', 2, 3, 'public/img/products/macbook-pro.jpeg', '2021-11-04 20:36:52'),
(42, 'IMac 2020 ', 'IMac 2020 Description', '50000', 2, 4, 'public/img/products/imac.jpeg', '2021-11-05 16:15:03'),
(45, 'qweqweqw', 'wqeqweqweq', '123', 2, 2, 'public/img/products/macbook-pro.jpeg', '2021-11-13 15:49:38'),
(46, 'wqeqweqw', 'qweqweqw', '21312', 2, 1, 'public/img/products/logo.png', '2021-11-13 16:11:03');

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE `User` (
  `idUser` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  `role` set('admin','user') NOT NULL DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`idUser`, `name`, `email`, `phone`, `password`, `role`, `created_at`) VALUES
(2, 'boris', 'boryafedyu@gmail.com', '+38(066)105-73-98', '072920817438d6e3463cd1cd7a5b23e4', 'admin', '2021-10-18 20:17:37'),
(3, 'boris', 'boryafedyu1@gmail.com', NULL, '072920817438d6e3463cd1cd7a5b23e4', 'user', '2021-10-18 20:24:44'),
(4, 'Ivan', 'ivansuchoy@gmail.ru', NULL, '072920817438d6e3463cd1cd7a5b23e4', 'user', '2021-10-18 20:30:36'),
(5, 'Boris', 'admin@test.test', NULL, '585e3e07df951212519f36eb0522a05d', 'user', '2021-10-18 23:55:12'),
(6, 'йцуц', 'Boris1310@gmail.com', NULL, 'ea48576f30be1669971699c09ad05c94', 'user', '2021-11-09 16:28:18'),
(7, 'qweqw', 'sdsad@sds.ds', '32423434343', 'f5bb0c8de146c67b44babbf4e6584cc0', 'user', '2021-11-09 22:09:43'),
(8, 'test', 'boris@boris.boris.ua', '+38(063) 618-52-52', 'f5bb0c8de146c67b44babbf4e6584cc0', 'user', '2021-11-09 22:20:12'),
(12, 'Boris', 'test@test.com', '+380661057398', 'f5bb0c8de146c67b44babbf4e6584cc0', 'user', '2021-11-09 22:26:58'),
(14, 'ewew', 'bbbbb@gma.ww', '4324234234', 'f5bb0c8de146c67b44babbf4e6584cc0', 'user', '2021-11-09 22:34:21'),
(20, 'test', 'adminadm@test.test', '+38(068) 910-10-76', 'f5bb0c8de146c67b44babbf4e6584cc0', 'user', '2021-11-09 22:48:03'),
(21, 'test', 't123est@test.com', '+38(068) 910-10-76', 'f5bb0c8de146c67b44babbf4e6584cc0', 'user', '2021-11-09 22:55:44'),
(22, 'Boris', 'test34wew@test.com', '+38(068) 910-10-76', 'f5bb0c8de146c67b44babbf4e6584cc0', 'user', '2021-11-09 22:58:59'),
(23, 'Paul Smith', 'boryaf3232edyu@gmail.com', '+38(063) 618-52-52', 'f5bb0c8de146c67b44babbf4e6584cc0', 'user', '2021-11-09 23:14:12'),
(24, 'borys', 'boryafed343yu@gmail.com', '+38(066) 105-73-98', 'f5bb0c8de146c67b44babbf4e6584cc0', 'user', '2021-11-10 00:25:46'),
(25, 'Boris', 'boryafedyu@sdsa.asd', '+38(000) 000-00-00', 'f5bb0c8de146c67b44babbf4e6584cc0', 'user', '2021-11-10 01:13:37'),
(26, 'wew wew', 'bo1ris@boris.boris.ua', '+380000000000', 'f5bb0c8de146c67b44babbf4e6584cc0', 'user', '2021-11-12 01:26:31'),
(28, 'qwewq qweqw', 'bor123is@boris.boris.ua', '+382342343243', 'f5bb0c8de146c67b44babbf4e6584cc0', 'user', '2021-11-13 05:02:09');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Adres`
--
ALTER TABLE `Adres`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `Categories`
--
ALTER TABLE `Categories`
  ADD PRIMARY KEY (`idCategory`);

--
-- Индексы таблицы `Comments`
--
ALTER TABLE `Comments`
  ADD PRIMARY KEY (`idComments`),
  ADD KEY `UserID_idUSer` (`UserId`),
  ADD KEY `ProductID_idProduct` (`ProductId`);

--
-- Индексы таблицы `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`idmanufacturer`);

--
-- Индексы таблицы `Order`
--
ALTER TABLE `Order`
  ADD PRIMARY KEY (`idOrder`);

--
-- Индексы таблицы `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `IdManufaturer` (`ManufacturerId`) USING BTREE,
  ADD KEY `idCategory_CategoryId` (`CategoryId`);

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Adres`
--
ALTER TABLE `Adres`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT для таблицы `Categories`
--
ALTER TABLE `Categories`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `Comments`
--
ALTER TABLE `Comments`
  MODIFY `idComments` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `idmanufacturer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `Order`
--
ALTER TABLE `Order`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT для таблицы `Product`
--
ALTER TABLE `Product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `Comments`
--
ALTER TABLE `Comments`
  ADD CONSTRAINT `ProductID_idProduct` FOREIGN KEY (`ProductId`) REFERENCES `Product` (`idProduct`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `UserID_idUSer` FOREIGN KEY (`UserId`) REFERENCES `User` (`idUser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ограничения внешнего ключа таблицы `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `IdManufaturer` FOREIGN KEY (`ManufacturerId`) REFERENCES `manufacturer` (`idmanufacturer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idCategory_CategoryId` FOREIGN KEY (`CategoryId`) REFERENCES `Categories` (`idCategory`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
