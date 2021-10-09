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
</head>

<body>
    <nav>
        <a href="index.php?controller=Recette&action=readAll">Recette</a>
        <a href="index.php?controller=Recette&action=create">AjouterRecette</a>
        <a href="index.php?controller=CategorieRecette&action=readAll">CategorieRecette</a>

        <a href="index.php?controller=Ingredient&action=readAll">Ingrédient</a>
        <a href="index.php?controller=Ingredient&action=create">AjouterIngrédient</a>
        <a href="index.php?controller=CategorieIngredient&action=readAll">CategorieIngredient</a>

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