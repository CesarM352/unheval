-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-03-2021 a las 04:31:22
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `laboratoriosbd1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos_en_matricula`
--

CREATE TABLE `alumnos_en_matricula` (
  `codigoalum_matri` varchar(8) NOT NULL,
  `codigomatricula` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `alumnos_en_matricula`
--

INSERT INTO `alumnos_en_matricula` (`codigoalum_matri`, `codigomatricula`) VALUES
('1', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencias`
--

CREATE TABLE `asistencias` (
  `fecha` date NOT NULL,
  `asistio` tinyint(1) NOT NULL,
  `hora` time NOT NULL,
  `idclases` varchar(8) NOT NULL,
  `idasistencia` varchar(10) NOT NULL,
  `codigoalum_matri` varchar(8) NOT NULL,
  `nropc` varchar(4) NOT NULL,
  `estadopc` tinyint(1) NOT NULL,
  `codigopatrimonio` varchar(13) NOT NULL,
  `codigooficina` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencias`
--

INSERT INTO `asistencias` (`fecha`, `asistio`, `hora`, `idclases`, `idasistencia`, `codigoalum_matri`, `nropc`, `estadopc`, `codigopatrimonio`, `codigooficina`) VALUES
('2021-03-14', 1, '19:30:30', '1', '1', '1', '4254', 1, '421585744254', '2'),
('2021-03-14', 1, '20:31:26', '2', '2', '1', '4254', 1, '421585744254', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asuntos`
--

CREATE TABLE `asuntos` (
  `codigoasunto` varchar(8) NOT NULL,
  `nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asuntos`
--

INSERT INTO `asuntos` (`codigoasunto`, `nombre`) VALUES
('1', 'EQUIPO'),
('2', 'SOFTWARE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `codigocarrera` varchar(8) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `codigofacultad` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carreras`
--

INSERT INTO `carreras` (`codigocarrera`, `nombre`, `codigofacultad`) VALUES
('000465', 'Ingeniería de Sistemas e Informática', '01234'),
('000568', 'Ingeniería Industrial', '01234'),
('1', 'IS', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `certificado`
--

CREATE TABLE `certificado` (
  `codigo` char(18) NOT NULL,
  `fechainicio` char(18) DEFAULT NULL,
  `fechafinal` char(18) DEFAULT NULL,
  `horas` char(18) DEFAULT NULL,
  `nombres` char(18) DEFAULT NULL,
  `apellidos` char(18) DEFAULT NULL,
  `dni` char(18) DEFAULT NULL,
  `lugar` char(18) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `idclases` varchar(8) NOT NULL,
  `dia` varchar(9) NOT NULL,
  `horainicio` datetime NOT NULL,
  `horafin` datetime NOT NULL,
  `codigohorario` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clases`
--

INSERT INTO `clases` (`idclases`, `dia`, `horainicio`, `horafin`, `codigohorario`) VALUES
('1', 'DOMINGO', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2'),
('2', 'DOMINGO', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracionsw`
--

CREATE TABLE `configuracionsw` (
  `codigoconfiguracionsw` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `valor` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `codigocurso` varchar(10) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `descripcion` varchar(40) DEFAULT NULL,
  `numerocredito` int(11) NOT NULL,
  `codigocarrera` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`codigocurso`, `nombre`, `descripcion`, `numerocredito`, `codigocarrera`) VALUES
('0', 'PRÉSTAMO', 'PRÉSTAMO', 0, '1'),
('001456', 'Cálculo I', '', 4, '000465'),
('001457', 'Microeconomía', 'economía de los mercados internos', 3, '000465'),
('001458', 'Ingles I', '', 3, '000568'),
('002250', 'cúrso 1', 'xxxxxxxxx', 3, '000465'),
('002251', 'cúrso 2', 'xxxxxxxxx', 4, '000568'),
('002252', 'cúrso 3', 'xxxxxxxxx', 5, '000465'),
('002253', 'cúrso 4', 'xxxxxxxxx', 3, '000568'),
('002254', 'cúrso 5', 'xxxxxxxxx', 4, '000465'),
('002255', 'cúrso 6', 'xxxxxxxxx', 5, '000568'),
('002256', 'cúrso 7', 'xxxxxxxxx', 3, '000465'),
('002257', 'cúrso 8', 'xxxxxxxxx', 4, '000568'),
('002258', 'cúrso 9', 'xxxxxxxxx', 5, '000465'),
('002259', 'cúrso 10', 'xxxxxxxxx', 3, '000568'),
('002563', 'Física I', '', 4, '000568'),
('002564', 'Física II', '', 4, '000568'),
('002565', 'Física III', NULL, 4, '000568'),
('002596', 'Física I', '', 4, '000465'),
('003215', 'Matemática Básica I', '', 4, '000568'),
('003216', 'Física II', '', 4, '000465'),
('004581', 'Matemática Básica II', '', 4, '000465'),
('005823', 'Cálculo III', '', 5, '000465'),
('006598', 'Ingles II', '', 3, '000568'),
('006812', 'Cálculo I', '', 4, '000568'),
('007458', 'Ingles I', 'idiomas', 3, '000568'),
('008569', 'Física III', '', 4, '000465'),
('008899', 'Estadística I', '', 4, '000568'),
('032568', 'Análisis y Diseño de Sistemas', '', 4, '000465');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcciones`
--

CREATE TABLE `direcciones` (
  `codigodireccion` varchar(8) NOT NULL,
  `codigovia` varchar(8) NOT NULL,
  `nropuerta` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `direcciones`
--

INSERT INTO `direcciones` (`codigodireccion`, `codigovia`, `nropuerta`) VALUES
('1', '1', '401'),
('2', '1', '402');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes`
--

CREATE TABLE `docentes` (
  `codigodocente` varchar(12) NOT NULL,
  `celular` varchar(9) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `codigodireccion` varchar(6) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `codtipocontrato` varchar(8) NOT NULL,
  `user` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `docentes`
--

INSERT INTO `docentes` (`codigodocente`, `celular`, `dni`, `codigodireccion`, `nombre`, `codtipocontrato`, `user`, `pass`) VALUES
('0', '.', '.', '1', '.', '0001', 'EXTERNO', '.EXTERNO'),
('0002', '962584712', '69352141', '1', 'Maria Palomar Santos', '0001', 'mpalomar', '2222'),
('0003', '962584569', '45263587', '1', 'Pilar Rios Prado', '0002', 'prios', '3333'),
('0004', '962353137', '62355421', '2', 'Carlos Albornoz Uzuriaga', '0001', 'calbornoz', '4444'),
('0005', '962989594', '22659847', '2', 'José Clemencio Galvez', '0002', 'jclemencio', '5555'),
('0006', '969526421', '12457889', '2', 'César Liberato Torres', '0004', 'cliberato', '6666'),
('0007', '969989886', '22986531', '2', 'Melchor Benavides Justo', '0004', 'mbenavides', '7777'),
('0008', '962887799', '41256321', '2', 'Valentín Pineda Magino', '0002', 'vpineda', '8888'),
('0009', '962545487', '22656554', '1', 'Malcom Jaimes Inocencio', '0003', 'mjaimes', '9999'),
('1', '969523154', '52613498', '1', 'Jorge Benancio Rojas', '0002', 'jbenancio', '1111');

--
-- Disparadores `docentes`
--
DELIMITER $$
CREATE TRIGGER `docente_usuarios_a_i` AFTER INSERT ON `docentes` FOR EACH ROW BEGIN
INSERT INTO usuarios(codigo,nombre,user,pass,perfil_id)
VALUES(NEW.codigodocente, NEW.nombre, NEW.user, NEW.pass, 2);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `docentes_usuarios_a_d` AFTER DELETE ON `docentes` FOR EACH ROW BEGIN
DELETE FROM usuarios WHERE usuarios.codigo=old.codigodocente;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `docentes_usuarios_a_u` AFTER UPDATE ON `docentes` FOR EACH ROW BEGIN
UPDATE usuarios SET nombre=NEW.nombre,user=NEW.user,pass=NEW.pass
where codigo=NEW.codigodocente;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `codigopatrimonio` varchar(12) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `ram` varchar(300) DEFAULT NULL,
  `procesador` varchar(300) DEFAULT NULL,
  `hdd` varchar(300) DEFAULT NULL,
  `ssd` varchar(300) DEFAULT NULL,
  `fechaingreso` date DEFAULT NULL,
  `tarjetavideo` varchar(300) DEFAULT NULL,
  `rfid` varchar(20) DEFAULT NULL,
  `estadoperativo` tinyint(1) DEFAULT NULL,
  `fechacaduca` date NOT NULL,
  `codtipoingreso` varchar(6) NOT NULL,
  `codtipoequipo` varchar(8) NOT NULL,
  `codigoestado` int(11) NOT NULL,
  `color` char(18) DEFAULT NULL,
  `modelo` char(18) DEFAULT NULL,
  `serie` char(18) DEFAULT NULL,
  `fechabaja` date DEFAULT NULL,
  `documentobaja` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`codigopatrimonio`, `nombre`, `descripcion`, `ram`, `procesador`, `hdd`, `ssd`, `fechaingreso`, `tarjetavideo`, `rfid`, `estadoperativo`, `fechacaduca`, `codtipoingreso`, `codtipoequipo`, `codigoestado`, `color`, `modelo`, `serie`, `fechabaja`, `documentobaja`) VALUES
('1', 'PC', 'PC DE TORRE', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-03-31', '1', '1', 1, NULL, NULL, NULL, NULL, NULL),
('421585744251', '', '', '', '', '', '', '2021-03-12', '', '', 1, '2021-03-12', '1', '1', 2, '', '', '', '2021-03-12', '82_2019_09_25_19_9_13.pdf'),
('421585744253', '', 'incluye parlantes', '', '', '', '', '2021-03-13', '', '', 1, '2021-03-13', '1', '1', 2, '', '', '', NULL, NULL),
('421585744254', '', '', '', '', '', '', '2021-03-13', '', '', 1, '2021-03-13', '1', '1', 1, '', '', '', NULL, NULL),
('421585744255', '', '', '', '', '', '', '2021-03-13', '', '', 1, '2021-03-26', '1', '1', 2, '', '', '', '2021-03-12', 'SpringFrameworkNotesForProfessionals.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoequipo`
--

CREATE TABLE `estadoequipo` (
  `codigoestado` int(11) NOT NULL,
  `nombre` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estadoequipo`
--

INSERT INTO `estadoequipo` (`codigoestado`, `nombre`) VALUES
(1, 'BUENO'),
(2, 'BAJA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

CREATE TABLE `estudiantes` (
  `codigoestudiante` varchar(12) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `user` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `anionacimiento` date NOT NULL,
  `fechaingreso` date NOT NULL,
  `dni` varchar(8) NOT NULL,
  `celular` varchar(9) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`codigoestudiante`, `nombre`, `user`, `pass`, `anionacimiento`, `fechaingreso`, `dni`, `celular`, `email`) VALUES
('02019225897', 'Felix Sotomonte Calixto', 'fsotomonte', '3333', '2000-10-17', '2019-03-09', '42156565', '960112245', 'fsotomonte@unheval.edu.pe'),
('02019256483', 'Elias Castillo Quispe', 'ecastillo', '2222', '2000-03-06', '2019-03-06', '52693534', '962515451', 'ecastillo@unheval.edu.pe'),
('02019558987', 'Angie Mata Solano', 'amata', '4444', '2021-04-29', '2019-03-09', '42441122', '960225155', 'amata@unheval.edu.pe'),
('1', 'Gilberto Urrutia Cisneros', 'gurrutia', '1111', '2004-05-17', '2020-03-10', '45632123', '960525261', 'gurrutia@unheval.edu.pe');

--
-- Disparadores `estudiantes`
--
DELIMITER $$
CREATE TRIGGER `estudiantes_usuarios_a_d` AFTER DELETE ON `estudiantes` FOR EACH ROW BEGIN
DELETE FROM usuarios WHERE usuarios.codigo=old.codigoestudiante;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `estudiantes_usuarios_a_i` AFTER INSERT ON `estudiantes` FOR EACH ROW BEGIN
INSERT INTO usuarios(codigo,nombre,user,pass,perfil_id)
VALUES(NEW.codigoestudiante, NEW.nombre, NEW.user, NEW.pass, 4);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `estudiantes_usuarios_a_u` AFTER UPDATE ON `estudiantes` FOR EACH ROW BEGIN
UPDATE usuarios SET nombre=NEW.nombre,user=NEW.user,pass=NEW.pass
where codigo=NEW.codigoestudiante;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante_carrera`
--

CREATE TABLE `estudiante_carrera` (
  `codigoestudiante` varchar(12) NOT NULL,
  `codigocarrera` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facultades`
--

CREATE TABLE `facultades` (
  `codigofacultad` varchar(8) NOT NULL,
  `nombre` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facultades`
--

INSERT INTO `facultades` (`codigofacultad`, `nombre`) VALUES
('01234', 'Ingeniería Industrial y Sistemas'),
('1', 'FIIS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `codigogrupo` varchar(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `numeroalumnos` int(11) NOT NULL,
  `maximoalumnos` int(11) NOT NULL,
  `codigodocente` varchar(12) NOT NULL,
  `codigocurso` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`codigogrupo`, `nombre`, `numeroalumnos`, `maximoalumnos`, `codigodocente`, `codigocurso`) VALUES
('0', '.', 0, 0, '0', '0'),
('0001', 'Grupo I', 30, 40, '0002', '006812'),
('0003', 'Grupo I', 25, 40, '0002', '005823'),
('0004', 'Grupo II', 34, 40, '0003', '005823'),
('0006', 'Grupo I', 38, 40, '0002', '002596'),
('0007', 'Grupo I', 25, 35, '0005', '003216'),
('0008', 'Grupo I', 18, 30, '0004', '004581'),
('0009', 'Grupo II', 36, 42, '0002', '004581'),
('0011', 'Grupo I', 33, 40, '0002', '002563'),
('0014561', 'Grupo I', 20, 25, '0006', '001456'),
('0014562', 'Grupo II', 34, 40, '0003', '001456'),
('0014563', 'Grupo III', 25, 40, '0006', '001456'),
('0031', 'Grupo III', 35, 45, '0003', '004581'),
('0032', 'Grupo I', 30, 40, '0003', '032568'),
('0032', 'Grupo II', 30, 40, '0004', '032568'),
('0032151', 'Grupo I', 27, 30, '0005', '003215'),
('0032162', 'Grúpo II', 35, 40, '0002', '003216'),
('0032163', 'Grúpo III', 24, 30, '0005', '003216'),
('0032164', 'Grúpo IV', 15, 20, '0003', '003216'),
('0033', 'Grupo I', 34, 35, '0003', '008569'),
('0058234', 'Grupo IV', 26, 30, '0005', '005823'),
('0058235', 'Grupo III', 35, 40, '0004', '005823');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `codigohorario` varchar(8) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafinal` date NOT NULL,
  `codigodocente` varchar(12) NOT NULL,
  `codigogrupo` varchar(8) NOT NULL,
  `codigocurso` varchar(10) NOT NULL,
  `codigooficina` varchar(10) NOT NULL,
  `semestre` varchar(10) NOT NULL,
  `nro_dia` int(11) NOT NULL,
  `hora_inicio` time DEFAULT NULL,
  `hora_fin` time DEFAULT NULL,
  `curso` varchar(100) NOT NULL,
  `docente` varchar(250) NOT NULL,
  `tipo_horario` int(11) NOT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`codigohorario`, `fechainicio`, `fechafinal`, `codigodocente`, `codigogrupo`, `codigocurso`, `codigooficina`, `semestre`, `nro_dia`, `hora_inicio`, `hora_fin`, `curso`, `docente`, `tipo_horario`, `fecha`) VALUES
('1', '2021-03-02', '2021-08-13', '1', '1', '2', '1', '2021-I', 7, '07:00:00', '18:30:00', 'c2', 'd2', 1, NULL),
('2', '2021-03-15', '2021-03-15', '0004', '0058235', '005823', '2', '2021-I', 7, '18:55:00', '19:55:00', 'Cálculo III', 'Carlos Albornoz Uzuriaga', 1, NULL),
('3', '2021-03-15', '2021-03-15', '0003', '0031', '004581', '1', '2021-I', 7, '19:57:00', '21:05:00', 'Matemática Básica II', 'Pilar Rios Prado', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorios_equipo`
--

CREATE TABLE `laboratorios_equipo` (
  `codigooficina` varchar(10) NOT NULL,
  `fechaingreso` date DEFAULT NULL,
  `estadopresente` tinyint(1) DEFAULT NULL,
  `codigopatrimonio` varchar(12) NOT NULL,
  `codigolaboratorioequipo` varchar(10) NOT NULL,
  `justificacionretiro` varchar(250) DEFAULT NULL,
  `fecharetiro` date DEFAULT NULL,
  `oficinaorigen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `laboratorios_equipo`
--

INSERT INTO `laboratorios_equipo` (`codigooficina`, `fechaingreso`, `estadopresente`, `codigopatrimonio`, `codigolaboratorioequipo`, `justificacionretiro`, `fecharetiro`, `oficinaorigen`) VALUES
('1', '2021-03-12', 0, '421585744251', '1', 'v', '2021-03-12', NULL),
('2', '2021-03-12', 0, '421585744251', '2', NULL, NULL, '401'),
('1', '2021-03-13', 1, '421585744251', '3', NULL, NULL, NULL),
('2', '2021-03-13', 0, '421585744254', '4', 'nn', '2021-03-14', NULL),
('3', '2021-03-13', 1, '421585744253', '5', NULL, NULL, NULL),
('2', '2021-03-13', 1, '421585744255', '6', NULL, NULL, NULL),
('3', '2021-03-14', 0, '421585744254', '7', 'necesidad', '2021-03-14', '402'),
('2', '2021-03-14', 0, '421585744254', '8', 'g', '2021-03-14', 'DECANATOC'),
('1', '2021-03-14', 1, '421585744254', '9', NULL, NULL, '402');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorios_mantenimiento`
--

CREATE TABLE `laboratorios_mantenimiento` (
  `codigomantenimiento` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `laboratorios_software`
--

CREATE TABLE `laboratorios_software` (
  `codigooficina` varchar(10) NOT NULL,
  `codigosoftware` varchar(6) NOT NULL,
  `fechainstalacion` date NOT NULL,
  `nro_licencias` int(11) NOT NULL,
  `softwareadquisicionid` int(11) NOT NULL,
  `codigolaboratoriosoftware` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `laboratorios_software`
--

INSERT INTO `laboratorios_software` (`codigooficina`, `codigosoftware`, `fechainstalacion`, `nro_licencias`, `softwareadquisicionid`, `codigolaboratoriosoftware`) VALUES
('1', '5', '2021-03-16', 50, 7, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `codigomantenimiento` varchar(6) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechafin` date NOT NULL,
  `meses` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `codigomatricula` varchar(18) NOT NULL,
  `codigocurso` varchar(10) NOT NULL,
  `codigoestudiante` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`codigomatricula`, `codigocurso`, `codigoestudiante`) VALUES
('1', '001456', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficina`
--

CREATE TABLE `oficina` (
  `codigooficina` varchar(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `aforo` int(11) NOT NULL,
  `piso` int(11) NOT NULL,
  `cantidadpc` int(11) NOT NULL,
  `descripcion` varchar(40) DEFAULT NULL,
  `camaravigilancia` tinyint(1) DEFAULT NULL,
  `codtipoofi` varchar(6) NOT NULL,
  `codpabellon` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `oficina`
--

INSERT INTO `oficina` (`codigooficina`, `nombre`, `aforo`, `piso`, `cantidadpc`, `descripcion`, `camaravigilancia`, `codtipoofi`, `codpabellon`) VALUES
('1', '401', 50, 4, 1, NULL, NULL, '2', '1'),
('2', '402', 50, 4, 1, NULL, NULL, '2', '1'),
('3', 'DECANATOC', 50, 2, 1, NULL, NULL, '3', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pabellon`
--

CREATE TABLE `pabellon` (
  `codpabellon` varchar(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `detalles` varchar(300) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pabellon`
--

INSERT INTO `pabellon` (`codpabellon`, `name`, `detalles`, `numero`, `image`) VALUES
('1', 'PAB IV', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(2) NOT NULL,
  `denominacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `denominacion`) VALUES
(1, 'Administrador'),
(2, 'Docente'),
(3, 'Técnico'),
(4, 'Estudiante'),
(5, 'Secretaria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `problemas`
--

CREATE TABLE `problemas` (
  `codigoproblema` varchar(8) NOT NULL,
  `fechareporte` date NOT NULL,
  `codigoestudiante` varchar(12) NOT NULL,
  `detalles` varchar(400) NOT NULL,
  `codigoasunto` varchar(8) NOT NULL,
  `codigopatrimonio` varchar(12) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `estado` varchar(10) NOT NULL,
  `justificacion` varchar(250) NOT NULL,
  `tipo_problema` varchar(50) NOT NULL,
  `tecnico` varchar(250) DEFAULT NULL,
  `fecha_hora_atencion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `problemas`
--

INSERT INTO `problemas` (`codigoproblema`, `fechareporte`, `codigoestudiante`, `detalles`, `codigoasunto`, `codigopatrimonio`, `usuario`, `estado`, `justificacion`, `tipo_problema`, `tecnico`, `fecha_hora_atencion`) VALUES
('1', '2021-03-13', '1', 'v1', '1', '421585744251', 'REGISTRADO POR: Cesar Martel', 'REPARADO', 'se pudo arreglar', 'EQUIPO', 'Cesar Martel', '2021-03-13 18:22:52'),
('2', '2021-03-15', '1', 'SE PONE LENTA A VECES', '1', '421585744254', 'REGISTRADO POR: Gilberto Urrutia Cisneros', 'REPARADO', 'FORMATEADO', 'EQUIPO', 'Gilberto Urrutia Cisneros', '2021-03-15 02:41:12'),
('3', '2021-03-15', '1', 'FALTA EL AUTOCAD', '2', '421585744254', 'REGISTRADO POR: Gilberto Urrutia Cisneros', 'PENDIENTE', '', 'SOFTWARE', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `softwares`
--

CREATE TABLE `softwares` (
  `codigosoftware` varchar(6) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `version` varchar(30) NOT NULL,
  `propietario` tinyint(1) NOT NULL,
  `conlicencia` tinyint(1) NOT NULL,
  `minimoram` varchar(200) NOT NULL,
  `minimovideo` varchar(300) NOT NULL,
  `minimoprocesador` varchar(200) NOT NULL,
  `minimohhd` varchar(200) NOT NULL,
  `detalles` varchar(300) DEFAULT NULL,
  `tipo_sw` varchar(10) NOT NULL,
  `forma` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `softwares`
--

INSERT INTO `softwares` (`codigosoftware`, `nombre`, `version`, `propietario`, `conlicencia`, `minimoram`, `minimovideo`, `minimoprocesador`, `minimohhd`, `detalles`, `tipo_sw`, `forma`) VALUES
('1', 'AUTOCAD', '', 0, 0, '', '', '', '', NULL, 'LICENCIADO', ''),
('2', 'winrar', '10', 0, 0, '', '', '', '', '', 'LIBRE', 'EXPRESS'),
('3', 'PHOTOSHOP', '1.0', 1, 0, '', '', '', '', '', 'LICENCIADO', 'PRUEBA'),
('4', 'PHOTOSHOP', '10', 1, 1, '', '', '', '', '', 'LICENCIADO', 'ESCRITORIO'),
('5', 'PROTEUS', '5', 1, 1, '', '', '', '', '', 'LICENCIADO', 'ESCRITORIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `software_adquisicion`
--

CREATE TABLE `software_adquisicion` (
  `id` int(11) NOT NULL,
  `software_id` int(11) NOT NULL,
  `nro_licencias` int(11) NOT NULL,
  `fecha_compra` date NOT NULL,
  `duracion_dias` int(11) NOT NULL,
  `nro_licencias_disponibles` int(11) NOT NULL,
  `requisitos_minimos` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `software_adquisicion`
--

INSERT INTO `software_adquisicion` (`id`, `software_id`, `nro_licencias`, `fecha_compra`, `duracion_dias`, `nro_licencias_disponibles`, `requisitos_minimos`) VALUES
(4, 2, 0, '0000-00-00', 0, 0, NULL),
(5, 3, 0, '2021-03-13', 2, 0, NULL),
(6, 4, 25, '2021-03-01', 16, 25, NULL),
(7, 5, 150, '2021-03-13', -1, 100, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE `tecnicos` (
  `numerocontrato` varchar(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `user` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `anionacimiento` date NOT NULL,
  `celular` varchar(9) NOT NULL,
  `fechainicio` date NOT NULL,
  `dni` varchar(8) NOT NULL,
  `fechacaduca` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tecnicos`
--

INSERT INTO `tecnicos` (`numerocontrato`, `nombre`, `user`, `pass`, `anionacimiento`, `celular`, `fechainicio`, `dni`, `fechacaduca`) VALUES
('0202111456', 'Eladio Martinez Zapata', 'cmartinez', '1111', '1982-03-10', '962556699', '2021-03-06', '22569854', '2021-06-06'),
('0202111457', 'Maricarmen Trillas Santiagas', 'mtrillas', '2222', '1985-05-20', '962545487', '2021-03-09', '40121256', '2021-06-09'),
('0202111458', 'Franco Tomas Valle', 'ftomas', '3333', '1982-08-24', '962441103', '2021-03-09', '40223136', '2021-06-09');

--
-- Disparadores `tecnicos`
--
DELIMITER $$
CREATE TRIGGER `tecnicos_usuarios_a_d` AFTER DELETE ON `tecnicos` FOR EACH ROW BEGIN
DELETE FROM usuarios WHERE usuarios.codigo=old.numerocontrato;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tecnicos_usuarios_a_i` AFTER INSERT ON `tecnicos` FOR EACH ROW BEGIN
INSERT INTO usuarios(codigo,nombre,user,pass,perfil_id)
VALUES(NEW.numerocontrato, NEW.nombre, NEW.user, NEW.pass, 3);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tecnicos_usuarios_a_u` AFTER UPDATE ON `tecnicos` FOR EACH ROW BEGIN
UPDATE usuarios SET nombre=NEW.nombre,user=NEW.user,pass=NEW.pass
where codigo=NEW.numerocontrato;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipocontratodoc`
--

CREATE TABLE `tipocontratodoc` (
  `codtipocontrato` varchar(8) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipocontratodoc`
--

INSERT INTO `tipocontratodoc` (`codtipocontrato`, `nombre`) VALUES
('0001', 'TC'),
('0002', 'C2'),
('0003', 'C3'),
('0004', 'TC1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoequipos`
--

CREATE TABLE `tipoequipos` (
  `codtipoequipo` varchar(8) NOT NULL,
  `tiempoobsolecencia` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoequipos`
--

INSERT INTO `tipoequipos` (`codtipoequipo`, `tiempoobsolecencia`, `nombre`) VALUES
('1', 5, 'COMPUTADOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoingresos`
--

CREATE TABLE `tipoingresos` (
  `codtipoingreso` varchar(6) NOT NULL,
  `nombre` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoingresos`
--

INSERT INTO `tipoingresos` (`codtipoingreso`, `nombre`) VALUES
('1', 'COMPRA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipooficina`
--

CREATE TABLE `tipooficina` (
  `codtipoofi` varchar(6) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `detales` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipooficina`
--

INSERT INTO `tipooficina` (`codtipoofi`, `nombre`, `detales`) VALUES
('1', 'AULA', NULL),
('2', 'LABORATORIO', NULL),
('3', 'OFICINA', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovias`
--

CREATE TABLE `tipovias` (
  `codigovia` varchar(6) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipovias`
--

INSERT INTO `tipovias` (`codigovia`, `nombre`) VALUES
('1', 'V1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `codigo` varchar(15) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `user` varchar(15) NOT NULL,
  `pass` varchar(15) NOT NULL,
  `perfil_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nombre`, `user`, `pass`, `perfil_id`) VALUES
('0003', 'Ingeniero', 'ing', '1111', 1),
('0004', 'Docente', 'doc', '2222', 2),
('0005', 'Técnico', 'tec', '3333', 3),
('0006', 'Estudiante', 'est', '4444', 4),
('0008', 'Secretaria', 'sec', '5555', 5);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos_en_matricula`
--
ALTER TABLE `alumnos_en_matricula`
  ADD PRIMARY KEY (`codigoalum_matri`),
  ADD KEY `R_36` (`codigomatricula`);

--
-- Indices de la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD PRIMARY KEY (`idasistencia`),
  ADD KEY `R_27` (`idclases`),
  ADD KEY `R_37` (`codigoalum_matri`),
  ADD KEY `R_38` (`codigopatrimonio`);

--
-- Indices de la tabla `asuntos`
--
ALTER TABLE `asuntos`
  ADD PRIMARY KEY (`codigoasunto`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`codigocarrera`),
  ADD KEY `R_7` (`codigofacultad`);

--
-- Indices de la tabla `certificado`
--
ALTER TABLE `certificado`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`idclases`),
  ADD KEY `R_28` (`codigohorario`);

--
-- Indices de la tabla `configuracionsw`
--
ALTER TABLE `configuracionsw`
  ADD PRIMARY KEY (`codigoconfiguracionsw`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`codigocurso`),
  ADD KEY `R_85` (`codigocarrera`);

--
-- Indices de la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD PRIMARY KEY (`codigodireccion`),
  ADD KEY `R_62` (`codigovia`);

--
-- Indices de la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD PRIMARY KEY (`codigodocente`),
  ADD KEY `R_63` (`codigodireccion`),
  ADD KEY `R_79` (`codtipocontrato`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`codigopatrimonio`),
  ADD KEY `R_86` (`codtipoingreso`),
  ADD KEY `R_87` (`codtipoequipo`),
  ADD KEY `R_89` (`codigoestado`);

--
-- Indices de la tabla `estadoequipo`
--
ALTER TABLE `estadoequipo`
  ADD PRIMARY KEY (`codigoestado`);

--
-- Indices de la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD PRIMARY KEY (`codigoestudiante`);

--
-- Indices de la tabla `estudiante_carrera`
--
ALTER TABLE `estudiante_carrera`
  ADD PRIMARY KEY (`codigocarrera`,`codigoestudiante`),
  ADD KEY `R_3` (`codigoestudiante`);

--
-- Indices de la tabla `facultades`
--
ALTER TABLE `facultades`
  ADD PRIMARY KEY (`codigofacultad`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`codigogrupo`,`codigodocente`,`codigocurso`),
  ADD KEY `R_30` (`codigodocente`),
  ADD KEY `R_31` (`codigocurso`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`codigohorario`),
  ADD KEY `R_25` (`codigodocente`),
  ADD KEY `R_88` (`codigogrupo`,`codigodocente`,`codigocurso`);

--
-- Indices de la tabla `laboratorios_equipo`
--
ALTER TABLE `laboratorios_equipo`
  ADD PRIMARY KEY (`codigolaboratorioequipo`),
  ADD KEY `R_55` (`codigooficina`),
  ADD KEY `R_57` (`codigopatrimonio`);

--
-- Indices de la tabla `laboratorios_mantenimiento`
--
ALTER TABLE `laboratorios_mantenimiento`
  ADD PRIMARY KEY (`codigomantenimiento`);

--
-- Indices de la tabla `laboratorios_software`
--
ALTER TABLE `laboratorios_software`
  ADD PRIMARY KEY (`codigolaboratoriosoftware`),
  ADD KEY `R_53` (`codigosoftware`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`codigomantenimiento`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`codigomatricula`),
  ADD KEY `R_34` (`codigocurso`),
  ADD KEY `R_35` (`codigoestudiante`);

--
-- Indices de la tabla `oficina`
--
ALTER TABLE `oficina`
  ADD PRIMARY KEY (`codigooficina`) USING BTREE,
  ADD KEY `R_66` (`codtipoofi`),
  ADD KEY `R_84` (`codpabellon`);

--
-- Indices de la tabla `pabellon`
--
ALTER TABLE `pabellon`
  ADD PRIMARY KEY (`codpabellon`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `problemas`
--
ALTER TABLE `problemas`
  ADD PRIMARY KEY (`codigoproblema`,`codigopatrimonio`,`codigoestudiante`),
  ADD KEY `R_67` (`codigoasunto`),
  ADD KEY `R_69` (`codigopatrimonio`),
  ADD KEY `R_61` (`codigoestudiante`);

--
-- Indices de la tabla `softwares`
--
ALTER TABLE `softwares`
  ADD PRIMARY KEY (`codigosoftware`);

--
-- Indices de la tabla `software_adquisicion`
--
ALTER TABLE `software_adquisicion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tecnicos`
--
ALTER TABLE `tecnicos`
  ADD PRIMARY KEY (`numerocontrato`);

--
-- Indices de la tabla `tipocontratodoc`
--
ALTER TABLE `tipocontratodoc`
  ADD PRIMARY KEY (`codtipocontrato`);

--
-- Indices de la tabla `tipoequipos`
--
ALTER TABLE `tipoequipos`
  ADD PRIMARY KEY (`codtipoequipo`);

--
-- Indices de la tabla `tipoingresos`
--
ALTER TABLE `tipoingresos`
  ADD PRIMARY KEY (`codtipoingreso`);

--
-- Indices de la tabla `tipooficina`
--
ALTER TABLE `tipooficina`
  ADD PRIMARY KEY (`codtipoofi`);

--
-- Indices de la tabla `tipovias`
--
ALTER TABLE `tipovias`
  ADD PRIMARY KEY (`codigovia`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `perfil` (`perfil_id`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `configuracionsw`
--
ALTER TABLE `configuracionsw`
  MODIFY `codigoconfiguracionsw` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `laboratorios_software`
--
ALTER TABLE `laboratorios_software`
  MODIFY `codigolaboratoriosoftware` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `software_adquisicion`
--
ALTER TABLE `software_adquisicion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos_en_matricula`
--
ALTER TABLE `alumnos_en_matricula`
  ADD CONSTRAINT `R_36` FOREIGN KEY (`codigomatricula`) REFERENCES `matriculas` (`codigomatricula`);

--
-- Filtros para la tabla `asistencias`
--
ALTER TABLE `asistencias`
  ADD CONSTRAINT `R_27` FOREIGN KEY (`idclases`) REFERENCES `clases` (`idclases`),
  ADD CONSTRAINT `R_37` FOREIGN KEY (`codigoalum_matri`) REFERENCES `alumnos_en_matricula` (`codigoalum_matri`),
  ADD CONSTRAINT `R_38` FOREIGN KEY (`codigopatrimonio`) REFERENCES `equipos` (`codigopatrimonio`);

--
-- Filtros para la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD CONSTRAINT `R_7` FOREIGN KEY (`codigofacultad`) REFERENCES `facultades` (`codigofacultad`);

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `R_28` FOREIGN KEY (`codigohorario`) REFERENCES `horarios` (`codigohorario`);

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `R_85` FOREIGN KEY (`codigocarrera`) REFERENCES `carreras` (`codigocarrera`);

--
-- Filtros para la tabla `direcciones`
--
ALTER TABLE `direcciones`
  ADD CONSTRAINT `R_62` FOREIGN KEY (`codigovia`) REFERENCES `tipovias` (`codigovia`);

--
-- Filtros para la tabla `docentes`
--
ALTER TABLE `docentes`
  ADD CONSTRAINT `R_63` FOREIGN KEY (`codigodireccion`) REFERENCES `direcciones` (`codigodireccion`),
  ADD CONSTRAINT `R_79` FOREIGN KEY (`codtipocontrato`) REFERENCES `tipocontratodoc` (`codtipocontrato`);

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `R_86` FOREIGN KEY (`codtipoingreso`) REFERENCES `tipoingresos` (`codtipoingreso`),
  ADD CONSTRAINT `R_87` FOREIGN KEY (`codtipoequipo`) REFERENCES `tipoequipos` (`codtipoequipo`),
  ADD CONSTRAINT `R_89` FOREIGN KEY (`codigoestado`) REFERENCES `estadoequipo` (`codigoestado`);

--
-- Filtros para la tabla `estudiante_carrera`
--
ALTER TABLE `estudiante_carrera`
  ADD CONSTRAINT `R_3` FOREIGN KEY (`codigoestudiante`) REFERENCES `estudiantes` (`codigoestudiante`),
  ADD CONSTRAINT `R_5` FOREIGN KEY (`codigocarrera`) REFERENCES `carreras` (`codigocarrera`);

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `R_30` FOREIGN KEY (`codigodocente`) REFERENCES `docentes` (`codigodocente`),
  ADD CONSTRAINT `R_31` FOREIGN KEY (`codigocurso`) REFERENCES `cursos` (`codigocurso`);

--
-- Filtros para la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `R_25` FOREIGN KEY (`codigodocente`) REFERENCES `docentes` (`codigodocente`),
  ADD CONSTRAINT `R_88` FOREIGN KEY (`codigogrupo`,`codigodocente`,`codigocurso`) REFERENCES `grupos` (`codigogrupo`, `codigodocente`, `codigocurso`);

--
-- Filtros para la tabla `laboratorios_equipo`
--
ALTER TABLE `laboratorios_equipo`
  ADD CONSTRAINT `R_55` FOREIGN KEY (`codigooficina`) REFERENCES `oficina` (`codigooficina`),
  ADD CONSTRAINT `R_57` FOREIGN KEY (`codigopatrimonio`) REFERENCES `equipos` (`codigopatrimonio`);

--
-- Filtros para la tabla `laboratorios_mantenimiento`
--
ALTER TABLE `laboratorios_mantenimiento`
  ADD CONSTRAINT `R_82` FOREIGN KEY (`codigomantenimiento`) REFERENCES `mantenimiento` (`codigomantenimiento`);

--
-- Filtros para la tabla `laboratorios_software`
--
ALTER TABLE `laboratorios_software`
  ADD CONSTRAINT `R_53` FOREIGN KEY (`codigosoftware`) REFERENCES `softwares` (`codigosoftware`);

--
-- Filtros para la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD CONSTRAINT `R_34` FOREIGN KEY (`codigocurso`) REFERENCES `cursos` (`codigocurso`),
  ADD CONSTRAINT `R_35` FOREIGN KEY (`codigoestudiante`) REFERENCES `estudiantes` (`codigoestudiante`);

--
-- Filtros para la tabla `oficina`
--
ALTER TABLE `oficina`
  ADD CONSTRAINT `R_66` FOREIGN KEY (`codtipoofi`) REFERENCES `tipooficina` (`codtipoofi`),
  ADD CONSTRAINT `R_84` FOREIGN KEY (`codpabellon`) REFERENCES `pabellon` (`codpabellon`);

--
-- Filtros para la tabla `problemas`
--
ALTER TABLE `problemas`
  ADD CONSTRAINT `R_61` FOREIGN KEY (`codigoestudiante`) REFERENCES `estudiantes` (`codigoestudiante`),
  ADD CONSTRAINT `R_67` FOREIGN KEY (`codigoasunto`) REFERENCES `asuntos` (`codigoasunto`),
  ADD CONSTRAINT `R_69` FOREIGN KEY (`codigopatrimonio`) REFERENCES `equipos` (`codigopatrimonio`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_usuarios_perfil` FOREIGN KEY (`perfil_id`) REFERENCES `perfil` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
