use educayso_facae; 
create view persona1 as select persona0.*,concat(persona0.apellidos," ",persona0.nombres) as lapersona from persona0; 



