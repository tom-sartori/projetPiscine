<?php

$isUpdate = $_GET['action'] == 'update';
if ($isUpdate) {
    $idRecette = $_GET['idRecette'];
}

?>


<h1> Ajouter une recette </h1>

<div class ="ajoutbox">

    <form method="post" action="index.php?controller=<?=static::$object?>&action=<?=$isUpdate?'updated':'created' ?>">
        <div>
            <label for="nomRecette">Nom de la recette </label>
            <input name="nomRecette" type="text" value="<?=$nomRecette?>" required>
        </div>

        <div>
            <label for="nbCouvert">Nombre de couverts </label>
            <input name="nbCouvert" type="number" min="1" value="<?=$nbCouvert?>" required>
        </div>

        <div>
            <label for="descriptif">Descriptif </label>
            <input name="descriptif" type="text" value="<?=$descriptif?>" required>
        </div>

        <div>
            <label for="coefficient">Coefficient multiplicateur </label>
            <input name="coefficient" type="number" min="1" value="<?=$coefficient?>" required>
        </div>

        <div>
            <label for="chargeSalariale">Prix de la charge salariale en € </label>
            <input name="chargeSalariale" type="number" min="0" value="<?=$chargeSalariale?>" required>
        </div>

        <div>
<!--            TODO Pouvoir selectionner plusieures catégories pour une recette. -->
            <label for="idCategorieRecette[]">Catégorie.s de la recette </label>
<!--            TODO En js get les catégories de recette. -->
<!--        TODO possibilité d'ajouter rapidement la valeur souhaitée n'est pas présente dans le select. -->
            <select name="idCategorieRecette[]" multiple required>
                <option disabled selected value="">--Catégories--</option>
                <option value="1">Entrée</option>
                <option value="2">Plat principal</option>
                <option value="3">Dessert</option>
                <option value="4">Viande</option>
            </select>
        </div>

        <div>
<!--            <label for="idIngredient[]">Ingrédients nécessaires à la recette </label>-->
<!--        TODO en js get les ingrédients. -->
<!--        TODO en js recherche des ingrédients. -->
<!--        TODO possibilité d'ajouter rapidement la valeur souhaitée n'est pas présente dans le select. -->
<!--            <select name="idIngredient[]" multiple>-->
<!--                <option disabled selected value="">--Ingrédients--</option>-->
<!--                <option value="1">Epaule d'agneau sans os</option>-->
<!--                <option value="2">Filet de poulet</option>-->
<!--                <option value="3">Chorizo doux</option>-->
<!--            </select>-->
        </div>

        <div>
            <label for="idUtilisateur[]">Créateur.s </label>
    <!--        TODO en js get les utilisateurs. -->
    <!--        TODO possibilité d'ajouter rapidement la valeur souhaitée n'est pas présente dans le select. -->
            <select name="idUtilisateur[]" multiple>
                <option disabled selected value="">--Utilisateurs--</option>
                <option value="1">User 1</option>
                <option value="2">User 2</option>
            </select>
        </div>

        <div>
            <input hidden name="idRecette" value="<?=$idRecette?>">
            <input type="hidden" name="controller" value="<?=static::$object?>"/>
            <button type="submit">Ajouter</button>
        </div>
    </form>
</div>