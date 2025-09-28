
use educayso_facae;
drop view participacion2;
/* create view participacion2 as select par.idparticipacion,par.idevento,par.fecha,par.porcentaje,par.ayuda,par.idpersona,concat(per.apellidos," ",per.nombres) as nombres,par.comentario,sex.idsexo, sex.nombre as sexo,  (select ins.idinstitucion from estudio est, institucion ins where est.idnivelestudio=2 and est.idinstitucion=ins.idinstitucion and est.idpersona=per.idpersona) as idinstitucion ,(select ins.nombre from estudio est, institucion ins where est.idnivelestudio=2 and est.idinstitucion=ins.idinstitucion and est.idpersona=per.idpersona) as colegio, (select pat.idparticipanteestado from participante pat where pat.idpersona=per.idpersona and pat.idevento=par.idevento)  as idparticipanteestado,seev.idmodoevaluacion,moev.nombre as modoevaluacion  from participacion par,persona0 per,sexo sex, sesionevento0 seev, modoevaluacion moev where par.idpersona=per.idpersona and per.idsexo=sex.idsexo and par.idevento=seev.idevento and par.fecha=seev.fecha and seev.idmodoevaluacion=moev.idmodoevaluacion;
*/


CREATE VIEW participacion2 AS
SELECT 
    par.idparticipacion,
    par.idevento,
    par.fecha,
    par.porcentaje,
    par.ayuda,
    par.idpersona,
    CONCAT(per.apellidos, ' ', per.nombres) AS nombres,
    par.comentario,
    sex.idsexo,
    sex.nombre AS sexo,
    (
        SELECT ins.idinstitucion
        FROM estudio est
        JOIN institucion ins ON est.idinstitucion = ins.idinstitucion
        WHERE est.idnivelestudio = 2
          AND est.idpersona = per.idpersona
        LIMIT 1
    ) AS idinstitucion,
    (
        SELECT ins.nombre
        FROM estudio est
        JOIN institucion ins ON est.idinstitucion = ins.idinstitucion
        WHERE est.idnivelestudio = 2
          AND est.idpersona = per.idpersona
        LIMIT 1
    ) AS colegio,
    (
        SELECT pat.idparticipanteestado
        FROM participante pat
        WHERE pat.idpersona = per.idpersona
          AND pat.idevento = par.idevento
        LIMIT 1
    ) AS idparticipanteestado,
    COALESCE(seev.idmodoevaluacion, 1) AS idmodoevaluacion,
    COALESCE(moev.nombre, 'participacion') AS modoevaluacion
FROM participacion par
JOIN persona0 per ON par.idpersona = per.idpersona
JOIN sexo sex ON per.idsexo = sex.idsexo
LEFT JOIN sesionevento0 seev 
       ON par.idevento = seev.idevento 
      AND par.fecha = seev.fecha
LEFT JOIN modoevaluacion moev 
       ON seev.idmodoevaluacion = moev.idmodoevaluacion;

