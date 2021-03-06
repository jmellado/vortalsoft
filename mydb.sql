-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2015 a las 22:11:04
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga_academica`
--

CREATE TABLE IF NOT EXISTS `carga_academica` (
  `id_profesor` varchar(20) NOT NULL,
  `id_materia` varchar(20) NOT NULL,
  `año` varchar(20) NOT NULL,
  `semestre` varchar(1) NOT NULL,
  KEY `fk_profesores_has_materias_materias1_idx` (`id_materia`),
  KEY `fk_profesores_has_materias_profesores1_idx` (`id_profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decanaturas`
--

CREATE TABLE IF NOT EXISTS `decanaturas` (
  `id_decanatura` varchar(20) NOT NULL,
  `nom_decanatura` varchar(45) NOT NULL,
  `jefe_decanatura` varchar(45) NOT NULL,
  PRIMARY KEY (`id_decanatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_matricula`
--

CREATE TABLE IF NOT EXISTS `detalle_matricula` (
  `id_matricula` varchar(20) NOT NULL,
  `idmat_grupo` varchar(25) NOT NULL,
  KEY `fk_matricula_has_mat_grupos_mat_grupos1_idx` (`idmat_grupo`),
  KEY `fk_matricula_has_mat_grupos_matricula1_idx` (`id_matricula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE IF NOT EXISTS `estudiantes` (
  `id_estudiante` varchar(20) NOT NULL,
  `nom_estudiante` varchar(45) NOT NULL,
  `ape_estudiante` varchar(45) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  PRIMARY KEY (`id_estudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE IF NOT EXISTS `materias` (
  `id_materia` varchar(20) NOT NULL,
  `nom_materia` varchar(45) NOT NULL,
  `num_creditos` varchar(3) NOT NULL,
  `intensidad_horaria` varchar(45) NOT NULL,
  PRIMARY KEY (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE IF NOT EXISTS `matricula` (
  `id_matricula` varchar(20) NOT NULL,
  `id_estudiante` varchar(20) NOT NULL,
  `id_programa` varchar(20) NOT NULL,
  PRIMARY KEY (`id_matricula`),
  KEY `fk_matricula_estudiantes1_idx` (`id_estudiante`),
  KEY `fk_matricula_programas1_idx` (`id_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mat_grupos`
--

CREATE TABLE IF NOT EXISTS `mat_grupos` (
  `idmat_grupo` varchar(25) NOT NULL,
  `id_materia` varchar(20) NOT NULL,
  `id_grupo` varchar(10) NOT NULL,
  `cant_max` varchar(45) NOT NULL,
  PRIMARY KEY (`idmat_grupo`),
  KEY `fk_mat_grupos_materias1_idx` (`id_materia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensum`
--

CREATE TABLE IF NOT EXISTS `pensum` (
  `id_pensum` varchar(20) NOT NULL,
  `id_programa` varchar(20) NOT NULL,
  PRIMARY KEY (`id_pensum`),
  KEY `fk_pensum_programas1_idx` (`id_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensum_materias`
--

CREATE TABLE IF NOT EXISTS `pensum_materias` (
  `id_pensum` varchar(20) NOT NULL,
  `id_materia` varchar(20) NOT NULL,
  `semestre` varchar(45) NOT NULL,
  KEY `fk_pensum_has_materias_materias1_idx` (`id_materia`),
  KEY `fk_pensum_has_materias_pensum1_idx` (`id_pensum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `id_personal` varchar(45) NOT NULL,
  `rol` varchar(45) NOT NULL,
  PRIMARY KEY (`id_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_personal`, `rol`) VALUES
('1065', 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE IF NOT EXISTS `profesores` (
  `id_profesor` varchar(20) NOT NULL,
  `nom_profesor` varchar(45) NOT NULL,
  `ape_profesor` varchar(45) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  PRIMARY KEY (`id_profesor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE IF NOT EXISTS `programas` (
  `id_programa` varchar(20) NOT NULL,
  `nom_programa` varchar(45) NOT NULL,
  `jefe_programa` varchar(45) NOT NULL,
  `id_decanatura` varchar(20) NOT NULL,
  PRIMARY KEY (`id_programa`),
  KEY `fk_programas_decanaturas1_idx` (`id_decanatura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_roles` int(11) NOT NULL AUTO_INCREMENT,
  `nom_rol` varchar(45) NOT NULL,
  PRIMARY KEY (`id_roles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` varchar(20) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `acceso` varchar(45) NOT NULL,
  `id_personal` varchar(45) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuarios_personal_idx` (`id_personal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol`, `user`, `pass`, `acceso`, `id_personal`) VALUES
('1', 'Administrador', 'Amiguel', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1', '1065'),
('2', 'Estudiante', 'Emiguel', '96281f7d23fb17a5b844b114de9f1a708ea3d9df', '1', '1065'),
('3', 'Profesor', 'Dmiguel', '72a2aa63f2926de5d90443e59083aed479387b3f', '1', '1065');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carga_academica`
--
ALTER TABLE `carga_academica`
  ADD CONSTRAINT `fk_profesores_has_materias_profesores1` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id_profesor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_profesores_has_materias_materias1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `detalle_matricula`
--
ALTER TABLE `detalle_matricula`
  ADD CONSTRAINT `fk_matricula_has_mat_grupos_matricula1` FOREIGN KEY (`id_matricula`) REFERENCES `matricula` (`id_matricula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matricula_has_mat_grupos_mat_grupos1` FOREIGN KEY (`idmat_grupo`) REFERENCES `mat_grupos` (`idmat_grupo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `fk_matricula_estudiantes1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id_estudiante`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_matricula_programas1` FOREIGN KEY (`id_programa`) REFERENCES `programas` (`id_programa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `mat_grupos`
--
ALTER TABLE `mat_grupos`
  ADD CONSTRAINT `fk_mat_grupos_materias1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pensum`
--
ALTER TABLE `pensum`
  ADD CONSTRAINT `fk_pensum_programas1` FOREIGN KEY (`id_programa`) REFERENCES `programas` (`id_programa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pensum_materias`
--
ALTER TABLE `pensum_materias`
  ADD CONSTRAINT `fk_pensum_has_materias_pensum1` FOREIGN KEY (`id_pensum`) REFERENCES `pensum` (`id_pensum`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pensum_has_materias_materias1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `programas`
--
ALTER TABLE `programas`
  ADD CONSTRAINT `fk_programas_decanaturas1` FOREIGN KEY (`id_decanatura`) REFERENCES `decanaturas` (`id_decanatura`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_personal` FOREIGN KEY (`id_personal`) REFERENCES `personal` (`id_personal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
