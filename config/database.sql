-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 01, 2021 at 03:02 AM
-- Server version: 8.0.19
-- PHP Version: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invo_task_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id`, `name`, `date_added`) VALUES
(1, 'Prof. Dina Hoppe DVM', '2000-07-01 09:29:23'),
(2, 'Shaina Stoltenberg IV', '1971-10-12 00:38:51'),
(3, 'Dr. Willis Krajcik III', '1979-04-02 10:11:16'),
(4, 'Mikel Hagenes', '1991-02-27 04:16:04'),
(5, 'Ms. Melisa Zulauf MD', '1975-04-03 20:42:30'),
(6, 'Jeremy Bednar', '2013-04-13 22:40:35'),
(7, 'Dr. Mozell Kuhlman DDS', '2006-07-22 17:03:29'),
(8, 'Kianna Gottlieb', '2008-11-11 21:34:54'),
(9, 'Mrs. Lacey Von DDS', '1990-02-16 19:46:47'),
(10, 'Tanya Hirthe Jr.', '2006-06-22 10:33:02'),
(11, 'Prof. Hertha Kling III', '1984-10-17 17:43:21'),
(12, 'Opal Dickens IV', '1984-01-21 17:07:51'),
(13, 'Roxane D\'Amore III', '1993-06-11 20:18:19'),
(14, 'Rosalia Hand', '2001-09-11 13:19:45'),
(15, 'Clement Okuneva', '1993-12-06 10:51:45'),
(16, 'Miss Alison Swift', '1999-10-04 12:15:38'),
(17, 'Larry Hane', '1972-10-13 01:25:44'),
(18, 'Prof. Lorna Rippin', '2015-04-11 00:17:48'),
(19, 'Prof. Nayeli Olson II', '1988-08-04 17:43:03'),
(20, 'Earnest Bahringer', '2009-05-03 15:59:15'),
(21, 'Terrance Upton', '2019-03-31 13:05:12'),
(22, 'Leola Fay', '1983-10-24 11:01:14'),
(23, 'Vida Heaney', '1978-07-21 12:56:07'),
(24, 'Greyson Schowalter', '1998-12-31 01:42:16'),
(25, 'Peggie Kling', '2019-06-18 21:53:14'),
(26, 'Candida Greenfelder', '1995-05-28 23:35:21'),
(27, 'Audie Upton', '1973-03-10 16:31:39'),
(28, 'Danyka Harvey', '2004-12-16 07:17:46'),
(29, 'Gilberto Heathcote', '2020-01-16 08:36:02'),
(30, 'Cora Tillman Jr.', '1999-03-03 00:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `pages` int NOT NULL,
  `price` int NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `title`, `topic`, `pages`, `price`, `date_added`) VALUES
(6, 'Quis reiciendis aut.', 'Alice in a soothing tone: \'don\'t be angry about it. And yet I wish I could show you our cat Dinah:.', 455, 37, '1984-06-11 01:46:01'),
(7, 'Cum omnis commodi.', 'Gryphon, and all the other queer noises, would change (she knew) to the confused clamour of the.', 191, 57, '1972-09-26 23:47:58'),
(8, 'Molestias.', 'MORE than nothing.\' \'Nobody asked YOUR opinion,\' said Alice. \'Who\'s making personal remarks now?\'.', 163, 316, '2020-03-17 13:20:26'),
(9, 'Nemo ut voluptatem.', 'Queen never left off quarrelling with the other players, and shouting \'Off with his head!\' or \'Off.', 447, 97, '2007-10-31 16:25:04'),
(10, 'Minus officia et.', 'Gryphon, the squeaking of the Lizard\'s slate-pencil, and the choking of the suppressed.', 364, 450, '1984-04-18 12:06:34'),
(11, 'Quis aspernatur.', 'Rabbit angrily. \'Here! Come and help me out of THIS!\' (Sounds of more broken glass.) \'Now tell me,.', 349, 214, '1999-08-14 03:16:59'),
(12, 'Ipsum qui rerum.', 'Alice, \'as all the arches are gone from this side of the ground.\' So she tucked it away under her.', 336, 379, '2010-10-08 08:52:42'),
(13, 'Animi commodi iste.', 'Gryphon, and the Gryphon answered, very nearly in the same words as before, \'It\'s all his fancy,.', 358, 192, '1980-08-11 09:35:48'),
(14, 'Animi et tempora.', 'March Hare,) \'--it was at the great concert given by the Queen of Hearts, and I had to sing.', 190, 245, '1978-03-04 21:22:50'),
(15, 'Aspernatur.', 'WOULD always get into her eyes--and still as she listened, or seemed to listen, the whole place.', 55, 286, '2007-06-24 13:37:58'),
(16, 'Rerum ipsum ut.', 'I should think you\'ll feel it a little queer, won\'t you?\' \'Not a bit,\' said the Caterpillar..', 154, 442, '1975-09-11 14:29:29'),
(17, 'Recusandae dolore.', 'Pat, what\'s that in the window?\' \'Sure, it\'s an arm, yer honour!\' (He pronounced it \'arrum.\') \'An.', 402, 79, '1984-10-24 20:40:32'),
(18, 'Sint molestiae esse.', 'The next thing was to eat the comfits: this caused some noise and confusion, as the large birds.', 172, 313, '2009-07-10 06:47:56'),
(19, 'Placeat non quod ut.', 'King triumphantly, pointing to the tarts on the table. \'Nothing can be clearer than THAT. Then.', 76, 329, '2018-08-10 10:03:09'),
(20, 'Ipsa quas iste.', 'She took down a jar from one of the shelves as she passed; it was labelled \'ORANGE MARMALADE\', but.', 334, 70, '1997-06-21 18:52:33'),
(21, 'Aut similique iure.', 'Alice \'without pictures or conversations?\' So she was considering in her own mind (as well as she.', 367, 98, '1993-05-25 08:45:54'),
(22, 'Expedita eos labore.', 'All on a summer day: The Knave of Hearts, he stole those tarts, And took them quite away!\'.', 381, 345, '1995-10-29 06:35:59'),
(23, 'Molestias qui aut.', 'Gryphon said, in a rather offended tone, \'Hm! No accounting for tastes! Sing her \"Turtle Soup,\".', 102, 200, '2018-05-04 04:26:11'),
(24, 'Tempora sed quo.', 'And yet I wish I could show you our cat Dinah: I think you\'d take a fancy to cats if you could.', 285, 414, '1976-11-07 19:10:42'),
(25, 'Nostrum nemo in.', 'Alice indignantly. \'Ah! then yours wasn\'t a really good school,\' said the Mock Turtle in a deep,.', 45, 171, '1987-05-29 18:03:59'),
(26, 'Est iure autem.', 'YOUR adventures.\' \'I could tell you my adventures--beginning from this morning,\' said Alice a.', 182, 206, '1979-08-17 03:36:06'),
(27, 'Qui accusamus.', 'Duchess. \'Everything\'s got a moral, if only you can find it.\' And she squeezed herself up closer.', 177, 61, '2008-04-05 05:47:48'),
(28, 'Aut ipsam ut eius.', 'I only wish people knew that: then they wouldn\'t be so stingy about it, you know--\' She had quite.', 170, 403, '1988-06-27 05:35:01'),
(29, 'Tempora temporibus.', 'Caterpillar. \'Well, perhaps your feelings may be different,\' said Alice; \'all I know is, it would.', 415, 252, '2002-07-16 05:23:09'),
(30, 'Ab hic amet maxime.', 'I suppose?\' \'Yes,\' said Alice doubtfully: \'it means--to--make--anything--prettier.\' \'Well, then,\'.', 236, 422, '2010-05-20 18:17:04'),
(31, 'Quis sed officiis.', 'The pepper when he pleases!\' CHORUS. \'Wow! wow! wow!\' \'Here! you may nurse it a bit, if you like!\'.', 346, 169, '1994-10-17 11:01:04'),
(32, 'Architecto quisquam.', 'Alice opened the door and found that it led into a small passage, not much larger than a rat-hole:.', 59, 83, '2009-04-26 14:59:21'),
(33, 'Et amet incidunt.', 'I\'ve nothing to do.\" Said the mouse to the cur, \"Such a trial, dear Sir, With no jury or judge,.', 389, 432, '2009-05-09 12:26:35'),
(34, 'Et vel nulla.', 'I think.\' And she began thinking over all the children she knew that were of the same age as.', 79, 268, '2019-05-08 08:39:55'),
(35, 'Consequuntur.', 'Lizard, who seemed too much overcome to do anything but sit with its mouth open, gazing up into.', 167, 208, '1975-08-24 02:25:15'),
(36, 'Aliquam perferendis.', 'She felt very curious to know what it was all about, and crept a little way out of the wood to.', 219, 314, '1985-08-21 15:20:27'),
(37, 'Omnis laborum.', 'PROVES his guilt,\' said the Queen. \'It proves nothing of the sort!\' said Alice. \'Why, you don\'t.', 253, 358, '1998-05-25 16:39:55'),
(38, 'Necessitatibus qui.', 'Alice, and looking at the Cat\'s head with great curiosity. \'It\'s a friend of mine--a Cheshire.', 434, 178, '1993-08-19 09:40:27'),
(39, 'Blanditiis qui.', 'Alice thought she had never seen such a curious croquet-ground in her life; it was all ridges and.', 323, 292, '2004-05-31 16:05:54'),
(40, 'Repudiandae.', 'Mary Ann, and be turned out of the house before she had found the fan and gloves. \'How queer it.', 109, 86, '2003-05-08 01:06:44'),
(41, 'Quis laborum rerum.', 'Dormouse said--\' the Hatter went on, looking anxiously round to see if he would deny it too: but.', 420, 233, '1989-07-21 14:14:29'),
(42, 'Eaque molestiae at.', 'Alice, \'to speak to this mouse? Everything is so out-of-the-way down here, that I should think.', 144, 474, '2003-05-20 15:57:07'),
(43, 'Voluptate et.', 'Alice, and she went on. \'Would you tell me, please, which way I ought to go from here?\' \'That.', 76, 43, '1982-05-25 16:14:17'),
(44, 'Autem vel corrupti.', 'Dormouse indignantly. However, he consented to go on. \'And so these three little sisters--they.', 268, 221, '1983-08-22 17:28:47'),
(45, 'Explicabo qui quae.', 'M--\' \'Why with an M?\' said Alice. \'Why not?\' said the March Hare. Alice was silent. The Dormouse.', 118, 176, '2006-04-17 14:02:14'),
(46, 'Non explicabo quia.', 'March Hare. \'Then it wasn\'t very civil of you to offer it,\' said Alice angrily. \'It wasn\'t very.', 130, 376, '2020-08-09 18:51:10'),
(47, 'Animi molestiae.', 'The poor little Lizard, Bill, was in the middle, being held up by two guinea-pigs, who were giving.', 69, 323, '1997-06-02 08:54:50'),
(48, 'Qui modi facilis.', 'I\'d only been the right size to do it! Oh dear! I\'d nearly forgotten that I\'ve got to grow up.', 259, 224, '1999-04-22 02:59:52'),
(49, 'Dolorem qui non.', 'She soon got it out again, and put it right; \'not that it signifies much,\' she said to herself; \'I.', 372, 101, '2004-05-06 11:31:44'),
(50, 'Iste reiciendis.', 'I\'ve finished.\' So they sat down, and nobody spoke for some minutes. Alice thought to herself, \'I.', 445, 437, '2011-04-06 04:04:16');

-- --------------------------------------------------------

--
-- Table structure for table `book_author`
--

CREATE TABLE `book_author` (
  `book_id` int NOT NULL,
  `author_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `book_author`
