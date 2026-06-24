CREATE DATABASE sistema_crud;
 
USE sistema_crud;
 
CREATE TABLE clientes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(120) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    cidade VARCHAR(80) NOT NULL
);