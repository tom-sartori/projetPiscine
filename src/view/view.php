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
            <a href="index.php?controller=accueil">Accueil</a>
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

