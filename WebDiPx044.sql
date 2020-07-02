-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2018 at 06:18 PM
-- Server version: 5.5.59
-- PHP Version: 5.4.45-0+deb7u12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


-- -----------------------------------------------------
-- Schema WebDiP2017x044
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `WebDiP2017x044` ;

-- -----------------------------------------------------
-- Schema WebDiP2017x044
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `WebDiP2017x044` DEFAULT CHARACTER SET utf8 ;
USE `WebDiP2017x044` ;


-- --------------------------------------------------------

--
-- Table structure for table `DnevnikRada`
--

CREATE TABLE IF NOT EXISTS `DnevnikRada` (
  `DnevnikRada_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Korisnici_ID` int(11) NOT NULL,
  `DnevnikRada_radnja` varchar(45) NOT NULL,
  `DnevnikRada_preglednik` varchar(45) NOT NULL,
  `DnevnikRada_datum` datetime NOT NULL,
  `DnevnikRada_opis` text,
  PRIMARY KEY (`DnevnikRada_ID`),
  KEY `fk_DnevnikRada_Korisnici1_idx` (`Korisnici_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=355 ;

--
-- Dumping data for table `DnevnikRada`
--

INSERT INTO `DnevnikRada` (`DnevnikRada_ID`, `Korisnici_ID`, `DnevnikRada_radnja`, `DnevnikRada_preglednik`, `DnevnikRada_datum`, `DnevnikRada_opis`) VALUES
(1, 8, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-27 19:30:58', 'Korisnik vmundar se uspješno prijavio.'),
(2, 2, 'Uspješna prijava', 'Google Chrome', '2018-05-27 19:37:04', 'Korisnik lgaric se uspješno prijavio.'),
(3, 2, 'Nova kategorija', 'Google Chrome', '2018-05-27 19:42:49', 'Administrator Luka je kreirao novu kategoriju.'),
(4, 8, 'Odjava', 'Mozilla Firefox', '2018-05-27 19:45:38', 'vmundar se uspješno odjavio!'),
(5, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-27 19:45:42', 'Korisnik lgaric se uspješno prijavio.'),
(6, 2, 'Nova kategorija', 'Mozilla Firefox', '2018-05-27 19:46:40', 'Administrator Luka je kreirao novu kategoriju.'),
(7, 2, 'Odjava', 'Google Chrome', '2018-05-27 19:53:21', 'lgaric se uspješno odjavio!'),
(8, 4, 'Uspješna prijava', 'Google Chrome', '2018-05-27 19:54:45', 'Korisnik lklopotan se uspješno prijavio.'),
(9, 4, 'Novo pitanje', 'Google Chrome', '2018-05-27 19:57:45', 'lklopotan je dodao novo pitanje!'),
(10, 4, 'Novo pitanje', 'Google Chrome', '2018-05-27 19:58:26', 'lklopotan je dodao novo pitanje!'),
(11, 4, 'Novo pitanje', 'Google Chrome', '2018-05-27 19:59:21', 'lklopotan je dodao novo pitanje!'),
(12, 4, 'Novo pitanje', 'Google Chrome', '2018-05-27 19:59:54', 'lklopotan je dodao novo pitanje!'),
(13, 4, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:00:21', 'lklopotan je dodao novo pitanje!'),
(14, 4, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:00:52', 'lklopotan je dodao novo pitanje!'),
(15, 4, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:01:21', 'lklopotan je dodao novo pitanje!'),
(16, 4, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:02:04', 'lklopotan je dodao novo pitanje!'),
(17, 4, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:02:21', 'lklopotan je dodao novo pitanje!'),
(18, 4, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:03:02', 'lklopotan je dodao novo pitanje!'),
(19, 4, 'Novo natjecanje', 'Google Chrome', '2018-05-27 20:04:25', 'lklopotan je dodao novo natjecanje!'),
(20, 4, 'Novo natjecanje', 'Google Chrome', '2018-05-27 20:10:36', 'lklopotan je dodao novo natjecanje!'),
(21, 4, 'Odjava', 'Google Chrome', '2018-05-27 20:10:58', 'lklopotan se uspješno odjavio!'),
(22, 5, 'Uspješna prijava', 'Google Chrome', '2018-05-27 20:11:04', 'Korisnik fjovanovic se uspješno prijavio.'),
(23, 5, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:11:54', 'fjovanovic je dodao novo pitanje!'),
(24, 5, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:13:47', 'fjovanovic je dodao novo pitanje!'),
(25, 5, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:15:14', 'fjovanovic je dodao novo pitanje!'),
(26, 5, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:16:17', 'fjovanovic je dodao novo pitanje!'),
(27, 5, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:16:49', 'fjovanovic je dodao novo pitanje!'),
(28, 5, 'Novo natjecanje', 'Google Chrome', '2018-05-27 20:21:18', 'fjovanovic je dodao novo natjecanje!'),
(29, 5, 'Odjava', 'Google Chrome', '2018-05-27 20:22:06', 'fjovanovic se uspješno odjavio!'),
(30, 6, 'Uspješna prijava', 'Google Chrome', '2018-05-27 20:22:11', 'Korisnik lcosic se uspješno prijavio.'),
(31, 6, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:22:37', 'lcosic je dodao novo pitanje!'),
(32, 6, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:23:18', 'lcosic je dodao novo pitanje!'),
(33, 6, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:23:38', 'lcosic je dodao novo pitanje!'),
(34, 6, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:23:58', 'lcosic je dodao novo pitanje!'),
(35, 6, 'Novo pitanje', 'Google Chrome', '2018-05-27 20:24:12', 'lcosic je dodao novo pitanje!'),
(36, 6, 'Novo natjecanje', 'Google Chrome', '2018-05-27 20:26:32', 'lcosic je dodao novo natjecanje!'),
(37, 6, 'Odjava', 'Google Chrome', '2018-05-27 20:27:01', 'lcosic se uspješno odjavio!'),
(38, 2, 'Uspješna prijava', 'Google Chrome', '2018-05-27 20:27:09', 'Korisnik lgaric se uspješno prijavio.'),
(39, 1, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-27 21:15:21', 'Pristup stranici moderatorKategorije.php zabranjen registriranim i neregistriranim korisnicima'),
(40, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-27 21:15:28', 'Korisnik lgaric se uspješno prijavio.'),
(41, 2, 'Blokiranje', 'Mozilla Firefox', '2018-05-27 21:21:51', 'Administrator  je onemogućio kategoriju Informatika'),
(42, 2, 'Blokiranje', 'Mozilla Firefox', '2018-05-27 21:22:00', 'Administrator  je omogućio kategoriju Informatika'),
(43, 2, 'Blokiranje', 'Mozilla Firefox', '2018-05-27 21:24:05', 'Administrator  je onemogućio kategoriju Informatika'),
(44, 2, 'Blokiranje', 'Mozilla Firefox', '2018-05-27 21:25:14', 'Administrator  je omogućio kategoriju Informatika'),
(45, 2, 'Update', 'Mozilla Firefox', '2018-05-27 21:53:45', 'Administrator  izvršio update nad tablicom Korisnici. Promjena: Korisnici_status = 0 WHERE ID = 3'),
(46, 2, 'Update', 'Mozilla Firefox', '2018-05-27 21:54:25', 'Administrator Luka izvršio update nad tablicom Korisnici. Promjena: Korisnici_status = 0 WHERE ID = 3'),
(47, 2, 'Update', 'Mozilla Firefox', '2018-05-27 21:54:44', 'Administrator Luka izvršio update nad tablicom Korisnici. Promjena: Korisnici_status = 1 WHERE ID = 3'),
(48, 2, 'Blokiranje', 'Mozilla Firefox', '2018-05-27 22:01:03', 'Administrator  je onemogućio kategoriju Informatika'),
(49, 2, 'Blokiranje', 'Mozilla Firefox', '2018-05-27 22:02:27', 'Administrator  je omogućio kategoriju Informatika'),
(50, 2, 'Natjecanje isteklo', 'Mozilla Firefox', '2018-05-27 22:04:19', 'Korisnik lgaric pokušao pristupiti natjecanju. Vrijeme za natjecanje je isteklo!'),
(51, 2, 'Natjecanje isteklo', 'Mozilla Firefox', '2018-05-27 22:05:50', 'Korisnik lgaric pokušao pristupiti natjecanju. Vrijeme za natjecanje je isteklo!'),
(52, 2, 'Update', 'Mozilla Firefox', '2018-05-27 22:30:48', 'Administrator Luka izvršio update nad tablicom Natjecanja. Promjena: Natjecanja_brojSudionika = 11 WHERE ID = 3'),
(53, 2, 'Natjecanje popunjeno', 'Mozilla Firefox', '2018-05-27 22:34:55', 'Korisnik  pokušao pristupiti natjecanju. Dosegnut maximalni broj sudionika!'),
(54, 2, 'Natjecanje popunjeno', 'Mozilla Firefox', '2018-05-27 22:36:27', 'Korisnik  pokušao pristupiti natjecanju. Dosegnut maximalni broj sudionika!'),
(55, 2, 'Natjecanje popunjeno', 'Mozilla Firefox', '2018-05-27 22:37:09', 'Korisnik lgaric pokušao pristupiti natjecanju. Dosegnut maximalni broj sudionika!'),
(56, 2, 'Odjava', 'Mozilla Firefox', '2018-05-27 22:38:20', 'lgaric se uspješno odjavio!'),
(57, 5, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-27 22:38:37', 'Korisnik fjovanovic se uspješno prijavio.'),
(58, 5, 'Odjava', 'Mozilla Firefox', '2018-05-27 22:39:32', 'fjovanovic se uspješno odjavio!'),
(59, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-27 22:39:35', 'Korisnik lgaric se uspješno prijavio.'),
(60, 2, 'Nova kategorija', 'Mozilla Firefox', '2018-05-27 22:40:54', 'Administrator Luka je kreirao novu kategoriju.'),
(61, 2, 'Uspješna prijava', 'Google Chrome', '2018-05-27 23:46:41', 'Korisnik lgaric se uspješno prijavio.'),
(62, 2, 'Odjava', 'Google Chrome', '2018-05-27 23:47:15', 'lgaric se uspješno odjavio!'),
(63, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-28 08:14:46', 'Korisnik lgaric se uspješno prijavio.'),
(64, 1, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-28 09:13:57', 'Pristup stranici postavkeStranice.php zabranjen svima osim administratoru'),
(65, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-28 09:14:03', 'Korisnik lgaric se uspješno prijavio.'),
(66, 1, 'Zabranjen pristup', 'Preglednik nepoznat!', '2018-05-28 10:48:52', 'Pristup stranici statistika.php zabranjen svima osim administratoru'),
(67, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-28 10:51:17', 'Korisnik lgaric se uspješno prijavio.'),
(68, 2, 'Virtualno vrijeme', 'Mozilla Firefox', '2018-05-28 20:54:10', 'Administrator Luka je promijenio virtualno vrijeme sustava. Staro vrijeme: 2018-05-28 10:54:10 | Novo vrijeme: 2018-05-28 20:54:10'),
(69, 2, 'Virtualno vrijeme', 'Mozilla Firefox', '2018-05-28 20:59:01', 'Administrator Luka je promijenio virtualno vrijeme sustava. Staro vrijeme: 2018-05-28 20:59:01 | Novo vrijeme: 2018-05-28 20:59:01'),
(70, 2, 'Virtualno vrijeme', 'Mozilla Firefox', '2018-05-28 20:59:32', 'Administrator Luka je promijenio virtualno vrijeme sustava. Staro vrijeme: 2018-05-28 20:59:32 | Novo vrijeme: 2018-05-28 20:59:32'),
(71, 2, 'Virtualno vrijeme', 'Mozilla Firefox', '2018-05-28 21:00:27', 'Administrator Luka je promijenio virtualno vrijeme sustava. Staro vrijeme: 2018-05-28 21:00:27 | Novo vrijeme: 2018-05-28 21:00:27'),
(72, 2, 'Virtualno vrijeme', 'Mozilla Firefox', '2018-05-28 21:01:09', 'Administrator Luka je promijenio virtualno vrijeme sustava. Staro vrijeme: 2018-05-28 21:01:09 | Novo vrijeme: 2018-05-28 21:01:09'),
(73, 2, 'Virtualno vrijeme', 'Mozilla Firefox', '2018-05-28 21:01:11', 'Administrator Luka je promijenio virtualno vrijeme sustava. Staro vrijeme: 2018-05-28 21:01:11 | Novo vrijeme: 2018-05-28 21:01:11'),
(74, 2, 'Odjava', 'Mozilla Firefox', '2018-05-28 21:01:44', 'lgaric se uspješno odjavio!'),
(75, 3, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-28 21:01:49', 'Korisnik jcvetko se uspješno prijavio.'),
(76, 3, 'Novo pitanje', 'Mozilla Firefox', '2018-05-28 21:10:53', 'jcvetko je dodao novo pitanje!'),
(77, 3, 'Novo pitanje', 'Mozilla Firefox', '2018-05-28 21:11:17', 'jcvetko je dodao novo pitanje!'),
(78, 3, 'Novo pitanje', 'Mozilla Firefox', '2018-05-28 21:11:47', 'jcvetko je dodao novo pitanje!'),
(79, 3, 'Novo pitanje', 'Mozilla Firefox', '2018-05-28 21:12:13', 'jcvetko je dodao novo pitanje!'),
(80, 3, 'Novo pitanje', 'Mozilla Firefox', '2018-05-28 21:13:02', 'jcvetko je dodao novo pitanje!'),
(81, 3, 'Uspješna prijava', 'Google Chrome', '2018-05-28 21:14:30', 'Korisnik jcvetko se uspješno prijavio.'),
(82, 3, 'Novo natjecanje', 'Mozilla Firefox', '2018-05-28 22:04:33', 'jcvetko je dodao novo natjecanje!'),
(83, 3, 'Novo natjecanje', 'Google Chrome', '2018-05-28 22:06:39', 'jcvetko je dodao novo natjecanje!'),
(84, 3, 'Natjecanje isteklo', 'Google Chrome', '2018-05-28 22:07:06', 'Korisnik jcvetko pokušao pristupiti natjecanju. Vrijeme za natjecanje je isteklo!'),
(85, 3, 'Novo natjecanje', 'Google Chrome', '2018-05-28 22:10:06', 'jcvetko je dodao novo natjecanje!'),
(86, 3, 'Novo natjecanje', 'Google Chrome', '2018-05-28 22:37:12', 'jcvetko je dodao novo natjecanje!'),
(87, 3, 'Natjecanje isteklo', 'Google Chrome', '2018-05-28 22:37:18', 'Korisnik jcvetko pokušao pristupiti natjecanju. Vrijeme za natjecanje je isteklo!'),
(88, 3, 'Novo natjecanje', 'Google Chrome', '2018-05-28 22:39:12', 'jcvetko je dodao novo natjecanje!'),
(89, 3, 'Odjava', 'Google Chrome', '2018-05-28 22:39:46', 'jcvetko se uspješno odjavio!'),
(90, 2, 'Uspješna prijava', 'Google Chrome', '2018-05-28 22:39:52', 'Korisnik lgaric se uspješno prijavio.'),
(91, 2, 'Nova kategorija', 'Google Chrome', '2018-05-28 22:40:50', 'Administrator Luka je kreirao novu kategoriju.'),
(92, 2, 'Nova kategorija', 'Google Chrome', '2018-05-28 22:42:07', 'Administrator Luka je kreirao novu kategoriju.'),
(93, 2, 'Odjava', 'Google Chrome', '2018-05-28 22:42:17', 'lgaric se uspješno odjavio!'),
(94, 4, 'Uspješna prijava', 'Google Chrome', '2018-05-28 22:42:23', 'Korisnik lklopotan se uspješno prijavio.'),
(95, 3, 'Neuspješna prijava', 'Mozilla Firefox', '2018-05-28 22:42:37', 'Korisnik jcvetko se neuspješno prijavio 1. puta.'),
(96, 3, 'Odjava', 'Mozilla Firefox', '2018-05-28 22:42:41', 'jcvetko se uspješno odjavio!'),
(97, 1, 'Neuspješna prijava', 'Mozilla Firefox', '2018-05-28 22:42:49', 'Korisnik jcvetko se neuspješno prijavio 2. puta.'),
(98, 1, 'Neuspješna prijava', 'Mozilla Firefox', '2018-05-28 22:43:11', 'Korisnik jcvetko se neuspješno prijavio 3. puta. Korisnički račun automatski ZAKLJUČAN!'),
(99, 1, 'Neuspješna prijava', 'Mozilla Firefox', '2018-05-28 22:43:15', 'Korisnik jcvetko se neuspješno prijavio 4. puta.'),
(100, 1, 'Neuspješna prijava', 'Mozilla Firefox', '2018-05-28 22:43:22', 'Korisnik jcvetko se neuspješno prijavio (korisnički račun zaključan!).'),
(101, 1, 'Neuspješna prijava', 'Mozilla Firefox', '2018-05-28 22:44:35', 'Korisnik jcvetko se neuspješno prijavio 3. puta. Korisnički račun automatski ZAKLJUČAN!'),
(102, 3, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-28 22:44:50', 'Korisnik jcvetko se uspješno prijavio.'),
(103, 3, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-28 22:47:15', 'Pristup stranici statistika.php zabranjen svima osim administratoru'),
(104, 4, 'Odjava', 'Google Chrome', '2018-05-28 23:01:54', 'lklopotan se uspješno odjavio!'),
(105, 6, 'Uspješna prijava', 'Google Chrome', '2018-05-28 23:02:06', 'Korisnik lcosic se uspješno prijavio.'),
(106, 6, 'Novo pitanje', 'Google Chrome', '2018-05-28 23:09:03', 'lcosic je dodao novo pitanje!'),
(107, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-29 04:31:51', 'Korisnik lgaric se uspješno prijavio.'),
(108, 2, 'Odjava', 'Mozilla Firefox', '2018-05-29 05:03:38', 'lgaric se uspješno odjavio!'),
(109, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-29 05:08:05', 'Korisnik lgaric se uspješno prijavio.'),
(110, 1, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-29 05:24:21', 'Pristup stranici moderatorKategorije.php zabranjen registriranim i neregistriranim korisnicima'),
(111, 2, 'Natjecanje popunjeno', 'Mozilla Firefox', '2018-05-29 05:27:43', 'Korisnik lgaric pokušao pristupiti natjecanju. Dosegnut maximalni broj sudionika!'),
(112, 2, 'Odjava', 'Mozilla Firefox', '2018-05-29 05:37:50', 'lgaric se uspješno odjavio!'),
(113, 1, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-29 06:24:32', 'Pristup stranici postavkeStranice.php zabranjen svima osim administratoru'),
(114, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-29 06:24:42', 'Korisnik lgaric se uspješno prijavio.'),
(115, 2, 'Odjava', 'Mozilla Firefox', '2018-05-29 07:08:11', 'lgaric se uspješno odjavio!'),
(116, 4, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-29 07:08:21', 'Korisnik lklopotan se uspješno prijavio.'),
(117, 4, 'Natjecanje popunjeno', 'Mozilla Firefox', '2018-05-29 07:10:10', 'Korisnik lklopotan pokušao pristupiti natjecanju. Dosegnut maximalni broj sudionika!'),
(118, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-29 07:30:01', 'Korisnik lgaric se uspješno prijavio.'),
(119, 1, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-29 09:44:20', 'Pristup stranici moderatorKategorije.php zabranjen registriranim i neregistriranim korisnicima'),
(120, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-29 09:44:23', 'Korisnik lgaric se uspješno prijavio.'),
(121, 1, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-29 10:02:22', 'Pristup stranici postavkeStranice.php zabranjen svima osim administratoru'),
(122, 1, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-29 10:03:19', 'Pristup stranici postavkeStranice.php zabranjen svima osim administratoru'),
(123, 1, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-29 12:53:28', 'Pristup stranici postavkeStranice.php zabranjen svima osim administratoru'),
(124, 2, 'Uspješna prijava', 'Google Chrome', '2018-05-29 12:59:06', 'Korisnik lgaric se uspješno prijavio.'),
(125, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-29 13:02:28', 'Korisnik lgaric se uspješno prijavio.'),
(126, 2, 'Odjava', 'Mozilla Firefox', '2018-05-29 13:06:56', 'lgaric se uspješno odjavio!'),
(127, 4, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-29 13:07:05', 'Korisnik lklopotan se uspješno prijavio.'),
(128, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-29 15:38:51', 'Korisnik lgaric se uspješno prijavio.'),
(129, 2, 'Virtualno vrijeme', 'Mozilla Firefox', '2018-05-29 16:05:08', 'Administrator Luka je promijenio virtualno vrijeme sustava. Staro vrijeme: 2018-05-29 16:05:08 | Novo vrijeme: 2018-05-29 16:05:08'),
(130, 2, 'Virtualno vrijeme', 'Mozilla Firefox', '2018-05-30 02:05:51', 'Administrator Luka je promijenio virtualno vrijeme sustava. Staro vrijeme: 2018-05-29 16:05:51 | Novo vrijeme: 2018-05-30 02:05:51'),
(131, 2, 'Odjava', 'Mozilla Firefox', '2018-05-30 02:06:03', 'lgaric se uspješno odjavio!'),
(132, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-30 02:06:06', 'Korisnik lgaric se uspješno prijavio.'),
(133, 2, 'Blokiranje moderatora', 'Mozilla Firefox', '2018-05-30 02:33:07', 'Administrator lgaric je blokirao pristup kategoriji ID = 2 moderatoru s ID-em: 3'),
(134, 2, 'Virtualno vrijeme', 'Mozilla Firefox', '2018-05-29 19:37:53', 'Administrator Luka je promijenio virtualno vrijeme sustava. Staro vrijeme: 2018-05-30 02:37:53 | Novo vrijeme: 2018-05-29 19:37:53'),
(135, 2, 'Virtualno vrijeme', 'Mozilla Firefox', '2018-05-29 19:38:16', 'Administrator Luka je promijenio virtualno vrijeme sustava. Staro vrijeme: 2018-05-29 19:38:16 | Novo vrijeme: 2018-05-29 19:38:16'),
(136, 2, 'Odblokiranje moderatora', 'Mozilla Firefox', '2018-05-29 19:41:29', 'Administrator lgaric je dozvolio pristup kategoriji ID = undefined moderatoru s ID-em: 3'),
(137, 2, 'Odblokiranje moderatora', 'Mozilla Firefox', '2018-05-29 19:45:52', 'Administrator lgaric je dozvolio pristup kategoriji ID = 2 moderatoru s ID-em: 3'),
(138, 2, 'Odblokiranje moderatora', 'Mozilla Firefox', '2018-05-29 19:52:52', 'Administrator lgaric je dozvolio pristup kategoriji ID = 2 moderatoru s ID-em: 3'),
(139, 2, 'Odblokiranje moderatora', 'Mozilla Firefox', '2018-05-29 19:53:41', 'Administrator lgaric je dozvolio pristup kategoriji ID = 2 moderatoru s ID-em: 3'),
(140, 2, 'Blokiranje moderatora', 'Mozilla Firefox', '2018-05-29 19:54:13', 'Administrator lgaric je blokirao pristup kategoriji ID = 2 moderatoru s ID-em: 3'),
(141, 2, 'Odblokiranje moderatora', 'Mozilla Firefox', '2018-05-29 19:54:22', 'Administrator lgaric je dozvolio pristup kategoriji ID = 2 moderatoru s ID-em: 3'),
(142, 2, 'Blokiranje moderatora', 'Mozilla Firefox', '2018-05-29 19:56:06', 'Administrator lgaric je blokirao pristup kategoriji ID = 2 moderatoru s ID-em: 3'),
(143, 2, 'Odblokiranje moderatora', 'Mozilla Firefox', '2018-05-29 19:56:20', 'Administrator lgaric je dozvolio pristup kategoriji ID = 2 moderatoru s ID-em: 3'),
(144, 2, 'Blokiranje moderatora', 'Mozilla Firefox', '2018-05-29 19:59:48', 'Administrator lgaric je blokirao pristup kategoriji ID = 2 moderatoru s ID-em: 3'),
(145, 2, 'Odblokiranje moderatora', 'Mozilla Firefox', '2018-05-29 20:00:11', 'Administrator lgaric je dozvolio pristup kategoriji ID = 2 moderatoru s ID-em: 3'),
(146, 2, 'Blokiranje moderatora', 'Mozilla Firefox', '2018-05-29 20:14:08', 'Administrator lgaric je blokirao pristup kategoriji ID = 2 moderatoru s ID-em: 3'),
(147, 2, 'Odblokiranje moderatora', 'Mozilla Firefox', '2018-05-29 20:14:15', 'Administrator lgaric je dozvolio pristup kategoriji ID = 2 moderatoru s ID-em: 3'),
(148, 2, 'Nova pozicija oglasa', 'Mozilla Firefox', '2018-05-29 21:12:54', 'Administrator Luka je kreirao novu poziciju oglasa.'),
(149, 2, 'Nova pozicija oglasa', 'Mozilla Firefox', '2018-05-29 21:14:19', 'Administrator Luka je kreirao novu poziciju oglasa.'),
(150, 2, 'Nova pozicija oglasa', 'Mozilla Firefox', '2018-05-29 21:14:29', 'Administrator Luka je kreirao novu poziciju oglasa.'),
(151, 2, 'Nova pozicija oglasa', 'Mozilla Firefox', '2018-05-29 21:14:35', 'Administrator Luka je kreirao novu poziciju oglasa.'),
(152, 2, 'Nova pozicija oglasa', 'Mozilla Firefox', '2018-05-29 21:14:58', 'Administrator Luka je kreirao novu poziciju oglasa.'),
(153, 2, 'Nova pozicija oglasa', 'Mozilla Firefox', '2018-05-29 21:15:01', 'Administrator Luka je kreirao novu poziciju oglasa.'),
(154, 2, 'Nova pozicija oglasa', 'Mozilla Firefox', '2018-05-29 21:15:05', 'Administrator Luka je kreirao novu poziciju oglasa.'),
(155, 2, 'Odjava', 'Mozilla Firefox', '2018-05-29 21:26:46', 'lgaric se uspješno odjavio!'),
(156, 4, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-29 21:26:56', 'Korisnik lklopotan se uspješno prijavio.'),
(157, 4, 'Nova vrsta oglasa', 'Mozilla Firefox', '2018-05-29 21:33:11', 'Korisnik Lucija je kreirao novu vrstu oglasa.'),
(158, 4, 'Nova vrsta oglasa', 'Mozilla Firefox', '2018-05-29 21:33:41', 'Korisnik Lucija je kreirao novu vrstu oglasa.'),
(159, 4, 'Nova vrsta oglasa', 'Mozilla Firefox', '2018-05-29 21:34:26', 'Korisnik Lucija je kreirao novu vrstu oglasa.'),
(160, 4, 'Odjava', 'Mozilla Firefox', '2018-05-29 21:36:15', 'lklopotan se uspješno odjavio!'),
(161, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-29 21:36:17', 'Korisnik lgaric se uspješno prijavio.'),
(162, 2, 'Nova vrsta oglasa', 'Mozilla Firefox', '2018-05-29 21:37:05', 'Korisnik Luka je kreirao novu vrstu oglasa.'),
(163, 2, 'Nova vrsta oglasa', 'Mozilla Firefox', '2018-05-29 21:37:25', 'Korisnik Luka je kreirao novu vrstu oglasa.'),
(164, 2, 'Nova vrsta oglasa', 'Mozilla Firefox', '2018-05-29 21:37:57', 'Korisnik Luka je kreirao novu vrstu oglasa.'),
(165, 2, 'Nova vrsta oglasa', 'Mozilla Firefox', '2018-05-29 21:38:31', 'Korisnik Luka je kreirao novu vrstu oglasa.'),
(166, 2, 'Nova vrsta oglasa', 'Mozilla Firefox', '2018-05-29 21:39:43', 'Korisnik Luka je kreirao novu vrstu oglasa.'),
(167, 2, 'Nova pozicija oglasa', 'Mozilla Firefox', '2018-05-29 22:20:52', 'Administrator Luka je kreirao novu poziciju oglasa.'),
(168, 2, 'Novi oglas', 'Mozilla Firefox', '2018-05-29 22:31:35', 'Korisnik lgaric je poslao zahtjev za kreiranje novog oglasa.'),
(169, 2, 'Novi oglas', 'Mozilla Firefox', '2018-05-29 22:34:04', 'Korisnik lgaric je poslao zahtjev za kreiranje novog oglasa.'),
(170, 2, 'Novi oglas', 'Mozilla Firefox', '2018-05-29 22:40:47', 'Korisnik lgaric je poslao zahtjev za kreiranje novog oglasa.'),
(171, 2, 'Novi oglas', 'Mozilla Firefox', '2018-05-29 22:42:40', 'Korisnik lgaric je poslao zahtjev za kreiranje novog oglasa.'),
(172, 2, 'Novi oglas', 'Mozilla Firefox', '2018-05-29 22:43:39', 'Korisnik lgaric je poslao zahtjev za kreiranje novog oglasa.'),
(173, 2, 'Novi oglas', 'Mozilla Firefox', '2018-05-29 22:48:21', 'Korisnik lgaric je poslao zahtjev za kreiranje novog oglasa.'),
(174, 2, 'Novi oglas', 'Mozilla Firefox', '2018-05-29 22:50:04', 'Korisnik lgaric je poslao zahtjev za kreiranje novog oglasa.'),
(175, 2, 'Novi oglas', 'Mozilla Firefox', '2018-05-29 22:51:45', 'Korisnik lgaric je poslao zahtjev za kreiranje novog oglasa.'),
(176, 2, 'Novi oglas', 'Mozilla Firefox', '2018-05-29 22:53:30', 'Korisnik lgaric je poslao zahtjev za kreiranje novog oglasa.'),
(177, 2, 'Novi oglas', 'Mozilla Firefox', '2018-05-29 22:54:49', 'Korisnik lgaric je poslao zahtjev za kreiranje novog oglasa.'),
(178, 2, 'Novi oglas', 'Mozilla Firefox', '2018-05-29 22:56:23', 'Korisnik lgaric je poslao zahtjev za kreiranje novog oglasa.'),
(179, 2, 'Novi oglas', 'Mozilla Firefox', '2018-05-29 22:57:30', 'Korisnik lgaric je poslao zahtjev za kreiranje novog oglasa.'),
(180, 1, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-30 13:22:34', 'Pristup stranici statistika.php zabranjen svima osim administratoru'),
(181, 1, 'Zabranjen pristup', 'Google Chrome', '2018-05-30 13:39:00', 'Pristup stranici zahtjevZaBlokiranjeOglasa.php zabranjen neregistriranim korisnicima'),
(182, 1, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-30 15:42:23', 'Pristup stranici statistika.php zabranjen svima osim administratoru'),
(183, 7, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-30 16:03:51', 'Korisnik agrigic se uspješno prijavio.'),
(184, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-30 16:05:55', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(185, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-30 16:11:11', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(186, 7, 'Odjava', 'Mozilla Firefox', '2018-05-30 16:20:57', 'agrigic se uspješno odjavio!'),
(187, 4, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-30 16:22:43', 'Korisnik lklopotan se uspješno prijavio.'),
(188, 1, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-30 16:46:12', 'Pristup stranici moderatorKategorije.php zabranjen registriranim i neregistriranim korisnicima'),
(189, 4, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-30 16:46:31', 'Korisnik lklopotan se uspješno prijavio.'),
(190, 1, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-30 19:57:39', 'Pristup stranici vrsteOglasa.php zabranjen registriranim i neregistriranim korisnicima'),
(191, 4, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-30 19:57:51', 'Korisnik lklopotan se uspješno prijavio.'),
(192, 4, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-30 19:59:09', 'Pristup stranici postavkeStranice.php zabranjen svima osim administratoru'),
(193, 4, 'Oglas odbijen', 'Mozilla Firefox', '2018-05-30 20:10:34', 'Korisnik  je prihvatio zahtjev za kreiranje novog oglasa s ID-em 1. Novi oglas je prihvaćen!'),
(194, 4, 'Oglas odbijen', 'Mozilla Firefox', '2018-05-30 20:12:22', 'Korisnik Lucija je prihvatio zahtjev za kreiranje novog oglasa s ID-em 3. Novi oglas je prihvaćen!'),
(195, 4, 'Oglas odbijen', 'Mozilla Firefox', '2018-05-30 20:14:35', 'Korisnik Lucija je prihvatio zahtjev za kreiranje novog oglasa s ID-em 7. Novi oglas je prihvaćen!'),
(196, 4, 'Oglas odbijen', 'Mozilla Firefox', '2018-05-30 20:15:27', 'Korisnik Lucija je odbio zahtjev za kreiranje novog oglasa s ID-em 6'),
(197, 4, 'Oglas odbijen', 'Mozilla Firefox', '2018-05-30 20:15:31', 'Korisnik Lucija je prihvatio zahtjev za kreiranje novog oglasa s ID-em 11. Novi oglas je prihvaćen!'),
(198, 4, 'Oglas odbijen', 'Mozilla Firefox', '2018-05-30 20:15:34', 'Korisnik Lucija je odbio zahtjev za kreiranje novog oglasa s ID-em 13'),
(199, 4, 'Oglas odbijen', 'Mozilla Firefox', '2018-05-30 20:15:37', 'Korisnik Lucija je prihvatio zahtjev za kreiranje novog oglasa s ID-em 4. Novi oglas je prihvaćen!'),
(200, 4, 'Oglas odbijen', 'Mozilla Firefox', '2018-05-30 20:15:39', 'Korisnik Lucija je prihvatio zahtjev za kreiranje novog oglasa s ID-em 2. Novi oglas je prihvaćen!'),
(201, 4, 'Oglas odbijen', 'Mozilla Firefox', '2018-05-30 20:15:46', 'Korisnik Lucija je prihvatio zahtjev za kreiranje novog oglasa s ID-em 8. Novi oglas je prihvaćen!'),
(202, 4, 'Oglas odobren', 'Mozilla Firefox', '2018-05-30 20:15:56', 'Korisnik Lucija je prihvatio zahtjev za kreiranje novog oglasa s ID-em 9. Novi oglas je prihvaćen!'),
(203, 4, 'Zahtjev prihvaćen', 'Mozilla Firefox', '2018-05-30 20:16:05', 'Korisnik Lucija je prihvatio zahtjev za blokiranje oglasa s ID-em 1. Oglas '' je blokiran!'),
(204, 4, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-30 20:18:03', 'Korisnik lklopotan poslao zahtjev za blokiranje oglasa.'),
(205, 4, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-30 20:19:33', 'Korisnik lklopotan poslao zahtjev za blokiranje oglasa.'),
(206, 4, 'Zahtjev odbijen', 'Mozilla Firefox', '2018-05-30 20:21:40', 'Korisnik Lucija je odbio zahtjev za blokiranje oglasa s ID-em 2'),
(207, 4, 'Zahtjev odbijen', 'Mozilla Firefox', '2018-05-30 20:22:26', 'Korisnik Lucija je odbio zahtjev za blokiranje oglasa s ID-em 3'),
(208, 4, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-30 20:23:17', 'Korisnik lklopotan poslao zahtjev za blokiranje oglasa.'),
(209, 4, 'Zahtjev odbijen', 'Mozilla Firefox', '2018-05-30 20:24:57', 'Korisnik Lucija je odbio zahtjev za blokiranje oglasa s ID-em 4'),
(210, 4, 'Odjava', 'Mozilla Firefox', '2018-05-30 20:36:47', 'lklopotan se uspješno odjavio!'),
(211, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-30 20:36:50', 'Korisnik lgaric se uspješno prijavio.'),
(212, 2, 'Uspješna prijava', 'Google Chrome', '2018-05-30 21:37:45', 'Korisnik lgaric se uspješno prijavio.'),
(213, 2, 'Odjava', 'Google Chrome', '2018-05-30 21:43:34', 'lgaric se uspješno odjavio!'),
(214, 4, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-30 21:43:45', 'Korisnik lklopotan se uspješno prijavio.'),
(215, 4, 'Odjava', 'Mozilla Firefox', '2018-05-30 21:53:36', 'lklopotan se uspješno odjavio!'),
(216, 7, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-30 21:54:49', 'Korisnik agrigic se uspješno prijavio.'),
(217, 7, 'Odjava', 'Mozilla Firefox', '2018-05-30 21:55:26', 'agrigic se uspješno odjavio!'),
(218, 7, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-30 21:55:36', 'Korisnik agrigic se uspješno prijavio.'),
(219, 7, 'Odjava', 'Mozilla Firefox', '2018-05-30 21:57:32', 'agrigic se uspješno odjavio!'),
(220, 4, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-30 21:57:40', 'Korisnik lklopotan se uspješno prijavio.'),
(221, 4, 'Odjava', 'Mozilla Firefox', '2018-05-30 22:02:00', 'lklopotan se uspješno odjavio!'),
(222, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-30 22:02:03', 'Korisnik lgaric se uspješno prijavio.'),
(223, 1, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-31 03:08:17', 'Pristup stranici zahtjevZaBlokiranjeOglasa.php zabranjen neregistriranim korisnicima'),
(224, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 03:08:24', 'Korisnik lgaric se uspješno prijavio.'),
(225, 2, 'Odjava', 'Mozilla Firefox', '2018-05-31 03:08:33', 'lgaric se uspješno odjavio!'),
(226, 4, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 03:08:50', 'Korisnik lklopotan se uspješno prijavio.'),
(227, 4, 'Odjava', 'Mozilla Firefox', '2018-05-31 03:09:35', 'lklopotan se uspješno odjavio!'),
(228, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 03:10:02', 'Korisnik lgaric se uspješno prijavio.'),
(229, 2, 'Odjava', 'Mozilla Firefox', '2018-05-31 03:10:25', 'lgaric se uspješno odjavio!'),
(230, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 03:10:42', 'Korisnik lgaric se uspješno prijavio.'),
(231, 2, 'Odjava', 'Mozilla Firefox', '2018-05-31 03:12:28', 'lgaric se uspješno odjavio!'),
(232, 7, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 18:35:42', 'Korisnik agrigic se uspješno prijavio.'),
(233, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 18:39:48', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(234, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 18:41:58', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(235, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 18:43:24', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(236, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 18:45:18', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(237, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 18:46:13', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(238, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 18:46:54', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(239, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 18:47:43', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(240, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 18:50:05', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(241, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 18:50:38', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(242, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 18:53:05', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(243, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 18:54:19', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(244, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 18:55:25', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(245, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 18:56:12', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(246, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 18:57:09', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(247, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 18:58:06', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(248, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 19:06:13', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(249, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 19:10:58', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(250, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 19:12:00', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(251, 7, 'Novi oglas', 'Mozilla Firefox', '2018-05-31 19:12:47', 'Korisnik agrigic je poslao zahtjev za kreiranje novog oglasa.'),
(252, 7, 'Odjava', 'Mozilla Firefox', '2018-05-31 19:13:51', 'agrigic se uspješno odjavio!'),
(253, 4, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 19:13:59', 'Korisnik lklopotan se uspješno prijavio.'),
(254, 4, 'Oglas odbijen', 'Mozilla Firefox', '2018-05-31 19:14:08', 'Korisnik Lucija je odbio zahtjev za kreiranje novog oglasa s ID-em 19'),
(255, 4, 'Oglas odobren', 'Mozilla Firefox', '2018-05-31 19:14:11', 'Korisnik Lucija je prihvatio zahtjev za kreiranje novog oglasa s ID-em 16. Novi oglas je prihvaćen!'),
(256, 4, 'Oglas odobren', 'Mozilla Firefox', '2018-05-31 19:14:13', 'Korisnik Lucija je prihvatio zahtjev za kreiranje novog oglasa s ID-em 18. Novi oglas je prihvaćen!'),
(257, 4, 'Oglas odbijen', 'Mozilla Firefox', '2018-05-31 19:14:16', 'Korisnik Lucija je odbio zahtjev za kreiranje novog oglasa s ID-em 26'),
(258, 4, 'Oglas odobren', 'Mozilla Firefox', '2018-05-31 19:14:19', 'Korisnik Lucija je prihvatio zahtjev za kreiranje novog oglasa s ID-em 21. Novi oglas je prihvaćen!'),
(259, 4, 'Oglas odbijen', 'Mozilla Firefox', '2018-05-31 19:14:21', 'Korisnik Lucija je odbio zahtjev za kreiranje novog oglasa s ID-em 27'),
(260, 4, 'Oglas odobren', 'Mozilla Firefox', '2018-05-31 19:14:24', 'Korisnik Lucija je prihvatio zahtjev za kreiranje novog oglasa s ID-em 20. Novi oglas je prihvaćen!'),
(261, 4, 'Oglas odbijen', 'Mozilla Firefox', '2018-05-31 19:14:28', 'Korisnik Lucija je odbio zahtjev za kreiranje novog oglasa s ID-em 24'),
(262, 4, 'Nova vrsta oglasa', 'Mozilla Firefox', '2018-05-31 19:15:17', 'Korisnik Lucija je kreirao novu vrstu oglasa.'),
(263, 4, 'Odjava', 'Mozilla Firefox', '2018-05-31 19:15:46', 'lklopotan se uspješno odjavio!'),
(264, 1, 'Neuspješna prijava', 'Mozilla Firefox', '2018-05-31 19:15:55', 'Korisnik jcvetko se neuspješno prijavio 1. puta.'),
(265, 3, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 19:16:00', 'Korisnik jcvetko se uspješno prijavio.'),
(266, 3, 'Odjava', 'Mozilla Firefox', '2018-05-31 19:17:03', 'jcvetko se uspješno odjavio!'),
(267, 6, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 19:17:08', 'Korisnik lcosic se uspješno prijavio.'),
(268, 6, 'Novo pitanje', 'Mozilla Firefox', '2018-05-31 19:18:35', 'lcosic je dodao novo pitanje!'),
(269, 6, 'Novo pitanje', 'Mozilla Firefox', '2018-05-31 19:19:12', 'lcosic je dodao novo pitanje!'),
(270, 6, 'Novo pitanje', 'Mozilla Firefox', '2018-05-31 19:19:59', 'lcosic je dodao novo pitanje!'),
(271, 6, 'Novo pitanje', 'Mozilla Firefox', '2018-05-31 19:20:39', 'lcosic je dodao novo pitanje!'),
(272, 6, 'Odjava', 'Mozilla Firefox', '2018-05-31 19:22:23', 'lcosic se uspješno odjavio!'),
(273, 7, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 19:22:34', 'Korisnik agrigic se uspješno prijavio.'),
(274, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:22:55', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(275, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:23:10', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(276, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:24:50', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(277, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:25:05', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(278, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:25:16', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(279, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:25:23', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(280, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:25:42', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(281, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:26:19', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(282, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:26:30', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(283, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:26:39', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(284, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:27:03', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(285, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:27:26', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(286, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:27:37', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(287, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:27:46', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(288, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:28:24', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(289, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:28:39', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(290, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:28:49', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(291, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:29:34', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(292, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:29:50', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(293, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:29:58', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(294, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:30:23', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(295, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:30:44', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(296, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:30:53', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(297, 7, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 19:31:01', 'Korisnik agrigic poslao zahtjev za blokiranje oglasa.'),
(298, 7, 'Odjava', 'Mozilla Firefox', '2018-05-31 19:32:27', 'agrigic se uspješno odjavio!'),
(299, 4, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 19:32:33', 'Korisnik lklopotan se uspješno prijavio.'),
(300, 4, 'Zahtjev odbijen', 'Mozilla Firefox', '2018-05-31 19:38:19', 'Korisnik Lucija je odbio zahtjev za blokiranje oglasa s ID-em 6'),
(301, 4, 'Zahtjev prihvaćen', 'Mozilla Firefox', '2018-05-31 19:38:24', 'Korisnik Lucija je prihvatio zahtjev za blokiranje oglasa s ID-em 12. Oglas s ID-em 17 je blokiran!'),
(302, 4, 'Zahtjev odbijen', 'Mozilla Firefox', '2018-05-31 19:38:28', 'Korisnik Lucija je odbio zahtjev za blokiranje oglasa s ID-em 8'),
(303, 4, 'Zahtjev odbijen', 'Mozilla Firefox', '2018-05-31 19:38:32', 'Korisnik Lucija je odbio zahtjev za blokiranje oglasa s ID-em 26'),
(304, 4, 'Zahtjev odbijen', 'Mozilla Firefox', '2018-05-31 19:38:36', 'Korisnik Lucija je odbio zahtjev za blokiranje oglasa s ID-em 13'),
(305, 4, 'Zahtjev odbijen', 'Mozilla Firefox', '2018-05-31 19:38:40', 'Korisnik Lucija je odbio zahtjev za blokiranje oglasa s ID-em 19'),
(306, 4, 'Oglas odobren', 'Mozilla Firefox', '2018-05-31 19:39:56', 'Korisnik Lucija je prihvatio zahtjev za kreiranje novog oglasa s ID-em 22. Novi oglas je prihvaćen!'),
(307, 4, 'Zahtjev odbijen', 'Mozilla Firefox', '2018-05-31 19:40:04', 'Korisnik Lucija je odbio zahtjev za blokiranje oglasa s ID-em 11'),
(308, 4, 'Zahtjev prihvaćen', 'Mozilla Firefox', '2018-05-31 19:40:09', 'Korisnik Lucija je prihvatio zahtjev za blokiranje oglasa s ID-em 24. Oglas s ID-em 10 je blokiran!'),
(309, 4, 'Zahtjev prihvaćen', 'Mozilla Firefox', '2018-05-31 19:40:13', 'Korisnik Lucija je prihvatio zahtjev za blokiranje oglasa s ID-em 18. Oglas s ID-em 4 je blokiran!'),
(310, 4, 'Zahtjev prihvaćen', 'Mozilla Firefox', '2018-05-31 19:40:18', 'Korisnik Lucija je prihvatio zahtjev za blokiranje oglasa s ID-em 23. Oglas s ID-em 15 je blokiran!'),
(311, 4, 'Zahtjev odbijen', 'Mozilla Firefox', '2018-05-31 19:40:22', 'Korisnik Lucija je odbio zahtjev za blokiranje oglasa s ID-em 9'),
(312, 4, 'Zahtjev odbijen', 'Mozilla Firefox', '2018-05-31 19:40:25', 'Korisnik Lucija je odbio zahtjev za blokiranje oglasa s ID-em 14'),
(313, 4, 'Zahtjev prihvaćen', 'Mozilla Firefox', '2018-05-31 19:40:30', 'Korisnik Lucija je prihvatio zahtjev za blokiranje oglasa s ID-em 27. Oglas s ID-em 3 je blokiran!'),
(314, 4, 'Zahtjev prihvaćen', 'Mozilla Firefox', '2018-05-31 19:40:37', 'Korisnik Lucija je prihvatio zahtjev za blokiranje oglasa s ID-em 21. Oglas s ID-em 1 je blokiran!'),
(315, 4, 'Zahtjev prihvaćen', 'Mozilla Firefox', '2018-05-31 19:40:41', 'Korisnik Lucija je prihvatio zahtjev za blokiranje oglasa s ID-em 17. Oglas s ID-em 12 je blokiran!'),
(316, 4, 'Zahtjev odbijen', 'Mozilla Firefox', '2018-05-31 19:40:45', 'Korisnik Lucija je odbio zahtjev za blokiranje oglasa s ID-em 10'),
(317, 4, 'Odjava', 'Mozilla Firefox', '2018-05-31 19:48:58', 'lklopotan se uspješno odjavio!'),
(318, 6, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 19:49:06', 'Korisnik lcosic se uspješno prijavio.'),
(319, 6, 'Novo natjecanje', 'Mozilla Firefox', '2018-05-31 19:50:36', 'lcosic je dodao novo natjecanje!'),
(320, 6, 'Novo natjecanje', 'Mozilla Firefox', '2018-05-31 19:53:41', 'lcosic je dodao novo natjecanje!'),
(321, 6, 'Novo natjecanje', 'Mozilla Firefox', '2018-05-31 19:57:36', 'lcosic je dodao novo natjecanje!'),
(322, 6, 'Novo natjecanje', 'Mozilla Firefox', '2018-05-31 19:59:54', 'lcosic je dodao novo natjecanje!'),
(323, 6, 'Odjava', 'Mozilla Firefox', '2018-05-31 20:00:08', 'lcosic se uspješno odjavio!'),
(324, 4, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 20:00:14', 'Korisnik lklopotan se uspješno prijavio.'),
(325, 4, 'Natjecanje isteklo', 'Mozilla Firefox', '2018-05-31 20:00:31', 'Korisnik lklopotan pokušao pristupiti natjecanju. Vrijeme za natjecanje je isteklo!'),
(326, 4, 'Natjecanje isteklo', 'Mozilla Firefox', '2018-05-31 20:00:51', 'Korisnik lklopotan pokušao pristupiti natjecanju. Vrijeme za natjecanje je isteklo!'),
(327, 4, 'Natjecanje isteklo', 'Mozilla Firefox', '2018-05-31 20:00:56', 'Korisnik lklopotan pokušao pristupiti natjecanju. Vrijeme za natjecanje je isteklo!'),
(328, 4, 'Novo natjecanje', 'Mozilla Firefox', '2018-05-31 20:05:34', 'lklopotan je dodao novo natjecanje!'),
(329, 4, 'Odjava', 'Mozilla Firefox', '2018-05-31 20:15:52', 'lklopotan se uspješno odjavio!'),
(330, 6, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 20:15:59', 'Korisnik lcosic se uspješno prijavio.'),
(331, 6, 'Novo natjecanje', 'Mozilla Firefox', '2018-05-31 20:18:56', 'lcosic je dodao novo natjecanje!'),
(332, 6, 'Novo natjecanje', 'Mozilla Firefox', '2018-05-31 20:26:03', 'lcosic je dodao novo natjecanje!'),
(333, 6, 'Odjava', 'Mozilla Firefox', '2018-05-31 20:26:06', 'lcosic se uspješno odjavio!'),
(334, 4, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 20:26:13', 'Korisnik lklopotan se uspješno prijavio.'),
(335, 4, 'Novo pitanje', 'Mozilla Firefox', '2018-05-31 20:27:49', 'lklopotan je dodao novo pitanje!'),
(336, 4, 'Novo pitanje', 'Mozilla Firefox', '2018-05-31 20:28:24', 'lklopotan je dodao novo pitanje!'),
(337, 4, 'Novo pitanje', 'Mozilla Firefox', '2018-05-31 20:29:00', 'lklopotan je dodao novo pitanje!'),
(338, 4, 'Novo pitanje', 'Mozilla Firefox', '2018-05-31 20:30:54', 'lklopotan je dodao novo pitanje!'),
(339, 4, 'Novo pitanje', 'Mozilla Firefox', '2018-05-31 20:31:28', 'lklopotan je dodao novo pitanje!'),
(340, 4, 'Novo natjecanje', 'Mozilla Firefox', '2018-05-31 20:33:16', 'lklopotan je dodao novo natjecanje!'),
(341, 4, 'Zahtjev za blokiranje oglasa', 'Mozilla Firefox', '2018-05-31 20:34:04', 'Korisnik lklopotan poslao zahtjev za blokiranje oglasa.'),
(342, 4, 'Novo natjecanje', 'Mozilla Firefox', '2018-05-31 20:35:36', 'lklopotan je dodao novo natjecanje!'),
(343, 4, 'Novo natjecanje', 'Mozilla Firefox', '2018-05-31 20:37:25', 'lklopotan je dodao novo natjecanje!'),
(344, 4, 'Odjava', 'Mozilla Firefox', '2018-05-31 20:46:44', 'lklopotan se uspješno odjavio!'),
(345, 2, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 20:46:47', 'Korisnik lgaric se uspješno prijavio.'),
(346, 2, 'Odjava', 'Mozilla Firefox', '2018-05-31 20:53:11', 'lgaric se uspješno odjavio!'),
(347, 6, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 20:53:20', 'Korisnik lcosic se uspješno prijavio.'),
(348, 6, 'Zahtjev prihvaćen', 'Mozilla Firefox', '2018-05-31 20:53:28', 'Korisnik Luka je prihvatio zahtjev za blokiranje oglasa s ID-em 16. Oglas s ID-em 22 je blokiran!'),
(349, 6, 'Novo natjecanje', 'Mozilla Firefox', '2018-05-31 20:56:00', 'lcosic je dodao novo natjecanje!'),
(350, 6, 'Odjava', 'Mozilla Firefox', '2018-05-31 20:56:30', 'lcosic se uspješno odjavio!'),
(351, 4, 'Uspješna prijava', 'Mozilla Firefox', '2018-05-31 20:56:37', 'Korisnik lklopotan se uspješno prijavio.'),
(352, 4, 'Novo natjecanje', 'Mozilla Firefox', '2018-05-31 20:59:40', 'lklopotan je dodao novo natjecanje!'),
(353, 4, 'Novo natjecanje', 'Mozilla Firefox', '2018-05-31 21:02:28', 'lklopotan je dodao novo natjecanje!'),
(354, 4, 'Zabranjen pristup', 'Mozilla Firefox', '2018-05-31 21:13:09', 'Pristup stranici statistika.php zabranjen svima osim administratoru');

-- --------------------------------------------------------

--
-- Table structure for table `Kategorije`
--

CREATE TABLE IF NOT EXISTS `Kategorije` (
  `Kategorije_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Kategorije_naziv` varchar(75) NOT NULL,
  `Kategorije_datumKreiranja` datetime NOT NULL,
  `Kategorije_opis` text,
  `Kategorije_slika` varchar(100) DEFAULT NULL,
  `Kategorije_aktivna` tinyint(1) NOT NULL,
  PRIMARY KEY (`Kategorije_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `Kategorije`
--

INSERT INTO `Kategorije` (`Kategorije_ID`, `Kategorije_naziv`, `Kategorije_datumKreiranja`, `Kategorije_opis`, `Kategorije_slika`, `Kategorije_aktivna`) VALUES
(1, 'Informatika', '2018-05-27 19:52:44', 'Testirajte svoja znanja na području informatičkih znanosti!', 'binary-tunnel-500-600.jpg', 1),
(2, 'Ekonomija', '2018-05-27 22:40:54', 'Kategorija namjenjena za natjecanja iz područja ekonomskih znanosti.', 'BuildEconomy.jpg', 1),
(3, 'Organizacija', '2018-05-28 22:40:50', 'Kategorija za natjecanja iz organizacije', '7282552_orig.jpg', 1),
(4, 'Pravo', '2018-05-28 22:42:07', 'Kategorija koja sadrži natjecanja iz pravnih znanosti.', 'download (1).jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Korisnici`
--

CREATE TABLE IF NOT EXISTS `Korisnici` (
  `Korisnici_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TipKorisnika_ID` int(11) NOT NULL,
  `Korisnici_korime` varchar(20) NOT NULL,
  `Korisnici_email` varchar(45) NOT NULL,
  `Korisnici_lozinka` varchar(64) NOT NULL,
  `Korisnici_kriptiranaLozinka` varchar(64) NOT NULL,
  `Korisnici_datumRegistriranja` datetime NOT NULL,
  `Korisnici_ime` varchar(25) DEFAULT NULL,
  `Korisnici_prezime` varchar(25) DEFAULT NULL,
  `Korisnici_status` int(11) DEFAULT NULL,
  `Korisnici_neuspjesniLogin` int(11) DEFAULT NULL,
  `Korisnici_aktivacijskiKod` varchar(20) NOT NULL,
  PRIMARY KEY (`Korisnici_ID`),
  KEY `fk_Korisnici_Tip_korisnika1_idx` (`TipKorisnika_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `Korisnici`
--

INSERT INTO `Korisnici` (`Korisnici_ID`, `TipKorisnika_ID`, `Korisnici_korime`, `Korisnici_email`, `Korisnici_lozinka`, `Korisnici_kriptiranaLozinka`, `Korisnici_datumRegistriranja`, `Korisnici_ime`, `Korisnici_prezime`, `Korisnici_status`, `Korisnici_neuspjesniLogin`, `Korisnici_aktivacijskiKod`) VALUES
(1, 4, 'Nereg. korisnik', '-', '-', '-', '0000-00-00 00:00:00', NULL, NULL, NULL, NULL, '-'),
(2, 1, 'lgaric', 'lgaaric@gmail.com', 'lgaric', '877d271b21e02cfc88ddb8b03147316d9caca821', '2018-05-27 08:34:43', 'Luka', 'Garić', 1, 0, 'PhXnKlRiFbFnPlBeSlYx'),
(3, 2, 'jcvetko', 'jcvetko@gmail.com', 'jcvetko', '37d672ffb0e32cd2719aeef5313a552958e2ac28', '2018-05-27 03:41:15', 'Juraj', 'Cvetko', 1, 0, 'GzTnTlYiObQnGlXeLlAx'),
(4, 2, 'lklopotan', 'lklopotan@gmail.com', 'lklopotan', '3115afa477c145625ba2d4e1851280212e45d94e', '2018-05-27 19:34:46', 'Lucija', 'Klopotan', 1, 0, 'FhKnElQiNbFqPlReXlsA'),
(5, 2, 'fjovanovic', 'fjovanovic@gmail.com', 'fjovanovic', 'cbfbae4ec43b1839b43d5ec41ad6781d560de08b', '2018-05-28 08:10:34', 'Filip', 'Jovanović', 1, 0, 'YhXnKlRiFbFnPlBeSlRx'),
(6, 2, 'lcosic', 'lcosic@gmail.com', 'lcosic', 'ddc8cb995bfd1df906db1e29207d353697a12df8', '2018-05-28 04:08:51', 'Luka', 'Čosić', 1, 0, 'PhXnKlRiFbFnNlBeSlRx'),
(7, 3, 'agrigic', 'agrigic@hotmail.com', 'agrigic', 'd420585888e817354b60cd6510337da7b4037634', '2018-05-29 17:18:32', 'Antonio', 'Grigić', 1, 0, 'PhXnKlRiFbFnPlBeSlRo'),
(8, 3, 'vmundar', 'vmundar@yahoo.com', 'vmundar', 'c8c44cdf6885ccb0620e3f8d6b36e72e9d8cef9d', '2018-05-27 19:44:06', 'Valentina', 'Munđar', 1, 0, 'PhXnKlRiFwFnPlBeSlRx'),
(9, 3, 'kbartol', 'kbartol@gmail.com', 'kbartol', '578a1980d55e8d81fd9f5c1d9c4251efa66a5631', '2018-05-27 12:28:37', 'Katarina', 'Bartolović', 1, 0, 'PhXnGlRiFbFnPlBeSlRx'),
(10, 3, 'gkalanj', 'gkalanj@yahoo.com', 'gkalanj', 'ccb7eeb38e646b0eed079d5f5e871a16dc8d2b40', '2018-05-27 13:22:39', 'Goran', 'Kalanj', 1, 0, 'EhXnKlRiFbFnPlBeSlRx');

-- --------------------------------------------------------

--
-- Table structure for table `ModeratorKategorije`
--

CREATE TABLE IF NOT EXISTS `ModeratorKategorije` (
  `ModeratorKategorije_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Kategorije_ID` int(11) NOT NULL,
  `Korisnici_ID` int(11) NOT NULL,
  `ModeratorKategorije_od` datetime NOT NULL,
  `ModeratorKategorije_do` datetime DEFAULT NULL,
  PRIMARY KEY (`ModeratorKategorije_ID`),
  KEY `fk_ModeratorKategorije_Korisnici1_idx` (`Korisnici_ID`),
  KEY `fk_ModeratorKategorije_Kategorije1_idx` (`Kategorije_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `ModeratorKategorije`
--

INSERT INTO `ModeratorKategorije` (`ModeratorKategorije_ID`, `Kategorije_ID`, `Korisnici_ID`, `ModeratorKategorije_od`, `ModeratorKategorije_do`) VALUES
(7, 1, 4, '2018-05-27 19:52:44', NULL),
(8, 1, 5, '2018-05-27 19:52:44', NULL),
(9, 1, 6, '2018-05-27 19:52:44', NULL),
(10, 2, 3, '2018-05-27 22:40:54', NULL),
(11, 3, 4, '2018-05-28 22:40:50', NULL),
(12, 3, 3, '2018-05-28 22:40:50', NULL),
(13, 4, 4, '2018-05-28 22:42:07', '2018-05-30 02:29:07'),
(14, 4, 6, '2018-05-28 22:42:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Natjecanja`
--

CREATE TABLE IF NOT EXISTS `Natjecanja` (
  `Natjecanja_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Kategorija_ID` int(11) NOT NULL,
  `Natjecanja_status` tinyint(1) NOT NULL,
  `Natjecanja_naziv` varchar(75) NOT NULL,
  `Natjecanja_datumKreiranja` datetime NOT NULL,
  `Natjecanja_opis` text,
  `Natjecanja_od` datetime NOT NULL,
  `Natjecanja_do` datetime DEFAULT NULL,
  `Natjecanja_maxSudionika` int(11) NOT NULL,
  `Natjecanja_slika` varchar(100) DEFAULT NULL,
  `Natjecanja_brojSudionika` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Natjecanja_ID`),
  KEY `fk_Natjecanja_Kategorije1_idx` (`Kategorija_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `Natjecanja`
--

INSERT INTO `Natjecanja` (`Natjecanja_ID`, `Kategorija_ID`, `Natjecanja_status`, `Natjecanja_naziv`, `Natjecanja_datumKreiranja`, `Natjecanja_opis`, `Natjecanja_od`, `Natjecanja_do`, `Natjecanja_maxSudionika`, `Natjecanja_slika`, `Natjecanja_brojSudionika`) VALUES
(1, 1, 1, 'Web dizajn i programiranje', '2018-05-27 20:04:25', 'Natjecanje iz područja web dizajna i programiranja. Testirajte svoja znanja i usporedite se s drugim natjecateljima.', '2018-05-27 12:12:00', '2018-06-03 12:12:00', 150, 'tastatura.jpg', 30),
(2, 1, 1, 'PHP Hypertext Preprocessor', '2018-05-27 20:10:36', 'Natjecanje na temu PHP jezika. Natjecanje otvoreno do 1.6. 20:00!', '2018-05-25 11:11:00', '2018-06-01 20:00:00', 10, 'Php-Tutorials-for-beginner.jpg', 10),
(3, 1, 0, 'JavaScript', '2018-05-27 20:21:18', 'Natjecanje na temu programskog jezika JavaScript. POŽURITE: Samo 10 sudionika dozvoljeno! ', '2018-05-26 12:01:00', '2018-06-03 04:12:00', 10, 'learn_javascript_on_mac_thumb800.jpg', 11),
(4, 1, 0, 'HTML', '2018-05-27 20:26:32', 'Natjecanje u poznavanju jezika HTML (HyperText Markup Language). Natjecanje traje do 27.5. 10:00!', '2018-05-25 12:00:00', '2018-05-27 10:00:00', 150, 'html.jpg', 1),
(6, 2, 0, 'Poslovno odlučivanje', '2018-05-28 22:06:39', 'Natjecanje na temu poslovnog odlučivanja', '2018-05-15 12:00:00', '2018-05-28 10:00:00', 150, 'images.jpg', 0),
(7, 2, 1, 'Poduzetništvo', '2018-05-28 22:10:05', 'Natjecanje na temu poduzetništva', '2018-05-18 01:01:00', '2018-06-03 00:00:00', 100, 'Entrepreneurship.png', 13),
(8, 2, 0, 'Marketing', '2018-05-28 22:37:12', 'Natjecanje iz područja marketinga', '2018-05-02 01:01:00', '2018-05-17 01:02:00', 100, 'download.jpg', 0),
(9, 2, 1, 'Poslovno planiranje', '2018-05-28 22:39:12', 'Natjecanje na temu poslovnog planiranja', '2018-05-18 01:02:00', '2018-06-03 12:00:00', 150, 'Writing-a-Winning-Business-Plan_0.png', 11),
(10, 4, 1, 'Ustav RH', '2018-05-31 19:50:36', 'Natjecanje na temu ustava Republike Hrvatske.', '2018-05-31 14:30:00', '2018-06-10 19:00:00', 150, 'unnamed.png', 9),
(11, 4, 0, 'Zakon RH', '2018-05-31 19:53:41', 'Natjecanje na temu zakonodavnog sustava Republike Hrvatske.', '2018-05-10 14:30:00', '2018-05-21 10:00:00', 100, 'zakon.png', 0),
(12, 4, 0, 'Državno odvjetništvo', '2018-05-31 19:57:36', 'Ovo je natjecanje vezano uz državno odvjetništvo.', '2018-06-05 20:00:00', '2018-06-10 19:00:00', 50, '8934289.JPG', 0),
(13, 4, 0, 'MUP', '2018-05-31 19:59:54', 'Pitanja vezana uz Ministarstvno unutarnjih poslova!', '2018-06-05 10:00:00', '2018-06-20 09:00:00', 190, 'mup.png', 0),
(14, 1, 1, 'Programsko inženjerstvo', '2018-05-31 20:05:34', 'Natjecanje na temu programskog inženjerstva te pitanja vezana uz sintakstu C# jezika.', '2018-05-31 14:30:00', '2018-06-20 09:00:00', 150, 'SA23.jpg', 2),
(15, 4, 1, 'Sabor RH', '2018-05-31 20:18:56', 'Pitanja vezana uz prava saborskih zastupnika u Republici Hrvatskoj.', '2018-05-20 14:00:00', '2018-06-10 09:00:00', 120, 'Predstavljanje.jpg', 8),
(16, 4, 1, 'Ljudska prava', '2018-05-31 20:26:03', 'Pitanja na temu ljudskih prava u Republici Hrvatskoj.', '2018-05-31 14:30:00', '2018-06-11 11:00:00', 50, 'human-rights.png', 0),
(17, 3, 1, 'Organizacijsko planiranje', '2018-05-31 20:33:16', 'Pitanja na temu organizacije i organizacijskog planiranja u poslovanju.', '2018-05-10 14:30:00', '2018-06-10 09:00:00', 25, 'organization-tree.jpg', 2),
(18, 3, 1, 'Organizacijski resursi', '2018-05-31 20:35:36', 'Natjecanje na temu organizacijski resursa unutar poduzeća', '2018-05-10 11:30:00', '2018-05-23 05:00:00', 150, 'organization._resourcespng.png', 0),
(19, 3, 1, 'Neprofitne organizacije', '2018-05-31 20:37:25', 'Natjecanje vezano uz neprofitne organizacije i njihove ciljeve.', '2018-05-01 16:00:00', '2018-05-21 20:00:00', 150, 'non_profit.jpg', 0),
(20, 4, 1, 'Kazneni zakoni', '2018-05-31 20:56:00', 'Natjecanje na temu kaznenih zakona u Republici Hrvatskoj.', '2018-05-10 14:30:00', '2018-05-31 21:00:00', 190, 'crime_37.jpg', 0),
(21, 3, 1, 'Organizacijska struktura', '2018-05-31 20:59:40', 'Pitanja na temu organizacijske strukture poduzeća.', '2018-05-28 23:00:00', '2018-06-11 20:00:00', 190, 'office-organization-tree-chart-organizational.jpg', 2),
(22, 3, 1, 'Organizacija proizvodnje', '2018-05-31 21:02:28', 'Natjecanje iz područja proizvodnog sektora s organizacijskog aspekta.', '2018-05-20 11:30:00', '2018-06-25 19:00:00', 70, 'production.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Oglasi`
--

CREATE TABLE IF NOT EXISTS `Oglasi` (
  `Oglasi_ID` int(11) NOT NULL AUTO_INCREMENT,
  `VrstaOglasa_ID` int(11) NOT NULL,
  `Korisnici_ID` int(11) NOT NULL,
  `Oglasi_naziv` varchar(100) NOT NULL,
  `Oglasi_datumKreiranja` datetime NOT NULL,
  `Oglasi_opis` text NOT NULL,
  `Oglasi_URL` varchar(255) DEFAULT NULL,
  `Oglasi_odobren` tinyint(1) NOT NULL,
  `Oglasi_blokiran` tinyint(1) NOT NULL,
  `Oglasi_brojKlikova` int(11) NOT NULL,
  `Oglasi_slika` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Oglasi_ID`),
  KEY `fk_Oglasi_VrsteOglasa1_idx` (`VrstaOglasa_ID`),
  KEY `fk_Oglasi_Korisnici1_idx` (`Korisnici_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `Oglasi`
--

INSERT INTO `Oglasi` (`Oglasi_ID`, `VrstaOglasa_ID`, `Korisnici_ID`, `Oglasi_naziv`, `Oglasi_datumKreiranja`, `Oglasi_opis`, `Oglasi_URL`, `Oglasi_odobren`, `Oglasi_blokiran`, `Oglasi_brojKlikova`, `Oglasi_slika`) VALUES
(1, 4, 10, 'Poker komplet', '2018-05-30 05:08:28', 'Ukupno 200 komada čipova, metalna kutija i 2 špila karata.\r\nPotpuno novo i nekorišteno.\r\nTroškove dostave u iznosu 19,90 kn snosi kupac i potrebno ih je uplatiti zajedno sa cijenom seta.', 'https://www.njuskalo.hr/poker/poker-komplet-oglas-18951377', 0, 1, 7, 'poker-komplet-slika-66295535.jpg'),
(2, 5, 8, 'Playstation 4', '2018-05-29 22:31:35', 'Prodajem Playstation 4 u odličnom stanju. Kliknite me za više informacija.', 'https://www.njuskalo.hr/ps4-konzole/playstation-4-1000gb-2k15-model-rabljena-oglas-24083332', 1, 0, 9, '3082769.jpg'),
(3, 7, 2, 'Njuškalo', '2018-05-29 22:34:04', 'Pronađite sve što Vam treba na jednom mjestu, brzo i jeftino!', 'https://www.njuskalo.hr/', 0, 1, 5, 'index.jpg'),
(4, 6, 3, 'Mazda 6 CD125 CE', '2018-05-29 22:40:47', 'Prvi vlasnik. Jedan vozač. Garažiran.\r\nAuto kupljen u Hrvatskoj (Auto Arbanas). Svi servisi su napravljeni u ovlaštenom Mazda servisu (Auto Arbanas). ', 'https://www.njuskalo.hr/auti/mazda-6-cd125-ce-oglas-25316616', 0, 1, 9, 'mazda-6-cd125-ce-slika-94979562.jpg'),
(5, 4, 3, 'Domaći med', '2018-05-29 22:42:40', 'Prodajem domaći med iz vlastitog pčelinjaka, 100% prirodni!\r\nPčelinjak je smješten u prekrasnom dijelu Hrvatskog Zagorja, kaj je vidljivo i na priloženim fotografijama.', 'https://www.njuskalo.hr/domaci-med/domaci-med-vlastitog-pcelinjaka-oglas-24718703', 1, 0, 5, 'domaci_med.jpg'),
(6, 3, 7, 'Asus tablet 10.1', '2018-05-29 22:43:39', 'Ispraavan,bez ogrebotina po ekranu,16 gb kartica,futrola celular line,malo koristen.\r\nIPS ekran.', 'https://www.njuskalo.hr/tablet-pc/asus-tablet-10.1-model-k010-bijele-boje-ips-ekran-oglas-25564359', 0, 1, 5, 'asus-tablet.jpg'),
(7, 2, 9, 'BMW Gran Coupe 420d', '2018-05-29 22:48:21', 'Vozilo je u izvrsnom stanju, bez greške.\r\nRedovito održavano u ovlaštenom BMW servisu te je cijelu povijest vozila moguće provjeriti. Posjedujem 2 ključa.\r\nU vozilo nisu potrebna nikakva ulaganja!\r\n\r\n-Registriran do 3/2019 I plaćen godišnji porez.', 'https://www.njuskalo.hr/auti/bmw-gran-coupe-420d-sport-automatik-xenon-koza-sportska-sjedala-oglas-2', 0, 1, 6, 'bmw1.jpg'),
(8, 9, 5, 'Samsung S9 Plus', '2018-05-29 22:50:04', 'Nov zapakiran s 24mj jamstvom i racunom star 2 dana, neotpakiran, cijena: 4.799kn!', 'https://www.njuskalo.hr/samsung-galaxy-s9-plus/samsung-s9-plus-oglas-25650550', 1, 0, 5, 'samsung-s9-plus-slika-99754083.jpg'),
(9, 3, 5, 'Iphone 8+ bjeli', '2018-05-29 22:51:45', 'Odgovarm Samo na poziv bez zamjena', 'https://www.njuskalo.hr/iphone-8-plus/iphone-8-bjeli-vakumiran-garancija-sv', 1, 0, 9, 'iphone-8-.jpg'),
(10, 7, 4, 'BILJARSKI STOL AMERICAN MEHANIZAM', '2018-05-29 22:53:30', 'Na zetone. Proizvodi se u 3 dimenzije i vise boja.\r\nIgraca ploca (igracko polje) je kamena, unutrasnji delovi od sperploce\r\nU stolovima se nalaze mehanizmi sa mehanickim izbacivanjem kugli.', 'https://www.njuskalo.hr/biljar/biljarski-sto-american-mehanizam-oglas-22536985', 0, 1, 0, 'biljarski-stol-.jpg'),
(11, 5, 10, 'Dječja kolica Bebetto 3u1', '2018-05-29 22:54:49', 'Dječja kolica Bebetto 3u1 Vulcano u odličnom stanju, korištena samo 4 mjeseca, garancija vrijedi do 11 mjeseca 2018. Uz garanciju se dobije i račun. Tkanina je vodonepropusna na svim sjedalicama i košari kao i na zimskim pokrovima. ', 'https://www.njuskalo.hr/djecja-kolica/djecja-kolica-bebetto-3u1-vulcano-oglas-25592827', 1, 0, 4, 'djecja.jpg'),
(12, 7, 8, 'HP OMEN 17-w005ng', '2018-05-29 22:56:23', 'Intel Core i5-6300HQ Procesor (do 3,2 GHz), Quad-Core 43,2 cm (17") Full HD 16:9 LED Display, Webcam 8 GB RAM, 1.128 TB Hybrid, DVD snimač NVIDIA GeForce GTX 960M Grafička kartica (2048 MB), HDMI, USB 3.0, WLAN-ac, BT Windows 10 Home 64 Bit, Trajanje baterije do 15 h, 2,8 kg', 'https://www.njuskalo.hr/hp-prijenosnici/hp-omen-17-w005ng-i5-6300hq-1tb-hdd-128gb-ssd-fhd-gtx960m-wi', 0, 1, 4, 'hp-omen-17-w005ng.jpg'),
(13, 2, 7, 'HP Spectre Pro x360', '2018-05-29 22:57:30', 'OPIS UREĐAJA:\r\nIntel Core i7-6600U Procesor (do 3,4 GHz), Dual-Core 33,8 cm (13") 16:9 Touch LED Display (sjajni), Webcam 8 GB RAM, 512 GB SSD Intel HD 520 Grafička kartica, HDMI, miniDisplayport, USB 3.0, WLAN-ac, BT Windows 10 Pro 64 Bit, Trajanje baterije do 10 h, 1,5 kg', 'https://www.njuskalo.hr/hp-prijenosnici/hp-spectre-pro-x360-g2-v1b04ea-2in1-notebook-i7-6600u-qhd-wi', 0, 1, 7, 'hp-spectre-pro-x360.jpg'),
(14, 2, 2, 'Jacuzzi LODGE', '2018-05-31 18:39:48', 'Za 4 osobe (+ dječje sjedalo)\r\n20 hidromasažnih mlaznica\r\n10 blower mlaznica - puhaljke zraka (opcija)\r\nLED Podvodno svjetlo u više boja\r\nLED upravljački panel\r\nDodatna izolacija obloge – Winter Pro Kit (opcija)\r\nClear Ray UV lampa (filtracija)\r\nEl. grijač 3kW s cirkulacionom pumpom\r\nTermoizolacijski Jacuzzi® pokrov od umjetne kože', 'https://www.njuskalo.hr/bazeni/jacuzzi-lodge-hidromasazni-bazen-osmisljen-turizam-oglas-16865269', 0, 0, 6, 'jacuzzi.jpg'),
(15, 7, 3, 'Poliesterski bazen COMFORT', '2018-05-31 18:41:58', 'Bazen COMFORT s dimenzijama 7,50 x 3,70 x 1,55 m za prodaju!\r\n\r\nJamstvo:\r\nJamčimo 15 GARANCIJA za izgradnju bazena !!! I 2 godine JAMSTVO za boju bazena !!!', 'https://www.njuskalo.hr/bazeni/poliesterski-bazen-comfort-oprema-bazene-oglas-24194635', 0, 1, 10, 'poliesterski-bazen.jpg'),
(16, 3, 4, 'IPHONE X 64GB SILVER', '2018-05-31 18:43:24', 'Mogućnost izdavanja R-1 računa.\r\nDostavljamo po cijeloj Hrvatskoj sa HP Expressom, dostava na Vašu kućnu adresu drugi dan, mogućnost plaćanja pouzeć', 'https://www.njuskalo.hr/iphone-x/iphone-x-64gb-silver-boje-nov-samo-aktiviran-dostava-zg-r1-racun-og', 1, 0, 11, 'iphone-x-64gb-silver.jpg'),
(17, 9, 3, 'SAMSUNG J7 (2016)', '2018-05-31 18:45:18', 'NAPOMENA!!! RADI SE ISKLJUČIVO O DIJELOVIMA ZA SAMSUNG J7 2016, ODNOSNO EKRANU I TOUCHU SA IZMJENOM!', 'https://www.njuskalo.hr/mobiteli-oprema/samsung-galaxy-j710fn-j7-ekran-touch-originalu-izmjenom-ogla', 0, 1, 17, 'samsung-j7-2016.jpg'),
(18, 6, 4, 'HUAWEI P9', '2018-05-31 18:46:13', 'Prodajem huawei P9, star godinu i pol, garancija vrijedi do 9 mjeseca, u dobrom stanju,', 'https://www.njuskalo.hr/huawei-p9/huawei-p9-oglas-25671714', 1, 0, 7, 'huawei-p9.jpg'),
(19, 2, 7, 'iPhone 7 sva oprema', '2018-05-31 18:46:54', 'Prodajem iphone 7 sva oprema, racun Itd....\r\nGarancija istekla....\r\nIma nešto oštećenja po rubovima, sve vidljivo na slikama!\r\nMobitel funkcionira savršeno! ', 'https://www.njuskalo.hr/iphone-7/iphone-7-sva-oprema-2500kn-oglas-25628946', 0, 1, 7, 'iphone-7-sva-oprema.jpg'),
(20, 7, 7, 'HTC 12', '2018-05-31 18:47:43', '-novo ne koristeno, nikad upaljeno, izvadjeno samo radi slikanja\r\n-sve zastitne trakice na njemu\r\n-najnoviji zadnji model HTCa izasao pred par mjeseci\r\n-u slobodnoj prodaji 1800 kuna\r\n-32 GB', 'https://www.njuskalo.hr/htc-desire/htc-12-oglas-25671676', 1, 0, 6, 'htc-12.jpg'),
(21, 5, 7, 'MTB KCP CHRISSON', '2018-05-31 18:50:05', 'Bicikl njemačke proizvodnje, vrhunska Shimano i ostala oprema, star 18 mjeseci, kao iz trgovine, (prešao najviše 10 km), prodaje se zbog nekorištenja.\r\nTežina samo 15 kg, 30 brzina, za osobe visine od 170 do 190 cm.\r\nCijena 5300 Kn, ako dođete po njega do 03.06. onda samo 4600 Kn.', 'https://www.njuskalo.hr/mtb-bicikli/29-mtb-chrisson-hitter-fsf-alu-4-link-full-suspension-oglas-2543', 1, 0, 7, '29-mtb-kcp-chrisson.jpg'),
(22, 6, 7, 'BIANCHI Impulso 105', '2018-05-31 18:50:38', 'Prodajem navedeni bicikl u odličnom stanju. Veličina 61.', 'https://www.njuskalo.hr/trkaci-bicikli/bianchi-impulso-105-oglas-25057379', 0, 1, 7, 'bianchi-impulso.jpg'),
(23, 4, 7, 'Renault Clio 1,4', '2018-05-31 18:53:05', 'CD izmjenjivač\r\nel. podizanje prednjih stakala\r\nupravljač podesiv po visini\r\nservo upravljač\r\nsportska sjedala\r\n', 'https://www.njuskalo.hr/auti/renault-clio-1.4-16v-oglas-25626818', 0, 0, 7, 'renault-clio-1.4.jpg'),
(24, 8, 7, 'Hohner Atlantic IV', '2018-05-31 18:54:19', 'Prodajem harmoniku u tip top stanju.Kompletan servis napravljen kod Kučeka.Novi remeni,kofer.Moguca zamjena za aranzer(korg pa800 i sl.)', 'https://www.njuskalo.hr/harmonike/hohner-atlantic-iv-deluxe-oglas-25655860', 0, 1, 5, 'hohner-atlantic-iv.jpg'),
(25, 7, 7, 'M5 Shell set', '2018-05-31 18:55:25', 'Za preuzimanje iz Beča (ili okoline) se morate sami organizovati jer vam je verovatno poznato da robu više lično ne donosim. Zamene me ne zanimaju i rezervacije više nisu moguće.', 'https://www.njuskalo.hr/bubnjevi/pdp-dw-m5-shell-set-oglas-22907409', 0, 0, 4, 'pdp-dw-m5-shell-set.jpg'),
(26, 3, 7, 'Brazen Dynasty Vintage-T', '2018-05-31 18:56:12', 'Gitara telecaster oblika tijela sa tremolom, bezprijekorna izrada, stanje 10/10, debela i kvalitetna originalna torba.\r\nMagneti su dobri, mogućnost splitanja u single coil preko tone pota, roller sedla tako da lagana upotreba tremola ne šteti.', 'https://www.njuskalo.hr/elektricne-gitare/brazen-dynasty-vintage-t-oglas-24530383', 0, 1, 7, 'brazen-dynasty.jpg'),
(27, 9, 7, 'G-prim, bisernica', '2018-05-31 18:57:09', 'Prodajem g-prim u odličnom stanju, rad majstora Ivana Đuretića.', 'https://www.njuskalo.hr/tamburaski-instrumenti/g-prim-bisernica-oglas-25089659', 0, 1, 8, 'g-prim-bisernica.jpg'),
(28, 4, 7, 'Squier JAZZ BASS', '2018-05-31 18:58:06', 'Prodajem SQUIER VINTAGE MODIFIED JAZZ BASS, potpuno ispravan i uredan bez vidljivih znakova korištenja! Bez zamjena!', 'https://www.njuskalo.hr/bas-gitare/squier-jazz-bass-oglas-21658223', 0, 0, 3, 'squier-jazz-bass.jpg'),
(29, 2, 6, 'Low fog Eurolite', '2018-05-31 19:06:13', 'Mašina za niski dim Eurolite NB-150 1500W\r\nNova korištena 2 puta Račun-Garancija\r\nRadi na običan led ili suhi led + tekućina\r\nDigitalni display za regulaciju izlazne snage i trajanje + vanjski upravljač', 'https://www.njuskalo.hr/scenska-oprema/niski-dim-low-fog-eurolite-oglas-23498101', 1, 0, 7, 'low-fog-eurolite.jpg'),
(30, 7, 3, 'Stan, Zagreb (Dolčić)', '2018-05-31 19:10:58', 'Iznajmljuje se novouređeni stan (manja samostojeća  kuća) površine 55 m2. Stan je dvoetažni i sastoji se od ulaznog prostora, opremljene kuhinje, blagavaonice, dnevnog boravka, dvije spavaće sobe i kupaonice. ', 'https://www.njuskalo.hr/nekretnine/stan-zagreb-dolcic-55-m2-oglas-25609391', 0, 0, 4, 'stan-zagreb.jpg'),
(31, 9, 7, 'Stan: Split, 30 m2', '2018-05-31 19:12:00', 'Iznajmljuje se jednosoban stan,klimatiziran,lijepo opremljen,na duži rok ne pušačima', 'https://www.njuskalo.hr/nekretnine/stan-split-30-m2-brda-dugorocno-oglas-25669253', 0, 0, 0, 'stan-split.jpg'),
(32, 5, 7, 'NOVOUREĐEN 2-SOB. STAN', '2018-05-31 19:12:47', 'Stan se sastoji od ulaznog prostora (posjeduje ugradbeni ormar), prelijepog dnevnog boravka, kuhinje, blagovaonice, spavaće sobe, kupaonice.', 'https://www.njuskalo.hr/nekretnine/kvatric-derencinova-novoureden-2-sob-stan-41m2-oglas-25142283', 0, 0, 0, 'kvatric-derencinova.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `Pitanja`
--

CREATE TABLE IF NOT EXISTS `Pitanja` (
  `Pitanja_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Kategorije_ID` int(11) NOT NULL,
  `Korisnici_ID` int(11) NOT NULL,
  `Pitanja_pitanje` varchar(255) NOT NULL,
  `Pitanja_hint` varchar(255) DEFAULT NULL,
  `Pitanja_odgovor1` varchar(100) NOT NULL,
  `Pitanja_odgovor2` varchar(100) DEFAULT NULL,
  `Pitanja_odgovor3` varchar(100) DEFAULT NULL,
  `Pitanja_odgovor4` varchar(100) DEFAULT NULL,
  `Pitanja_bodovi` int(11) NOT NULL,
  PRIMARY KEY (`Pitanja_ID`),
  KEY `fk_Pitanja_Kategorije1_idx` (`Kategorije_ID`),
  KEY `fk_Pitanja_Korisnici1_idx` (`Korisnici_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `Pitanja`
--

INSERT INTO `Pitanja` (`Pitanja_ID`, `Kategorije_ID`, `Korisnici_ID`, `Pitanja_pitanje`, `Pitanja_hint`, `Pitanja_odgovor1`, `Pitanja_odgovor2`, `Pitanja_odgovor3`, `Pitanja_odgovor4`, `Pitanja_bodovi`) VALUES
(1, 1, 4, 'Tko je autor PHP-a?', '', 'Rasmus Lerdorf', NULL, NULL, NULL, 5),
(2, 1, 4, 'Kojom standardnom oznakom se otvara PHP?', '', '< ?php', '< ?', NULL, NULL, 2),
(3, 1, 4, 'Naziv PHP funkcije koja ispisuje postavke PHP sustava?', '', 'phpinfo();', 'phpinfo()', 'phpinfo', NULL, 3),
(4, 1, 4, 'Naziv PHP petlje koja je prilagođena za nizove?', '', ' foreach', NULL, NULL, NULL, 2),
(5, 1, 4, 'Naziv PHP klase koja se koristi za rad s MySQL bazom podataka?', '', 'mysqli', NULL, NULL, NULL, 3),
(6, 1, 4, 'Naziv PHP funkcije kojom se preuzima tip podatka neke varijable?', '', 'gettype', NULL, NULL, NULL, 3),
(7, 1, 4, 'Google Docs se nalazi u kojoj razini Web 2.0 aplikacija?', '', '1', 'prvoj', NULL, NULL, 3),
(8, 1, 4, 'Evidencija pogrešaka u PHP‐u obavlja se putem?', '', 'error_log', 'error_log()', 'error_log();', NULL, 3),
(9, 1, 4, 'Naziv PHP funkcije kojom se briše varijabla?', '', 'unset', NULL, NULL, NULL, 2),
(10, 1, 4, 'Naziv PHP funkcije kojom se postavlja vlastita funkcija za obradu pogrešaka?', '', 'set_error_handler();', 'set_error_handler()', 'set_error_handler', NULL, 5),
(11, 1, 5, 'Unutar kojeg HTML elementa se piše JS kod?', '', 'script', NULL, NULL, NULL, 2),
(12, 1, 5, 'Kako se pomoću JS-a ispisuje "Hello World" u alert boxu?', '', 'alert("Hello World");', 'alert("hello world");', NULL, NULL, 2),
(13, 1, 5, 'Pomoću kojih oznaka se piše komentar (one-line)?', '', '/', NULL, NULL, NULL, 2),
(14, 1, 5, 'Naziv JavaScript funkcije koja vrijednost argumenta pretvara u oblik za URL?', '', 'escape();', 'escape()', 'escape', NULL, 3),
(15, 1, 5, 'Naziv JavaScript atributa za broj elemenata u nizu/polju?', '', 'length', NULL, NULL, NULL, 2),
(16, 1, 6, 'HTML specijalni znak za neprekinutu, namjernu, prazninu je:', '', '& nbsp;', NULL, NULL, NULL, 4),
(17, 1, 6, 'Naziv atributa koji daje prijedlog opisa očekivane vrijednosti elementa u obrascu?', '', 'placeholder', NULL, NULL, NULL, 3),
(18, 1, 6, 'Koji se znak u adresi koristi za određivanje interne poveznice?', '', '#', NULL, NULL, NULL, 2),
(19, 1, 6, 'Koja vrijednost atributa target određuje da se dokument otvara u novom praznom prozoru?', '', '_blank', NULL, NULL, NULL, 2),
(20, 1, 6, 'Kojim se atributom određuje tekst koji je vidljiv na gumbu?', '', 'value', NULL, NULL, NULL, 3),
(21, 2, 3, 'Aktiva se sastoji od dvije vrste imovine. Kratkotrajne i?', '', 'Dugotrajna', 'Dugotrajne', 'dugotrajna', 'dugotrajne', 2),
(22, 2, 3, 'Ekonomičnost je odnos prihoda i?', '', 'Rashoda', 'rashoda', NULL, NULL, 2),
(23, 2, 3, 'Naziv otplate kojom se vraća kredit?', '', 'Anuitet', 'anuitet', NULL, NULL, 4),
(24, 2, 3, 'Stilovi poslovnog odlučivanja su autokratski i?', '', 'Demokratski', 'demokratski', NULL, NULL, 3),
(25, 2, 3, 'Što to mora biti jasno, precizno, nedvosmisleno i realno u poslovnom odlučivanju?', '', 'Odluka', 'odluka', NULL, NULL, 4),
(26, 4, 6, 'Kako se na engleskom kaže zakon?', 'https://translate.google.com/#hr/en/zakon', 'Law', 'law', 'lavv', NULL, 1),
(27, 4, 6, 'Radnici Niša nemaju što?', '', 'Prava', 'Pravo', 'prava', 'pravo', 2),
(28, 4, 6, 'Ženske osobe u RH idu u mirovinu u kojoj godini života?', '', '65', '65toj', '65-toj', NULL, 3),
(29, 4, 6, 'Vlast u RH se dijeli na zakonodavnu, izvršnu i?', '', 'sudsku', 'Sudsku', NULL, NULL, 3),
(30, 4, 6, 'Postoji li u RH smrtna kazna? (da/ne)', '', 'Ne', 'ne', NULL, NULL, 4),
(31, 3, 4, 'Koja je kratica za najpoznatiju vrstu ciljeva u organizacijama?', '', 'SMART', NULL, NULL, NULL, 5),
(32, 3, 4, 'Koja je najviša razina poslovanja?', '', 'Strateška', 'strateška', 'Strateska', 'strateska', 5),
(33, 3, 4, 'Kako se zove osoba koja je na vrhu svake tvrtke?', '', 'direktor', NULL, NULL, NULL, 3),
(34, 3, 4, 'Najvažnija stvar kod organizacije je?', '', 'planiranje', 'plan', NULL, NULL, 4),
(35, 3, 4, 'Postoji li razlika između vođe i šefa?', '', 'da', 'Da', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `PitanjaNatjecanja`
--

CREATE TABLE IF NOT EXISTS `PitanjaNatjecanja` (
  `Pitanja_ID` int(11) NOT NULL,
  `Natjecanja_ID` int(11) NOT NULL,
  PRIMARY KEY (`Pitanja_ID`,`Natjecanja_ID`),
  KEY `fk_PitanjaNatjecanja_Natjecanja1_idx` (`Natjecanja_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `PitanjaNatjecanja`
--

INSERT INTO `PitanjaNatjecanja` (`Pitanja_ID`, `Natjecanja_ID`) VALUES
(1, 1),
(3, 1),
(4, 1),
(5, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(1, 2),
(3, 2),
(4, 2),
(5, 2),
(6, 2),
(9, 2),
(10, 2),
(11, 3),
(12, 3),
(13, 3),
(14, 3),
(15, 3),
(1, 4),
(2, 4),
(3, 4),
(4, 4),
(5, 4),
(1, 6),
(2, 6),
(3, 6),
(4, 6),
(5, 6),
(16, 7),
(17, 7),
(18, 7),
(19, 7),
(20, 7),
(1, 8),
(2, 8),
(3, 8),
(4, 8),
(5, 8),
(16, 9),
(17, 9),
(18, 9),
(19, 9),
(20, 9),
(1, 10),
(2, 10),
(3, 10),
(4, 10),
(5, 10),
(1, 11),
(2, 11),
(3, 11),
(4, 11),
(5, 11),
(1, 12),
(2, 12),
(3, 12),
(4, 12),
(5, 12),
(1, 13),
(2, 13),
(3, 13),
(4, 13),
(5, 13),
(1, 14),
(5, 14),
(9, 14),
(11, 14),
(21, 14),
(24, 14),
(26, 15),
(27, 15),
(28, 15),
(29, 15),
(30, 15),
(26, 16),
(27, 16),
(28, 16),
(29, 16),
(30, 16),
(31, 17),
(32, 17),
(33, 17),
(34, 17),
(35, 17),
(31, 18),
(32, 18),
(33, 18),
(34, 18),
(35, 18),
(31, 19),
(32, 19),
(33, 19),
(34, 19),
(35, 19),
(26, 20),
(27, 20),
(28, 20),
(29, 20),
(30, 20),
(31, 21),
(32, 21),
(33, 21),
(34, 21),
(35, 21),
(31, 22),
(32, 22),
(33, 22),
(34, 22),
(35, 22);

-- --------------------------------------------------------

--
-- Table structure for table `PozicijaOglasa`
--

CREATE TABLE IF NOT EXISTS `PozicijaOglasa` (
  `PozicijaOglasa_ID` int(11) NOT NULL AUTO_INCREMENT,
  `ModeratorKategorije_ID` int(11) NOT NULL,
  `PozicijaOglasa_lokacija` int(11) NOT NULL,
  `PozicijaOglasa_naziv` varchar(50) NOT NULL,
  PRIMARY KEY (`PozicijaOglasa_ID`),
  KEY `fk_Pozicija_oglasa_ModeratorKategorije1_idx` (`ModeratorKategorije_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `PozicijaOglasa`
--

INSERT INTO `PozicijaOglasa` (`PozicijaOglasa_ID`, `ModeratorKategorije_ID`, `PozicijaOglasa_lokacija`, `PozicijaOglasa_naziv`) VALUES
(2, 8, 1, 'Pocetna_dolje_lijevo'),
(3, 10, 2, 'Pocetna_dolje_desno'),
(4, 9, 3, 'Statistika_dolje_lijevo'),
(5, 7, 4, 'Statistika_dolje_desno'),
(6, 7, 5, 'Natjecanja_dolje_lijevo'),
(7, 10, 6, 'Natjecanja_dolje_desno'),
(8, 7, 7, 'Natjecanja_centar');

-- --------------------------------------------------------

--
-- Table structure for table `SudionikNatjecanja`
--

CREATE TABLE IF NOT EXISTS `SudionikNatjecanja` (
  `SudionikNatjecanja_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Korisnici_ID` int(11) NOT NULL,
  `Natjecanje_ID` int(11) NOT NULL,
  `SudionikNatjecanja_nadimak` varchar(30) NOT NULL,
  `SudionikNatjecanja_rezultat` int(11) DEFAULT NULL,
  `SudionikNatjecanja_tocniOdgovori` varchar(25) DEFAULT NULL,
  `SudionikNatjecanja_pocetakRjesavanja` datetime DEFAULT NULL,
  `SudionikNatjecanja_zavrsetakRjesavanja` datetime DEFAULT NULL,
  PRIMARY KEY (`SudionikNatjecanja_ID`),
  UNIQUE KEY `SudionikNatjecanja_nadimak_UNIQUE` (`SudionikNatjecanja_nadimak`),
  KEY `fk_SudionikNatjecanja_Natjecanja1_idx` (`Natjecanje_ID`),
  KEY `fk_SudionikNatjecanja_Korisnici1` (`Korisnici_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `SudionikNatjecanja`
--

INSERT INTO `SudionikNatjecanja` (`SudionikNatjecanja_ID`, `Korisnici_ID`, `Natjecanje_ID`, `SudionikNatjecanja_nadimak`, `SudionikNatjecanja_rezultat`, `SudionikNatjecanja_tocniOdgovori`, `SudionikNatjecanja_pocetakRjesavanja`, `SudionikNatjecanja_zavrsetakRjesavanja`) VALUES
(1, 2, 2, 'Marija', 5, '1/7', '2018-05-29 05:22:49', '2018-05-29 05:22:54'),
(4, 2, 2, 'Ivan', 23, '7/7', '2018-05-29 05:25:14', '2018-05-29 05:26:08'),
(5, 2, 14, 'Petra', 5, '2/7', '2018-05-29 05:28:23', '2018-05-29 05:28:53'),
(6, 2, 9, 'Josip', 10, '3/5', '2018-05-29 05:30:42', '2018-05-29 05:31:37'),
(7, 2, 1, 'Ivona', 8, '3/8', '2018-05-29 05:34:56', '2018-05-29 05:35:27'),
(8, 2, 1, 'Julia', 14, '4/8', '2018-05-29 07:00:22', '2018-05-29 07:01:44'),
(9, 1, 2, 'Perica', 11, '3/7', '2018-05-31 17:22:10', '2018-05-31 17:22:47'),
(11, 1, 9, 'Lucija', 8, '3/5', '2018-05-31 17:39:13', '2018-05-31 17:39:48'),
(12, 1, 7, 'Miki', 11, '4/5', '2018-05-31 17:42:42', '2018-05-31 17:43:47'),
(13, 1, 7, 'Ljubica', 6, '2/5', '2018-05-31 17:52:40', '2018-05-31 17:52:57'),
(14, 1, 9, 'Petar', 2, '1/5', '2018-05-31 17:53:19', '2018-05-31 17:53:47'),
(15, 1, 1, 'Josipa', 7, '2/8', '2018-05-31 17:53:55', '2018-05-31 17:54:10'),
(16, 4, 3, 'Stjepan', 13, '3/5', '2018-05-30 06:29:20', '2018-05-30 06:30:40'),
(17, 3, 6, 'Marta', 11, '3/5', '2018-05-30 04:26:12', '2018-05-30 04:31:25'),
(18, 1, 8, 'Nikola', 0, '0/5', '2018-05-26 10:09:34', '2018-05-26 10:14:18'),
(19, 1, 4, 'Zvonimir', 0, '0/5', '2018-05-30 12:12:38', '2018-05-30 12:14:20'),
(20, 1, 3, 'Davor', 9, '2/5', '2018-05-27 14:19:39', '2018-05-27 14:26:40'),
(21, 6, 6, 'Mirta', 21, '5/5', '2018-05-30 07:42:14', '2018-05-30 07:51:25'),
(22, 8, 11, 'Nikolina', 13, '3/5', '2018-05-29 09:10:39', '2018-05-29 09:16:39'),
(23, 7, 9, 'Luka', 3, '1/5', '2018-05-26 12:29:28', '2018-05-26 12:36:43'),
(24, 10, 9, 'Kristina', 20, '5/5', '2018-05-27 19:29:55', '2018-05-27 19:53:37'),
(25, 1, 3, 'Karlo', 20, '4/5', '2018-05-31 00:01:18', '2018-05-31 00:08:58'),
(26, 6, 15, 'Darko', 7, '3/5', '2018-05-31 20:19:05', '2018-05-31 20:19:24'),
(29, 6, 10, 'Zmaj', 0, '0/5', '2018-05-31 20:21:34', '2018-05-31 20:21:44'),
(30, 6, 10, 'Mirko', 3, '1/5', '2018-05-31 20:22:00', '2018-05-31 20:22:29'),
(31, 6, 16, 'Davorka', 8, '2/5', '2018-05-31 20:22:36', '2018-05-31 20:23:00'),
(32, 6, 15, 'Zdravko', 7, '3/5', '2018-05-31 20:23:06', '2018-05-31 20:23:31'),
(33, 4, 17, 'Marijan', 13, '3/5', '2018-05-31 20:33:22', '2018-05-31 20:33:44'),
(34, 1, 17, 'Boško', 7, '2/5', '2018-05-25 04:22:37', '2018-05-25 04:27:40'),
(35, 1, 19, 'Gordana', 12, '5/5', '2018-05-27 06:32:11', '2018-05-27 06:39:41'),
(36, 1, 20, 'Radoslav', 9, '4/5', '2018-05-31 10:42:21', '2018-05-31 10:56:25'),
(37, 1, 22, 'Vanja', 13, '5/5', '2018-05-30 09:41:10', '2018-05-31 09:52:43'),
(38, 1, 21, 'Filip', 3, '1/5', '2018-05-24 11:45:21', '2018-05-24 11:55:33'),
(39, 1, 17, 'Jovan', 0, '0/5', '2018-05-28 09:12:42', '2018-05-31 09:27:38'),
(40, 1, 17, 'Miroslav', 0, '0/5', '2018-05-26 18:39:21', '2018-05-26 18:40:18'),
(41, 1, 13, 'Svetozar', 8, '3/5', '2018-05-29 21:34:18', '2018-05-29 21:41:40'),
(42, 1, 13, 'Spasoje', 13, '5/5', '2018-05-31 23:36:14', '2018-05-31 23:55:27'),
(43, 7, 12, 'Krkan1235', 5, '2/5', '2018-05-31 23:36:22', '2018-05-31 23:53:20'),
(44, 4, 13, 'Pipi1234', 8, '3/5', '2018-05-28 16:26:45', '2018-05-28 16:41:27'),
(45, 9, 19, 'G-aric', 0, '0/5', '2018-05-31 08:37:13', '2018-05-31 08:45:40'),
(46, 4, 20, 'Chos', 13, '5/5', '2018-05-31 05:38:22', '2018-05-31 05:49:25'),
(47, 10, 21, 'Cvetko', 9, '4/5', '2018-05-28 14:27:39', '2018-05-28 14:50:30'),
(48, 9, 21, 'Zagorec', 4, '2/5', '2018-05-31 18:31:32', '2018-05-31 18:51:25');

-- --------------------------------------------------------

--
-- Table structure for table `TipKorisnika`
--

CREATE TABLE IF NOT EXISTS `TipKorisnika` (
  `TipKorisnika_ID` int(11) NOT NULL AUTO_INCREMENT,
  `TipKorisnika_naziv` varchar(25) NOT NULL,
  `TipKorisnika_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`TipKorisnika_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `TipKorisnika`
--

INSERT INTO `TipKorisnika` (`TipKorisnika_ID`, `TipKorisnika_naziv`, `TipKorisnika_status`) VALUES
(1, 'Administrator', 1),
(2, 'Moderator', 1),
(3, 'Registrirani korisnik', 1),
(4, 'Neregistrirani korisnik', 1);

-- --------------------------------------------------------

--
-- Table structure for table `VrsteOglasa`
--

CREATE TABLE IF NOT EXISTS `VrsteOglasa` (
  `VrsteOglasa_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PozicijaOglasa_ID` int(11) NOT NULL,
  `VrsteOglasa_naziv` varchar(100) NOT NULL,
  `VrsteOglasa_trajanje` int(11) NOT NULL,
  `VrsteOglasa_brzinaIzmjene` int(11) NOT NULL,
  `VrsteOglasa_cijena` float NOT NULL,
  PRIMARY KEY (`VrsteOglasa_ID`),
  KEY `fk_VrsteOglasa_PozicijaOglasa1_idx` (`PozicijaOglasa_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `VrsteOglasa`
--

INSERT INTO `VrsteOglasa` (`VrsteOglasa_ID`, `PozicijaOglasa_ID`, `VrsteOglasa_naziv`, `VrsteOglasa_trajanje`, `VrsteOglasa_brzinaIzmjene`, `VrsteOglasa_cijena`) VALUES
(2, 8, 'Platinum oglas', 240, 15, 1500),
(3, 6, 'Silver oglas', 96, 10, 700),
(4, 5, 'Bronze oglas', 24, 5, 100),
(5, 2, 'One-hour oglas', 1, 10, 30),
(6, 3, '12-hours oglas', 12, 10, 100),
(7, 4, 'Gold oglas', 120, 10, 700),
(8, 5, '6-hours oglas', 6, 5, 200),
(9, 7, 'Cheap', 6, 2, 20),
(10, 8, 'Ultimate oglas', 720, 15, 2200);

-- --------------------------------------------------------

--
-- Table structure for table `ZahtjeviZaBlokiranjeOglasa`
--

CREATE TABLE IF NOT EXISTS `ZahtjeviZaBlokiranjeOglasa` (
  `ZahtjeviZaBlokiranjeOglasa_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Oglasi_ID` int(11) NOT NULL,
  `Korisnici_ID` int(11) NOT NULL,
  `Zahtjev_datumZahtjeva` datetime NOT NULL,
  `Zahtjev_razlog` text NOT NULL,
  `Zahtjev_zahtjevOdobren` tinyint(1) DEFAULT NULL,
  `Zahtjev_zahtjevPregledan` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ZahtjeviZaBlokiranjeOglasa_ID`),
  KEY `fk_ZahtjevZaBlokiranjeOglasa_Oglasi1_idx` (`Oglasi_ID`),
  KEY `fk_ZahtjevZaBlokiranjeOglasa_Korisnici1_idx` (`Korisnici_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `ZahtjeviZaBlokiranjeOglasa`
--

INSERT INTO `ZahtjeviZaBlokiranjeOglasa` (`ZahtjeviZaBlokiranjeOglasa_ID`, `Oglasi_ID`, `Korisnici_ID`, `Zahtjev_datumZahtjeva`, `Zahtjev_razlog`, `Zahtjev_zahtjevOdobren`, `Zahtjev_zahtjevPregledan`) VALUES
(1, 7, 4, '2018-05-30 16:11:11', 'Oglas je istekao.', 1, 1),
(2, 10, 4, '2018-05-30 20:18:03', 'Neprikladan i nebitan oglas.', 0, 1),
(3, 6, 4, '2018-05-30 20:19:33', 'Oglas je istekao te je neprimjeren.', 0, 1),
(4, 11, 4, '2018-05-30 20:23:17', 'Oglas je nestrukturiran i ne daje dovoljno informacija', 0, 1),
(5, 3, 9, '2018-05-31 19:22:55', 'Oglas je neprimjeren.', NULL, 0),
(6, 13, 10, '2018-05-31 19:23:10', 'Oglas je istekao.', 0, 1),
(7, 25, 7, '2018-05-31 19:24:50', 'Nepristojno izražavanje u opisu oglasa.', NULL, 0),
(8, 7, 10, '2018-05-31 19:25:05', 'Link na oglas ne radi. Tj oglas više ne vrijedi.', 0, 1),
(9, 4, 8, '2018-05-31 19:25:16', 'Neprimjeren oglas.', 0, 1),
(10, 27, 8, '2018-05-31 19:25:23', '-', 0, 1),
(11, 17, 7, '2018-05-31 19:25:42', 'Krivo navođenje u oglasu.', 0, 1),
(12, 17, 7, '2018-05-31 19:26:19', 'Kratak i nejasan opis.', 1, 1),
(13, 7, 7, '2018-05-31 19:26:30', 'Oglas je istekao.', 0, 1),
(14, 16, 9, '2018-05-31 19:26:39', '-', 0, 1),
(15, 31, 7, '2018-05-31 19:27:03', 'Oglas je neprimjeren i preskup.', NULL, 0),
(16, 22, 6, '2018-05-31 19:27:26', 'Vlasnik je kontaktiran te se ponaša jako nepristojno i nekulturno.', 1, 1),
(17, 12, 7, '2018-05-31 19:27:37', 'Oglas je preskup.', 1, 1),
(18, 4, 5, '2018-05-31 19:27:46', 'Oglas je istekao.', 1, 1),
(19, 5, 6, '2018-05-31 19:28:24', 'Click bait.', 0, 1),
(20, 29, 7, '2018-05-31 19:28:39', 'Nebitan oglas', NULL, 0),
(21, 1, 8, '2018-05-31 19:28:49', 'Prodano!', 1, 1),
(22, 20, 10, '2018-05-31 19:29:34', 'Oglas još uvijek aktivan a stvar na oglasu je prodana.', NULL, 0),
(23, 15, 4, '2018-05-31 19:29:50', 'Preskupo i neprikladno', 1, 1),
(24, 10, 7, '2018-05-31 19:29:58', 'prodano..', 1, 1),
(25, 5, 8, '2018-05-31 19:30:23', 'KRAĐA', NULL, 0),
(26, 14, 5, '2018-05-31 19:30:44', 'Preskupo i oglas je neprikladan', 0, 1),
(27, 3, 7, '2018-05-31 19:30:53', 'Prodano', 1, 1),
(28, 13, 7, '2018-05-31 19:31:01', '-', NULL, 0),
(29, 21, 4, '2018-05-31 20:34:04', 'Oglas je prodan', NULL, 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `DnevnikRada`
--
ALTER TABLE `DnevnikRada`
  ADD CONSTRAINT `fk_DnevnikRada_Korisnici1` FOREIGN KEY (`Korisnici_ID`) REFERENCES `Korisnici` (`Korisnici_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Korisnici`
--
ALTER TABLE `Korisnici`
  ADD CONSTRAINT `fk_Korisnici_Tip_korisnika1` FOREIGN KEY (`TipKorisnika_ID`) REFERENCES `TipKorisnika` (`TipKorisnika_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ModeratorKategorije`
--
ALTER TABLE `ModeratorKategorije`
  ADD CONSTRAINT `fk_ModeratorKategorije_Kategorije1` FOREIGN KEY (`Kategorije_ID`) REFERENCES `Kategorije` (`Kategorije_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ModeratorKategorije_Korisnici1` FOREIGN KEY (`Korisnici_ID`) REFERENCES `Korisnici` (`Korisnici_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Natjecanja`
--
ALTER TABLE `Natjecanja`
  ADD CONSTRAINT `fk_Natjecanja_Kategorije1` FOREIGN KEY (`Kategorija_ID`) REFERENCES `Kategorije` (`Kategorije_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Oglasi`
--
ALTER TABLE `Oglasi`
  ADD CONSTRAINT `fk_Oglasi_Korisnici1` FOREIGN KEY (`Korisnici_ID`) REFERENCES `Korisnici` (`Korisnici_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Oglasi_VrsteOglasa1` FOREIGN KEY (`VrstaOglasa_ID`) REFERENCES `VrsteOglasa` (`VrsteOglasa_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `Pitanja`
--
ALTER TABLE `Pitanja`
  ADD CONSTRAINT `fk_Pitanja_Kategorije1` FOREIGN KEY (`Kategorije_ID`) REFERENCES `Kategorije` (`Kategorije_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Pitanja_Korisnici1` FOREIGN KEY (`Korisnici_ID`) REFERENCES `Korisnici` (`Korisnici_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `PitanjaNatjecanja`
--
ALTER TABLE `PitanjaNatjecanja`
  ADD CONSTRAINT `fk_PitanjaNatjecanja_Pitanja1` FOREIGN KEY (`Pitanja_ID`) REFERENCES `Pitanja` (`Pitanja_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_PitanjaNatjecanja_Natjecanja1` FOREIGN KEY (`Natjecanja_ID`) REFERENCES `Natjecanja` (`Natjecanja_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `PozicijaOglasa`
--
ALTER TABLE `PozicijaOglasa`
  ADD CONSTRAINT `fk_Pozicija_oglasa_ModeratorKategorije1` FOREIGN KEY (`ModeratorKategorije_ID`) REFERENCES `ModeratorKategorije` (`ModeratorKategorije_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `SudionikNatjecanja`
--
ALTER TABLE `SudionikNatjecanja`
  ADD CONSTRAINT `fk_SudionikNatjecanja_Korisnici1` FOREIGN KEY (`Korisnici_ID`) REFERENCES `Korisnici` (`Korisnici_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SudionikNatjecanja_Natjecanja1` FOREIGN KEY (`Natjecanje_ID`) REFERENCES `Natjecanja` (`Natjecanja_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `VrsteOglasa`
--
ALTER TABLE `VrsteOglasa`
  ADD CONSTRAINT `fk_VrsteOglasa_PozicijaOglasa1` FOREIGN KEY (`PozicijaOglasa_ID`) REFERENCES `PozicijaOglasa` (`PozicijaOglasa_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `ZahtjeviZaBlokiranjeOglasa`
--
ALTER TABLE `ZahtjeviZaBlokiranjeOglasa`
  ADD CONSTRAINT `fk_ZahtjevZaBlokiranjeOglasa_Korisnici1` FOREIGN KEY (`Korisnici_ID`) REFERENCES `Korisnici` (`Korisnici_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ZahtjevZaBlokiranjeOglasa_Oglasi1` FOREIGN KEY (`Oglasi_ID`) REFERENCES `Oglasi` (`Oglasi_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
