CREATE TABLE IF NOT EXISTS `user` (
    `name_user` VARCHAR(30) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `role` VARCHAR(30) NOT NULL DEFAULT 'user',
    PRIMARY KEY(`name_user`)
);

CREATE TABLE IF NOT EXISTS `playlist` (
    `id_playlist` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `name_playlist` VARCHAR(30) NOT NULL,
    `visibility` BOOLEAN NOT NULL DEFAULT 0,
    `owner_name` VARCHAR(30) NOT NULL,
    `image_playlist` LONGBLOB,
    FOREIGN KEY(`owner_name`) REFERENCES `user`(`name_user`)
);

CREATE TABLE IF NOT EXISTS `artist` (
    `id_artist` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `name` VARCHAR(30) NOT NULL,
    `genre` VARCHAR(30) NOT NULL,
    `image_artist` LONGBLOB
);

CREATE TABLE IF NOT EXISTS `band` (
    `id_band` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `name_band` VARCHAR(30) NOT NULL,
    `image_band` LONGBLOB
);

CREATE TABLE IF NOT EXISTS `album` (
    `id_album` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `name` VARCHAR(30) NOT NULL,
    `image_album` LONGBLOB
);

CREATE TABLE IF NOT EXISTS `song` (
    `id_song` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `name` VARCHAR(30) NOT NULL,
    `genre` VARCHAR(30) NOT NULL,
    `release_date` DATE NOT NULL,
    `duration` INTEGER NOT NULL,
    `id_album` INTEGER,
    `id_band` INTEGER NOT NULL,
    `image_song` LONGBLOB,
    `content` LONGBLOB,
    FOREIGN KEY(`id_band`) REFERENCES `band`(`id_band`),
    FOREIGN KEY(`id_album`) REFERENCES `album`(`id_album`)
);

CREATE TABLE IF NOT EXISTS `song_artist` (
    `id_song` INTEGER NOT NULL,
    `id_artist` INTEGER NOT NULL,
    `date` DATE NOT NULL,
    PRIMARY KEY(`id_song`, `id_artist`),
    FOREIGN KEY(`id_song`) REFERENCES `song`(`id_song`),
    FOREIGN KEY(`id_artist`) REFERENCES `artist`(`id_artist`)
);

CREATE TABLE IF NOT EXISTS `song_playlist` (
    `id_song` INTEGER NOT NULL,
    `id_playlist` INTEGER NOT NULL,
    `date` DATE NOT NULL,
    PRIMARY KEY(`id_song`, `id_playlist`),
    FOREIGN KEY(`id_song`) REFERENCES `song`(`id_song`),
    FOREIGN KEY(`id_playlist`) REFERENCES `playlist`(`id_playlist`)
);
