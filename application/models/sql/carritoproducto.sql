CREATE TABLE carritoproducto (
    idcarritoproducto INT NOT NULL AUTO_INCREMENT,
    idcarrito INT NOT NULL,
    idproducto INT NOT NULL,
    cantidad INT NOT NULL DEFAULT 1,
    precio DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (idcarritoproducto),
    FOREIGN KEY (idcarrito) REFERENCES carrito(idcarrito),
    FOREIGN KEY (idproducto) REFERENCES producto(idproducto)
);
