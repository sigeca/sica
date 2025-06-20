use educayso_facae; 
drop view portafolio1;
create view portafolio1 as select port.idportafolio,pele.idperiodoacademico, port.idpersona,pele.nombrecorto as elperiodo,concat(COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as lapersona,port.idchklstportafolio from portafolio port, periodoacademico pele, persona pers where port.idperiodoacademico=pele.idperiodoacademico and port.idpersona=pers.idpersona; 
