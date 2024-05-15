DROP DATABASE AMS;
-- Active: 1712022328361@@127.0.0.1@3306@ams
TRUNCATE TABLE users_temp;

CREATE DATABASE AMS;

USE AMS;

CREATE TABLE users_temp (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(40),
    email VARCHAR(40) UNIQUE,
    role ENUM("ADMIN", "USER") DEFAULT "USER",
    appointment_date DATE,
    phone_number INT UNIQUE,
    password VARCHAR(255)
);

CREATE TABLE users (
    user_id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(40),
    email VARCHAR(40) UNIQUE,
    role ENUM("ADMIN", "USER") DEFAULT "USER",
    status VARCHAR(10),
    phone_number INT UNIQUE,
    address VARCHAR(60),
    DOB DATE,
    gender VARCHAR(8),
    maritial_status VARCHAR(10),
    emergency_contact_person VARCHAR(40),
    emergency_contact INT,
    department VARCHAR(30),
    position VARCHAR(20),
    rate FLOAT,
    supervisor VARCHAR(40),
    appointment_date DATE,
    working_status VARCHAR(10),
    password VARCHAR(255),
    PRIMARY KEY (user_id)
);

SELECT * FROM users_temp;