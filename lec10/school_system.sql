CREATE DATABASE school_system;

USE school_system;


CREATE TABLE Students (
	id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    email VARCHAR(255)
    birthdate date,
    address varchar(255),
    parent_phone_num varchar(12)
);


CREATE TABLE Instructors (
	id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    department varchar(255),
    salary double,
    address varchar(255),
    phone_num varchar(12)
);

CREATE TABLE Courses (
	id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    description varchar(255),
    instructor_id int,
    FOREIGN KEY (instructor_id) REFERENCES Instructors(id)
);

CREATE TABLE Enrollments (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT,
    course_id INT,
    FOREIGN KEY (student_id) REFERENCES Students(id),
    FOREIGN KEY (course_id) REFERENCES Courses(id)
);

INSERT INTO Students (name, birthdate, address, parent_phone_num, email) VALUES
('Ali Hassan', '2002-06-11', 'Cairo', '01213168412', 'ah@mail.com'),
('Sara Ahmed', '2003-04-18', 'Giza', '01099887411', 'sa@mail.com'),
('Mohaned Salah', '2001-10-23', 'Alexandria', '01588741236', 'ms@mail.com'),
('Omar Fathy', '2004-01-05', 'Mansoura', '01147896521', 'of@mail.com'),
('Reem Adel', '2002-12-12', 'Zagazig', '01277889456', 'ra@mail.com');

INSERT INTO Instructors (name, department, salary, address, phone_num) VALUES
('Dr. Mohamed Ali', 'Computer Science', 15000, 'Cairo', '01011223344'),
('Dr. Salma Ibrahim', 'Math', 14000, 'Giza', '01122334455'),
('Dr. Hany Saad', 'Physics', 13000, 'Alexandria', '01233445566');

INSERT INTO Courses (name, description, instructor_id) VALUES
('Intro to Programming', 'Learn programming basics', 1),
('Calculus I', 'Math course for beginners', 2),
('Physics I', 'Basic physics principles', 3),
('Data Structures', 'Core CS data structures', 1);

INSERT INTO Enrollments (student_id, course_id) VALUES
(1, 1),
(1, 4),
(2, 2),
(3, 1),
(3, 3),
(4, 4),
(5, 2),
(5, 3);




