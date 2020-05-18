-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 18 mai 2020 à 02:15
-- Version du serveur :  10.1.36-MariaDB
-- Version de PHP :  7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_kelasi002`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_candidature`
--

CREATE TABLE `t_candidature` (
  `idcand` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `sexe` varchar(2) DEFAULT NULL,
  `nationalite` varchar(100) DEFAULT NULL,
  `tel` varchar(13) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `date_at` varchar(20) DEFAULT NULL,
  `date_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_comptens`
--

CREATE TABLE `t_comptens` (
  `idcomptens` int(11) NOT NULL,
  `idEns` int(11) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `tel` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_at` varchar(20) DEFAULT NULL,
  `date_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_comptens`
--

INSERT INTO `t_comptens` (`idcomptens`, `idEns`, `role`, `tel`, `email`, `password`, `date_at`, `date_update`) VALUES
(1, 1, 'enseignant', '+243890387263', 'jdlkamba@gmail.com', '895a0cf6ba52053acfc853c78983eb5f6919e111', '2020-04-29 00:32:07', '10-05-2020 19:13:18'),
(2, 2, 'enseignant', '+243902938726', 'rebeccakasokki@gmail.com', '895a0cf6ba52053acfc853c78983eb5f6919e111', '2020-05-14 12:51:31', '2020-05-14 12:51:31');

-- --------------------------------------------------------

--
-- Structure de la table `t_comptstd`
--

CREATE TABLE `t_comptstd` (
  `idcmptstd` int(11) NOT NULL,
  `idstd` int(11) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `tel` varchar(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_at` varchar(20) DEFAULT NULL,
  `date_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_comptstd`
--

INSERT INTO `t_comptstd` (`idcmptstd`, `idstd`, `role`, `tel`, `email`, `password`, `date_at`, `date_update`) VALUES
(1, 1, 'etudiant', '+243892736257', 'gloriaboriak@gmail.com', '0bbf31d9da625147cbe69f7b1f5af704a8105f12', '2020-05-01 20:08:27', '10-05-2020 19:16:16');

-- --------------------------------------------------------

--
-- Structure de la table `t_concours`
--

CREATE TABLE `t_concours` (
  `idconcours` int(11) NOT NULL,
  `annee` varchar(15) DEFAULT NULL,
  `idcand` int(11) DEFAULT NULL,
  `point_obt` int(11) DEFAULT NULL,
  `datecrea` varchar(20) DEFAULT NULL,
  `date_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `t_cote`
--

CREATE TABLE `t_cote` (
  `idcote` int(11) NOT NULL,
  `annee` varchar(15) DEFAULT NULL,
  `idinscrit` int(11) DEFAULT NULL,
  `idcours` int(11) DEFAULT NULL,
  `examen` varchar(30) NOT NULL,
  `point_obt` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT NULL,
  `mention` varchar(20) DEFAULT NULL,
  `date_at` varchar(20) DEFAULT NULL,
  `date_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_cote`
--

INSERT INTO `t_cote` (`idcote`, `annee`, `idinscrit`, `idcours`, `examen`, `point_obt`, `max`, `mention`, `date_at`, `date_update`) VALUES
(1, '2019-2020 	', 1, 1, 'Mi-session', 33, 60, '', '2020-05-01 14:33:36', '2020-05-01 14:33:36'),
(2, '2019-2020 	', 1, 2, 'Mi-session', 28, 60, 'echec', '2020-05-01 14:36:29', '2020-05-01 14:36:29'),
(3, '2019-2020 	', 1, 3, 'Mi-session', 42, 60, '', '2020-05-01 14:39:00', '2020-05-01 14:39:00'),
(4, '2019-2020', 1, 4, 'Mi-session', 0, 60, 'manque cote', '2020-05-01 14:41:30', '2020-05-01 14:41:30'),
(5, '2019-2020', 1, 5, 'Session', 28, 40, '', '2020-05-01 14:44:17', '2020-05-01 14:44:17'),
(6, '2019-2020', 1, 6, 'Session', 17, 40, 'echec', '2020-05-01 14:46:04', '2020-05-01 14:46:04'),
(7, '2019-2020', 1, 7, 'Session', 22, 40, '', '2020-05-01 14:48:01', '2020-05-01 14:48:01'),
(8, '2019-2020', 1, 8, 'Session', 38, 40, '', '2020-05-01 14:48:43', '2020-05-01 14:48:43'),
(9, '2019-2020', 1, 9, 'Session', 11, 20, '', '2020-05-01 14:50:40', '2020-05-01 14:50:40'),
(10, '2019-2020', 1, 10, 'Session', 13, 20, '', '2020-05-01 14:51:09', '2020-05-01 14:51:09'),
(11, '2019-2020', 1, 11, 'Session', 17, 20, '', '2020-05-01 14:51:41', '2020-05-01 14:51:41');

-- --------------------------------------------------------

--
-- Structure de la table `t_cours`
--

CREATE TABLE `t_cours` (
  `idcours` int(11) NOT NULL,
  `idfac` int(11) DEFAULT NULL,
  `idpromo` int(11) DEFAULT NULL,
  `cours` varchar(100) DEFAULT NULL,
  `volHor` varchar(4) DEFAULT NULL,
  `description_cours` text,
  `date_at` varchar(10) DEFAULT NULL,
  `date_update` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_cours`
--

INSERT INTO `t_cours` (`idcours`, `idfac`, `idpromo`, `cours`, `volHor`, `description_cours`, `date_at`, `date_update`) VALUES
(1, 2, 1, 'Algorithmique I', '60H', 'L\'algorithmique est l\'Ã©tude et la production de rÃ¨gles et techniques qui sont impliquÃ©es dans la dÃ©finition et la conception d\'algorithmes, c\'est-Ã -dire de processus systÃ©matiques de rÃ©solution d\'un problÃ¨me permettant de dÃ©crire prÃ©cisÃ©ment des Ã©tapes pour rÃ©soudre un problÃ¨me algorithmique. ', '2020-04-28', '2020-05-14'),
(2, 2, 1, 'Labo Informatique I', '90H', 'Le cours de labo I en informatique permet aux Ã©tudiants d\'entrer dans le bain pratique de leurs applications et le dÃ©veloppement intellectuel et pratique de leur matiÃ¨re.ce cours permet Ã  approfondir la maitrise de tout autre cours appris de  caractÃ¨res informatique.', '2020-04-28', '2020-04-28'),
(3, 2, 1, 'Langages de Programmation', '120H', 'Un langage de programmation est une notation conventionnelle destinÃ©e Ã  formuler des algorithmes et produire des programmes informatiques qui les appliquent. D\'une maniÃ¨re similaire Ã  une langue naturelle, un langage de programmation est composÃ© d\'un alphabet, d\'un vocabulaire, de rÃ¨gles de grammaire et de significations', '2020-04-28', '2020-04-28'),
(4, 2, 1, 'Informatique gÃ©nÃ©rale', '90H', '\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-28', '2020-04-28'),
(5, 2, 1, 'ComptabilitÃ© GÃ©nÃ©rale', '90H', '\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-28', '2020-04-28'),
(6, 2, 1, 'MathÃ©matique gÃ©nÃ©rale', '60', '\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-28', '2020-04-28'),
(7, 2, 1, 'Anglais technique I', '60H', '\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-28', '2020-04-28'),
(8, 2, 1, 'Statistique Descriptive', '45H', '\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-28', '2020-04-28'),
(9, 2, 1, 'Logique, Expression Orale & Ã‰crite', '45', '\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-28', '2020-04-28'),
(10, 2, 1, 'Ã‰ducation Ã  la CitoyennetÃ©', '30H', '\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-28', '2020-04-28'),
(11, 2, 1, 'Ã‰conomie politique', '45H', '\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '2020-04-28', '2020-04-28');

-- --------------------------------------------------------

--
-- Structure de la table `t_enseignant`
--

CREATE TABLE `t_enseignant` (
  `idEns` int(11) NOT NULL,
  `idfac` int(11) DEFAULT NULL,
  `noms` varchar(100) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `sexe` varchar(2) DEFAULT NULL,
  `nationalite` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `categorie` varchar(20) DEFAULT NULL,
  `typens` varchar(20) DEFAULT NULL,
  `description` text NOT NULL,
  `datecre_at` varchar(20) DEFAULT NULL,
  `date_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_enseignant`
--

INSERT INTO `t_enseignant` (`idEns`, `idfac`, `noms`, `prenom`, `sexe`, `nationalite`, `adresse`, `categorie`, `typens`, `description`, `datecre_at`, `date_update`) VALUES
(1, 2, 'Kambale Tshongo', 'Jean de Dieu', 'M', 'Congolaise', '175, Aketi Q/Lokole C/Lingwala', 'P.O', 'Visiteur', 'Professeur des universitÃ©s\r\nDocteur(Ph.D) en Sciences Infromatiques\r\nIl enseigne la TÃ©lÃ©matique et le SystÃ¨me d\'information de Gestions', '2020-04-28 03:42:52', '2020-05-14 12:14:00'),
(2, 2, 'Kasoki Abondance ', 'RÃ©becca', 'F', 'Congolaise', '2913 Prince de LiÃ¨ge C/Gombe', 'Prof', 'LAU', 'Elle enseigne la programmation', '2020-05-14 12:29:12', '2020-05-14 12:29:12');

-- --------------------------------------------------------

--
-- Structure de la table `t_faculte`
--

CREATE TABLE `t_faculte` (
  `idfac` int(11) NOT NULL,
  `faculte` varchar(100) DEFAULT NULL,
  `_option` varchar(100) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_faculte`
--

INSERT INTO `t_faculte` (`idfac`, `faculte`, `_option`, `iduser`) VALUES
(2, 'Informatique', 'Gestion', 1),
(3, 'MBA', 'Business & Administration', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_inscription`
--

CREATE TABLE `t_inscription` (
  `idinscrit` int(11) NOT NULL,
  `idstd` int(11) DEFAULT NULL,
  `idpromo` int(11) DEFAULT NULL,
  `idfac` int(11) DEFAULT NULL,
  `annee` varchar(15) DEFAULT NULL,
  `datecrea` varchar(20) DEFAULT NULL,
  `date_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_inscription`
--

INSERT INTO `t_inscription` (`idinscrit`, `idstd`, `idpromo`, `idfac`, `annee`, `datecrea`, `date_update`) VALUES
(1, 1, 1, 2, '2019-2020', '2020-05-01 09:34:49', '2020-05-01 09:34:49');

-- --------------------------------------------------------

--
-- Structure de la table `t_program`
--

CREATE TABLE `t_program` (
  `idpgrm` int(11) NOT NULL,
  `annee` varchar(20) DEFAULT NULL,
  `idEns` int(11) DEFAULT NULL,
  `idpromo` int(11) NOT NULL,
  `idcours` int(11) DEFAULT NULL,
  `debut` varchar(20) DEFAULT NULL,
  `fin` varchar(20) DEFAULT NULL,
  `processus` varchar(20) DEFAULT NULL,
  `date_at` varchar(20) DEFAULT NULL,
  `date_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_program`
--

INSERT INTO `t_program` (`idpgrm`, `annee`, `idEns`, `idpromo`, `idcours`, `debut`, `fin`, `processus`, `date_at`, `date_update`) VALUES
(1, '2019-2020', 1, 1, 1, '2019-12-24', '2020-02-29', 'Encours ..', '2020-04-28', '2020-05-07 20:29:34'),
(2, '2019-2020', 1, 1, 3, '2020-03-09', '2020-06-06', 'BientÃ´t encours', '2020-04-28 22:36:30', '2020-04-28 22:36:30'),
(3, '2019-2020', 2, 1, 4, '2020-05-14', '2020-05-28', 'BientÃ´t encours', '2020-05-14 12:56:16', '2020-05-14 12:56:16'),
(4, '2019-2020', 2, 1, 2, '2020-05-21', '2020-06-26', 'BientÃ´t encours', '2020-05-14 13:26:53', '2020-05-14 13:26:53');

-- --------------------------------------------------------

--
-- Structure de la table `t_promotion`
--

CREATE TABLE `t_promotion` (
  `idpromo` int(11) NOT NULL,
  `slug_promo` varchar(10) DEFAULT NULL,
  `promotion` varchar(20) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_promotion`
--

INSERT INTO `t_promotion` (`idpromo`, `slug_promo`, `promotion`, `iduser`) VALUES
(1, 'G1', 'Premiere graduat', 1),
(2, 'G2', 'DeuxiÃ¨me graduat', 1),
(3, 'G3', 'TroisiÃ¨me Graduat', 1),
(4, 'L1', 'PremiÃ¨re Licence', 1),
(5, 'L2', 'DeuxiÃ¨me Licence', 1),
(6, 'Ma1', 'Premier Master', 1),
(7, 'Ma2', 'DeuxiÃ¨me Master', 1),
(8, 'Doc', 'Doctorat', 1);

-- --------------------------------------------------------

--
-- Structure de la table `t_student`
--

CREATE TABLE `t_student` (
  `idstd` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `sexe` varchar(2) DEFAULT NULL,
  `nationalite` varchar(100) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `datecrea` varchar(20) DEFAULT NULL,
  `date_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_student`
--

INSERT INTO `t_student` (`idstd`, `name`, `prenom`, `sexe`, `nationalite`, `adresse`, `datecrea`, `date_update`) VALUES
(1, 'Bodo Kembo', 'Gloria', ' F', 'Congolaise', '221 Centrale Q/Kauka C/Kalamu', '2020-05-01 00:30:20', '2020-05-08 23:50:18');

-- --------------------------------------------------------

--
-- Structure de la table `t_users`
--

CREATE TABLE `t_users` (
  `iduser` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `sexe` varchar(2) DEFAULT NULL,
  `tel` varchar(13) DEFAULT NULL,
  `adress` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date_at` varchar(20) DEFAULT NULL,
  `date_update` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `t_users`
--

INSERT INTO `t_users` (`iduser`, `name`, `prenom`, `sexe`, `tel`, `adress`, `email`, `role`, `password`, `date_at`, `date_update`) VALUES
(1, 'Vihamba Wengese', 'Fortinho', 'M', '+243973022787', '175, Aketi Q/Lokole C/Lingwala', 'fortinhodanvhamba@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '10-05-2020 17:52:50', '10-05-2020 17:52:50'),
(2, 'Hindule Vihamba', 'Tatiana', 'F', '+243890483728', '1256 Cadastre Q/Bon MarchÃ© C/Barumbu ', 'tatianahindule@gmail.com', '			    			    editeur', 'de80c6dfca7dccfcdc9f96d6c928a929b356a5a2', '10-05-2020 15:39:51', '10-05-2020 21:40:34'),
(3, 'Bongey Bondole', 'Christian', 'M', '+243978493047', '2563 Tombalbay C/Gombe', 'christianbongey@gmail.com', '			    			    secretariat', '0a9819b7419168b4b9ab2d8563b5983dc818130f', '10-05-2020 15:43:21', '14-05-2020 12:16:14');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_candidature`
--
ALTER TABLE `t_candidature`
  ADD PRIMARY KEY (`idcand`);

--
-- Index pour la table `t_comptens`
--
ALTER TABLE `t_comptens`
  ADD PRIMARY KEY (`idcomptens`),
  ADD KEY `idEns` (`idEns`);

--
-- Index pour la table `t_comptstd`
--
ALTER TABLE `t_comptstd`
  ADD PRIMARY KEY (`idcmptstd`),
  ADD KEY `idstd` (`idstd`);

--
-- Index pour la table `t_concours`
--
ALTER TABLE `t_concours`
  ADD PRIMARY KEY (`idconcours`),
  ADD KEY `idcand` (`idcand`);

--
-- Index pour la table `t_cote`
--
ALTER TABLE `t_cote`
  ADD PRIMARY KEY (`idcote`),
  ADD KEY `idinscrit` (`idinscrit`),
  ADD KEY `idcours` (`idcours`);

--
-- Index pour la table `t_cours`
--
ALTER TABLE `t_cours`
  ADD PRIMARY KEY (`idcours`),
  ADD KEY `idfac` (`idfac`),
  ADD KEY `idpromo` (`idpromo`);

--
-- Index pour la table `t_enseignant`
--
ALTER TABLE `t_enseignant`
  ADD PRIMARY KEY (`idEns`),
  ADD KEY `idfac` (`idfac`);

--
-- Index pour la table `t_faculte`
--
ALTER TABLE `t_faculte`
  ADD PRIMARY KEY (`idfac`),
  ADD KEY `iduser` (`iduser`);

--
-- Index pour la table `t_inscription`
--
ALTER TABLE `t_inscription`
  ADD PRIMARY KEY (`idinscrit`),
  ADD KEY `idstd` (`idstd`),
  ADD KEY `idpromo` (`idpromo`),
  ADD KEY `idfac` (`idfac`);

--
-- Index pour la table `t_program`
--
ALTER TABLE `t_program`
  ADD PRIMARY KEY (`idpgrm`),
  ADD KEY `idEns` (`idEns`),
  ADD KEY `idcours` (`idcours`),
  ADD KEY `idpromo` (`idpromo`);

--
-- Index pour la table `t_promotion`
--
ALTER TABLE `t_promotion`
  ADD PRIMARY KEY (`idpromo`),
  ADD KEY `iduser` (`iduser`);

--
-- Index pour la table `t_student`
--
ALTER TABLE `t_student`
  ADD PRIMARY KEY (`idstd`);

--
-- Index pour la table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_candidature`
--
ALTER TABLE `t_candidature`
  MODIFY `idcand` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_comptens`
--
ALTER TABLE `t_comptens`
  MODIFY `idcomptens` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_comptstd`
--
ALTER TABLE `t_comptstd`
  MODIFY `idcmptstd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_concours`
--
ALTER TABLE `t_concours`
  MODIFY `idconcours` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `t_cote`
--
ALTER TABLE `t_cote`
  MODIFY `idcote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `t_cours`
--
ALTER TABLE `t_cours`
  MODIFY `idcours` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `t_enseignant`
--
ALTER TABLE `t_enseignant`
  MODIFY `idEns` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `t_faculte`
--
ALTER TABLE `t_faculte`
  MODIFY `idfac` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `t_inscription`
--
ALTER TABLE `t_inscription`
  MODIFY `idinscrit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_program`
--
ALTER TABLE `t_program`
  MODIFY `idpgrm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `t_promotion`
--
ALTER TABLE `t_promotion`
  MODIFY `idpromo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `t_student`
--
ALTER TABLE `t_student`
  MODIFY `idstd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_comptens`
--
ALTER TABLE `t_comptens`
  ADD CONSTRAINT `t_comptens_ibfk_1` FOREIGN KEY (`idEns`) REFERENCES `t_enseignant` (`idEns`);

--
-- Contraintes pour la table `t_comptstd`
--
ALTER TABLE `t_comptstd`
  ADD CONSTRAINT `t_comptstd_ibfk_1` FOREIGN KEY (`idstd`) REFERENCES `t_student` (`idstd`);

--
-- Contraintes pour la table `t_concours`
--
ALTER TABLE `t_concours`
  ADD CONSTRAINT `t_concours_ibfk_1` FOREIGN KEY (`idcand`) REFERENCES `t_candidature` (`idcand`);

--
-- Contraintes pour la table `t_cote`
--
ALTER TABLE `t_cote`
  ADD CONSTRAINT `t_cote_ibfk_1` FOREIGN KEY (`idinscrit`) REFERENCES `t_inscription` (`idinscrit`),
  ADD CONSTRAINT `t_cote_ibfk_2` FOREIGN KEY (`idcours`) REFERENCES `t_cours` (`idcours`);

--
-- Contraintes pour la table `t_cours`
--
ALTER TABLE `t_cours`
  ADD CONSTRAINT `t_cours_ibfk_1` FOREIGN KEY (`idfac`) REFERENCES `t_faculte` (`idfac`),
  ADD CONSTRAINT `t_cours_ibfk_2` FOREIGN KEY (`idpromo`) REFERENCES `t_promotion` (`idpromo`);

--
-- Contraintes pour la table `t_enseignant`
--
ALTER TABLE `t_enseignant`
  ADD CONSTRAINT `t_enseignant_ibfk_1` FOREIGN KEY (`idfac`) REFERENCES `t_faculte` (`idfac`);

--
-- Contraintes pour la table `t_faculte`
--
ALTER TABLE `t_faculte`
  ADD CONSTRAINT `t_faculte_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `t_users` (`iduser`);

--
-- Contraintes pour la table `t_inscription`
--
ALTER TABLE `t_inscription`
  ADD CONSTRAINT `t_inscription_ibfk_1` FOREIGN KEY (`idstd`) REFERENCES `t_student` (`idstd`),
  ADD CONSTRAINT `t_inscription_ibfk_2` FOREIGN KEY (`idpromo`) REFERENCES `t_promotion` (`idpromo`),
  ADD CONSTRAINT `t_inscription_ibfk_3` FOREIGN KEY (`idfac`) REFERENCES `t_faculte` (`idfac`);

--
-- Contraintes pour la table `t_program`
--
ALTER TABLE `t_program`
  ADD CONSTRAINT `t_program_ibfk_1` FOREIGN KEY (`idEns`) REFERENCES `t_enseignant` (`idEns`),
  ADD CONSTRAINT `t_program_ibfk_2` FOREIGN KEY (`idcours`) REFERENCES `t_cours` (`idcours`),
  ADD CONSTRAINT `t_program_ibfk_3` FOREIGN KEY (`idpromo`) REFERENCES `t_promotion` (`idpromo`);

--
-- Contraintes pour la table `t_promotion`
--
ALTER TABLE `t_promotion`
  ADD CONSTRAINT `t_promotion_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `t_users` (`iduser`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
