CREATE TABLE carrito (
    idcarrito INT NOT NULL AUTO_INCREMENT,
    idcomprador INT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('activo','comprado') DEFAULT 'activo',
    PRIMARY KEY (idcarrito),
    FOREIGN KEY (idcomprador) REFERENCES usuario(idcomprador)
);
