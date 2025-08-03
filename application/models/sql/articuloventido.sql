CREATE TABLE `articulovendido` (
  `idarticulovendido` int NOT NULL,
  `idarticulo` int ,
  `cantidad` decimal(10,2),
  `precio` decimal(10,2) ,
  `fechavendido` date
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

