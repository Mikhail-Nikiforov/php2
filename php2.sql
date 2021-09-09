-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 03 2021 г., 15:59
-- Версия сервера: 10.1.44-MariaDB
-- Версия PHP: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `php2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `baskets`
--

CREATE TABLE `baskets` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `baskets`
--

INSERT INTO `baskets` (`id`, `id_user`, `id_product`, `quantity`, `status`) VALUES
(22, 25, 114, 7, NULL),
(23, 25, 119, 6, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(10) NOT NULL,
  `nameShort` varchar(30) NOT NULL,
  `nameFull` varchar(100) NOT NULL,
  `price` int(15) NOT NULL,
  `param` text NOT NULL,
  `bigPhoto` varchar(50) NOT NULL,
  `miniPhoto` varchar(50) NOT NULL,
  `weight` varchar(50) NOT NULL,
  `discount` int(3) NOT NULL,
  `stickerFit` int(3) NOT NULL,
  `stickerHit` int(3) NOT NULL,
  `views` int(10) NOT NULL,
  `id_category` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `nameShort`, `nameFull`, `price`, `param`, `bigPhoto`, `miniPhoto`, `weight`, `discount`, `stickerFit`, `stickerHit`, `views`, `id_category`, `status`) VALUES
(114, 'Ноутбук MSI GF63', 'Ноутбук MSI GF63 Thin 9SCSR-1028XRU, 15.6\", IPS, Intel Core i5 9300H 2.4ГГц, 8ГБ, 256ГБ SSD, NVIDIA ', 57990, 'Корпус ноутбука MSI GF63 Thin 9SCSR-1028XRU сделан из надежного алюминия, он защитит от трещин и царапин при падениях или иных внешних воздействиях. Система охлаждения обеспечивает оптимальную температуру комплектующих при высоких нагрузках. Процессор Intel Core i5 9300H позволяет работать эффективно даже в многозадачном режиме.\r\n\r\nОперативная память ноутбука MSI GF63 Thin 9SCSR-1028XRU составляет 8 Гб, она отвечает за быстродействие при выполнении операций. Хранилище SSD имеет объем 256 Гб. Этого будет достаточно для решения большого спектра рабочих и бытовых задач.', 'pic1_full.jpg', 'pic1_preview.jpg', '', 0, 0, 0, 0, 0, 0),
(115, 'Ноутбук Acer TravelMate B1', 'Ноутбук Acer TravelMate B1 TMB118-M-C0EA черный', 17299, 'С ноутбуком Acer TravelMate B1 TMB118-M-C0EA любая дорога будет веселей и ярче. Ведь с ним не придется скучать. На 11.6-дюймовой диагонали дисплея типа TN+film с HD-разрешением 1366x768 пикселей вы сможете сполна наслаждаться мобильным просмотром видеотреков и фильмов. А матовое покрытие при этом минимизирует возможные блики. Производительный процессор N4120 линейки Celeron с 4 ядрами в активе и частотным диапазоном от 1.1 до 2.6 МГц позволит без проблем и задержек загружать самые разные по объему приложения. А стереодинамики позволят получать удовольствие от любимых аудиотреков.\r\nДля оптимальной коммуникации в Acer TravelMate B1 TMB118-M-C0EA предусмотрены не только веб-камера и микрофон, но также и удобные способы соединения с Интернетом как посредством Wi-Fi, так и через встроенный Ethernet-адаптер. Компактные габариты 211x291x22.3 мм при весе 1.52 кг добавляют данному ноутбуку мобильности и легкости при переноске. Выполнен ноутбук в классически-элегантном черном цвете.', 'pic2_full.jpg', 'pic2_preview.jpg', '', 0, 0, 0, 0, 0, 0),
(119, ' Ультрабук Huawei MateBook D 1', 'Ультрабук Huawei MateBook D 15 BoB-WAI9 серый', 42999, 'Ультрабук Huawei MateBook D 15 BoB-WAI9 предлагает широкие функциональные возможности и мощный вычислительный потенциал наряду с портативностью. Он работает под управлением ОС Windows 10 Home. Аппаратная платформа данной модели представлена процессором Intel Core i3 10110U со встроенной графикой, 8 ГБ памяти ОЗУ и накопителем SSD емкостью 256 ГБ. Экран диагональю 15.6 дюйма на основе матрицы IPS стандарта FullHD отображает реалистичную картинку независимо от положения.', 'pic3_full.jpg', 'pic3_preview.jpg', '', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `amount` double NOT NULL,
  `datetime_create` datetime NOT NULL,
  `id_order_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `order_status`
--

CREATE TABLE `order_status` (
  `id_order_status` int(11) NOT NULL,
  `order_status_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(55) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_last_action` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `user_last_action`) VALUES
(22, 'Михаил', 'eb8b4da0a5519e12ead4ba90f11b91a0202cb962ac59075b964b07152d234b70', '0000-00-00 00:00:00'),
(23, '', 'd41d8cd98f00b204e9800998ecf8427e827ccb0eea8a706c4c34a16891f84e7b', '0000-00-00 00:00:00'),
(25, 'admin', '21232f297a57a5a743894a0e4a801fc321232f297a57a5a743894a0e4a801fc3', '0000-00-00 00:00:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `baskets`
--
ALTER TABLE `baskets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD UNIQUE KEY `id_order_status_2` (`id_order_status`),
  ADD KEY `id_order_status` (`id_order_status`);

--
-- Индексы таблицы `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id_order_status`),
  ADD UNIQUE KEY `id_order_status` (`id_order_status`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `baskets`
--
ALTER TABLE `baskets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id_order_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_order_status`) REFERENCES `order_status` (`id_order_status`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
