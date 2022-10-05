-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Вер 24 2022 р., 11:41
-- Версія сервера: 8.0.24
-- Версія PHP: 7.1.33

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
  `id` int UNSIGNED NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `logins`
--

INSERT INTO `logins` (`id`, `login`, `date`) VALUES
(1, 'admin', '2021-12-28'),
(2, 'Petro', '2022-05-01'),
(5, 'admin', '2022-07-06'),
(6, 'admin', '2022-07-25'),
(7, 'Petro', '2022-08-08'),
(8, 'admin', '2022-09-01'),
(9, 'admin', '2022-09-06'),
(10, 'admin', '2022-09-13'),
(11, 'admin', '2022-09-24');

-- --------------------------------------------------------

--
-- Структура таблиці `messages`
--

CREATE TABLE `messages` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  `status` int UNSIGNED DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `messages`
--

INSERT INTO `messages` (`id`, `name`, `title`, `message`, `created_at`, `status`) VALUES
(1, 'admin', 'MVS1', 'Завдання виконано', '2020-12-24 14:57:58', 1),
(2, 'admin', 'MVS2', 'Змінено стиль сайту', '2022-06-16 12:05:00', 0),
(3, 'Max', 'MVS3', 'Адаптив дозволів користувачів', '2022-06-22 14:28:56', 0),
(4, 'Petro', 'MVS4', 'Я перший, кого забанили', '2022-06-26 21:05:58', 0),
(5, 'admin', 'MVS5', 'Добавив профіль', '2022-07-12 23:05:57', 0),
(6, 'Valera', 'MVS6', 'А можна додаткові ролі?', '2022-08-01 23:00:51', 0),
(7, 'admin', 'MVS7', 'Можна. І ще тримайте новий, не здертий ні звідки дизайн сайту. Меню Адміна переніс в профіль для зручності, добавив редагування ролей.', '2022-08-26 23:05:57', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `pages`
--

CREATE TABLE `pages` (
  `id` int UNSIGNED NOT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `pages`
--

INSERT INTO `pages` (`id`, `url`, `name`, `content`) VALUES
(1, 'mesagge', 'Mesagge', '<h1>Hello<h1>'),
(2, 'koshick', 'Кошик', '<select multiple=\"multiple\" name=\"type\">\r\n    <option disabled=\"disabled\" selected=\"selected\">Ким ви працювали</option>\r\n    <option value=\"Програміст\">Програміст</option>\r\n    <option value=\"Системний аміністратор\">Системний аміністратор</option>\r\n    <option value=\"Маркетолог\">Маркетолог</option>\r\n    <option value=\"Маркетолог\">Дизайнер </option>\r\n</select>');

-- --------------------------------------------------------

--
-- Структура таблиці `roles`
--

CREATE TABLE `roles` (
  `id` int UNSIGNED NOT NULL,
  `role` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `permission` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `roles`
--

INSERT INTO `roles` (`id`, `role`, `permission`) VALUES
(0, 'ban', 'access'),
(1, 'sys_admin', 'add, edit, delete, role, users, access, pages'),
(2, 'admin', 'add, edit, delete, users, access'),
(3, 'manadger', 'edit, delete, access, add'),
(4, 'user', 'add, access'),
(5, ' child', 'access'),
(6, 'user6', 'access, add'),
(7, 'father', 'edit, users, access'),
(8, 'user8', 'access, add');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int UNSIGNED NOT NULL DEFAULT '4'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `email`, `login`, `password`, `role`) VALUES
(1, '1@1', 'admin', '$2y$10$LegIOKgv4NtuPmcUxVF6vuBq5jjVbEXTHjsHIo863k2QYUhxlKsOu', 1),
(2, 'knaz@gmail.com', 'Petro', '$2y$10$VBSh7xXCcSuCTiX0h7vJ1.8yaSwtyNovzmT0zXkqOWhtiMa2NyoI2', 3),
(3, 'kaskad@gmail.com', 'Nazar', '$2y$10$LegIOKgv4NtuPmcUxVF6vuBq5jjVbEXTHjsHIo863k2QYUhxlKsOu', 0),
(4, 'kazka@gmail.com', 'Valera', '$2y$10$RwuyySlvRi474olyfNa5a.ZfEtcKkDyiLvTkXhqTwzZO0VMqkl7j2', 4),
(5, 'maska@gmail.com', 'Max', '$2y$10$VBSh7xXCcSuCTiX0h7vJ1.8yaSwtyNovzmT0zXkqOWhtiMa2NyoI2', 2);

-- --------------------------------------------------------

--
-- Структура таблиці `wrong_password`
--

CREATE TABLE `wrong_password` (
  `id` int NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп даних таблиці `wrong_password`
--

INSERT INTO `wrong_password` (`id`, `login`, `date`) VALUES
(1, 'admin', '2022-09-13'),
(2, 'Petro', '2022-09-13');

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
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблиці `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблиці `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `wrong_password`
--
ALTER TABLE `wrong_password`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
