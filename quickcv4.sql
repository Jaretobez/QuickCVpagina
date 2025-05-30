-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:33065
-- Tiempo de generación: 23-05-2025 a las 20:58:38
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `quickcv4`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curriculum`
--

CREATE TABLE `curriculum` (
  `id_curriculum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `plantilla` varchar(45) NOT NULL,
  `titulo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `curriculum`
--

INSERT INTO `curriculum` (`id_curriculum`, `id_user`, `plantilla`, `titulo`) VALUES
(1, 0, '3', 'jarerd - 2025-05-17'),
(2, 0, '3', 'jarerd - 2025-05-17'),
(3, 0, '3', 'jarerd - 2025-05-17'),
(4, 0, '3', 'luis - 2025-05-17'),
(5, 0, '3', 'jarerd - 2025-05-18'),
(6, 0, '3', 'alejandro - 2025-05-18'),
(7, 0, '3', 'jarerd - 2025-05-18'),
(8, 0, '3', 'alejandro - 2025-05-18'),
(9, 0, '3', 'luis - 2025-05-18'),
(10, 0, '3', 'alejandro - 2025-05-18'),
(11, 0, '3', 'alejandro - 2025-05-18'),
(12, 0, '3', 'jared - 2025-05-18'),
(13, 0, '3', 'alejandro - 2025-05-18'),
(14, 0, '3', 'alejandro - 2025-05-18'),
(15, 0, '3', 'hector - 2025-05-18'),
(16, 0, '3', 'Alejandro Enrique Ayala Cerecedo - 2025-05-19'),
(17, 0, '3', 'adas - 2025-05-19'),
(18, 0, '3', 'asdas - 2025-05-19'),
(19, 0, '3', 'asdasd - 2025-05-19'),
(20, 0, '3', 'asdasd - 2025-05-19'),
(21, 0, '3', 'asdasd - 2025-05-19'),
(22, 0, '3', 'sdsad - 2025-05-19'),
(23, 0, '3', 'dasdas - 2025-05-19'),
(24, 0, '3', 'dasdas - 2025-05-19'),
(25, 0, '3', 'alejandro - 2025-05-19'),
(26, 0, '3', 'adasda - 2025-05-19'),
(27, 0, '3', 'adadsa - 2025-05-19'),
(28, 0, '3', 'jose perez - 2025-05-19'),
(29, 0, '3', 'jose perez - 2025-05-19'),
(30, 0, '2', 'dadas - 2025-05-19'),
(31, 0, '2', 'clasica - 2025-05-19'),
(32, 0, '2', 'clasica2 - 2025-05-19'),
(33, 0, '2', 'adsfghj - 2025-05-20'),
(34, 0, '1', 'CRISTIAN - 2025-05-20'),
(35, 0, '3', 'Alejandro Enrique Ayala Cerecedo - 2025-05-20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `educacion`
--

CREATE TABLE `educacion` (
  `id` int(11) NOT NULL,
  `id_curriculum` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `institucion` varchar(255) DEFAULT NULL,
  `fecha_graduacion` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `educacion`
--

INSERT INTO `educacion` (`id`, `id_curriculum`, `usuario_id`, `titulo`, `institucion`, `fecha_graduacion`) VALUES
(1, 0, 1, 'Preparatoria', 'cetis', '0000-00'),
(2, 0, 2, 'Preparatoria', 'cetmar', '2025-07'),
(3, 0, 3, 'ingeniero en sistemas computacionales', 'universidad autónoma del Carmen', '2025-01'),
(4, 0, 4, 'ingeniero en sistemas computacionales', 'unacarrr', '2025-01'),
(5, 0, 5, '', '', ''),
(6, 0, 6, '', '', ''),
(7, 0, 7, 'unacar', 'unacarrr', '2025-01'),
(8, 0, 8, 'ingeniero en sistemas computacionales', 'unacarrr', '2025-04'),
(9, 0, 9, 'ingeniero en sistemas computacionales', 'unacarrr', '2025-04'),
(10, 0, 10, 'd', 'd', '2025-03'),
(11, 0, 11, 'ingeniero en sistemas computacionales', 'unacarrr', '2025-04'),
(12, 0, 12, 'unacar', 'unacarrr', '2025-02'),
(13, 0, 13, 'unacar', 'unacarrr', '2025-06'),
(14, 0, 14, 'unacar', 'bsbsr', '2025-02'),
(15, 0, 15, 'ingeniero en sistemas computacionales', 'universidad autónoma del Carmen', '2025-01'),
(16, 0, 16, 'ingeniero en sistemas computacionales', 'unacarrr', '2025-01'),
(17, 1, 17, 'unacar', 'unacarrr', '2025-07'),
(18, 2, 18, 'unacar', 'unacarrr', '2025-02'),
(19, 3, 19, '', '', ''),
(20, 4, 20, 'ingeniero en sistemas computacionales', 'unacar', '2025-01'),
(21, 5, 21, 'ingeniero en sistemas computacionales', 'unacar', '2025-01'),
(22, 6, 22, 'f', 'f', '2025-08'),
(23, 7, 23, 'ingeniero en sistemas computacionales', 'unacar', '2025-01'),
(24, 8, 24, '2', '2', '2025-07'),
(25, 9, 25, '3', '3', '2025-10'),
(26, 10, 26, 'ingeniero en sistemas computacionales', 'universidad autónoma del Carmen', '2025-01'),
(27, 11, 27, 'ingeniero en sistemas computacionales', 'universidad autónoma del Carmen', '2025-01'),
(28, 12, 28, 'ingeniero en sistemas computacionales', 'universidad autónoma del Carmen', '2025-01'),
(29, 13, 29, '', '', ''),
(30, 14, 30, '', '', ''),
(31, 15, 31, '', '', ''),
(32, 16, 32, 'prueba 18', 'prueba 18', '2025-03'),
(33, 17, 33, 'asda', 'sada', '2025-12'),
(34, 18, 34, '', '', ''),
(35, 19, 35, 'asdas', 'sdasd', '2025-04'),
(36, 20, 36, 'asdas', 'sdasd', '2025-04'),
(37, 21, 37, 'asdas', 'sdasd', '2025-04'),
(38, 22, 38, 'asdad', 'asdas', '2025-12'),
(39, 23, 39, '', '', ''),
(40, 24, 40, '', '', ''),
(41, 25, 41, '', '', ''),
(42, 26, 42, 'adasd', 'asdsa', '2025-11'),
(43, 27, 43, 'asdasd', 'asdad', '2025-12'),
(44, 28, 44, 'prepa', 'prueba3', '2025-07'),
(45, 29, 45, 'notengo', 'quiensabe', '2025-07'),
(46, 30, 46, 'sfds', 'sdfs', '2025-07'),
(47, 31, 47, 'clasica', 'clasica', '2025-11'),
(48, 32, 48, 'prepa', 'cetmar', '2025-07'),
(49, 33, 49, 'qwergh', 'adsfgh', '2025-11'),
(50, 34, 50, 'PREPA', 'CETIS', '2025-07'),
(51, 35, 51, 'Preparatoria', 'cetmar', '2025-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencias`
--

