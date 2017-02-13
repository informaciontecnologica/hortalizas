-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2017 a las 03:38:28
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `mah`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `barrio`
--

CREATE TABLE IF NOT EXISTS `barrio` (
  `idbarrio` int(11) NOT NULL AUTO_INCREMENT,
  `barrio` varchar(35) COLLATE utf8_bin NOT NULL DEFAULT 'nombre del barrio',
  `idciudad` int(11) NOT NULL,
  `idmunicipio` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  PRIMARY KEY (`idbarrio`,`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`),
  KEY `Ref428` (`idmunicipio`,`iddepartamento`,`idciudad`,`idprovincia`,`idpais`),
  KEY `Refciudad28` (`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `barrio`
--

INSERT INTO `barrio` (`idbarrio`, `barrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`) VALUES
(1, 'San martin', 1, 1, 1, 1, 1),
(2, 'Coluccio', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `idbarrio` int(11) NOT NULL AUTO_INCREMENT,
  `barrio` varchar(35) COLLATE utf8_bin NOT NULL DEFAULT 'nombre del barrio',
  `idciudad` int(11) NOT NULL,
  `idmunicipio` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  PRIMARY KEY (`idbarrio`,`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`),
  KEY `Ref428` (`idmunicipio`,`iddepartamento`,`idciudad`,`idprovincia`,`idpais`),
  KEY `Refciudad28` (`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idbarrio`, `barrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`) VALUES
(1, 'San martin', 1, 1, 1, 1, 1),
(2, 'Coluccio', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE IF NOT EXISTS `departamento` (
  `idbarrio` int(11) NOT NULL AUTO_INCREMENT,
  `barrio` varchar(35) COLLATE utf8_bin NOT NULL DEFAULT 'nombre del barrio',
  `idciudad` int(11) NOT NULL,
  `idmunicipio` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  PRIMARY KEY (`idbarrio`,`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`),
  KEY `Ref428` (`idmunicipio`,`iddepartamento`,`idciudad`,`idprovincia`,`idpais`),
  KEY `Refciudad28` (`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`idbarrio`, `barrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`) VALUES
(1, 'San martin', 1, 1, 1, 1, 1),
(2, 'Coluccio', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE IF NOT EXISTS `instituciones` (
  `idinstitucion` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) DEFAULT NULL,
  `direccion` varchar(85) DEFAULT NULL,
  `teleofno` char(16) DEFAULT NULL,
  `mail` char(85) DEFAULT NULL,
  PRIMARY KEY (`idinstitucion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

CREATE TABLE IF NOT EXISTS `municipio` (
  `idbarrio` int(11) NOT NULL AUTO_INCREMENT,
  `barrio` varchar(35) COLLATE utf8_bin NOT NULL DEFAULT 'nombre del barrio',
  `idciudad` int(11) NOT NULL,
  `idmunicipio` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  PRIMARY KEY (`idbarrio`,`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`),
  KEY `Ref428` (`idmunicipio`,`iddepartamento`,`idciudad`,`idprovincia`,`idpais`),
  KEY `Refciudad28` (`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`idbarrio`, `barrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`) VALUES
(1, 'San martin', 1, 1, 1, 1, 1),
(2, 'Coluccio', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE IF NOT EXISTS `pais` (
  `idbarrio` int(11) NOT NULL AUTO_INCREMENT,
  `barrio` varchar(35) COLLATE utf8_bin NOT NULL DEFAULT 'nombre del barrio',
  `idciudad` int(11) NOT NULL,
  `idmunicipio` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  PRIMARY KEY (`idbarrio`,`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`),
  KEY `Ref428` (`idmunicipio`,`iddepartamento`,`idciudad`,`idprovincia`,`idpais`),
  KEY `Refciudad28` (`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`idbarrio`, `barrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`) VALUES
(1, 'San martin', 1, 1, 1, 1, 1),
(2, 'Coluccio', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE IF NOT EXISTS `perfil` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `perfil` varchar(35) COLLATE utf8_bin NOT NULL,
  `privilegios` int(11) NOT NULL,
  `nivel` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id_perfil`, `perfil`, `privilegios`, `nivel`) VALUES
(1, 'Administrador', 1, 1),
(2, 'Gerencia', 1, 2),
(3, 'Analista', 1, 3),
(4, 'Usuario', 1, 2),
(5, 'Propietario', 3, 3),
(6, 'Nulo', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `apellido` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `mail` varchar(45) COLLATE utf8_bin NOT NULL,
  `telefono` varchar(12) COLLATE utf8_bin NOT NULL,
  `direccion` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `documento` int(11) DEFAULT NULL,
  `idusuario` int(10) unsigned zerofill NOT NULL,
  `celular` varchar(16) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idpersona`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idpersona`, `nombre`, `apellido`, `nacimiento`, `mail`, `telefono`, `direccion`, `documento`, `idusuario`, `celular`) VALUES
(6, 'jorge daniel', 'castro', '2017-02-04', 'w@w', '2222222111', 'bresalovich 232', 20222037, 0000000005, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas_rubro`
--

CREATE TABLE IF NOT EXISTS `personas_rubro` (
  `idproductores_tiporubro` int(11) NOT NULL AUTO_INCREMENT,
  `idpersona` int(10) unsigned zerofill NOT NULL,
  `idrubro` int(10) unsigned zerofill NOT NULL,
  PRIMARY KEY (`idproductores_tiporubro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `personas_rubro`
--

INSERT INTO `personas_rubro` (`idproductores_tiporubro`, `idpersona`, `idrubro`) VALUES
(2, 0000000006, 0000000001),
(3, 0000000006, 0000000002);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productores`
--

CREATE TABLE IF NOT EXISTS `productores` (
  `idproductor` int(11) NOT NULL AUTO_INCREMENT,
  `direccion` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idproductor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE IF NOT EXISTS `provincia` (
  `idbarrio` int(11) NOT NULL AUTO_INCREMENT,
  `barrio` varchar(35) COLLATE utf8_bin NOT NULL DEFAULT 'nombre del barrio',
  `idciudad` int(11) NOT NULL,
  `idmunicipio` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `idpais` int(11) NOT NULL,
  PRIMARY KEY (`idbarrio`,`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`),
  KEY `Ref428` (`idmunicipio`,`iddepartamento`,`idciudad`,`idprovincia`,`idpais`),
  KEY `Refciudad28` (`idciudad`,`idmunicipio`,`iddepartamento`,`idprovincia`,`idpais`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`idbarrio`, `barrio`, `idciudad`, `idmunicipio`, `iddepartamento`, `idprovincia`, `idpais`) VALUES
(1, 'San martin', 1, 1, 1, 1, 1),
(2, 'Coluccio', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubro`
--

CREATE TABLE IF NOT EXISTS `rubro` (
  `idrubro` int(11) NOT NULL AUTO_INCREMENT,
  `rubro` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idrubro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `rubro`
--

INSERT INTO `rubro` (`idrubro`, `rubro`) VALUES
(1, 'productor'),
(2, 'mayorista'),
(3, 'Almacenero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idusuario` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `clave` char(36) COLLATE utf8_bin DEFAULT NULL,
  `mail` char(50) COLLATE utf8_bin DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`idusuario`),
  UNIQUE KEY `mail` (`mail`),
  KEY `Ref1040` (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `usuario`, `clave`, `mail`, `fecha`, `id_perfil`) VALUES
(3, NULL, '099b3b060154898840f0ebdfb46ec78f', 'qq@qq', '2017-02-07', 5),
(4, NULL, '7694f4a66316e53c8cdd9d9954bd611d', 'a@a', '2017-02-07', 5),
(5, NULL, '0cc175b9c0f1b6a831c399e269772661', 'w@w', '2017-02-08', 5);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
