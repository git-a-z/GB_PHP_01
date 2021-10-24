DROP DATABASE IF EXISTS gb_php_az;
CREATE DATABASE gb_php_az;
USE gb_php_az;

DROP TABLE IF EXISTS gb_php_az.comments;
CREATE TABLE gb_php_az.comments (
	id SERIAL PRIMARY KEY,
	username VARCHAR(50) NOT NULL DEFAULT 'Аноним',
	comment VARCHAR(255) NOT NULL,
	time_of_creation DATETIME DEFAULT NOW()
) COMMENT 'Отзывы';

INSERT INTO gb_php_az.comments (comment, time_of_creation) VALUES
	('Отзыв 1', NOW()),
	('Отзыв 2', NOW() + 1),
	('Отзыв 3', NOW() + 2),
	('Отзыв 4', NOW() + 3);