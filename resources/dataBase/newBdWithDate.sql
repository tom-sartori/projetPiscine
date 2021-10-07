-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 07, 2021 at 02:25 PM
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
(30, 'jhbdaua'),
(31, 'kjnk'),
(38, 'jhbjbh'),
(39, 'testing');

-- --------------------------------------------------------

--
-- Table structure for table `asso_recette_categorieRecette`
--

CREATE TABLE `asso_recette_categorieRecette` (
  `idRecette` int(6) NOT NULL,
  `idCategorieRecette` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asso_recette_categorieRecette`
--

INSERT INTO `asso_recette_categorieRecette` (`idRecette`, `idCategorieRecette`) VALUES
(10, 2),
(21, 2),
(21, 3),
(17, 1),
(24, 2),
(24, 3);

-- --------------------------------------------------------

--
-- Table structure for table `asso_recette_ingredient`
--

CREATE TABLE `asso_recette_ingredient` (
  `idRecette` int(11) NOT NULL,
  `idIngredient` int(11) NOT NULL,
  `quantiteIngredient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asso_recette_ingredient`
--

INSERT INTO `asso_recette_ingredient` (`idRecette`, `idIngredient`, `quantiteIngredient`) VALUES
(24, 13, 1),
(24, 134, 2);

-- --------------------------------------------------------

--
-- Table structure for table `asso_recette_utilisateur`
--

CREATE TABLE `asso_recette_utilisateur` (
  `idRecette` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `asso_recette_utilisateur`
--

INSERT INTO `asso_recette_utilisateur` (`idRecette`, `idUtilisateur`) VALUES
(9, 1),
(21, 1),
(21, 2),
(17, 1),
(18, 1),
(18, 2),
(24, 1);

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

--
-- Dumping data for table `ingredient`
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

--
-- Dumping data for table `recette`
--

INSERT INTO `recette` (`idRecette`, `nomRecette`, `nbCouvert`, `descriptif`, `coefficient`, `chargeSalariale`) VALUES
(2, 'Test222', 3, 'Nouveau super descriptif. ', 1, 0),
(4, 'Test111', 1, 'Nouveau super descriptif. ', 1, 0),
(5, 'Test11', 1, 'Nouveau super descriptif. ', 1, 0),
(6, 'Test111', 1, 'Nouveau super descriptif. ', 1, 0),
(7, 'Test222', 1, 'Nouveau super descriptif. ', 1, 0),
(8, 'Test222', 1, 'Nouveau super descriptif. ', 1, 0),
(9, 'Test222', 1, 'Nouveau super descriptif. ', 1, 0),
(10, 'Test222', 1, 'Nouveau super descriptif. ', 1, 0),
(11, 'Test222', 1, 'Nouveau super descriptif. ', 1, 0),
(16, 'Test222', 1, 'Nouveau super descriptif. ', 1, 0),
(17, 'Test222', 1, 'Nouveau super descriptif. ', 1, 0),
(18, 'Test222', 1, 'Nouveau super descriptif. ', 1, 0),
(20, 'Test222', 1, 'Nouveau super descriptif. ', 1, 0),
(21, 'Test222', 1, 'Nouveau super descriptif. ', 1, 0),
(23, 'Test222', 1, 'Nouveau super descriptif. ', 1, 0),
(24, 'nouvelle1', 2, 'Nouveau super descriptif. ', 2, 2),
(25, 'Test111', 1, 'Nouveau super descriptif. ', 1, 0),
(26, 'Test111', 1, 'Nouveau super descriptif. ', 1, 0),
(27, 'Test111', 1, 'Nouveau super descriptif. ', 1, 0),
(28, 'Test111', 1, 'Nouveau super descriptif. ', 1, 0),
(29, 'Test111', 1, 'Nouveau super descriptif. ', 1, 0),
(30, 'Test222', 1, 'Nouveau super descriptif. ', 1, 0),
(31, 'Test2', 2, 'Nouveau super descriptif. ', 1, 0),
(32, 'Test2', 2, 'Nouveau super descriptif. ', 1, 0),
(33, 'Test2', 2, 'Nouveau super descriptif. ', 1, 0);

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
(2, 10);

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
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nomUtilisateur`, `prenomUtilisateur`) VALUES
(1, 'Nom user 1', 'Prenom user 2'),
(2, 'Nom user 2', 'Prenom user 2'),
(5, 'Jean', 'Jean'),
(6, 'Jean', 'Jean'),
(7, 'Jean', 'Jean'),
(8, 'Jean', 'Jean'),
(9, 'Jean', 'Jean'),
(10, 'Jean', 'Jean');

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
  MODIFY `idAllergene` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `categorieIngredient`
--
ALTER TABLE `categorieIngredient`
  MODIFY `idCategorieIngredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categorieRecette`
--
ALTER TABLE `categorieRecette`
  MODIFY `idCategorieRecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `ingredient`
--
ALTER TABLE `ingredient`
  MODIFY `idIngredient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

--
-- AUTO_INCREMENT for table `recette`
--
ALTER TABLE `recette`
  MODIFY `idRecette` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

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
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
