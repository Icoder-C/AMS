-- Active: 1712022328361@@127.0.0.1@3306@ams
USE ams

CREATE TABLE EmployeeTimeSheet (
    S_N INT AUTO_INCREMENT PRIMARY KEY,
    Date DATE,
    Check_In TIME,
    Check_Out TIME,
    Worked_Hours VARCHAR(10),
    Location VARCHAR(255),
    Latitude DECIMAL(9,6),
    Longitude DECIMAL(9,6)
);
INSERT INTO EmployeeTimeSheet (Date, Check_In, Check_Out, Worked_Hours, Location, Latitude, Longitude) VALUES
('2024-05-01', '08:00:00', '17:00:00', '9 hours', 'New York Office', 40.712776, -74.005974),
('2024-05-02', '08:00:00', '16:00:00', '8 hours', 'New York Office', 40.712776, -74.005974),
('2024-05-03', '08:00:00', '17:00:00', '9 hours', 'New York Office', 40.712776, -74.005974),
('2024-05-04', '08:30:00', '17:30:00', '9 hours', 'New York Office', 40.712776, -74.005974),
('2024-05-05', '08:00:00', '14:00:00', '6 hours', 'New York Office', 40.712776, -74.005974);
