
use educayso_facae;
create view vendedor1 as select doce.idvendedor,doce.iddepartamento,pers.idpersona,pers.cedula,concat(COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as elvendedor   from vendedor0 doce,persona0 pers  where doce.idpersona=pers.idpersona;
