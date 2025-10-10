
use educayso_facae;
create view ubicacionproducto1 as select ubicacionproducto.idubicacionproducto,ubicacionproducto.idproducto,ubicacionproducto.idpersona,ubicacionproducto.detalle,ubicacionproducto.fecha,producto.nombre as elproducto ,  concat(persona.apellidos,"  ",persona.nombres) as lapersona,unidad.nombre as launidad from ubicacionproducto,producto,persona,unidad where ubicacionproducto.idproducto=producto.idproducto and ubicacionproducto.idpersona=persona.idpersona and ubicacionproducto.idunidad=unidad.idunidad;
