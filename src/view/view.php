<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/general.css">
        <link rel="stylesheet" href="css/menu.css">
        <meta charset="UTF-8">
        <title>
            <?= $pagetitle; ?>
        </title>
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

                    <li>
                        <a href="index.php?controller=Utilisateur&action=readAll">Utilisateur</a>
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

