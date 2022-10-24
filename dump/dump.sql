SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS song_database;
USE song_database;

CREATE TABLE IF NOT EXISTS `User` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `username` varchar(256) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE (`email`),
  UNIQUE (`username`)
);

CREATE TABLE IF NOT EXISTS `Album` (
  `album_id` int NOT NULL AUTO_INCREMENT,
  `Judul` varchar(64) NOT NULL,
  `Penyanyi` varchar(128) NOT NULL,
  `Total_duration` int NOT NULL,
  `Image_path` varchar(256) NOT NULL,
  `Tanggal_terbit` date NOT NULL,
  `Genre` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`album_id`)
);

CREATE TABLE IF NOT EXISTS `Song` (
  `song_id` int NOT NULL AUTO_INCREMENT,
  `Judul` varchar(64) NOT NULL,
  `Penyanyi` varchar(128) DEFAULT NULL,
  `Tanggal_terbit` date NOT NULL,
  `Genre` varchar(64) DEFAULT NULL,
  `Duration` int NOT NULL,
  `Audio_path` varchar(256) NOT NULL,
  `Image_path` varchar(256) DEFAULT NULL,
  `album_id` int DEFAULT NULL,
  PRIMARY KEY (`song_id`),
  FOREIGN KEY (`album_id`) REFERENCES `Album`(`album_id`)
);

INSERT INTO `User` (`email`, `password`, `username`, `isAdmin`) VALUES
('rizkysaulafan@gmail.com', '$2y$10$luYHB8NjJfY6d17i8to/9O5mObiuOjbY8LeqvMYlLvKezh43igcGS', 'rizkysaulafan', 1),
('randomuser@gmail.com', '$2y$10$jXKli50oWBGO/6zQIMMnv.wlQltLb6dgIP4oIPkuADkDHyG4NCCTK', 'anonimus', 0);

INSERT INTO `Album` (`Judul`, `Penyanyi`, `Total_duration`, `Image_path`, `Tanggal_terbit`, `Genre`) VALUES
('30', 'Adele', 3494, 'adele-30.png', '2019-11-19', 'Pop'),
('Menari Dengan Bayangan', 'Hindia', 3575, 'hindia-menari-dengan-bayangan.jpg', '2019-11-29', 'Rock Alternatif'),
('Sentimental', 'Juicy Luicy', 2446, 'juicy-lucy-sentimental.jpg', '2020-11-06', 'Pop Indonesia'),
('The Blue Room', 'Coldplay', 1171, 'coldplay-the-blue-room-ep.jpeg', '1999-10-11', 'Rock Alternatif');

