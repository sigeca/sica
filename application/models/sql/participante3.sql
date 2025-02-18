use educayso_facae;

create view participante3 as select pa.idparticipante,pa.idnivelparticipante,pa.idpersona,ev.idevento,ev.titulo as elevento,concat(pe.apellidos," ",pe.nombres) as elparticipante,pe.cedula,doc.archivopdf,pa.grupoletra  from participante0 pa,evento ev,persona pe,documento doc where pa.idpersona=pe.idpersona and pa.idevento=ev.idevento;