CREATE TABLE `experiencias` (
  `id` int(11) NOT NULL,
  `id_curriculum` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `puesto` varchar(255) DEFAULT NULL,
  `empresa` varchar(255) DEFAULT NULL,
  `fecha_inicio` varchar(7) DEFAULT NULL,
  `fecha_fin` varchar(7) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `experiencias`
--

INSERT INTO `experiencias` (`id`, `id_curriculum`, `usuario_id`, `puesto`, `empresa`, `fecha_inicio`, `fecha_fin`, `descripcion`) VALUES
(1, 0, 1, 'ejemplo', 'pemex', '0000-00', '0000-00', 'ejemplo de descripcion'),
(2, 0, 2, 'ti nosque', 'famsa', '2025-01', '2025-07', 'dfdbdbadba'),
(3, 0, 3, 'gerente TI', 'interact', '2025-08', '2025-12', 'elaboracion de proyectos'),
(4, 0, 3, 'jefe de ciberseguridad', 'cardumen', '2025-01', '2025-02', 'neutralice varios hackeos a la empresa '),
(5, 0, 4, 'gerente TI', 'interact', '2025-02', '2025-05', 'sfwef'),
(6, 0, 5, '', '', '', '', ''),
(7, 0, 6, '', '', '', '', ''),
(8, 0, 7, 'eee', 'interact', '2025-09', '2025-10', 'aaaa'),
(9, 0, 8, 'eee', 'interact', '2025-02', '2025-04', 'a'),
(10, 0, 9, 'eee', 'interact', '2025-02', '2025-04', 'a'),
(11, 0, 10, 'd', 'd', '2025-01', '2025-03', 'd'),
(12, 0, 11, 'gerente TI', 'interact', '2025-02', '2025-07', 'k'),
(13, 0, 12, 'a', 'a', '2025-01', '2025-02', 'a'),
(14, 0, 13, 'd', 'interact', '2025-01', '2025-02', 'q'),
(15, 0, 14, 'gerente TI', 'interact', '2025-03', '2025-07', 'q'),
(16, 0, 15, 'gerente TI', 'interact', '2025-01', '2025-02', 'w'),
(17, 0, 16, 'yyyy', 'interact', '2025-10', '2025-12', 'ttt'),
(18, 1, 17, 'gerente TI', 'interact', '2025-11', '2025-12', 'hhhhhhhhhhhhhhhhhhhhh'),
(19, 2, 18, 'gerente TI', 'interact', '2025-01', '2025-03', 'yjtjdtj'),
(20, 3, 19, '', '', '', '', ''),
(21, 4, 20, 'gerente TI', 'interact', '2025-12', '2025-11', 'oooooooooo'),
(22, 5, 21, 'gerente TI', 'interact', '2025-11', '2025-12', 'Sscascas'),
(23, 6, 22, 'f', 'f', '2025-01', '2025-02', 'f'),
(24, 7, 23, 'gerente TI', 'interact', '2025-01', '2025-07', 'qqqqq'),
(25, 8, 24, 'gerente TI', 'd', '', '', '2'),
(26, 9, 25, '3', '3', '2025-01', '2025-07', '3'),
(27, 10, 26, 'gerente TI', 'interact', '2025-10', '2025-12', '44444444444'),
(28, 11, 27, 'gerente TI', 'interact', '2025-10', '2025-12', '44444444444'),
(29, 12, 28, 'gerente TI', 'interact', '2025-11', '2025-12', '55555555555555555555555'),
(30, 13, 29, '', '', '', '', ''),
(31, 14, 30, '', '', '', '', ''),
(32, 15, 31, '', '', '', '', ''),
(33, 16, 32, 'prueba 18', 'prueba 18', '2025-07', '2025-03', 'prueba 18'),
(34, 17, 33, 'ads', 'asda', '2025-08', '2025-06', 'dsadsad'),
(35, 18, 34, '', '', '', '', ''),
(36, 19, 35, 'sadasdas', 'dsadsa', '2025-07', '2025-03', 'asdasd'),
(37, 20, 36, 'sadasdas', 'dsadsa', '2025-07', '2025-03', 'asdasd'),
(38, 21, 37, 'sadasdas', 'dsadsa', '2025-07', '2025-03', 'asdasd'),
(39, 22, 38, 'asda', 'asda', '2025-07', '2025-04', 'adasdad'),
(40, 23, 39, 'asd', '', '', '', ''),
(41, 24, 40, 'asd', '', '', '', ''),
(42, 25, 41, 'asda', '', '', '', ''),
(43, 26, 42, 'dads', 'ada', '2025-04', '2025-03', ''),
(44, 27, 43, 'adsa', 'adasd', '2025-08', '2025-06', ''),
(45, 28, 44, 'ejemplo', 'pemex', '2025-11', '2025-11', 'siquiero'),
(46, 29, 45, 'olaqueace', 'no', '2025-08', '2025-12', ''),
(47, 30, 46, 'asda', 'sdaad', '', '', ''),
(48, 31, 47, 'clasica', 'clasica', '2025-07', '2025-02', 'clasica'),
(49, 32, 48, 'clasica2', 'clasica2', '2025-03', '2025-06', 'clasica2'),
(50, 33, 49, 'asdasd', 'sadsad', '2025-08', '2025-11', 'asdasdsa'),
(51, 34, 50, 'GERENTE', 'PEMEX', '2025-03', '2025-07', 'PEMEX DESCRIPCION'),
(52, 35, 51, 'ti nosque', 'pemex', '2025-03', '2025-07', 'hacia no se que ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE `habilidades` (
  `id` int(11) NOT NULL,
  `id_curriculum` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `habilidad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `habilidades`
--

INSERT INTO `habilidades` (`id`, `id_curriculum`, `usuario_id`, `habilidad`) VALUES
(1, 0, 1, 'Copiar y pegar de chatgtp'),
(2, 7, 23, 'usar chatgpt'),
(3, 7, 23, 'php'),
(4, 7, 23, 'c++'),
(5, 8, 24, 'usar chatgpt'),
(6, 8, 24, 'php'),
(7, 8, 24, 'c++'),
(8, 9, 25, 'usar chatgpt'),
(9, 9, 25, 'php'),
(10, 9, 25, 'c++'),
(11, 10, 26, 'usar chatgpt'),
(12, 10, 26, 'php'),
(13, 10, 26, 'c++'),
(14, 11, 27, 'usar chatgpt'),
(15, 11, 27, 'php'),
(16, 11, 27, 'c++'),
(17, 12, 28, 'usar chatgpt'),
(18, 12, 28, 'php'),
(19, 12, 28, 'c++'),
(20, 16, 32, 'html'),
(21, 17, 33, 'html'),
(22, 18, 34, 'ufuf'),
(23, 19, 35, 'css'),
(24, 20, 36, 'css'),
(25, 21, 37, 'css'),
(26, 22, 38, 'HTML'),
(27, 22, 38, 'TRABAJO EN EQUIPO'),
(28, 25, 41, 'sdasda'),
(29, 25, 41, 'asdada'),
(30, 25, 41, 'asdaa'),
(31, 26, 42, 'adsads'),
(32, 26, 42, 'adasd'),
(33, 26, 42, 'asd'),
(34, 27, 43, 'asdaasdad'),
(35, 27, 43, 'asdad'),
(36, 27, 43, 'asd'),
(37, 28, 44, 'olas'),
(38, 28, 44, 'asda'),
(39, 28, 44, 'adsa'),
(40, 29, 45, 'chat'),
(41, 29, 45, 'gemini'),
(42, 30, 46, 'sfdsf'),
(43, 30, 46, 'fsfsdfsd'),
(44, 31, 47, 'clasica'),
(45, 31, 47, 'clasica'),
(46, 31, 47, 'clasica'),
(47, 32, 48, 'chat'),
(48, 32, 48, 'gemini'),
(49, 33, 49, 'qweqweewqeqw'),
(50, 34, 50, 'CSS'),
(51, 34, 50, 'HTML'),
(52, 35, 51, 'chatgyp'),
(53, 35, 51, 'gemini'),
(54, 35, 51, 'cntrl c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idiomas`
--

CREATE TABLE `idiomas` (
  `id` int(11) NOT NULL,
  `id_curriculum` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `idioma` varchar(100) DEFAULT NULL,
  `dominio` int(11) DEFAULT NULL CHECK (`dominio` between 0 and 100)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `idiomas`
--

INSERT INTO `idiomas` (`id`, `id_curriculum`, `usuario_id`, `idioma`, `dominio`) VALUES
(1, 0, 1, 'ingles', 68),
(2, 0, 2, 'ingles', 67),
(3, 0, 3, 'ingles', 60),
(4, 0, 3, 'frances', 10),
(5, 0, 4, 'ingles', 50),
(6, 0, 5, '', 50),
(7, 0, 6, '', 50),
(8, 0, 7, 'ingles', 50),
(9, 0, 8, 'ingles', 50),
(10, 0, 9, 'ingles', 50),
(11, 0, 10, 'ingles', 50),
(12, 0, 11, 'ingles', 50),
(13, 0, 12, 'ingles', 40),
(14, 0, 13, 'ingles', 50),
(15, 0, 14, 'ingles', 50),
(16, 0, 15, 'ingles', 50),
(17, 0, 16, 'ingles', 50),
(18, 1, 17, 'ingles', 50),
(19, 2, 18, 'ingles', 50),
(20, 3, 19, '', 50),
(21, 4, 20, 'ingles', 35),
(22, 5, 21, 'ingles', 50),
(23, 6, 22, 'ingles', 50),
(24, 7, 23, 'ingles', 50),
(25, 8, 24, 'ingles', 50),
(26, 9, 25, 'ingles', 50),
(27, 10, 26, 'ingles', 70),
(28, 11, 27, 'ingles', 70),
(29, 12, 28, 'ingles', 91),
(30, 13, 29, '', 50),
(31, 14, 30, '', 50),
(32, 15, 31, '', 50),
(33, 16, 32, '', 50),
(34, 17, 33, 'asdada', 50),
(35, 18, 34, '', 50),
(36, 19, 35, 'dasdsa', 35),
(37, 20, 36, 'dasdsa', 35),
(38, 21, 37, 'dasdsa', 35),
(39, 22, 38, '', 50),
(40, 23, 39, '', 50),
(41, 24, 40, '', 50),
(42, 25, 41, '', 50),
(43, 26, 42, 'adas', 50),
(44, 27, 43, 'ingles', 86),
(45, 28, 44, 'Español', 27),
(46, 29, 45, 'español', 18),
(47, 30, 46, 'asdasd', 50),
(48, 31, 47, 'clasica', 88),
(49, 32, 48, 'aleman', 74),
(50, 33, 49, 'qwewq', 61),
(51, 34, 50, 'INGLES', 32),
(52, 35, 51, 'ingles', 87);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantilla`
--

CREATE TABLE `plantilla` (
  `id_plantilla` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `ruta_archivo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plantilla`
--

INSERT INTO `plantilla` (`id_plantilla`, `nombre`, `ruta_archivo`) VALUES
(3, 'minimalista', 'plantillas cv/plantilla_minimalista.html'),
(1, 'moderno', 'plantillas cv/plantilla_moderna.html'),
(2, 'clasica', 'plantillas cv/plantilla_clasica.html');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_usuarios`
--

CREATE TABLE `registro_usuarios` (
  `id_user` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `contrasena` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_usuarios`
--

INSERT INTO `registro_usuarios` (`id_user`, `nombre`, `correo`, `contrasena`) VALUES
(1, 'enrique', 'aeayalac7@hotmail.com', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_curriculum` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(50) NOT NULL,
  `direccion` varchar(255) NOT NULL,
  `sobremi` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `puesto` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_curriculum`, `nombre`, `correo`, `telefono`, `direccion`, `sobremi`, `foto`, `fecha_creacion`, `puesto`) VALUES
(1, 0, 'alejandro', 'Enrique12@mail.com', '1234567890', 'Justo Sierra', 'ejemplo de sobre mi', 'foto de perfil 2.jpg', '2025-05-14 21:40:26', ''),
(2, 0, 'Enrique', 'Enrique12@mail.com', '1234567890', 'Manigua', 'nolose no soy 100tifiko', 'foto de perfil.png', '2025-05-14 21:54:50', ''),
(3, 0, 'jared', 'jared@gmail.com', '12446457', 'carmen campeche', 'soy ingeniero en sistema especializado en ciberseguridad', 'agregar.png', '2025-05-17 00:44:15', ''),
(4, 0, 'hector', 'hec@gmail.com', '967565', 'Justo sierra', 'hola', NULL, '2025-05-17 19:06:36', ''),
(5, 0, 'jarerd', 'ssamu@gmail.com', '10932019', 'Justo sierra', 'aaaaaaaa', NULL, '2025-05-17 19:11:29', ''),
(6, 0, 'hector', 'luis@gmail.com', '10932019', 'Justo sierra', 'ffff', NULL, '2025-05-17 19:12:24', ''),
(7, 0, 'jarerd', 'hec@gmail.com', '10932019', 'Justo sierra', 'uuu', NULL, '2025-05-17 20:19:07', ''),
(8, 0, 'jarerd', 'jared@gmail.com', '45932019', 'Justo sierra', 'a', 'Eliminar.png', '2025-05-17 20:21:57', ''),
(9, 0, 'jarerd', 'jared@gmail.com', '45932019', 'Justo sierra', 'a', 'Eliminar.png', '2025-05-17 20:25:57', ''),
(10, 0, 'hector', 'jose@gmail.com', '967565', 'Justo sierra', 'd', 'Eliminar.png', '2025-05-17 20:26:48', ''),
(11, 0, 'alejandro', 'ale@gmail.com', '12446457234', 'Justo sierra', 'g', 'Eliminar.png', '2025-05-17 20:30:57', ''),
(12, 0, 'luis', 'jared@gmail.com', '45932019', 'Justo sierra', 'a', 'agregar.png', '2025-05-17 20:35:21', ''),
(13, 0, 'jarerd', 'ssamu@gmail.com', '10932019', 'Justo sierra', 'qq', 'agregar.png', '2025-05-17 20:37:16', ''),
(14, 0, 'jarerd', 'luis@gmail.com', '10932019', 'Justo sierra', 'e', 'Eliminar.png', '2025-05-17 20:38:27', ''),
(15, 0, 'jarerd', 'jared@gmail.com', '10932019', 'Justo sierra', 's', 'Eliminar.png', '2025-05-17 20:47:46', ''),
(16, 0, 'jarerd', 'ssamu@gmail.com', '10932019', 'Justo sierra', 'tryrt', 'agregar.png', '2025-05-17 21:02:03', ''),
(17, 1, 'jarerd', 'jared@gmail.com', '10932019', 'Justo sierra', 'wdsds', 'agregar.png', '2025-05-17 21:12:09', ''),
(18, 2, 'jarerd', 'jared@gmail.com', '10932019', 'Justo sierra', 'evesvebeb', 'agregar.png', '2025-05-17 21:24:59', ''),
(19, 3, 'jarerd', 'jared@gmail.com', '10932019', 'Justo sierra', 'ewevwvbr', NULL, '2025-05-17 21:33:35', ''),
(20, 4, 'luis', 'luis@gmail.com', '967565', 'Justo sierra', 'oipiopiop', NULL, '2025-05-17 21:34:43', ''),
(21, 5, 'jarerd', 'ssamu@gmail.com', '10932019', 'Justo sierra', 'dthrtjrtjrt', 'Eliminar.png', '2025-05-17 22:52:14', ''),
(22, 6, 'alejandro', 'ale@gmail.com', '12446457', 'Justo sierra', 'f', 'Eliminar.png', '2025-05-17 23:01:35', ''),
(23, 7, 'jarerd', 'jared@gmail.com', '11111111111', 'Justo sierra', '11111111111', NULL, '2025-05-18 00:25:55', ''),
(24, 8, 'alejandro', 'hec@gmail.com', '222222222', 'Justo sierra', 'eo', NULL, '2025-05-18 00:44:06', ''),
(25, 9, 'luis', 'ale@gmail.com', '33333333', 'Justo sierra', '3', 'Eliminar.png', '2025-05-18 00:45:29', ''),
(26, 10, 'alejandro', 'luis@gmail.com', '44444444', 'Justo sierra', '444444444444', 'agregar.png', '2025-05-18 00:52:24', ''),
(27, 11, 'alejandro', 'luis@gmail.com', '44444444', 'Justo sierra', '444444444444', 'agregar.png', '2025-05-18 01:05:47', ''),
(28, 12, 'jared', 'jared@gmail.com', '555555555555', 'Justo sierra', '555555555555555555555555555', NULL, '2025-05-18 01:07:39', 'gerente de soporte TI'),
(29, 13, 'alejandro', 'jose@gmail.com', '967565', 'Justo sierra', 'r', 'agregar.png', '2025-05-18 01:39:26', 'gerente de soporte TI'),
(30, 14, 'alejandro', 'ssamu@gmail.com', '24656865', 'Justo sierra', 'q', 'Eliminar.png', '2025-05-18 01:45:00', 'gerente de soporte TI'),
(31, 15, 'hector', 'ale@gmail.com', '12446457', 'Justo sierra', 'aa', 'agregar.png', '2025-05-18 01:48:55', ''),
(32, 16, 'Alejandro Enrique Ayala Cerecedo', 'prueba3@mail.com', '9381239823', 'Justo Sierra', 'nose que decir ajjajaj', 'foto de perfil 2.jpg', '2025-05-19 05:10:16', 'Programador'),
(33, 17, 'adas', 'sdasd', 'asda', 'asdasd', 'asda', NULL, '2025-05-19 05:12:06', 'asdad'),
(34, 18, 'asdas', 'asda', 'asdsa', 'asda', 'asda', NULL, '2025-05-19 05:16:35', ''),
(35, 19, 'asdasd', 'asdasd', 'asdaasdasd', 'asdasd', 'asdasd', NULL, '2025-05-19 05:24:20', 'asdasd'),
(36, 20, 'asdasd', 'asdasd', 'asdaasdasd', 'asdasd', 'asdasd', NULL, '2025-05-19 05:24:38', 'asdasd'),
(37, 21, 'asdasd', 'asdasd', 'asdaasdasd', 'asdasd', 'asdasd', NULL, '2025-05-19 05:27:10', 'asdasd'),
(38, 22, 'sdsad', 'asdas', '2341', 'asdasd', 'dsasad', NULL, '2025-05-19 05:28:27', 'asdsa'),
(39, 23, 'dasdas', 'asda', 'asda', 'asda', 'asdasd\r\nasdasd\r\n', NULL, '2025-05-19 05:30:46', 'dadsa'),
(40, 24, 'dasdas', 'asda', 'asda', 'asda', 'asdasd\r\nasdasd\r\n', NULL, '2025-05-19 05:34:57', 'dadsa'),
(41, 25, 'alejandro', 'Enrique12@mail.com', '1234567890', 'asdasd', 'asdasd', NULL, '2025-05-19 05:41:44', 'Programador'),
(42, 26, 'adasda', 'asdada', 'asdads', 'dsad', 'adsad', NULL, '2025-05-19 05:42:33', 'sdada'),
(43, 27, 'adadsa', 'adsa', 'adsa', 'asdsada', 'asdaasda', 'foto de perfil.png', '2025-05-19 05:49:20', 'asdsad'),
(44, 28, 'jose perez', 'adas', '6543213213', 'nose', 'noquiero', NULL, '2025-05-19 05:59:42', 'mi puesto nuevooyea'),
(45, 29, 'jose perez', 'asddas', '123476543', 'privaasdas', 'noquiero\r\n', 'foto de perfil.png', '2025-05-19 06:02:15', 'asda'),
(46, 30, 'dadas', 'asdas', 'asda', 'sdfsd', 'fsdf', 'foto de perfil 2.jpg', '2025-05-19 17:11:41', 'sdsasdaa'),
(47, 31, 'clasica', 'clasica', 'clasica', 'clasica', 'clasica', 'foto de perfil 2.jpg', '2025-05-19 17:14:16', 'clasica'),
(48, 32, 'clasica2', 'clasica2', 'clasica2', 'clasica2', 'clasica2', NULL, '2025-05-19 17:17:03', 'clasica2'),
(49, 33, 'adsfghj', 'dsfghjk', 'asdfghj', 'dsfghj', 'dasfghj', 'foto de perfil 2.jpg', '2025-05-20 17:11:16', 'sSasSAs'),
(50, 34, 'CRISTIAN', 'PRUEBA@MAIL', 'DKUGDUGDQUQ', 'MANAIGUA', 'SOBREMI', NULL, '2025-05-20 17:15:06', 'PROGRAMER'),
(51, 35, 'Alejandro Enrique Ayala Cerecedo', 'prueba3@mail.com', '0987654321', 'Manigua', 'guapo poderoso asombros soy hermoso', 'foto de perfil.png', '2025-05-20 17:28:10', 'analista de sistemas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `curriculum`
--
ALTER TABLE `curriculum`
  ADD PRIMARY KEY (`id_curriculum`);

--
-- Indices de la tabla `educacion`
--
ALTER TABLE `educacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `registro_usuarios`
--
ALTER TABLE `registro_usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curriculum`
--
ALTER TABLE `curriculum`
  MODIFY `id_curriculum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `educacion`
--
ALTER TABLE `educacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `experiencias`
--
ALTER TABLE `experiencias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `idiomas`
--
ALTER TABLE `idiomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `registro_usuarios`
--
ALTER TABLE `registro_usuarios`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `educacion`
--
ALTER TABLE `educacion`
  ADD CONSTRAINT `educacion_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `experiencias`
--
ALTER TABLE `experiencias`
  ADD CONSTRAINT `experiencias_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD CONSTRAINT `habilidades_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `idiomas`
--
ALTER TABLE `idiomas`
  ADD CONSTRAINT `idiomas_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
