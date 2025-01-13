
use educayso_facae;
drop view password1;
create view password1 as select usuario.idusuario,usuario.email, password.idpassword,persona.idpersona, concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')) as lapersona,concat(COALESCE(persona.apellidos,''),"  ",COALESCE(persona.nombres,'')," : ",COALESCE(usuario.email)) as elusuario, password.idevento as idevento, evento.titulo as elevento,password.password,"Entrega de credenciales" as asunto, password.onoff, password.fechaon,password.fechaoff, plco.subject,plco.head,plco.body,plco.foot  from password, usuario, persona,  evento, plantillacorreo plco  where password.idusuario=usuario.idusuario and usuario.idpersona = persona.idpersona and password.idevento= evento.idevento and plco.idplantillacorreo=2 ;
