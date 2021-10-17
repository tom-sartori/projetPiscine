<?php

$isConnected = Session::isConnected();
$isAdmin = Session::isAdmin();

?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/menu.css">
    <script type="text/javascript" src="js/utils.js" defer></script>
    <meta charset="UTF-8">
    <title>
        <?= $pagetitle; ?>
    </title>

    <div id="divConnexion">
        <?= (isset($_SESSION["loginUtilisateur"])) ?
            'Bonjour ' . $_SESSION["loginUtilisateur"] . ' <a href="index.php?controller=Utilisateur&action=deconnect">Déconnexion</a>'
            :
            '<a href="index.php?controller=Utilisateur&action=connect">Connexion</a>';
        ?>
    </div>

</head>
    <body>
        <div class="menu">
            <nav>
                <ul>
                    <li class="deroulant">
                        <a href="index.php?controller=Recette&action=readAll" class="dropbtn">Recettes</a>
                        <div class="deroule">
                            <a href="index.php?controller=Recette&action=readAll">Voir la liste</a>
                            <a href="index.php?controller=Recette&action=create">Ajouter une recette</a>
                            <a href="index.php?controller=CategorieRecette&action=readAll">Catégories</a>
                        </div>
                    </li>

                    <li class="deroulant">
                        <a href="index.php?controller=Ingredient&action=readAll" class="dropbtn">Ingrédients</a>
                        <div class="deroule">
                            <a href="index.php?controller=Ingredient&action=readAll">Voir la liste</a>
                            <a href="index.php?controller=Ingredient&action=create">Ajouter un ingrédient</a>
                            <a href="index.php?controller=CategorieIngredient&action=readAll">Catégories</a>
                        </div>
                    </li>

                    <li>
                        <a href="index.php?controller=Allergene&action=readAll">Allergenes</a>
                    </li>

                    <li class="deroulant">
                        <a href="index.php?controller=Utilisateur&action=readAll">Utilisateurs</a>
                        <div class="deroule">
                            <a href="index.php?controller=Utilisateur&action=readAll">Voir la liste</a>
                            <?= $isConnected ? '<a href="index.php?controller=Utilisateur&action=create">Ajouter un utilisateur</a>' : '' ?>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>


    <main>
        <?php
        require File::build_path(array('view', static::$object, "$view.php"));
        ?>
    </main>

    <footer>

    </footer>

</body>

</html>