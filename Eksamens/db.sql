CREATE DATABASE eksamens;

USE eksamens;


CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    number  VARCHAR(255) NOT NULL,
    gender VARCHAR(255) NOT NULL,
    age VARCHAR(255) NOT NULL,
    date_of_birth VARCHAR(255) NOT NULL,
    image VARCHAR(255) NOT NULL

);