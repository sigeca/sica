CREATE TABLE carrito (
    idcarrito INT NOT NULL AUTO_INCREMENT,
    idpersona INT NOT NULL,
    fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (idcarrito),
    FOREIGN KEY (idpersona) REFERENCES usuario(idpersona)
);
