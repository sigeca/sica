use educayso_facae; 
create view portafolio2 as select port.idportafolio,pele.idperiodoacademico, port.idpersona,pele.nombrecorto as elperiodo,concat(COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as lapersona,dopo.iddocumentoportafolio,docu.iddocumento,docu.asunto,docu.fechaelaboracion,docu.archivopdf,dire.iddirectorio,tido.idtipodocu,tido.descripcion as eltipodocumento, dire.ruta,orde.idordenador, orde.nombre as elordenador, plco.subject,plco.head,plco.body,plco.foot from portafolio port, periodoacademico pele, persona pers, documento docu, documentoportafolio dopo, tipodocu tido, directorio dire,ordenador orde,plantillacorreo plco where port.idperiodoacademico=pele.idperiodoacademico and port.idpersona=pers.idpersona and port.idportafolio=dopo.idportafolio and dopo.iddocumento=docu.iddocumento and docu.idtipodocu=tido.idtipodocu and docu.iddirectorio=dire.iddirectorio and docu.idordenador=orde.idordenador and dopo.idplantillacorreo=plco.idplantillacorreo; 
