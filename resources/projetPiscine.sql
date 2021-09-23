-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mar. 21 sep. 2021 à 13:43
-- Version du serveur :  8.0.24
-- Version de PHP : 7.3.24-(to be removed in future macOS)

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projetPiscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `allergene`
--

CREATE TABLE `allergene` (
  `idAllergene` int NOT NULL,
  `nomAllergene` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `allergene`
--

INSERT INTO `allergene` (`idAllergene`, `nomAllergene`) VALUES
(0, 'Aucun'),
(1, 'Gluten'),
(2, 'Crustacés'),
(3, 'Oeufs'),
(4, 'Soja'),
(5, 'Lait'),
(6, 'Fruits à coques'),
(7, 'Céleri'),
(8, 'Moutarde'),
(9, 'Graines de sésame'),
(10, 'Lupin'),
(11, 'Anhydride sulfureux'),
(12, 'Mollusques');

-- --------------------------------------------------------

--
-- Structure de la table `categorieIngredient`
--

CREATE TABLE `categorieIngredient` (
  `idCategorieIngredient` int NOT NULL,
  `nomCategorieIngredient` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categorieIngredient`
--

INSERT INTO `categorieIngredient` (`idCategorieIngredient`, `nomCategorieIngredient`) VALUES
(1, 'Oléagineux'),
(2, 'Légumes'),
(3, 'Viande'),
(4, 'Poisson'),
(5, 'Féculents');

-- --------------------------------------------------------

--
-- Structure de la table `categorieRecette`
--

CREATE TABLE `categorieRecette` (
  `idCategorieRecette` int NOT NULL,
  `nomCategorieRecette` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `categorieRecette`
--

INSERT INTO `categorieRecette` (`idCategorieRecette`, `nomCategorieRecette`) VALUES
(1, 'Condiment'),
(3, 'Dessert'),
(5, 'Entrée'),
(6, 'Plat');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE `ingredient` (
  `idIngredient` int NOT NULL,
  `nomIngredient` varchar(50) NOT NULL,
  `quantiteAchat` int NOT NULL,
  `uniteQuantite` varchar(6) NOT NULL,
  `prixHT` int NOT NULL,
  `tva` int NOT NULL,
  `idCategorieIngredient` int NOT NULL,
  `idAllergene` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`idIngredient`, `nomIngredient`, `quantiteAchat`, `uniteQuantite`, `prixHT`, `tva`, `idCategorieIngredient`, `idAllergene`) VALUES
(1, 'Carotte', 5, 'kg', 2, 20, 2, 0),
(2, 'Boeuf', 1, 'kg', 50, 20, 3, 0),
(5, 'Noisette', 1, 'kg', 20, 20, 1, 5),
(6, 'Noix', 0, 'kg', 20, 20, 1, 5),
(7, 'Pommes de terres', 10, 'kg', 2, 6, 2, 0),
(8, 'Pâtes', 2, 'kg', 1, 6, 5, 1);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `idRecette` int NOT NULL,
  `nomRecette` varchar(50) NOT NULL,
  `idCategorieRecette` int NOT NULL,
  `nbCouvert` int NOT NULL,
  `descriptif` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`idRecette`, `nomRecette`, `idCategorieRecette`, `nbCouvert`, `descriptif`) VALUES
(1, 'Recette0', 1, 4, 'Nouvelle recette. '),
(2, 'Recette1', 3, 2, 'Descriptif. c\'est non'),
(3, 'Boeuf Bourguignon ', 6, 10, 'Écoutes Maïté'),
(4, 'Gratin Dauphinois', 6, 8, 'Pommes de terres avec de la crème au four'),
(5, 'Tarte à la Noisette', 3, 6, 'Tqt ça existe');

-- --------------------------------------------------------

--
-- Structure de la table `recetteIngredient`
--

CREATE TABLE `recetteIngredient` (
  `idRecette` int NOT NULL,
  `idIngredient` int NOT NULL,
  `quantiteIngredient` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `recetteIngredient`
--

INSERT INTO `recetteIngredient` (`idRecette`, `idIngredient`, `quantiteIngredient`) VALUES
(3, 2, 3),
(4, 7, 10),
(3, 1, 5),
(5, 5, 10),
(5, 6, 2);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `allergene`
--
ALTER TABLE `allergene`
  ADD PRIMARY KEY (`idAllergene`);

--
-- Index pour la table `categorieIngredient`
--
ALTER TABLE `categorieIngredient`
  ADD PRIMARY KEY (`idCategorieIngredient`);

--
-- Index pour la table `categorieRecette`
--
ALTER TABLE `categorieRecette`
  ADD PRIMARY KEY (`idCategorieRecette`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`idIngredient`),
  ADD KEY `idAllergene` (`idAllergene`),
  ADD KEY `fk_idCategorieIngredient` (`idCategorieIngredient`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`idRecette`),
  ADD KEY `idCategorie` (`idCategorieRecette`);

--
-- Index pour la table `recetteIngredient`
--
ALTER TABLE `recetteIngredient`
  ADD KEY `idRecette` (`idRecette`),
  ADD KEY `idIngredient` (`idIngredient`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `allergene`
--
ALTER TABLE `allergene`
  MODIFY `idAllergene` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `categorieIngredient`
--
ALTER TABLE `categorieIngredient`
  MODIFY `idCategorieIngredient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categorieRecette`
--
ALTER TABLE `categorieRecette`
  MODIFY `idCategorieRecette` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `idIngredient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `idRecette` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `fk_idAllergene ` FOREIGN KEY (`idAllergene`) REFERENCES `allergene` (`idAllergene`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idCategorieIngredient` FOREIGN KEY (`idCategorieIngredient`) REFERENCES `categorieIngredient` (`idCategorieIngredient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recette`
--
ALTER TABLE `recette`
  ADD CONSTRAINT `fk` FOREIGN KEY (`idCategorieRecette`) REFERENCES `categorieRecette` (`idCategorieRecette`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `recetteIngredient`
--
ALTER TABLE `recetteIngredient`
  ADD CONSTRAINT `fk_idIngredient` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`idIngredient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idRecette` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
