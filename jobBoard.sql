-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 18 oct. 2021 à 13:22
-- Version du serveur : 5.7.35-0ubuntu0.18.04.2
-- Version de PHP : 7.3.31-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jobBoard`
--

-- --------------------------------------------------------

--
-- Structure de la table `Advertisement`
--

CREATE TABLE `Advertisement` (
  `id` int(11) NOT NULL,
  `Date` date NOT NULL,
  `JobTitle` varchar(100) NOT NULL,
  `Society` varchar(100) NOT NULL,
  `City` varchar(11) NOT NULL,
  `PostCode` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Missions` text NOT NULL,
  `remuneration` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `Advertisement`
--

INSERT INTO `Advertisement` (`id`, `Date`, `JobTitle`, `Society`, `City`, `PostCode`, `Description`, `Missions`, `remuneration`) VALUES
(1, '2021-10-05', 'Dev Fullstack', 'Castorama', 'Lille', 59, 'fuifhzeuiefhuifeheuifh', 'ueifhzeuihfzpuefhuizehfiusdh', 0),
(2, '2020-10-04', 'Devops', 'Amazon', 'Roubaix', 59, 'testdenff', 'testttefefffffffefeheuifhzeui', 0),
(3, '2021-10-05', 'Dev Fullstack', 'Leroy Merlin', 'Lille', 59, 'fuifhzeuiefhuifeheuifh', 'ueifhzeuihfzpuefhuizehfiusdh', 0),
(4, '2021-10-05', 'Dev Fullstack', 'Leroy Merlin', 'Lille', 59, 'fuifhzeuiefhuifeheuifh', 'ueifhzeuihfzpuefhuizehfiusdh', 1200),
(5, '2021-10-05', 'Dev Fullstack', 'Decathlon', 'Dunkerque', 59, 'fuifhzeuiefhuifeheuifh', 'ueifhzeuihfzpuefhuizehfiusdh', NULL),
(6, '2021-10-05', 'Dev Fullstack', 'Decathlon', 'Seclin', 59, 'ejkfeklfeukbef', 'fehfem', 1200),
(7, '2021-10-05', 'Dev Fullstack', 'Decathlon', 'Seclin', 59, 'ejkfeklfeukbef', 'fehfem', 1200),
(8, '2021-10-05', 'Dev Fullstack', 'Decathlon', 'Seclin', 59, 'ejkfeklfeukbef', 'fehfem', 1200),
(9, '2021-10-05', 'Dev Fullstack', 'Decathlon', 'Seclin', 59, 'ejkfeklfeukbef', 'fehfem', 1200),
(10, '2021-10-05', 'Dev Fullstack', 'Decathlon', 'Seclin', 59, 'ejkfeklfeukbef', 'fehfem', 1200),
(11, '2021-10-05', 'Dev Fullstack', 'Decathlon', 'Seclin', 59, 'ejkfeklfeukbef', 'fehfem', 1200),
(12, '2021-10-05', 'Dev Fullstack', 'Decathlon', 'Seclin', 59, 'ejkfeklfeukbef', 'fehfem', 1200),
(13, '2021-10-17', 'test', 'test', 'test', 32, 'test', 'test', 1500),
(14, '2021-10-17', 'test', 'test', 'test', 32, 'test', 'test', 1500),
(15, '2021-10-17', 'test', 'test', 'test', 59, 'test', 'test', 5677),
(16, '2021-10-17', 'test1', 'test1', 'test1', 87, 'test1', 'test1', 6000),
(17, '2021-10-17', 'test2', 'test2', 'test2', 90, 'test2', 'test2', 8000);

-- --------------------------------------------------------

--
-- Structure de la table `companies`
--

