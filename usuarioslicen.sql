
CREATE TABLE `usuarioslicencias` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `levely` varchar(50) NOT NULL,
  `Num_folios` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;


INSERT INTO `usuarioslicencias` (`id`, `nombre`, `usuario`, `clave`, `fecha_registro`, `levely`, `Num_folios`) VALUES
(7, 'ADMINISTRADOR', 'admin', 'placas', '2024-03-21', '3', '994');

ALTER TABLE `usuarioslicencias`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `usuarioslicencias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

