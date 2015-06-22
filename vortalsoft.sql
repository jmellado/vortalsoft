-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-06-2015 a las 14:06:55
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `vortalsoft`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` varchar(20) NOT NULL,
  `nom_categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nom_categoria`) VALUES
('1', 'Aseo'),
('2', 'Ferreteria'),
('3', 'Canasta Familiar'),
('4', 'Bebidass alcoholicas'),
('5', 'Bebidass hidratantes'),
('6', 'Bebidas Refrescantes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `decanaturas`
--

CREATE TABLE IF NOT EXISTS `decanaturas` (
  `id_decanatura` varchar(40) NOT NULL,
  `nom_decanatura` varchar(45) NOT NULL,
  `jefe_decanatura` varchar(45) NOT NULL,
  PRIMARY KEY (`id_decanatura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `decanaturas`
--

INSERT INTO `decanaturas` (`id_decanatura`, `nom_decanatura`, `jefe_decanatura`) VALUES
('10', 'Derecho', 'Manuel Ruiz Pineda'),
('11', 'Ingenierias y Tecnologias', 'Alvaro Oñate  Bowen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE IF NOT EXISTS `empleados` (
  `id_empleado` varchar(20) NOT NULL,
  `nom_empleado` varchar(45) NOT NULL,
  `ape_empleado` varchar(45) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `direccion` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  PRIMARY KEY (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleado`, `nom_empleado`, `ape_empleado`, `sexo`, `fecha_nacimiento`, `direccion`, `correo`, `telefono`) VALUES
('1065', 'jeiner', 'mellado', 'm', '1993-11-30', 'calle7 # 29-90', 'je_in_er@hotmail.com', '3135028786');

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

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id_estudiante`, `nom_estudiante`, `ape_estudiante`, `sexo`, `fecha_nacimiento`, `direccion`, `correo`, `telefono`) VALUES
('1065', 'jeiner enrique', 'mellado valencia', 'f', '1993-11-30', 'calle 7 # 29-90', 'jeiner@hotmail.com', '3135028786'),
('1066', 'Miguel jose', 'Palomino Cerpa', 'm', '1992-10-14', 'calle 4 # 13-24', 'migueljose@hotmail.com', '3216968715');

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

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nom_materia`, `num_creditos`, `intensidad_horaria`) VALUES
('12', 'mecanica', '12', '4'),
('1234', 'calculo', '6', '4'),
('13', 'redes', '4', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensum`
--

CREATE TABLE IF NOT EXISTS `pensum` (
  `id_pensum` varchar(40) NOT NULL,
  `id_programa` varchar(45) NOT NULL,
  PRIMARY KEY (`id_pensum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pensum_mat`
--

CREATE TABLE IF NOT EXISTS `pensum_mat` (
  `id_pensum` varchar(40) NOT NULL,
  `id_materia` varchar(45) NOT NULL,
  `semestre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` varchar(20) NOT NULL,
  `nom_producto` varchar(45) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_producto` bigint(20) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `id_categoria` varchar(20) NOT NULL,
  `id_proveedor` varchar(20) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `fk_productos_categorias_idx` (`id_categoria`),
  KEY `fk_productos_proveedores1_idx` (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nom_producto`, `cantidad`, `valor_producto`, `descripcion`, `id_categoria`, `id_proveedor`) VALUES
('1', 'FAB', 45, 4000, 'Detergente  en polvo 350 gr', '1', '1065');

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

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id_profesor`, `nom_profesor`, `ape_profesor`, `sexo`, `fecha_nacimiento`, `direccion`, `correo`, `telefono`) VALUES
('1065', 'Hernando Fabian', 'Lavado nariño', 'm', '1956-11-23', 'calle 4 # 24-86', 'lavado@hotmail.com', '3124454446'),
('1066', 'omar', 'trujillo', 'm', '2015-05-07', 'diagonal 23', 'omar@hotmail.com', '3148575874');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programas`
--

CREATE TABLE IF NOT EXISTS `programas` (
  `id_programa` varchar(40) NOT NULL,
  `nom_programa` varchar(45) NOT NULL,
  `jefe_programa` varchar(45) NOT NULL,
  `id_decanatura` varchar(45) NOT NULL,
  PRIMARY KEY (`id_programa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `programas`
--

INSERT INTO `programas` (`id_programa`, `nom_programa`, `jefe_programa`, `id_decanatura`) VALUES
('20', 'Ingenieria de Sistemas', 'Alvaro Bowen Oñate', '11'),
('21', 'Ingenieria Electronica', 'Hugo Sosa', '11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` varchar(20) NOT NULL,
  `nom_proveedor` varchar(45) NOT NULL,
  `ape_proveedor` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `correo` varchar(45) NOT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nom_proveedor`, `ape_proveedor`, `telefono`, `correo`) VALUES
('1065', 'pedro', 'gomez', '3135028786', 'pgomez@hotmail.com'),
('1066', 'Postobon S.A', 'Postobon S.A', '32212121', 'Postobon@gmail.com'),
('3', 'Stanley', 'Colombia', '3216968715', 'stanley@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` varchar(20) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `user` varchar(45) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `acceso` varchar(45) NOT NULL,
  `id_empleado` varchar(20) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `fk_usuarios_empleados1_idx` (`id_empleado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `rol`, `user`, `pass`, `acceso`, `id_empleado`) VALUES
('1', 'Administrador', 'Amiguel', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1', '1065'),
('2', 'Estudiante', 'Emiguel', '96281f7d23fb17a5b844b114de9f1a708ea3d9df', '1', '1065'),
('3', 'Profesor', 'Pmiguel', '72a2aa63f2926de5d90443e59083aed479387b3f', '1', '1065');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_empleados1` FOREIGN KEY (`id_empleado`) REFERENCES `empleados` (`id_empleado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
