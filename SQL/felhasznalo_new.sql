-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Már 08. 16:51
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `felhasznalo`
--
CREATE DATABASE IF NOT EXISTS `felhasznalo` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `felhasznalo`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalo`
--

CREATE TABLE `felhasznalo` (
  `id` int(11) NOT NULL,
  `felhnev` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` varchar(40) COLLATE utf8_hungarian_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `profile_image` varchar(100) COLLATE utf8_hungarian_ci DEFAULT 'user.png',
  `time` datetime NOT NULL DEFAULT current_timestamp(),
  `bio` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalo`
--

INSERT INTO `felhasznalo` (`id`, `felhnev`, `jelszo`, `email`, `profile_image`, `time`, `bio`) VALUES
(1, 'wmccoveney', 'jS3abeFuK', 'acandy0@bbb.org', 'user.png', '2019-10-22', 'amet diam in magna bibendum imperdiet nullam orci '),
(2, 'ggoodson11', 'hWTfggcZG8sB', 'ekeasy1@reuters.com', 'user.png', '2019-10-13', 'sit amet erat nulla tempus vivamus in felis'),
(3, 'sriguard2', 'DApGDgFxBoGw', 'sbrockbank2@ihg.com', 'user.png', '2019-06-12', 'lacinia eget tincidunt eget tempus vel pede morbi '),
(4, 'wlamond3', 'Z0gJ6VeQR', 'moffner3@nhs.uk', 'user.png', '2019-10-23', 'justo etiam pretium iaculis justo in'),
(5, 'rshipton4', 'j3hl4UVxTs', 'xrey4@hostgator.com', 'user.png', '2019-09-03', 'lacus curabitur at ipsum ac'),
(6, 'kmeysham5', 'KKyrK9eIgddddd', 'wnunn5@squidoo.com', 'user.png', '2019-05-19', 'proin interdum mauris non ligula pellentesque ultr'),
(7, 'mvane6', 'IalmkHbXEwrJ', 'jgerrett6@ca.gov', 'user.png', '2019-06-26', 'vestibulum sed magna at nunc commodo placerat prae'),
(8, 'llafayette7', 'iPUqlkA', 'ssitlington7@cnn.com', 'user.png', '2019-07-06', 'neque vestibulum eget vulputate ut ultrices vel au'),
(9, 'mharrower8', 'G5bWEE8JiY', 'cpeealess8@topsy.com', 'user.png', '2019-10-02', 'in purus eu magna vulputate'),
(10, 'sdrache9', 'tdQ3Way', 'ggaraway9@businessweek.com', 'user.png', '2019-09-03', 'lorem id ligula suspendisse ornare consequat'),
(11, 'eboylanda', 'yQMmGZY', 'ablaascha@archive.org', 'user.png', '2019-11-25', 'sagittis sapien cum sociis natoque penatibus'),
(12, 'grodmellb', '22ornc3b3', 'seulerb@cbslocal.com', 'user.png', '2019-12-27', 'hendrerit at vulputate vitae nisl aenean lectus'),
(13, 'atironc', 'MOhIRJXsc8', 'sculkinc@dmoz.org', 'user.png', '2020-01-22', 'augue luctus tincidunt nulla mollis molestie lorem'),
(14, 'ntousond', 'GrIhU1XDu5', 'arummeryd@dedecms.com', 'user.png', '2019-07-17', 'lobortis convallis tortor risus dapibus augue vel '),
(15, 'jfilinkove', 'MpZGJBkmmx', 'mmcphadene@omniture.com', 'user.png', '2019-11-23', 'felis ut at dolor quis odio consequat varius integ'),
(16, 'abokenf', 'gqeJZEWWHVj', 'cclemoesf@weather.com', 'user.png', '2020-02-01', 'non lectus aliquam sit amet'),
(17, 'dcharlesg', 'iTeYN3', 'mremnantg@wikia.com', 'user.png', '2019-05-06', 'odio consequat varius integer ac leo pellentesque'),
(18, 'vwohlerh', 'YI9fjbnr6', 'jsteeth@angelfire.com', 'user.png', '2019-09-29', 'elit ac nulla sed vel'),
(19, 'mpottberryi', '1oNya270PBG', 'ecotterilli@booking.com', 'user.png', '2019-07-25', 'nisi venenatis tristique fusce congue diam id'),
(20, 'ngebhardtj', 'H2ataqW', 'cbrandassij@wp.com', 'user.png', '2020-02-21', 'nulla integer pede justo lacinia eget tincidunt eg'),
(21, 'sze8torada', '1fae3ce0905862435d03af3ce72aa80d4463f445', 'woltery99@outlook.hu', 'rendyweston.jpg', '2020-03-07', 'ADam'),
(29, 'Tesztfelhasználó', 'atesztjelszóm', 'kicsi1214@freemail.hu', 'user.png', '2020-03-08', 'Leírás');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `likes`
--

CREATE TABLE `likes` (
  `userId` int(11) NOT NULL,
  `songId` int(11) NOT NULL,
  `action` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- A tábla adatainak kiíratása `likes`
--

INSERT INTO `likes` (`userId`, `songId`, `action`) VALUES
(21, 2, 'like'),
(21, 6, 'like'),
(21, 8, 'like'),
(21, 45, 'like'),
(21, 46, 'like'),
(21, 47, 'like'),
(21, 52, 'like'),
(21, 53, 'like'),
(21, 54, 'like'),
(21, 55, 'like'),
(21, 56, 'like'),
(21, 58, 'like'),
(21, 59, 'like'),
(21, 61, 'like'),
(21, 62, 'like'),
(21, 63, 'like'),
(21, 64, 'like'),
(21, 65, 'like'),
(21, 66, 'like'),
(21, 67, 'like'),
(21, 68, 'like'),
(21, 69, 'like'),
(21, 70, 'like'),
(21, 74, 'like'),
(21, 163, 'like'),
(21, 215, 'like'),
(21, 223, 'like'),
(21, 227, 'like'),
(79, 2, 'like'),
(79, 6, 'like'),
(79, 7, 'like'),
(79, 8, 'like'),
(79, 9, 'like'),
(79, 43, 'like'),
(79, 44, 'like'),
(79, 46, 'like'),
(79, 48, 'like'),
(79, 49, 'like'),
(79, 50, 'like'),
(79, 52, 'like'),
(79, 54, 'like'),
(79, 55, 'like'),
(79, 56, 'like'),
(79, 57, 'like'),
(79, 58, 'like'),
(79, 59, 'like'),
(79, 60, 'like'),
(79, 61, 'like'),
(79, 63, 'like'),
(79, 64, 'like'),
(79, 65, 'like'),
(79, 66, 'like'),
(79, 67, 'like'),
(79, 68, 'like'),
(79, 69, 'like'),
(79, 70, 'like'),
(79, 71, 'like'),
(79, 72, 'like'),
(79, 74, 'like'),
(79, 75, 'like'),
(79, 76, 'like'),
(79, 77, 'like'),
(79, 80, 'like'),
(79, 84, 'like'),
(79, 86, 'like'),
(79, 87, 'like'),
(79, 88, 'like'),
(79, 89, 'like'),
(79, 90, 'like'),
(79, 91, 'like'),
(79, 95, 'like'),
(79, 98, 'like'),
(79, 122, 'like'),
(79, 126, 'like'),
(79, 129, 'like'),
(79, 133, 'like'),
(79, 146, 'like'),
(79, 152, 'like'),
(79, 162, 'like'),
(79, 163, 'like'),
(79, 164, 'like'),
(79, 165, 'like'),
(79, 166, 'like'),
(79, 171, 'like'),
(79, 173, 'like'),
(79, 174, 'like'),
(79, 193, 'like'),
(79, 202, 'like'),
(79, 203, 'like'),
(79, 205, 'like'),
(79, 206, 'like'),
(79, 214, 'like'),
(79, 215, 'like'),
(79, 222, 'like'),
(79, 223, 'like'),
(79, 227, 'like'),
(94, 2, 'like'),
(94, 6, 'like'),
(94, 7, 'like'),
(94, 9, 'like'),
(94, 43, 'like'),
(94, 44, 'like'),
(94, 45, 'like'),
(94, 46, 'like'),
(94, 47, 'like'),
(94, 48, 'like'),
(94, 49, 'like'),
(94, 50, 'like'),
(94, 51, 'like'),
(94, 52, 'like'),
(94, 53, 'like'),
(94, 54, 'like'),
(94, 55, 'like'),
(94, 56, 'like'),
(94, 58, 'like'),
(94, 59, 'like'),
(94, 60, 'like'),
(94, 61, 'like'),
(94, 62, 'like'),
(94, 63, 'like'),
(94, 64, 'like'),
(94, 65, 'like'),
(94, 66, 'like'),
(94, 67, 'like'),
(94, 68, 'like'),
(94, 69, 'like'),
(94, 71, 'like'),
(94, 72, 'like'),
(94, 89, 'like'),
(94, 91, 'like'),
(94, 95, 'like'),
(94, 126, 'like'),
(94, 129, 'like'),
(213, 8, 'like'),
(213, 9, 'like'),
(213, 45, 'like'),
(213, 46, 'like'),
(213, 47, 'like'),
(213, 49, 'like'),
(213, 64, 'like'),
(213, 65, 'like'),
(213, 66, 'like'),
(213, 67, 'like'),
(213, 89, 'like');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `newsletter`
--

INSERT INTO `newsletter` (`id`, `email`) VALUES
(2, 'aconway1@deviantart.com'),
(16, 'asimkinsf@shutterfly.com'),
(20, 'bnijssenj@cyberchimps.com'),
(17, 'bnorkuttg@hexun.com'),
(6, 'dbertomier5@toplist.cz'),
(13, 'efaulksc@china.com.cn'),
(19, 'ekinchini@csmonitor.com'),
(3, 'etanby2@icio.us'),
(14, 'fmandeld@hud.gov'),
(8, 'gvonoertzen7@howstuffworks.com'),
(7, 'hmacalister6@samsung.com'),
(12, 'jdennertb@jalbum.net'),
(10, 'jsiemens9@hubpages.com'),
(15, 'kcremene@yellowbook.com'),
(1, 'lklyn0@microsoft.com'),
(11, 'mduncana@ca.gov'),
(9, 'ndickens8@macromedia.com'),
(18, 'sclousleyh@amazon.co.uk'),
(4, 'swalley3@1und1.de'),
(5, 'vscranny4@people.com.cn');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `playlists`
--

CREATE TABLE `playlists` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `playlists`
--

INSERT INTO `playlists` (`id`, `user_id`) VALUES
(26, 21);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `playlist_songs`
--

CREATE TABLE `playlist_songs` (
  `playlist_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `playlist_songs`
