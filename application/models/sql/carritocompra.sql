CREATE TABLE carritocompra (
    idcarritocompra INT NOT NULL AUTO_INCREMENT,
    idcarrito INT NOT NULL,
    idarticulo INT NOT NULL,
    cantidad INT NOT NULL DEFAULT 1,
    precio DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (idcarritocompra),
    FOREIGN KEY (idcarrito) REFERENCES carrito(idcarrito),
    FOREIGN KEY (idarticulo) REFERENCES articulo(idarticulo)
);
