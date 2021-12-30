-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 30 déc. 2021 à 14:03
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
-- Base de données : `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `address`, `city`) VALUES
(1, 'Bourdon', 163893, '76, avenue Geneviève Antoine 04 197 Martinez', 'Traore-sur-Thibault'),
(2, 'MICHAËL ZINGRAF', 10000, '1330 boulevard Napoléon III - Pont Saint-Jean', 'Saint Laurent d\'Eze'),
(3, 'Guilbert', 905000, '806, impasse de Bazin 88 452 Thibault-les-Bains', 'Wagner'),
(4, 'Prevoit SAS', 553504, 'place Amélie Navarro 93 809 Adam-la-Forêt', 'Vaillant'),
(5, 'Mathieu Collet SAS', 176054, '31,chemin Pages 54 497 MorelVille', 'Toussaintboeuf'),
(6, 'Moreau S.A.S.', 532760, '57, boulevard Carpentier 83 192 Moreno', 'Torres'),
(7, 'Maurice Laine SARL', 462963, '34, chemin de Rossi 59410 Couturierdan', 'Tessiernec'),
(8, 'LA POSTE COTE D’IVOIRE', 123600, '17 BP 105 ABIDJAN 17, Abidjan plateau, Immeuble Postel', 'Plateau'),
(9, 'LOGISTICA', 390000, '29 BP 173 ABIDJAN 29, YOPOUGON SOPIM RESITENTIEL VILLA 82', 'Yopougon'),
(10, 'FACTOR EXPRESS', 70000, '01 BP 3317 ABIDJAN 01, MARCORY ZONE 4 RUE THOMAS EDISON', 'Marcory'),
(11, 'DHL INTERNATIONAL CÔTE D’IVOIRE', 120000, '01 BP 4869 ABIDJAN 01, Boulevard Giscard d’Estaing Zone 4 C', 'Marcory'),
(12, 'DISTRIMAT INTER COURRIER\r\nEXPRESS-FEDEX', 123700, '18 BP 1605 ABIDJAN 16, MARSEILLE IMMEUBLE SCI D’ABETTY', 'Abidjan'),
(13, 'HAUTE SAVOIE', 754900, '129 AVENUE DE GENEVE', 'ANNECY'),
(14, 'ISERE', 332780, '3 PLACE SAINTE CLAIRE', 'GRENOBLE'),
(15, 'SARTHE', 211007, '16 RUE DU DOCTEUR LEROY', 'LE MANS'),
(16, 'ALPES MARITIMES', 69101, '2 BIS AVENUE DURANTE', 'NICE'),
(17, 'COLIVOIRE', 107075, '06 BP 243 ABIDJAN 06, DEUX PLATEAUX BLD LATRILLE – CARREFOUR MACACI', '2 Plateaux'),
(18, 'GROUPE DE DISTRIBUTION EXPRESS-GDEX', 609122, '06 BP 6287 ABIDJAN 06, Angré château, groupement 4000C, villa 403', 'Angré'),
(19, 'SOCIETE DE TRANSPORT DE MARCHANDISES EN CI-STMC-CI', 540000, '26 BP 711 Abidjan 26, Marcory bvd du Gabon – immeuble Massai', 'Marcory'),
(20, 'UTB Express SA', 305992, '01 BP 4313 ABIDJAN 01, ARRAS GARE DE BASSAM', 'Bassam'),
(21, 'ALIAS CI-TRANSIT', 123000, '12 BP 1789 ABIDJAN 12 , RUE SR. BLANCHARD ZONE 4C', 'Abidjan'),
(22, 'Top Chrono', 263900, '18 BP 1918 ABIDJAN 18 , ZONE 4C PROLONGEMENT DE LA PATISSERIE ABIDJANAISE', 'Abidjan');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
