-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2015 at 08:37 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `saint_joseph`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `user_pass` varchar(20) NOT NULL,
  `full_name` text,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user_name`, `user_pass`, `full_name`, `update_time`, `created_time`) VALUES
(7, 'ben', '*23AE809DDACAF96AF0F', 'Biniam Kassahun', '2015-04-30 17:42:36', '2015-04-30 10:42:36'),
(34, 'sjsadmin', '*CE2618670420A28D6B7', 'Saint Joseph Admins', '2015-10-06 09:48:40', '2015-10-06 12:48:40');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
`id` int(11) NOT NULL,
  `title` varchar(45) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `author` varchar(45) NOT NULL,
  `publisher` varchar(45) NOT NULL,
  `publish_year` varchar(8) NOT NULL,
  `publish_address` varchar(45) NOT NULL,
  `call_id` varchar(8) NOT NULL,
  `copy_number` int(11) NOT NULL,
  `shelf_or_store` enum('store','shelf') NOT NULL,
  `update_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Created_Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=865 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `cat_id`, `author`, `publisher`, `publish_year`, `publish_address`, `call_id`, `copy_number`, `shelf_or_store`, `update_time`, `Created_Date`) VALUES
(6, 'T is for Trespass', 10, 'Grafton, Sue', 'Penguine books ltd.', '2012', 'U.S.A', 'FIC-2035', 1, 'shelf', '2015-05-26 06:44:27', '2015-05-26 13:44:27'),
(7, 'The Drowned Cities', 10, 'Baclgalupi, paolo', 'Hachettr Book', '2012', 'U.S.A', 'FIC-2034', 1, 'shelf', '2015-05-26 06:44:27', '2015-05-26 13:44:27'),
(8, 'The elegance of the headgehog', 10, 'Barbery, Muriel', 'Thirteeth Printing', '2008', 'Canada', 'FIC-2033', 1, 'shelf', '2015-05-26 06:44:27', '2015-05-26 13:44:27'),
(9, 'Bood on my hands', 0, 'Strasser, Todd', 'Egmount USA 2011', '2010', 'U.S.A', 'FIC-2032', 1, 'shelf', '2015-05-26 06:44:28', '2015-05-26 13:44:28'),
(10, 'The other side of the Island', 10, 'Goodman, Allegra', 'Penguine Group', '2008', 'U.S.A', 'FIC-2031', 1, 'shelf', '2015-05-26 06:44:28', '2015-05-26 13:44:28'),
(11, 'The cove', 10, 'Rash,Ron', 'hareper collins publishing', '2012', 'usa', 'FIC-29', 0, 'shelf', '2015-06-10 08:31:07', '2015-06-02 09:05:36'),
(19, 'The goldencompass', 10, 'pullman,philip', 'pullman,philip', '1996', 'U.S.A', 'fic-2030', 1, 'shelf', '2015-06-02 12:34:23', '2015-06-02 09:34:23'),
(26, 'undone', 10, 'Slaughter,karin', 'Karin sloughter', '2010', 'USA', 'FIC-494', 3, 'shelf', '2015-06-02 14:36:35', '2015-06-02 11:36:35'),
(27, 'singing boy', 10, 'MCforland, Dennis', 'Dennis,MCforland', '2001', 'USA', 'fic-495', 1, 'shelf', '2015-06-10 08:30:47', '2015-06-03 12:39:41'),
(28, 'destiny', 10, 'Shields,Gillian', 'karin,slaughter', '2012', 'USA', 'FIC-496', 1, 'shelf', '2015-06-10 08:30:28', '2015-06-10 06:03:52'),
(30, 'Buffy the vampile slayer', 10, 'Massie, Elizzabeth', 'pocket,pulse', '1999', 'USA', 'fic-497', 1, 'shelf', '2015-06-10 08:30:16', '2015-06-10 06:11:16'),
(31, 'summer, and Bird', 10, 'Catmull,Katherine', 'penguin group', '2012', 'USA', 'fic-498', 1, 'shelf', '2015-06-10 08:30:03', '2015-06-10 06:26:46'),
(32, 'year of wonders', 10, 'Brooks,Geraldine', 'geraidon,Brooks', '2001', 'USA', '', 1, 'shelf', '2015-06-10 08:29:45', '2015-06-10 06:29:16'),
(33, 'Killer weekend', 10, 'Pearson,Ridley', 'Berkely', '2008', 'USA', 'fic-499', 1, 'shelf', '2015-06-10 08:35:47', '2015-06-10 06:35:33'),
(34, 'Gustave flaubert', 10, 'Bovary,Madame', 'penguin group', '2012', 'USA', 'fic-500', 1, 'shelf', '2015-06-10 08:39:33', '2015-06-10 06:39:16'),
(35, 'the Gunslinger', 10, 'King,Stephen', 'penguuin books', '2003', 'USA', 'FIC-501', 1, 'shelf', '2015-06-10 08:44:54', '2015-06-10 06:44:43'),
(36, 'Woods women', 10, 'Labastille,Anne', 'Anne, Labastille', '1991', 'USA', 'FIC-503', 1, 'shelf', '2015-06-10 08:52:27', '2015-06-10 06:52:13'),
(37, 'Daniel half human', 10, 'Chotjewitz,David', 'simon, pulse', '2006', 'Germany', 'fic-504', 1, 'shelf', '2015-06-10 09:04:14', '2015-06-10 06:57:53'),
(38, 'kill Alex Cross', 10, 'Patterson,James', 'Jemes,Patterson', '2012', 'USA', 'FIC-505', 1, 'shelf', '2015-06-10 09:10:15', '2015-06-10 07:09:57'),
(39, 'THE ARCTIC INCIDENT', 10, 'Fowl,Artemis', 'Eoin Colfer', '2002', 'USA', 'FIC-506', 1, 'store', '2015-06-10 10:14:32', '2015-06-10 07:14:32'),
(40, 'Paid and loving eyes', 10, 'Gash,Jonathan', 'Jonathan,Gash', '1993', 'Great British', 'fic-507', 1, 'store', '2015-06-10 10:20:11', '2015-06-10 07:20:11'),
(41, 'Dragon blood', 10, 'Yane,Yolen', 'deiacorte press', '1982', 'USA', 'fic-508', 1, 'store', '2015-06-10 10:32:55', '2015-06-10 07:32:55'),
(42, 'Scar night', 0, 'Campbell,Alan', 'bantam,dell', '2007', 'USA', 'fic-509', 1, 'shelf', '2015-06-10 09:45:03', '2015-06-10 07:43:22'),
(43, 'kira-kira', 10, 'Kadohata,Cynthia', 'cynthia,kadohata', '2004', 'USA', 'fic-10', 1, 'shelf', '2015-06-10 09:49:32', '2015-06-10 07:43:22'),
(50, 'Star crossed love', 10, 'cadwallader,sharon', 'Bantam books', '1987', 'USA', 'fic-511', 1, 'store', '2015-06-11 11:00:12', '2015-06-11 08:00:12'),
(51, 'Matt Jensen the last mountain', 0, 'Johnston,William W', 'Kensington corp', '2010', 'USA', 'fic-513', 1, '', '2015-06-11 13:04:04', '2015-06-11 10:04:04'),
(52, 'hidden prey', 0, 'Sandford,John', 'Berkely pub.', '2005', 'USA', 'fic-514', 1, '', '2015-06-11 13:04:04', '2015-06-11 10:04:04'),
(53, 'return to Willow lake', 0, 'Wiggs,Susan', 'Susan,Wiggs', '2012', 'USA', 'fic-515', 1, '', '2015-06-11 13:04:04', '2015-06-11 10:04:04'),
(54, 'the street lawyer', 0, 'Grisham,John', 'Bantam Dell', '1998', 'canada', 'fic-516', 1, '', '2015-06-11 13:04:04', '2015-06-11 10:04:04'),
(55, 'fear nothig', 0, 'kootz,Dean', 'Bantam Dell', '1998', 'USA', 'fic-517', 1, '', '2015-06-11 13:04:04', '2015-06-11 10:04:04'),
(56, 'the future at war', 0, 'Sword,Orion', 'Baen pu.En', '1980', 'USA', 'fic-518', 1, '', '2015-06-11 13:04:04', '2015-06-11 10:04:04'),
(57, 'departement 19', 0, 'Hill,Will', 'Harper Collins', '2012', 'USA', 'fic-519', 1, '', '2015-06-11 13:04:04', '2015-06-11 10:04:04'),
(58, 'saving the world', 0, 'Patterson,JAMES', 'suejack.inc', '2008', 'USA', 'fic-520', 1, '', '2015-06-11 13:04:04', '2015-06-11 10:04:04'),
(59, 'the sins of viscount southerland', 0, 'James,Samantha', 'sand', '2011', 'USA', 'fic-521', 1, '', '2015-06-11 13:04:04', '2015-06-11 10:04:04'),
(60, 'the last Juror', 0, 'Grisham,John', 'Bantam Dell', '2004', 'canada', 'fic-522', 1, '', '2015-06-11 13:04:05', '2015-06-11 10:04:05'),
(61, 'the litigators', 0, 'Grisham,John', 'Belfry Holdings', '2012', 'USA', 'fic-523', 1, '', '2015-06-11 13:04:05', '2015-06-11 10:04:05'),
(73, 'endlessly', 0, 'White,Kiersten', '', '2012', '', 'fic-524', 1, '', '2015-06-11 15:09:39', '2015-06-11 12:09:39'),
(74, 'I like it like that a gossip girl', 0, 'Ziegesar cecily von', 'An Alloy comp.', '2004', '', 'fic-525', 1, '', '2015-06-11 15:09:39', '2015-06-11 12:09:39'),
(75, 'fearless missing', 0, 'Pascal,Francine', 'pocket books', '2001', 'USA', 'FIC-526', 1, '', '2015-06-11 15:09:39', '2015-06-11 12:09:39'),
(76, 'the second summer ofth sisterhood', 0, 'Brashars, Ann', 'dell laurel.leaf', '2003', 'USA', 'fic-527', 1, '', '2015-06-11 15:09:39', '2015-06-11 12:09:39'),
(77, 'monster', 0, 'Deanmyers,Walter', 'WalterDean myears', '1999', 'USA', 'fic-528', 1, '', '2015-06-11 15:09:39', '2015-06-11 12:09:39'),
(78, 'under world blood enemy', 0, 'Cox,Greg', 'pocket books', '2004', 'USA', 'fic-529', 1, 'shelf', '2015-06-12 08:55:04', '2015-06-11 12:09:39'),
(79, 'fobbit', 10, 'Abrams,David', 'David Abrams', '2012', 'Canada', 'fic-530', 1, 'store', '2015-06-12 08:53:11', '2015-06-12 05:53:11'),
(80, 'Witch fider dawn of the demontide', 10, 'Hussey,William', 'William,Hussey', '2010', 'Britain', 'fic-531', 1, 'store', '2015-06-12 09:04:12', '2015-06-12 06:04:12'),
(81, 'metawars fight for the future', 10, 'Norton,Jeff', 'awesome media and enter.', '2012', 'Great British', 'fic-532', 1, 'store', '2015-06-12 09:10:57', '2015-06-12 06:10:57'),
(82, 'nation on the day the world ends', 10, 'Pratchett,Terry', 'random house', '2009', 'uk', 'fic-533', 2, 'store', '2015-06-12 09:46:14', '2015-06-12 06:46:14'),
(83, 'secrets of tamarlnd', 10, 'Aguiar,Nadia', 'penguin group', '2010', 'Great British', 'fic-534', 1, 'store', '2015-06-12 09:50:23', '2015-06-12 06:50:23'),
(86, 'Secret breakers the power of three', 10, 'Dennis, H.L', 'Hodder childeren books', '2012', 'Great British', 'fic-537', 3, 'store', '2015-06-15 15:32:12', '2015-06-15 12:32:12'),
(87, 'the slayer chronicles second chance', 10, 'Brewer,Heather', 'Heather,Brewer', '2012', 'USA', 'fic-538', 1, 'store', '2015-06-15 14:36:23', '2015-06-15 12:35:24'),
(88, 'I know what you did last summer', 10, 'Duncan,Lois', 'Bantam Doubleday dell', '1997', 'USA', 'fic-539', 1, 'store', '2015-06-15 15:39:40', '2015-06-15 12:39:40'),
(89, 'deepen', 10, 'Brian, Lois', '', '2009', '', 'fic-540', 1, 'store', '2015-06-15 16:08:11', '2015-06-15 13:08:11'),
(90, 'burnig emerald the combion chronicles', 10, 'Reed,Jaime', 'kensington pub.cor.', '2012', 'UAS', 'FIC-541', 1, 'store', '2015-06-15 16:15:43', '2015-06-15 13:15:43'),
(91, 'first date', 10, 'Mcgee,Krista', 'Krista Mcgee', '2011', 'USA', 'fic-542', 1, 'store', '2015-06-15 16:20:41', '2015-06-15 13:20:41'),
(92, 'fearless tear', 10, 'Pascal,Francine', 'pocket pulse', '2001', 'USA', 'fic-543', 1, 'store', '2015-06-15 16:30:22', '2015-06-15 13:30:22'),
(93, 'killer weekend', 10, 'Pearson,Ridley', 'penguin group', '2007', 'USA', 'fic-544', 1, 'store', '2015-06-15 16:36:47', '2015-06-15 13:36:47'),
(94, 'the boy of summer', 10, 'Kahn,Roger', 'Roger,Kahn', '2006', 'USA', 'fic-545', 1, 'store', '2015-06-15 16:41:37', '2015-06-15 13:41:37'),
(95, 'Jumped', 10, 'Williams-Gorcia,Rita', 'Rita,Williams', '2009', '', 'fic-546', 1, 'store', '2015-06-16 08:59:15', '2015-06-16 05:59:15'),
(113, 'forest mage', 0, 'Hobb,Robin', 'Harper Collins', '2007', 'USA', 'fic-547', 1, '', '2015-06-16 10:40:51', '2015-06-16 07:40:51'),
(114, 'voyages from tongan villages', 0, 'A.small,Cathy', 'corneii universty press', '1997', 'USA', 'fic-549', 1, '', '2015-06-16 10:40:51', '2015-06-16 07:40:51'),
(115, 'wish', 0, 'Bullen,Alexander', 'point an importantof sch.inc', '2010', '', 'fic-550', 1, '', '2015-06-16 10:40:52', '2015-06-16 07:40:52'),
(116, 'barly to death barly to rise a nouel', 0, 'Harrison, Kim', 'Harper Collins', '2010', 'newyok', 'fic-551', 1, '', '2015-06-16 10:40:52', '2015-06-16 07:40:52'),
(117, 'The spy princess', 0, 'Smith, Sherwood', 'penguin group', '2012', 'USA', 'fic-552', 1, '', '2015-06-16 10:40:52', '2015-06-16 07:40:52'),
(140, 'calico Joe', 0, 'Grisham,John', 'Beltry Holdings inc', '2012', 'USA', 'fic-553', 1, '', '2015-06-16 11:06:14', '2015-06-16 08:06:14'),
(164, 'Badlands brid', 0, 'Wood,Adrianne', 'pocket books', '2012', 'USA', 'fic-555', 1, '', '2015-06-16 16:14:36', '2015-06-16 13:14:36'),
(165, 'catch or releas', 0, 'Woolston,Blyth', '', '2012', '', 'fic-556', 1, '', '2015-06-16 16:14:36', '2015-06-16 13:14:36'),
(166, 'shellings', 0, 'Almond,David', 'dell laurel-leaf', '1999', 'USA', 'fic-557', 1, '', '2015-06-16 16:14:36', '2015-06-16 13:14:36'),
(167, 'the dead girl friend', 0, 'Stine,R.L', 'Oxford univeristy press', '2010', '', 'fic-558', 1, '', '2015-06-16 16:14:36', '2015-06-16 13:14:36'),
(168, 'where I belong', 0, 'Cross,Gillian', '', '', '', 'fic-559', 1, '', '2015-06-16 16:14:36', '2015-06-16 13:14:36'),
(169, 'the spooks blood', 0, 'Delaney,Joseph', 'Joseph, Delaney', '2012', 'GREAT BRTAIN', 'fic-560', 1, '', '2015-06-16 16:14:36', '2015-06-16 13:14:36'),
(170, 'The Jungle vampire', 0, 'Boys,Beastly', 'Simon and schuter', '2011', 'UK', 'fic-561', 1, '', '2015-06-16 16:14:36', '2015-06-16 13:14:36'),
(171, 'the Obsidian,Mirror', 0, 'Fisher,Catherine', 'Hodder CHILDERN BOOKS', '2012', 'GREAT BRTAIN', 'fic-562', 1, '', '2015-06-16 16:14:36', '2015-06-16 13:14:36'),
(172, 'metawars the dead are rising', 0, 'Norton,Jeff', 'orchard books', '2012', 'GREAT BRTAIN', 'fic-563', 1, '', '2015-06-16 16:14:36', '2015-06-16 13:14:36'),
(173, 'the chronicles of avantia fire and fury', 0, 'Blade,Adam', '', '2011', 'GREAT BRTAIN', 'fic-564', 1, '', '2015-06-16 16:14:37', '2015-06-16 13:14:37'),
(207, 'rose and the sliver Ghost', 0, 'Webb,Holly', 'orchard books', '2011', 'UK', 'fic-565', 1, '', '2015-06-18 11:57:42', '2015-06-18 08:57:42'),
(208, 'minerva clark getsaclue', 0, 'Karbo,Karen', 'Bloombury pub', '2005', 'Great Brtain', 'fic-567', 1, '', '2015-06-18 11:57:42', '2015-06-18 08:57:42'),
(209, 'the night rainbow', 0, 'King,Claire', 'Bloombury pub', '2013', 'GREAT BRTAIN', 'fic-568', 1, '', '2015-06-18 11:57:42', '2015-06-18 08:57:42'),
(210, 'ultraviolet', 0, 'Anderson,Rj', 'orchard books', '2000', 'GREAT BRTAIN', 'fic-569', 1, '', '2015-06-18 11:57:43', '2015-06-18 08:57:43'),
(211, 'fire light', 0, 'Jordan,Sophie', 'Hodder CHILDERN BOOKS', '2010', 'GREAT BRTAIN', 'fic-570', 1, '', '2015-06-18 11:57:43', '2015-06-18 08:57:43'),
(250, 'the Obsidian,Mirror', 0, 'Fisher,Catherine', 'HOdder CHILDERN BOOKS', '2012', 'uk', 'fic-571', 2, '', '2015-06-18 16:33:09', '2015-06-18 13:33:09'),
(251, 'mission survival gold of the Gods', 0, 'Grylls,Bear', 'Random house group', '2008', 'UK', 'fic-572', 1, '', '2015-06-18 16:33:09', '2015-06-18 13:33:09'),
(252, 'tight rope', 0, 'Cross,Gillian', 'oxford universty press', '2010', 'GREAT BRTAIN', 'fic-574', 1, '', '2015-06-18 16:33:10', '2015-06-18 13:33:10'),
(253, 'girl stolen', 0, 'Henery,April', 'Henery, Holt and com.llc', '2010', 'USA', 'fic-575', 1, '', '2015-06-18 16:33:10', '2015-06-18 13:33:10'),
(254, 'born round', 0, 'Brum, Frank', 'penguin group', '2009', 'USA', 'fic-576', 1, '', '2015-06-18 16:33:10', '2015-06-18 13:33:10'),
(255, 'Beastly', 0, 'Flinn, Alex', 'Harper Collins', '2007', 'newyok', 'fic-577', 1, '', '2015-06-18 16:33:10', '2015-06-18 13:33:10'),
(256, 'the other world', 0, 'Kogler,Jennifer anne', 'Horper Collins', '2008', '', 'fic-578', 1, '', '2015-06-18 16:33:10', '2015-06-18 13:33:10'),
(257, 'where I belong', 0, 'Cross,Gillian', 'Oxford press', '2010', 'GREAT BRTAIN', 'fic-579', 1, '', '2015-06-18 16:33:10', '2015-06-18 13:33:10'),
(258, 'burid', 0, 'Bowler,Jim', 'Hodder CHILDERN BOOKS', '2007', 'UK', 'fic-580', 1, '', '2015-06-18 16:33:10', '2015-06-18 13:33:10'),
(259, 'mad dogs', 0, 'Muchamore,Robert', 'Joanna Nadian', '2009', 'GREAT BRTAIN', 'fic-581', 1, '', '2015-06-18 16:33:10', '2015-06-18 13:33:10'),
(260, 'my not simple life', 0, 'Madin,Joanna', 'Hodder CHILDERN BOOKS', '2004', 'UK', 'fic-582', 1, '', '2015-06-18 16:33:10', '2015-06-18 13:33:10'),
(261, 'the recruit', 0, 'Muchamore,Robert', '', '2012', 'GREAT BRTAIN', 'fic-583', 1, '', '2015-06-18 16:33:10', '2015-06-18 13:33:10'),
(312, 'metawars the dead are rising', 0, 'Norton,Jeff', 'awesome midea', '2012', 'GREAT BRTAIN', 'fic-584', 1, '', '2015-06-24 12:21:27', '2015-06-24 09:21:27'),
(313, 'the golden compass', 0, 'Pullman,phillip', 'scholastic UK', '2005', 'UK', 'fic-585', 1, '', '2015-06-24 12:21:27', '2015-06-24 09:21:27'),
(314, 'swift', 0, 'Anderson,Rj', 'orchard books', '2012', 'GREAT BRTAIN', 'fic-586', 1, '', '2015-06-24 12:21:27', '2015-06-24 09:21:27'),
(315, 'heaven', 0, 'Marzi,Christoph', 'Arena verlag Gmblt', '2009', 'GREAT BRTAIN', 'fic-587', 1, '', '2015-06-24 12:21:27', '2015-06-24 09:21:27'),
(316, 'Doctor who dead of winter', 0, 'Cross,James', 'BBC books', '2011', 'GREAT BRTAIN', 'fic-588', 1, '', '2015-06-24 12:21:27', '2015-06-24 09:21:27'),
(317, 'city of thieves', 0, 'Renner,Ellen', 'orchard books', '2010', 'UK', 'fic-589', 1, '', '2015-06-24 12:21:27', '2015-06-24 09:21:27'),
(318, 'the search for wondla', 0, 'Diterlizzi,Tony', '', '2011', 'UK', 'fic-590', 1, '', '2015-06-24 12:21:27', '2015-06-24 09:21:27'),
(319, 'secret of Tamarind', 0, 'Aguiar,Nadia', '', '2010', 'GREAT BRTAIN', 'fic-591', 1, '', '2015-06-24 12:21:27', '2015-06-24 09:21:27'),
(320, 'the class swallow', 0, 'Golding, Julia', '', '2010', 'GREAT BRTAIN', 'fic-592', 1, '', '2015-06-24 12:21:28', '2015-06-24 09:21:28'),
(321, 'The Bourne deception', 0, 'Ludlums,Robert', 'Myn Pyn,LLC', '2010', 'USA', 'fic-594', 1, '', '2015-06-24 12:21:28', '2015-06-24 09:21:28'),
(322, 'The september society', 0, 'Finch, Charles', '', '2008', 'USA', 'fic-596', 1, '', '2015-06-24 12:21:28', '2015-06-24 09:21:28'),
(323, 'vortex', 0, 'Cross,Julie', 'Julie Cross', '2012', 'USA', 'fic-599', 1, '', '2015-06-24 12:21:28', '2015-06-24 09:21:28'),
(386, '1984 (nighten eghty four)', 0, 'Orwell,George', 'Adarsh books', '1949', '', 'fic-600', 3, '', '2015-06-24 13:37:10', '2015-06-24 10:37:10'),
(387, 'leo Tolstoy', 0, 'Karenia, George', 'Clays Ltd, st Ives plc', '1999', 'GREAT BRTAIN', 'fic-601', 3, '', '2015-06-24 13:37:10', '2015-06-24 10:37:10'),
(388, 'animal farm', 0, 'Orwell,George', 'penguin books', '1945', 'GREAT BRTAIN', 'fic-602', 3, '', '2015-06-24 13:37:10', '2015-06-24 10:37:10'),
(389, 'pride and prejudice', 0, 'Austen,Jane', 'Simon and schuter', '2009', 'USA', 'fic-603', 3, '', '2015-06-24 13:37:10', '2015-06-24 10:37:10'),
(390, 'Emma', 0, 'Austen,Jane', 'Simon and schuter', '2005', 'USA', 'fic-604', 3, '', '2015-06-24 13:37:11', '2015-06-24 10:37:11'),
(391, 'Great expectations', 0, 'Dickens,Charles', 'new central book agency', '', 'USA', 'fic-605', 3, '', '2015-06-24 13:37:11', '2015-06-24 10:37:11'),
(392, 'things fall apart', 0, 'Achebe, Chinua', '', '1959', 'USA', 'fic-606', 2, '', '2015-06-24 13:37:11', '2015-06-24 10:37:11'),
(393, 'beowulf', 0, 'Simon', 'Simon and schuter', '2005', 'USA', 'fic-607', 2, '', '2015-06-24 13:37:11', '2015-06-24 10:37:11'),
(394, 'Plato republic', 0, 'Grube,G.M.A', '', '1992', 'USA', 'fic-608', 3, '', '2015-06-24 13:37:11', '2015-06-24 10:37:11'),
(395, 'weep not child', 0, 'Thiong, Ngugi,WA', 'Coxand wayman, reading books', '1964', 'GREAT BRTAIN', 'fic-609', 3, '', '2015-06-24 13:37:11', '2015-06-24 10:37:11'),
(396, 'the beautiful ones are not yet born', 0, 'Armah, Ayikwei', 'Coxand wayman, reading books', '1988', 'GREAT BRTAIN', 'fic-610', 3, '', '2015-06-24 13:37:11', '2015-06-24 10:37:11'),
(397, 'the old man and the sea', 0, 'Hemingway,Ernest', '', '1952', 'UK', 'fic-611', 3, '', '2015-06-24 13:37:11', '2015-06-24 10:37:11'),
(398, 'Great expectations', 0, 'Dickens,Charles', 'Hachette partworks', '2014', 'Portugal', 'fic-612', 6, '', '2015-06-24 13:37:11', '2015-06-24 10:37:11'),
(399, 'pride and prejudice', 0, 'Austen,Jane', 'Hachette partworks', '2014', 'Portugal', 'fic-613', 4, '', '2015-06-24 13:37:11', '2015-06-24 10:37:11'),
(400, 'remember when', 0, 'Mcnought, Judith', 'pocket books', '1996', 'USA', 'fic-614', 1, '', '2015-06-24 13:37:11', '2015-06-24 10:37:11'),
(401, 'the cove', 0, 'Rash,Ron', 'Harper Collins', '2012', 'USA', 'fic-615', 1, '', '2015-06-24 13:37:11', '2015-06-24 10:37:11'),
(402, 'the golden compass', 0, 'Pullman,phillip', 'Pullman Philip', '1996', 'USA', 'fic-616', 1, '', '2015-06-24 13:37:11', '2015-06-24 10:37:11'),
(403, 'the other side of the Island', 0, 'Goodman,Allegra', 'penguin group', '2008', 'USA', 'fic-617', 1, '', '2015-06-24 13:37:11', '2015-06-24 10:37:11'),
(404, 'blood on my hands', 0, 'Strasser,Todd', 'Egmount USA,2011', '2010', 'USA', 'fic-618', 1, '', '2015-06-24 13:37:11', '2015-06-24 10:37:11'),
(405, 'The Elegance of the hedgehog', 0, 'Barbery, Muril', 'thirteenth printing', '2008', 'USA', 'fic-619', 1, '', '2015-06-24 13:37:12', '2015-06-24 10:37:12'),
(406, 'the drowned cities', 0, 'Baclgalupi,Paolo', 'Hachette books', '2012', 'USA', 'fic-620', 1, '', '2015-06-24 13:37:12', '2015-06-24 10:37:12'),
(407, 'T is for Trespass', 0, 'Grafton, Sue', 'Penguin books ltd', '2012', 'USA', 'fic-621', 1, '', '2015-06-24 13:37:12', '2015-06-24 10:37:12'),
(492, 'Writing and Grammer gold level', 104, 'Pretice Hall', 'pretice hall', '2004', 'Boston', '415-335', 74, '', '2015-06-25 12:55:48', '2015-06-25 09:55:48'),
(578, 'literature Gold Level', 105, 'Prentice, Hall', 'Pearson', '2003', 'Florida', '800-', 36, '', '2015-06-25 15:24:51', '2015-06-25 12:24:51'),
(579, 'Literature penguin edition', 105, 'Prentice, Hall', 'Person', '2003', 'Michigan', '810-', 36, '', '2015-06-25 15:24:51', '2015-06-25 12:24:51'),
(580, 'Literature Illinois', 105, 'Prentice, Hall', 'Person', '2007', 'Illiois', '800-', 12, '', '2015-06-25 15:24:51', '2015-06-25 12:24:51'),
(581, 'Literature Kentucky', 105, 'Prentice, Hall', 'Person', '2007', 'Kentucky', '800-', 20, '', '2015-06-25 15:24:51', '2015-06-25 12:24:51'),
(582, 'Literature Bronze level', 105, 'Prentice, Hall', 'Person', '2005', 'Virginia', '800-', 6, '', '2015-06-25 15:24:51', '2015-06-25 12:24:51'),
(583, 'literature the American experience', 105, 'Prentice, Hall', 'Person', '2002', 'Boston', '810-', 12, '', '2015-06-25 15:24:51', '2015-06-25 12:24:51'),
(675, 'Literature platinum', 105, 'Prentice, Hall', 'pretice hall', '1989', 'USA', '800-337', 9, '', '2015-07-03 14:58:52', '2015-07-03 11:58:52'),
(676, 'Elements of literature', 105, 'Holt,Rinehart and Winston, inc', 'Holt,Rinehart and Winston inc', '1993', 'USA', '800-7241', 1, '', '2015-07-03 14:58:52', '2015-07-03 11:58:52'),
(677, 'Literature Maryland student edition', 105, 'Perntice, Hall', 'Person', '2005', 'USA', '800-337A', 4, '', '2015-07-03 14:58:52', '2015-07-03 11:58:52'),
(678, 'Literature Virginia student edition', 105, 'Perntice, Hall', 'Person', '2005', 'USA', '810-339', 12, '', '2015-07-03 14:58:52', '2015-07-03 11:58:52'),
(863, 'Literature Bronze level', 105, 'Prentice, Hall', 'Person', '2005', 'Virginia', '800-371', 6, '', '2015-07-03 15:21:13', '2015-07-03 12:21:13'),
(864, 'literature the American experience', 105, 'Prentice, Hall', 'Person', '2002', 'Boston', '810-338', 12, '', '2015-07-03 15:21:13', '2015-07-03 12:21:13');

