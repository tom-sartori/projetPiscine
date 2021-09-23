-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 23 sep. 2021 à 18:12
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
(1, 'VIANDES / VOLAILLES'),
(2, 'POISSON ET CRUSTACES'),
(3, 'CREMERIE '),
(4, 'EPICERIE'),
(5, 'FRUITS ET LEGUMES');

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
(9, ' Epaule d\'agneau sans os ', 1, ' Kg ', 8, 20, 1, 0),
(10, ' Filet de poulet ', 1, ' Kg ', 4, 20, 1, 0),
(11, ' Chorizo doux ', 1, ' Kg ', 9, 20, 1, 0),
(12, ' Jarret ou Paleron de bœuf ', 1, ' Kg ', 3, 20, 1, 0),
(13, ' Poitrine fumée ', 1, ' Kg ', 5, 20, 1, 0),
(14, ' Joue de bœuf ', 1, ' Kg ', 13, 20, 1, 0),
(15, ' Avant bœuf pour viande haché ', 1, ' Kg ', 12, 20, 1, 0),
(16, ' Crevettes surg 30/40 ', 1, ' Kg ', 18, 20, 2, 0),
(17, ' Dos de cabillaud sans peau surg ', 1, ' Kg ', 14, 20, 2, 0),
(18, ' Ecrevisses surg ', 1, ' Kg ', 10, 20, 2, 0),
(19, ' Filet de saumon ', 1, ' Kg ', 14, 20, 2, 0),
(20, ' Parure de saumon fumé ', 1, ' Kg ', 6, 20, 2, 0),
(21, ' Beurre ', 1, ' Kg ', 6, 20, 3, 0),
(22, ' Crème liquide ', 1, ' L ', 3, 20, 3, 0),
(23, ' Lait ', 1, ' L ', 1, 20, 3, 0),
(24, ' Œufs ', 1, ' P ', 0, 20, 3, 0),
(25, ' Parmesan ', 1, ' Kg ', 14, 20, 3, 0),
(26, ' Reblochon ', 1, ' Kg ', 10, 20, 3, 0),
(27, ' Mascarpone ', 1, ' Kg ', 7, 20, 3, 0),
(28, ' Jaunes d\'œuf au litre ', 1, ' L ', 10, 20, 3, 0),
(29, ' Blancs d\'œuf au litre ', 1, ' L ', 8, 20, 3, 0),
(30, ' Œufs entiers au litre ', 1, ' L ', 3, 20, 3, 0),
(31, ' Crème mascarpone ', 1, ' L ', 5, 20, 3, 0),
(32, ' Beurre demi sel ', 1, ' kg ', 6, 20, 3, 0),
(33, ' Mozarella ', 1, ' kg ', 5, 20, 3, 0),
(34, ' Potimarron ', 1, ' Kg ', 2, 20, 5, 0),
(35, ' Oignons ', 1, ' Kg ', 2, 20, 5, 0),
(36, ' Oignons rouges ', 1, ' Kg ', 3, 20, 5, 0),
(37, ' Carottes ', 1, ' Kg ', 2, 20, 5, 0),
(38, ' Courgettes ', 1, ' Kg ', 2, 20, 5, 0),
(39, ' Cèpes surg pied et morceaux ', 1, ' Kg ', 13, 20, 5, 0),
(40, ' Poires ', 1, ' Kg ', 8, 20, 5, 0),
(41, ' Pommes Granny Smith ', 1, ' Kg ', 3, 20, 5, 0),
(42, ' Céleri rave ', 1, ' Kg ', 2, 20, 5, 0),
(43, ' Citron jaune ', 1, ' Kg ', 4, 20, 5, 0),
(44, ' Citron vert ', 1, ' Kg ', 6, 20, 5, 0),
(45, ' Choux fleur ', 1, ' Kg ', 4, 20, 5, 0),
(46, ' Ail ', 1, ' Kg ', 5, 20, 5, 0),
(47, ' Poireaux ', 1, ' Kg ', 3, 20, 5, 0),
(48, ' Bouquet garni ', 1, ' P ', 0, 20, 5, 0),
(49, ' Echalotes ', 1, ' Kg ', 2, 20, 5, 0),
(50, ' Persil ', 1, ' Botte', 0, 20, 5, 0),
(51, ' Pommes de terre ', 1, ' Kg ', 1, 20, 5, 0),
(52, ' Orange ', 1, ' Kg ', 2, 20, 5, 0),
(53, ' pomme golden ', 1, ' kg ', 2, 20, 5, 0),
(54, ' Basilic surg ', 1, ' kg ', 22, 20, 5, 0),
(55, ' Cebette ', 1, ' B ', 1, 20, 5, 0),
(56, ' Petits pois surg ', 1, ' kg ', 2, 20, 5, 0),
(57, ' Menthe ', 1, ' botte', 1, 20, 5, 0),
(58, ' Pois chiche 4/4 ', 1, ' B ', 4, 20, 4, 0),
(59, ' Cœur de palmier 4/4 ', 1, ' B ', 4, 20, 4, 0),
(60, ' Vinaigre de riz ', 1, ' L ', 7, 20, 4, 0),
(61, ' Miel ', 1, ' Kg ', 9, 20, 4, 0),
(62, ' Sauce nuoc nam ', 1, ' L ', 20, 20, 4, 0),
(63, ' Cuisses de canard confites 5/1 ', 1, ' B ', 30, 20, 4, 0),
(64, ' Huile de sésame ', 1, ' L ', 11, 20, 4, 0),
(65, ' Huile d\'olive ', 1, ' L ', 5, 20, 4, 0),
(66, ' Huile de tournesol ', 1, ' L ', 2, 20, 4, 0),
(67, ' Huile de pépins de raisin ', 1, ' L ', 4, 20, 4, 0),
(68, ' Graines de sésame ', 1, ' Kg ', 36, 20, 4, 0),
(69, ' Piment d\'Espelette ', 1, ' Kg ', 200, 20, 4, 0),
(70, ' Agar agar ', 1, ' Kg ', 83, 20, 4, 0),
(71, ' Nouilles chinoise ', 1, ' Kg ', 16, 20, 4, 0),
(72, ' Sésame noir en pâte ', 1, ' Kg ', 30, 20, 4, 0),
(73, ' Fond blanc de veau ', 1, ' Kg ', 9, 20, 4, 0),
(74, ' Jus d\'agneau déshydraté ', 1, ' Kg ', 9, 20, 4, 0),
(75, ' Fond brun de veau lié ', 1, ' Kg ', 9, 20, 4, 0),
(76, ' Fumet de poisson ', 1, ' Kg ', 9, 20, 4, 0),
(77, ' Sauce soja au yuzu (ponzu) ', 1, ' L ', 45, 20, 4, 0),
(78, ' Sarasin en grain ', 1, ' Kg ', 5, 20, 4, 0),
(79, ' Cognac ', 1, ' L ', 8, 20, 4, 0),
(80, ' Vin blanc ', 1, ' L ', 2, 20, 4, 0),
(81, ' Concentré de tomate ', 1, ' Kg ', 13, 20, 4, 0),
(82, ' Safran ', 1, ' Kg ', 2000, 20, 4, 0),
(83, ' Pois cassés ', 1, ' Kg ', 2, 20, 4, 0),
(84, ' Epices à tajine ', 1, ' Kg ', 20, 20, 4, 0),
(85, ' Abricots secs ', 1, ' Kg ', 8, 20, 4, 0),
(86, ' Semoule de blé moyenne ', 1, ' Kg ', 1, 20, 4, 0),
(87, ' Crozet de Savoie ', 1, ' Kg ', 6, 20, 4, 0),
(88, ' Noix muscade ', 1, ' Kg ', 0, 20, 4, 0),
(89, ' Riz rond arborio ', 1, ' Kg ', 2, 20, 4, 0),
(90, ' Cèpes séchès ', 1, ' Kg ', 40, 20, 4, 0),
(91, ' Malibu ', 1, ' L ', 12, 20, 4, 0),
(92, ' Coco râpé ', 1, ' Kg ', 18, 20, 4, 0),
(93, ' Levure de boulanger ', 1, ' Kg ', 11, 20, 4, 0),
(94, ' Muscat de Lunel ', 1, ' L ', 9, 20, 4, 0),
(95, ' Farine ', 1, ' Kg ', 1, 20, 4, 0),
(96, ' Calvados ', 1, ' L ', 30, 20, 4, 0),
(97, ' Fécule ', 1, ' kg ', 7, 20, 4, 0),
(98, ' vinaigre blanc ', 1, ' L ', 1, 20, 4, 0),
(99, ' Huile d\'arachide ', 1, ' L ', 1, 20, 4, 0),
(100, ' Pesto ', 1, ' U ', 7, 20, 4, 0),
(101, ' Chapelure brune ', 1, ' kg ', 2, 20, 4, 0),
(102, ' Sel fin ', 1, ' Kg ', 0, 20, 4, 0),
(103, ' Gros sel ', 1, ' Kg ', 0, 20, 4, 0),
(104, ' Poivre blanc ', 1, ' Kg ', 0, 20, 4, 0),
(105, ' Poivre noir ', 1, ' Kg ', 0, 20, 4, 0),
(106, ' fleur de sel de camargue ', 1, ' Kg ', 38, 20, 4, 0),
(107, ' Sucre semoule ', 1, ' Kg ', 1, 20, 4, 0),
(108, ' Chocolat blanc ', 1, ' Kg ', 5, 20, 4, 0),
(109, ' Chocolat lait suprème belcolade ', 1, ' Kg ', 5, 20, 4, 0),
(110, ' Fleur de cao ', 1, ' Kg ', 0, 20, 4, 0),
(111, ' Glucose ', 1, ' Kg ', 4, 20, 4, 0),
(112, ' Cacao poudre ', 1, ' Kg ', 7, 20, 4, 0),
(113, ' Gélatine (feuille de 2g) ', 1, ' Kg ', 30, 20, 4, 0),
(114, ' Vanille gousses ', 1, ' P ', 2, 20, 4, 0),
(115, ' Poudre d\'amande ', 1, ' Kg ', 7, 20, 4, 0),
(116, ' Spigol ', 1, ' Kg ', 269, 20, 4, 0),
(117, ' Baking Power ', 1, ' Kg ', 5, 20, 4, 0),
(118, ' Jus d\'orange ', 1, ' L ', 2, 20, 4, 0),
(119, ' Sirop basilic ', 1, ' L ', 0, 20, 4, 0),
(120, ' Sucre glace ', 1, ' Kg ', 2, 20, 4, 0),
(121, ' Beurre de cacao ', 1, ' Kg ', 21, 20, 4, 0),
(122, ' Nappage neutre ', 1, ' Kg ', 10, 20, 4, 0),
(123, ' Colorant jaune en poudre ', 1, ' Kg ', 124, 20, 4, 0),
(124, ' Chocolat noir ariaga ', 1, ' Kg ', 5, 20, 4, 0),
(125, ' Stabilisateur ', 1, ' Kg ', 50, 20, 4, 0),
(126, ' Sachet de vanille ', 1, ' U ', 2, 20, 4, 0),
(127, ' Cacao poudre ', 1, ' Kg ', 9, 20, 4, 0),
(128, ' Praliné amande noisette ', 1, ' Kg ', 20, 20, 4, 0),
(129, ' Feuillantine ', 1, ' Kg ', 12, 20, 4, 0),
(130, ' Genduja ', 1, ' Kg ', 30, 20, 4, 0),
(131, ' Café soluble ', 1, ' Kg ', 35, 20, 4, 0),
(132, ' Amaretto ', 1, ' L ', 30, 20, 4, 0),
(133, ' Boudoir carton de 240P ', 1, ' U ', 13, 20, 4, 0),
(134, ' Café grains ', 1, ' Kg ', 12, 20, 4, 0),
(135, ' Pate de marron imbert ', 1, ' Kg ', 11, 20, 4, 0),
(136, ' Noisettes ', 1, ' Kg ', 12, 20, 4, 0),
(137, ' Pure pâte de pistache ', 1, ' Kg ', 40, 20, 4, 0),
(138, ' Pâte de pistche aromatisée colorée ', 1, ' Kg ', 39, 20, 4, 0),
(139, ' Sucre casonade ', 1, ' Kg ', 2, 20, 4, 0),
(140, ' Poudre de Noisette grise ', 1, ' Kg ', 12, 20, 4, 0),
(141, ' Pistache entière ', 1, ' Kg ', 13, 20, 4, 0),
(142, ' Arome Hibiscus ', 1, ' Kg ', 34, 20, 4, 0),
(143, ' Poudre à crème ', 1, ' Kg ', 7, 20, 4, 0),
(144, ' Colorant rouge ', 1, ' Kg ', 124, 20, 4, 0),
(145, ' Fève tonga ', 1, ' Kg ', 150, 20, 4, 0),
(146, ' Rhum ', 1, ' L ', 25, 20, 4, 0),
(147, ' Exxtrait de vanille ', 1, ' Kg ', 23, 20, 4, 0),
(148, ' Amandes amère ', 1, ' Kg ', 32, 20, 4, 0),
(149, ' Farine de riz ', 1, ' Kg ', 3, 20, 4, 0),
(150, ' Pate de noisette ', 1, ' Kg ', 22, 20, 4, 0),
(151, ' Poudre de pistache ', 1, ' Kg ', 50, 20, 4, 0),
(152, ' jus de pommes ', 1, ' l ', 2, 20, 4, 0),
(153, ' Feuilletage ', 1, ' Kg ', 7, 20, 4, 0),
(154, ' Trimoline ', 1, ' Kg ', 12, 20, 4, 0),
(155, ' Fond de tarte ', 1, ' P ', 0, 20, 4, 0),
(156, ' Amandes mondées ', 1, ' Kg ', 18, 20, 4, 0),
(157, ' Kahlua ', 1, ' L ', 16, 20, 4, 0),
(158, ' Pectine NH ', 1, ' Kg ', 38, 20, 4, 0),
(159, ' Farine traité thermiquement ', 1, ' Kg ', 1, 20, 4, 0),
(160, ' Anis étoilé ', 1, ' Kg ', 38, 20, 4, 0),
(161, ' Cannelle moulue ', 1, ' Kg ', 14, 20, 4, 0),
(162, ' Pruneaux ', 1, ' Kg ', 8, 20, 4, 0),
(163, ' Amandes batonnets ', 1, ' Kg ', 13, 20, 4, 0),
(164, ' Noix de pécan ', 1, ' Kg ', 25, 20, 4, 0),
(165, ' Figues séchées ', 1, ' Kg ', 16, 20, 4, 0),
(166, ' Noix de pécan ', 1, ' Kg ', 25, 20, 4, 0),
(167, ' Vergeoise ', 1, ' Kg ', 3, 20, 4, 0),
(168, ' Spéculos ', 1, ' Kg ', 8, 20, 4, 0),
(169, ' Fructose ', 1, ' Kg ', 4, 20, 4, 0),
(170, ' Brownies ', 1, ' Kg ', 14, 20, 4, 0),
(171, ' Amandes hachées ', 1, ' Kg ', 9, 20, 4, 0),
(172, ' Noisettes hachées ', 1, ' Kg ', 15, 20, 4, 0),
(173, ' Paprika ', 1, ' kg ', 11, 20, 4, 0),
(174, ' Sorbitol ', 1, ' kg ', 13, 20, 4, 0),
(175, ' Fleur d’oranger ', 1, ' Kg ', 11, 20, 4, 0),
(176, ' Grisettes de Montpellier ', 1, ' Kg ', 17, 20, 4, 0),
(177, ' Poudre de réglisse ', 1, ' Kg ', 28, 20, 4, 0),
(178, ' Orange confite ', 1, ' Kg ', 18, 20, 4, 0),
(179, ' Grand Marnier ', 1, ' Kg ', 23, 20, 4, 0),
(180, ' Huile de citron ', 1, ' Kg ', 90, 20, 4, 0),
(181, ' Citron confit ', 1, ' Kg ', 9, 20, 4, 0),
(182, ' Blanc d’oeuf en poudre ', 1, ' Kg ', 20, 20, 4, 0),
(183, ' Colorant vert en poudre ', 1, ' kg ', 150, 20, 4, 0),
(184, ' Weck entrée /dessert ', 1, ' U ', 1, 20, 4, 0),
(185, ' Weck plat ', 1, ' U ', 1, 20, 4, 0),
(186, ' compote de pomme ', 1, ' kg ', 2, 20, 4, 0),
(187, ' Sorbet fraise ', 1, ' Kg ', 2, 20, 4, 0),
(188, ' Glace otantic 2,5L ', 1, ' U ', 11, 20, 4, 0),
(189, ' Purée mangue ', 1, ' Kg ', 7, 20, 4, 0),
(190, ' Purée de citron jaune ', 1, ' Kg ', 7, 20, 4, 0),
(191, ' Purée coco ', 1, ' Kg ', 7, 20, 4, 0),
(192, ' Purée fruits rouges ', 1, ' Kg ', 7, 20, 4, 0),
(193, ' jus de pomme ', 1, ' L ', 1, 20, 4, 0),
(194, ' Purée de framboise ', 1, ' Kg ', 7, 20, 4, 0),
(195, ' Purée passion ', 1, ' kg ', 7, 20, 4, 0),
(196, ' Purée Myrtille ', 1, ' Kg ', 7, 20, 4, 0),
(197, ' Purée de banane ', 1, ' Kg ', 7, 20, 4, 0),
(198, ' Purée de leetchi ', 1, ' Kg ', 7, 20, 4, 0),
(199, ' Purée de citron vert ', 1, ' Kg ', 7, 20, 4, 0),
(200, ' purée de cranberry ', 1, ' kg ', 7, 20, 4, 0),
(201, ' Boite blanche ', 1, ' U ', 1, 20, 4, 0),
(202, ' Plateau carton ', 1, ' U ', 0, 20, 4, 0),
(203, ' Pique bambou ', 1, ' U ', 0, 20, 4, 0),
(204, ' Carton ', 1, ' U ', 1, 20, 4, 0),
(205, ' Barquette thermoscellées ', 1, ' U ', 0, 20, 4, 0),
(206, ' Barquettes alu 2250ml ', 1, ' U ', 0, 20, 4, 0),
(207, ' Sac pour arrancini ', 1, ' U ', 0, 20, 4, 0);

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
  MODIFY `idIngredient` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

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
