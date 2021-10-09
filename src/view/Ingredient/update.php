<?php

$idIngredient = $_GET['idIngredient'];

$isUpdate = $_GET['action'] == 'update';


?>


<h1> <?=$isUpdate?'Modifier':'Ajouter'?> un ingrédient </h1>

<div class = ajoutbox>

    <form method="post" action="index.php?controller=<?=static::$object?>&action=<?=$isUpdate?'updated':'created' ?>">

        <div class="field-ingr">
            <label for="nomIngredient">Nom de l'ingrédient </label>
            <input name="nomIngredient" type="text" value="<?=$nomIngredient?>" required>
        </div>

        <div class="field-ingr">
<!--            TODO Check la valeur préremplie pour update. -->
            <label for="idCategorieIngredient">Catégorie de l'ingrédient </label>
            <select name="idCategorieIngredient" required>
                <option value="" disabled selected>--Choisir une catégorie--</option>
                <option value="1">Viandes et volailles</option>
                <option value="2">Poissons et crustacés</option>
                <option value="3">Crèmerie</option>
                <option value="4">Epicerie</option>
                <option value="5">Fruits et légumes</option>
            </select>
        </div>

        <div class="field-ingr">
<!--            TODO Check la valeur préremplie pour update. -->
            <label for="idAllergene">Contient-il un ou des allergène(s) ?</label>
            <select name="idAllergene" required>
                <option value="0" selected>Aucun</option>
                <option value="1">Arachide</option>
                <option value="2">Céleri</option>
                <option value="3">Crustacés</option>
                <option value="4">Céréales contenant du gluten</option>
            </select>
        </div>

        <div class="field-ingr">
            <label for="quantiteAchat">Quantité à l'achat</label>
            <input name="quantiteAchat" type="number" min="0" value="<?=$quantiteAchat?>" required>

            <label for="idUniteQuantite"></label>
<!--            TODO Check la valeur préremplie pour update. -->
            <select name="idUniteQuantite" required>
                <option value="1">Kg</option>
                <option value="2">L</option>
                <option value="3">U</option>
            </select>
        </div>

        <div class="field-ingr">
            <label for="prixHT">Prix d'achat HT en €</label>
            <input name="prixHT" type="number" min="0" value="<?=$prixHT?>" required>
        </div>

        <div class="field-ingr">
<!--            TODO Check la valeur préremplie pour update. -->
            <label for="idTaxe">Taxe en %</label>
            <select name="idTaxe" required>
                <option value="1">5,5</option>
                <option value="2">10</option>
            </select>
        </div>

        <div>
            <input hidden name="idIngredient" value="<?=$idIngredient?>">
            <input type="hidden" name="controller" value="<?=static::$object?>"/>
            <input class="envoyer" type="submit" value="Envoyer"/>
        </div>

    </form>
</div>
