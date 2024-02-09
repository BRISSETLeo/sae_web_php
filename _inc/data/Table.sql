CREATE TABLE IF NOT EXISTS `user` (
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    fonction VARCHAR(255) NOT NULL DEFAULT 'user',
    current_id INT,
    current_type VARCHAR(255),
    current_musique INT,
    current_time INT,
    PRIMARY KEY (username)
);

CREATE TABLE IF NOT EXISTS `playlist` (
    `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `name` VARCHAR(255) NOT NULL,
    'description' VARCHAR(255) NOT NULL,
    `visibility` BOOLEAN NOT NULL DEFAULT 0,
    `owner` VARCHAR(255) NOT NULL,
    `image` LONGBLOB,
    FOREIGN KEY(`owner`) REFERENCES `user`(`username`)
);

CREATE TABLE IF NOT EXISTS `album` (
    `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `image` LONGBLOB
);

CREATE TABLE IF NOT EXISTS `song` (
    `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `title` VARCHAR(255) NOT NULL,
    `release_date` DATE NOT NULL,
    `duration` INT NOT NULL,
    `id_album` INT,
    `image` LONGBLOB,
    `audio` LONGBLOB,
    FOREIGN KEY(`id_album`) REFERENCES `album`(`id`)
);

CREATE TABLE IF NOT EXISTS `note` (
    `id_song` INT NOT NULL,
    `username` VARCHAR(255) NOT NULL,
    `note` INT NOT NULL,
    PRIMARY KEY(`id_song`, `username`),
    FOREIGN KEY(`id_song`) REFERENCES `song`(`id`),
    FOREIGN KEY(`username`) REFERENCES `user`(`username`)
);

CREATE TABLE IF NOT EXISTS `band` (
    `id` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `name` VARCHAR(255) NOT NULL,
    `image` LONGBLOB
);

CREATE TABLE IF NOT EXISTS `creer` (
    `id_band` INT NOT NULL,
    `id_song` INT NOT NULL,
    PRIMARY KEY(`id_song`, `id_band`),
    FOREIGN KEY(`id_song`) REFERENCES `song`(`id`),
    FOREIGN KEY(`id_band`) REFERENCES `band`(`id`)
);