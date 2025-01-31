
use educayso_facae;
drop view articuloreglamento1;
create view articuloreglamento1 as select arre.idarticuloreglamento,  arre.contenido, arre.idreglamento, regl.nombre as elreglamento, regl.archivo, arre.numero,inst.idinstitucion, inst.nombre as lainstitucion  from articuloreglamento arre, reglamento  regl, institucion inst where arre.idreglamento=regl.idreglamento and  regl.idinstitucion=inst.idinstitucion; 
