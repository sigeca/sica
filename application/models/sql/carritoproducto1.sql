
use educayso_facae;
create view carritoproducto1 as select capr.idcarritoproducto,capr.idcarrito,prod.idproducto,prod.nombre as elproducto, capr.cantidad, capr.precio   from carritoproducto0 capr,producto0 prod  where capr.idproducto=prod.idproducto;
