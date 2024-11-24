-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2024 a las 06:17:17
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
-- Base de datos: `sip_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `id_usuario`, `fecha`) VALUES
(2, 5, '2024-11-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `id_departamento` int(11) NOT NULL,
  `nombre_departamento` varchar(200) NOT NULL,
  `descripcion` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`id_departamento`, `nombre_departamento`, `descripcion`) VALUES
(3, 'Informatica', 'Es el encargado del departamento TI en general, llevando a cabo tareas de informatica especificas en la rama.'),
(4, 'Archivos', 'Manejo de los archivos de la compaÃ±Ã­a.'),
(5, 'Recursos Humanos', 'Personal encargado de realizar gestiones relacionadas al contrato, contrataciÃ³n, etc.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `icono` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `nombre`, `ruta`, `icono`) VALUES
(1, 'Usuarios', '../usuario/usuario.php', 'handshake-o'),
(2, 'Roles', '../roles/roles.php', 'suitcase'),
(3, 'Departamento', '../departamento/departamento.php', 'group'),
(4, 'Plaza', '../plaza/plaza.php', 'sitemap'),
(5, 'Subir Asistencias', '../asistencia/subir_asistencia.php', 'suitcase'),
(6, 'Vacaciones', '../vacaciones/vacaciones.php', 'newspaper-o'),
(7, 'Solicitudes', '../gestion_vacacion/gestion_vacacion.php', 'folder'),
(8, 'Ver Asistencias', '../asistencia/visualizar_asistencia.php', 'suitcase'),
(9, 'Solicitar Permiso', '../permiso/solicitud_permiso.php', 'plane'),
(10, 'Visualizar Permisos', '../permiso/visualizar_permisos.php', 'eye'),
(11, 'Ver mis Permisos', '../permiso/ver_mis_permisos.php', 'eye');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id_vacaciones` int(11) NOT NULL,
  `justificacion` varchar(150) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `estado` enum('Pendiente','Aprobado','Rechazado') DEFAULT 'Pendiente',
  `comentario_admin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id_vacaciones`, `justificacion`, `id_usuario`, `id_tipo`, `fecha`, `hora_inicio`, `hora_final`, `estado`, `comentario_admin`) VALUES
