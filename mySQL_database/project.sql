-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost
-- Généré le :  Lun 24 Juin 2019 à 17:25
-- Version du serveur :  5.7.26-0ubuntu0.18.10.1
-- Version de PHP :  7.2.19-0ubuntu0.18.10.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `project`
--

-- --------------------------------------------------------

--
-- Structure de la table `mkiu2_comments`
--

CREATE TABLE `mkiu2_comments` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `content` varchar(500) NOT NULL,
  `id_mkiu2_user` int(11) NOT NULL,
  `id_mkiu2_typeOfComment` int(11) NOT NULL,
  `id_mkiu2_content` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mkiu2_comments`
--

INSERT INTO `mkiu2_comments` (`id`, `date`, `content`, `id_mkiu2_user`, `id_mkiu2_typeOfComment`, `id_mkiu2_content`) VALUES
(34, '2019-06-21', 'Super photo !', 16, 1, 30),
(36, '2019-06-21', 'J\'adore le travail, très intéressant et rapide. ', 16, 1, 30),
(40, '2019-06-24', 'Super article !', 16, 2, 21),
(41, '2019-06-24', 'cool', 16, 2, 22);

-- --------------------------------------------------------

--
-- Structure de la table `mkiu2_content`
--

CREATE TABLE `mkiu2_content` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `image` varchar(100) NOT NULL,
  `content` varchar(500) NOT NULL,
  `id_mkiu2_user` int(11) NOT NULL,
  `id_mkiu2_typeOfContent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mkiu2_content`
--

INSERT INTO `mkiu2_content` (`id`, `title`, `date`, `image`, `content`, `id_mkiu2_user`, `id_mkiu2_typeOfContent`) VALUES
(21, 'Maison francaise', '2019-06-18', 'uploads/2019-06-18_15-50-06.jpg', 'Une péniche comme demeure.', 16, 1),
(22, 'Le toit activé par vérin', '2019-06-18', 'uploads/2019-06-18_15-51-44.jpg', '', 16, 1),
(23, 'Looping 16', '2019-06-18', 'uploads/2019-06-18_15-52-52.jpg', 'Catamaran de 16 metres', 16, 1),
(24, 'Croisière rapide', '2019-06-18', 'uploads/2019-06-18_15-53-22.jpg', '', 16, 1),
(25, 'Profession ébeniste fluvial', '2019-06-18', 'uploads/2019-06-18_15-55-56.jpg', 'Metier menuisier', 16, 1),
(26, 'Vie sur l\'eau', '2019-06-18', 'uploads/2019-06-18_15-57-05.jpg', 'Metier menuisier', 16, 1),
(30, 'Bateau samana', '2019-06-21', 'uploads/2019-06-21_14-37-05.JPG', '', 16, 2),
(31, 'Poele &amp; escalier en colimaçon', '2019-06-21', 'uploads/2019-06-21_14-38-16.JPG', '', 16, 2),
(32, 'Salon bateau samana', '2019-06-21', 'uploads/2019-06-21_14-38-33.JPG', '', 16, 2),
(33, 'Chambre du capitaine ', '2019-06-21', 'uploads/2019-06-21_14-39-28.JPG', '', 16, 2),
(34, 'Les Charmes', '2019-06-24', 'uploads/2019-06-24_17-12-45.jpg', 'Le salon', 16, 2),
(35, 'Les Charmes', '2019-06-24', 'uploads/2019-06-24_17-13-04.jpg', '', 16, 2),
(36, 'Les Charmes', '2019-06-24', 'uploads/2019-06-24_17-13-14.jpg', '', 16, 2),
(37, 'Les Charmes', '2019-06-24', 'uploads/2019-06-24_17-13-23.jpg', '', 16, 2),
(38, 'L\'improviste', '2019-06-24', 'uploads/2019-06-24_17-13-43.jpg', '', 16, 2),
(39, 'L\'improviste', '2019-06-24', 'uploads/2019-06-24_17-14-04.jpg', '', 16, 2),
(40, 'Le cigogne', '2019-06-24', 'uploads/2019-06-24_17-14-25.JPG', '', 16, 2),
(41, 'Le cigogne', '2019-06-24', 'uploads/2019-06-24_17-14-36.JPG', '', 16, 2),
(42, 'Le Cid', '2019-06-24', 'uploads/2019-06-24_17-15-27.JPG', 'Timonerie ', 16, 2),
(43, 'Bessie Smith', '2019-06-24', 'uploads/2019-06-24_17-16-08.JPG', 'Intérieur', 16, 2),
(44, 'Bessie Smith', '2019-06-24', 'uploads/2019-06-24_17-16-18.JPG', 'Intérieur', 16, 2),
(45, 'Bessie Smith', '2019-06-24', 'uploads/2019-06-24_17-16-45.JPG', 'Superbe couloir', 16, 2);

-- --------------------------------------------------------

--
-- Structure de la table `mkiu2_typeOfComment`
--

CREATE TABLE `mkiu2_typeOfComment` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mkiu2_typeOfComment`
--

