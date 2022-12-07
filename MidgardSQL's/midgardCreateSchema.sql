-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 02-12-2022 a las 11:41:57
-- Versión del servidor: 8.0.31-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `midgard`
--
CREATE DATABASE IF NOT EXISTS `midgard` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `midgard`;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`midgard`@`%` PROCEDURE `publicacionPantalla` (IN `mac_enviada` VARCHAR(17), IN `fechaActual` DATE)  BEGIN
    
select p.id_publicacion, p.fechaCreacion, p.titulo, p.fechaInicio, p.fechaFin, p.mensaje, p.imagen, p.fechaAprobacion, p.escritor, p.aprobador FROM PUBLICACION p, PANTALLA_PUBLICACION pp WHERE p.id_publicacion = pp.id_publicacion and mac_enviada= pp.mac_pantalla and p.id = '1' and fechaActual between fechaInicio and fechaFin;

end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ESTADO`
--

CREATE TABLE `ESTADO` (
  `id_estado` int NOT NULL,
  `nombre_estado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ESTADO`
--

INSERT INTO `ESTADO` (`id_estado`, `nombre_estado`) VALUES
(1, 'Activo'),
(2, 'Pendiente'),
(3, 'Denegado'),
(4, 'Archivada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PANTALLA`
--

CREATE TABLE `PANTALLA` (
  `mac_pantalla` varchar(17) NOT NULL,
  `ubicacion` varchar(200) NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `PANTALLA`
--

INSERT INTO `PANTALLA` (`mac_pantalla`, `ubicacion`, `nombre`) VALUES
('00:00:00:00:00:00', 'Pantalla por defecto', 'Zero'),
('00:00:00:00:0a:d0', 'hola', 'Guardias'),
('00:1e:c2:9e:28:1b', 'Edificio de Servicios Centrales', 'Redondo 1'),
('00:1e:c2:9e:28:2b', 'Edificio Botánico LOSCOS', 'Loscos 1'),
('00:1e:c2:9e:28:3b', 'Edificio Cardenal RAM', 'Ram 1'),
('00:1e:c2:9e:28:4b', 'Edificio Cardenal RAM', 'Ram 2'),
('b8:27:eb:61:8f:b2', 'En el centro de aqui mismo.', 'Final');

--
-- Disparadores `PANTALLA`
--
DELIMITER $$
CREATE TRIGGER `gestionDeletePantalla` BEFORE DELETE ON `PANTALLA` FOR EACH ROW begin
   	 declare CONTADOR_PANTALLA_PUBLICACION int;
   	 select ifnull(count(PANTALLA_PUBLICACION.mac_pantalla), 0) into CONTADOR_PANTALLA_PUBLICACION from PANTALLA, PANTALLA_PUBLICACION where PANTALLA.mac_pantalla = PANTALLA_PUBLICACION.mac_pantalla; /* Si da mayor a 0 es porque ese nombre en especifico esta en ambas tablas */
   	 if (CONTADOR_PANTALLA_PUBLICACION > 0) then
   		 delete from PANTALLA_PUBLICACION where mac_pantalla=old.mac_pantalla;
   	 end if;
	end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PANTALLA_PUBLICACION`
--

CREATE TABLE `PANTALLA_PUBLICACION` (
  `id_publicacion` int NOT NULL,
  `mac_pantalla` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `PANTALLA_PUBLICACION`
--

INSERT INTO `PANTALLA_PUBLICACION` (`id_publicacion`, `mac_pantalla`) VALUES
(20, '00:00:00:00:0a:d0'),
(23, '00:00:00:00:0a:d0'),
(20, '00:1e:c2:9e:28:1b'),
(22, '00:1e:c2:9e:28:1b'),
(23, '00:1e:c2:9e:28:1b'),
(25, '00:1e:c2:9e:28:1b'),
(31, '00:1e:c2:9e:28:1b'),
(20, '00:1e:c2:9e:28:2b'),
(20, '00:1e:c2:9e:28:3b'),
(21, '00:1e:c2:9e:28:3b'),
(22, '00:1e:c2:9e:28:3b'),
(26, '00:1e:c2:9e:28:3b'),
(32, '00:1e:c2:9e:28:3b'),
(20, '00:1e:c2:9e:28:4b'),
(21, '00:1e:c2:9e:28:4b'),
(22, '00:1e:c2:9e:28:4b'),
(25, '00:1e:c2:9e:28:4b'),
(28, 'b8:27:eb:61:8f:b2'),
(29, 'b8:27:eb:61:8f:b2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `PUBLICACION`
--

CREATE TABLE `PUBLICACION` (
  `id_publicacion` int NOT NULL,
  `fechaCreacion` date NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `mensaje` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `imagen` varchar(500) DEFAULT NULL,
  `fechaAprobacion` date DEFAULT NULL,
  `escritor` varchar(50) DEFAULT NULL,
  `aprobador` varchar(50) DEFAULT NULL,
  `motivo` varchar(200) DEFAULT NULL,
  `id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `PUBLICACION`
--

INSERT INTO `PUBLICACION` (`id_publicacion`, `fechaCreacion`, `titulo`, `fechaInicio`, `fechaFin`, `mensaje`, `imagen`, `fechaAprobacion`, `escritor`, `aprobador`, `motivo`, `id`) VALUES
(20, '2022-11-29', 'Noticia 1', '2022-11-29', '2022-11-29', 'Aprobada en todas las pantallas', NULL, '2022-11-29', 'mario', 'mario', NULL, 1),
(21, '2022-11-30', 'Pongo', '2022-12-02', '2022-12-02', 'lo que pongo y, veo lo que veo.', NULL, '2022-11-30', 'david', 'david', NULL, 1),
(22, '2022-11-30', 'El Cementerio', '2022-12-09', '2022-12-09', 'Todos acudimos al lago aquella fría noche, la luna negra se encontraba en lo alto... (linea 72- Luna Negra)', 'lolitab.jpg', '2022-11-30', 'david', 'david', NULL, 1),
(23, '2022-11-30', 'Yo  ', '2022-11-30', '2022-11-30', 'Tu eres yo, y yo soy nosotros... Pantalla?', NULL, '2022-11-30', 'david', 'david', NULL, 1),
(25, '2022-11-30', 'No aprobabada', '2022-11-30', '2022-11-30', 'Ninguno', 'Logo(1).ico', '2022-11-30', 'pablo', 'david', NULL, 1),
(26, '2022-11-30', 'Noticia nueva', '2022-11-30', '2022-11-30', 'soy un mensaje', NULL, NULL, 'pablo', NULL, 'Es necesario', 3),
(27, '2022-11-30', 'Publicación por defecto', '2022-11-30', '2030-11-01', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Est, obcaecati doloribus numquam consequuntur optio eos rem explicabo eius incidunt harum, necessitatibus placeat culpa? Asperiores similique perferendis deserunt eveniet eaque! Vitae.\r\n', '1.jpg', '2022-11-30', 'mario', 'mario', NULL, 1),
(28, '2022-12-02', 'Reunion', '2022-12-02', '2022-12-02', 'Hoy nos reunimos toda la Orden con el motivo de dar un veredicto sobre el trabajo de nuestros fieles.', NULL, '2022-12-02', 'david', 'david', NULL, 1),
(29, '2022-12-02', 'La Imagen', '2022-12-02', '2022-12-02', '', 'prueba.jpg', '2022-12-02', 'david', 'david', NULL, 1),
(31, '2022-12-02', 'Pruebas alerts', '2022-12-02', '2022-12-02', 'Probando ', NULL, '2022-12-02', 'mario', 'mario', NULL, 1),
(32, '2022-12-02', 'Alert', '2022-12-02', '2022-12-02', 'asfb akjsbnfjs', NULL, '2022-12-02', 'mario', 'mario', NULL, 1);

--
-- Disparadores `PUBLICACION`
--
DELIMITER $$
CREATE TRIGGER `gestionDeletePublicacion` BEFORE DELETE ON `PUBLICACION` FOR EACH ROW begin
   	 declare CONTADOR_PANTALLA_PUBLICACION int;
   	 select ifnull(count(PANTALLA_PUBLICACION.id_publicacion), 0) into CONTADOR_PANTALLA_PUBLICACION from PUBLICACION, PANTALLA_PUBLICACION where PUBLICACION.id_publicacion = PANTALLA_PUBLICACION.id_publicacion; /* Si da mayor a 0 es porque ese nombre en especifico esta en ambas tablas */
   	 if (CONTADOR_PANTALLA_PUBLICACION > 0) then
   		 delete from PANTALLA_PUBLICACION where id_publicacion=old.id_publicacion;
   	 end if;
	end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ROL`
--

CREATE TABLE `ROL` (
  `id_rol` int NOT NULL,
  `nombre_rol` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ROL`
--

INSERT INTO `ROL` (`id_rol`, `nombre_rol`) VALUES
(1, 'Admin'),
(2, 'Aprobador'),
(3, 'Publicador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `USUARIO`
--

CREATE TABLE `USUARIO` (
  `username` varchar(50) NOT NULL,
  `clave` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dni` varchar(11) DEFAULT NULL,
  `inactivo` tinyint(1) NOT NULL,
  `id_rol` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `USUARIO`
--

INSERT INTO `USUARIO` (`username`, `clave`, `nombre`, `email`, `dni`, `inactivo`, `id_rol`) VALUES
('aprobador', '$2y$10$WqBeYTT6dXgzsDY0MUc5au2vTDwOxGVw5pn.s3kspOzYxEIMkcMV6', 'Aprobador', 'aprobar123@gmail.com', '12354697Y', 0, 2),
('david', '$2y$10$WKt/UY6KdmEP5qizM8LoGu/nRzyXCiAqu6V6GHLOHZ9RwN7ttwsPK', 'david', 'david@gmail.com', '11111111W', 0, 1),
('mario', '$2y$10$VyMA.5Uh5k4M9A.vke0qheirpqLydfOixwWHaILpCg6d0q3CXDUHu', 'mario', 'mario@gmail.com', '33333333W', 0, 1),
('pablo', '$2y$10$TxHTmhgaGSw8Fjyq//JU3eLOmERYIHTst71.2hGd2FsGXU4BBMYGa', 'pablo', 'pablo@gmail.es', '55555555V', 0, 3),
('ruben', '$2y$10$x.b7JzG3nUJ/k0PMTCHk9OW1/w3EyYM.c6fFr8hEyoSDjyBxPn8g.', 'ruben', 'ruben@gmail.com', '22222222W', 0, 1);

--
-- Disparadores `USUARIO`
--
DELIMITER $$
CREATE TRIGGER `gestionDeleteUsuario` BEFORE DELETE ON `USUARIO` FOR EACH ROW begin
  	  declare CONTADOR_PUBLICACION_ESCRITA, CONTADOR_PUBLICACION_APROBADA int;
	 
 	select ifnull(count(USUARIO.username), 0) into CONTADOR_PUBLICACION_ESCRITA from USUARIO, PUBLICACION where PUBLICACION.escritor = USUARIO.username; /* Si da mayor a 0 es porque ese usuario en especifico esta en ambas tablas */
 	select ifnull(count(USUARIO.username), 0) into CONTADOR_PUBLICACION_APROBADA FROM USUARIO, PUBLICACION where PUBLICACION.aprobador = USUARIO.username;
  	 
 	if (CONTADOR_PUBLICACION_ESCRITA > 0) then
		 update PUBLICACION set aprobador = NULL, id = '4' where escritor=old.username;
 	end if;
  	  if (CONTADOR_PUBLICACION_ESCRITA > 0) then
  		  delete from PUBLICACION where escritor=old.username;
  	  end if;
    end
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ESTADO`
--
ALTER TABLE `ESTADO`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `PANTALLA`
--
ALTER TABLE `PANTALLA`
  ADD PRIMARY KEY (`mac_pantalla`);

--
-- Indices de la tabla `PANTALLA_PUBLICACION`
--
ALTER TABLE `PANTALLA_PUBLICACION`
  ADD PRIMARY KEY (`id_publicacion`,`mac_pantalla`),
  ADD KEY `FK6` (`mac_pantalla`);

--
-- Indices de la tabla `PUBLICACION`
--
ALTER TABLE `PUBLICACION`
  ADD PRIMARY KEY (`id_publicacion`),
  ADD KEY `FK2` (`escritor`),
  ADD KEY `FK3` (`aprobador`),
  ADD KEY `FK4` (`id`);

--
-- Indices de la tabla `ROL`
--
ALTER TABLE `ROL`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD KEY `FK1` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ESTADO`
--
ALTER TABLE `ESTADO`
  MODIFY `id_estado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `PUBLICACION`
--
ALTER TABLE `PUBLICACION`
  MODIFY `id_publicacion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `ROL`
--
ALTER TABLE `ROL`
  MODIFY `id_rol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `PANTALLA_PUBLICACION`
--
ALTER TABLE `PANTALLA_PUBLICACION`
  ADD CONSTRAINT `FK5` FOREIGN KEY (`id_publicacion`) REFERENCES `PUBLICACION` (`id_publicacion`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `FK6` FOREIGN KEY (`mac_pantalla`) REFERENCES `PANTALLA` (`mac_pantalla`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `PUBLICACION`
--
ALTER TABLE `PUBLICACION`
  ADD CONSTRAINT `FK2` FOREIGN KEY (`escritor`) REFERENCES `USUARIO` (`username`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `FK3` FOREIGN KEY (`aprobador`) REFERENCES `USUARIO` (`username`) ON DELETE RESTRICT ON UPDATE CASCADE,
  ADD CONSTRAINT `FK4` FOREIGN KEY (`id`) REFERENCES `ESTADO` (`id_estado`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Filtros para la tabla `USUARIO`
--
ALTER TABLE `USUARIO`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`id_rol`) REFERENCES `ROL` (`id_rol`) ON DELETE RESTRICT ON UPDATE CASCADE;

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`midgard`@`%` EVENT `UpdateEstado` ON SCHEDULE EVERY 1 DAY STARTS '2022-11-01 00:00:00' ON COMPLETION NOT PRESERVE ENABLE DO UPDATE PUBLICACION SET PUBLICACION.id = '4' WHERE CURDATE() > fechaFin$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
