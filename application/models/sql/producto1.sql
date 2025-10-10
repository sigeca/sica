
use educayso_facae;
drop view producto1;

create view producto1 as 
select arti.idproducto, 
       arti.nombre as elproducto, 
       arti.detalle, 
       (select ubic.idpersona from ubicacionproducto1 ubic where  ubic.idproducto=arti.idproducto limit 1) as idpersona,
       (select ubic.lapersona from ubicacionproducto1 ubic where  ubic.idproducto=arti.idproducto limit 1) as elcustodio,
       (select prar.precio from precioproducto prar where  prar.idproducto=arti.idproducto limit 1) as precio,
    arti.idinstitucion,inst.nombre as lainstitucion  from producto arti,institucion inst where arti.idinstitucion=inst.idinstitucion; 
