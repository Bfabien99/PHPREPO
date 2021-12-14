-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 14 déc. 2021 à 18:01
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `ecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE `classe` (
  `id` int(11) NOT NULL,
  `nomClasse` varchar(255) NOT NULL,
  `nombreEtudiant` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `classe`
--

INSERT INTO `classe` (`id`, `nomClasse`, `nombreEtudiant`) VALUES
(5, '6', 0),
(6, '5', 0);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `idEtud` int(11) NOT NULL,
  `nomEtud` varchar(255) NOT NULL,
  `prenomEtud` varchar(255) NOT NULL,
  `naissanceEtud` date NOT NULL,
  `emailEtud` varchar(255) NOT NULL,
  `numeroEtud` varchar(255) NOT NULL,
  `classeEtud` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`idEtud`, `nomEtud`, `prenomEtud`, `naissanceEtud`, `emailEtud`, `numeroEtud`, `classeEtud`) VALUES
(21, 'BRO', 'ZZD', '2021-12-17', 'scs@dd', '0303030303', 5),
(22, 'BRO', 'ADMIN', '2021-12-09', 'zanpolobino99@gmail.com', '0303030303', 6);

-- --------------------------------------------------------

--
-- Structure de la table `etudiant_matiere`
--

CREATE TABLE `etudiant_matiere` (
  `id` int(11) NOT NULL,
  `etudiant_id` int(11) NOT NULL,
  `matiere_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `etudiant_matiere`
--

INSERT INTO `etudiant_matiere` (`id`, `etudiant_id`, `matiere_id`) VALUES
(1, 22, 1);

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `id` int(11) NOT NULL,
  `nomMatiere` varchar(255) NOT NULL,
  `nombreEnseignant` int(11) DEFAULT NULL,
  `coefficientMatiere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`id`, `nomMatiere`, `nombreEnseignant`, `coefficientMatiere`) VALUES
(1, 'Mathematique', 3, 4),
(2, 'Physique', 5, 4);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `classe`
--
ALTER TABLE `classe`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`idEtud`),
  ADD UNIQUE KEY `emailEtud` (`emailEtud`),
  ADD KEY `classeEtud` (`classeEtud`);

--
-- Index pour la table `etudiant_matiere`
--
ALTER TABLE `etudiant_matiere`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `etudiant_id` (`etudiant_id`,`matiere_id`),
  ADD KEY `matiere_id` (`matiere_id`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `classe`
--
ALTER TABLE `classe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `etudiant`
--
ALTER TABLE `etudiant`
  MODIFY `idEtud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT pour la table `etudiant_matiere`
--
ALTER TABLE `etudiant_matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `matiere`
--
ALTER TABLE `matiere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `classEtud` FOREIGN KEY (`classeEtud`) REFERENCES `classe` (`id`);

--
-- Contraintes pour la table `etudiant_matiere`
--
ALTER TABLE `etudiant_matiere`
  ADD CONSTRAINT `etudiant_id` FOREIGN KEY (`etudiant_id`) REFERENCES `etudiant` (`idEtud`),
  ADD CONSTRAINT `matiere_id` FOREIGN KEY (`matiere_id`) REFERENCES `matiere` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
