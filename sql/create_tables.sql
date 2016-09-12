SET foreign_key_checks = 0;
DROP TABLE IF EXISTS Users;
SET foreign_key_checks = 1;

/**Table creation*/

CREATE TABLE Users(
	userName varchar(20),
    password varChar(128) NOT NULL,
	salt varChar(16) NOT NULL,
    address varchar(40),
    PRIMARY KEY (userName)
);

/**Test user*/

INSERT INTO Users VALUES('SvenTheKingXXX', 'pw', '1111111111111111', 'gangsterstreet 69');