CREATE DATABASE Magazzino;
USE Magazzino;

CREATE TABLE oggetti(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    quantita INT(8)
);


