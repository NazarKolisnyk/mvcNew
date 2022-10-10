-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Жов 10 2022 р., 17:16
-- Версія сервера: 5.7.29
-- Версія PHP: 7.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `mvc`
--

-- --------------------------------------------------------

--
-- Структура таблиці `logins`
--

CREATE TABLE `logins` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `logins`
--

INSERT INTO `logins` (`id`, `login`, `date`) VALUES
(1, 'admin', '2021-12-28'),
(2, 'Petro', '2022-02-01'),
(3, 'admin', '2022-04-06'),
(4, 'admin', '2022-05-01'),
(6, 'admin', '2022-05-25'),
(8, 'admin', '2022-07-06'),
(9, 'Petro', '2022-08-08'),
(10, 'admin', '2022-08-13'),
(11, 'admin', '2022-08-24'),
(12, 'Petro', '2022-08-24'),
(13, 'admin', '2022-08-29'),
(14, 'admin', '2022-09-04'),
(15, 'admin', '2022-09-20'),
(16, 'admin', '2022-09-21'),
(17, 'Petro', '2022-09-22'),
(18, 'admin', '2022-09-22'),
(19, 'admin', '2022-09-24'),
(20, 'admin', '2022-09-24'),
(21, 'admin', '2022-09-27'),
(22, 'Petro', '2022-09-27'),
(23, 'admin', '2022-09-27'),
(24, 'admin', '2022-09-28'),
(25, 'Petro', '2022-09-28'),
(26, 'admin', '2022-09-28'),
(27, 'admin', '2022-09-28'),
(28, 'admin', '2022-09-28'),
(29, 'admin', '2022-09-28'),
(30, 'admin', '2022-09-28'),
(31, 'admin', '2022-09-29'),
(32, 'admin', '2022-09-30'),
(33, 'admin', '2022-09-30'),
(34, 'Petro', '2022-09-30'),
(35, 'admin', '2022-09-30'),
(36, 'admin', '2022-10-01'),
(37, 'admin', '2022-10-01'),
(38, 'Petro', '2022-10-01'),
(39, 'admin', '2022-10-01'),
(40, 'Petro', '2022-10-01'),
(41, 'admin', '2022-10-01'),
(42, 'admin', '2022-10-02'),
(43, 'admin', '2022-10-03'),
(44, 'Petro', '2022-10-03'),
(45, 'admin', '2022-10-03'),
(46, 'Petro', '2022-10-03'),
(47, 'admin', '2022-10-03'),
(48, 'Petro', '2022-10-03'),
(49, 'admin', '2022-10-04'),
(50, 'admin', '2022-10-04'),
(51, 'Petro', '2022-10-04'),
(52, 'admin', '2022-10-04'),
(53, 'Petro', '2022-10-04'),
(54, 'Petro', '2022-10-04'),
(55, 'Petro', '2022-10-05'),
(56, 'admin', '2022-10-05'),
(57, 'admin', '2022-10-06'),
(58, 'Petro', '2022-10-06'),
(59, 'admin', '2022-10-06'),
(60, 'Max', '2022-10-06'),
(61, 'Petro', '2022-10-06'),
(62, 'admin', '2022-10-06'),
(63, 'Petro', '2022-10-06'),
(64, 'admin', '2022-10-06'),
(65, 'Max', '2022-10-07'),
(66, 'admin', '2022-10-07'),
(67, 'admin', '2022-10-07'),
(68, 'Petro', '2022-10-08'),
(69, 'admin', '2022-10-08'),
(70, 'Petro', '2022-10-09'),
(71, 'Max', '2022-10-09'),
(72, 'admin', '2022-10-09'),
(73, 'admin', '2022-10-09'),
(74, 'admin', '2022-10-09'),
(75, 'admin', '2022-10-09'),
(76, 'Petro', '2022-10-09'),
(77, 'admin', '2022-10-10');

-- --------------------------------------------------------

