<?php

$isUpdate = $_GET['action'] == 'update';
if ($isUpdate) {
    $idIngredient = $_GET['idIngredient'];
}


?>


<h1> <?=$isUpdate?'Modifier':'Ajouter'?> un ingrédient </h1>

<div>

    <form method="post" action="index.php?controller=<?=static::$object?>&action=<?=$isUpdate?'updated':'created' ?>">

        <div class="field-ingr">
            <label for="nomIngredient">Nom de l'ingrédient </label>
            <input name="nomIngredient" type="text" value="<?=$nomIngredient?>" required>
        </div>

        <div class="field-ingr">
            <label for="idCategorieIngredient">Catégorie de l'ingrédient </label>
            <select name="idCategorieIngredient" required>
                <option value="" selected disabled>--Choisir une catégorie--</option>
                <?php
                    // Recherche de toutes les catégories d'ingrédientss en bd, afin de remplir le <select>.
                    foreach ($tabCategorieIngredient as $categorieIngredient) {
                        $spe_idCategorieIngredient = htmlspecialchars($categorieIngredient->get('idCategorieIngredient'));
                        $spe_nomCategorieIngredient = htmlspecialchars($categorieIngredient->get('nomCategorieIngredient'));
                        $selected = ($idCategorieIngredient == $spe_idCategorieIngredient) ? 'selected' : '';
                        echo '<option value="' . $spe_idCategorieIngredient . '" ' . $selected . '>' . $spe_nomCategorieIngredient . '</option>';
                    }
                ?>
            </select>
        </div>

        <div class="field-ingr">
            <label for="idAllergene">Contient-il un ou des allergène(s) ?</label>
            <select name="idAllergene" required>
                <?php
                // Recherche de tous les allergènes en bd, afin de remplir le <select>.
                foreach ($tabAllergene as $allergene) {
                    $spe_idAllergene = htmlspecialchars($allergene->get('idAllergene'));
                    $spe_nomAllergene = htmlspecialchars($allergene->get('nomAllergene'));
                    $selected = ($idAllergene == $spe_idAllergene) ? 'selected' : '';
                    echo '<option value="' . $spe_idAllergene . '" ' . $selected . '>' . $spe_nomAllergene . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="field-ingr">
            <label for="quantiteAchat">Quantité à l'achat</label>
            <input name="quantiteAchat" type="number" step="0.01" min="0" value="<?=$quantiteAchat?>" required>

            <label for="idUniteQuantite"></label>
            <select class="unité" name="idUniteQuantite" required>
                <?php
                // Recherche de tous les allergènes en bd, afin de remplir le <select>.
                foreach ($tabUniteQuantite as $uniteQuantite) {
                    $spe_idUniteQuantite = htmlspecialchars($uniteQuantite->get('idUnite'));
                    $spe_nomUniteQuantite = htmlspecialchars($uniteQuantite->get('nomUnite'));
                    $selected = ($idUniteQuantite == $spe_idUniteQuantite) ? 'selected' : '';
                    echo '<option value="' . $spe_idUniteQuantite . '" ' . $selected . '>' . $spe_nomUniteQuantite . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="field-ingr">
            <label for="prixHT">Prix d'achat HT en €</label>
            <input name="prixHT" type="number" step="0.01" min="0" value="<?=$prixHT?>" required>
        </div>

        <div class="field-ingr">
            <label for="idTaxe">Taxe en %</label>
            <select name="idTaxe" required>
                <?php
                // Recherche de toutes les valeurs de taxes en bd, afin de remplir le <select>.
                foreach ($tabTaxe as $taxe) {
                    $spe_idTaxe = htmlspecialchars($taxe->get('idTaxe'));
                    $spe_montantTaxe = htmlspecialchars($taxe->get('montantTaxe'));
                    $selected = ($idTaxe == $spe_idTaxe) ? 'selected' : '';
                    echo '<option value="' . $spe_idTaxe . '" ' . $selected . '>' . $spe_montantTaxe . '</option>';
                }
                ?>
            </select>
        </div>

        <div >
            <input hidden name="idIngredient" value="<?=$idIngredient?>">
            <input type="hidden" name="controller" value="<?=static::$object?>"/>
            <div class="field-ingr">
                <input class="submit" type="submit" value="Envoyer"/>
            </div>
        </div>

    </form>
</div>
