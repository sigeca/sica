CREATE TABLE carrito (
    idcarrito INT NOT NULL AUTO_INCREMENT,
    idpersona INT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    estado ENUM('activo','comprado') DEFAULT 'activo',
    PRIMARY KEY (idcarrito),
    FOREIGN KEY (idpersona) REFERENCES usuario(idpersona)
);