(7, 'Hola', 5, 1, '2024-11-30', '10:29:00', '21:30:00', 'Aprobado', 'Claro que si mi chill.'),
(8, 'Necesito un permiso para exponer en DSI y sacarme 10.', 5, 3, '2024-11-29', '12:50:00', '14:52:00', 'Rechazado', 'Deje de inventar'),
(9, 'Necesito permiso para salir por 1 hora.', 5, 1, '2024-11-30', '13:13:00', '14:13:00', 'Aprobado', 'Se merece el permiso'),
(10, 'Necesito salir a tomar aire fresco.', 5, 3, '2024-11-28', '14:34:00', '16:37:00', 'Aprobado', 'Procede, mi amigo.'),
(11, 'Necesito salir a ver que hago.', 5, 1, '2024-11-26', '13:32:00', '15:37:00', 'Rechazado', 'No tiene permiso, tiene que ponerse a trabajar.'),
(12, 'Necesito salir a buscar al T800', 23, 1, '2024-11-30', '14:44:00', '16:44:00', 'Pendiente', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plaza`
--

CREATE TABLE `plaza` (
  `id_plaza` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `id_departamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `plaza`
--

INSERT INTO `plaza` (`id_plaza`, `nombre`, `estado`, `id_departamento`) VALUES
(1, 'Administrativo', 1, 4),
(2, 'Ventas', 1, 3),
(3, 'Soporte', 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`, `estado`, `descripcion`) VALUES
(1, 'Administrador', 1, 'Acceso sin restricciones a los modulos del sistema de informacion de personal'),
(2, 'Empleado', 1, 'El empleado cuenta con acceso restringido al sistema.'),
(3, 'Recursos humanos', 1, 'Personal que realiza la gestión del personal.'),
(4, 'Electricidad', 1, 'Personal encargada de mantener en funcionamiento los sistema electricos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_modulos`
--

CREATE TABLE `rol_modulos` (
  `id_rol` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `rol_modulos`
--

INSERT INTO `rol_modulos` (`id_rol`, `id_modulo`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(2, 6),
(2, 8),
(2, 9),
(2, 11),
(3, 5),
(3, 6),
(3, 7),
(3, 8),
(3, 10),
(3, 11),
(4, 6),
(4, 7),
(4, 8),
(4, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudes_vacaciones`
--

CREATE TABLE `solicitudes_vacaciones` (
  `id_solicitud` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `comentarios` varchar(500) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `solicitudes_vacaciones`
--

INSERT INTO `solicitudes_vacaciones` (`id_solicitud`, `id_empleado`, `fecha_inicio`, `fecha_fin`, `comentarios`, `estado`) VALUES
(8, 21, '2024-11-21', '2024-12-05', 'Vacación anual', 'Aprobado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_permiso`
--

CREATE TABLE `tipo_permiso` (
  `id_tipo` int(11) NOT NULL,
  `nombre_permiso` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `tipo_permiso`
--

INSERT INTO `tipo_permiso` (`id_tipo`, `nombre_permiso`) VALUES
(1, 'Personal'),
(2, 'Médico'),
(3, 'Estudios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `dui` varchar(10) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `telefono` varchar(8) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `fecha_nacimiento` varchar(200) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `nacionalidad` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `id_departamento` int(11) NOT NULL,
  `id_plaza` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `id_rol`, `imagen`, `nombre`, `apellido`, `dui`, `telefono`, `correo`, `fecha_nacimiento`, `direccion`, `nacionalidad`, `estado`, `id_departamento`, `id_plaza`) VALUES
(5, 'admin', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 1, 'avatar_f.png', 'Sandra', 'Álvarez', '33222313-6', '63424342', 'sandra@gmail.com', '1990-01-01', '8501 NW 17TH ST STE 120', 'SV', 1, 3, 1),
(15, 'sandra', 'a1Bz20ydqelm8m1wql19a6733a9b71ad5413ad1e2e9caeb8e6', 2, 'avatar_f.png', 'Sandra', 'Álvarez', '123456789', '5555-555', 'sandra@gmail.com', '1990-01-01', '8501 NW 17TH ST STE 120', 'SV', 1, 5, 1),
(16, 'noe', 'a1Bz20ydqelm8m1wql4cddb5be1b125edbf1a5835a1e93d810', 1, 'noe.png', 'Noe', 'Cordova', '11223344-5', '2222-222', 'noe@gmail.com', '1995-01-01', '8501 NW 17TH ST STE 120', 'SV', 1, 3, 1),
(17, 'kevin.melgar', 'a1Bz20ydqelm8m1wql21232f297a57a5a743894a0e4a801fc3', 1, 'kevin.melgar.png', 'Stanley', 'Melgar', '123455678', '12345677', 'mr21083@ues.edu.sv', '2024-10-01', 'Dirección ficticia ', 'SV', 1, 4, 1),
(19, 'usuario', 'a1Bz20ydqelm8m1wql202cb962ac59075b964b07152d234b70', 1, '', 'nombre1', 'apellido1', '1a', 'telefono', 'correo@correo', '2024-10-01', 'direccion', 'nacionalidad', 0, 3, NULL),
(20, 'Alexis', 'a1Bz20ydqelm8m1wql81dc9bdb52d04dc20036dbd8313ed055', 2, 'Alexis.png', 'Alexis', 'Pérez', '23443254-3', '77644345', 'alexis@gmail.com', '1998-10-24', 'Santa María', 'SV', 1, 4, 1),
(21, 'Jorge', 'a1Bz20ydqelm8m1wql81dc9bdb52d04dc20036dbd8313ed055', 2, 'Pngtreeâ€”users vector.png', 'Jorge', 'Martinez', '54323423-4', '65566532', 'jorge@gmail.com', '2000-11-15', 'Los almendros', 'SalvadoreÃ±o', 0, 4, 1),
(23, 'john', 'a1Bz20ydqelm8m1wql2f23fa3579f3f75175793649115c1b25', 2, 'John_Connor.jpg', 'John', 'Connor', '11111111-1', '11111111', 'Pass123@Pass123', '2004-02-03', 'Washington ', 'US', 1, 5, 1),
(24, 'sarah', 'a1Bz20ydqelm8m1wql2f23fa3579f3f75175793649115c1b25', 3, 'sarah.jpg', 'Sarah', 'Connor', '11111111-1', '25252525', 'Pass123@Pass123', '1980-01-01', 'Washington', 'US', 1, 5, 1),
(25, 'marvin', 'a1Bz20ydqelm8m1wql2f23fa3579f3f75175793649115c1b25', 4, 'marvin.png', 'Marvin', 'Martínez', '65321456-9', '36566665', 'Pass123@Pass123', '2003-01-08', 'San Salvador', 'SV', 1, 3, 3),
(26, 'prueba', 'a1Bz20ydqelm8m1wql2f23fa3579f3f75175793649115c1b25', 1, 'Screenshot 2024-10-29 194539.png', 'prueba11222024', 'prueba11222024', '11111111-1', '11111111', 'Pass123@Pass123', '2024-11-02', 'San Salvador', 'PA', 0, 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`id_departamento`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id_vacaciones`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `fk_id_permiso` (`id_tipo`);

--
-- Indices de la tabla `plaza`
--
ALTER TABLE `plaza`
  ADD PRIMARY KEY (`id_plaza`),
  ADD KEY `fk_id_departamento` (`id_departamento`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `rol_modulos`
--
ALTER TABLE `rol_modulos`
  ADD PRIMARY KEY (`id_rol`,`id_modulo`),
  ADD KEY `fk_rol_modulo_modulo` (`id_modulo`);

--
-- Indices de la tabla `solicitudes_vacaciones`
--
ALTER TABLE `solicitudes_vacaciones`
  ADD PRIMARY KEY (`id_solicitud`),
  ADD KEY `id_empleado` (`id_empleado`);

--
-- Indices de la tabla `tipo_permiso`
--
ALTER TABLE `tipo_permiso`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_departamento` (`id_departamento`),
  ADD KEY `fk_plaza` (`id_plaza`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `id_departamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id_vacaciones` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `plaza`
--
ALTER TABLE `plaza`
  MODIFY `id_plaza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `solicitudes_vacaciones`
--
ALTER TABLE `solicitudes_vacaciones`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_permiso`
--
ALTER TABLE `tipo_permiso`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD CONSTRAINT `fk_id_permiso` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_permiso` (`id_tipo`),
  ADD CONSTRAINT `permiso_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `plaza`
--
ALTER TABLE `plaza`
  ADD CONSTRAINT `fk_id_departamento` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`);

--
-- Filtros para la tabla `rol_modulos`
--
ALTER TABLE `rol_modulos`
  ADD CONSTRAINT `fk_rol_modulo_modulo` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rol_modulo_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `solicitudes_vacaciones`
--
ALTER TABLE `solicitudes_vacaciones`
  ADD CONSTRAINT `solicitudes_vacaciones_ibfk_1` FOREIGN KEY (`id_empleado`) REFERENCES `usuario` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_plaza` FOREIGN KEY (`id_plaza`) REFERENCES `plaza` (`id_plaza`),
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id_departamento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
