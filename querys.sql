DROP TABLE visitcompany;
--------------------------CREAR BASE DE DATOS--------------------------------
CREATE DATABASE visitcompany;
--------------------------USAR BASE DE DATOS---------------------------------
use visit_company;
-------------------------CREACION DE TABLAS---------------------------------
CREATE TABLE company(
idcompany INT AUTO_INCREMENT,
namecompany VARCHAR(100),
address VARCHAR(200),
phone VARCHAR(11),
views VARCHAR(11),
description_company TEXT,
PRIMARY KEY (idcompany)
);

CREATE TABLE users(
iduser INT AUTO_INCREMENT,
emailuser VARCHAR(100),
passworduser VARCHAR(100),
idtypeuserf INT,
PRIMARY KEY (iduser),
FOREIGN KEY (idtypeuserf) REFERENCES typeuser(idtypeuser)
);

CREATE TABLE type_user(
    idtypeuser INT,
    nametypeuser VARCHAR(25),
    CONSTRAINT idtypeuser PRIMARY KEY (idtypeuser)
);
-------------------------------CREACION DE PROCEDIMIENTOS ALMACENADOS------------------------
CREATE PROCEDURE getiduser(IN email VARCHAR(255),IN pass VARCHAR(255),IN iduserf int) BEGIN INSERT INTO users(emailuser,passworduser,idtypeuserf) VALUES(email,pass,iduserf); SELECT last_insert_id() as lastiduser; END;