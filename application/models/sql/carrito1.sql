
use educayso_facae;
create view carrito1 as select carr.idcarrito,pers.idpersona,concat(COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as propietario   from carrito0 carr,persona0 pers  where carr.idpersona=pers.idpersona;
