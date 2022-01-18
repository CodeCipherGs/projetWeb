DROP DATABASE site_de_location;
CREATE DATABASE site_de_location DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE site_de_location ;

CREATE TABLE automobiles (
  code                          VARCHAR(255),
  nom                           VARCHAR(255),
  description	            	VARCHAR(255),
  disponibilite			VARCHAR(255),
  cout_par_jour_suggere		DECIMAL(10, 2),
  marque 			VARCHAR(255),
  annee_fabrication 			YEAR,
  CONSTRAINT automobiles_pk PRIMARY KEY (code)
);

CREATE TABLE consommateur (
  numero                INT(11),
  prenom            	VARCHAR(255),
  nom 			VARCHAR(255),
  telephone             VARCHAR(255),
  courriel             	VARCHAR(255),
  solde		            FLOAT,
  CONSTRAINT consommateur_pk PRIMARY KEY (numero)
);

CREATE TABLE pret (
  id                      INT(11),
  numero_consommateur 	  INT(11),
  code_automobiles	  	  VARCHAR(255),
  cout_par_jour        	  DECIMAL(10,2),
  debut 				  DATE,
  fin_prevue 			  DATE,
  fin_reele 			  DATE,
    
  CONSTRAINT pret_pk PRIMARY KEY (id),
  CONSTRAINT option_fk1 FOREIGN KEY (numero_consommateur) REFERENCES consommateur(numero),
  CONSTRAINT option_fk2 FOREIGN KEY (code_automobiles) REFERENCES automobiles(code)  
);



CREATE TABLE utilisateur (
  nom_utilisateur   VARCHAR(255),
  mot_passe         VARCHAR(255),
  CONSTRAINT utilisateur_pk PRIMARY KEY (nom_utilisateur)
);

INSERT INTO utilisateur VALUES ('root','root');
INSERT INTO utilisateur VALUES ('ghilas','1234');
INSERT INTO utilisateur VALUES ('ziyu','1234');


INSERT INTO consommateur VALUES (101,'john','doe','514-321-1235','Jdoe@hotmail.com',604);
INSERT INTO consommateur VALUES (102,'bob','leponge','514-321-1236','Bleponge@hotmail.com',325);
INSERT INTO consommateur VALUES (103,'kyle','west','514-321-1237','kwest@hotmail.com',225);
INSERT INTO consommateur VALUES (104,'xu','xang','514-321-1238','xxang@hotmail.com',325);
INSERT INTO consommateur VALUES (105,'berg','heinse','514-321-1239','bheinse@hotmail.com',100);


INSERT INTO automobiles	VALUES ('a01','mustang','Voiture de sport','hors-service',70,'Ford','2020');
INSERT INTO automobiles	VALUES ('a02','camaro','Voiture de sport','prêté',50,'Chevrolet','2020');
INSERT INTO automobiles	VALUES ('a03','G63','SUV','disponible',500,'Mercedes Benz','2020');
INSERT INTO automobiles	VALUES ('a04','911','Voiture de sport','disponible',200,'Porsche','2020');
INSERT INTO automobiles	VALUES ('a05','RS6','Voiture de luxe','disponible',300,'Audi','2020');


INSERT INTO pret VALUES (01,101,'a01',20,'2020-12-09','2020-12-15','2020-12-12');
INSERT INTO pret VALUES (02,102,'a02',20,'2020-12-10','2020-12-11','2020-12-11');
INSERT INTO pret VALUES (03,103,'a03',20,'2020-12-09','2020-12-17',NUll);









