use educayso_facae;
drop view seguimientosilabo1;
create view  seguimientosilabo1 as select sesi.idseguimientosilabo,sesi.idevento, crse.idcriterioseguimientosilabo,crse.nombre as elcriterioseguimientosilabo,vcss.idvalorcriterioseguimientosilabo, vcss.nombre as elvalorcriterioseguimientosilabo   from seguimientosilabo sesi, criterioseguimientosilabo crse,valorcriterioseguimientosilabo vcss where sesi.idcriterioseguimientosilabo=crse.idcriterioseguimientosilabo and sesi.idvalorcriterioseguimientosilabo=vcss.idvalorcriterioseguimientosilabo;
