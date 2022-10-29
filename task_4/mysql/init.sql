CREATE DATABASE IF NOT EXISTS appDB;
CREATE USER IF NOT EXISTS 'user'@'%' IDENTIFIED BY 'password';
GRANT SELECT, UPDATE, INSERT, DELETE ON appDB.* TO 'user'@'%';
FLUSH PRIVILEGES;

USE appDB;

SET NAMES UTF8;
SET CHARACTER SET UTF8;

CREATE TABLE IF NOT EXISTS auth
(
    ID       INT(11)     NOT NULL AUTO_INCREMENT,
    login    VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(40) NOT NULL,
    PRIMARY KEY (ID)
);

INSERT INTO auth (login, password)
VALUES ('user', '{SHA}W6ph5Mm5Pz8GgiULbPgzG37mj9g=');

CREATE TABLE IF NOT EXISTS cars
(
    id             INT(18)      NOT NULL AUTO_INCREMENT,
    name           VARCHAR(20)  NOT NULL,
    color          VARCHAR(200) NOT NULL,
    in_stock_count INT(18)      NOT NULL,
    PRIMARY KEY (id)
) CHARACTER SET = 'utf8';

INSERT INTO cars(name, color, in_stock_count)
VALUES ('Bugatti', 'Black', 5),
       ('Ferrari', 'Red', 3),
       ('Lada', 'Green', 50),
       ('Kia Rio', 'White', 17);

CREATE TABLE IF NOT EXISTS services
(
    id       INT(18)           NOT NULL AUTO_INCREMENT,
    name     VARCHAR(255)        NOT NULL,
    price    DECIMAL(19, 2) NOT NULL,
    currency CHAR(3)        NOT NULL,
    PRIMARY KEY (id)
) CHARACTER SET = 'utf8';

INSERT INTO services(name, price, currency)
VALUES ('Тех осмотр', 5000, 'RUB'),
       ('Замена резины', 3000, 'RUB'),
       ('Замена масла', 2000, 'RUB');