--
-- Структура таблиці `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int(10) UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `messages`
--

INSERT INTO `messages` (`id`, `name`, `title`, `message`, `created_at`, `status`) VALUES
(1, 'admin', 'MVC@1', 'Cтворений', '2021-09-16 12:15:00', 0),
(2, 'admin', 'MVC@2', 'Змінено стиль сайту', '2022-06-16 12:05:00', 0),
(3, 'Max', 'MVC3', 'Адаптив дозволів користувачів', '2022-06-22 14:28:56', 0),
(4, 'Petro', 'MVC4', 'Ура. Я перший, кого забанили!', '2022-06-26 21:05:58', 1),
(5, 'admin', 'MVC5', 'Добавив профіль', '2022-07-12 23:05:57', 0),
(6, 'Valera', 'MVC6', 'А можна додаткові ролі?', '2022-08-01 23:00:51', 0),
(7, 'admin', 'MVC7', 'Можна. І ще тримайте новий, не здертий ні звідки дизайн сайту. Меню Адміна переніс в профіль для зручності, добавив редагування ролей.', '2022-08-26 23:05:57', 0),
(8, 'admin', 'MVC8', 'Перевірка багів і статистика', '2022-10-01 19:05:56', 1),
(11, 'admin', 'MVC9', 'Передав через GIT\r\n(o ) - (o )', '2022-10-01 19:11:40', 1),
(13, 'admin', 'trtr', 'tyyhgfhgf', '2022-10-01 19:34:14', 0),
(14, 'admin', '23434543', 'rettfgghhgjhbbnv', '2022-10-09 12:21:12', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `pages`
--

CREATE TABLE `pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` longtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `pages`
--

INSERT INTO `pages` (`id`, `url`, `name`, `content`) VALUES
(1, 'mesagge', 'Mesagge', '<h1>Hello<h1>'),
(2, 'colection', 'Моя колекція', '<h1>Home video<h1>\r\n    <video src=\"\" controls width=\"100%\"></video>'),
(3, 'koshick', 'Кошик', '<select multiple=\"multiple\" name=\"type\">\r\n    <option disabled=\"disabled\" selected=\"selected\">Ким ви працювали</option>\r\n    <option value=\"Програміст\">Програміст</option>\r\n    <option value=\"Системний аміністратор\">Системний аміністратор</option>\r\n    <option value=\"Маркетолог\">Маркетолог</option>\r\n    <option value=\"Маркетолог\">Дизайнер </option>\r\n</select>');

-- --------------------------------------------------------

--
-- Структура таблиці `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `role` varchar(255) CHARACTER SET utf8 NOT NULL,
  `permission` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `roles`
--

INSERT INTO `roles` (`id`, `role`, `permission`) VALUES
(0, 'ban', 'access, ban'),
(1, 'sys_admin', 'role, users, pages, message, add-role, edit-role, delete-role, add-user, edit-user, delete-user, add-page, edit-page, delete-page, add-message, edit-message, delete-message, access'),
(2, 'admin', 'role, users, pages, message, add-user, edit-user, delete-user, add-page, edit-page, delete-page, add-message, edit-message, delete-message, access'),
(3, 'manadger', 'users, pages, message, add-page, edit-page, add-message, edit-message, delete-message, access'),
(4, 'user', 'pages, message, add-message, access'),
(5, 'child', 'access'),
(6, 'PageMan', 'add, edit, access, pages'),
(7, 'father', 'edit, users, access'),
(8, 'user8', 'role, pages, edit-role, add-user'),
(9, 'Bondar', 'role, users, pages, message, delete-role, delete-user, delete-page, delete-message, access');

-- --------------------------------------------------------

--
-- Структура таблиці `statements`
--

CREATE TABLE `statements` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_id` int(10) NOT NULL,
  `new_role_id` int(10) NOT NULL,
  `argument` varchar(255) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `statements`
--

INSERT INTO `statements` (`id`, `user_name`, `user_id`, `new_role_id`, `argument`, `status`) VALUES
(1, 'Petro', 2, 3, 'Без коментарів', 2),
(2, 'Petro', 2, 7, 'Та нащо ban хоч Бондара дай', 1),
(3, 'Valera', 4, 2, 'Заслужив', 0),
(4, 'Petro', 2, 2, 'Оп оп зламав базу', 1),
(5, 'Max', 5, 2, 'Давай поки я добрий', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(10) UNSIGNED NOT NULL DEFAULT '4'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `password`, `role`) VALUES
(1, '1@1', 'admin', '$2y$10$LegIOKgv4NtuPmcUxVF6vuBq5jjVbEXTHjsHIo863k2QYUhxlKsOu', 1),
(2, 'knaz@gmail.com', 'Petro', '$2y$10$VBSh7xXCcSuCTiX0h7vJ1.8yaSwtyNovzmT0zXkqOWhtiMa2NyoI2', 7),
(3, 'kaskad@gmail.com', 'Nazar', '$2y$10$LegIOKgv4NtuPmcUxVF6vuBq5jjVbEXTHjsHIo863k2QYUhxlKsOu', 6),
(4, 'kazka@gmail.com', 'Valera', '$2y$10$RwuyySlvRi474olyfNa5a.ZfEtcKkDyiLvTkXhqTwzZO0VMqkl7j2', 2),
(5, 'maska@gmail.com', 'Max', '$2y$10$VBSh7xXCcSuCTiX0h7vJ1.8yaSwtyNovzmT0zXkqOWhtiMa2NyoI2', 4);

-- --------------------------------------------------------

--
-- Структура таблиці `wrong_password`
--

CREATE TABLE `wrong_password` (
  `id` int(11) NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп даних таблиці `wrong_password`
--

INSERT INTO `wrong_password` (`id`, `login`, `date`) VALUES
(1, 'admin', '2022-06-10'),
(2, 'Petro', '2022-07-13'),
(3, 'admin', '2022-09-01'),
(4, 'admin', '2022-09-12'),
(5, 'Petro', '2022-09-13'),
(6, 'Petro', '2022-09-27'),
(7, 'Max', '2022-10-06');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `statements`
--
ALTER TABLE `statements`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `wrong_password`
--
ALTER TABLE `wrong_password`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT для таблиці `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблиці `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблиці `statements`
--
ALTER TABLE `statements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `wrong_password`
--
ALTER TABLE `wrong_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
