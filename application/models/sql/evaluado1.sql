use educayso_facae;
drop view evaluado1;
create view evaluado1 as select  evpe.idevaluacionpersona,evpe.idreactivo, evpe.idpersona,concat(pers.apellidos," ",pers.nombres) as lapersona,evpe.fecha, (select count(idpregunta) from pregunta preg where preg.idreactivo=evpe.idreactivo ) as totapreg,(select count(idpregunta) from evaluacion eval where eval.idevaluacionpersona=evpe.idevaluacionpersona) as totapreg2,(select count(idpregunta) from evaluacion eval  where eval.idevaluacionpersona=evpe.idevaluacionpersona and eval.acierto=1) as totaacie   from evaluacionpersona evpe, persona pers where evpe.idpersona=pers.idpersona; 