INSERT INTO `mkiu2_typeOfComment` (`id`, `type`) VALUES
(1, 'realisation'),
(2, 'article');

-- --------------------------------------------------------

--
-- Structure de la table `mkiu2_typeOfContent`
--

CREATE TABLE `mkiu2_typeOfContent` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mkiu2_typeOfContent`
--

INSERT INTO `mkiu2_typeOfContent` (`id`, `type`) VALUES
(1, 'realisation'),
(2, 'article');

-- --------------------------------------------------------

--
-- Structure de la table `mkiu2_user`
--

CREATE TABLE `mkiu2_user` (
  `id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `mail` varchar(600) NOT NULL,
  `passwordInput` varchar(255) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `nationality` varchar(50) NOT NULL,
  `id_mkiu2_userGroup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mkiu2_user`
--

INSERT INTO `mkiu2_user` (`id`, `lastname`, `firstname`, `mail`, `passwordInput`, `phoneNumber`, `address`, `nationality`, `id_mkiu2_userGroup`) VALUES
(16, 'Superuser', 'Admin', 'delhay@delhay.fr', '$2y$10$gDwku/v93sPC/PDXY3F.uexjEcfnH2Tdh33smLgKkjEJvpJU.sHbe', '01 02 03 04 05', 'aze', 'AFG', 1),
(23, 'Dupont', 'Jean', 'user1@user.com', '$2y$10$cdCJM5qhE0dLEyghsZLYturX2IzJPrUztNBnWZSneehkY6nRNA9ue', '09 89 98 58 39', '930-4593 Adipiscing Rd.', 'BLZ', 2),
(24, 'Curran', 'Broke', 'user2@user.com', '$2y$10$Vi/xI4fxhsYtKOWMGkMDhen.OjRNmD435LxqKrgC6axjk59P3Adsq', '08 52 25 28 40', 'Ap 891-6727 Dignissim St.', 'BHR', 2),
(25, 'Lucas', 'Otto', 'user3@user.com', '$2y$10$QRrmEeP3lRS8SOa3P7kENOjw0d.B2dBvghttrGOs2ZbYuyN8NPxPK', '01 02 03 04 05', 'Ap 506-1893 Risus. Rd.', 'NRU', 2),
(26, 'Eaton', 'Alyssa', 'user4@user.fr', '$2y$10$BWQDLo3cnzErsSY4X5HEQe7dlObEtkHnb6Qz8PKnd0oZ2KuzJGW3m', '02 05 04 63 85', 'Ap 142-3457 Amet St.', 'BGD', 2),
(27, 'Galvin', 'Ahmed', 'user11@user.fr', '$2y$10$0AD7iUp/25ctC1Vrc.95.OADCWQUhHkAUAIy4Yc.FEYZYUh9S/Frq', '09 90 92 20 45', 'P.O. Box 759, 6803 Eget Rd.', 'PER', 2),
(28, 'Jelani', 'Sydnee', 'user33@user.fr', '$2y$10$aMN.WDbPZxm1UmKviey/oOrT1TfB8K/nornfW45EEGBuPrSLO0SqC', '01 90 46 37 66', '5233 At, St.', 'BHR', 2),
(29, 'Dupont', 'Jean', 'test@test.fr', '$2y$10$Gh82U2aqjfb41u5IpvlJeeCKZXyZm9A6r8UIHv/unEK6OpIYMdayC', '01 58 54 23 62', 'azer', 'ARG', 2);

