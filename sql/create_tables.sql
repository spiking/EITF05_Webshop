SET foreign_key_checks = 0;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS LoginAttempts;
DROP TABLE IF EXISTS Reviews;
SET foreign_key_checks = 1;

CREATE TABLE Users(
	userName varchar(20),
    password varChar(255) NOT NULL,
    address varchar(40),
    PRIMARY KEY (userName)
);

CREATE TABLE LoginAttempts(
	IP varchar(45),
    attempts int(10) NOT NULL,
    failTime DATETIME DEFAULT NULL,
    PRIMARY KEY (IP)
);

CREATE TABLE Reviews(
	id int AUTO_INCREMENT,
	user varchar(20) NOT NULL,
	review varchar(10000) NOT NULL,
	PRIMARY KEY (id)
);
