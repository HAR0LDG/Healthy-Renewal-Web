-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2023 a las 06:16:58
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
-- Base de datos: `hr`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `get_ficha` (IN `idusu` VARCHAR(45))   BEGIN
    SELECT ficha_antropometrica.*
    FROM usuario
    JOIN ficha_antropometrica ON usuario.ficha_antropometrica = ficha_antropometrica.idficha_antropometrica
    WHERE usuario.correo = idusu;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_admon` (`emailnew` VARCHAR(45), `nameusernew` VARCHAR(45), `lastnameusernew` VARCHAR(45), `datenacnew` DATE, `passnew` VARCHAR(45), `countrynew` VARCHAR(45), `suscripnew` ENUM('suscrito','basico'), `sexnew` ENUM('masculino','femenino'), `photonew` VARCHAR(200), `experiencenew` FLOAT, `certificanew` VARCHAR(100), `fantnew` INT(11), `plannew` INT(11), `progactfisnew` INT(11), `perfidnew` BIGINT(11), `aceptonew` TINYINT(1))   BEGIN

IF NOT EXISTS(SELECT u.correo FROM usuario as u WHERE u.correo=emailnew) THEN
        INSERT INTO usuario(correo, nombre_usuario, apellido_usuario, fechanac_usuario, contraseña_usuario, pais_usuario, subscripcion_usuario, sexo, foto_usuario, experiencia, certificacion, ficha_antropometrica, plan_nutricional, prog_actfisica, perfil_idperfil, acepto)
        VALUES (emailnew, nameusernew, lastnameusernew, datenacnew, passnew, countrynew, 'suscrito','femenino', NULL, NULL, NULL, NULL, NULL, NULL, perfidnew, 1);
ELSE
UPDATE usuario SET correo=emailnew, nombre_usuario=nameusernew, apellido_usuario=lastnameusernew, fechanac_usuario=datenacnew, contraseña_usuario=passnew, pais_usuario= countrynew, sexo=sexnew, perfil_idperfil=perfidnew, acepto=aceptonew WHERE correo=emailnew;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_usu` (IN `p_corrusu` VARCHAR(45), IN `p_nomusu` VARCHAR(45), IN `p_apeusu` VARCHAR(45), IN `p_fecusu` DATE, IN `p_consusu` VARCHAR(45), IN `p_paisusu` VARCHAR(45), IN `p_sexusu` ENUM('masculino','femenino'), IN `p_termusu` TINYINT)   BEGIN
    INSERT INTO usuario (correo, nombre_usuario, apellido_usuario, fechanac_usuario, contraseña_usuario, pais_usuario, subscripcion_usuario, sexo,
                        foto_usuario, experiencia, certificacion, ficha_antropometrica, plan_nutricional, prog_actfisica, perfil_idperfil, acepto)
    VALUES (p_corrusu, p_nomusu, p_apeusu, p_fecusu, p_consusu, p_paisusu, 'free', p_sexusu, NULL, NULL, NULL, NULL, NULL, NULL, 3, p_termusu);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `nueva_ficha` (IN `imcnew` FLOAT, IN `frca` INT(11), IN `frcp` INT(11), IN `pesonew` FLOAT, IN `alturanew` INT(11), IN `envergaduranew` FLOAT, IN `pesoideal` FLOAT, IN `fuepier` INT(11), IN `fuebra` INT(11), IN `fueab` INT(11), IN `fuelumb` INT(11), IN `burpe` INT(11), IN `cooper` INT(11), IN `calide` INT(11), IN `actfisica` FLOAT, OUT `newidficha` INT)   BEGIN
    INSERT INTO ficha_antropometrica(imc, frc_activa, frc_pasiva, peso, altura, envergadura, peso_ideal, fuerza_piernas, fuerza_brazos, fuerza_abdomen, fuerza_lumbar, burpe_test, cooper_test, calorias_ideales, actfisica) VALUES (imcnew, frca, frcp, pesonew, alturanew, envergaduranew , pesoideal, fuepier, fuebra, fueab, fuelumb, burpe, cooper, calide, actfisica);
