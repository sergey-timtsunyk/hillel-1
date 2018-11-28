
CREATE DATABASE test;
USE test;

CREATE TABLE user (
    id int NOT NULL AUTO_INCREMENT,
    last_name varchar(255),
    first_name varchar(255) DEFAULT NULL,
    address varchar(255),
    city varchar(255),
    PRIMARY KEY (id)
);


INSERT INTO profile (last_name, first_name, address, city)
VALUES ('Pety', 'Alexeev', 'Horca', 'Kiev');

INSERT INTO profile (last_name, first_name, address, city)
VALUES ('Виктор', 'Андреев', 'Хрещатик', 'Kiev');


UPDATE profile
SET
  last_name = 'Andreev',
  first_name = 'Viktor',
  city = 'Lviv'
WHERE id = 4;

DELETE FROM profile WHERE first_name = 'Viktor';


SELECT * FROM profile;

SELECT last_name, first_name, city FROM profile WHERE city = 'Kiev';

SELECT last_name, first_name, city
FROM profile
WHERE first_name is NULL;