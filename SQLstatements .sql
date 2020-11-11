CREATE DATABASE flowerpower;

USE flowerpower;

CREATE TABLE Klant (
    klantcode INT NOT NULL AUTO_INCREMENT,
    voorletters VARCHAR(255) NOT NULL,
    tussenvoegsel VARCHAR(255),
    achternaam VARCHAR(255) NOT NULL,
    adres VARCHAR(255) NOT NULL,
    postcode VARCHAR(255) NOT NULL,
    woonplaats VARCHAR(255) NOT NULL,
    geboortedatum DATE NOT NULL,
    gebruikersnaam VARCHAR(255) NOT NULL,
    wachtwoord VARCHAR(255) NOT NULL,
    PRIMARY KEY(klantcode)
);

CREATE TABLE factuur (
    factuurnummer INT NOT NULL AUTO_INCREMENT,
    factuurdatum DATE NOT NULL,
    klant_klantcode INT NOT NULL,
    FOREIGN KEY (klant_klantcode) REFERENCES klant(klantcode),
    PRIMARY KEY(factuurnummer)
);

CREATE TABLE artikel (
    artikelcode INT NOT NULL AUTO_INCREMENT,
    artikel VARCHAR(255) NOT NULL,
    prijs DECIMAL NOT NULL,
    PRIMARY KEY(artikelcode)
);

CREATE TABLE factuurregel (
    factuurnummer INT NOT NULL AUTO_INCREMENT,
    aantal INT NOT NULL,
    pijs INT NOT NULL,
    factuur_factuurnummer INT NOT NULL,
    artikel_artikelcode INT NOT NULL,
    FOREIGN KEY (factuur_factuurnummer) REFERENCES factuur(factuurnummer),
    FOREIGN KEY (artikel_artikelcode) REFERENCES artikel(artikelcode),
    PRIMARY KEY(factuurnummer)
);


CREATE TABLE winkel (
    winkelcode INT NOT NULL AUTO_INCREMENT,
    winkelnaam VARCHAR(255) NOT NULL,
    winkeladres VARCHAR(255) NOT NULL,
    winkelpostcode VARCHAR(255) NOT NULL,
    winkelplaats VARCHAR(255) NOT NULL,
    telefoonnummer VARCHAR(255) NOT NULL,
    PRIMARY KEY(winkelcode)
);

CREATE TABLE medewerkers (
    medewerkerscode INT NOT NULL AUTO_INCREMENT,
    voorletters VARCHAR(255) NOT NULL,
    voorvoegsel VARCHAR(255),
    achternaam VARCHAR(255) NOT NULL,
    gebruikersnaam VARCHAR(255) NOT NULL,
    wachtwoord VARCHAR(255) NOT NULL,
    PRIMARY KEY(medewerkerscode)
);

CREATE TABLE bestelling (
    aantal INT NOT NULL AUTO_INCREMENT,
    afgehaald DATE NOT NULL,
    winkel_winkelcode INT NOT NULL,
    medewerkers_medewerkerscode INT NOT NULL,
    klant_klantcode INT NOT NULL,
    artikel_artikelcode INT NOT NULL,
    FOREIGN KEY (winkel_winkelcode) REFERENCES winkel(winkelcode),
    FOREIGN KEY (medewerkers_medewerkerscode) REFERENCES medewerkers(medewerkerscode),
    FOREIGN KEY (klant_klantcode) REFERENCES klant(klantcode),
    FOREIGN KEY (artikel_artikelcode) REFERENCES artikel(artikelcode),
    PRIMARY KEY(aantal)
);








