CREATE DATABASE `homework8`;

USE `homework8`;

CREATE TABLE `notes`
(
    `id`        int(11) NOT NULL AUTO_INCREMENT,
    `title`      varchar(80) NOT NULL,
    `description` TEXT NOT NULL,
    primary key (`id`)
);

INSERT INTO notes (title, description) VALUES 
('Note 1', 'hellloooo im doing my homework yayy'),
('Note 2', 'this is a description hazaa!'),
('Note 3', 'hi Prof. Hishon I hope you`re having a great night!'),
('Note 4', 'this is another description awsome!!');

UPDATE notes
SET title = 'Updated Note 2', description = 'This is still a description... but updated!'
WHERE id = 2;

DELETE FROM notes WHERE id = 4;

SELECT * FROM notes
ORDER BY title DESC;

SELECT * FROM notes
LIMIT 1 OFFSET 1;

SELECT * FROM notes
WHERE description REGEXP '[aeiouAEIOU]';