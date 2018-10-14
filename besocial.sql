-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  sam. 13 oct. 2018 à 16:47
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `besocial`
--

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id_comment` bigint(20) NOT NULL,
  `date_post_comment` datetime NOT NULL,
  `id_commenter` bigint(20) NOT NULL,
  `id_post_commented` bigint(20) NOT NULL,
  `type_post_commented` varchar(6) NOT NULL,
  `comment_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`id_comment`, `date_post_comment`, `id_commenter`, `id_post_commented`, `type_post_commented`, `comment_content`) VALUES
(48, '2017-11-08 00:00:00', 19, 11, 'image', 'oussama have commented your image'),
(52, '2017-11-30 23:43:11', 19, 9, 'image', 'waw 3ale5er!!'),
(60, '2017-12-01 18:11:04', 19, 36, 'status', '&lt;h1&gt;my&lt;/h1&gt;'),
(61, '2017-12-01 18:12:19', 19, 36, 'status', 'Oussama Jawher Abdelwahed'),
(64, '2017-12-01 18:26:58', 19, 10, 'image', 'one'),
(72, '2017-12-01 23:36:54', 19, 38, 'status', 'c est un commentaire'),
(74, '2017-12-02 00:03:55', 19, 3, 'video', 'ne comment by me on video'),
(75, '2017-12-02 00:07:26', 19, 3, 'video', 'new other comment'),
(76, '2017-12-02 00:11:46', 19, 3, 'video', 'commenter three'),
(77, '2017-12-02 00:17:55', 19, 3, 'video', 'commenter two'),
(78, '2017-12-02 00:18:11', 19, 3, 'video', 'commenter one'),
(86, '2017-12-02 14:37:34', 19, 38, 'status', 'new new'),
(88, '2017-12-02 14:43:24', 19, 38, 'status', 'new comment modified'),
(100, '2017-12-02 15:16:56', 19, 11, 'image', 'wsd hhh'),
(101, '2017-12-02 15:17:15', 19, 11, 'image', 'new comment by me'),
(102, '2017-12-02 16:16:31', 19, 16, 'image', 'have a good play hhh'),
(104, '2017-12-04 15:25:23', 19, 15, 'image', 'new comment'),
(105, '2017-12-06 19:23:21', 19, 15, 'image', 'dfsd'),
(106, '2017-12-07 13:03:22', 27, 18, 'image', 'abdallah commented his photo'),
(107, '2017-12-07 13:07:12', 19, 18, 'image', 'commenter by Oussama'),
(108, '2017-12-07 16:21:55', 19, 17, 'image', 'hhhh graffiti Tag'),
(109, '2017-12-07 19:14:46', 19, 20, 'image', 'NEW COMMENT By Oussama'),
(110, '2017-12-07 19:16:28', 19, 19, 'image', 'Vogliamo La Coppa'),
(111, '2017-12-07 20:55:39', 19, 20, 'image', 'WHAT the fuck ha ka7la'),
(113, '2017-12-07 22:23:08', 19, 39, 'status', 'comment by me'),
(114, '2017-12-08 17:28:30', 26, 44, 'status', 'HAVE ONE'),
(115, '2017-12-08 17:31:05', 26, 44, 'status', 'new other comment'),
(116, '2017-12-08 21:47:46', 19, 19, 'image', 'Vive Le CLUB AFRICAIN CA'),
(117, '2017-12-10 17:32:07', 19, 18, 'image', 'qsd'),
(119, '2017-12-18 15:53:34', 31, 43, 'status', 'COMMENT'),
(121, '2017-12-18 16:56:52', 32, 75, 'status', 'DSDCOMMENT SD &lt;h1&gt;DSF&lt;/h1&gt;'),
(123, '2017-12-18 16:58:06', 32, 25, 'image', 'xoooooo'),
(124, '2017-12-18 17:01:39', 19, 25, 'image', 'qsdqsdqs');

-- --------------------------------------------------------

--
-- Structure de la table `connectioninfo`
--

