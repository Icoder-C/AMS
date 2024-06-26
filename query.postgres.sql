-- Active: 1713004242853@@127.0.0.1@5432@postgres
CREATE DATABASE AMS
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LOCALE_PROVIDER = 'libc'
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;

DROP DATABASE AMS;


USE AMS;

CREATE TABLE users_temp (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(40),
    email VARCHAR(40) UNIQUE,
    role ENUM("ADMIN", "USER") DEFAULT "USER",
    appointment_date DATE,
    phone_number VARCHAR(10),
    password VARCHAR(255)
);

CREATE TABLE users (
    user_id INT AUTO_INCREMENT NOT NULL,
    name VARCHAR(40),
    email VARCHAR(40) UNIQUE,
    role ENUM("ADMIN", "USER") DEFAULT "USER",
    status VARCHAR(10),
    phone_number VARCHAR(10),
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

INSERT INTO
    users_temp (email, name, type, password)
VALUES (
        'test1@gmail.com',
        'Roshan Phuyal',
        'admin',
        '123'
    ),
    (
        'user1@gmail.com',
        'User Name',
        'user',
        '123'
    );

SELECT * FROM users_temp;