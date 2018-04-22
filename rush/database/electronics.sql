-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 08 2018 г., 13:28
-- Версия сервера: 5.7.21
-- Версия PHP: 7.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `electronics`
--
CREATE DATABASE IF NOT EXISTS `electronics` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `electronics`;

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `b_prod_id` int(11) NOT NULL,
  `b_user_fk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `b_prod_id`, `b_user_fk`) VALUES
(472, 13, 'vt'),
(473, 18, 'vt'),
(474, 21, 'vt'),
(475, 20, 'admin'),
(477, 13, 'admin'),
(478, 14, 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `categ` varchar(50) NOT NULL,
  `descrip` varchar(255) NOT NULL,
  `img` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `brand`, `categ`, `descrip`, `img`, `price`) VALUES
(13, 'HP Pavilion Power', 'HP', 'Laptop', '  Экран 15.6” IPS (1920x1080) Full HD, матовый / Intel Core i5-7300HQ (2.5 - 3.5 ГГц) / RAM 8 ГБ / HDD 1 ТБ / nVidia GeForce GTX 1050, 2 ГБ / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.21 кг / черный.', 'HP Pavilion Power 15.jpg', '22999'),
(14, 'Ноутбук Acer Nitro 5', 'Acer', 'Laptop', 'Экран 15.6\" IPS (1920x1020) Full HD, матовый / Intel Core i5-7300HQ (2.5 - 3.5 ГГц) / RAM 6 ГБ / HDD 1 ТБ / nVidia GeForce GTX 1050, 4 ГБ / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Windows 10 Home 64bit / 2.7 кг / черный', 'Acer Nitro 5 AN515-51.jpg', '25999 '),
(15, 'Dell Inspiron 7577', 'Dell', 'Laptop', 'Экран 15.6\" IPS (1920x1080) Full HD, глянцевый / Intel Core i5-7300HQ (2.5 - 3.5 ГГц) / RAM 8 ГБ / HDD 1 ТБ / nVidia GeForce GTX 1050, 4 ГБ / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Linux / 2.65 кг / черный', 'Dell Inspiron 7577.jpg', '25999'),
(16, 'HP Omen 17', 'HP', 'Laptop', '  Экран 17.3” IPS (1920x1080) Full HD, матовый / Intel i5-7300HQ (2.5 - 3.5 ГГц) / RAM 8 ГБ / HDD 1 ТБ / NVIDIA GeForce GTX 1050, 4 ГБ / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 3.35 кг / черный', 'HP Omen 17.jpg', '29 999'),
(17, 'MSI GP62M-7REX Leopard Pro', 'MSI', 'Laptop', '   Экран 15.6\" IPS (1920x1080) Full HD, матовый / Intel Core i5-7300HQ (2.5 - 3.5 ГГц) / RAM 16 ГБ / HDD 1 ТБ / nVidia GeForce GTX 1050 Ti, 4 ГБ / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.2 кг / черный            ', 'MSI GP62M-7REX Leopard Pro.jpg', '34999'),
(18, 'Huawei MediaPad T3 7\"', 'Huawei', 'Tables', ' Экран 7.0\" IPS (1024x600) MultiTouch / MediaTek MT8127 (1.3 ГГц) / RAM 1 ГБ / 8 ГБ встроенной памяти + microSD / Wi-Fi / Bluetooth / основная камера 2 Мп, фронтальная 2 Мп / GPS / Android 6.0 (Marshmallow) / 250 г / серый', 'huawei.jpg', '2199'),
(19, 'Prestigio MultiPad Grace 3157 3G', 'Prestigio', 'Tables', ' Экран 7\" (1280x720), емкостный MultiTouch / MediaTek MTK8321 (1.3 ГГц) / RAM 1 ГБ / 8 ГБ встроенной памяти + microSD (до 64 ГБ) / 3G / Wi-Fi / камера 2 Мп, фронтальная 0.3 Мп / GPS / ОС Android 7.0 (Nougat) / 360 г      ', 'Prestigio MultiPad Grace 3157.jpg', '1799'),
(20, 'Glofiish X710 ', 'Glofiish', 'Tables', ' Экран 7\" (1024x600), емкостный, MultiTouch / MediaTek MT8312 (1.3 ГГц) / RAM 512 МБ / 8 ГБ встроенной памяти + microSD / Wi-Fi / Bluetooth 4.0 / основная камера 2 Мп, фронтальная - 0.3 Мп / GPS / ОС Android 4.4 (KitKat) / 275 г / белый            ', 'Glofiish X710 .jpg', '1479 '),
(21, 'Impression ImPAD B702', 'Impression', 'Tables', ' Экран 7\" IPS (1280х800), MultiTouch / Spreadtrum SC7731C (1.2 ГГц) / RAM 1 ГБ / 8 ГБ встроенной памяти + microSD (до 64 ГБ) / 3G / Wi-Fi / Bluetooth / основная камера 5 Мп, фронтальная 2 Мп / GPS / Android 6.0 (Marshmallow) / 300 г / черный             ', 'Impression ImPAD B702.jpg', '1799'),
(22, '24\" LG 24MP68VQ-P', 'LG', 'Monitor', ' Тип матрицы: IPS\r\nИнтерфейсы: DVI,  VGA,  HDMI\r\nВремя реакции матрицы: 5 мс\r\nЯркость дисплея: 250 кд/м²\r\n', 'lg.jpg', '5349'),
(23, '23\" Dell P2317H', 'Dell', 'Monitor', ' Тип матрицы: AH-IPS\r\nИнтерфейсы: VGA,  HDMI,  DisplayPort,  USB\r\nВремя реакции матрицы: 6 мс (от серого к серому)\r\nЯркость дисплея: 250 кд/м²\r\n           ', 'dell_210.jpg', '5766'),
(24, 'Dell UltraSharp U2412M White', 'Dell', 'Monitor', '  Тип матрицы: E-IPS\r\nИнтерфейсы: DVI,  VGA,  DisplayPort,  USB\r\nВремя реакции матрицы: 8 мс\r\nЯркость дисплея: 300 кд/м2          ', 'dell_u24.jpg', '7 399'),
(25, 'Lenovo IdeaCentre Stick', 'Lenovo', 'Computers', '  Intel Atom Z3735F (1.33 ГГц) / RAM 2 ГБ / eMMC 32 ГБ / Intel HD Graphics / Без ОД / Bluetooth 4.0 / Слот microSD / Wi-Fi / Windows 10 Home              ', 'lenovo13.jpg', '2599'),
(26, 'ARTLINE Business B11', 'ARTLINE', 'Computers', ' Intel Celeron Quad Core J1900 (2.0 ГГц) / RAM 4 ГБ / SSD 60 ГБ / Intel HD Graphics / без ОД / LAN / без ОС          ', 'artline_business_b11.jpg', '6345'),
(27, 'Lenovo IdeaCentre', 'Lenovo', 'Monoblock', '  Экран 21.5\" (1920x1080) Full HD / Intel Core i3-6006U (2.0 ГГц) / RAM 4 ГБ / HDD 1 ТБ / Intel HD Graphics 520 / DVD-RW / LAN / Wi-Fi / Bluetooth / кардридер / веб-камера / DOS / 5.65 кг / черный / клавиатура + мышь          ', 'lenovo_f0a.jpg', '13 999'),
(28, 'Asus Vivo AiO', 'Asus', 'Monoblock', '  Экран 21.5\" (1920x1080) Full HD / Intel Celeron J3355 (2.0 - 2.5 ГГц) / RAM 4 ГБ / HDD 1 ТБ / Intel HD Graphics 500 / без ОД / LAN / Wi-Fi / Bluetooth / кардридер / веб-камера / Endless OS / 4.65 кг / черный          ', 'asus_mono.jpg', '10499');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `login` varchar(30) NOT NULL,
  `passwd` text NOT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`login`, `passwd`, `mail`) VALUES
('aaa', '504cca27d4381ac5cd676ec27936631eee31a0f02b456853145196178930e02d96f83fcc53649527273aca3bbec503fc467a5442107260fb6248fd15a4a619cc', 'aaa'),
('aaaaaaaadsddfasdf', '11c8632e0dcc4f1f408c93a57d4158ca300c0e9e9234c1d39f1537697d9f56d95b184941949ad35e553cc21b9fd9ccf46ab4d93a6204790bd47714328933fa95', 'fdsafsa'),
('admin', '98311eff9d91622bc38c0cf77a6f26a92c6de02e0fd2126b015c5a26eb74e9e1f42f760a2f197ee9adc5e770fc5d164c912d812a5fed2e51e7f563637ee7b28b', 'admin'),
('df', 'eaa18fa9caa3aed6bd5784c8bf8f052035e0883bbdb3f0ace470920d543aedb61a016e1422d39d20584aebdad97c163756d1871a2cc715410b23f89c01c14ed9', ''),
('eee', 'd335ac6b57227a49627126228c02f4fa1f13895cb595fcb12e1878552a7460002df3b9e36c84ec065708ba0a95bd38a3681c715946ff3948622ebb0bf08e6b64', ''),
('LOG', '2f1a6715278ad0c90872cad6522f6e1ff62db9bbcf1b8262e640adbcc8b19a64ac8d8affd2fa6c969f1d8cfc3d2253079d0ea2aff8d1aea8edb6122b1801c63f', ''),
('new3', 'f0b5c61abff80c3be974c09b41422200c396cea7dda98c332864ee63167e1a00e17409572cc08d664b389393bc980d505b5418625cb8374a4b1ec800a32e72ef', 'rege'),
('test', 'b913d5bbb8e461c2c5961cbe0edcdadfd29f068225ceb37da6defcf89849368f8c6c2eb6a4c4ac75775d032a0ecfdfe8550573062b653fe92fc7b8fb3b7be8d6', 'test'),
('test1', 'pass1', 'email1'),
('vt', '504661f7b93bacc4a21f2c8dc826cb84f212155c2e105e73c3916c7d4eabb4e61085f83f4ce15fc97bc30f2b7558b58dffdc3a5ee3791d9977e85507546177e4', 'vt');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `b_user_fk` (`b_user_fk`),
  ADD KEY `b_prod_id` (`b_prod_id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=479;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`b_user_fk`) REFERENCES `users` (`login`),
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`b_prod_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
