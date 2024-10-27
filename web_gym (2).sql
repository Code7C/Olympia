-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2024 a las 03:15:26
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web_gym`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `likes`
--

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `likes`
--

INSERT INTO `likes` (`like_id`, `usuario_id`, `plan_id`) VALUES
(48, 17, 1),
(47, 17, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `like_id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `planes`
--

INSERT INTO `planes` (`like_id`, `nombre`, `descripcion`, `likes`) VALUES
(1, 'Plan de Fuerza', 'Enfocado en el aumento de fuerza general en todo el cuerpo.', 1),
(2, 'Plan de Hipertrofia', 'Diseñado para aumentar la masa muscular mediante altas repeticiones.', 0),
(3, 'Plan de Pérdida de Grasa', 'Combinación de entrenamiento de fuerza y cardio para quemar grasa.', 1),
(4, 'Plan Full Body', 'Entrenamiento para todo el cuerpo, ideal para principiantes.', 0),
(5, 'Plan de Fuerza Máxima', 'Enfocado en trabajar con cargas máximas y bajas repeticiones.', 0),
(6, 'Plan de Potencia', 'Entrenamiento explosivo para mejorar la fuerza y velocidad.', 0),
(7, 'Plan de Resistencia', 'Ideal para mejorar la resistencia cardiovascular y muscular.', 0),
(8, 'Plan de Definición', 'Para reducir la grasa corporal y aumentar la definición muscular.', 0),
(9, 'Plan de Movilidad', 'Focalizado en mejorar la flexibilidad y el rango de movimiento.', 0),
(10, 'Plan HIIT', 'Entrenamiento de intervalos de alta intensidad para quemar grasa rápidamente.', 0),
(11, 'Plan Push/Pull/Legs', 'División en tres días: empuje, tirón y piernas.', 0),
(12, 'Plan de Crossfit', 'Entrenamiento funcional que combina fuerza y cardio.', 0),
(13, 'Plan de Abdominales', 'Entrenamiento centrado en el desarrollo de los músculos abdominales.', 0),
(14, 'Plan de Estiramiento', 'Mejora la flexibilidad y previene lesiones.', 0),
(15, 'Plan de Endurance', 'Plan específico para mejorar la capacidad cardiovascular y la resistencia.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usr` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `ape` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usr`, `pass`, `nom`, `ape`) VALUES
(1, 'santiagoambrogi72@gmail.com', 'futbol5', 'santiago', 'Ambrogi'),
(17, 'santiagoambrogi767@gmail.com', 'hola', 'Nacho', 'Basualdo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`),
  ADD UNIQUE KEY `usuario_id` (`usuario_id`,`plan_id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
