CREATE DATABASE "AMS"
    WITH
    OWNER = postgres
    ENCODING = 'UTF8'
    LOCALE_PROVIDER = 'libc'
    CONNECTION LIMIT = -1
    IS_TEMPLATE = False;

CREATE TABLE users (
  user_id SERIAL NOT NULL PRIMARY KEY,
  email VARCHAR(30) UNIQUE,
  name VARCHAR(40),
  type VARCHAR(5),
  password VARCHAR(255)
);

INSERT INTO users(email, name, type, password)
VALUES ('test1@gmail.com', 'Roshan Phuyal', 'admin', '123');

INSERT INTO users(email, name, type, password)
VALUES ('user1@gmail.com', 'User Name', 'user', '123');

SELECT *
FROM users;