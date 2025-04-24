use educayso_facae;

create table cumplimientosesion(idcumplimientosesion int(11) not null auto_increment primary key, nombre varchar(20));
insert into cumplimientosesion(nombre) values("PENDIENTE");
insert into cumplimientosesion(nombre) values("EJECUTADO");
insert into cumplimientosesion(nombre) values("NO EJECUTADO");

