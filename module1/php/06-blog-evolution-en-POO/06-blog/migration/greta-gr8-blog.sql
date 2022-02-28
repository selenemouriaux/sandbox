-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 21 fév. 2022 à 17:03
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `greta-gr8-blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `idArticle` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categoryId` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`idArticle`, `title`, `content`, `createdAt`, `categoryId`, `image`) VALUES
(1, 'Déficit commercial : la France s’enfonce', 'Pour le ministre de l’économie, Bruno Le Maire, c’est « le problème économique qu’il nous reste à régler dans les dix prochaines années ». Alors que la France affiche une croissance de 7 % pour 2021, supérieure à celle de ses principaux voisins, des créations d’emplois florissantes et que le chômage recule, le commerce extérieur reste l’ombre au tableau économique. Le déficit commercial de la France s’est en effet de nouveau aggravé sur l’année écoulée, à 84,7 milliards d’euros, selon les données des douanes publiées mardi 8 février. Il pulvérise le précédent record de 75 milliards d’euros, atteint en 2011. Une dégradation préoccupante, alors que l’impératif de la souveraineté face aux grands pays producteurs comme la Chine n’a jamais été autant mis en avant.', '2022-02-01 11:35:27', 2, 'https://picsum.photos/seed/hfdghjdgjhdghjdj/600/300'),
(2, 'A la recherche de nouveaux équilibres dans le management hybride', 'Carnet de bureau. Pour manager des équipes éclatées entre le bureau et le domicile, les entreprises sont encore à la recherche du bon équilibre. « Personne n’a finalisé son organisation de travail hybride. Les salariés se disent satisfaits du grand bond en avant fait sur l’équipement matériel, mais l’accès à l’information reste compliqué, et certains se sentent encore facilement exclus », estime Laurent Labbé, le fondateur de l’entreprise Choose My Company, qui, depuis deux ans, interroge régulièrement les salariés sur leur perception du management hybride, qu’ils soient en présentiel ou en distanciel.\r\n\r\nUne étude de l’Association pour l’emploi des cadres de l’automne 2021 confirme que 39 % des cadres ont perdu en visibilité sur le travail de leurs collaborateurs, et que pour 36 %, les échanges individuels sont devenus plus difficiles. « Il n’y a pas eu suffisamment de réflexion sur la refonte de la réorganisation du travail », résume M. Labbé.', '2022-01-05 11:52:58', 1, 'https://picsum.photos/seed/tyjteyjetyj/600/300'),
(3, 'Covid-19 : au Royaume-Uni, de jeunes volontaires infectés au nom de l’intérêt collectif', 'Dans quelle mesure peut-on, au nom de l’intérêt collectif, mettre en péril la santé de quelques-uns ? A l’époque du Covid-19, la question prend cette forme : le risque qu’on fait courir à de jeunes adultes en bonne santé, en leur inoculant délibérément le virus SARS-CoV-2, est-il justifié par les éventuels bénéfices pour l’humanité dans la lutte contre la pandémie ?\r\n\r\nDès le printemps 2020, le débat a été lancé. Moins de deux ans plus tard, le pas a été franchi. Au Royaume-Uni, 36 volontaires (26 hommes, 10 femmes) en bonne santé, âgés de 18 à 30 ans, ont été exposés au SARS-CoV-2. Puis le coronavirus a été traqué et pesé durant deux semaines dans leur organisme. Les résultats de ce premier « challenge infectieux » avec le SARS-CoV-2 ont été divulgués en preprint mercredi 2 février.\r\n\r\nApprouvée par un comité d’éthique britannique, pilotée par une équipe réputée de l’Imperial College, à Londres, en partenariat avec le ministère britannique de la santé, cette étude pilote visait d’abord à démontrer la faisabilité de l’approche et son absence de risque – du moins, sur le petit effectif de personnes enrôlées. Les participants ont été attentivement suivis au Royal Free Hospital de Londres et par la start-up hVIVO, experte en challenges infectieux contre d’autres microbes pathogènes.', '2022-02-09 11:56:13', 4, 'https://picsum.photos/seed/nimportequoiicihaha/600/300');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `idCategory` int(10) UNSIGNED NOT NULL,
  `label` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`idCategory`, `label`) VALUES
(1, 'Economie'),
(2, 'Culture'),
(3, 'International'),
(4, 'Covid');

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `idComment` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `articleId` int(10) UNSIGNED NOT NULL,
  `rate` tinyint(4) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userId` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `comment`
--

INSERT INTO `comment` (`idComment`, `content`, `articleId`, `rate`, `createdAt`, `userId`) VALUES
(11, 'rtjryjtyj', 3, 1, '2022-02-11 09:02:02', NULL),
(12, 'SUper article !', 3, 4, '2022-02-11 09:57:25', NULL),
(13, '<script>alert(\'BOOOM\');</script>', 3, 1, '2022-02-11 10:35:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `idUser` int(10) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `articleId` (`articleId`),
  ADD KEY `userId` (`userId`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idArticle` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`idCategory`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`articleId`) REFERENCES `article` (`idArticle`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
