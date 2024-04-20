-- Active: 1712022328361@@127.0.0.1@3306@ams
CREATE DATABASE AMS;

CREATE TABLE users(
    user_id int AUTO_INCREMENT NOT NULL,
    name VARCHAR(40),
    email VARCHAR(40) UNIQUE,
    type VARCHAR(5),
    password VARCHAR(255),
    PRIMARY KEY(user_id)
);
INSERT INTO users(email, name, type, password)
VALUES ('test1@gmail.com', 'Roshan Phuyal', 'admin', '123');

INSERT INTO users(email, name, type, password)
VALUES ('user1@gmail.com', 'User Name', 'user', '123');

SELECT *
FROM users;