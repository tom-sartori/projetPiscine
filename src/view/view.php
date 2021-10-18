<?php

$isConnected = Session::isConnected();
$isAdmin = Session::isAdmin();

?>


<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="css/general.css">
    <!-- <link rel="stylesheet" href="css/css_menu.css"> -->
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
        <div class="center">
            <nav>
                <ul class="ulmenu">
                    <li class="deroulant">
                        <a href="index.php?controller=Recette&action=readAll" class="dropbtn">Recettes</a>
                        <div class="deroule">
                            <a href="index.php?controller=Recette&action=readAll">Voir la liste</a>
                            <?= $isConnected ? '<a href="index.php?controller=Recette&action=create">Ajouter une recette</a>' : '' ?>
                            <a href="index.php?controller=CategorieRecette&action=readAll">Catégories</a>
                        </div>
                    </li>

                    <li class="deroulant">
                        <a href="index.php?controller=Ingredient&action=readAll" class="dropbtn">Ingrédients</a>
                        <div class="deroule">
                            <a href="index.php?controller=Ingredient&action=readAll">Voir la liste</a>
                            <?= $isConnected ? '<a href="index.php?controller=Ingredient&action=create">Ajouter un ingrédient</a>' : '' ?>
                            <a href="index.php?controller=CategorieIngredient&action=readAll">Catégories</a>
                        </div>
                    </li>

                    <li class="limenu">
                        <a class="amenu" href="index.php?controller=Allergene&action=readAll">Allergenes</a>
                    </li>

                    <li class="deroulant">
                        <a href="index.php?controller=Utilisateur&action=readAll" class="dropbtn">Chefs</a>
                        <div class="deroule">
                            <a href="index.php?controller=Utilisateur&action=readAll">Voir la liste</a>
                            <?= $isConnected ? '<a href="index.php?controller=Utilisateur&action=create">Ajouter un chef</a>' : '' ?>
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