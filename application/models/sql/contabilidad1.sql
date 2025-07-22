
use educayso_facae;
drop view contabilidad1;
create view contabilidad1 as select cont.idcontabilidad,cont.idbeneficiario, (select concat(COALESCE(pe.apellidos,'')," ",COALESCE(pe.nombres,'')) from persona pe,beneficiario bene where cont.idbeneficiario=bene.idbeneficiario and bene.idpersona=pe.idpersona LIMIT 1) as elbeneficiario,cont.idpagador,(select concat(COALESCE(pe.apellidos,'')," ",COALESCE(pe.nombres,'')) from persona pe,pagador paga where cont.idpagador=paga.idpagador and paga.idpersona=pe.idpersona LIMIT 1) as elpagador , cont.detalle, cont.fechacontabilidad, cont.valor,docu.iddocumento,docu.archivopdf from contabilidad cont,documento docu where cont.iddocumento=docu.iddocumento ;


