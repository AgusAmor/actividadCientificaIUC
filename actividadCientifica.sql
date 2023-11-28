CREATE DATABASE actividadCientifica;
USE actividadCientifica;
CREATE TABLE investigacion (
    id INT NOT NULL auto_increment,
    servicio varchar(10),
    nombre varchar(100),
    investigadores varchar(100),
    objetivo varchar(100),
    fechaInicio DATE,
    fechaFin DATE,
    estado varchar(100),
    PRIMARY KEY (id)
);

CREATE TABLE usuario (
    id INT NOT NULL AUTO_INCREMENT,
    email VARCHAR(50) NOT NULL,
    contra VARCHAR(60) NOT NULL,
    PRIMARY KEY (id)
);