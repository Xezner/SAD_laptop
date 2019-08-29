CREATE TABLE IF NOT EXISTS users(
id int  NOT NULL AUTO_INCREMENT,
username varchar(30) NOT NULL,
password varchar(30) NOT NULL,
fullname varchar(50) NOT NULL,
email varchar(100) NOT NULL,
contact varchar(30) NOT NULL,
admin bit(1) DEFAULT 0 NOT NULL,
PRIMARY KEY(id)
)


INSERT INTO users (id, username, password, fullname, email, contact, admin) VALUES
('', 'renzabueg', 'password', 'Renz Abueg', 'renzabueg@gmail.com', '09568868897', '1'),

/* non admin */
INSERT INTO users (id, username, password, fullname, email, contact) VALUES
('', 'shaymadamba', 'password', 'Shayneth Madamba', 'shaynethmadamba@gmail.com', '09157187085'),
('', 'kulit', 'password', 'Kulit Aso', 'kulit@gmail.com', '12345678910');


CREATE TABLE IF NOT EXISTS subjects(
id int  NOT NULL AUTO_INCREMENT,
course varchar(100) NOT NULL,
subjcode varchar(30) NOT NULL,
description varchar(100) NOT NULL,
units varchar(30) NOT NULL,
sections varchar(30) NOT NULL,
schedule varchar(50) NOT NULL,
PRIMARY KEY(id)
)

INSERT INTO subjects (id, course, subjcode, description, units, sections, schedule) VALUES
('', 'BSCOE', 'BSCOE-ELEC2', 'BSCOE ELECTIVE 2', '3', 'BSCOE 5-1', '');


CREATE TABLE IF NOT EXISTS schedules(
id int NOT NULL AUTO_INCREMENT,
profname varchar(50) NOT NULL,
subjname varchar(30) NOT NULL,
subjdesc varchar(100) NOT NULL,
sect varchar(30) NOT NULL,
sched varchar(30) NOT NULL,
PRIMARY KEY(id)
)

INSERT INTO schedules (id, profname, subjname, subjdesc, sect, sched)  VALUES 
('', 'Renz Abueg', 'BSCOE-ELEC2', 'BSCOE ELECTIVE 2', '3', 'W 1:00 AM to 1:00 AM');


CREATE TABLE IF NOT EXISTS dtr(
id int NOT NULL AUTO_INCREMENT,
name varchar(50) NOT NULL,
date_in varchar(30) NOT NULL,
time_in varchar(30) NOT NULL,
time_out varchar(30) NOT NULL,
work_hrs varchar(30) NOT NULL,
PRIMARY KEY(id)
)

INSERT INTO dtr (id, name, date_in, time_in, time_out, work_hrs) VALUES
('', 'renzabueg', '08/26/2019', '19:00', '20:00', '1');