-- --------------------------------------------------------

--
-- Table structure for table `book_borrows`
--

CREATE TABLE IF NOT EXISTS `book_borrows` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tea_or_stu` enum('T','S') NOT NULL,
  `books_id` int(11) NOT NULL,
  `borrow_date` text NOT NULL,
  `librarian_id` int(11) NOT NULL,
  `return_date` datetime NOT NULL,
  `returned` tinyint(1) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_time` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_borrows`
--

INSERT INTO `book_borrows` (`id`, `user_id`, `tea_or_stu`, `books_id`, `borrow_date`, `librarian_id`, `return_date`, `returned`, `created_time`, `update_time`) VALUES
(1, 14, 'S', 10, '2015-05-26 03:48:48 ', 39, '2015-05-26 15:48:48', 1, '2015-05-26 06:48:48', '2015-05-26 06:50:54'),
(2, 18, 'S', 10, '2015-05-27 09:39:39 ', 39, '2015-05-27 09:39:39', 1, '2015-05-27 00:39:39', '2015-05-27 00:40:42');

-- --------------------------------------------------------

--
-- Table structure for table `book_catagory`
--

CREATE TABLE IF NOT EXISTS `book_catagory` (
`id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=291 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book_catagory`
--

INSERT INTO `book_catagory` (`id`, `name`, `date_created`, `date_modified`) VALUES
(10, 'Fiction', '2015-05-26 13:32:01', NULL),
(12, '', '2015-06-10 07:43:22', NULL),
(104, 'writing and Grammer', '2015-06-25 09:55:48', NULL),
(105, 'literature', '2015-06-25 09:55:48', NULL),
(197, 'American literature', '2015-06-25 10:02:52', NULL),
(198, 'british literature', '2015-06-25 10:02:52', NULL),
(290, 'world literature', '2015-06-25 12:24:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cds`
--

