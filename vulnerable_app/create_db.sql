-- fichier : create_db.sql
CREATE DATABASE vulnerable_db;

USE vulnerable_db;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    address VARCHAR(255),
    dob DATE,
    social_security_number VARCHAR(20)
);

INSERT INTO users (username, password, address, dob, social_security_number) VALUES
('alice', 'pass123', '123 rue des Lilas', '1995-03-12', '123-45-6789'),
('tito', 'tito', '5 rue des parisiens', '2004-02-07', '222-44-999'),
('bob', 'bobpass', '42 avenue du Général', '1988-07-24', '987-65-4321'),
('charlie', 'charliepwd', '56 boulevard Haussmann', '1992-11-05', '555-44-3333');
