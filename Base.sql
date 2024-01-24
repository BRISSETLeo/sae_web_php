CREATE TABLE IF NOT EXISTS `user`(
    `name` VARCHAR(30) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    PRIMARY KEY(`name`)
);

CREATE TABLE IF NOT EXISTS `playlist`(
    `id_playlist` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `visibility` BOOLEAN NOT NULL DEFAULT 0,
    `image_playlist` BLOB,
    `owner_name` VARCHAR(30) NOT NULL,
    FOREIGN KEY(`owner_name`) REFERENCES `user`(`name`)
);
