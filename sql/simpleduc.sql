-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 21 jan. 2022 à 08:44
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `simpleduc`
--

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

CREATE TABLE `appartenir` (
  `id_personne` int(11) NOT NULL,
  `id_equipe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `appartenir`
--

INSERT INTO `appartenir` (`id_personne`, `id_equipe`) VALUES
(27, 16),
(29, 12),
(29, 16),
(33, 12),
(35, 16);

-- --------------------------------------------------------

--
-- Structure de la table `competence`
--

CREATE TABLE `competence` (
  `id_competence` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `competence`
--

INSERT INTO `competence` (`id_competence`, `nom`) VALUES
(1, ''),
(2, 'PHP'),
(3, 'PYTHON'),
(4, 'C'),
(5, 'C');

-- --------------------------------------------------------

--
-- Structure de la table `contrat`
--

CREATE TABLE `contrat` (
  `id_contrat` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `delai` varchar(30) DEFAULT NULL,
  `date_signature` datetime DEFAULT NULL,
  `cout` varchar(30) DEFAULT NULL,
  `id_entreprise` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contrat`
--

INSERT INTO `contrat` (`id_contrat`, `nom`, `delai`, `date_signature`, `cout`, `id_entreprise`) VALUES
(1, 'Premier_contrat', '30j', '0000-00-00 00:00:00', '2540', 1);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_entreprise` int(11) NOT NULL,
  `coordonnees` varchar(255) DEFAULT NULL,
  `contact` varchar(30) DEFAULT NULL,
  `nom` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `coordonnees`, `contact`, `nom`) VALUES
(1, 'tonipira.tp@gmail.com', 'tonipira.tp@gmail.com', 'EPSI'),
(2, 'provac@gmail.com', 'tonipira.tp@gmail.com', 'PROVAC');

-- --------------------------------------------------------

--
-- Structure de la table `equipe`
--

CREATE TABLE `equipe` (
  `id_equipe` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `chef_equipe` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `equipe`
--

INSERT INTO `equipe` (`id_equipe`, `nom`, `chef_equipe`) VALUES
(12, 'Avengers', 27),
(16, 'Test2', 33);

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE `fonction` (
  `id_fonction` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `fonction`
--

INSERT INTO `fonction` (`id_fonction`, `nom`) VALUES
(1, 'Developpeur');

-- --------------------------------------------------------

--
-- Structure de la table `maitriser`
--

CREATE TABLE `maitriser` (
  `id_personne` int(11) NOT NULL,
  `id_competence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `maitriser`
--

INSERT INTO `maitriser` (`id_personne`, `id_competence`) VALUES
(27, 2),
(27, 3),
(27, 4),
(33, 3),
(33, 5);

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE `materiel` (
  `id_materiel` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `materiel`
--

INSERT INTO `materiel` (`id_materiel`, `nom`) VALUES
(1, 'SWITCH'),
(2, 'IMPRIMANTE'),
(3, 'ROUTEUR');

-- --------------------------------------------------------

--
-- Structure de la table `module_`
--

CREATE TABLE `module_` (
  `id_module` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `equipe` int(11) DEFAULT NULL,
  `projet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `module_`
--

INSERT INTO `module_` (`id_module`, `nom`, `equipe`, `projet`) VALUES
(1, 'Module_test', 12, 1),
(2, 'test1', 16, 1);

-- --------------------------------------------------------

--
-- Structure de la table `necessiter`
--

CREATE TABLE `necessiter` (
  `id_projet` int(11) NOT NULL,
  `id_materiel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE `projet` (
  `id_projet` int(11) NOT NULL,
  `delais` varchar(30) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `cahier_des_charges` text DEFAULT NULL,
  `id_contrat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `projet`
--

INSERT INTO `projet` (`id_projet`, `delais`, `budget`, `cahier_des_charges`, `id_contrat`) VALUES
(1, '30j', 1000, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus tempora, non dolorum aliquid saepe mollitia fugiat quisquam autem sunt rerum esse culpa fugit accusantium corrupti consectetur voluptatem vitae sequi amet.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` text NOT NULL,
  `date_inscription` datetime NOT NULL,
  `date_derniere_connexion` datetime NOT NULL,
  `valider` varchar(255) NOT NULL,
  `codeVerif` varchar(255) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `fonction` int(11) DEFAULT NULL,
  `admin` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `mdp`, `date_inscription`, `date_derniere_connexion`, `valider`, `codeVerif`, `nom`, `prenom`, `fonction`, `admin`) VALUES
(27, 'tonipira.tp@gmail.com', '$2y$10$jwOyM4HKfJDDhAo/g7x1iO6OtbKscaI2FXtdv2LwJQiHiWDVisH.m', '2021-12-02 14:52:55', '2022-01-21 08:24:40', 'true', '61a8cfb711155', 'Pira', 'Toni', 1, 'false'),
(29, 'fallon59400@gmail.com', '$2y$10$PXecyJ865auI56ApBtZr2utA4SZKcmPu4NQACmA5sbZIU57bWSzqC', '2021-12-17 10:03:30', '2022-01-20 20:21:24', 'true', '61bc52623a38e', 'ADMIN', 'ADMIN', 1, 'true'),
(33, 'titi7@gmail.com', '$2y$10$PzssdZ97GuUrkFzDytQVue5Z57kYRkgO06vukBO0CcWg73YZEKkxS', '2022-01-06 16:36:33', '2022-01-06 16:36:33', 'true', '', 'MARECHAL', 'Thibaut', 1, 'false'),
(35, 'samu@gmail.com', '$2y$10$wcSOl9C/Uq/TN8FAag7HPO7oXgszPcVcSfbsJlGlHKIch0y38bohG', '2022-01-06 17:16:51', '2022-01-06 17:16:51', 'true', '', 'marechal', 'samuel', 1, 'true');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD PRIMARY KEY (`id_personne`,`id_equipe`),
  ADD KEY `c10` (`id_equipe`);

--
-- Index pour la table `competence`
--
ALTER TABLE `competence`
  ADD PRIMARY KEY (`id_competence`);

--
-- Index pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD PRIMARY KEY (`id_contrat`),
  ADD KEY `c1` (`id_entreprise`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_entreprise`);

--
-- Index pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`id_equipe`),
  ADD KEY `c4` (`chef_equipe`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`id_fonction`);

--
-- Index pour la table `maitriser`
--
ALTER TABLE `maitriser`
  ADD PRIMARY KEY (`id_personne`,`id_competence`),
  ADD KEY `c8` (`id_competence`);

--
-- Index pour la table `materiel`
--
ALTER TABLE `materiel`
  ADD PRIMARY KEY (`id_materiel`);

--
-- Index pour la table `module_`
--
ALTER TABLE `module_`
  ADD PRIMARY KEY (`id_module`),
  ADD KEY `c5` (`equipe`),
  ADD KEY `c6` (`projet`);

--
-- Index pour la table `necessiter`
--
ALTER TABLE `necessiter`
  ADD PRIMARY KEY (`id_projet`,`id_materiel`),
  ADD KEY `c12` (`id_materiel`);

--
-- Index pour la table `projet`
--
ALTER TABLE `projet`
  ADD PRIMARY KEY (`id_projet`),
  ADD KEY `c2` (`id_contrat`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `c3` (`fonction`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `competence`
--
ALTER TABLE `competence`
  MODIFY `id_competence` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `contrat`
--
ALTER TABLE `contrat`
  MODIFY `id_contrat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `id_equipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `fonction`
--
ALTER TABLE `fonction`
  MODIFY `id_fonction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `materiel`
--
ALTER TABLE `materiel`
  MODIFY `id_materiel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `module_`
--
ALTER TABLE `module_`
  MODIFY `id_module` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `projet`
--
ALTER TABLE `projet`
  MODIFY `id_projet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `c10` FOREIGN KEY (`id_equipe`) REFERENCES `equipe` (`id_equipe`),
  ADD CONSTRAINT `c9` FOREIGN KEY (`id_personne`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `contrat`
--
ALTER TABLE `contrat`
  ADD CONSTRAINT `c1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`);

--
-- Contraintes pour la table `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `c4` FOREIGN KEY (`chef_equipe`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `maitriser`
--
ALTER TABLE `maitriser`
  ADD CONSTRAINT `c7` FOREIGN KEY (`id_personne`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `c8` FOREIGN KEY (`id_competence`) REFERENCES `competence` (`id_competence`);

--
-- Contraintes pour la table `module_`
--
ALTER TABLE `module_`
  ADD CONSTRAINT `c5` FOREIGN KEY (`equipe`) REFERENCES `equipe` (`id_equipe`),
  ADD CONSTRAINT `c6` FOREIGN KEY (`projet`) REFERENCES `projet` (`id_projet`);

--
-- Contraintes pour la table `necessiter`
--
ALTER TABLE `necessiter`
  ADD CONSTRAINT `c11` FOREIGN KEY (`id_projet`) REFERENCES `projet` (`id_projet`),
  ADD CONSTRAINT `c12` FOREIGN KEY (`id_materiel`) REFERENCES `materiel` (`id_materiel`);

--
-- Contraintes pour la table `projet`
--
ALTER TABLE `projet`
  ADD CONSTRAINT `c2` FOREIGN KEY (`id_contrat`) REFERENCES `contrat` (`id_contrat`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `c3` FOREIGN KEY (`fonction`) REFERENCES `fonction` (`id_fonction`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
