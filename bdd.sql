-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 16 déc. 2021 à 14:04
-- Version du serveur : 10.3.31-MariaDB-0+deb10u1
-- Version de PHP : 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tp`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `mdp` text DEFAULT NULL,
  `date_inscription` datetime DEFAULT NULL,
  `date_derniere_connexion` datetime DEFAULT NULL,
  `valider` varchar(50) DEFAULT NULL,
  `codeVerif` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `mdp`, `date_inscription`, `date_derniere_connexion`, `valider`, `codeVerif`) VALUES
(3, 'topira@gmail.com', '12345treza', '2021-11-24 11:27:32', '2021-11-24 11:27:32', 'false', '619e13945b305'),
(7, 'toni.pira@epsi.fr', '12345treza', '2021-11-24 12:02:39', '2021-11-24 12:02:39', 'false', '619e1bcf2a4b7'),
(27, 'tonipira.tp@gmail.com', '$2y$10$UQ1Tn8xpRBv4Qc8DnHcLouHF3E5c7JLxvMaMFjmUmVQlZxlbQn0bW', '2021-12-02 14:52:55', '2021-12-02 14:52:55', 'true', '61a8cfb711155');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
