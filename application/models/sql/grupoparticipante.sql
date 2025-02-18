use educayso_facae;
drop table grupoparticipante;
CREATE TABLE grupoparticipante (
    idgrupoparticipante INT AUTO_INCREMENT PRIMARY KEY,
    idparticipante INT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    fechadesde DATE NOT NULL,
    fechahasta DATE NOT NULL
);


ALTER TABLE grupoparticipante
ADD CONSTRAINT fk_participante FOREIGN KEY (idparticipante) REFERENCES participante(idparticipante);

