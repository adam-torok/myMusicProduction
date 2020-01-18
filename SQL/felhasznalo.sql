-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Jan 18. 23:32
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
  `time` date NOT NULL DEFAULT current_timestamp(),
  `bio` varchar(50) COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `felhasznalo`
--

INSERT INTO `felhasznalo` (`id`, `felhnev`, `jelszo`, `email`, `profile_image`, `time`, `bio`) VALUES
(79, 'sze8torada', '628a5698d8f740d7eeeb156c67ac7159c6f2ecc8', 'myemail@email.hu', '5.jpg', '2019-12-22', 'I\'ts a me, mario!'),
(80, 'testuser123', 'test', 'testuser@gg.com', 'user.png', '2019-10-16', NULL),
(81, 'mytestuser', 'testpassword', 'testuser@gmail.com', '1571398700_guitarist.jpeg', '2019-10-18', NULL),
(83, 'test1234567', 'test123', 'test@test.cu', '1571399330_bg.jpg', '2019-10-18', NULL),
(87, 'mackolacko1235', 'macilacika', 'mackolaci@maci.hu', 'user.png', '2019-10-18', NULL),
(91, 'mylittleaccount', 'SHA(userpassword)', 'mlittleaccount@acc.hu', 'user.png', '2019-10-12', NULL),
(92, 'SHATEST1234', '5f2aabb641bf30dc81f9e0db0c931422c789704f', 'shatest@test.hu', 'user.png', '2019-11-12', NULL),
(93, 'Badassllamaa', '45725db5c028dd4d4b5e1855ce3a8289cd2a731e', 'fanniaradi@gmail.com', 'user.png', '2019-11-12', NULL),
(94, 'ajelszom12345', '8cb2237d0679ca88db6464eac60da96345513964', 'lolol@lol.hu', 'user.png', '2019-11-15', NULL),
(95, 'matematemate', 'da802cf788e6824b225de1691320fe46715eef67', 'mate@mate.hu', 'user.png', '2019-11-15', NULL),
(96, 'testfelhasznalo', 'baf870c3d85b0d0bdd8e25756dee5e76ad807310', 'test@testtesth.hu', 'user.png', '2019-11-16', NULL),
(97, 'nemtudom123', '04bab00df4b5fb35b9e6e8801b29ab1d84bb3f95', 'nemtudom@nemtudom.hu', 'user.png', '2019-11-19', NULL),
(100, '?', '?', '?', 'user.png', '2019-11-19', NULL),
(113, 'ajelszoaztitok', 'titok', 'j@j.hu', 'user.png', '2019-11-19', NULL),
(117, 'errorinsqlsyntax', '11f9578d05e6f7bb58a3cdd00107e9f4e3882671', 'a@a.hu', 'user.png', '2019-11-19', NULL),
(119, 'aradiakárki', 'a5d3de20e35e17fe7b2dd2f424f961ce1c320f18', 'arad@arad.hu', 'user.png', '2019-11-19', NULL),
(121, 'Török Ádám', '2a69ae61f7b909f7c05619394e8b0b70916da441', '2@asdfasdf.hu', 'user.png', '2019-11-19', NULL),
(122, 'finaltest123', 'd594c2cc0a53025004791399d80e20852af4c988', 'f@f.hu', 'user.png', '2019-11-19', NULL),
(124, 'wetmangolia', '86d6a1c1f85e5e55129129b846263c215dce2d3a', 'ma@ma.hu', 'user.png', '2019-11-19', NULL),
(127, 'ananászkirály', 'b0421a7684a2e342ecf03b2b204cd2e5fef93325', 'ana@ana.hu', 'user.png', '2019-11-19', NULL),
(129, 'karinthyfrigyeske', '5628bda34969e71ae8053c0e0b583c18dd9070ff', 'k@k.hu', 'user.png', '2019-11-19', NULL),
(136, 'nemmdukodikmiert', '30cd36993ffbf58c9e5704cd8aa468fc1d7de055', 'miert@nemar.hu', 'user.png', '2019-11-19', NULL),
(141, 'aranyjanostoldi', '506adbdbbea6f9ddca96f21a782812b5f4d7a289', 'aranyjanos@f.hu', 'user.png', '2019-11-19', NULL),
(142, 'Emesed', 'd99eccaa11877fc852747728a01c0a94c367b669', 'valami@valami.hu', 'user.png', '2019-12-27', NULL),
(145, 'tesztfelhasznalo', 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', 'test@testamentum.hu', 'bg.jpg', '2019-12-03', NULL),
(146, 'asd123', 'f10e2821bbbea527ea02200352313bc059445190', 'asd123@asd.hu', 'user.png', '2019-12-13', NULL),
(147, 'TesztElekMa', '34228a532093278fcdc65c3a1338482e8bdc44f6', 'teszt@teszt.kam', 'spionge.png', '2019-12-22', NULL),
(151, 'csharpmentesss', '7d131e7229d5b1b8a2fcc4a5a40a245239cf7fc4', 'cmentes@mentes.hu', '', '0001-01-01', NULL),
(173, 'fasdfsad', '01ce26dc69094af9246ea7e7ce9970aff2b81cc9', 'asfasfas', 'user.png', '2019-12-03', NULL),
(174, 'russelke', '30a518b67dcd7af15b369ccb1518ab3cad8e8b2c', 'russel@rus.hu', 'user.png', '2019-12-24', NULL),
(180, 'russeltwo', '3da541559918a808c2402bba5012f6c60b27661c', 'russl@fg.hu', '1571399330_bg.jpg', '2019-12-18', NULL),
(181, 'pesta', '44b269031d4dc8ac5dd48f1215dfa6c5616b2899', 'asdfasd', '1571399330_bg.jpg', '2020-01-14', NULL),
(182, 'NewUser', 'c24d5149dd3e785c972936df3178ea81b542c539', 'nw@gw.hu', 'user.png', '2019-11-30', NULL),
(192, 'adsadsdas', '6d89b6cdd650e689ef35710b7e64d0a59a4720ac', 'asdads', '1571399330_bg.jpg', '2019-12-23', NULL),
(195, 'kakamajom', 'f10e2821bbbea527ea02200352313bc059445190', 'kaka@kaka.hu', 'user.png', '2019-12-11', NULL),
(196, 'aasdadsfasdf', '54adbc768978d9574b682470bd1f568f5a3f43da', 'kkkk@kk.hus', 'user.png', '2019-12-27', NULL),
(198, 'aasdadsfaaassdf', '92429d82a41e930486c6de5ebda9602d55c39986', 'kkkafk@kk.hus', 'user.png', '2019-12-27', NULL),
(199, 'aasdadsfaaasfsdf', '4c286e182bc4d1832a8739b18c19ecaf9262c37a', 'kkkafk@kdk.hus', 'user.png', '2019-12-27', NULL),
(200, 'aasfaaasfsdf', '7d6bab8b68fcca31259a7c2748ec6da0a28bfc8e', 'kkkaafk@kdk.hus', 'user.png', '2019-12-27', NULL),
(202, 'aaasfsdf', '7606c344ab9be169f7cf30f1ad1b2ec1f86a1a59', 'kks@kdk.hus', 'user.png', '2019-12-27', NULL),
(203, 'aaasfsdfkddd', 'f10e2821bbbea527ea02200352313bc059445190', 'kks@kdk.hsus', 'user.png', '2019-12-27', NULL),
(206, 'asdf12312251', '56cf9d1d016283487f483df128425414cdbc9f02', 'kkadfs@kdk.hsus', 'user.png', '2019-12-27', NULL),
(209, 'asdf12312sasad251', 'e552884a581c322ab8a74e2d1811569eda42b28c', 'kicsi1214@freemdaail.hu', 'user.png', '2019-12-27', NULL),
(210, 'asdf12312s', 'e46bdf35c5f252387dbfb800b0f83a7a9f3b2c93', 'kicsi1a214@freemdaail.hu', 'user.png', '2019-12-27', NULL),
(211, 'asdf123sdaa', '43644461287e1c9963a510c1bfa3f78a7ca2b986', 'kicsi1a214@dfmdaail.hu', 'user.png', '2019-12-27', NULL),
(212, 'teszt123412312', '79437f5edda13f9c0669b978dd7a9066dd2059f1', 'adsf@dfmdaail.hu', 'user.png', '2019-12-27', NULL),
(213, 'roliroliroli', '24b149e151649c3d30c73f9051e844e170a70d2a', 'roli@roli.hu', 'user.png', '2020-01-05', NULL);

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
(79, 2, 'like'),
(79, 6, 'like'),
(79, 8, 'like'),
(79, 9, 'like'),
(79, 43, 'like'),
(79, 44, 'like'),
(79, 45, 'like'),
(79, 46, 'like'),
(79, 47, 'like'),
(79, 48, 'like'),
(79, 49, 'like'),
(79, 50, 'like'),
(79, 52, 'like'),
(79, 53, 'like'),
(79, 56, 'like'),
(79, 58, 'like'),
(79, 59, 'like'),
(79, 60, 'like'),
(79, 61, 'like'),
(79, 62, 'like'),
(79, 63, 'like'),
(79, 64, 'like'),
(79, 66, 'like'),
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
(79, 88, 'like'),
(79, 89, 'like'),
(79, 122, 'like'),
(79, 129, 'like'),
(79, 133, 'like'),
(79, 146, 'like'),
(79, 162, 'like'),
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
  `emailid` int(11) NOT NULL,
  `email` varchar(30) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `newsletter`
--

INSERT INTO `newsletter` (`emailid`, `email`) VALUES
(1, 'woltery99@outlook.hu'),
(2, 'woltery99@outlook.hu'),
(3, ''),
(4, ''),
(5, ''),
(6, ''),
(7, ''),
(8, 'adam-torok@outlook.hu');

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
(25, 79),
(24, 94);

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
(25, 66),
(25, 66);

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
(7, 'Shawn Mendez', 'Senorita', 'Pop', 'senorita.mp3', 'senorita.png', 'testuser123', '2019-11-12 16:47:53', 1),
(8, '30Y', 'Felhő', 'Alternatív', 'felho.mp3', '30y.jpg', 'testuser123', '2019-12-26 23:43:28', 1),
(9, 'Ocho Macho', 'Jó nekem', 'Alternatív', 'jon.mp3', 'ocho.jpeg', 'testuser123', '2019-12-26 23:43:33', 1),
(43, 'Khalid Billie Eilish', 'lovely', 'Pop', 'eilish.mp3', 'albumc.png', 'sze8torada', '2019-11-12 16:47:28', 1),
(44, 'Shawn Mendez', 'there is nothing', 'Pop', 'theresnothing.mp3', 'shawn.jpg', 'sze8torada', '2019-11-07 19:16:45', 1),
(45, 'Nirvana', 'heart shaped box', 'Alternatív', 'maluma.mp3', 'nirvanapic.jpeg', 'sze8torada', '2019-12-20 19:42:07', 1),
(46, 'Nirvana', 'all apologies', 'Alternatív', 'nirvana - all apologies.mp3', 'nirvanapic.jpeg', 'sze8torada', '2019-11-07 19:17:05', 1),
(47, '30Y', 'Öltöztetnéd megint', 'Alternatív', 'oltoztetned.mp3', '30yalbumc.jpg', 'sze8torada', '2019-11-07 18:53:00', 1),
(48, 'G-Eazy', 'sober', 'Pop', 'sober.mp3', 'g-eazy.png', 'sze8torada', '2019-11-07 18:52:53', 1),
(49, 'Nirvana', 'lithium', 'Alternatív', 'nirvana - lithium.mp3', 'nirvanapic.jpeg', 'sze8torada', '2019-11-07 18:56:13', 1),
(50, 'test', 'test', 'Pop', 'sober.mp3', 'albumc.png', 'sze8torada', '2019-11-07 19:17:12', 1),
(51, 'test2', 'test2', 'Pop', 'shawn.jpg', '30yalbumc.jpg', 'sze8torada', '2019-11-12 16:47:20', 1),
(52, 'Elvis Presley', 'cant help ', 'Classical', 'canthelp.mp3', 'elvis.jpg', 'sze8torada', '2019-12-26 23:31:34', 1),
(53, 'Louis Armstrong', 'wonderful world', 'Classical', 'world.mp3', 'louis.jpg', 'sze8torada', '2019-11-12 16:01:17', 1),
(54, 'Sting', 'english man', 'Classical', 'englishman.mp3', 'stingalbum.jpg', 'sze8torada', '2019-11-12 15:56:47', 1),
(55, 'Sting', 'shape of my heart', 'Classical', 'shape.mp3', 'stingalbum.jpg', 'sze8torada', '2019-11-12 15:54:26', 1),
(56, 'Ben E King', 'stand by me', 'Classical', 'standby.mp3', 'beneking.jpg', 'sze8torada', '2019-11-07 19:17:59', 1),
(57, 'Emilio', 'get down on it', 'Classical', 'geddown.mp3', 'onit.jpg', 'testuser123', '2019-11-07 19:17:54', 1),
(58, 'Joyner Lucas', 'adhd', 'Rap', 'adhd.mp3', 'joyner.jpg', 'testuser123', '2019-11-12 15:54:17', 1),
(59, 'NF', 'real', 'Rap', 'nf - real.mp3', 'nfalbum.jpg', 'testuser123', '2019-11-07 19:18:08', 1),
(60, 'Joyner Lucas', 'broke and stupid', 'Rap', 'jjoyner.mp3', 'joyner2.jpg', 'testuser123', '2019-11-07 19:16:29', 1),
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
(73, 'EntityFramework', 'Teszt C#', 'Rap', 'short.mp3', 'shawn.jpg', 'sze8torada', '2019-12-13 23:00:00', 0),
(74, 'Hopsin', 'dont want', 'Rap', 'hops.mp3', 'hopsin.jpg', 'sze8torada', '2019-11-07 18:59:14', 1),
(75, 'Logic', 'commando', 'Rap', 'commando.mp3', 'logic.jpg', 'sze8torada', '2019-11-07 18:53:15', 1),
(76, 'ACDC', 'black in black', 'Rap', 'acdc.mp3', 'acdc.jpg', 'aradifeca', '2019-11-07 18:53:12', 1),
(77, 'test', 'testmusic', 'Rap', 'short.mp3', 'acdc.jpg', 'sze8torada', '2019-11-07 18:53:10', 1),
(78, 'Teszt Elek', 'teszt zene', 'Rap', 'short.mp3', 'bg.png', 'sze8torada', '2019-11-19 11:06:37', 0),
(79, 'TesztEtelke', 'teszt', 'Rap', 'short.mp3', 'logic.jpg', 'sze8torada', '2019-11-19 11:07:56', 0),
(80, 'TesztEtelke', 'teszt', 'Rap', 'short.mp3', 'logic.jpg', 'sze8torada', '2019-12-21 16:55:57', 1),
(82, 'ad', 'asdf', 'Rap', 'short.mp3', 'acdc.jpg', 'sze8torada', '2019-11-19 11:11:32', 0),
(83, 'ad', 'asdf', 'Rap', 'short.mp3', 'acdc.jpg', 'sze8torada', '2019-11-19 11:11:48', 0),
(84, 'ad', 'asdf', 'Rap', 'short.mp3', 'acdc.jpg', 'sze8torada', '2019-11-19 22:23:05', 1),
(86, 'ad', 'asdf', 'Rap', 'short.mp3', 'acdc.jpg', 'sze8torada', '2019-11-19 22:22:19', 1),
(87, 'Török Ádám', 'teszt zene', 'Classical', 'short.mp3', 'pic1.jpg', 'sze8torada', '2019-12-01 22:14:32', 1),
(88, 'testzene', 'testzene', 'Tropical', 'short.mp3', 'sale.jpg', 'sze8torada', '2019-12-04 11:38:09', 1),
(89, 'Török Ádám', 'testnew', 'Alternatív', 'short.mp3', 'well.jpg', 'sze8torada', '2019-12-20 19:57:48', 1),
(90, 'Török Ádám', 'testnew', 'Tropical', 'short.mp3', 'well.jpg', 'sze8torada', '2019-12-20 19:56:59', 1),
(91, 'Russian Minister', 'cica kutya', 'Pop', 'short.mp3', 'asd.jpg', 'sze8torada', '2019-12-21 16:54:41', 1),
(92, 'asd', 'asd', 'Future', 'short.mp3', 'shawn.jpg', 'sze8torada', '2019-12-21 14:06:23', 0),
(94, 'asd', 'asd', 'Future', 'short.mp3', 'shawn.jpg', 'sze8torada', '2019-12-21 14:07:14', 0),
(95, 'Török Ádám', 'testnew', 'Future', 'short.mp3', 'buttonbg.png', 'sze8torada', '2019-12-21 16:56:28', 1),
(96, 'Teszt Árpi', 'teszt zene', 'Rap', 'short.mp3', 'shawn.jpg', 'sze8torada', '2019-12-21 17:49:20', 0),
(97, 'Kék Bálna', 'asd', 'Alternatív', 'short.mp3', 'shawn.jpg', 'sze8torada', '2019-12-21 17:50:57', 0),
(98, 'Török Ádám', 'testnew', 'Classical', 'short.mp3', 'shawn.jpg', 'sze8torada', '2019-12-21 18:27:47', 1),
(99, 'asdfsa', 'asdf', 'Alternatív', 'commando.mp3', 'shawn.jpg', 'sze8torada', '2019-12-21 18:58:41', 0),
(100, 'asdfsa', 'asdf', 'Alternatív', 'commando.mp3', 'shawn.jpg', 'sze8torada', '2019-12-21 18:58:42', 0),
(101, 'ddd', 'ddd', 'Future', 'balvin.mp3', 'dasdas.jpg', 'sze8torada', '2019-12-21 19:57:41', 0),
(102, 'Teszt ', 'cica kutya', 'Alternatív', 'edda-a hutlen.mp3', 'dasdas.jpg', 'sze8torada', '2019-12-21 20:01:22', 0),
(103, 'kaka', 'das', 'Pop', 'short.mp3', 'shrek.jpg', 'sze8torada', '2019-12-21 20:03:32', 0),
(104, 'LP', 'muddywater', 'Rap', 'clandet.mp3', 'dasdas.jpg', 'sze8torada', '2019-12-21 20:21:09', 0),
(105, 'LP', 'muddywater', 'Rap', 'clandet.mp3', 'dasdas.jpg', 'sze8torada', '2019-12-21 20:22:08', 0),
(106, 'LP', 'muddywater', 'Rap', 'clandet.mp3', 'dasdas.jpg', 'sze8torada', '2019-12-21 20:43:24', 0),
(107, 'Nagy Árpi', 'testnew', 'Rap', 'canthelp.mp3', '5.jpg', 'sze8torada', '2019-12-21 20:54:10', 0),
(108, 'Nagy Árpi', 'testnew', 'Rap', 'canthelp.mp3', '5.jpg', 'sze8torada', '2019-12-21 20:55:18', 0),
(109, 'asd', 'asd', 'Rap', 'balvin.mp3', '5.jpg', 'sze8torada', '2019-12-21 21:40:53', 0),
(110, 'asd', 'asd', 'Rap', 'balvin.mp3', '5.jpg', 'sze8torada', '2019-12-21 21:43:01', 0),
(111, 'asd', 'asd', 'Rap', 'balvin.mp3', '5.jpg', 'sze8torada', '2019-12-21 21:43:59', 0),
(112, 'Török Ádám', 'testnew', 'Rap', 'clandet.mp3', 'dasdas.jpg', 'sze8torada', '2019-12-21 21:44:07', 0),
(113, 'Török Ádám', 'testnew', 'Rap', 'clandet.mp3', 'dasdas.jpg', 'sze8torada', '2019-12-21 21:44:32', 0),
(114, 'asdasdasd', 'asdf', 'Rap', 'adhd.mp3', 'dasdas.jpg', 'sze8torada', '2019-12-21 21:44:42', 0),
(115, 'asdasdasd', 'asdf', 'Rap', 'adhd.mp3', 'dasdas.jpg', 'sze8torada', '2019-12-21 21:45:22', 0),
(116, 'asdasdasd', 'asdf', 'Rap', 'adhd.mp3', 'dasdas.jpg', 'sze8torada', '2019-12-21 21:47:11', 0),
(117, 'asdasdasd', 'asdf', 'Rap', 'adhd.mp3', 'dasdas.jpg', 'sze8torada', '2019-12-21 21:47:58', 0),
(119, 'asdasdasd', 'asdf', 'Rap', 'adhd.mp3', 'dasdas.jpg', 'sze8torada', '2019-12-21 21:49:31', 0),
(122, 'éN', 'testnew', 'Rap', 'short.mp3', 'well.jpg', 'sze8torada', '2019-12-26 23:25:49', 1),
(124, 'éN', 'testnew', 'Rap', 'short.mp3', 'well.jpg', 'sze8torada', '2019-12-21 23:38:25', 0),
(126, 'Török Ádám', 'testnew', 'Future', 'short.mp3', 'shrek.jpg', 'TesztElekMa', '2019-12-22 17:36:07', 1),
(127, 'Török Ádám', 'testnew', 'Future', 'short.mp3', 'shrek.jpg', 'TesztElekMa', '2019-12-22 17:36:14', 0),
(128, 'Török Ádám', 'testnew', 'Future', 'short.mp3', 'shrek.jpg', 'TesztElekMa', '2019-12-22 17:36:17', 0),
(129, 'Török Ádám', 'testnew', 'Future', 'short.mp3', 'shrek.jpg', 'TesztElekMa', '2019-12-22 17:38:11', 1),
(133, 'éN', 'asda', 'Rap', 'short.mp3', 'well.jpg', 'sze8torada', '2019-12-26 23:13:25', 1),
(146, 'éN', 'asda', 'Rap', 'short.mp3', 'well.jpg', 'sze8torada', '2019-12-21 23:38:19', 1),
(147, 'C#', 'TESZT', 'Rap', 'short.mp3', 'well.jpg', 'sze8torada', '2019-12-26 23:39:43', 0),
(152, 'Kós János', 'test20191228', 'Tropical', 'filename (1).mp3', 'mymusiclogo.png', 'sze8torada', '2019-12-28 20:15:20', 0),
(161, 'Kós János', '2123', 'Alternatív', 'filename.mp3', 'asd.jpg', 'sze8torada', '2019-12-28 20:24:12', 0),
(162, 'Russ', 'meyou', 'Rap', 'russ.mp3', 'russ.png', 'sze8torada', '2020-01-11 20:44:40', 1);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `felhasznalo`
--
ALTER TABLE `felhasznalo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `felhnev` (`felhnev`),
  ADD UNIQUE KEY `email` (`email`);

--
-- A tábla indexei `likes`
--
ALTER TABLE `likes`
  ADD UNIQUE KEY `UC_rating_info` (`userId`,`songId`);

--
-- A tábla indexei `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`emailid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT a táblához `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `emailid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT a táblához `playlists`
--
ALTER TABLE `playlists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT a táblához `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

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
