-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : lun. 18 oct. 2021 à 06:00
-- Version du serveur :  5.7.32
-- Version de PHP : 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données : `projetPiscine`
--

-- --------------------------------------------------------

--
-- Structure de la table `allergene`
--

CREATE TABLE `allergene` (
  `idAllergene` int(11) NOT NULL,
  `nomAllergene` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `allergene`
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
(30, 'jhbdaua'),
(31, 'kjnk'),
(38, 'jhbjbh');

-- --------------------------------------------------------

--
-- Structure de la table `asso_etape_ingredient`
--

CREATE TABLE `asso_etape_ingredient` (
  `idEtape` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  `quantite` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `asso_etape_ingredient`
--

INSERT INTO `asso_etape_ingredient` (`idEtape`, `idIngredient`, `quantite`) VALUES
(10, 87, 800),
(10, 16, 5),
(11, 33, 2),
(11, 99, 250.5),
(12, 65, 2),
(13, 42, 100),
(13, 40, 1),
(14, 14, 500),
(14, 13, 100),
(14, 87, 100),
(16, 8, 2),
(16, 81, 2),
(17, 87, 1.5),
(17, 116, 600),
(17, 85, 1),
(18, 100, 200),
(18, 15, 150);

-- --------------------------------------------------------

--
-- Structure de la table `asso_recette_categorieRecette`
--

CREATE TABLE `asso_recette_categorieRecette` (
  `idRecette` int(6) NOT NULL,
  `idCategorieRecette` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `asso_recette_categorieRecette`
--

INSERT INTO `asso_recette_categorieRecette` (`idRecette`, `idCategorieRecette`) VALUES
(1, 2),
(1, 4),
(2, 2),
(2, 4),
(3, 2),
(4, 3),
(5, 3);

-- --------------------------------------------------------

--
-- Structure de la table `asso_recette_etape`
--

CREATE TABLE `asso_recette_etape` (
  `idRecette` int(11) NOT NULL,
  `idEtape` int(11) NOT NULL,
  `ordre` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `asso_recette_etape`
--

INSERT INTO `asso_recette_etape` (`idRecette`, `idEtape`, `ordre`) VALUES
(5, 10, 0),
(5, 11, 1),
(1, 12, 0),
(1, 13, 1),
(1, 14, 2),
(2, 15, 0),
(3, 16, 0),
(4, 17, 0),
(4, 18, 1);

-- --------------------------------------------------------

--
-- Structure de la table `asso_recette_utilisateur`
--

CREATE TABLE `asso_recette_utilisateur` (
  `idRecette` int(11) NOT NULL,
  `loginUtilisateur` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorieIngredient`
--

CREATE TABLE `categorieIngredient` (
  `idCategorieIngredient` int(11) NOT NULL,
  `nomCategorieIngredient` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorieIngredient`
--

INSERT INTO `categorieIngredient` (`idCategorieIngredient`, `nomCategorieIngredient`) VALUES
(1, 'Viandes et volailles'),
(2, 'Poissons et crustacés '),
(3, 'Crèmerie '),
(4, 'Epicerie'),
(5, 'Fruits et légumes');

-- --------------------------------------------------------

--
-- Structure de la table `categorieRecette`
--

CREATE TABLE `categorieRecette` (
  `idCategorieRecette` int(11) NOT NULL,
  `nomCategorieRecette` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorieRecette`
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
-- Structure de la table `etape`
--

CREATE TABLE `etape` (
  `idEtape` int(11) NOT NULL,
  `nomEtape` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `estSousRecette` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `etape`
--

INSERT INTO `etape` (`idEtape`, `nomEtape`, `description`, `estSousRecette`) VALUES
(10, 'Pate feuilletée ', 'Sabler légèrement les farines, le sel et le beurre. Incorporer l’eau et former rapidement la détrempe sans pétrir (homogène). Reposer idéalement 5 h.\r\nBeurre le pâton et donner 5 tours simples en laissant reposer idéalement 2 h tous les deux tours.\r\nAprès le 5ème tour abaisser, détailler selon l’utilisation et laisser reposer à nouveau avant de cuire.', 1),
(11, 'Préparation des pommes', 'Eplucher et couper les pommes. \r\nFaire revenir dans un caramel. \r\nMettre dans le fond de tarte. ', 0),
(12, 'Préparations préliminaires', 'Mettre en place le poste de travail \r\nParer la viande \r\nDétailler en morceaux de 0.050 kg environ\r\nBlanchir la viande ', 0),
(13, 'Garniture aromatique', 'Éplucher et laver les légumes \r\nClouter l\'oignon \r\nFaire le bouquet garni \r\nTailler les légumes en gros bâtonnets', 0),
(14, 'Cuisson et sauce', 'Marquer la blanquette en cuisson et réaliser la sauce ', 0),
(15, 'Toutes les étapes', 'Coupez la viande en gros dés. Faites chauffer une cocotte avec l\'huile d\'olive et le beurre. Jetez-y les morceaux de veau et faites-les dorer de tous les côtés. Retirez-les.\r\nRemplacez-les par les oignons, l\'ail, les carottes, les champignons, les olives égouttées. Dès que les légumes commencent à dorer, placez à nouveau les morceaux de viande dans la cocotte et mélangez le tout.\r\nSaupoudrez de la farine et mélangez pour bien enrober les morceaux.\r\nDès que la farine commence à brunir, versez le bouillon, le porto, les tomates en conserve et diluez-y le concentré de tomates. Salez et poivrez généreusement et ajoutez la sauge effeuillée.\r\nFermez la cocotte et baissez le feu pour que le liquide frémisse juste. Laissez cuire 1h à couvert en mélangeant si nécessaire. Retirez alors le couvercle et prolongez la cuisson 30 min.', 0),
(16, 'Etapes paella', 'Plein de riz et plein de crevettes. \r\nOn chauffe le tout. \r\nOn, se régale. ', 0),
(17, 'Pate de cupcake', 'Mélanger la farine. ', 0),
(18, 'Faire le glaçage ', 'Faire fondre le chocolat avec une lichette de lait. \r\nObtenir une belle consistance qui donne envie. \r\nMettre généreusement le glaçage sur le cupcake. ', 0);

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
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

--
-- Déchargement des données de la table `ingredient`
--

INSERT INTO `ingredient` (`idIngredient`, `nomIngredient`, `quantiteAchat`, `idUniteQuantite`, `prixHT`, `idTaxe`, `idCategorieIngredient`, `idAllergene`) VALUES
(1, ' Epaule d\'agneau sans os ', 1, 1, 8, 2, 1, 0),
(2, ' Filet de poulet ', 1, 1, 4, 2, 1, 0),
(3, ' Chorizo doux ', 1, 1, 9, 2, 1, 0),
(4, ' Jarret ou Paleron de bœuf ', 1, 1, 3, 2, 1, 0),
(5, ' Poitrine fumée ', 1, 1, 5, 2, 1, 0),
(6, ' Joue de bœuf ', 1, 1, 13, 2, 1, 0),
(7, ' Avant bœuf pour viande haché ', 1, 1, 12, 2, 1, 0),
(8, ' Crevettes surg 30/40 ', 1, 1, 18, 2, 2, 0),
(9, ' Dos de cabillaud sans peau surg ', 1, 1, 14, 2, 2, 0),
(10, ' Ecrevisses surg ', 1, 1, 10, 2, 2, 0),
(11, ' Filet de saumon ', 1, 1, 14, 2, 2, 0),
(12, ' Parure de saumon fumé ', 1, 1, 6, 2, 2, 0),
(13, ' Beurre ', 1, 1, 6, 2, 3, 0),
(14, ' Crème liquide ', 1, 2, 3, 2, 3, 0),
(15, ' Lait ', 1, 2, 1, 2, 3, 0),
(16, ' Œufs ', 1, 5, 0, 2, 3, 0),
(17, ' Parmesan ', 1, 1, 14, 2, 3, 0),
(18, ' Reblochon ', 1, 1, 10, 2, 3, 0),
(19, ' Mascarpone ', 1, 1, 7, 2, 3, 0),
(20, ' Jaunes d\'œuf au litre ', 1, 2, 10, 2, 3, 0),
(21, ' Blancs d\'œuf au litre ', 1, 2, 8, 2, 3, 0),
(22, ' Œufs entiers au litre ', 1, 2, 3, 2, 3, 0),
(23, ' Crème mascarpone ', 1, 2, 5, 2, 3, 0),
(24, ' Beurre demi sel ', 1, 1, 6, 2, 3, 0),
(25, ' Mozarella ', 1, 1, 5, 2, 3, 0),
(26, ' Potimarron ', 1, 1, 2, 2, 5, 0),
(27, ' Oignons ', 1, 1, 2, 2, 5, 0),
(28, ' Oignons rouges ', 1, 1, 3, 2, 5, 0),
(29, ' Carottes ', 1, 1, 2, 2, 5, 0),
(30, ' Courgettes ', 1, 1, 2, 2, 5, 0),
(31, ' Cèpes surg pied et morceaux ', 1, 1, 13, 2, 5, 0),
(32, ' Poires ', 1, 1, 8, 2, 5, 0),
(33, ' Pommes Granny Smith ', 1, 1, 3, 2, 5, 0),
(34, ' Céleri rave ', 1, 1, 2, 2, 5, 0),
(35, ' Citron jaune ', 1, 1, 4, 2, 5, 0),
(36, ' Citron vert ', 1, 1, 6, 2, 5, 0),
(37, ' Choux fleur ', 1, 1, 4, 2, 5, 0),
(38, ' Ail ', 1, 1, 5, 2, 5, 0),
(39, ' Poireaux ', 1, 1, 3, 2, 5, 0),
(40, ' Bouquet garni ', 1, 5, 0, 2, 5, 0),
(41, ' Echalotes ', 1, 1, 2, 2, 5, 0),
(42, ' Persil ', 1, 4, 0, 2, 5, 0),
(43, ' Pommes de terre ', 1, 1, 1, 2, 5, 0),
(44, ' Orange ', 1, 1, 2, 2, 5, 0),
(45, ' pomme golden ', 1, 1, 2, 2, 5, 0),
(46, ' Basilic surg ', 1, 1, 22, 2, 5, 0),
(47, ' Cebette ', 1, 4, 1, 2, 5, 0),
(48, ' Petits pois surg ', 1, 1, 2, 2, 5, 0),
(49, ' Menthe ', 1, 4, 1, 2, 5, 0),
(50, ' Pois chiche 4/4 ', 1, 6, 4, 2, 4, 0),
(51, ' Cœur de palmier 4/4 ', 1, 6, 4, 2, 4, 0),
(52, ' Vinaigre de riz ', 1, 2, 7, 2, 4, 0),
(53, ' Miel ', 1, 1, 9, 2, 4, 0),
(54, ' Sauce nuoc nam ', 1, 2, 20, 2, 4, 0),
(55, ' Cuisses de canard confites 5/1 ', 1, 6, 30, 2, 4, 0),
(56, ' Huile de sésame ', 1, 2, 11, 2, 4, 0),
(57, ' Huile d\'olive ', 1, 2, 5, 2, 4, 0),
(58, ' Huile de tournesol ', 1, 2, 2, 2, 4, 0),
(59, ' Huile de pépins de raisin ', 1, 2, 4, 2, 4, 0),
(60, ' Graines de sésame ', 1, 1, 36, 2, 4, 0),
(61, ' Piment d\'Espelette ', 1, 1, 200, 2, 4, 0),
(62, ' Agar agar ', 1, 1, 83, 2, 4, 0),
(63, ' Nouilles chinoise ', 1, 1, 16, 2, 4, 0),
(64, ' Sésame noir en pâte ', 1, 1, 30, 2, 4, 0),
(65, ' Fond blanc de veau ', 1, 1, 9, 2, 4, 0),
(66, ' Jus d\'agneau déshydraté ', 1, 1, 9, 2, 4, 0),
(67, ' Fond brun de veau lié ', 1, 1, 9, 2, 4, 0),
(68, ' Fumet de poisson ', 1, 1, 9, 2, 4, 0),
(69, ' Sauce soja au yuzu (ponzu) ', 1, 2, 45, 2, 4, 0),
(70, ' Sarasin en grain ', 1, 1, 5, 2, 4, 0),
(71, ' Cognac ', 1, 2, 8, 2, 4, 0),
(72, ' Vin blanc ', 1, 2, 2, 2, 4, 0),
(73, ' Concentré de tomate ', 1, 1, 13, 2, 4, 0),
(74, ' Safran ', 1, 1, 2000, 2, 4, 0),
(75, ' Pois cassés ', 1, 1, 2, 2, 4, 0),
(76, ' Epices à tajine ', 1, 1, 20, 2, 4, 0),
(77, ' Abricots secs ', 1, 1, 8, 2, 4, 0),
(78, ' Semoule de blé moyenne ', 1, 1, 1, 2, 4, 0),
(79, ' Crozet de Savoie ', 1, 1, 6, 2, 4, 0),
(80, ' Noix muscade ', 1, 1, 0, 2, 4, 0),
(81, ' Riz rond arborio ', 1, 1, 2, 2, 4, 0),
(82, ' Cèpes séchès ', 1, 1, 40, 2, 4, 0),
(83, ' Malibu ', 1, 2, 12, 2, 4, 0),
(84, ' Coco râpé ', 1, 1, 18, 2, 4, 0),
(85, ' Levure de boulanger ', 1, 1, 11, 2, 4, 0),
(86, ' Muscat de Lunel ', 1, 2, 9, 2, 4, 0),
(87, ' Farine ', 1, 1, 1, 2, 4, 0),
(88, ' Calvados ', 1, 2, 30, 2, 4, 0),
(89, ' Fécule ', 1, 1, 7, 2, 4, 0),
(90, ' vinaigre blanc ', 1, 2, 1, 2, 4, 0),
(91, ' Huile d\'arachide ', 1, 2, 1, 2, 4, 0),
(92, ' Pesto ', 1, 3, 7, 2, 4, 0),
(93, ' Chapelure brune ', 1, 1, 2, 2, 4, 0),
(94, ' Sel fin ', 1, 1, 0, 2, 4, 0),
(95, ' Gros sel ', 1, 1, 0, 2, 4, 0),
(96, ' Poivre blanc ', 1, 1, 0, 2, 4, 0),
(97, ' Poivre noir ', 1, 1, 0, 2, 4, 0),
(98, ' fleur de sel de camargue ', 1, 1, 38, 2, 4, 0),
(99, ' Sucre semoule ', 1, 1, 1, 2, 4, 0),
(100, ' Chocolat blanc ', 1, 1, 5, 2, 4, 0),
(101, ' Chocolat lait suprème belcolade ', 1, 1, 5, 2, 4, 0),
(102, ' Fleur de cao ', 1, 1, 0, 2, 4, 0),
(103, ' Glucose ', 1, 1, 4, 2, 4, 0),
(104, ' Cacao poudre ', 1, 1, 7, 2, 4, 0),
(105, ' Gélatine (feuille de 2g) ', 1, 1, 30, 2, 4, 0),
(106, ' Vanille gousses ', 1, 5, 2, 2, 4, 0),
(107, ' Poudre d\'amande ', 1, 1, 7, 2, 4, 0),
(108, ' Spigol ', 1, 1, 269, 2, 4, 0),
(109, ' Baking Power ', 1, 1, 5, 2, 4, 0),
(110, ' Jus d\'orange ', 1, 2, 2, 2, 4, 0),
(111, ' Sirop basilic ', 1, 2, 0, 2, 4, 0),
(112, ' Sucre glace ', 1, 1, 2, 2, 4, 0),
(113, ' Beurre de cacao ', 1, 1, 21, 2, 4, 0),
(114, ' Nappage neutre ', 1, 1, 10, 2, 4, 0),
(115, ' Colorant jaune en poudre ', 1, 1, 124, 2, 4, 0),
(116, ' Chocolat noir ariaga ', 1, 1, 5, 2, 4, 0),
(117, ' Stabilisateur ', 1, 1, 50, 2, 4, 0),
(118, ' Sachet de vanille ', 1, 3, 2, 2, 4, 0),
(119, ' Cacao poudre ', 1, 1, 9, 2, 4, 0),
(120, ' Praliné amande noisette ', 1, 1, 20, 2, 4, 0),
(121, ' Feuillantine ', 1, 1, 12, 2, 4, 0),
(122, ' Genduja ', 1, 1, 30, 2, 4, 0),
(123, ' Café soluble ', 1, 1, 35, 2, 4, 0),
(124, ' Amaretto ', 1, 2, 30, 2, 4, 0),
(125, ' Boudoir carton de 240P ', 1, 3, 13, 2, 4, 0),
(126, ' Café grains ', 1, 1, 12, 2, 4, 0),
(127, ' Pate de marron imbert ', 1, 1, 11, 2, 4, 0),
(128, ' Noisettes ', 1, 1, 12, 2, 4, 0),
(129, ' Pure pâte de pistache ', 1, 1, 40, 2, 4, 0),
(130, ' Pâte de pistche aromatisée colorée ', 1, 1, 39, 2, 4, 0),
(131, ' Sucre casonade ', 1, 1, 2, 2, 4, 0),
(132, ' Poudre de Noisette grise ', 1, 1, 12, 2, 4, 0),
(133, ' Pistache entière ', 1, 1, 13, 2, 4, 0),
(134, ' Arome Hibiscus ', 1, 1, 34, 2, 4, 0),
(135, ' Poudre à crème ', 1, 1, 7, 2, 4, 0),
(136, ' Colorant rouge ', 1, 1, 124, 2, 4, 0),
(137, ' Fève tonga ', 1, 1, 150, 2, 4, 0),
(138, ' Rhum ', 1, 2, 25, 2, 4, 0),
(139, ' Exxtrait de vanille ', 1, 1, 23, 2, 4, 0),
(140, ' Amandes amère ', 1, 1, 32, 2, 4, 0),
(141, ' Farine de riz ', 1, 1, 3, 2, 4, 0),
(142, ' Pate de noisette ', 1, 1, 22, 2, 4, 0),
(143, ' Poudre de pistache ', 1, 1, 50, 2, 4, 0),
(144, ' jus de pommes ', 1, 2, 2, 2, 4, 0),
(145, ' Feuilletage ', 1, 1, 7, 2, 4, 0),
(146, ' Trimoline ', 1, 1, 12, 2, 4, 0),
(147, ' Fond de tarte ', 1, 5, 0, 2, 4, 0),
(148, ' Amandes mondées ', 1, 1, 18, 2, 4, 0),
(149, ' Kahlua ', 1, 2, 16, 2, 4, 0),
(150, ' Pectine NH ', 1, 1, 38, 2, 4, 0),
(151, ' Farine traité thermiquement ', 1, 1, 1, 2, 4, 0),
(152, ' Anis étoilé ', 1, 1, 38, 2, 4, 0),
(153, ' Cannelle moulue ', 1, 1, 14, 2, 4, 0),
(154, ' Pruneaux ', 1, 1, 8, 2, 4, 0),
(155, ' Amandes batonnets ', 1, 1, 13, 2, 4, 0),
(156, ' Noix de pécan ', 1, 1, 25, 2, 4, 0),
(157, ' Figues séchées ', 1, 1, 16, 2, 4, 0),
(158, ' Noix de pécan ', 1, 1, 25, 2, 4, 0),
(159, ' Vergeoise ', 1, 1, 3, 2, 4, 0),
(160, ' Spéculos ', 1, 1, 8, 2, 4, 0),
(161, ' Fructose ', 1, 1, 4, 2, 4, 0),
(162, ' Brownies ', 1, 1, 14, 2, 4, 0),
(163, ' Amandes hachées ', 1, 1, 9, 2, 4, 0),
(164, ' Noisettes hachées ', 1, 1, 15, 2, 4, 0),
(165, ' Paprika ', 1, 1, 11, 2, 4, 0),
(166, ' Sorbitol ', 1, 1, 13, 2, 4, 0),
(167, ' Fleur d’oranger ', 1, 1, 11, 2, 4, 0),
(168, ' Grisettes de Montpellier ', 1, 1, 17, 2, 4, 0),
(169, ' Poudre de réglisse ', 1, 1, 28, 2, 4, 0),
(170, ' Orange confite ', 1, 1, 18, 2, 4, 0),
(171, ' Grand Marnier ', 1, 1, 23, 2, 4, 0),
(172, ' Huile de citron ', 1, 1, 90, 2, 4, 0),
(173, ' Citron confit ', 1, 1, 9, 2, 4, 0),
(174, ' Blanc d’oeuf en poudre ', 1, 1, 20, 2, 4, 0),
(175, ' Colorant vert en poudre ', 1, 1, 150, 2, 4, 0),
(176, ' Weck entrée /dessert ', 1, 3, 1, 2, 4, 0),
(177, ' Weck plat ', 1, 3, 1, 2, 4, 0),
(178, ' compote de pomme ', 1, 1, 2, 2, 4, 0),
(179, ' Sorbet fraise ', 1, 1, 2, 2, 4, 0),
(180, ' Glace otantic 2,5L ', 1, 3, 11, 2, 4, 0),
(181, ' Purée mangue ', 1, 1, 7, 2, 4, 0),
(182, ' Purée de citron jaune ', 1, 1, 7, 2, 4, 0),
(183, ' Purée coco ', 1, 1, 7, 2, 4, 0),
(184, ' Purée fruits rouges ', 1, 1, 7, 2, 4, 0),
(185, ' jus de pomme ', 1, 2, 1, 2, 4, 0),
(186, ' Purée de framboise ', 1, 1, 7, 2, 4, 0),
(187, ' Purée passion ', 1, 1, 7, 2, 4, 0),
(188, ' Purée Myrtille ', 1, 1, 7, 2, 4, 0),
(189, ' Purée de banane ', 1, 1, 7, 2, 4, 0),
(190, ' Purée de leetchi ', 1, 1, 7, 2, 4, 0),
(191, ' Purée de citron vert ', 1, 1, 7, 2, 4, 0),
(192, ' purée de cranberry ', 1, 1, 7, 2, 4, 0),
(193, ' Boite blanche ', 1, 3, 1, 2, 4, 0),
(194, ' Plateau carton ', 1, 3, 0, 2, 4, 0),
(195, ' Pique bambou ', 1, 3, 0, 2, 4, 0),
(196, ' Carton ', 1, 3, 1, 2, 4, 0),
(197, ' Barquette thermoscellées ', 1, 3, 0, 2, 4, 0),
(198, ' Barquettes alu 2250ml ', 1, 3, 0, 2, 4, 0),
(199, ' Sac pour arrancini ', 1, 3, 0, 2, 4, 0);

-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE `recette` (
  `idRecette` int(11) NOT NULL,
  `nomRecette` varchar(50) NOT NULL,
  `nbCouvert` int(11) NOT NULL,
  `descriptif` text NOT NULL,
  `coefficient` float NOT NULL,
  `chargeSalariale` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `recette`
--

INSERT INTO `recette` (`idRecette`, `nomRecette`, `nbCouvert`, `descriptif`, `coefficient`, `chargeSalariale`) VALUES
(1, 'Blanquette de veau', 8, 'Mep et désinfection du poste. ', 1, 0),
(2, 'Sauté de veau au porto', 4, 'Mep et désinfection du poste. ', 1, 30),
(3, 'Paella', 10, 'Mep et désinfection du poste. ', 1, 0),
(4, 'Cupcake au chocolat', 10, 'Mep et désinfection du poste. ', 4, 0),
(5, 'Tarte aux pommes', 8, 'Mep et désinfection du poste. ', 2, 20);

-- --------------------------------------------------------

--
-- Structure de la table `taxe`
--

CREATE TABLE `taxe` (
  `idTaxe` int(11) NOT NULL,
  `montantTaxe` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `taxe`
--

INSERT INTO `taxe` (`idTaxe`, `montantTaxe`) VALUES
(1, 5.5),
(2, 10),
(3, 20);

-- --------------------------------------------------------

--
-- Structure de la table `uniteQuantite`
--

CREATE TABLE `uniteQuantite` (
  `idUnite` int(11) NOT NULL,
  `nomUnite` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `uniteQuantite`
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
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `loginUtilisateur` varchar(64) NOT NULL,
  `nomUtilisateur` varchar(50) NOT NULL,
  `prenomUtilisateur` varchar(50) NOT NULL,
  `mdpUtilisateur` varchar(64) NOT NULL,
  `adminUtilisateur` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`loginUtilisateur`, `nomUtilisateur`, `prenomUtilisateur`, `mdpUtilisateur`, `adminUtilisateur`) VALUES
('bricotj', 'Bricot', 'Judas', '9c1e0b27da16fca1caabdffb0e426d307ce2a4daae84b3a49fe3ce276fca86e4', 0),
('croches', 'Croche', 'Sarah', 'c02675866546acb53b0f1e4090c4a1efddbf64a9be9adc442a241388964b0715', 0),
('duboism', 'Dubois', 'Marie', '6d8943fba71433f4382c66aa57115e9022b352f93c6575052271d22afc6b3893', 1),
('lassaucej', 'Lassauce', 'Jean', 'bdee40d35638fdede616eeb1a05aaa524d31986a8e1ab78a0fbbeabdc5df26ce', 0),
('massel', 'Masse', 'Lalie', '69ba25bbedd860b66fecfb31e38bbe97807ad03fd267a7c8429d8834bc0e914b', 0),
('onettec', 'Onette', 'Camille', '8eb98f6fcfa3ea3e28c54ee29ee3dc5cfd1f61afae07713a9224099e130af8d8', 0),
('test', 'test', 'test', 'dfe57541d66b7426a43d4d7a0c4ed447c1b6d8ccf63c61b298399f18bbec067d', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `allergene`
--
ALTER TABLE `allergene`
  ADD PRIMARY KEY (`idAllergene`);

--
-- Index pour la table `asso_etape_ingredient`
--
ALTER TABLE `asso_etape_ingredient`
  ADD KEY `idEtape` (`idEtape`),
  ADD KEY `idIngredient` (`idIngredient`);

--
-- Index pour la table `asso_recette_categorieRecette`
--
ALTER TABLE `asso_recette_categorieRecette`
  ADD KEY `idRecette` (`idRecette`),
  ADD KEY `idCategorieRecette` (`idCategorieRecette`);

--
-- Index pour la table `asso_recette_etape`
--
ALTER TABLE `asso_recette_etape`
  ADD KEY `idRecette` (`idRecette`),
  ADD KEY `idEtape` (`idEtape`);

--
-- Index pour la table `asso_recette_utilisateur`
--
ALTER TABLE `asso_recette_utilisateur`
  ADD KEY `idRecette` (`idRecette`),
  ADD KEY `loginUtilisateur` (`loginUtilisateur`);

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
-- Index pour la table `etape`
--
ALTER TABLE `etape`
  ADD PRIMARY KEY (`idEtape`);

--
-- Index pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD PRIMARY KEY (`idIngredient`),
  ADD KEY `idAllergene` (`idAllergene`),
  ADD KEY `fk_idCategorieIngredient` (`idCategorieIngredient`),
  ADD KEY `idTaxe` (`idTaxe`),
  ADD KEY `idUniteQuantite` (`idUniteQuantite`);

--
-- Index pour la table `recette`
--
ALTER TABLE `recette`
  ADD PRIMARY KEY (`idRecette`);

--
-- Index pour la table `taxe`
--
ALTER TABLE `taxe`
  ADD PRIMARY KEY (`idTaxe`);

--
-- Index pour la table `uniteQuantite`
--
ALTER TABLE `uniteQuantite`
  ADD PRIMARY KEY (`idUnite`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`loginUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `allergene`
--
ALTER TABLE `allergene`
  MODIFY `idAllergene` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT pour la table `categorieIngredient`
--
ALTER TABLE `categorieIngredient`
  MODIFY `idCategorieIngredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `categorieRecette`
--
ALTER TABLE `categorieRecette`
  MODIFY `idCategorieRecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `etape`
--
ALTER TABLE `etape`
  MODIFY `idEtape` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `idIngredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT pour la table `recette`
--
ALTER TABLE `recette`
  MODIFY `idRecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `taxe`
--
ALTER TABLE `taxe`
  MODIFY `idTaxe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `uniteQuantite`
--
ALTER TABLE `uniteQuantite`
  MODIFY `idUnite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `asso_etape_ingredient`
--
ALTER TABLE `asso_etape_ingredient`
  ADD CONSTRAINT `fk_asso_ingredient_idEtape` FOREIGN KEY (`idEtape`) REFERENCES `etape` (`idEtape`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asso_ingredient_idIngredient` FOREIGN KEY (`idIngredient`) REFERENCES `ingredient` (`idIngredient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `asso_recette_categorieRecette`
--
ALTER TABLE `asso_recette_categorieRecette`
  ADD CONSTRAINT `fk_asso_idCategorieRecette` FOREIGN KEY (`idCategorieRecette`) REFERENCES `categorieRecette` (`idCategorieRecette`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asso_idRecette` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `asso_recette_etape`
--
ALTER TABLE `asso_recette_etape`
  ADD CONSTRAINT `fk_asso_etape_idEtape` FOREIGN KEY (`idEtape`) REFERENCES `etape` (`idEtape`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asso_etape_idRecette` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `asso_recette_utilisateur`
--
ALTER TABLE `asso_recette_utilisateur`
  ADD CONSTRAINT `fk_asso_RU_idRecette` FOREIGN KEY (`idRecette`) REFERENCES `recette` (`idRecette`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asso_RU_loginUtilisateur` FOREIGN KEY (`loginUtilisateur`) REFERENCES `utilisateur` (`loginUtilisateur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ingredient`
--
ALTER TABLE `ingredient`
  ADD CONSTRAINT `fk_idAllergene ` FOREIGN KEY (`idAllergene`) REFERENCES `allergene` (`idAllergene`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idCategorieIngredient` FOREIGN KEY (`idCategorieIngredient`) REFERENCES `categorieIngredient` (`idCategorieIngredient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idTaxe` FOREIGN KEY (`idTaxe`) REFERENCES `taxe` (`idTaxe`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idUniteQuantite` FOREIGN KEY (`idUniteQuantite`) REFERENCES `uniteQuantite` (`idUnite`) ON DELETE CASCADE ON UPDATE CASCADE;
