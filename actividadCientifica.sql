CREATE DATABASE actividadCientifica;
USE actividadCientifica;
CREATE TABLE investigacion (
    id INT NOT NULL auto_increment,
    servicio varchar(10),
    nombre varchar(100),
    investigadores varchar(100),
    objetivo varchar(100),
    fechaInicio DATETIME NOT NULL,
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

CREATE TABLE estado (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(10) NOT NULL,
    PRIMARY KEY (id)
);
INSERT INTO estado (nombre)
VALUES
    ("Ejecucion"),
    ("Enviado"),
    ("Revision"),
    ("Publicado"),
    ("Cancelado"),
    ("Ingresado");


CREATE TABLE tiempoEstado (
    idEstado INT NOT NULL, 
    idInvestigacion INT NOT NULL,
    inicio  DATE NOT NULL,
    fin DATE,
    FOREIGN KEY (idInvestigacion) REFERENCES investigacion (id),
    FOREIGN KEY (idEstado) REFERENCES estado (id)
);