create database if not exists cours;
use cours;

create table if not exists docs (
id int not null auto_increment primary key,
ar_name varchar(200),
article text
)
engine=myisam;

create table if not exists dsssl_xsl (
id int not null auto_increment primary key,
ar_name varchar(200),
article text
)
engine=myisam;

create table if not exists css (
id int not null auto_increment primary key,
ar_name varchar(200),
article text
)
engine=myisam;

create table if not exists web_docs (
id int not null auto_increment primary key,
ar_name varchar(200),
article text
)
engine=myisam;