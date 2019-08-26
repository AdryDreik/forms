drop database forms;
create database forms;
use forms;
create table formulario (
	id int auto_increment primary key not null,
    nombre varchar(200),
    descripcion text,
    publicado boolean
);

create table componente (
	id int auto_increment primary key not null,
	builder text,
	form_id int,
    FOREIGN KEY (form_id) REFERENCES formulario(id)
);