INSERT INTO `band` (name, image) VALUES ('Superdrag', NULL);

INSERT INTO `album` (title, image) VALUES ('Stereo 360 Sound', 'Superdrag-Stereo_360_Sound.jpg');

INSERT INTO `song` (title, release_date, duration, id_album, image, audio) 
VALUES ('Stereo 360 Sound', '1998-01-01 00:00:00', 0, 1, 'Superdrag-Stereo_360_Sound.jpg', NULL);

INSERT INTO `creer` (id_band, id_song) VALUES (1, 1);
