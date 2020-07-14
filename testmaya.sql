-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2020 a las 00:33:46
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `testmaya`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `answer` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `optionA` char(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `optionB` char(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `optionC` char(10) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `optionD` char(10) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`, `optionA`, `optionB`, `optionC`, `optionD`) VALUES
(1, '1. Tene\' táan ___ kanik maaya.', 'c', 'a)  u', 'b)  a', 'c)  in', 'd)  kin'),
(2, '2. Teche’ séeba’an ______ t’anik maaya.', 'c', 'a)  ka', 'b)  kin', 'c)  a', 'd)  in'),
(3, '3.  ______ kin xokik maayae’.', 'b', 'a)  Ma\'', 'b)  Way', 'c)  Ma\'alo', 'd) Táan'),
(4, '4.- Ma’ ma’alob u t’anik ____. ', 'c', 'a) maayae\'', 'b) maaya', 'c) maayai\'', 'd) mayai'),
(5, '5. Xmaruche’ ma\'  ma’alob _____ t’anik maayai’.', 'a', 'a)  u', 'b)  ka', 'c) ku', 'd)  a'),
(6, '6. Toj in ______.', 'b', 'a) utsil', 'b) wóol', 'c) bin', 'd) xan'),
(7, '7. Xi’ik tech ______.', 'a', 'a) utsil', 'b) xan', 'c) bix', 'd) tu'),
(8, '8.  ______ a wanil?', 'b', 'a) xan', 'b) bix', 'c) tu', 'd) bin'),
(9, '9. Tin _____ maan.', 'a', 'a) bin', 'b) biin', 'c) wóol', 'd) bix'),
(10, '10. _____ jeel k’iin', 'b', 'a) bix', 'b) tu', 'c) bin', 'd) túun');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `cript` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `names` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `answerUser` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `calification` varchar(30) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
