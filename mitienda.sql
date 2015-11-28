#Script de mitienda

#borro la DB en caso de que exista
DROP DATABASE IF EXISTS mitienda;
# la creo
CREATE DATABASE mitienda;

USE mitienda;

#Creo una tabla

CREATE TABLE usuario (
	login VARCHAR(25) NOT NULL PRIMARY KEY,
	pass VARCHAR(32) NOT NULL,
	role VARCHAR(15) default 'usuario'
) CHARACTER SET UTF8;

## pongo por defecto usuario asi todos los que se registren desde la web solo pueden ser usuarios ###

CREATE TABLE producto (
	referencia VARCHAR(30) NOT NULL PRIMARY KEY,
	descripcion VARCHAR(120) NOT NULL,
	precio DECIMAL(7,2) NOT NULL,
	stock MEDIUMINT NOT NULL,
	stockminimo SMALLINT NOT NULL,
	imagen VARCHAR(15)
	
) CHARACTER SET UTF8;

## decimal, mas preciso que float y pongo varchar(15) en imagen porque voy a poner imagenes numeradas ##

CREATE TABLE cestauser (
	id_cesta  INTEGER AUTO_INCREMENT  NOT NULL,
	id_login VARCHAR(25) NOT NULL,
	fecha DATE,
	CONSTRAINT cestauser_PK PRIMARY KEY (id_cesta,id_login),
	CONSTRAINT cestauser_FK1
			FOREIGN KEY (id_login) REFERENCES usuario (login)
	
	
) CHARACTER SET UTF8;

CREATE TABLE cestadetalle (
	id_cestauser  INTEGER NOT NULL,
	id_referencia VARCHAR(30) NOT NULL,
	uds SMALLINT NOT NULL,
	CONSTRAINT cestadetalle_PK PRIMARY KEY (id_cestauser,id_referencia),
	CONSTRAINT cestadetalle_FK1
			FOREIGN KEY (id_cestauser) REFERENCES cestauser (id_cesta),
	CONSTRAINT cestadetalle_FK2
			FOREIGN KEY (id_referencia) REFERENCES producto (referencia)	
	
) CHARACTER SET UTF8;


INSERT INTO usuario (login, pass, role) VALUES ('admin',md5('admin'),'administrador');
												 
INSERT INTO producto (referencia, descripcion, precio,stock,stockminimo,imagen) VALUES ('REF-00001','Monitor',285.69,100,10,'1.png');											 

INSERT INTO cestauser (id_cesta,id_login,fecha) VALUES (0,'admin','2015-11-25');
												 
INSERT INTO cestadetalle (id_cestauser,id_referencia,uds) VALUES (1,'REF-00001',4);




