-- --------------------------------------------------------

--
-- Structure de la table `mkiu2_userGroup`
--

CREATE TABLE `mkiu2_userGroup` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL COMMENT '1=ADMIN / 2=USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mkiu2_userGroup`
--

INSERT INTO `mkiu2_userGroup` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'utilisateur');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `mkiu2_comments`
--
ALTER TABLE `mkiu2_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mkiu2_comments_mkiu2_user_FK` (`id_mkiu2_user`),
  ADD KEY `mkiu2_comments_mkiu2_typeOfComment0_FK` (`id_mkiu2_typeOfComment`),
  ADD KEY `mkiu2_comments_mkiu2_content1_FK` (`id_mkiu2_content`);

--
-- Index pour la table `mkiu2_content`
--
ALTER TABLE `mkiu2_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mkiu2_content_mkiu2_user_FK` (`id_mkiu2_user`),
  ADD KEY `mkiu2_content_mkiu2_typeOfContent0_FK` (`id_mkiu2_typeOfContent`);

--
-- Index pour la table `mkiu2_typeOfComment`
--
ALTER TABLE `mkiu2_typeOfComment`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mkiu2_typeOfContent`
--
ALTER TABLE `mkiu2_typeOfContent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `mkiu2_user`
--
ALTER TABLE `mkiu2_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mkiu2_user_mkiu2_userGroup_FK` (`id_mkiu2_userGroup`);

--
-- Index pour la table `mkiu2_userGroup`
--
ALTER TABLE `mkiu2_userGroup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `mkiu2_comments`
--
ALTER TABLE `mkiu2_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `mkiu2_content`
--
ALTER TABLE `mkiu2_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT pour la table `mkiu2_typeOfComment`
--
ALTER TABLE `mkiu2_typeOfComment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `mkiu2_typeOfContent`
--
ALTER TABLE `mkiu2_typeOfContent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `mkiu2_user`
--
ALTER TABLE `mkiu2_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `mkiu2_userGroup`
--
ALTER TABLE `mkiu2_userGroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `mkiu2_comments`
--
ALTER TABLE `mkiu2_comments`
  ADD CONSTRAINT `mkiu2_comments_mkiu2_content1_FK` FOREIGN KEY (`id_mkiu2_content`) REFERENCES `mkiu2_content` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `mkiu2_comments_mkiu2_typeOfComment0_FK` FOREIGN KEY (`id_mkiu2_typeOfComment`) REFERENCES `mkiu2_typeOfComment` (`id`),
  ADD CONSTRAINT `mkiu2_comments_mkiu2_user_FK` FOREIGN KEY (`id_mkiu2_user`) REFERENCES `mkiu2_user` (`id`);

--
-- Contraintes pour la table `mkiu2_content`
--
ALTER TABLE `mkiu2_content`
  ADD CONSTRAINT `mkiu2_content_mkiu2_user_FK` FOREIGN KEY (`id_mkiu2_user`) REFERENCES `mkiu2_user` (`id`);

--
-- Contraintes pour la table `mkiu2_user`
--
ALTER TABLE `mkiu2_user`
  ADD CONSTRAINT `mkiu2_user_mkiu2_userGroup_FK` FOREIGN KEY (`id_mkiu2_userGroup`) REFERENCES `mkiu2_userGroup` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
