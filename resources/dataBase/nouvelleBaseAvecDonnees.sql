-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 27, 2021 at 08:36 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `projetPiscine`
--

-- --------------------------------------------------------

--
-- Table structure for table `allergene`
--

CREATE TABLE `allergene` (
  `idAllergene` int(11) NOT NULL,
  `nomAllergene` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `allergene`
--

INSERT INTO `allergene` (`idAllergene`, `nomAllergene`) VALUES
(0, 'Aucun'),
(1, 'Arachide'),
(2, 'Céleri'),
(3, 'Crustacés'),
(4, 'Céréales contenant du Gluten'),
(5, 'Fuits à coque'),
(6, 'Lait'),
(7, 'Lupin'),
(8, 'Oeuf'),
(9, 'Poisson'),
(10, 'Mollusques'),
(11, 'Moutarde'),
(12, 'Sésame'),
(13, 'Soja'),
(14, 'Sulfites'),
(30, 'jhbdauvdhjaz'),
(35, ',nbdhjz');

-- --------------------------------------------------------

--
-- Table structure for table `asso_recette_categorieRecette`
--

CREATE TABLE `asso_recette_categorieRecette` (
  `idRecette` int(6) NOT NULL,
  `idCategorieRecette` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `asso_recette_ingredient`
--

CREATE TABLE `asso_recette_ingredient` (
  `idRecette` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  `quantiteIngredient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `asso_recette_utilisateur`
--

CREATE TABLE `asso_recette_utilisateur` (
  `idRecette` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `categorieIngredient`
--

CREATE TABLE `categorieIngredient` (
  `idCategorieIngredient` int(11) NOT NULL,
  `nomCategorieIngredient` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorieIngredient`
--

INSERT INTO `categorieIngredient` (`idCategorieIngredient`, `nomCategorieIngredient`) VALUES
(1, 'Viandes et volailles'),
(2, 'Poissons et crustacés '),
(3, 'Crèmerie '),
(4, 'Epicerie'),
(5, 'Fruits et légumes');

-- --------------------------------------------------------

--
-- Table structure for table `categorieRecette`
--

CREATE TABLE `categorieRecette` (
  `idCategorieRecette` int(11) NOT NULL,
  `nomCategorieRecette` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categorieRecette`
--

INSERT INTO `categorieRecette` (`idCategorieRecette`, `nomCategorieRecette`) VALUES
(1, 'Entrée'),
(2, 'Plat principal'),
(3, 'Dessert'),
(4, 'Viande'),
(5, 'Poisson'),
(6, 'Soupe'),
(7, 'Végétarien'),
(8, 'Sauce'),
(9, 'Basique'),
(10, 'Accompagnement');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient`
--

CREATE TABLE `ingredient` (
  `idIngredient` int(11) NOT NULL,
  `nomIngredient` varchar(50) NOT NULL,
  `quantiteAchat` int(11) NOT NULL,
  `idUniteQuantite` int(11) NOT NULL,
  `prixHT` int(11) NOT NULL,
  `idTaxe` int(11) NOT NULL,
  `idCategorieIngredient` int(11) NOT NULL,
  `idAllergene` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recette`
--

CREATE TABLE `recette` (
  `idRecette` int(11) NOT NULL,
  `nomRecette` varchar(50) NOT NULL,
  `nbCouvert` int(11) NOT NULL,
  `descriptif` text NOT NULL,
  `coefficient` float NOT NULL,
  `chargeSalariale` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `taxe`
--

CREATE TABLE `taxe` (
  `idTaxe` int(11) NOT NULL,
  `montantTaxe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `taxe`
--

INSERT INTO `taxe` (`idTaxe`, `montantTaxe`) VALUES
(1, 5.5),
(2, 20);

-- --------------------------------------------------------

--
-- Table structure for table `uniteQuantite`
--

CREATE TABLE `uniteQuantite` (
  `idUnite` int(11) NOT NULL,
  `nomUnite` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uniteQuantite`
--

INSERT INTO `uniteQuantite` (`idUnite`, `nomUnite`) VALUES
(1, 'Kg'),
(2, 'L'),
(3, 'U'),
(4, 'Botte'),
(5, 'P'),
(6, 'Boite');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nomUtilisateur` varchar(50) NOT NULL,
  `prenomUtilisateur` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allergene`
--
ALTER TABLE `allergene`
  ADD PRIMARY KEY (`idAllergene`);

--
-- Indexes for table `asso_recette_categorieRecette`
--
ALTER TABLE `asso_recette_categorieRecette`
  ADD KEY `idRecette` (`idRecette`),
  ADD KEY `idCategorieRecette` (`idCategorieRecette`);

--
-- Indexes for table `asso_recette_ingredient`
--
ALTER TABLE `asso_recette_ingredient`
  ADD KEY `idRecette` (`idRecette`),
  ADD KEY `idIngredient` (`idIngredient`);

--
-- Indexes for table `asso_recette_utilisateur`
--
ALTER TABLE `asso_recette_utilisateur`
  ADD KEY `idRecette` (`idRecette`),
  ADD KEY `idUtilisateur` (`idUtilisateur`);

--
-- Indexes for table `categorieIngredient`
--
ALTER TABLE `categorieIngredient`
  ADD PRIMARY KEY (`idCategorieIngredient`);

--
-- Indexes for table `categorieRecette`
--
ALTER TABLE `categorieRecette`
  ADD PRIMARY KEY (`idCategorieRecette`);

--
-- Indexes for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`idIngredient`),
  ADD KEY `idAllergene` (`idAllergene`),
  ADD KEY `fk_idCategorieIngredient` (`idCategorieIngredient`),
  ADD KEY `idTaxe` (`idTaxe`),
  ADD KEY `idUniteQuantite` (`idUniteQuantite`);

--
-- Indexes for table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`idRecette`);

--
-- Indexes for table `taxe`
--
ALTER TABLE `taxe`
  ADD PRIMARY KEY (`idTaxe`);

--
-- Indexes for table `uniteQuantite`
--
ALTER TABLE `uniteQuantite`
  ADD PRIMARY KEY (`idUnite`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allergene`
--
ALTER TABLE `allergene`
  MODIFY `idAllergene` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `categorieIngredient`
--
ALTER TABLE `categorieIngredient`
  MODIFY `idCategorieIngredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categorieRecette`
--
ALTER TABLE `categorieRecette`
  MODIFY `idCategorieRecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `idIngredient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recette`
--
ALTER TABLE `recette`
  MODIFY `idRecette` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `taxe`
--
ALTER TABLE `taxe`
  MODIFY `idTaxe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `uniteQuantite`
--
ALTER TABLE `uniteQuantite`
  MODIFY `idUnite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asso_recette_categorieRecette`
--
ALTER TABLE `asso_recette_categorieRecette`
  ADD CONSTRAINT `fk_asso_idCategorieRecette` FOREIGN KEY (`idCategorieRecette`) REFERENCES `categorieRecette` (`idCategorieRecette`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asso_idRecette` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `asso_recette_ingredient`
--
ALTER TABLE `asso_recette_ingredient`
  ADD CONSTRAINT `fk_idIngredient` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`idIngredient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idRecette` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `asso_recette_utilisateur`
--
ALTER TABLE `asso_recette_utilisateur`
  ADD CONSTRAINT `fk_asso_RU_idRecette` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asso_RU_idUtilisateur` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `fk_idAllergene ` FOREIGN KEY (`idAllergene`) REFERENCES `allergene` (`idAllergene`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idCategorieIngredient` FOREIGN KEY (`idCategorieIngredient`) REFERENCES `categorieIngredient` (`idCategorieIngredient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idTaxe` FOREIGN KEY (`idTaxe`) REFERENCES `taxe` (`idTaxe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idUniteQuantite` FOREIGN KEY (`idUniteQuantite`) REFERENCES `uniteQuantite` (`idUnite`) ON DELETE CASCADE ON UPDATE CASCADE;
