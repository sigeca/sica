
use educayso_facae;


drop view telefono1;
create view telefono1 as select telefono.idtelefono,telefono.numero as numero,telefono.idpersona,  concat(persona.apellidos,"  ",persona.nombres) as lapersona ,telefono.idtelefono_estado,telefono_estado.nombre as elestado   from telefono,persona,telefono_estado  where telefono.idpersona=persona.idpersona and telefono.idtelefono_estado=telefono_estado.idtelefono_estado;
