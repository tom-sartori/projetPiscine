<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="css/general.css">
    <!-- <link rel="stylesheet" href="css/css_menu.css"> -->
    <meta charset="UTF-8">
    <title>
        <?= $pagetitle; ?>
    </title>

</head>
<body>

<!-- Ici commence le menu-->
<div class="center">
    <nav>
        <ul>

            <li>
                <a href="">Accueil</a>
            </li>

            <li class="deroulant">
                <a class="dropbtn">Recettes</a>
                <div class="deroule">
                    <a href="index.php?controller=Recette&action=readAll">Voir la liste</a>
                    <a href="index.php?controller=Recette&action=create">Ajouter/modifier les recettes</a>
                    <a href="index.php?controller=CategorieRecette&action=readAll">Catégories</a>
                </div>
            </li>

            <li class="deroulant">
                <a class="dropbtn">Ingrédients</a>
                <div class="deroule">
                    <a href="index.php?controller=Ingredient&action=readAll">Voir la liste</a>
                    <a href="index.php?controller=Ingredient&action=create">Ajouter/modifier les ingrédients</a>
                    <a href="index.php?controller=CategorieIngredient&action=readAll">Catégories</a>
                </div>
            </li>

            <li>
                <a href="index.php?controller=Allergene&action=readAll">Allergenes</a>
            </li>

            <li>
                <a href="index.php?controller=Utilisateur&action=readAll">Utilisateur</a>
            </li>
        </ul>
    </nav>
</div>
<!-- Ici se termine le menu-->
<main>
    <?php
        require File::build_path(array('view', static::$object, "$view.php"));
    ?>
</main>

<footer>

</footer>

</body>
</html>