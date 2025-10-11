
use educayso_facae;

create view precio1 as 
select prec.idprecio, 
       prec.nombre as elprecio, 
       prec.detalle, 
       (select ubic.idpersona from ubicacionprecio1 ubic where  ubic.idprecio=prec.idprecio limit 1) as idpersona,
       (select ubic.lapersona from ubicacionprecio1 ubic where  ubic.idprecio=prec.idprecio limit 1) as elcustodio,
       (select prar.precio from precioprecio prar where  prar.idprecio=prec.idprecio limit 1) as precio,
    prec.idinstitucion,inst.nombre as lainstitucion  from precio prec,institucion inst where prec.idinstitucion=inst.idinstitucion; 
