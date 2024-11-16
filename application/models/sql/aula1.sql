use educayso_facae;
drop view aula1;
create view aula1 as select aula.idaula, aula.nombre,aula.detalle,inst.idinstitucion, inst.nombre as lainstitucion from aula0 aula, institucion inst where aula.idinstitucion=inst.idinstitucion;
