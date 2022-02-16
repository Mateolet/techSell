create database if not exists techsell;
use techsell;


create table users (
	idUser int auto_increment primary key,
    name varchar(50),
    surname varchar(50),
    instagram varchar(50),
    facebook varchar(50),
    tel float
);

create table pub(
	idPub int auto_increment primary key,
    namePub varchar(50),
    imgPub tinytext,
    date datetime,
    estado boolean,
    idUser int,
	FOREIGN KEY (idUser) REFERENCES users(idUser)
 
);


select * from pub