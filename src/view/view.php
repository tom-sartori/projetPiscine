<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/general.css">
        <meta charset="UTF-8">
        <title>
            <?= $pagetitle; ?>
        </title>
    </head>

    <body>
        <nav>
            <a href="index.php?controller=Recette&action=readAll">Recette</a>
            <a href="index.php?controller=Ingredient&action=readAll">Ingrédient</a>
            <a href="index.php?controller=Allergene&action=readAll">Allergene</a>
            <a href="index.php?controller=Utilisateur&action=readAll">Utilisateur</a>
        </nav>

        <main>
            <?php
                require File::build_path(array('view', static::$object, "$view.php"));
            ?>
        </main>

        <footer>

        </footer>

    </body>
</html>

