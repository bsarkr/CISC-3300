--uses phpmyadmin in mamp
--can also try mysqlworkbench

CREATE DATABASE 'CatLawyers';

CREATE TABLE 'Lawyers'
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `name`      varchar(80) NOT NULL,
    `addressID` int(11) NOT NULL,
    primary key (`id`)
)


insert into Lawyers(name, addressID)
values('Larry', 1);

insert into Lawyers(name, addressID)
values('Cheetos', 2);

insert into Lawters(name, addressID)
values('Oreo', 3);



