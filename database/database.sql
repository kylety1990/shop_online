# CREACION DE LAS TABLAS DE NUESTRA BASE DE DATOS

CREATE DATABASE shop_online;
use shop_online;

# TABLA DE USERS
CREATE TABLE users(
id int(255) AUTO_INCREMENT not null,
name varchar(255) not null,
surname varchar(255) not null,
email varchar(255) not null,
password varchar(255) not null,
rol varchar(20),
image varchar(255),
CONSTRAINT pk_users PRIMARY KEY (id),
CONSTRAINT uq_email UNIQUE (email)
)ENGINE= InnoDb;

# DATOS EN USERS
INSERT INTO users VALUES (null, 'admin', 'admin', 'admin@shoponline.com', 'admin', 'admin', null);
INSERT INTO users VALUES (null, 'christian', 'albano', 'calbanogo@gmail.com', 'cristian', 'user', null);
INSERT INTO users VALUES (null, 'sara', 'guillem', 'saraguillem@hotmail.com', 'sarawapa', 'user', null);

# TABLA DE CATEGORIES
CREATE TABLE categories(
id int(255) AUTO_INCREMENT not null,
name varchar(255) not null,
CONSTRAINT pk_categories PRIMARY KEY (id)
)ENGINE= InnoDb;

# DATOS PARA CATEGORIES

INSERT INTO categories VALUES (null, 'ropa');
INSERT INTO categories VALUES (null, 'calzado');
INSERT INTO categories VALUES (null, 'accesorios');

# TABLA DE PRODUCTS
CREATE TABLE products(
id int(255) AUTO_INCREMENT not null,
category_id int(255) not null,
name varchar(255) not null,
description text ,
price float (100,2) not null,
password varchar(255) not null,
rol varchar(20),
image varchar(255),
CONSTRAINT pk_users PRIMARY KEY (id),
CONSTRAINT uq_email UNIQUE (email)
)ENGINE= InnoDb;