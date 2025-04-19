
use educayso_facae;
create view evento2 as select evento.idevento,evento.titulo,evento.detalle,evento.fechacreacion,evento.fechafinaliza,persona.idpersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as elparticipante,participante.idparticipante,participante.iddocumento as iddocumento2,evento_estado.idevento_estado, evento_estado.nombre as estado from evento,evento_estado,participante,persona where evento.idevento_estado=evento_estado.idevento_estado and  participante.idevento=evento.idevento and participante.idpersona=persona.idpersona;
