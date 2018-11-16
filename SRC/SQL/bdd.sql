#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------
drop database if exists autoEcole;
create database autoEcole;
use autoEcole;

#------------------------------------------------------------
# Table: mois
#------------------------------------------------------------

CREATE TABLE mois(
        idm      Int  Auto_increment  NOT NULL ,
        annee    Int NOT NULL ,
        num_mois Int NOT NULL
	,CONSTRAINT mois_PK PRIMARY KEY (idm)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: modele
#------------------------------------------------------------

CREATE TABLE modele(
        idmo     Int  Auto_increment  NOT NULL ,
        nom      Varchar (50) NOT NULL ,
        cylindre Int NOT NULL
	,CONSTRAINT modele_PK PRIMARY KEY (idmo)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: voiture
#------------------------------------------------------------

CREATE TABLE voiture(
        idv             Int  Auto_increment  NOT NULL ,
        immatriculation Varchar (50) NOT NULL ,
        date_achat      Date NOT NULL ,
        nb_km           Float NOT NULL ,
        idmo            Int NOT NULL
	,CONSTRAINT voiture_PK PRIMARY KEY (idv)

	,CONSTRAINT voiture_modele_FK FOREIGN KEY (idmo) REFERENCES modele(idmo)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: grp
#------------------------------------------------------------

CREATE TABLE grp(
        idgrp Int  Auto_increment  NOT NULL ,
        nom   Varchar (50) NOT NULL
	,CONSTRAINT grp_PK PRIMARY KEY (idgrp)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: user
#------------------------------------------------------------

CREATE TABLE user(
        idu        Int  Auto_increment  NOT NULL ,
        nom        Varchar (50) NOT NULL ,
        prenom     Varchar (50) NOT NULL ,
        datenaissa Date NOT NULL ,
        idgrp      Int NOT NULL
	,CONSTRAINT user_PK PRIMARY KEY (idu)

	,CONSTRAINT user_grp_FK FOREIGN KEY (idgrp) REFERENCES grp(idgrp)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: moniteur
#------------------------------------------------------------

CREATE TABLE moniteur(
        idu           Int NOT NULL ,
        date_embauche Date NOT NULL ,
        nom           Varchar (50) NOT NULL ,
        prenom        Varchar (50) NOT NULL ,
        datenaissa    Date NOT NULL ,
        idgrp         Int NOT NULL
	,CONSTRAINT moniteur_PK PRIMARY KEY (idu)

	,CONSTRAINT moniteur_user_FK FOREIGN KEY (idu) REFERENCES user(idu)
	,CONSTRAINT moniteur_grp0_FK FOREIGN KEY (idgrp) REFERENCES grp(idgrp)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: client
#------------------------------------------------------------

CREATE TABLE client(
        idu             Int NOT NULL ,
        adresse         Varchar (50) NOT NULL ,
        code_zip        Char (5) NOT NULL ,
        region          Varchar (50) NOT NULL ,
        datenaissa      Date NOT NULL ,
        tel             Varchar (50) NOT NULL ,
        nom             Varchar (50) NOT NULL ,
        prenom          Varchar (50) NOT NULL ,
        datenaissa_user Date NOT NULL ,
        idu_moniteur    Int NOT NULL ,
        idgrp           Int NOT NULL
	,CONSTRAINT client_PK PRIMARY KEY (idu)

	,CONSTRAINT client_user_FK FOREIGN KEY (idu) REFERENCES user(idu)
	,CONSTRAINT client_moniteur0_FK FOREIGN KEY (idu_moniteur) REFERENCES moniteur(idu)
	,CONSTRAINT client_grp1_FK FOREIGN KEY (idgrp) REFERENCES grp(idgrp)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: lecon
#------------------------------------------------------------

CREATE TABLE lecon(
        idl        Int  Auto_increment  NOT NULL ,
        date_heure Date NOT NULL ,
        idv        Int NOT NULL ,
        idu        Int NOT NULL ,
        idu_client Int NOT NULL
	,CONSTRAINT lecon_PK PRIMARY KEY (idl)

	,CONSTRAINT lecon_voiture_FK FOREIGN KEY (idv) REFERENCES voiture(idv)
	,CONSTRAINT lecon_moniteur0_FK FOREIGN KEY (idu) REFERENCES moniteur(idu)
	,CONSTRAINT lecon_client1_FK FOREIGN KEY (idu_client) REFERENCES client(idu)
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: rouler
#------------------------------------------------------------

CREATE TABLE rouler(
        idv Int NOT NULL ,
        idm Int NOT NULL ,
        km  Float NOT NULL
	,CONSTRAINT rouler_PK PRIMARY KEY (idv,idm)

	,CONSTRAINT rouler_voiture_FK FOREIGN KEY (idv) REFERENCES voiture(idv)
	,CONSTRAINT rouler_mois0_FK FOREIGN KEY (idm) REFERENCES mois(idm)
)ENGINE=InnoDB;




#------------------------------------------------------------
# Table: triggers
#------------------------------------------------------------



DROP Trigger if exists userajout_client;
DELIMITER //
CREATE Trigger userajout_client
BEFORE INSERT ON client
FOR EACH ROW
BEGIN
DECLARE var1 int;
SELECT COUNt(*)
into var1
FROM user
where idu=new.idu;
IF var1 = 0
THEN
INSERT INTO user (nom,prenom,datenaissa,idgrp)
VALUES (new.idu,new.nom,new.prenom,new.datenaissa,new.idgrp);
END IF ;
END //
DELIMITER ;


DROP Trigger if exists userajout_moniteur;
DELIMITER //
CREATE Trigger userajout_moniteur
BEFORE INSERT ON moniteur
FOR EACH ROW
BEGIN
DECLARE var1 int;
SELECT COUNt(*)
into var1
FROM user
where idu=new.idu;
IF var1 = 0
THEN
INSERT INTO user (nom,prenom,datenaissa,idgrp)
VALUES (new.idu,new.nom,new.prenom,new.datenaissa,new.idgrp);
END IF ;
END //
DELIMITER ;
