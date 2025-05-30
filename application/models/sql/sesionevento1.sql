
use educayso_facae;
drop view sesionevento1;
/*
drop view sesionevento1;
create view sesionevento1 as select seev.idsesionevento,seev.idevento,moev.nombre as evaluacion,  seev.fecha,seev.tema, even.titulo as elevento,(select count(asis.idtipoasistencia) from asistencia asis where asis.idevento=seev.idevento and asis.fecha=seev.fecha and asis.idtipoasistencia=1) as puntual,(select count(asis.idtipoasistencia) from asistencia asis where asis.idevento=seev.idevento and asis.fecha=seev.fecha and asis.idtipoasistencia=2) as atrasado   from sesionevento seev,evento even,modoevaluacion moev  where seev.idevento=even.idevento and seev.idmodoevaluacion=moev.idmodoevaluacion;
*/


/*
create view sesionevento1 as select seev.idsesionevento,seev.idevento,moev.nombre as evaluacion, moev.ponderacion,seev.temacorto,seev.idmodoevaluacion, seev.fecha,seev.horainicio,seev.horafin,seev.tema, even.titulo as elevento,seev.idtema,tesi.numerosesion,(select count(idasistencia) from asistencia asis where asis.fecha=seev.fecha and asis.idtipoasistencia in (1,2) and asis.idevento=seev.idevento) as numeasis, (select count(part.idparticipante) from participante part where part.idevento=seev.idevento) as numalum    from sesionevento0 seev,evento even,modoevaluacion moev,tema tesi  where seev.idevento=even.idevento and seev.idmodoevaluacion=moev.idmodoevaluacion and seev.idtema=tesi.idtema 


UNION

			    select seev.idsesionevento,seev.idevento,moev.nombre as evaluacion,  moev.ponderacion,seev.temacorto,seev.idmodoevaluacion, seev.fecha,seev.horainicio,seev.horafin,seev.tema, even.titulo as elevento,seev.idtema, " " as numerosesion,  (select count(idasistencia) from asistencia asis where asis.fecha=seev.fecha and asis.idtipoasistencia in (1,2) and asis.idevento=seev.idevento) as numeasis,(select count(part.idparticipante) from participante part where part.idevento=seev.idevento) as numalum   from sesionevento0 seev,evento even,modoevaluacion moev,tema tesi  where seev.idevento=even.idevento and seev.idmodoevaluacion=moev.idmodoevaluacion and seev.idtema is null; 


*/




create view sesionevento1 as select seev.idsesionevento,seev.idevento,moev.nombre as evaluacion, moev.ponderacion,seev.temacorto,seev.idmodoevaluacion, seev.fecha,seev.horainicio,seev.horafin,seev.tema, even.titulo as elevento,seev.idtema,tesi.numerosesion,0 as numeasis, (select count(part.idparticipante) from participante part where part.idevento=seev.idevento) as numalum, tesi.duracionminutos, (select meap.nombre from metodoaprendizaje meap, metodoaprendizajetema meapte where meapte.idmetodoaprendizaje=meap.idmetodoaprendizaje and  meapte.idtema=tesi.idtema  limit 1)  as metodologia, seev.idcumplimientosesion    from sesionevento0 seev,evento even,modoevaluacion moev,tema tesi  where seev.idevento=even.idevento and seev.idmodoevaluacion=moev.idmodoevaluacion and seev.idtema=tesi.idtema 


UNION

  select seev.idsesionevento,seev.idevento,moev.nombre as evaluacion,  moev.ponderacion,seev.temacorto,seev.idmodoevaluacion, seev.fecha,seev.horainicio,seev.horafin,seev.tema, even.titulo as elevento,seev.idtema, " " as numerosesion, 0 as numeasis,(select count(part.idparticipante) from participante part where part.idevento=seev.idevento) as numalum, "" as duracion,"" as metodologia, seev.idcumplimientosesion   from sesionevento0 seev,evento even,modoevaluacion moev,tema tesi  where seev.idevento=even.idevento and seev.idmodoevaluacion=moev.idmodoevaluacion and seev.idtema is null; 

