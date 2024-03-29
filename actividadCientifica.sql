CREATE DATABASE actividadCientifica;
USE actividadCientifica;

CREATE TABLE investigador (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    contra VARCHAR(60) NOT NULL,
    PRIMARY KEY (id)
);

CREATE TABLE investigacion (
    id INT NOT NULL auto_increment,
    servicio VARCHAR(10),
    nombre VARCHAR(100),
    investigador VARCHAR(50) NOT NULL,
    objetivo VARCHAR(100),
    fechaInicio DATETIME NOT NULL,
    fechaFin DATE,
    estado VARCHAR(100),
    enlace VARCHAR(500),
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
    idInvestigador INT NOT NULL,
    inicio  DATE NOT NULL,
    fin DATE,
    FOREIGN KEY (idInvestigacion) REFERENCES investigacion (id),
    FOREIGN KEY (idInvestigador) REFERENCES investigador (id),
    FOREIGN KEY (idEstado) REFERENCES estado (id)
);

CREATE TABLE documentacion (
    id INT NOT NULL AUTO_INCREMENT,
    idInvestigacion INT NOT NULL,
    investigador VARCHAR(50) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    ruta VARCHAR(200) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (idInvestigacion) REFERENCES investigacion (id)
);

CREATE TABLE modificacion (
    id INT NOT NULL AUTO_INCREMENT,
    idInvestigacion INT NOT NULL,
    investigador VARCHAR(50) NOT NULL,
    fecha DATE NOT NULL,
    servicio VARCHAR(10),
    nombre VARCHAR(100),
    objetivo VARCHAR(100),
    fechaFin VARCHAR(10),
    PRIMARY KEY (id),
    FOREIGN KEY (idInvestigacion) REFERENCES investigacion (id)
);