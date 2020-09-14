# apirest-backEnd
Back-End de https://github.com/usieldorantes/front-End

Base de datos en phpmyadmin


--
-- Base de datos: `dbtareas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE `tareas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha` date NOT NULL,
  `estatus` varchar(50) NOT NULL,
  `minutos` int(11) NOT NULL,
  `minutosT` int(11) NOT NULL,
  `minutosF` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`id`, `nombre`, `descripcion`, `fecha`, `estatus`, `minutos`, `minutosT`, `minutosF`) VALUES
(1, 'Español', 'pagina 1-5', '2020-09-14', 'pendiente', 90, 0, 90),
(9, 'Matematicas', 'Hacer factorizacion', '2020-09-13', 'pendiente', 20, 0, 20),
(29, 'Tesis', 'Haré 2 hojas hoy', '2020-09-12', 'completado', 17, 14, 3),
(49, 'Historia', 'Leer', '2020-09-11', 'pendiente', 30, 0, 30),
(50, 'barrer', 'comprar la escoba', '2020-09-10', 'pendiente', 45, 0, 45),
(53, 'Butear la lap', 'Hacer un respaldo de toda la informacion', '2020-09-09', 'pendiente', 5, 0, 5),
(55, 'lavar', 'escoger la ropa por color', '2020-09-08', 'completado', 90, 90, 0),
(56, 'Lavar el baño', 'usar quita zarro', '2020-09-01', 'completado', 90, 60, 30);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;
