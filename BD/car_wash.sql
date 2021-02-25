-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-02-2021 a las 14:47:23
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `car_wash`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcliente`
--

CREATE TABLE `tblcliente` (
  `id_cliente` int(11) NOT NULL,
  `Nom_Cliente` varchar(50) DEFAULT NULL,
  `Ape_Cliente` varchar(50) DEFAULT NULL,
  `Dir_Cliente` varchar(100) DEFAULT NULL,
  `Cel_Cliente` varchar(50) DEFAULT NULL,
  `Corr_Cliente` varchar(50) DEFAULT NULL,
  `Ciudad_residencia` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblcliente`
--

INSERT INTO `tblcliente` (`id_cliente`, `Nom_Cliente`, `Ape_Cliente`, `Dir_Cliente`, `Cel_Cliente`, `Corr_Cliente`, `Ciudad_residencia`) VALUES
(123456789, 'mauricio2', 'castaño2', 'Calle 21 #22-17', '300758745', 'jose@gmail.com', 'Rionegro'),
(555566666, 'Pepe', 'Perez', 'Cra65 N 89-45', '454578963', 'pepe@pepe.com', 'Marinilla'),
(1001229677, 'Sebastián', 'Vásque', 'Cra 32 N 31-23', '3117658672', 'sebitas4774@gmail.com', 'Marinilla'),
(1036424415, 'mauricio', 'castaño', 'mauricio', '31455217', 'maurox952@gmail.com', ''),
(2147483647, 'joselo', 'peres', 'Calle 21 #22-17', '3145558789', 'maurox9522@gmail.com', 'Rionegro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldetalle_entrega`
--

CREATE TABLE `tbldetalle_entrega` (
  `Id_Detalle` int(11) NOT NULL,
  `Id_Nota` int(11) DEFAULT NULL,
  `Cantidad` int(6) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Vlr_Unitario` float(8,2) DEFAULT NULL,
  `Vlr_Total` float(8,2) DEFAULT NULL,
  `Id_Tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblinsumo_repuesto`
--

CREATE TABLE `tblinsumo_repuesto` (
  `Id_Insumo` int(11) NOT NULL,
  `Cantidad` int(4) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Vlr_Unitario` float(10,2) DEFAULT NULL,
  `Vlr_Total` float(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblinsumo_repuesto`
--

INSERT INTO `tblinsumo_repuesto` (`Id_Insumo`, `Cantidad`, `Descripcion`, `Vlr_Unitario`, `Vlr_Total`) VALUES
(11, 4, 'pastas de fereno', 500.00, 2000.00),
(14, 5, 'rines carro', 100000.00, 500000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblparqueadero`
--

CREATE TABLE `tblparqueadero` (
  `num_factura` int(11) NOT NULL,
  `Cliente` varchar(100) DEFAULT NULL,
  `placa` varchar(10) DEFAULT NULL,
  `tipo_vehiculo` varchar(100) DEFAULT NULL,
  `hora_ingreso` datetime DEFAULT NULL,
  `hora_salida` datetime DEFAULT NULL,
  `id_parqueo` int(11) DEFAULT NULL,
  `Correo` varchar(100) DEFAULT NULL,
  `Celular` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblparqueadero`
--

INSERT INTO `tblparqueadero` (`num_factura`, `Cliente`, `placa`, `tipo_vehiculo`, `hora_ingreso`, `hora_salida`, `id_parqueo`, `Correo`, `Celular`) VALUES
(51, 'Juan', 'YMC-555', 'Carro', '2021-02-09 04:56:00', NULL, 2, 'pepe@pepe.com', '444455'),
(52, NULL, 'CKK-111', 'Carro', '2021-02-10 13:04:00', NULL, 1, NULL, NULL),
(54, 'Juan', 'YMC-555', 'Moto', '2021-02-09 14:41:00', NULL, 5, 'pepe@pepe.com', '444455'),
(55, 'Paco', 'NNN-321', 'Moto', '2021-02-11 14:42:00', NULL, 5, 'sebitas4774@gmail.com', '444455');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblpreferencias`
--

CREATE TABLE `tblpreferencias` (
  `Id_Preferencia` int(11) NOT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Id_Cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrecordatorio`
--

CREATE TABLE `tblrecordatorio` (
  `Id_Recordatorio` int(11) NOT NULL,
  `Tipo` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Id_Cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblreservas`
--

CREATE TABLE `tblreservas` (
  `Id_Reserva` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `tipoVehiculo` varchar(20) NOT NULL,
  `placa` varchar(10) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `start` datetime NOT NULL,
  `color` varchar(100) DEFAULT NULL,
  `textColor` varchar(100) DEFAULT NULL,
  `Id_Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblreservas`
--

INSERT INTO `tblreservas` (`Id_Reserva`, `title`, `tipoVehiculo`, `placa`, `descripcion`, `start`, `color`, `textColor`, `Id_Cliente`) VALUES
(11, 'Reparacion', 'Automóvil', 'CNK-257', 'Cambiar las llantas de atrás', '2020-12-15 12:30:00', '#4D4D4D', '#FFFFFF', 1001229677),
(12, 'Reparacion', 'Automóvil', 'CNK-257', 'Cambio de aceite', '2020-12-14 16:00:00', '#4D4D4D', '#FFFFFF', 1001229677),
(18, 'Reparacion', 'Automóvil', 'NNN-321', 'Cambio de aceite', '2021-02-18 14:27:00', '#4D4D4D', '#FFFFFF', 555566666),
(19, 'Lavado', 'Automóvil', 'YMC-555', 'Lavado estándar', '2021-02-18 17:45:00', '#1A4AD9', '#FFFFFF', 555566666),
(20, 'Reparacion', 'Automóvil', 'YMC-555', 'Cambio de llantas', '2021-02-24 17:53:00', '#4D4D4D', '#FFFFFF', 555566666),
(21, 'Reparacion', 'Automóvil', 'NNN-321', 'Cambio de aceite', '2021-02-25 09:00:00', '#4D4D4D', '#FFFFFF', 555566666),
(22, 'Reparacion', 'Automóvil', 'YMC-555', 'Cambio de llantas', '2021-02-26 13:00:00', '#4D4D4D', '#FFFFFF', 555566666);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrol`
--

CREATE TABLE `tblrol` (
  `Id_Rol` int(2) NOT NULL,
  `Nombre_Rol` varchar(50) DEFAULT NULL,
  `Descripcion` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblrol`
--

INSERT INTO `tblrol` (`Id_Rol`, `Nombre_Rol`, `Descripcion`) VALUES
(1, 'Administrador', 'administrador del sistema'),
(2, 'Usuario', 'usuario del sistema');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblservicios_ofertados`
--

CREATE TABLE `tblservicios_ofertados` (
  `Id_Servicio` int(11) NOT NULL,
  `Tipo_Servicio` varchar(50) DEFAULT NULL,
  `Servicio` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `Valor` float(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblservicios_ofertados`
--

INSERT INTO `tblservicios_ofertados` (`Id_Servicio`, `Tipo_Servicio`, `Servicio`, `Descripcion`, `Valor`) VALUES
(2, 'Lavado', 'Lavado estándar', 'Se da un lavado común a el vehículo', NULL),
(3, 'Reparacion', 'Cambio de aceite', 'Se realiza el cambio del aceite antiguo al vehículo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipoparqueo`
--

CREATE TABLE `tbltipoparqueo` (
  `id_parqueo` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `precio` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbltipoparqueo`
--

INSERT INTO `tbltipoparqueo` (`id_parqueo`, `Nombre`, `precio`) VALUES
(1, 'hora carro', 2000.00),
(2, 'mensualidad carro', 60000.00),
(3, 'fraccion carro', 500.00),
(4, 'hora moto', 1000.00),
(5, 'mensualidad moto', 40000.00),
(6, 'fraccion moto', 250.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuario`
--

CREATE TABLE `tblusuario` (
  `Id_Usuario` int(11) NOT NULL,
  `Username` varchar(50) DEFAULT NULL,
  `Password` varchar(100) DEFAULT NULL,
  `Id_Cliente` int(11) DEFAULT NULL,
  `Id_Rol` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblusuario`
--

INSERT INTO `tblusuario` (`Id_Usuario`, `Username`, `Password`, `Id_Cliente`, `Id_Rol`) VALUES
(123456789, 'jose@gmail.com', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 123456789, 2),
(555566666, 'pepe@pepe.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 555566666, 2),
(1001229677, 'sebitas4774@gmail.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', 1001229677, 1),
(2147483647, 'maurox9522@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', 2147483647, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblvehiculo`
--

CREATE TABLE `tblvehiculo` (
  `id_Vehiculo` varchar(20) NOT NULL,
  `Marca` varchar(45) DEFAULT NULL,
  `Modelo` varchar(20) DEFAULT NULL,
  `Color` varchar(45) DEFAULT NULL,
  `Tipo_Vehiculo` varchar(45) DEFAULT NULL,
  `Vencimiento_SOAT` date DEFAULT NULL,
  `Vencimiento_Tecno` date DEFAULT NULL,
  `Id_Cliente` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblvehiculo`
--

INSERT INTO `tblvehiculo` (`id_Vehiculo`, `Marca`, `Modelo`, `Color`, `Tipo_Vehiculo`, `Vencimiento_SOAT`, `Vencimiento_Tecno`, `Id_Cliente`) VALUES
('CNK-257', 'Chevrolette', '2010', 'negro', 'Automóvil', '2021-01-21', '2021-01-27', 1001229677),
('NNN-321', 'Chevrolette', '2020', 'Negro', 'Automóvil', '2021-02-25', '2021-03-03', 555566666),
('YMC-555', 'Chevrolette', '2015', 'negro', 'Automóvil', '2021-02-23', '2021-02-15', 555566666);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblvideo`
--

CREATE TABLE `tblvideo` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tblvideo`
--

INSERT INTO `tblvideo` (`id`, `Nombre`, `url`) VALUES
(1, 'Cuidado Vehiculo', 'https://www.youtube.com/embed/_qbnPnBmURQ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_notas_entregas`
--

CREATE TABLE `tbl_notas_entregas` (
  `Id_Nota` int(11) NOT NULL,
  `Id_Vehiculo` varchar(20) DEFAULT NULL,
  `Id_Cliente` int(11) DEFAULT NULL,
  `Fecha_Nota` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tblcliente`
--
ALTER TABLE `tblcliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tbldetalle_entrega`
--
ALTER TABLE `tbldetalle_entrega`
  ADD PRIMARY KEY (`Id_Detalle`),
  ADD KEY `fk_tblDetalle_Entrega_tbl_Notas_Entregas1_idx` (`Id_Nota`),
  ADD KEY `fk_tblDetalle_Entrega_tblInsumo_Repuesto1_idx` (`Id_Tipo`);

--
-- Indices de la tabla `tblinsumo_repuesto`
--
ALTER TABLE `tblinsumo_repuesto`
  ADD PRIMARY KEY (`Id_Insumo`);

--
-- Indices de la tabla `tblparqueadero`
--
ALTER TABLE `tblparqueadero`
  ADD PRIMARY KEY (`num_factura`),
  ADD KEY `fk_tblparqueadero_tbltipoparqueo1_idx` (`id_parqueo`);

--
-- Indices de la tabla `tblpreferencias`
--
ALTER TABLE `tblpreferencias`
  ADD PRIMARY KEY (`Id_Preferencia`),
  ADD KEY `fk_tblPreferencias_tblCliente1_idx` (`Id_Cliente`);

--
-- Indices de la tabla `tblrecordatorio`
--
ALTER TABLE `tblrecordatorio`
  ADD PRIMARY KEY (`Id_Recordatorio`),
  ADD KEY `fk_tblRecordatorio_tblCliente1_idx` (`Id_Cliente`);

--
-- Indices de la tabla `tblreservas`
--
ALTER TABLE `tblreservas`
  ADD PRIMARY KEY (`Id_Reserva`),
  ADD UNIQUE KEY `start` (`start`),
  ADD KEY `fk_tblReservas_tblCliente1_idx` (`Id_Cliente`);

--
-- Indices de la tabla `tblrol`
--
ALTER TABLE `tblrol`
  ADD PRIMARY KEY (`Id_Rol`);

--
-- Indices de la tabla `tblservicios_ofertados`
--
ALTER TABLE `tblservicios_ofertados`
  ADD PRIMARY KEY (`Id_Servicio`);

--
-- Indices de la tabla `tbltipoparqueo`
--
ALTER TABLE `tbltipoparqueo`
  ADD PRIMARY KEY (`id_parqueo`);

--
-- Indices de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD KEY `fk_tblUsuario_tblRol_idx` (`Id_Rol`),
  ADD KEY `fk_tblUsuario_tblCliente1_idx` (`Id_Cliente`);

--
-- Indices de la tabla `tblvehiculo`
--
ALTER TABLE `tblvehiculo`
  ADD PRIMARY KEY (`id_Vehiculo`),
  ADD KEY `fk_tblVehiculo_tblCliente1_idx` (`Id_Cliente`);

--
-- Indices de la tabla `tblvideo`
--
ALTER TABLE `tblvideo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_notas_entregas`
--
ALTER TABLE `tbl_notas_entregas`
  ADD PRIMARY KEY (`Id_Nota`),
  ADD KEY `fk_tbl_Notas_Entregas_tblCliente1_idx` (`Id_Cliente`),
  ADD KEY `fk_tbl_Notas_Entregas_tblVehiculo1_idx` (`Id_Vehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbldetalle_entrega`
--
ALTER TABLE `tbldetalle_entrega`
  MODIFY `Id_Detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblinsumo_repuesto`
--
ALTER TABLE `tblinsumo_repuesto`
  MODIFY `Id_Insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tblparqueadero`
--
ALTER TABLE `tblparqueadero`
  MODIFY `num_factura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `tblpreferencias`
--
ALTER TABLE `tblpreferencias`
  MODIFY `Id_Preferencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblrecordatorio`
--
ALTER TABLE `tblrecordatorio`
  MODIFY `Id_Recordatorio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblreservas`
--
ALTER TABLE `tblreservas`
  MODIFY `Id_Reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tblrol`
--
ALTER TABLE `tblrol`
  MODIFY `Id_Rol` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tblservicios_ofertados`
--
ALTER TABLE `tblservicios_ofertados`
  MODIFY `Id_Servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbltipoparqueo`
--
ALTER TABLE `tbltipoparqueo`
  MODIFY `id_parqueo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT de la tabla `tblvideo`
--
ALTER TABLE `tblvideo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_notas_entregas`
--
ALTER TABLE `tbl_notas_entregas`
  MODIFY `Id_Nota` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbldetalle_entrega`
--
ALTER TABLE `tbldetalle_entrega`
  ADD CONSTRAINT `fk_tblDetalle_Entrega_tblInsumo_Repuesto1` FOREIGN KEY (`Id_Tipo`) REFERENCES `tblinsumo_repuesto` (`Id_Insumo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblDetalle_Entrega_tblServicios_Ofertados1` FOREIGN KEY (`Id_Tipo`) REFERENCES `tblservicios_ofertados` (`Id_Servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblDetalle_Entrega_tbl_Notas_Entregas1` FOREIGN KEY (`Id_Nota`) REFERENCES `tbl_notas_entregas` (`Id_Nota`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblparqueadero`
--
ALTER TABLE `tblparqueadero`
  ADD CONSTRAINT `fk_tblparqueadero_tbltipoparqueo1` FOREIGN KEY (`id_parqueo`) REFERENCES `tbltipoparqueo` (`id_parqueo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblpreferencias`
--
ALTER TABLE `tblpreferencias`
  ADD CONSTRAINT `fk_tblPreferencias_tblCliente1` FOREIGN KEY (`Id_Cliente`) REFERENCES `tblcliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblrecordatorio`
--
ALTER TABLE `tblrecordatorio`
  ADD CONSTRAINT `fk_tblRecordatorio_tblCliente1` FOREIGN KEY (`Id_Cliente`) REFERENCES `tblcliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblreservas`
--
ALTER TABLE `tblreservas`
  ADD CONSTRAINT `fk_tblReservas_tblCliente1` FOREIGN KEY (`Id_Cliente`) REFERENCES `tblcliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblusuario`
--
ALTER TABLE `tblusuario`
  ADD CONSTRAINT `fk_tblUsuario_tblCliente1` FOREIGN KEY (`Id_Cliente`) REFERENCES `tblcliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblUsuario_tblRol` FOREIGN KEY (`Id_Rol`) REFERENCES `tblrol` (`Id_Rol`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblvehiculo`
--
ALTER TABLE `tblvehiculo`
  ADD CONSTRAINT `fk_tblVehiculo_tblCliente1` FOREIGN KEY (`Id_Cliente`) REFERENCES `tblcliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tbl_notas_entregas`
--
ALTER TABLE `tbl_notas_entregas`
  ADD CONSTRAINT `fk_tbl_Notas_Entregas_tblCliente1` FOREIGN KEY (`Id_Cliente`) REFERENCES `tblcliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_Notas_Entregas_tblVehiculo1` FOREIGN KEY (`Id_Vehiculo`) REFERENCES `tblvehiculo` (`id_Vehiculo`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
