use educayso_facae;
CREATE TABLE `ubicacionproducto` (
  `idubicacionproducto` int(11) NOT NULL auto_increment primary key,
  `idproducto` int(11) DEFAULT NULL,
  `idpersona` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `idunidad` int(11) DEFAULT NULL,
  `detalle` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

