CREATE DATABASE  gestion_formation;
-- Create the database

USE gestion_formation;

-- Create the formateur table
CREATE TABLE IF NOT EXISTS formateur (
    id_formateur INT NOT NULL AUTO_INCREMENT,
    nom_formateur VARCHAR(50) NOT NULL,
    prenom_formateur VARCHAR(50) NOT NULL,
    email_formateur VARCHAR(100) NOT NULL,
    password_formateur VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_formateur)
);


-- Create the apprenant table
CREATE TABLE IF NOT EXISTS apprenant (
    id_app INT NOT NULL AUTO_INCREMENT,
    nom_app VARCHAR(50) NOT NULL,
    prenom_app VARCHAR(50) NOT NULL,
    email_app VARCHAR(100) NOT NULL,
    password_app VARCHAR(255) NOT NULL,
    PRIMARY KEY (id_app)
);

-- Create the apprenant_session table
CREATE TABLE IF NOT EXISTS apprenant_session (
    resultat FLOAT NOT NULL,
    date_eval DATE NOT NULL,
    id_app INT NOT NULL,
    id_session INT NOT NULL,
    PRIMARY KEY (id_app, id_session) 
);

-- Create the formation table
CREATE TABLE IF NOT EXISTS formation (
    id_formation INT NOT NULL AUTO_INCREMENT,
    categorie VARCHAR(50) NOT NULL,
    sujet VARCHAR(100) NOT NULL,
    masse_horraire INT NOT NULL,
    description TEXT NOT NULL,
    PRIMARY KEY (id_formation)
);
-- Create the session table
CREATE TABLE IF NOT EXISTS session (
    id_session INT NOT NULL AUTO_INCREMENT,
    date_debut DATE NOT NULL,
    date_fin DATE NOT NULL,
    nombre_place_maxi INT NOT NULL,
    etat VARCHAR(20) NOT NULL,
    id_formation INT NOT NULL,
    id_formateur INT NOT NULL,
    PRIMARY KEY (id_session),
    FOREIGN KEY (id_formation) REFERENCES formation(id_formation),
    FOREIGN KEY (id_formateur) REFERENCES formateur(id_formateur)
);