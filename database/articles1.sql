-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 27 juil. 2024 à 02:10
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.8


create database articles_test;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `articles1`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `comment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`commentid`, `comment`, `comment_id`) VALUES
(3, 'kkk', 24),
(4, 'enjoy read this article 7', 24),
(5, 'enjoy read this article 8', 25),
(6, 'enjoy read this article 9', 26),
(7, 'enjoy read this article ', 24),
(8, 'enjoy read this article ', 24),
(9, 'enjoy read this article ', 24),
(10, 'enjoy read this article ', 24),
(11, 'enjoy read this article ', 24),
(12, 'enjoy read this article ', 24),
(13, 'enjoy read this article ', 24),
(14, 'enjoy read this article ', 24),
(15, 'enjoy read this article ', 24),
(16, 'thanks', 24),
(17, 'good article', 24);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `postid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`postid`, `title`, `content`, `status`, `user_id`) VALUES
(24, 'title article 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n			        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n			        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 1),
(25, 'title article 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n			        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n			        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 1),
(26, 'title article 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n			        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n			        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 1),
(39, 'title article 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n			        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n			        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 2),
(40, 'title article 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n			        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n			        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 2),
(41, 'title article 6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n			        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n			        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 2),
(42, 'title article 7', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n			        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n			        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 3),
(43, 'title article 8', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n			        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n			        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 3),
(44, 'title article 9', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\n			        	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\n			        	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\n			        	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\n			        	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\n			        	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `family_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `password`, `family_name`) VALUES
(1, 'ayoub', 'ayoub@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', 'ayoub issofi'),
(2, 'ayoub1', 'ayoub1@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(3, 'ayoub2', 'ayoub2@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(4, 'ayoub3', 'ayoub3@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(5, 'ayoub4', 'ayoub4@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(6, 'ayoub5', 'ayoub5@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(7, 'ayoub6', 'ayoub6@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(8, 'ayoub7', 'ayoub7@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(9, 'ayoub8', 'ayoub8@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(10, 'ayoub9', 'ayoub9@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(11, 'ayoub10', 'ayoub10@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(12, 'ayoub11', 'ayoub11@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(13, 'ayoub12@mail.com', 'ayoub12@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(14, 'ayoub13', 'ayoub13@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(15, 'ayoub14', 'ayoub14@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(16, 'ayoub15', 'ayoub15@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(17, 'ayoub16', 'ayoub16@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(18, 'ayoub17', 'ayoub17@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(19, 'ayoub18', 'ayoub18@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(20, 'ayoub19', 'ayoub@19mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(21, '', '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', ''),
(22, 'ayoub20', 'ayoub19@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(23, 'ayoub21', 'ayoub19', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(24, 'aaa', 'aaa', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(25, 'ayoub22', 'ayoub22@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(26, 'ayoub23', 'ayoub23@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(27, 'ayoub24', 'ayoub24@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(28, 'ayoub25', 'ayoub25@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(29, 'ayoub26', 'ayoub26@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(30, 'ayoub27', 'ayoub27@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(31, 'ayoub28', 'ayoub28@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(32, 'ayoub29', 'ayoub29@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(33, 'ayoub30', 'ayoub30@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(34, 'ayoub31', 'ayoub31@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(35, 'ayoub32', 'ayoub32@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', ''),
(36, 'ayoub33', 'AYOUB33@mail.com', '601f1889667efaebb33b8c12572835da3f027f78', '');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`),
  ADD KEY `comment_id` (`comment_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postid`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `postid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `posts` (`postid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
