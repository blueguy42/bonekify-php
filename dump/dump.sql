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
('30', 'Adele', 3501, 'adele-30.png', '2019-11-19', 'Pop'),
('Menari Dengan Bayangan', 'Hindia', 3344, 'hindia-menari-dengan-bayangan.jpg', '2019-11-29', 'Rock Alternatif'),
('Sentimental', 'Juicy Luicy', 2450, 'juicy-lucy-sentimental.jpg', '2020-11-06', 'Pop Indonesia'),
('The Blue Room', 'Coldplay', 1171, 'coldplay-the-blue-room-ep.jpeg', '1999-10-11', 'Rock Alternatif');

INSERT INTO `Song` (`Judul`, `Penyanyi`, `Tanggal_terbit`, `Genre`, `Duration`, `Audio_path`, `Image_path`, `album_id`) VALUES
('Strangers By Nature', 'Adele', '2019-11-19', 'Pop', 182, '1 Adele - Strangers By Nature.mp3', 'adele-30.png', 1),
('Easy On Me', 'Adele', '2019-11-19', 'Pop', 225, '2 Adele - Easy On Me.mp3', 'adele-30.png', 1),
('My Little Love', 'Adele', '2019-11-19', 'Pop', 389, '3 Adele - My Little Love.mp3', 'adele-30.png', 1),
('Cry Your Heart Out', 'Adele', '2019-11-19', 'Pop', 256, '4 Adele - Cry Your Heart Out.mp3', 'adele-30.png', 1),
('Oh My God', 'Adele', '2019-11-19', 'Pop', 226, '5 Adele - Oh My God.mp3', 'adele-30.png', 1),
('Can I Get It', 'Adele', '2019-11-19', 'Pop', 211, '6 Adele - Can I Get It.mp3', 'adele-30.png', 1),
('I Drink Wine', 'Adele', '2019-11-19', 'Pop', 377, '7 Adele - I Drink Wine.mp3', 'adele-30.png', 1),
('All Night Parking (with Erroll Garner) Interlude', 'Adele', '2019-11-19', 'Pop', 162, '8 Adele - All Night Parking (with Erroll Garner) Interlude.mp3', 'adele-30.png', 1),
('Woman Like Me', 'Adele', '2019-11-19', 'Pop', 300, '9 Adele - Woman Like Me.mp3', 'adele-30.png', 1),
('Hold On', 'Adele', '2019-11-19', 'Pop', 366, '10 Adele - Hold On.mp3', 'adele-30.png', 1),
('To Be Loved', 'Adele', '2019-11-19', 'Pop', 404, '11 Adele - To Be Loved.mp3', 'adele-30.png', 1),
('Love Is A Game', 'Adele', '2019-11-19', 'Pop', 403, '12 Adele - Love Is A Game.mp3', 'adele-30.png', 1),
('Evakuasi', 'Hindia', '2019-11-29', 'Rock Alternatif', 206, '13 Hindia - Evakuasi.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Wejangan Mama', 'Hindia', '2019-11-29', 'Rock Alternatif', 145, '14 Hindia - Wejangan Mama.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Besok Mungkin Kita Sampai', 'Hindia', '2019-11-29', 'Rock Alternatif', 240, '15 Hindia - Besok Mungkin Kita Sampai.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Jam Makan Siang', 'Hindia', '2019-11-29', 'Rock Alternatif', 282, '16 Hindia - Jam Makan Siang.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Dehidrasi', 'Hindia', '2019-11-29', 'Rock Alternatif', 239, '17 Hindia - Dehidrasi.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Untuk Apa / Untuk Apa?', 'Hindia', '2019-11-29', 'Rock Alternatif', 378, '18 Hindia - Untuk Apa.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Voice Note Anggra', 'Hindia', '2019-11-29', 'Rock Alternatif', 36, '19 Hindia - Voice Note Anggra.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Secukupnya', 'Hindia', '2019-11-29', 'Rock Alternatif', 205, '20 Hindia - Secukupnya.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Belum Tidur', 'Hindia', '2019-11-29', 'Rock Alternatif', 220, '21 Hindia - Belum Tidur.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Apapun Yang Terjadi', 'Hindia', '2019-11-29', 'Rock Alternatif', 229, '22 Hindia - Apapun Yang Terjadi.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Membasuh', 'Hindia', '2019-11-29', 'Rock Alternatif', 373, '23 Hindia - Membasuh.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Rumah Ke Rumah', 'Hindia', '2019-11-29', 'Rock Alternatif', 277, '24 Hindia - Rumah Ke Rumah.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Mata Air', 'Hindia', '2019-11-29', 'Rock Alternatif', 226, '25 Hindia - Mata Air.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Wejangan Caca', 'Hindia', '2019-11-29', 'Rock Alternatif', 86, '26 Hindia - Wejangan Caca.mp3.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Evaluasi', 'Hindia', '2019-11-29', 'Rock Alternatif', 202, '27 Hindia - Evaluasi.mp3', 'hindia-menari-dengan-bayangan.jpg', 2),
('Di Balik Layar', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 245, '28 Juicy Luicy - Di Balik Layar.mp3', 'juicy-lucy-sentimental.jpg', 3),
('H-5', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 205, '29 Juicy Luicy - H-5.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Jemari', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 216, '30 Juicy Luicy -  Jemari.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Kembali Kesepian', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 251, '31 Juicy Luicy - Kembali Kesepian.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Lagu Terakhir', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 179, '32 Juicy Luicy - Lagu Terakhir.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Lantas', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 234, '33 Juicy Luicy - Lantas.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Mawar Jingga', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 211, '34 Juicy Luicy  - Mawar Jingga.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Siapa Tahu', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 203, '35 Juicy Luicy - Siapa Tahu.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Tak Terbaca', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 205, '36 Juicy Luicy - Tak Terbaca.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Tanpa Tergesa', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 220, '37 Juicy Luicy - Tanpa Tergesa.mp3', 'juicy-lucy-sentimental.jpg', 3),
('Terlalu Tinggi', 'Juicy Luicy', '2020-11-06', 'Pop Indonesia', 281, '38 Juicy Luicy - Terlalu Tinggi.mp3', 'juicy-lucy-sentimental.jpg', 3),
('I Want To Hold Your Hand', 'The Beatles', '1963-11-29', 'Rock and Roll', 145, '39 The Beatles - I Want To Hold Your Hand.mp3', 'beatles-i-want-to-hold-your-hand.jpeg', NULL),
('Hey Jude', 'The Beatles', '1968-08-26', 'Pop Rock', 425, '40 The Beatles - Hey Jude.mp3', 'beatles-hey-jude.jpeg', NULL),
('Bigger Stronger', 'Coldplay', '1999-10-11', 'Rock Alternatif', 289, '41 Coldplay - Bigger Stronger.mp3', 'coldplay-the-blue-room-ep.jpeg', 4),
('Don''t Panic', 'Coldplay', '1999-10-11', 'Rock Alternatif', 158, '42 Coldplay - Don''t Panic.mp3', 'coldplay-the-blue-room-ep.jpeg', 4),
('See You Soon', 'Coldplay', '1999-10-11', 'Rock Alternatif', 171, '43 Coldplay - See You Soon.mp3', 'coldplay-the-blue-room-ep.jpeg', 4),
('High Speed', 'Coldplay', '1999-10-11', 'Rock Alternatif', 256, '44 Coldplay - High Speed.mp3', 'coldplay-the-blue-room-ep.jpeg', 4),
('Such a Rush', 'Coldplay', '1999-10-11', 'Rock Alternatif', 297, '45 Coldplay - Such a Rush.mp3', 'coldplay-the-blue-room-ep.jpeg', 4);

COMMIT;