use educayso_facae;
drop view precioarticulo1;
create view precioarticulo1 as select prar.idprecioarticulo,prar.idarticulo,prar.precio,prar.detalle,prar.fechadesde,prar.fechahasta,arti.nombre as elarticulo  from precioarticulo prar,articulo arti where prar.idarticulo=arti.idarticulo ;
