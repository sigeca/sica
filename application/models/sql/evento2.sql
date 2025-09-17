
use educayso_facae;
drop view evento2;
create view evento2 as select even.idevento,even.titulo,even.detalle,even.fechacreacion,even.fechafinaliza,pers.idpersona,concat(COALESCE(pers.apellidos,''),"  ",COALESCE(pers.nombres,'')) as elparticipante,part.idparticipante,part.iddocumento as iddocumento2,eves.idevento_estado, eves.nombre as estado, (select grpa.idtipogrupoparticipante from grupoparticipante grpa where grpa.idparticipante=part.idparticipante limit 1) as idtipogrupoparticipante      from evento even,evento_estado eves,participante part,persona pers where even.idevento_estado=eves.idevento_estado and  part.idevento=even.idevento and part.idpersona=pers.idpersona;