CREATE TABLE IF NOT EXISTS `cds` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `number_cd` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `call_number` varchar(20) NOT NULL,
  `copy_number` varchar(20) NOT NULL,
  `shelf_or_store` enum('shelf','store') NOT NULL,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cds_category`
--

CREATE TABLE IF NOT EXISTS `cds_category` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `modified` datetime NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=403 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cds_category`
--

INSERT INTO `cds_category` (`id`, `name`, `modified`, `created`) VALUES
(396, 'Maths', '0000-00-00 00:00:00', '2015-05-25 12:18:10'),
(397, 'Physics', '0000-00-00 00:00:00', '2015-05-25 12:18:10'),
(398, 'Chemistry', '0000-00-00 00:00:00', '2015-05-25 12:18:10'),
(399, 'Biology', '0000-00-00 00:00:00', '2015-05-25 12:18:11'),
(400, 'Civics', '0000-00-00 00:00:00', '2015-05-25 12:18:11'),
(401, 'Amharic', '0000-00-00 00:00:00', '2015-05-25 12:18:11'),
(402, 'English', '0000-00-00 00:00:00', '2015-05-25 12:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `cd_borrows`
--

CREATE TABLE IF NOT EXISTS `cd_borrows` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tea_or_stu` enum('S','T') NOT NULL,
  `cd_id` int(11) NOT NULL,
  `issued_by_id` int(11) NOT NULL,
  `return_date` date NOT NULL,
  `borrow_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `returned` tinyint(1) NOT NULL,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mag_category`
--

CREATE TABLE IF NOT EXISTS `mag_category` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `modified` datetime NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mag_category`
--

INSERT INTO `mag_category` (`id`, `name`, `modified`, `created`) VALUES
(1, 'English', '0000-00-00 00:00:00', '2015-05-11 21:51:30'),
(2, 'Maths', '0000-00-00 00:00:00', '2015-05-25 12:24:09'),
(3, 'Physics', '0000-00-00 00:00:00', '2015-05-25 12:24:09'),
(4, 'Chemistry', '0000-00-00 00:00:00', '2015-05-25 12:24:09'),
(5, 'Biology', '0000-00-00 00:00:00', '2015-05-25 12:24:09'),
(6, 'Civics', '0000-00-00 00:00:00', '2015-05-25 12:24:09'),
(7, 'Amharic', '0000-00-00 00:00:00', '2015-05-25 12:24:09');

-- --------------------------------------------------------

--
-- Table structure for table `megazines`
--

CREATE TABLE IF NOT EXISTS `megazines` (
`id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `page_number` varchar(100) NOT NULL,
  `publish_date` varchar(100) NOT NULL,
  `call_number` varchar(100) NOT NULL,
  `copy_number` varchar(100) NOT NULL,
  `shelf_or_store` enum('shelf','store') NOT NULL,
  `cat_id` varchar(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meg_borrows`
--

CREATE TABLE IF NOT EXISTS `meg_borrows` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tea_or_stu` enum('S','T') NOT NULL,
  `meg_id` int(11) NOT NULL,
  `borrow_date` text NOT NULL,
  `librarian_id` int(11) NOT NULL,
  `return_date` date NOT NULL,
  `returned` int(1) NOT NULL DEFAULT '0',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE IF NOT EXISTS `reserved` (
`id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `confirm` tinyint(1) NOT NULL,
  `reserve_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `confirm_by` int(11) NOT NULL,
  `update_time` datetime DEFAULT NULL,
  `created_time` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
`id` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `section` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `grade`, `section`) VALUES
(1, 1, 'a'),
(2, 2, 'a'),
(3, 2, 'b'),
(4, 2, 'c'),
(5, 3, 'a'),
(6, 3, 'b'),
(7, 3, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE IF NOT EXISTS `staffs` (
`id` int(11) NOT NULL,
  `use_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `update_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `use_id`, `name`, `department`, `update_time`, `created_time`) VALUES
(35, 39, 'Niguse kufa', 'Librarian', '2015-05-26 06:10:13', '2015-05-26 06:10:13'),
(36, 40, 'Tigist Lemma', 'Librarian', '2015-10-06 12:50:01', '2015-10-06 12:50:01');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
`id` int(11) NOT NULL,
  `pocket_id` text NOT NULL,
  `name` varchar(30) NOT NULL,
  `grade` int(11) NOT NULL,
  `section` char(1) NOT NULL,
  `photo` text NOT NULL,
  `update_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `pocket_id`, `name`, `grade`, `section`, `photo`, `update_time`, `created_time`) VALUES
(14, 'SJS/0001/15', 'Biniam Kassahun', 10, 'A', '56LARHMP4WOQ4DB42CN3TUADPBA5LP.png', '2015-04-21 09:47:51', '2015-04-21 09:47:51'),
(15, 'SJS/0002/15', 'Robel Hayelom', 10, 'B', '95TIBM7P084PH9EJAEENKUY0UCE2A3.png', '2015-04-21 09:48:17', '2015-04-21 09:48:17'),
(17, 'SJS/0004/15', 'Solomon G/Silassie', 12, 'B', 'SDNSNZG9I3P741UPONVEWA8B0SW4QI.png', '2015-04-29 09:49:46', '2015-04-29 09:49:46'),
(18, 'SJS/0018/15', 'sdfdsf', 5, 's', '9PLIV3NOW3M9P6MH5C62I1G8P71O1D.png', '2015-05-11 23:15:03', '2015-05-11 23:15:03'),
(19, 'SJS/0019/15', 'Biniam', 2, 'A', 'LBRK2G32DGZHDD1LDLCK95I6CHMLHJ.png', '2015-05-26 06:12:38', '2015-05-26 06:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `type` enum('Teacher','Librarian','','') NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `type`, `created`, `modified`) VALUES
(39, 'niguse', '*AAB5814A801B53E384CC655F5DC1DCA6C9DDB55E', 'Librarian', '2015-05-26 13:10:13', NULL),
(40, 'tigist', '*3E2BE7506F452AAA9870871AA5569ACB075E11AD', 'Librarian', '2015-10-06 09:50:01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `call_id` (`call_id`,`copy_number`), ADD UNIQUE KEY `id` (`id`), ADD KEY `cat_id` (`cat_id`), ADD KEY `cat_id_2` (`cat_id`);

--
-- Indexes for table `book_borrows`
--
ALTER TABLE `book_borrows`
 ADD PRIMARY KEY (`id`), ADD KEY `books_id` (`books_id`), ADD KEY `librarian_id` (`librarian_id`), ADD KEY `user_id` (`user_id`), ADD KEY `books_id_2` (`books_id`);

--
-- Indexes for table `book_catagory`
--
ALTER TABLE `book_catagory`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`), ADD UNIQUE KEY `name_2` (`name`);

--
-- Indexes for table `cds`
--
ALTER TABLE `cds`
 ADD UNIQUE KEY `id_2` (`id`), ADD UNIQUE KEY `call_number` (`call_number`,`copy_number`), ADD KEY `cat_id` (`cat_id`), ADD KEY `id` (`id`);

--
-- Indexes for table `cds_category`
--
ALTER TABLE `cds_category`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `cd_borrows`
--
ALTER TABLE `cd_borrows`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`,`cd_id`,`issued_by_id`), ADD KEY `cd_id` (`cd_id`), ADD KEY `issued_by_id` (`issued_by_id`);

--
-- Indexes for table `mag_category`
--
ALTER TABLE `mag_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `megazines`
--
ALTER TABLE `megazines`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meg_borrows`
--
ALTER TABLE `meg_borrows`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`,`meg_id`,`librarian_id`), ADD KEY `user_id_2` (`user_id`), ADD KEY `meg_id` (`meg_id`), ADD KEY `issued_by` (`librarian_id`);

--
-- Indexes for table `reserved`
--
ALTER TABLE `reserved`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`), ADD KEY `book_id` (`book_id`), ADD KEY `confirm_by` (`confirm_by`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `teacher_id` (`id`), ADD UNIQUE KEY `teacher_id_2` (`id`), ADD UNIQUE KEY `use_id_2` (`use_id`), ADD KEY `use_id` (`use_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `student_id` (`id`), ADD KEY `section` (`section`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `username` (`username`), ADD KEY `id_2` (`id`), ADD KEY `id_3` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=865;
--
-- AUTO_INCREMENT for table `book_borrows`
--
ALTER TABLE `book_borrows`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `book_catagory`
--
ALTER TABLE `book_catagory`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=291;
--
-- AUTO_INCREMENT for table `cds`
--
ALTER TABLE `cds`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cds_category`
--
ALTER TABLE `cds_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=403;
--
-- AUTO_INCREMENT for table `cd_borrows`
--
ALTER TABLE `cd_borrows`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `mag_category`
--
ALTER TABLE `mag_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `megazines`
--
ALTER TABLE `megazines`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `meg_borrows`
--
ALTER TABLE `meg_borrows`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reserved`
--
ALTER TABLE `reserved`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `cds`
--
ALTER TABLE `cds`
ADD CONSTRAINT `cds_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `cds_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `cd_borrows`
--
ALTER TABLE `cd_borrows`
ADD CONSTRAINT `cd_borrows_ibfk_2` FOREIGN KEY (`issued_by_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reserved`
--
ALTER TABLE `reserved`
ADD CONSTRAINT `reserved_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `staffs` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `staffs`
--
ALTER TABLE `staffs`
ADD CONSTRAINT `staffs_ibfk_1` FOREIGN KEY (`use_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
