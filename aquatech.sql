-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-11-2022 a las 16:22:17
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aquatech`
--
CREATE DATABASE IF NOT EXISTS `aquatech` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `aquatech`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `botellones`
--

CREATE TABLE `botellones` (
  `id_botellones` int(10) NOT NULL,
  `llenos` int(4) NOT NULL,
  `totales` int(4) NOT NULL,
  `fecha_bot` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `botellones`
--

INSERT INTO `botellones` (`id_botellones`, `llenos`, `totales`, `fecha_bot`) VALUES
(1, 25, 25, '2022-11-21 11:19:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(10) NOT NULL,
  `ci_cliente` varchar(12) NOT NULL,
  `nombre_cliente` varchar(15) NOT NULL,
  `apellido_cliente` varchar(20) NOT NULL,
  `tlf_cliente` varchar(14) NOT NULL,
  `direc_cliente` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_botellones`
--

CREATE TABLE `compra_botellones` (
  `id_compra` int(10) NOT NULL,
  `id_proveedor_compra` int(10) NOT NULL,
  `cantidad_bot` int(4) NOT NULL,
  `monto_total` decimal(12,2) NOT NULL,
  `fecha_recarga` datetime NOT NULL DEFAULT current_timestamp(),
  `id_almacen` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Disparadores `compra_botellones`
--
DELIMITER $$
CREATE TRIGGER `TR_compra_botellones` AFTER INSERT ON `compra_botellones` FOR EACH ROW UPDATE botellones
    set totales = totales + NEW.cantidad_bot WHERE id_botellones = 1
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deudas`
--

CREATE TABLE `deudas` (
  `id_deuda` int(10) NOT NULL,
  `id_factura` int(10) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `pago_pendiente` int(3) NOT NULL,
  `bot_pendientes` int(3) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio_trasvaso`
--

CREATE TABLE `precio_trasvaso` (
  `id_precio_trasv` int(10) NOT NULL,
  `precio_bs` decimal(6,3) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `precio_trasvaso`
--

INSERT INTO `precio_trasvaso` (`id_precio_trasv`, `precio_bs`, `fecha`) VALUES
(1, '3.000', '2022-11-21 11:17:41');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio_venta`
--

CREATE TABLE `precio_venta` (
  `id_precio_venta` int(10) NOT NULL,
  `precio_dolar` int(2) NOT NULL,
  `tasa` decimal(6,2) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `precio_venta`
--

INSERT INTO `precio_venta` (`id_precio_venta`, `precio_dolar`, `tasa`, `fecha`) VALUES
(1, 6, '11.85', '2022-11-21 11:18:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(10) NOT NULL,
  `RIF_proveedor` varchar(20) NOT NULL,
  `nombre_proveedor` varchar(20) NOT NULL,
  `tlf_proveedor` varchar(20) NOT NULL,
  `direc_proveedor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recarga_botellones`
--

CREATE TABLE `recarga_botellones` (
  `id_recarga` int(10) NOT NULL,
  `id_proveedor_re` int(10) NOT NULL,
  `cantidad_bot` int(4) NOT NULL,
  `monto_total` decimal(12,2) NOT NULL,
  `fecha_recarga` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_almacen` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trasvaso_botellones`
--

CREATE TABLE `trasvaso_botellones` (
  `id_trasvaso` int(10) NOT NULL,
  `id_cliente_trasvaso` int(10) NOT NULL,
  `id_precio_trasv` int(10) NOT NULL,
  `cantidad_pagada` int(3) NOT NULL,
  `cantidad_entregada` int(3) NOT NULL,
  `tipo_pago` varchar(15) NOT NULL,
  `delivery` varchar(15) NOT NULL,
  `monto_total` decimal(6,2) NOT NULL,
  `fecha_trasvaso` datetime NOT NULL DEFAULT current_timestamp(),
  `nota` text NOT NULL,
  `id_almacen` int(10) NOT NULL,
  `validar_pago` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Disparadores `trasvaso_botellones`
--
DELIMITER $$
CREATE TRIGGER `DEUDAS` AFTER INSERT ON `trasvaso_botellones` FOR EACH ROW BEGIN
DECLARE AUX_contar INT(4);
DECLARE AUX_pago_pendiente INT(3);
DECLARE AUX_bot_pendiente INT(3);
DECLARE mensaje varchar(20);
DECLARE AUX_suma int(3);
DECLARE AUX_pagop INT(3);
DECLARE AUX_botp INT(3);
DECLARE AUX_NEW INT (3);

#Validar si las cantidades son iguales

IF NEW.cantidad_entregada <> NEW.cantidad_pagada THEN

	#Buscar si el cliente ingresado tiene una deuda ya existente
	
    SELECT COUNT(id_deuda) INTO AUX_contar FROM deudas WHERE id_cliente = NEW.id_cliente_trasvaso;
    
    
	#Si el cliente no tiene ninguna deuda existente, se valida que cantidad es mayor
	IF AUX_contar = 0 THEN
    		IF new.cantidad_entregada > NEW.cantidad_pagada THEN
	    	SET AUX_suma = NEW.cantidad_entregada - NEW.cantidad_pagada;
    		INSERT INTO deudas(id_factura, id_cliente, pago_pendiente, bot_pendientes, fecha) VALUES
    
    (NEW.id_trasvaso, NEW.id_cliente_trasvaso, AUX_suma, 0 ,CURRENT_TIMESTAMP);
    
    ELSE
    
     
    
                                                         
    SET AUX_suma =  NEW.cantidad_pagada - NEW.cantidad_entregada  ;
    
    INSERT INTO deudas(id_factura, id_cliente, pago_pendiente, bot_pendientes, fecha) VALUES
    
    (NEW.id_trasvaso, NEW.id_cliente_trasvaso,0 ,AUX_suma, CURRENT_TIMESTAMP);
   
    END IF;
    
#--------------------------------------------------------------------------    
	
	#Si no, significa que ya tiene deuda existente, hay que seleccionar las cantidades pgadas ya existenets
	
		
    ELSE
    
    SELECT pago_pendiente, bot_pendientes INTO AUX_pago_pendiente, AUX_bot_pendiente FROM deudas WHERE id_deuda = (SELECT MAX(id_deuda) FROM deudas  WHERE id_cliente = NEW.id_cliente_trasvaso);



	
	#Si la ultima deuda es 0 entonces no debe una deuda	
	
	IF AUX_pago_pendiente = 0 AND AUX_bot_pendiente = 0 THEN


	#Se evalua si la cantidad que se pago es menor que la cantidad que se entrego 
	
	IF NEW.cantidad_pagada > NEW.cantidad_entregada then 

	SET AUX_suma = NEW.cantidad_pagada - NEW.cantidad_entregada;

	#Se insertan los datos
	
	INSERT INTO deudas(id_factura, id_cliente, pago_pendiente, bot_pendientes, fecha) VALUES
    
    (NEW.id_trasvaso, NEW.id_cliente_trasvaso, AUX_suma, 0, CURRENT_TIMESTAMP);
    

			

	ELSE
    
    #Si no quiere decir que se entrego mas de lo que pago

	SET AUX_suma = NEW.cantidad_entregada - NEW.cantidad_pagada;

	INSERT INTO deudas(id_factura, id_cliente, pago_pendiente, bot_pendientes, fecha) VALUES
    
    (NEW.id_trasvaso, NEW.id_cliente_trasvaso, 0, AUX_suma, CURRENT_TIMESTAMP);
		
	#termina este if
	END IF;

#==============================================================		

		



    ELSE 
    
    #Si no buscamos en las columnas pagos y bot pendientes de la tabla deudas y guardamos los valores donde el id sea el ultimo en variables auxiliares

	SELECT pago_pendiente, bot_pendientes INTO AUX_pago_pendiente, AUX_bot_pendiente from deudas where id_cliente =
 (SELECT MAX(id_deuda) FROM deudas  WHERE id_cliente = NEW.id_cliente_trasvaso);
    
    
    #Validamos el pago de la deuda es mayor que los botellones pendientes
    IF AUX_pago_pendiente > AUX_bot_pendiente THEN
    
    
    SET AUX_NEW = NEW.cantidad_pagada - NEW.cantidad_entregada;
    
    
    SET AUX_pagop = AUX_pago_pendiente - AUX_NEW;
    
    
 	#Validamos que si la cantidad pago es menor que 0, significa que ahora nosotros debemos botellones
    
    IF AUX_pagop < 0 THEN
    
    #operacion
    SET AUX_pagop = (AUX_pagop)  -  AUX_pagop * 2;
 
    #E insertamos en la otro columna (bot pendientes)
    INSERT INTO deudas(id_factura, id_cliente, 	pago_pendiente, bot_pendientes, fecha) VALUES
    
    (NEW.id_trasvaso, NEW.id_cliente_trasvaso, 0, AUX_pagop, CURRENT_TIMESTAMP);
    
    
    ELSE
    
     
    #Si no cumple la condicion se inserta en la columa original(pago_pendiente)
    INSERT INTO deudas(id_factura, id_cliente, 	pago_pendiente, bot_pendientes, fecha) VALUES
    
    (NEW.id_trasvaso, NEW.id_cliente_trasvaso, AUX_pagop, 0, CURRENT_TIMESTAMP);
    
    END IF;
    
   	
   
    
    
    
    #Si pago pendiente no es mayor que bot pendientes se cumple esta condicion
    ELSE
    
    SET AUX_NEW = NEW.cantidad_entregada - NEW.cantidad_pagada;
    
	SET AUX_botp = AUX_bot_pendiente - AUX_NEW; 
    
    
    #Se valida si la resta da menor que 0, si es asi quiere decir que ahora nos deben cancelar botellones
    
    
	IF AUX_botp < 0 THEN
    
    #Se hace la operacion
    SET AUX_botp = (AUX_botp) -  AUX_botp * 2;
    
    
    #Y se inserta en la columna opuesta(Pago pendiente)
    INSERT INTO deudas(id_factura, id_cliente, 	pago_pendiente, bot_pendientes, fecha) VALUES
    
    (NEW.id_trasvaso, NEW.id_cliente_trasvaso, AUX_botp, 0, CURRENT_TIMESTAMP);
    
    
    ELSE
    #Si no es menor que 0, entonces se inserta en la columna original(bot pendientes)
    INSERT INTO deudas(id_factura, id_cliente, 	pago_pendiente, bot_pendientes, fecha) VALUES
    
    (NEW.id_trasvaso, NEW.id_cliente_trasvaso,0 , AUX_botp, CURRENT_TIMESTAMP);
    END IF;
    END IF;
    END IF;
    END IF;
    END IF;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `Null` BEFORE INSERT ON `trasvaso_botellones` FOR EACH ROW BEGIN



IF new.id_almacen IS NULL THEN

SET new.id_almacen = 1;

END IF;





END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` smallint(5) NOT NULL,
  `cedula` char(8) NOT NULL,
  `clave` char(20) NOT NULL,
  `nombre` char(15) NOT NULL,
  `apellido` char(20) NOT NULL,
  `direc` char(100) NOT NULL,
  `tlf` char(14) NOT NULL,
  `pregunta` char(50) DEFAULT NULL,
  `respuesta` char(20) DEFAULT NULL,
  `rol` tinyint(1) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `cedula`, `clave`, `nombre`, `apellido`, `direc`, `tlf`, `pregunta`, `respuesta`, `rol`, `activo`) VALUES
(6, '99999999', 'ADMIN', 'ADMIN', 'ADMIN', 'XXXXXXXXXX', '00000000000000', '', '', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_botellones`
--

CREATE TABLE `venta_botellones` (
  `id_venta` int(10) NOT NULL,
  `id_cliente_venta` int(10) NOT NULL,
  `id_precio` int(10) NOT NULL,
  `cantidad_bot` int(4) NOT NULL,
  `tipo_pago` varchar(15) NOT NULL,
  `monto_total` decimal(6,2) DEFAULT NULL,
  `fecha_venta` datetime NOT NULL DEFAULT current_timestamp(),
  `id_almacen` int(10) DEFAULT NULL,
  `validar_pago` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Disparadores `venta_botellones`
--
DELIMITER $$
CREATE TRIGGER `Valores null` BEFORE INSERT ON `venta_botellones` FOR EACH ROW BEGIN




IF new.id_precio IS NULL THEN

SET new.id_precio = 1;
END IF;


IF new.id_almacen IS NULL THEN

SET new.id_almacen = 1;

END IF;





END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `botellones`
--
ALTER TABLE `botellones`
  ADD PRIMARY KEY (`id_botellones`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `ci_cliente` (`ci_cliente`);

--
-- Indices de la tabla `compra_botellones`
--
ALTER TABLE `compra_botellones`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `fk_id_proveedor_comp` (`id_proveedor_compra`),
  ADD KEY `id_almacen` (`id_almacen`);

--
-- Indices de la tabla `deudas`
--
ALTER TABLE `deudas`
  ADD PRIMARY KEY (`id_deuda`),
  ADD KEY `fk_id_cliente` (`id_cliente`),
  ADD KEY `fk_id_factura` (`id_factura`);

--
-- Indices de la tabla `precio_trasvaso`
--
ALTER TABLE `precio_trasvaso`
  ADD PRIMARY KEY (`id_precio_trasv`);

--
-- Indices de la tabla `precio_venta`
--
ALTER TABLE `precio_venta`
  ADD PRIMARY KEY (`id_precio_venta`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`),
  ADD UNIQUE KEY `RIF_proveedor` (`RIF_proveedor`,`nombre_proveedor`);

--
-- Indices de la tabla `recarga_botellones`
--
ALTER TABLE `recarga_botellones`
  ADD PRIMARY KEY (`id_recarga`),
  ADD KEY `fk_id_proveedor_re` (`id_proveedor_re`),
  ADD KEY `id_almacen` (`id_almacen`);

--
-- Indices de la tabla `trasvaso_botellones`
--
ALTER TABLE `trasvaso_botellones`
  ADD PRIMARY KEY (`id_trasvaso`),
  ADD KEY `fk_id_cliente_trasvaso` (`id_cliente_trasvaso`),
  ADD KEY `fk_id_precio_trasv` (`id_precio_trasv`),
  ADD KEY `trasvaso_botellones_ibfk_1` (`id_almacen`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `username` (`cedula`);

--
-- Indices de la tabla `venta_botellones`
--
ALTER TABLE `venta_botellones`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `fk_id_cliente_venta` (`id_cliente_venta`),
  ADD KEY `fk_id_precio` (`id_precio`),
  ADD KEY `venta_botellones_ibfk_1` (`id_almacen`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `botellones`
--
ALTER TABLE `botellones`
  MODIFY `id_botellones` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `compra_botellones`
--
ALTER TABLE `compra_botellones`
  MODIFY `id_compra` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `deudas`
--
ALTER TABLE `deudas`
  MODIFY `id_deuda` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `precio_trasvaso`
--
ALTER TABLE `precio_trasvaso`
  MODIFY `id_precio_trasv` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `precio_venta`
--
ALTER TABLE `precio_venta`
  MODIFY `id_precio_venta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `recarga_botellones`
--
ALTER TABLE `recarga_botellones`
  MODIFY `id_recarga` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trasvaso_botellones`
--
ALTER TABLE `trasvaso_botellones`
  MODIFY `id_trasvaso` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` smallint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `venta_botellones`
--
ALTER TABLE `venta_botellones`
  MODIFY `id_venta` int(10) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra_botellones`
--
ALTER TABLE `compra_botellones`
  ADD CONSTRAINT `compra_botellones_ibfk_1` FOREIGN KEY (`id_almacen`) REFERENCES `botellones` (`id_botellones`),
  ADD CONSTRAINT `fk_id_proveedor_comp` FOREIGN KEY (`id_proveedor_compra`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `deudas`
--
ALTER TABLE `deudas`
  ADD CONSTRAINT `fk_id_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_factura` FOREIGN KEY (`id_factura`) REFERENCES `trasvaso_botellones` (`id_trasvaso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `recarga_botellones`
--
ALTER TABLE `recarga_botellones`
  ADD CONSTRAINT `fk_id_proveedor_re` FOREIGN KEY (`id_proveedor_re`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `recarga_botellones_ibfk_1` FOREIGN KEY (`id_almacen`) REFERENCES `botellones` (`id_botellones`),
  ADD CONSTRAINT `recarga_botellones_ibfk_2` FOREIGN KEY (`id_almacen`) REFERENCES `botellones` (`id_botellones`);

--
-- Filtros para la tabla `trasvaso_botellones`
--
ALTER TABLE `trasvaso_botellones`
  ADD CONSTRAINT `fk_id_cliente_trasvaso` FOREIGN KEY (`id_cliente_trasvaso`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_precio_trasv` FOREIGN KEY (`id_precio_trasv`) REFERENCES `precio_trasvaso` (`id_precio_trasv`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trasvaso_botellones_ibfk_1` FOREIGN KEY (`id_almacen`) REFERENCES `botellones` (`id_botellones`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta_botellones`
--
ALTER TABLE `venta_botellones`
  ADD CONSTRAINT `fk_id_cliente_venta` FOREIGN KEY (`id_cliente_venta`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_precio` FOREIGN KEY (`id_precio`) REFERENCES `precio_venta` (`id_precio_venta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_botellones_ibfk_1` FOREIGN KEY (`id_almacen`) REFERENCES `botellones` (`id_botellones`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
