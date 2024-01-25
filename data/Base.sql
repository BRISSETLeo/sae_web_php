CREATE TABLE IF NOT EXISTS `user`(
    `name_user` VARCHAR(30) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    'role' VARCHAR(30) NOT NULL DEFAULT 'user',
    PRIMARY KEY(`name`)
);

CREATE TABLE IF NOT EXISTS `playlist`(
    `id_playlist` INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    `name_playlist` VARCHAR(30) NOT NULL,
    `visibility` BOOLEAN NOT NULL DEFAULT 0,
    `owner_name` VARCHAR(30) NOT NULL,
    `image_playlist` BLOB,

    FOREIGN KEY(`owner_name`) REFERENCES `user`(`name`)
);

CREATE TABLE IF NOT EXISTS 'Artist'(
    'id_artist' INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    'name' VARCHAR(30) NOT NULL,
    'genre' VARCHAR(30) NOT NULL,
    'image_artist' BLOB
);

CREATE TABLE IF NOT EXISTS 'Band'(
    'id_band' INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    'name_band' VARCHAR(30) NOT NULL,
    'image_band' BLOB
);

CREATE TABLE IF NOT EXISTS 'Album'(
    'id_album' INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    'name' VARCHAR(30) NOT NULL,
    'image_album' BLOB,
);

CREATE TABLE IF NOT EXISTS 'Song'(
    'id_song' INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    'name' VARCHAR(30) NOT NULL,
    'genre' VARCHAR(30) NOT NULL,
    'release_date' DATE NOT NULL,
    'duration' INTEGER NOT NULL,
    'id_album' INTEGER,
    'id_band' INTEGER NOT NULL,
    'image_song' BLOB,
    'content' BLOB,

    FOREIGN KEY('id_band') REFERENCES 'Band'('id_band'),
    FOREIGN KEY('id_album') REFERENCES 'Album'('id_album')
);

CREATE TABLE IF NOT EXISTS 'Song_Artist'(
    'id_song' INTEGER NOT NULL,
    'id_band' INTEGER NOT NULL,
    'date' DATE NOT NULL,
    PRIMARY KEY('id_song', 'id_artist'),
    FOREIGN KEY('id_song') REFERENCES 'Song'('id_song'),
    FOREIGN KEY('id_band') REFERENCES 'Artist'('id_band')
);

CREATE TABLE IF NOT EXISTS 'Song_Playlist'(
    'id_song' INTEGER NOT NULL,
    'id_playlist' INTEGER NOT NULL,
    'date' DATE NOT NULL,
    PRIMARY KEY('id_song', 'id_playlist'),
    FOREIGN KEY('id_song') REFERENCES 'Song'('id_song'),
    FOREIGN KEY('id_playlist') REFERENCES 'Playlist'('id_playlist')
);



