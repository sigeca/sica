
use educayso_facae;

create view producto1 as 
select prod.idproducto, 
       prod.nombre as elproducto, 
       prod.detalle, 
       (select ubic.idpersona from ubicacionproducto1 ubic where  ubic.idproducto=prod.idproducto limit 1) as idpersona,
       (select ubic.lapersona from ubicacionproducto1 ubic where  ubic.idproducto=prod.idproducto limit 1) as elcustodio,
       (select prpr.precio from precioproducto prpr where  prpr.idproducto=prod.idproducto limit 1) as precio,
    prod.idinstitucion,inst.nombre as lainstitucion  from producto prod,institucion inst where prod.idinstitucion=inst.idinstitucion; 
