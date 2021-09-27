<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="css/general.css">
        <script type="text/javascript" src="./js/generalScript.js" defer></script>
        <script type="text/javascript" src="./js/generalAjaxScript.js" defer></script>
        <meta charset="UTF-8">
        <title>
            <?= $pagetitle; ?>
        </title>
    </head>

    <body>
        <nav>
            <a href="index.php?controller=accueil&action=list">Accueil</a>
            <a href="index.php?controller=recette&action=list">Recette</a>
            <a href="index.php?controller=ingredient&action=list">Ingrédient</a>
            <a href="index.php?controller=allergene&action=list">Allergene</a>
        </nav>

        <main>
            <?php
            $filepath = File::build_path(array("view", $object, "$view.php"));
            require $filepath;
            ?>
        </main>

        <footer>

        </footer>

    </body>
</html>

