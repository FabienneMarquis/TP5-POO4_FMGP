SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `tp5php` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `tp5php` ;

DROP TABLE IF EXISTS `Utilisateur`;
CREATE TABLE `Utilisateur` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(32) NOT NULL,
  `motDePasse` char(40) NOT NULL,
  `adresseEmail` varchar(128) NOT NULL,
  `hashValidation` char(32),
  `dateInscription` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom` (`nom`),
  UNIQUE KEY `adresseEmail` (`adresseEmail`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `mot_de_passe` (`motDePasse`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
-- -----------------------------------------------------
-- Table `tp5php`.`Ville`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tp5php`.`Ville`;
CREATE TABLE IF NOT EXISTS `tp5php`.`Ville` (
  `idVille` INT NOT NULL AUTO_INCREMENT,
  `nomVille` VARCHAR(45) NULL,
  PRIMARY KEY (`idVille`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tp5php`.`Client`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tp5php`.`Client`;
CREATE TABLE IF NOT EXISTS `tp5php`.`Client` (
  `idClient` INT NOT NULL AUTO_INCREMENT,
  `nomClient` VARCHAR(45) NULL,
  `prenomClient` VARCHAR(45) NULL,
  `ageClient` VARCHAR(45) NULL,
  `courrielClient` VARCHAR(45) NULL,
  `adresse` VARCHAR(45) NULL,
  `idVille` INT NOT NULL,
  PRIMARY KEY (`idClient`),
  INDEX `fk_Client_Ville1_idx` (`idVille` ASC),
  CONSTRAINT `fk_Client_Ville1`
    FOREIGN KEY (`idVille`)
    REFERENCES `tp5php`.`Ville` (`idVille`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tp5php`.`Facture`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tp5php`.`Facture`;
CREATE TABLE IF NOT EXISTS `tp5php`.`Facture` (
  `idFacture` INT NOT NULL AUTO_INCREMENT,
  `dateFacture` DATE NULL,
  `idClient` INT NOT NULL,
  PRIMARY KEY (`idFacture`),
  INDEX `fk_Achat_Client1_idx` (`idClient` ASC),
  CONSTRAINT `fk_Achat_Client1`
    FOREIGN KEY (`idClient`)
    REFERENCES `tp5php`.`Client` (`idClient`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tp5php`.`Categorie`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tp5php`.`Categorie`;
CREATE TABLE IF NOT EXISTS `tp5php`.`Categorie` (
  `idCategorie` INT NOT NULL AUTO_INCREMENT,
  `nomCategorie` VARCHAR(45) NULL,
  PRIMARY KEY (`idCategorie`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tp5php`.`Produit`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tp5php`.`Produit`;
CREATE TABLE IF NOT EXISTS `tp5php`.`Produit` (
  `codeArticle` VARCHAR(5) NOT NULL,
  `description` VARCHAR(45) NULL,
  `prix` INT NULL,
  `quantite` VARCHAR(45) NULL,
  `idCategorie` INT NOT NULL,
  PRIMARY KEY (`codeArticle`),
  INDEX `fk_Produit_Categorie1_idx` (`idCategorie` ASC),
  CONSTRAINT `fk_Produit_Categorie1`
    FOREIGN KEY (`idCategorie`)
    REFERENCES `tp5php`.`Categorie` (`idCategorie`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tp5php`.`LigneFacture`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `tp5php`.`LigneFacture`;
CREATE TABLE IF NOT EXISTS `tp5php`.`LigneFacture` (
  `idLigneFacture` INT NOT NULL AUTO_INCREMENT,
  `idFacture` INT NOT NULL,
  `quantiteAchat` VARCHAR(45) NULL,
  `codeArticle` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`idLigneFacture`, `idFacture`),
  INDEX `fk_LigneFacture_Produit1_idx` (`codeArticle` ASC),
  INDEX `fk_LigneFacture_Facture1_idx` (`idFacture` ASC),
  CONSTRAINT `fk_LigneFacture_Produit1`
    FOREIGN KEY (`codeArticle`)
    REFERENCES `tp5php`.`Produit` (`codeArticle`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_LigneFacture_Facture1`
    FOREIGN KEY (`idFacture`)
    REFERENCES `tp5php`.`Facture` (`idFacture`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

INSERT INTO Ville (nomVille) values ("Québec"),("Montreal"),("Gatineau");

INSERT INTO Client (nomClient,prenomClient,ageClient,courrielClient,adresse,idVille)
values ("Rodriguez", "Bender", 80, "bender@mail.com", "123 rue Verte", 2),("Pro", "Wanker", 80, "wanker@mail.com", "69 rue Natasha", 1);
 
INSERT INTO Categorie (nomCategorie) values ("Informatique"),("Livres"),("Logiciels");

INSERT INTO Produit (codeArticle,description,prix,quantite,idCategorie) 
values ("WIN81","Windows 8.1", 350,15,3),
("INW33","Installation Windows 8.1", 35,23,2),
("IBM70","Ordinateur IBM-7000", 990,11,1);

INSERT INTO Facture (dateFacture,idClient) values ("2014-08-08",2),("2014-05-05",1);

INSERT INTO LigneFacture (idLigneFacture,idFacture,quantiteAchat,codeArticle) values (1,1,2,"WIN81"),(2,1,3,"INW33");
INSERT INTO LigneFacture (idLigneFacture,idFacture,quantiteAchat,codeArticle) values (1,2,3,"WIN81"),(2,2,4,"INW33"),(3,2,2,"IBM70");