SET newidficha = LAST_INSERT_ID();
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `usuario_registrado` (IN `correo_usuario` VARCHAR(45), OUT `usuario_existente` INT)   BEGIN
    SELECT COUNT(*) INTO usuario_existente
    FROM usuario
    WHERE correo = correo_usuario;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `valida_usu` (IN `_correo` VARCHAR(45), IN `_contraseña` VARCHAR(45))   BEGIN
    SELECT u.correo, u.nombre_usuario, u.apellido_usuario, u.perfil_idperfil
    FROM usuario u INNER JOIN perfil p ON
u.perfil_idperfil = p.idperfil
    WHERE u.correo = _correo AND u.contraseña_usuario = _contraseña;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento`
--

CREATE TABLE `alimento` (
  `idalimento` int(11) NOT NULL,
  `nombre_alimento` varchar(45) NOT NULL,
  `calorias_alimento` int(11) NOT NULL,
  `unimed_alimento` int(11) NOT NULL,
  `pais_alimento` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos_plan`
--

CREATE TABLE `alimentos_plan` (
  `idplan_nutricional` int(11) NOT NULL,
  `idalimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimento_consumido`
--

CREATE TABLE `alimento_consumido` (
  `idalimento_consumido` int(11) NOT NULL,
  `nombre_alimentoc` varchar(45) NOT NULL,
  `calorias_alimentoc` int(11) NOT NULL,
  `cantidad_alimentoc` varchar(45) NOT NULL,
  `pais_alimentoc` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `idconf` int(11) NOT NULL,
  `nit` varchar(13) DEFAULT NULL,
  `nomemp` varchar(200) DEFAULT NULL,
  `dircon` varchar(150) DEFAULT NULL,
  `mosdir` tinyint(1) DEFAULT NULL,
  `celcon` varchar(20) DEFAULT NULL,
  `moscel` tinyint(1) DEFAULT NULL,
  `emacon` varchar(100) DEFAULT NULL,
  `mosema` tinyint(1) DEFAULT NULL,
  `logocon` varchar(100) DEFAULT NULL,
  `consen` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido_pag`
--

CREATE TABLE `contenido_pag` (
  `idcontenido_pag` int(11) NOT NULL,
  `pagina_pagid` int(11) NOT NULL,
  `nomcont` varchar(100) NOT NULL,
  `tipocont` varchar(45) DEFAULT NULL,
  `rutacont` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cont_resumen`
--

CREATE TABLE `cont_resumen` (
  `resumen_diario_idresumen_diario` int(11) NOT NULL,
  `ejercicio_diario_idejercicio_diario` int(11) NOT NULL,
  `alimento_consumido_idalimento_consumido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio_diario`
--

CREATE TABLE `ejercicio_diario` (
  `idejercicio_diario` int(11) NOT NULL,
  `nombre_ejercd` varchar(45) NOT NULL,
  `tiempo_ejercd` time NOT NULL,
  `cant_rep_ejercd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio_prog`
--

CREATE TABLE `ejercicio_prog` (
  `idejercicio_prog` int(11) NOT NULL,
  `nombre_ejercicio` varchar(45) NOT NULL,
  `descripcion_ejercicio` varchar(45) NOT NULL,
  `met_ejercicio` float NOT NULL,
  `serie_ejercicio` int(11) NOT NULL,
  `num_repeticion` int(11) NOT NULL,
  `tiempo_serie` time NOT NULL,
  `tiempo_total` time NOT NULL,
  `prog_actfisica` int(11) NOT NULL,
  `prog_actfisica_trainer` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ficha_antropometrica`
--

CREATE TABLE `ficha_antropometrica` (
  `idficha_antropometrica` int(11) NOT NULL,
  `imc` float NOT NULL,
  `frc_activa` int(11) NOT NULL,
  `frc_pasiva` int(11) NOT NULL,
  `peso` float NOT NULL,
  `altura` int(11) NOT NULL,
  `envergadura` float NOT NULL,
  `peso_ideal` float NOT NULL,
  `fuerza_piernas` int(11) NOT NULL,
  `fuerza_brazos` int(11) NOT NULL,
  `fuerza_abdomen` int(11) NOT NULL,
  `fuerza_lumbar` int(11) NOT NULL,
  `burpe_test` int(11) NOT NULL,
  `cooper_test` int(11) NOT NULL,
  `calorias_ideales` int(11) NOT NULL,
  `actfisica` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `ficha_antropometrica`
--

INSERT INTO `ficha_antropometrica` (`idficha_antropometrica`, `imc`, `frc_activa`, `frc_pasiva`, `peso`, `altura`, `envergadura`, `peso_ideal`, `fuerza_piernas`, `fuerza_brazos`, `fuerza_abdomen`, `fuerza_lumbar`, `burpe_test`, `cooper_test`, `calorias_ideales`, `actfisica`) VALUES
(8, 7.4, 80, 70, 75, 175, 200, 73.5, 10, 20, 10, 20, 40, 20, 2398, 1.9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `pagid` int(11) NOT NULL,
  `pagnom` varchar(45) NOT NULL,
  `pagarc` varchar(45) DEFAULT NULL,
  `pagmos` int(11) DEFAULT NULL,
  `pagord` int(11) DEFAULT NULL,
  `pagmen` varchar(45) DEFAULT NULL,
  `pagmod` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`pagid`, `pagnom`, `pagarc`, `pagmos`, `pagord`, `pagmen`, `pagmod`) VALUES
(101, 'Ficha Antropometrica', 'vista/vfichantropometrica.php', 1, 20, 'Home', NULL),
(104, 'Actualizar Ficha', 'vista/vactualizarficha.php', 1, 19, 'Home', NULL),
(105, 'Actualizar Datos', 'vista/vactualizardatos.php', 1, 18, 'Home', NULL),
(150, 'Salir', 'vista/vsalir.php', 1, 50, 'Home', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `idperfil` bigint(11) NOT NULL,
  `nomperf` varchar(50) NOT NULL,
  `perfbus` tinyint(1) DEFAULT NULL,
  `perfdes` tinyint(1) DEFAULT NULL,
  `perdedi` tinyint(1) DEFAULT NULL,
  `perfeli` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`idperfil`, `nomperf`, `perfbus`, `perfdes`, `perdedi`, `perfeli`) VALUES
(1, 'Admin', 0, 0, 0, 0),
(2, 'Trainer', 0, 0, 0, 0),
(3, 'User', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan_nutricional`
--

CREATE TABLE `plan_nutricional` (
  `idplan_nutricional` int(11) NOT NULL,
  `nombre_nutricional` varchar(45) NOT NULL,
  `pais_nutricional` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prog_actfisica`
--

CREATE TABLE `prog_actfisica` (
  `idprog_actfisica` int(11) NOT NULL,
  `nombre_actividad` varchar(45) NOT NULL,
  `clasificacion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumen_diario`
--

CREATE TABLE `resumen_diario` (
  `idresumen_diario` int(11) NOT NULL,
  `usuario_correo` varchar(45) NOT NULL,
  `fecha_resumen` datetime(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `correo` varchar(45) NOT NULL,
  `nombre_usuario` varchar(45) NOT NULL,
  `apellido_usuario` varchar(45) NOT NULL,
  `fechanac_usuario` date NOT NULL,
  `contraseña_usuario` varchar(45) NOT NULL,
  `pais_usuario` varchar(45) DEFAULT NULL,
  `subscripcion_usuario` enum('suscrito','free') NOT NULL,
  `sexo` enum('masculino','femenino') NOT NULL,
  `foto_usuario` varchar(200) DEFAULT NULL,
  `experiencia` float DEFAULT NULL,
  `certificacion` varchar(100) DEFAULT NULL,
  `ficha_antropometrica` int(11) DEFAULT NULL,
  `plan_nutricional` int(11) DEFAULT NULL,
  `prog_actfisica` int(11) DEFAULT NULL,
  `perfil_idperfil` bigint(11) NOT NULL,
  `acepto` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`correo`, `nombre_usuario`, `apellido_usuario`, `fechanac_usuario`, `contraseña_usuario`, `pais_usuario`, `subscripcion_usuario`, `sexo`, `foto_usuario`, `experiencia`, `certificacion`, `ficha_antropometrica`, `plan_nutricional`, `prog_actfisica`, `perfil_idperfil`, `acepto`) VALUES
('he.gonzalez100@gmail.com', 'Harold Esteban ', 'Gonzalez Morales', '1994-07-19', '10470c3b4b1fed12c3baac014be15fac67c6e815', 'Colombia', 'free', 'masculino', '../hr/img/Fotoperfil/he.gonzalez100@gmail.com_afro-guitar-colorful-music-sunglasses-digital-art-hd-wallpaper-uhdpaper.com-222@1@n.jpg', NULL, NULL, 8, NULL, NULL, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimento`
--
ALTER TABLE `alimento`
  ADD PRIMARY KEY (`idalimento`);

--
-- Indices de la tabla `alimentos_plan`
--
ALTER TABLE `alimentos_plan`
  ADD PRIMARY KEY (`idplan_nutricional`,`idalimento`),
  ADD KEY `fk_plan_nutricional_has_alimento_alimento1_idx` (`idalimento`),
  ADD KEY `fk_plan_nutricional_has_alimento_plan_nutricional_idx` (`idplan_nutricional`);

--
-- Indices de la tabla `alimento_consumido`
--
ALTER TABLE `alimento_consumido`
  ADD PRIMARY KEY (`idalimento_consumido`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`idconf`);

--
-- Indices de la tabla `contenido_pag`
--
ALTER TABLE `contenido_pag`
  ADD PRIMARY KEY (`idcontenido_pag`,`pagina_pagid`),
  ADD KEY `fk_contenido_pag_pagina1_idx` (`pagina_pagid`);

--
-- Indices de la tabla `cont_resumen`
--
ALTER TABLE `cont_resumen`
  ADD PRIMARY KEY (`resumen_diario_idresumen_diario`,`ejercicio_diario_idejercicio_diario`,`alimento_consumido_idalimento_consumido`),
  ADD KEY `fk_contenido_alimento_consumido1_idx` (`alimento_consumido_idalimento_consumido`),
  ADD KEY `fk_contenido_resumen_diario1_idx` (`resumen_diario_idresumen_diario`),
  ADD KEY `fk_contenido_ejercicio_diario1` (`ejercicio_diario_idejercicio_diario`);

--
-- Indices de la tabla `ejercicio_diario`
--
ALTER TABLE `ejercicio_diario`
  ADD PRIMARY KEY (`idejercicio_diario`);

--
-- Indices de la tabla `ejercicio_prog`
--
ALTER TABLE `ejercicio_prog`
  ADD PRIMARY KEY (`idejercicio_prog`,`prog_actfisica`,`prog_actfisica_trainer`),
  ADD KEY `fk_ejercicio_prog_prog_actfisica1_idx` (`prog_actfisica`,`prog_actfisica_trainer`);

--
-- Indices de la tabla `ficha_antropometrica`
--
ALTER TABLE `ficha_antropometrica`
  ADD PRIMARY KEY (`idficha_antropometrica`) USING BTREE;

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`pagid`),
  ADD UNIQUE KEY `pagnom_UNIQUE` (`pagnom`),
  ADD UNIQUE KEY `paginacol_UNIQUE` (`pagarc`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`idperfil`),
  ADD UNIQUE KEY `nombre_UNIQUE` (`nomperf`);

--
-- Indices de la tabla `plan_nutricional`
--
ALTER TABLE `plan_nutricional`
  ADD PRIMARY KEY (`idplan_nutricional`);

--
-- Indices de la tabla `prog_actfisica`
--
ALTER TABLE `prog_actfisica`
  ADD PRIMARY KEY (`idprog_actfisica`);

--
-- Indices de la tabla `resumen_diario`
--
ALTER TABLE `resumen_diario`
  ADD PRIMARY KEY (`idresumen_diario`),
  ADD KEY `fk_resumen_diario_usuario1_idx` (`usuario_correo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`correo`,`perfil_idperfil`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo`),
  ADD KEY `fk_usuario_ficha_antropometrica1_idx` (`ficha_antropometrica`),
  ADD KEY `fk_usuario_plan_nutricional1_idx` (`plan_nutricional`),
  ADD KEY `fk_usuario_prog_actfisica1_idx` (`prog_actfisica`),
  ADD KEY `fk_usuario_perfil1_idx` (`perfil_idperfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimento`
--
ALTER TABLE `alimento`
  MODIFY `idalimento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `alimento_consumido`
--
ALTER TABLE `alimento_consumido`
  MODIFY `idalimento_consumido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ejercicio_diario`
--
ALTER TABLE `ejercicio_diario`
  MODIFY `idejercicio_diario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ejercicio_prog`
--
ALTER TABLE `ejercicio_prog`
  MODIFY `idejercicio_prog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ficha_antropometrica`
--
ALTER TABLE `ficha_antropometrica`
  MODIFY `idficha_antropometrica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `plan_nutricional`
--
ALTER TABLE `plan_nutricional`
  MODIFY `idplan_nutricional` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `prog_actfisica`
--
ALTER TABLE `prog_actfisica`
  MODIFY `idprog_actfisica` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `resumen_diario`
--
ALTER TABLE `resumen_diario`
  MODIFY `idresumen_diario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alimentos_plan`
--
ALTER TABLE `alimentos_plan`
  ADD CONSTRAINT `fk_plan_nutricional_has_alimento_alimento1` FOREIGN KEY (`idalimento`) REFERENCES `alimento` (`idalimento`),
  ADD CONSTRAINT `fk_plan_nutricional_has_alimento_plan_nutricional` FOREIGN KEY (`idplan_nutricional`) REFERENCES `plan_nutricional` (`idplan_nutricional`);

--
-- Filtros para la tabla `contenido_pag`
--
ALTER TABLE `contenido_pag`
  ADD CONSTRAINT `fk_contenido_pag_pagina1` FOREIGN KEY (`pagina_pagid`) REFERENCES `pagina` (`pagid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cont_resumen`
--
ALTER TABLE `cont_resumen`
  ADD CONSTRAINT `fk_contenido_alimento_consumido1` FOREIGN KEY (`alimento_consumido_idalimento_consumido`) REFERENCES `alimento_consumido` (`idalimento_consumido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contenido_ejercicio_diario1` FOREIGN KEY (`ejercicio_diario_idejercicio_diario`) REFERENCES `ejercicio_diario` (`idejercicio_diario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_contenido_resumen_diario1` FOREIGN KEY (`resumen_diario_idresumen_diario`) REFERENCES `resumen_diario` (`idresumen_diario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ejercicio_prog`
--
ALTER TABLE `ejercicio_prog`
  ADD CONSTRAINT `fk_ejercicio_prog_prog_actfisica1` FOREIGN KEY (`prog_actfisica`) REFERENCES `prog_actfisica` (`idprog_actfisica`);

--
-- Filtros para la tabla `resumen_diario`
--
ALTER TABLE `resumen_diario`
  ADD CONSTRAINT `fk_resumen_diario_usuario1` FOREIGN KEY (`usuario_correo`) REFERENCES `usuario` (`correo`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_usuario_ficha_antropometrica1` FOREIGN KEY (`ficha_antropometrica`) REFERENCES `ficha_antropometrica` (`idficha_antropometrica`),
  ADD CONSTRAINT `fk_usuario_perfil1` FOREIGN KEY (`perfil_idperfil`) REFERENCES `perfil` (`idperfil`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_plan_nutricional1` FOREIGN KEY (`plan_nutricional`) REFERENCES `plan_nutricional` (`idplan_nutricional`),
  ADD CONSTRAINT `fk_usuario_prog_actfisica1` FOREIGN KEY (`prog_actfisica`) REFERENCES `prog_actfisica` (`idprog_actfisica`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
