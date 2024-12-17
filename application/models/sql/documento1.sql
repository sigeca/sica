USE educayso_facae;

DROP VIEW IF EXISTS documento1;

CREATE VIEW documento1 AS
WITH autor_info AS (
    SELECT 
        em.iddocumento,
        CONCAT(COALESCE(pe.apellidos, ''), ' ', COALESCE(pe.nombres, '')) AS autor,
        pe.idpersona
    FROM 
        emisor em
    INNER JOIN 
        persona pe ON em.idpersona = pe.idpersona
),
portafolio_info AS (
    SELECT 
        podo.iddocumento,
        port.idportafolio,
        port.idpersona
    FROM 
        documentoportafolio podo
    INNER JOIN 
        portafolio port ON podo.idportafolio = port.idportafolio
)
SELECT 
    do.iddocumento,
    ai.autor,
    ai.idpersona,
    do.asunto,
    do.fechaelaboracion,
    do.archivopdf,
    ti.idtipodocu,
    ti.descripcion AS eltipodocu,
    di.ruta,
    ord.nombre AS elordenador,
    do.iddestinodocumento,
    pi.idportafolio
FROM 
    documento do
LEFT JOIN 
    autor_info ai ON do.iddocumento = ai.iddocumento
LEFT JOIN 
    portafolio_info pi ON do.iddocumento = pi.iddocumento AND pi.idpersona = ai.idpersona
INNER JOIN 
    tipodocu ti ON do.idtipodocu = ti.idtipodocu
INNER JOIN 
    directorio di ON do.iddirectorio = di.iddirectorio
INNER JOIN 
    ordenador ord ON do.idordenador = ord.idordenador

UNION

SELECT 
    do.iddocumento,
    ai.autor,
    ai.idpersona,
    do.asunto,
    do.fechaelaboracion,
    do.archivopdf,
    ti.idtipodocu,
    ti.descripcion AS eltipodocu,
    '' AS ruta,
    '' AS elordenador,
    do.iddestinodocumento,
    pi.idportafolio
FROM 
    documento do
LEFT JOIN 
    autor_info ai ON do.iddocumento = ai.iddocumento
LEFT JOIN 
    portafolio_info pi ON do.iddocumento = pi.iddocumento AND pi.idpersona = ai.idpersona
INNER JOIN 
    tipodocu ti ON do.idtipodocu = ti.idtipodocu
WHERE 
    do.iddirectorio = 0 
    AND do.idordenador = 0;
