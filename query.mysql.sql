DROP DATABASE AMS;
-- Active: 1716020162294@@127.0.0.1@3306@ams
TRUNCATE TABLE users_temp;

CREATE DATABASE AMS;

USE AMS;

CREATE TABLE users_temp (
    EmployeeID INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(40),
    email VARCHAR(40) UNIQUE,
    role ENUM("ADMIN", "USER") DEFAULT "USER",
    appointment_date DATE,
    phone_number VARCHAR(10),
    password VARCHAR(255)
);

CREATE TABLE users (
    EmployeeID INT AUTO_INCREMENT NOT NULL,
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
    emergency_contact VARCHAR(10),
    department VARCHAR(30),
    position VARCHAR(20),
    rate FLOAT,
    supervisor VARCHAR(40),
    appointment_date DATE,
    checkIn TIME,
    checkOut TIME,
    photo_name VARCHAR(255),
    working_status VARCHAR(10),
    password VARCHAR(255),
    PRIMARY KEY (EmployeeID)
);
CREATE TABLE office(
    officeID INT AUTO_INCREMENT PRIMARY KEY,
    OfficeName VARCHAR(50) ,
    DateOfEstablishment DATE,
    Latitude VARCHAR(20),
    Longitude VARCHAR(20)
);

-- DROP TABLE Attendance;

CREATE TABLE Attendance (
    AttendanceID INT AUTO_INCREMENT PRIMARY KEY,
    EmployeeID INT NOT NULL,
    AttendanceDate DATE NOT NULL,
    CheckInTime TIME,
    CheckOutTime TIME,
    latitude VARCHAR(20),
    longitude VARCHAR(20),
    Status VARCHAR(50),
    UNIQUE (EmployeeID, AttendanceDate), -- Unique constraint to ensure one record per employee per day
    FOREIGN KEY (EmployeeID) REFERENCES users(EmployeeID) ON DELETE CASCADE
);
CREATE TABLE EmployeeLeave (
    LeaveID INT AUTO_INCREMENT PRIMARY KEY,
    EmployeeID INT NOT NULL,
    LeaveType VARCHAR(50) NOT NULL,
    StartDate DATE NOT NULL,
    EndDate DATE NOT NULL,
    Notes TEXT,
    Status VARCHAR(50),
    FOREIGN KEY (EmployeeID) REFERENCES users(EmployeeID) ON DELETE CASCADE
);

INSERT INTO
    office (OfficeName, DateOfEstablishment,Latitude, Longitude)
VALUES (
        'A.M.S Pvt. Ltd.',
        NOW(),
        '23',
        '123'
    );

SELECT * FROM office;
SELECT * FROM users;


SELECT * FROM Attendance
WHERE NULL;

SELECT COALESCE(0,1);
SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE users;
TRUNCATE TABLE users_temp;
TRUNCATE TABLE office;
TRUNCATE TABLE Attendance;
TRUNCATE TABLE EmployeeLeave;
SET FOREIGN_KEY_CHECKS = 1;