CREATE TABLE `connectioninfo` (
  `id_user` bigint(20) NOT NULL,
  `date_before_last_connection` datetime DEFAULT NULL,
  `date_last_connection` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `friends`
--

CREATE TABLE `friends` (
  `id_friend` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `friends`
--

INSERT INTO `friends` (`id_friend`, `id_user`) VALUES
(19, 19),
(19, 23),
(19, 24),
(19, 25),
(19, 26),
(19, 27),
(19, 28),
(19, 29),
(19, 32),
(23, 19),
(23, 23),
(24, 19),
(24, 24),
(25, 19),
(25, 25),
(26, 19),
(26, 26),
(26, 29),
(27, 19),
(27, 27),
(28, 19),
(28, 28),
(29, 19),
(29, 26),
(29, 29),
(29, 31),
(30, 30),
(31, 29),
(31, 31),
(32, 19),
(32, 32);

-- --------------------------------------------------------

--
-- Structure de la table `image_likes`
--

CREATE TABLE `image_likes` (
  `id` int(11) NOT NULL,
  `id_liker` bigint(20) NOT NULL,
  `id_image_liked` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `image_likes`
--

INSERT INTO `image_likes` (`id`, `id_liker`, `id_image_liked`) VALUES
(55, 19, 15),
(57, 19, 17),
(60, 23, 19),
(63, 19, 18),
(64, 19, 19),
(65, 19, 20),
(66, 25, 19),
(67, 27, 19),
(68, 27, 18),
(69, 27, 15),
(70, 19, 9),
(71, 19, 23),
(72, 31, 24),
(73, 32, 25),
(74, 19, 25);

-- --------------------------------------------------------

--
-- Structure de la table `image_post`
--

CREATE TABLE `image_post` (
  `id` bigint(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `id_poster` bigint(20) NOT NULL,
  `date_post` datetime NOT NULL,
  `type` varchar(7) NOT NULL DEFAULT 'image'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `image_post`
--

INSERT INTO `image_post` (`id`, `url`, `titre`, `id_poster`, `date_post`, `type`) VALUES
(9, 'http://localhost/projetdsi/uploadedimages/7b8d4755cdc0b2413962be53902b1939.jpg', '', 19, '2017-11-30 18:35:27', 'image'),
(15, 'http://localhost/projetDSI/uploadedimages/34f300b88d035e53f3b3dd89a6f8e146.jpg', ' ', 19, '2017-12-02 16:07:58', 'image'),
(17, 'http://localhost/projetDSI/uploadedimages/008f47f04ef52e5ddaad189c7ecea100.jpg', 'selfie', 25, '2017-12-06 23:46:47', 'image'),
(18, 'http://localhost/projetDSI/uploadedimages/6b8f8550ff3419b84a9c745c6dd29828.jpg', 'club africain', 27, '2017-12-07 00:00:08', 'image'),
(19, 'http://localhost/projetDSI/uploadedimages/a1fac23c791cac2d1665daa3983dfe61.jpg', ' ', 23, '2017-12-07 15:26:51', 'image'),
(20, 'http://localhost/projetDSI/uploadedimages/16cfbdb23648553efa5e2f14e9241aaf.jpg', 'dodgers 2007', 25, '2017-12-07 18:25:18', 'image'),
(22, 'http://localhost/projetDSI/uploadedimages/84646e375a62db91b77f85ce697ef0f0.jpg', 'Tony Croos', 28, '2017-12-11 00:30:53', 'image'),
(23, 'http://localhost/projetDSI/uploadedimages/003a54fc8dbbff8e4d4b9842d0bd3714.jpg', 'fxg', 19, '2017-12-11 12:50:31', 'image'),
(24, 'http://localhost/projetDSI/uploadedimages/f15be119cfe3514aba9fa51fada3692a.jpg', 'photo 1', 31, '2017-12-18 15:49:04', 'image'),
(25, 'http://localhost/projetDSI/uploadedimages/b1cdc41b2380a3f09ab3186c8f7591c3.jpg', 'CA njq', 32, '2017-12-18 16:57:47', 'image');

-- --------------------------------------------------------

--
-- Structure de la table `invitation`
--

CREATE TABLE `invitation` (
  `id_inviter` bigint(20) NOT NULL,
  `id_invited` bigint(20) NOT NULL,
  `date_invitation` datetime NOT NULL,
  `accepted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `invitation`
--

INSERT INTO `invitation` (`id_inviter`, `id_invited`, `date_invitation`, `accepted`) VALUES
(19, 23, '2017-12-07 15:27:30', 1),
(19, 24, '2017-12-08 21:29:59', 1),
(19, 25, '2017-12-06 23:43:00', 1),
(19, 27, '2017-12-06 23:59:13', 1),
(19, 29, '2017-12-08 21:44:56', 1),
(19, 30, '2017-12-11 12:51:51', 0),
(26, 19, '2017-12-08 17:19:23', 1),
(26, 29, '2017-12-10 17:37:24', 1),
(28, 19, '2017-12-08 18:03:36', 1),
(31, 29, '2017-12-18 15:51:27', 1),
(32, 19, '2017-12-18 16:59:54', 1),
(32, 24, '2017-12-18 17:03:13', 0),
(32, 30, '2017-12-18 16:59:13', 0);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id_message` bigint(20) NOT NULL,
  `date_post_message` datetime NOT NULL,
  `id_sender` bigint(20) NOT NULL,
  `id_receiver` bigint(20) NOT NULL,
  `message_content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `status_likes`
--

CREATE TABLE `status_likes` (
  `id` int(11) NOT NULL,
  `id_liker` bigint(20) NOT NULL,
  `id_status_liked` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `status_likes`
--

INSERT INTO `status_likes` (`id`, `id_liker`, `id_status_liked`) VALUES
(50, 19, 38),
(52, 19, 36),
(54, 27, 38),
(55, 19, 44),
(56, 19, 45),
(59, 19, 39),
(60, 31, 46),
(61, 31, 43),
(62, 29, 43),
(63, 32, 75);

-- --------------------------------------------------------

--
-- Structure de la table `status_post`
--

CREATE TABLE `status_post` (
  `id` bigint(20) NOT NULL,
  `id_poster` bigint(20) NOT NULL,
  `date_post` datetime NOT NULL,
  `content` text NOT NULL,
  `type` varchar(7) NOT NULL DEFAULT 'status'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `status_post`
--

INSERT INTO `status_post` (`id`, `id_poster`, `date_post`, `content`, `type`) VALUES
(36, 19, '2017-11-30 18:40:58', '&lt;h1&gt;status Post by me now&lt;/h1&gt;', 'status'),
(38, 19, '2017-12-01 17:31:32', '&lt;h1&gt;oussma&lt;/h1&gt;', 'status'),
(39, 25, '2017-12-06 23:46:09', 'new status by amine kahla', 'status'),
(43, 29, '2017-12-07 16:28:52', 'Majdi Post status', 'status'),
(44, 19, '2017-12-07 18:23:25', 'New Status By Me &lt;h1&gt;OJA&lt;/h1&gt;', 'status'),
(45, 24, '2017-12-08 21:32:02', 'new status by Mohamed Amine Bejaoui', 'status'),
(46, 31, '2017-12-18 15:47:33', 'a status post &lt;h1&gt;oussama&lt;/h1&gt;', 'status'),
(47, 31, '2017-12-18 15:57:21', 'cxcvxcvcv', 'status'),
(48, 31, '2017-12-18 15:57:23', 'c', 'status'),
(49, 31, '2017-12-18 15:57:25', 'xcvxcvc', 'status'),
(50, 31, '2017-12-18 15:57:27', 'xcvcxvx', 'status'),
(51, 31, '2017-12-18 15:57:32', 'dfgfdg', 'status'),
(52, 31, '2017-12-18 15:57:33', 'dfgdfgdf', 'status'),
(53, 31, '2017-12-18 15:57:35', 'dfgdfgfd', 'status'),
(54, 31, '2017-12-18 15:57:36', 'fddf', 'status'),
(55, 31, '2017-12-18 15:57:37', 'fg', 'status'),
(56, 31, '2017-12-18 15:57:39', 'fg', 'status'),
(57, 31, '2017-12-18 15:57:40', 'df', 'status'),
(58, 31, '2017-12-18 15:57:42', 'gfdg', 'status'),
(59, 31, '2017-12-18 15:57:54', 'ddddddddddd', 'status'),
(60, 31, '2017-12-18 15:57:55', 'gggggggg', 'status'),
(61, 31, '2017-12-18 15:57:57', 'ffffffff', 'status'),
(62, 31, '2017-12-18 15:57:58', 'fffffffffffffff', 'status'),
(67, 19, '2017-12-18 16:30:49', 'kj', 'status'),
(68, 19, '2017-12-18 16:31:36', 'kj', 'status'),
(69, 19, '2017-12-18 16:34:10', 'cv', 'status'),
(75, 32, '2017-12-18 16:56:07', 'STATUS POST &lt;h1&gt;EDREE&lt;/h1&gt;', 'status');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `forgot_password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `sex` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom`, `prenom`, `email`, `password`, `forgot_password`, `photo`, `birthday`, `sex`) VALUES
(19, 'Abdelwahed', 'Oussama', 'ousabdelwahed@gmail.com', '93e29df6ba569ed87974252b7ae439e8f9880e5c79d53bb9f82efe3bf3c383e0', '5a37e7588fe6b', 'http://localhost/projetDSI/miniatures/86b70b6a73b0dde69f59f2300299b742min.jpg', '1910-10-01', 'f'),
(23, 'Lahbib', 'mouin', 'mouinlahbib@yahoo.fr', 'd3f4ae652dfeec6faeb46a0b84d1f17c6957dcf0bc50f283fd76e94b8630a74b', '5a286f6f1a84b', 'http://localhost/projetdsi/miniatures/bfbd3394d77b6506c6c6112b41d3d55emin.jpg', '1906-12-11', 'h'),
(24, 'bjeaoui', 'Amine', 'aminebejaoui@hotmail.com', 'e9bfceaaac89a3d6a5fbfa81b1207c60284fab4ff32b36f8d7517014669d05c0', '5a286ffb166ea', 'http://localhost/projetdsi/miniatures/5529b50d654c2d1fd36be7723a1cbc8amin.jpg', '1902-07-09', 'h'),
(25, 'kahla', 'amine', 'aminekahla@yahoo.fr', 'eb93028c27dfc61e2eb21aa6a235452ad6e4426db5e4d6cb6d4abc5eda6a4302', '5a28708313067', 'http://localhost/projetdsi/miniatures/5ce7a57f926b6f2faba5fbb8e1cab4d2min.jpg', '1903-08-09', 'h'),
(26, 'ben slimen', 'hammadi', 'hammadifrein@yahoo.fr', '2061fe850f8aeb05805c0c01867806b4177f00dbabf0322269e75ba70f6585e7', '5a2870c772423', 'http://localhost/projetdsi/miniatures/faa10468f615e497bbce0a6a161741f1min.jpg', '0000-00-00', 'h'),
(27, 'mokcheh', 'abdallah', 'abdallahmock@gmail.com', 'c85fea9716fb9e645657f77b3ff28e8a24b48fc3dfc99e54940b8ac67026a131', '5a28715cdb1ef', 'http://localhost/projetdsi/miniatures/5a7459b5d75d959ffd1ee1104f4c3deemin.jpg', '1904-07-09', 'h'),
(28, 'tlich', 'khmayes', 'khmayestlich@yahoo.fr', '0852db696179cbca6a6695d6fa4e4967aa40fb5bb40408bbc484cfc9e687c34d', '5a2871b81826d', 'http://localhost/projetdsi/miniatures/5e705eee8d57b1e072852bfbf52bd1ccmin.jpg', '1902-05-07', 'h'),
(29, 'Ben Salah', 'Majdi', 'majdibensahal@gmail.com', 'a8e6c0022767a8905c786ddb826c0884b15a30971f2ef1d1982e5af830e617d3', '5a295deddc571', 'http://localhost/projetdsi/miniatures/4621cf8cd370809affe3451c4cc56d34min.jpg', '1902-06-08', 'h'),
(30, 'Abdelwahed', 'Jawher', 'jawherabdelwhahed@yahoo.fr', '161c03e5d7017d18990156fd30c465b157c61a73dc054263f9fbcbab96ac2967', '5a2e70d68b639', 'http://localhost/projetdsi/miniatures/cc4e1f60f2dd548f1a3a465d2dc792b8min.jpg', '1997-04-06', 'h'),
(31, 'oussama jawher', 'abdelwahed', 'jawherabdelwahed@gmail.com', '93e29df6ba569ed87974252b7ae439e8f9880e5c79d53bb9f82efe3bf3c383e0', '5a37d90baa0c7', 'http://localhost/projetDSI/miniatures/7f3f7f0da93058f341a0675cde35fcfbmin.jpg', '1997-04-06', 'h'),
(32, 'ben salem 1', 'ali', 'alibensalem@gmail.com', '93e29df6ba569ed87974252b7ae439e8f9880e5c79d53bb9f82efe3bf3c383e0', '5a37e473829ce', 'http://localhost/projetDSI/miniatures/b7d287d28fb40a7ad39a401ffb2aa653min.jpg', '1908-08-13', 'h');

-- --------------------------------------------------------

--
-- Structure de la table `video_likes`
--

CREATE TABLE `video_likes` (
  `id` int(11) NOT NULL,
  `id_liker` bigint(20) NOT NULL,
  `id_video_liked` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `video_likes`
--

INSERT INTO `video_likes` (`id`, `id_liker`, `id_video_liked`) VALUES
(9, 19, 3);

-- --------------------------------------------------------

--
-- Structure de la table `video_post`
--

CREATE TABLE `video_post` (
  `id` bigint(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `id_poster` bigint(20) NOT NULL,
  `date_post` datetime NOT NULL,
  `type` varchar(7) NOT NULL DEFAULT 'video'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `video_post`
--

INSERT INTO `video_post` (`id`, `url`, `titre`, `id_poster`, `date_post`, `type`) VALUES
(3, 'http://localhost/projetdsi/uploadedvideos/bbbbba191cd9c8f9bbfadb6c907085c9.mp4', '&lt;h1&gt;video&lt;/h1&gt;', 19, '2017-11-30 23:54:53', 'video'),
(4, 'http://localhost/projetDSI/uploadedvideos/0c420bca524729964ac9ae5e7aa2597b.mp4', 'video 1', 31, '2017-12-18 15:50:36', 'video');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_commenter` (`id_commenter`);

--
-- Index pour la table `connectioninfo`
--
ALTER TABLE `connectioninfo`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`id_friend`,`id_user`),
  ADD KEY `id_friend` (`id_friend`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `image_likes`
--
ALTER TABLE `image_likes`
  ADD PRIMARY KEY (`id_liker`,`id_image_liked`),
  ADD KEY `id_liker` (`id_liker`),
  ADD KEY `id_image_liked` (`id_image_liked`),
  ADD KEY `id_auto_il` (`id`);

--
-- Index pour la table `image_post`
--
ALTER TABLE `image_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_image_poster` (`id_poster`);

--
-- Index pour la table `invitation`
--
ALTER TABLE `invitation`
  ADD PRIMARY KEY (`id_inviter`,`id_invited`),
  ADD KEY `id_inviter` (`id_inviter`),
  ADD KEY `id_invited` (`id_invited`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `id_sender` (`id_sender`),
  ADD KEY `id_receiver` (`id_receiver`);

--
-- Index pour la table `status_likes`
--
ALTER TABLE `status_likes`
  ADD PRIMARY KEY (`id_status_liked`,`id_liker`),
  ADD KEY `id_status_liked` (`id_status_liked`),
  ADD KEY `id_liker` (`id_liker`),
  ADD KEY `id_status_liked_2` (`id_status_liked`),
  ADD KEY `id_auto_sl` (`id`);

--
-- Index pour la table `status_post`
--
ALTER TABLE `status_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_status_poster` (`id_poster`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `uniq_email` (`email`),
  ADD KEY `photo` (`photo`);

--
-- Index pour la table `video_likes`
--
ALTER TABLE `video_likes`
  ADD PRIMARY KEY (`id_liker`,`id_video_liked`),
  ADD KEY `id_liker` (`id_liker`),
  ADD KEY `id_video_liked` (`id_video_liked`),
  ADD KEY `id_auto_vl` (`id`);

--
-- Index pour la table `video_post`
--
ALTER TABLE `video_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_video_poster` (`id_poster`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT pour la table `image_likes`
--
ALTER TABLE `image_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT pour la table `image_post`
--
ALTER TABLE `image_post`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id_message` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `status_likes`
--
ALTER TABLE `status_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT pour la table `status_post`
--
ALTER TABLE `status_post`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `video_likes`
--
ALTER TABLE `video_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `video_post`
--
ALTER TABLE `video_post`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_commenter`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `connectioninfo`
--
ALTER TABLE `connectioninfo`
  ADD CONSTRAINT `connectioninfo_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `friends`
--
ALTER TABLE `friends`
  ADD CONSTRAINT `friends_ibfk_1` FOREIGN KEY (`id_friend`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `friends_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `image_likes`
--
ALTER TABLE `image_likes`
  ADD CONSTRAINT `image_likes_ibfk_1` FOREIGN KEY (`id_liker`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `image_likes_ibfk_2` FOREIGN KEY (`id_image_liked`) REFERENCES `image_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `image_post`
--
ALTER TABLE `image_post`
  ADD CONSTRAINT `image_post_ibfk_1` FOREIGN KEY (`id_poster`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `invitation`
--
ALTER TABLE `invitation`
  ADD CONSTRAINT `invitation_ibfk_1` FOREIGN KEY (`id_inviter`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `invitation_ibfk_2` FOREIGN KEY (`id_invited`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`id_receiver`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messages_ibfk_3` FOREIGN KEY (`id_sender`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `status_likes`
--
ALTER TABLE `status_likes`
  ADD CONSTRAINT `status_likes_ibfk_1` FOREIGN KEY (`id_liker`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `status_likes_ibfk_2` FOREIGN KEY (`id_status_liked`) REFERENCES `status_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `status_post`
--
ALTER TABLE `status_post`
  ADD CONSTRAINT `status_post_ibfk_1` FOREIGN KEY (`id_poster`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `video_likes`
--
ALTER TABLE `video_likes`
  ADD CONSTRAINT `video_likes_ibfk_1` FOREIGN KEY (`id_liker`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `video_likes_ibfk_2` FOREIGN KEY (`id_video_liked`) REFERENCES `video_post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `video_post`
--
ALTER TABLE `video_post`
  ADD CONSTRAINT `video_post_ibfk_1` FOREIGN KEY (`id_poster`) REFERENCES `users` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
