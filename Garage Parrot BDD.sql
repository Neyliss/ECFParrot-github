-- Création de la base de données
CREATE DATABASE "GarageParrot"
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LC_COLLATE = 'C'
    LC_CTYPE = 'C'
    TABLESPACE = pg_default
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;


-- Table pour stocker les employés 
CREATE TABLE Employes (
    id UUID NOT NULL PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prénom VARCHAR(50) NOT NULL,
    administrateur BOOLEAN DEFAULT false -- Ajoute d'un "administrateur"
);

-- Table pour stocker les véhicules du site
CREATE TABLE Vehicules (
    id UUID NOT NULL PRIMARY KEY,
    modele VARCHAR(255) NOT NULL,
    marque VARCHAR(255) NOT NULL,
    prix INT,
    kilomètre INT
);

-- Employé GENS Jean
INSERT INTO Employes (nom, mot_de_passe, email)
VALUES ('Jean GENS', 'MotDePasse1', 'jean.gens@example.com');

-- Employé BAF Fab
INSERT INTO Employes (nom, mot_de_passe, email)
VALUES ('Fab BAF', 'MotDePasse2', 'fab.baf@example.com');

-- Employé Nono Dodo
INSERT INTO Employes (nom, mot_de_passe, email)
VALUES ('Nono Dodo', 'MotDePasse3', 'nono.dodo@example.com');

-- Administrateur Vincent Parrot
INSERT INTO Employes (nom, mot_de_passe, email, administrateur)
VALUES ('Vincent Parrot', 'MotDePasseAdmin1', 'vincent.parrot@example.com', true);

GRANT SELECT, INSERT, UPDATE, DELETE ON TABLE Vehicules TO "Vincent Parrot";

-- Créer une table pour stocker les informations collectées à partir du formulaire
CREATE TABLE contact (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    commentaire TEXT
);



