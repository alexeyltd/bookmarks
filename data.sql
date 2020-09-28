-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 14, 2020 at 11:00 AM
-- Server version: 5.5.62-0+deb8u1
-- PHP Version: 5.6.40-0+deb8u12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ctrus785_bookmarks`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookmarks`
--

CREATE TABLE IF NOT EXISTS `bookmarks` (
`id` int(11) unsigned NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `collection_id` int(11) unsigned DEFAULT NULL,
  `is_sending` int(11) unsigned DEFAULT NULL,
  `author_id` int(11) unsigned DEFAULT NULL,
  `dateutc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookmarks`
--

INSERT INTO `bookmarks` (`id`, `name`, `description`, `image`, `link`, `collection_id`, `is_sending`, `author_id`, `dateutc`) VALUES
(1, 'course | Udemy', 'headline - Free Course', 'https://www.udemy.com/staticx/udemy/images/course/480x270/placeholder.png', 'https://www.udemy.com/course', 4, 0, 4, '2020-09-12 17:44'),
(2, 'GitHub - ZhangMYihua/lesson-27: We''ve moved our shop data into our firestore database, now we need to modify our application in such a way that considers our data being loaded asynchronously. We have created a WithSpinner HOC as well as modified our shop to initialize the call for data.', 'We''ve moved our shop data into our firestore database, now we need to modify our application in such a way that considers our data being loaded asynchronously. We have created a WithSpinner HOC as well as modified our shop to initialize the call for data. - ZhangMYihua/lesson-27', 'https://avatars2.githubusercontent.com/u/10578605?s=400&v=4', 'https://github.com/zhangmyihua/lesson-27', 4, 0, 4, '2020-09-12 17:45'),
(4, 'Filmix - �ìîòðåòü îíëàéí ôèëüìû è ñåðèàëû áåñïëàòíî', 'Cìîòðåòü ôèëüìû îíëàéí íà ëó÷øåì ðåñóðñå â ðóíåòå, ñåðèàëû îíëàéí, âîçìîæíîñòü îñòàâèòü îòçûâ î ôèëüìå è íàïèñàòü ðåöåíçèþ íà êèíî èëè ñåðèàë êîòîðûé âàì ïîíðàâèëñÿ', 'https://filmix.co/templates/Filmix/media/img/filmix.png', 'https://filmix.co', 0, 0, 1, '2020-09-13 18:33');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE IF NOT EXISTS `collections` (
`id` int(11) unsigned NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_public` int(11) unsigned DEFAULT NULL,
  `author_id` int(11) unsigned DEFAULT NULL,
  `dateutc` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `title`, `color`, `is_public`, `author_id`, `dateutc`) VALUES
(1, 'Default', '#FFFBDF', 0, 1, '2020-09-12 17:35'),
(2, 'Default', '#FFFBDF', 0, 2, '2020-09-12 17:35'),
(3, 'Default', '#FFFBDF', 0, 3, '2020-09-12 17:40'),
(4, 'Default', '#DAFFFE', 1, 4, '2020-09-12 17:44'),
(5, 'Default', '#FFFBDF', 0, 5, '2020-09-12 17:53'),
(6, 'Default', '#FFFBDF', 0, 6, '2020-09-12 17:56');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE IF NOT EXISTS `subscribe` (
`id` int(11) unsigned NOT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscription_id` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `user`, `subscription_id`) VALUES
(1, 'aas@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) unsigned NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_email` int(11) unsigned DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tariff` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subscribe` date DEFAULT NULL,
  `lastlogin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datereg` date DEFAULT NULL,
  `ban` int(11) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`, `confirm_email`, `name`, `description`, `url`, `avatar`, `phone`, `tariff`, `subscribe`, `lastlogin`, `datereg`, `ban`) VALUES
(1, 'spam@smmrezka.ru', '$2y$10$68qhex1FGBrV.wWmHHGRS.D8tnj8pEYhjSfr2lOjQkaC09soOFW76', 'user', 1, '', '', '', '', '', 'free', '2020-09-12', '2020-09-12 17:35', '2020-09-12', 0),
(2, '3f832a8b30@firemailbox.club', '$2y$10$mMRHiNKU2xa8xZ/H.wAeeuS0akwhVft4Sz9AuiRlIGXxrOGiMZrrO', 'user', 0, '', '', '', '', '', 'free', '2020-09-12', '2020-09-12 17:35', '2020-09-12', 0),
(3, 'qvn28255@cuoly.com', '$2y$10$9diOc9leWqpdGC9BkG7kUukhQpJrXRuonpphJLJ/3mE3f1TJv.swq', 'user', 0, '', '', '', '', '', 'free', '2020-09-12', '2020-09-12 17:40', '2020-09-12', 0),
(4, 'mexixit840@cyberper.net', '$2y$10$MMEiTj.S5l7fHkx2D8BQ4ePMktXjPnoZYjrvDigID0Y.O8ytCbDPC', 'user', 0, 'geasdrsr', '', 'herokuyt', '', '', 'free', '2020-09-12', '2020-09-12 17:41', '2020-09-12', 0),
(5, 'besewa5658@gomaild.com', '$2y$10$yyhsXJNYCBpmyHoCw97Cl.AO5pqW/moo0CYrMwTUE8XX6bhTRN.u6', 'user', 0, '', '', '', '', '', 'free', '2020-09-12', '2020-09-12 17:53', '2020-09-12', 0),
(6, 'fgbhjpmlfjqdpthjnj@mhzayt.com', '$2y$10$LqgAtbnUvkaMrudb18I9qeKrzQUrwfBEl2BnRxAXju4raADiyYfTS', 'user', 1, '', '', '', '', '', 'free', '2020-09-12', '2020-09-12 17:56', '2020-09-12', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookmarks`
--
ALTER TABLE `bookmarks`
 ADD PRIMARY KEY (`id`), ADD KEY `index_foreignkey_bookmarks_collection` (`collection_id`), ADD KEY `index_foreignkey_bookmarks_author` (`author_id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
 ADD PRIMARY KEY (`id`), ADD KEY `index_foreignkey_collections_author` (`author_id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
 ADD PRIMARY KEY (`id`), ADD KEY `index_foreignkey_subscribe_subscription` (`subscription_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookmarks`
--
ALTER TABLE `bookmarks`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