--

INSERT INTO `book_author` (`book_id`, `author_id`) VALUES
(14, 26),
(9, 5),
(41, 23),
(40, 14),
(12, 11),
(33, 26),
(25, 4),
(34, 24),
(33, 13),
(25, 14),
(13, 20),
(44, 15),
(16, 8),
(15, 4),
(50, 13),
(43, 24),
(44, 3),
(15, 24),
(38, 23),
(46, 27),
(33, 23),
(49, 4),
(10, 8),
(39, 3),
(36, 26),
(11, 2),
(9, 3),
(47, 1),
(42, 25),
(35, 11),
(38, 14),
(6, 20),
(16, 7),
(11, 29),
(48, 6),
(22, 26),
(11, 5),
(35, 13),
(9, 24),
(48, 11),
(43, 27),
(17, 21),
(34, 13),
(32, 12),
(39, 12),
(41, 27),
(21, 6),
(10, 26),
(49, 22),
(42, 5),
(25, 24),
(24, 11),
(33, 25),
(12, 20),
(36, 30),
(43, 2),
(33, 29),
(15, 23),
(50, 22),
(46, 5),
(27, 29),
(28, 16),
(34, 12),
(33, 6),
(9, 4),
(26, 25),
(48, 16),
(8, 6),
(9, 26),
(8, 7),
(19, 1),
(14, 1),
(48, 17),
(39, 29),
(14, 21),
(6, 25),
(33, 20),
(16, 10),
(25, 7),
(6, 30),
(26, 6),
(11, 21),
(7, 11),
(7, 22),
(7, 27);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(7, '11111', '$2y$10$911a0rfSs7Gbce1HEQAcSuoi77ieuQElUtK4T4pOD2Zf/MsbCOGKG', NULL),
(8, 'admin', '$2y$10$QeD5tOvVRipQRu30kj7Ome2HGGU5X/cPu467nbASA7CStqNa9fxNi', 1),
(9, 'user', '$2y$10$2cBm8QvpljymI/sw/w0ugerIsXrbO6dWOj/.wi14xlVt.HiJtoUXW', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
