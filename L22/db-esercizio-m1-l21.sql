CREATE DATABASE EserciziSQL;
USE EserciziSQL;

CREATE TABLE utenti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    eta INT,
    citta VARCHAR(50),
    email VARCHAR(100)
);

INSERT INTO utenti (nome, eta, citta, email) VALUES
('Mario Rossi', 35, 'Roma', 'mario.rossi@gmail.com'),
('Luisa Bianchi', 28, 'Milano', 'luisa.bianchi@hotmail.com'),
('Paolo Verdi', 42, 'Napoli', 'paolo.verdi@yahoo.com'),
('Anna Neri', 25, 'Roma', 'anna.neri@gmail.com'),
('Giulia Blu', 30, 'Firenze', 'giulia.blu@outlook.com'),
('Marco Gialli', 45, 'Torino', 'marco.gialli@gmail.com');

CREATE TABLE prodotti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    prezzo DECIMAL(10, 2),
    categoria VARCHAR(50),
    disponibile BOOLEAN
);

INSERT INTO prodotti (nome, prezzo, categoria, disponibile) VALUES
('Laptop PRO', 999.99, 'Elettronica', TRUE),
('Smartphone X', 699.50, 'Elettronica', TRUE),
('Tavolo Legno', 199.90, 'Arredamento', TRUE),
('Sedia Ergonomica', 129.99, 'Arredamento', FALSE),
('Monitor 24"', 179.00, 'Elettronica', TRUE),
('Cuffie Bluetooth', 89.99, 'Elettronica', TRUE);

CREATE TABLE ordini (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utente_id INT,
    prodotto_id INT,
    data_ordine DATE,
    quantita INT,
    totale DECIMAL(10, 2),
    FOREIGN KEY (utente_id) REFERENCES utenti(id),
    FOREIGN KEY (prodotto_id) REFERENCES prodotti(id)
);

INSERT INTO ordini (utente_id, prodotto_id, data_ordine, quantita, totale) VALUES
(1, 1, '2025-01-01', 1, 999.99),
(2, 2, '2025-01-02', 2, 1399.00),
(3, 4, '2025-01-03', 1, 129.99),
(4, 5, '2025-01-04', 1, 179.00),
(5, 6, '2025-01-05', 3, 269.97);

CREATE TABLE citta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50),
    popolazione INT,
    regione VARCHAR(50)
);

INSERT INTO citta (nome, popolazione, regione) VALUES
('Roma', 2873000, 'Lazio'),
('Milano', 1396000, 'Lombardia'),
('Napoli', 967000, 'Campania'),
('Torino', 870000, 'Piemonte'),
('Firenze', 382000, 'Toscana');