INSERT INTO `Song` (`Judul`, `Penyanyi`, `Tanggal_terbit`, `Genre`, `Duration`, `Audio_path`, `Image_path`, `album_id`) VALUES
('Strangers By Nature', 'Adele', '2019-11-19', 'Pop', 182, 'adele-strangers-by-nature.mp3', 'adele-30.png', 1),
('Easy On Me', 'Adele', '2019-11-19', 'Pop', 224, 'adele-easy-on-me.mp3', 'adele-30.png', 1),
('My Little Love', 'Adele', '2019-11-19', 'Pop', 389, 'adele-my-little-love.mp3', 'adele-30.png', 1),
('Cry Your Heart Out', 'Adele', '2019-11-19', 'Pop', 255, 'adele-cry-your-heart-out.mp3', 'adele-30.png', 1),
('Oh My God', 'Adele', '2019-11-19', 'Pop', 225, 'adele-oh-my-god.mp3', 'adele-30.png', 1),
('Can I Get It', 'Adele', '2019-11-19', 'Pop', 210, 'adele-can-i-get-it.mp3', 'adele-30.png', 1),
('I Drink Wine', 'Adele', '2019-11-19', 'Pop', 376, 'adele-i-drink-wine.mp3', 'adele-30.png', 1),
('All Night Parking (with Erroll Garner)', 'Adele', '2019-11-19', 'Pop', 161, 'adele-all-night-parking.mp3', 'adele-30.png', 1),
('Woman Like Me', 'Adele', '2019-11-19', 'Pop', 300, 'adele-woman-like-me.mp3', 'adele-30.png', 1),
('Hold On', 'Adele', '2019-11-19', 'Pop', 366, 'adele-hold-on.mp3', 'adele-30.png', 1),
('To Be Loved', 'Adele', '2019-11-19', 'Pop', 403, 'adele-to-be-loved.mp3', 'adele-30.png', 1),
('Love Is A Game', 'Adele', '2019-11-19', 'Pop', 403, 'adele-love-is-a-game.mp3', 'adele-30.png', 1),
('Evakuasi', 'Hindia', '2019-11-29', 'Rock Alternatif', 208, 'hindia-evakuasi.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Wejangan Mama', 'Hindia', '2019-11-29', 'Rock Alternatif', 145, 'hindia-wejangan-mama.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Besok Mungkin Kita Sampai', 'Hindia', '2019-11-29', 'Rock Alternatif', 320, 'hindia-besok-mungkin-kita-sampai.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Jam Makan Siang', 'Hindia', '2019-11-29', 'Rock Alternatif', 359, 'hindia-jam-makan-siang.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Dehidrasi', 'Hindia', '2019-11-29', 'Rock Alternatif', 319, 'hindia-dehidrasi.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Untuk Apa / Untuk Apa?', 'Hindia', '2019-11-29', 'Rock Alternatif', 378, 'hindia-untuk-apa-untuk-apa.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Voice Note Anggra', 'Hindia', '2019-11-29', 'Rock Alternatif', 36, 'hindia-voice-note-anggra.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Secukupnya', 'Hindia', '2019-11-29', 'Rock Alternatif', 205, 'hindia-secukupnya.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Belum Tidur', 'Hindia', '2019-11-29', 'Rock Alternatif', 220, 'hindia-belum-tidur.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Apapun Yang Terjadi', 'Hindia', '2019-11-29', 'Rock Alternatif', 229, 'hindia-apapun-yang-terjadi.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Membasuh', 'Hindia', '2019-11-29', 'Rock Alternatif', 373, 'hindia-membasuh.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Rumah Ke Rumah', 'Hindia', '2019-11-29', 'Rock Alternatif', 277, 'hindia-rumah-ke-rumah.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Mata Air', 'Hindia', '2019-11-29', 'Rock Alternatif', 226, 'hindia-mata-air.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Wejangan Caca', 'Hindia', '2019-11-29', 'Rock Alternatif', 86, 'hindia-wejangan-caca.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Evaluasi', 'Hindia', '2019-11-29', 'Rock Alternatif', 194, 'hindia-evaluasi.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Di Balik Layar', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 247, 'juicy-luicy-di-balik-layar.mp3', 'juicy-lucy-sentimental.jpg', 3),
('H-5', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 205, 'juicy-luicy-h-5.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Jemari', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 215, 'juicy-luicy-jemari.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Kembali Kesepian', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 250, 'juicy-luicy-kembali-kesepian.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Lagu Terakhir', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 178, 'juicy-luicy-lagu-terakhir.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Lantas', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 234, 'juicy-luicy-lantas.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Mawar Jingga', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 211, 'juicy-luicy-mawar-jingga.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Siapa Tahu', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 203, 'juicy-luicy-siapa-tahu.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Tak Terbaca', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 207, 'juicy-luicy-tak-terbaca.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Tanpa Tergesa', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 218, 'juicy-luicy-tanpa-tergesa.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Terlalu Tinggi', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 278, 'juicy-luicy-terlalu-tinggi.mp3', 'juicy-lucy-sentimental.jpg', 3),
('I Want To Hold Your Hand', 'The Beatles', '1963-11-29', 'Rock and Roll', 144, 'beatles-i-want-to-hold-your-hand.mp3', 'beatles-i-want-to-hold-your-hand.jpeg', NULL),
('Hey Jude', 'The Beatles', '1968-08-26', 'Pop Rock', 431, 'beatles-hey-jude.mp3', 'beatles-hey-jude.jpeg', NULL),
('Bigger Stronger', 'Coldplay', '1999-10-11', 'Rock Alternatif', 289, 'coldplay-bigger-stronger.mp3', 'coldplay-the-blue-room-ep.jpeg', 4),
('Don''t Panic', 'Coldplay', '1999-10-11', 'Rock Alternatif', 158, 'coldplay-dont-panic.mp3', 'coldplay-the-blue-room-ep.jpeg', 4),
('See You Soon', 'Coldplay', '1999-10-11', 'Rock Alternatif', 171, 'coldplay-see-you-soon.mp3', 'coldplay-the-blue-room-ep.jpeg', 4),
('High Speed', 'Coldplay', '1999-10-11', 'Rock Alternatif', 256, 'coldplay-high-speed.mp3', 'coldplay-the-blue-room-ep.jpeg', 4),
('Such a Rush', 'Coldplay', '1999-10-11', 'Rock Alternatif', 297, 'coldplay-such-a-rush.mp3', 'coldplay-the-blue-room-ep.jpeg', 4);

COMMIT;