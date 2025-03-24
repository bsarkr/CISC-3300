--create in_class_17 database
CREATE DATABASE `in_class_17`;

-- create users table
CREATE TABLE `users`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `name`      varchar(80) NOT NULL,
    `commentID` int(11) NOT NULL,
    primary key (`id`)
);

-- create user comments table, student has one
CREATE TABLE `userComments`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `comment`   varchar(254) NOT NULL,
--     foreign key
    `userID` int(11) NOT NULL,
    primary key (`id`)
);

insert into users (name, commentID)
values ('Bethany Shaw', 1);
insert into users (name, commentID)
values ('Sheri Fitzgerald', 2);
insert into users (name, commentID)
values ('Patrick Burgess', 3);
insert into users (name, commentID)
values ('Chester Orourke', 4);

insert into userComments (address, state, userID)
values ('HELLO!', 1);
insert into userComments (address, state, userID)
values ('BYE!', 2);
insert into userComments (address, state, userID)
values ('HELLO WORLD', 3);
insert into userComments (address, state, userID)
values ('THIS WORKS???', 4);

select * from users left join userComments on users.id = userComments.userID;

select * from users join userComments on users.id = usercomments.studentID;