--

INSERT INTO `playlist_songs` (`playlist_id`, `song_id`) VALUES
(26, 9),
(26, 214);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `songs`
--

CREATE TABLE `songs` (
  `id` int(11) NOT NULL,
  `artist` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_hungarian_ci NOT NULL,
  `genre` varchar(11) COLLATE utf8_hungarian_ci NOT NULL,
  `filename` varchar(30) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `covername` varchar(30) COLLATE utf8_hungarian_ci NOT NULL DEFAULT 'cover.png',
  `uploadedby` varchar(30) COLLATE utf8_hungarian_ci NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `songs`
--

INSERT INTO `songs` (`id`, `artist`, `name`, `genre`, `filename`, `covername`, `uploadedby`, `time`, `approved`) VALUES
(2, 'Michael Buble', 'Feeling Good', 'Classical', 'feelinggood.mp3', 'buble.jpg', 'sze8torada', '2019-11-07 18:44:49', 1),
(6, 'Kós János', 'Kislány a zongoránál', 'Classical', 'kislany.mp3', 'kos.jpg', 'sze8torada', '2019-11-07 19:16:40', 1),
(7, 'Shawn Mendez', 'Senorita', 'Pop', 'senorita.mp3', 'senorita.png', 'testuser123', '2020-03-08 11:46:23', 1),
(8, '30Y', 'Felhő', 'Alternatív', 'felho.mp3', '30y.jpg', 'testuser123', '2019-12-26 23:43:28', 1),
(9, 'Ocho Macho', 'Jó nekem', 'Alternatív', 'jon.mp3', 'ocho.jpeg', 'testuser123', '2019-12-26 23:43:33', 1),
(44, 'Shawn Mendez', 'there is nothing', 'Pop', 'theresnothing.mp3', 'shawn.jpg', 'sze8torada', '2019-11-07 19:16:45', 1),
(45, 'Nirvana', 'heart shaped box', 'Alternatív', 'maluma.mp3', 'nirvanapic.jpeg', 'sze8torada', '2019-12-20 19:42:07', 1),
(46, 'Nirvana', 'all apologies', 'Alternatív', 'nirvana - all apologies.mp3', 'nirvanapic.jpeg', 'sze8torada', '2019-11-07 19:17:05', 1),
(47, '30Y', 'Öltöztetnéd megint', 'Alternatív', 'oltoztetned.mp3', '30yalbumc.jpg', 'sze8torada', '2019-11-07 18:53:00', 1),
(48, 'G-Eazy', 'sober', 'Pop', 'sober.mp3', 'g-eazy.png', 'sze8torada', '2019-11-07 18:52:53', 1),
(49, 'Nirvana', 'lithium', 'Alternatív', 'nirvana - lithium.mp3', 'nirvanapic.jpeg', 'sze8torada', '2019-11-07 18:56:13', 1),
(52, 'Elvis Presley', 'cant help ', 'Classical', 'canthelp.mp3', 'elvis.jpg', 'sze8torada', '2019-12-26 23:31:34', 1),
(53, 'Louis Armstrong', 'wonderful world', 'Classical', 'world.mp3', 'louis.jpg', 'sze8torada', '2019-11-12 16:01:17', 1),
(54, 'Sting', 'english man', 'Classical', 'englishman.mp3', 'stingalbum.jpg', 'sze8torada', '2020-01-30 13:46:15', 1),
(55, 'Sting', 'shape of my heart', 'Classical', 'shape.mp3', 'stingalbum.jpg', 'sze8torada', '2019-11-12 15:54:26', 1),
(56, 'Ben E King', 'stand by me', 'Classical', 'standby.mp3', 'beneking.jpg', 'sze8torada', '2020-01-30 13:47:23', 1),
(57, 'Emilio', 'get down on it', 'Classical', 'geddown.mp3', 'onit.jpg', 'testuser123', '2019-11-07 19:17:54', 1),
(58, 'Joyner Lucas', 'adhd', 'Rap', 'adhd.mp3', 'joyner.jpg', 'testuser123', '2019-11-12 15:54:17', 1),
(59, 'NF', 'real', 'Rap', 'nf - real.mp3', 'nfalbum.jpg', 'testuser123', '2019-11-07 19:18:08', 1),
(61, 'Eminem', 'kamikaze', 'Rap', 'eminem - kamikaze (lyrics).mp3', 'emicov.jpg', 'testuser123', '2019-11-07 19:18:03', 1),
(62, 'Eminem', 'white america', 'Rap', 'wa.mp3', 'eminemcov2.jpg', 'testuser123', '2019-11-07 19:16:34', 1),
(63, 'Eminem', 'river', 'Rap', 'river.mp3', 'emicov3.jpg', 'testuser123', '2019-11-07 19:17:49', 1),
(64, 'Maluma', 'que pena', 'Tropical', 'maluma.mp3', 'malumcov.jpg', 'sze8torada', '2019-11-07 19:17:45', 1),
(65, 'GIMS', 'hola senorita', 'Tropical', 'gims.mp3', 'gims.jpg', 'sze8torada', '2019-11-07 19:17:17', 1),
(66, 'FILV', 'cladestina', 'Tropical', 'clandet.mp3', 'clade.jpg', 'sze8torada', '2019-11-07 19:16:23', 1),
(67, 'Maluma', 'mala mia', 'Tropical', 'malamia.mp3', 'malumcov.jpg', 'sze8torada', '2019-11-07 18:59:44', 1),
(68, 'J Balvin', 'loco contigo', 'Tropical', 'balvin.mp3', 'jblvin.jpg', 'sze8torada', '2019-11-07 18:59:41', 1),
(69, 'J Balvin', 'mi gente', 'Tropical', 'jb2.mp3', 'jb2.jpg', 'sze8torada', '2019-11-07 18:59:36', 1),
(70, 'Pharell Williams', 'safari', 'Tropical', 'safari.mp3', 'megusta.jpg', 'sze8torada', '2019-11-07 18:59:33', 1),
(71, 'Oliver Heldens', 'TTL', 'Future', 'turnmeon.mp3', 'oliverheldens.jpg', 'sze8torada', '2019-11-07 18:59:30', 1),
(72, 'Meduza', 'piece of your heart', 'Future', 'meduza.mp3', 'medusa.jpg', 'sze8torada', '2019-12-20 19:44:04', 1),
(74, 'Hopsin', 'dont want', 'Rap', 'hops.mp3', 'hopsin.jpg', 'sze8torada', '2019-11-07 18:59:14', 1),
(75, 'Logic', 'commando', 'Rap', 'commando.mp3', 'logic.jpg', 'sze8torada', '2019-11-07 18:53:15', 1),
(87, 'Török Ádám', 'teszt zene', 'Classical', 'short.mp3', 'pic1.jpg', 'sze8torada', '2019-12-01 22:14:32', 1),
(162, 'Russ', 'meyou', 'Rap', 'russ.mp3', 'russ.png', 'sze8torada', '2020-01-11 20:44:40', 1),
(163, 'Adele', 'someone like you', 'Pop', 'short.mp3', 'adele.jpg', 'sze8torada', '2020-01-26 21:07:36', 1),
(164, 'Ed Sheeran', 'shape of you', 'Pop', 'short.mp3', 'divide.jpg', 'sze8torada', '2020-01-26 21:06:38', 1),
(165, 'Billie Eilish', 'bad guy', 'Pop', 'short.mp3', 'bili.jpg', 'sze8torada', '2020-01-26 21:10:33', 1),
(166, 'The Weekend', 'end', 'Pop', 'short.mp3', 'thewee.jpg', 'sze8torada', '2020-01-26 21:10:33', 1),
(167, 'Belga', 'politikusok', 'Alternatív', 'kamehame-unknown-7636_hifi.mp3', 'belga.jpg', 'sze8torada', '2020-01-26 21:12:24', 1),
(168, 'Twenty One Pilots', 'monday', 'Pop', '_songs_short (1).mp3', 'o1p.jpg', 'sze8torada', '2020-01-26 21:15:05', 1),
(169, 'Juno', 'future of man', 'Future', 'short m??solata.mp3', 'fth.jpg', 'sze8torada', '2020-01-26 21:21:08', 1),
(170, 'Atlantic Records', 'fhw3', 'Future', 'short.mp3', 'futureee.jpg', 'sze8torada', '2020-01-26 21:21:08', 1),
(171, 'Armin', 'deep house', 'Future', 'short.mp3', 'detroit.jpg', 'sze8torada', '2020-01-26 21:22:55', 1),
(172, 'IZEDI', 'you dont know me', 'Future', '_songs_short (1).mp3', 'izedi.jpg', 'sze8torada', '2020-01-26 21:25:59', 1),
(173, 'Statis', 'goner', 'Future', '_songs_short (1).mp3', 'cmon.jpg', 'sze8torada', '2020-01-26 21:27:42', 1),
(174, 'Russ', 'murder me', 'Rap', '_songs_short (2).mp3', '12312312.webp', 'sze8torada', '2020-01-30 13:46:44', 1),
(191, 'Russ', 'manifest', 'Rap', '_songs_short (2).mp3', '1.webp', 'sze8torada', '2020-01-31 15:44:39', 1),
(192, 'Russ', 'compton', 'Rap', '_songs_short (3).mp3', '1.webp', 'sze8torada', '2020-01-31 15:46:06', 1),
(202, 'Slipknot', 'Duality', 'Metál', 'tmph3o88c10.mp3', 'slipknot.jpg', 'sze8torada', '2020-02-09 19:19:59', 1),
(203, 'Artic Monkeys', 'Do I Wanna Know?', 'Rock', 'tmph3o88c10.mp3', 'articmonkey.jpg', 'sze8torada', '2020-02-09 19:22:37', 1),
(204, 'Frank Sinatra', 'Merry Christmas', 'Jazz', 'tmph3o88c10.mp3', 'franks.jpg', 'sze8torada', '2020-02-09 19:26:13', 1),
(205, 'Metallica', 'Nothing Else Matter', 'Rock', '_songs_short.mp3', 'metallica.jpg', 'sze8torada', '2020-02-09 19:32:54', 1),
(206, 'Metallica', 'Enter Sandman', 'Rock', '_songs_short.mp3', 'metallica.jpg', 'sze8torada', '2020-02-09 19:33:01', 1),
(207, 'Metallica', 'Unforgiven', 'Rock', '_songs_short.mp3', 'metallica.jpg', 'sze8torada', '2020-02-09 19:32:56', 1),
(208, 'Guns N\' Roses', 'November Rain', 'Rock', '_songs_short.mp3', 'gnsroses.png', 'sze8torada', '2020-02-09 19:36:19', 1),
(209, 'Guns N\' Roses', 'Dont Cry', 'Rock', '_songs_short.mp3', 'gr2.jpg', 'sze8torada', '2020-02-09 19:36:15', 1),
(210, 'Scorpions', 'Still Loving You', 'Rock', '_songs_short.mp3', 'scropions.jpg', 'sze8torada', '2020-02-09 19:39:05', 1),
(211, 'Scorpions', 'Wind Of Change', 'Rock', '_songs_short.mp3', 'scropions.jpg', 'sze8torada', '2020-02-09 19:39:10', 1),
(212, 'Scorpions', 'Hurricane', 'Rock', '_songs_short.mp3', 'scropions.jpg', 'sze8torada', '2020-02-09 19:39:07', 1),
(214, 'Slipknot', 'Sulfur', 'Metál', '_songs_short.mp3', 'slipknot2.jpg', 'sze8torada', '2020-02-09 19:42:21', 1),
(215, 'Slipknot', 'Wait And Bleed', 'Metál', '_songs_short.mp3', 'slipknot2.jpg', 'sze8torada', '2020-02-09 19:42:24', 1),
(216, 'John Coltrane', 'Mr Pc', 'Jazz', '_songs_short.mp3', 'johncoltrane.jpg', 'sze8torada', '2020-02-09 19:59:38', 1),
(217, 'John Coltrane', 'Equinox', 'Jazz', '_songs_short.mp3', 'johncoltrane.jpg', 'sze8torada', '2020-02-09 19:59:38', 1),
(218, 'John Coltrane', 'Slave for the Blues', 'Jazz', '_songs_short.mp3', 'johncoltrane.jpg', 'sze8torada', '2020-02-09 19:59:38', 1),
(219, 'John Coltrane', 'Tenderly', 'Jazz', '_songs_short.mp3', 'johncoltrane.jpg', 'sze8torada', '2020-02-09 19:59:38', 1),
(220, 'Frank Sinatra', 'Strangers', 'Jazz', '_songs_short.mp3', 'franks.jpg', 'sze8torada', '2020-02-09 19:54:58', 1),
(221, 'Frank Sinatra', 'My Way', 'Jazz', '_songs_short.mp3', 'franks.jpg', 'sze8torada', '2020-02-09 19:56:03', 1),
(222, 'Slipknot', 'Unsainted', 'Metál', '_songs_short.mp3', 'slipknot.jpg', 'sze8torada', '2020-03-01 20:54:03', 1),
(223, 'Slipknot', 'Before I Forget', 'Metál', '_songs_short.mp3', 'slipknot.jpg', 'sze8torada', '2020-03-01 20:54:03', 1),
(224, 'John Coltrane', 'Teszt', 'Jazz', '_SONGS_wa.mp3', 'ge.png', 'sze8torada', '2020-03-01 20:54:03', 1),
(227, 'Slipknot', 'TesztGenre3', 'Metál', '1581793528short.mp3', 'dasdas.jpg', 'sze8torada', '2020-03-01 20:54:03', 1),
(228, 'ssss', 'TesztGenr3', 'Metál', '1581793636short.mp3', 'dasdas.jpg', 'sze8torada', '2020-03-01 20:54:03', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalo`
--
ALTER TABLE `felhasznalo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `felhnev` (`felhnev`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `email_2` (`email`);

--
-- A tábla indexei `likes`
--
ALTER TABLE `likes`
  ADD UNIQUE KEY `UC_rating_info` (`userId`,`songId`);

--
-- A tábla indexei `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A tábla indexei `playlists`
--
ALTER TABLE `playlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- A tábla indexei `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD KEY `playlist_id` (`playlist_id`),
  ADD KEY `song_id` (`song_id`);

--
-- A tábla indexei `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `felhasznalo`
--
ALTER TABLE `felhasznalo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT a táblához `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT a táblához `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT a táblához `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `playlists`
--
ALTER TABLE `playlists`
  ADD CONSTRAINT `playlists_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `felhasznalo` (`id`);

--
-- Megkötések a táblához `playlist_songs`
--
ALTER TABLE `playlist_songs`
  ADD CONSTRAINT `playlist_songs_ibfk_1` FOREIGN KEY (`playlist_id`) REFERENCES `playlists` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `playlist_songs_ibfk_2` FOREIGN KEY (`song_id`) REFERENCES `songs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
