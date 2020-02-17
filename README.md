# TestTask
Работа с таблицей 'user'.

Структура таблицы:
CREATE TABLE `user` (
	`id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20) NOT NULL,
	`lastName` VARCHAR(20),
	`email` VARCHAR(30),
	`createdAt` DATETIME NOT NULL,
	PRIMARY KEY (`id`)
) COLLATE='utf8mb4_unicode_ci' ENGINE=InnoDB;

![code coverage](https://github.com/SamAntUA/TestTask/raw/master/coverage.png)
