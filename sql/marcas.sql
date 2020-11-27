create table marcas(
    id_marca int primary key auto_increment,
    nombre varchar(40) not null,
    provincia varchar(60),
    imagen varchar(60) default "./img/default.jpg"
);
insert into marcas(nombre, provincia) values("Seat", "Almeria");
insert into marcas(nombre, provincia) values("Renault", "Sevilla");
insert into marcas(nombre, provincia) values("Peugeot", "Granada");
insert into marcas(nombre, provincia) values("Toyota", "Jaen");
insert into marcas(nombre, provincia) values("Citroen", "Cordoba");
-- Creamos la base datod
-- create database ejemplo2;
-- creamos un usuario 
-- create user usuario1@'localhost' identified by "secreto";
-- Le damos permisos en la BBDD
-- grant all on ejemplo2.* to usuario1@'localhost'