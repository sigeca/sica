use educayso_facae;
CREATE TABLE `precioarticulo` (
  `idprecioarticulo` int(11) NOT NULL auto_increment primary key,
  `idarticulo` int(11) DEFAULT NULL,
  `fechadesde` date DEFAULT NULL,
  `fechahasta` date DEFAULT NULL,
  `detalle` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

