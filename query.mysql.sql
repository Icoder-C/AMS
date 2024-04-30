-- Active: 1712022328361@@127.0.0.1@3306@ams
CREATE DATABASE AMS;

USE AMS;
CREATE TABLE users(
    user_id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(40),
    email VARCHAR(40) UNIQUE,
    role VARCHAR(5),
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
    PRIMARY KEY(user_id)
);
INSERT INTO users(email, name, role, password,working_status)
VALUES ('test1@gmail.com', 'Roshan Phuyal', 'admin', '123', 'active');

INSERT INTO users(email, name, role, password,working_status)
VALUES ('user1@gmail.com', 'Employee One', 'user', '123','active');

SELECT *
FROM users;

DROP DATABASE AMS;