CREATE TABLE `companies` (
  `name` varchar(11) NOT NULL,
  `id` int(11) NOT NULL,
  `logo` text NOT NULL,
  `adress` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `nbEmployees` int(11) NOT NULL,
  `Activity` varchar(20) NOT NULL,
  `nbFollowers` int(11) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `posts` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `companies`
--

INSERT INTO `companies` (`name`, `id`, `logo`, `adress`, `description`, `nbEmployees`, `Activity`, `nbFollowers`, `contact`, `posts`) VALUES
('Michel', 1, '', 'rue des Chenilles', 'Fefklmefvjhrfbefbbgbgyhifbgzefyhigzemyhofgzemfuogmfuogzemuofgzemfyogzemfyhigzeyhifgzefyhigzeyifgzefyhilgzefyigze', 34, 'Robotique', 67, '0636373838', 'fehuifhsuifheslfhberfveriolfbhilbdfilbvifbuzemiufbzemfuhzmfuizhfmuzef'),
('Audi', 2, '', '11 rue du Moulin', 'euigfruife', 45, 'Automobile', 80, 'feifeife', 'ufehuifheu');

-- --------------------------------------------------------

--
-- Structure de la table `jobApplication`
--

CREATE TABLE `jobApplication` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `idAd` int(11) NOT NULL,
  `idPeople` int(11) NOT NULL,
  `mails` text NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `jobApplication`
--

INSERT INTO `jobApplication` (`id`, `date`, `idAd`, `idPeople`, `mails`, `msg`) VALUES
(1, '2021-10-05', 3, 20211001, '', ''),
(2, '2021-10-05', 2, 12, '', ''),
(3, '2021-11-05', 2, 13, 'test', 'test'),
(4, '2021-10-17', 1, 18, 'test8@epitech.eu', 'test8'),
(5, '2021-10-17', 1, 18, 'test8@epitech.eu', 'test8'),
(6, '2021-10-17', 2, 18, 'test8@epitech.eu', 'Amazon'),
(7, '2021-10-17', 1, 18, 'test3@gmail.com', 'lol');

-- --------------------------------------------------------

--
-- Structure de la table `People`
--

CREATE TABLE `People` (
  `id` int(11) NOT NULL,
  `Surname` tinytext NOT NULL,
  `Lastname` tinytext NOT NULL,
  `City` tinytext NOT NULL,
  `Region` tinytext NOT NULL,
  `JobTitle` tinytext NOT NULL,
  `mail` tinytext NOT NULL,
  `WorkExperience` text NOT NULL,
  `Education` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `People`
--

INSERT INTO `People` (`id`, `Surname`, `Lastname`, `City`, `Region`, `JobTitle`, `mail`, `WorkExperience`, `Education`, `password`, `admin`) VALUES
(7, 'test8', 'test8', 'test', 'lille', 'stagiaire', 'test8@epitech.eu', 'stage', 'Master', '$2y$10$J0RNN6qrmP23TJoWsK.fZeNmF8N1kYRQyy4xr/lvtVu3M7NOjJsPq', 0),
(9, 'test4', 'test4', '', '', '', 'test4@gmail.com', '', '', '$2y$10$GWwpZxP1PliZprcWrqa2m.VHpQL8/ylCr3NIHWU0gDRvNngJ3JIgK', 0),
(10, 'test5', 'test5', '', '', '', 'test5@gmail.com', '', '', '$2y$10$OSFOCl79OyA4ONbLmnGusuFXpOm.AIwWDxB56ssbKY0mItSyWFQda', 0),
(11, 'test6', 'test6', '', '', '', 'test6@epitech.eu', '', '', '$2y$10$KgG.Pgg60d0epp1TD1Q1V.RJbbhkKxgtepeV3nZSkoEqzWNQ95Sem', 0),
(12, 'test7', 'test7', 'Abbeville', 'France', 'developpeur', 'test7@epitech.eu', 'stage', 'Brevet', '$2y$10$lXyIm8nAVX9lwyaZ1/hoGOqcBFre4p2tYuXsH5hyamzhFPmc3.ZGK', 0),
(17, 'titi4', 'titi4', '', '', '', 'titi4@epitech.eu', '', '', '$2y$10$iK0jAslOwyJVFm.zytKBp.XgX60muZdgeXd230Qq18CmZikv/yHRe', 0),
(18, 'test8', 'test8', 'test', 'lille', 'stagiaire', 'test8@epitech.eu', 'stage', 'Master', '$2y$10$i5UvXJCR5sIytfPc.fBQVebll6rE0OJylgtGqERPRKbJP/ti3RV/W', 0),
(19, 'test9', 'test9', '', '', '', 'test9@epitech.eu', '', '', '$2y$10$i8V4TsR5tmhU3karWbUn2eXLnUzR4LX/n.szyVizNygDCxVaaiAmC', 0),
(20, 'test9', 'test9', '', '', '', 'test9@gmail.com', '', '', '$2y$10$O5GGiC6vSwoLDbAkGBZ7gurnIjMRcJLAfqfdYBPzVxBN47xDUW9WO', 0),
(22, 'admin', 'admin', '', '', '', 'admin@gmail.com', '', '', '$2y$10$gMAQfaJDvG2CaCIKS6/9GuF0rtTZVtK71cMr2svZ4fi3vx0wSyRC2', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Advertisement`
--
ALTER TABLE `Advertisement`
  ADD KEY `id` (`id`);

--
-- Index pour la table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jobApplication`
--
ALTER TABLE `jobApplication`
  ADD KEY `idCandidat` (`id`);

--
-- Index pour la table `People`
--
ALTER TABLE `People`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Advertisement`
--
ALTER TABLE `Advertisement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `jobApplication`
--
ALTER TABLE `jobApplication`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `People`
--
ALTER TABLE `People`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
