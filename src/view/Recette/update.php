<?php

if($type=='detail'){
    

    echo <<< EOT
        <script type="text/javascript"> 
            const idRecette = "{$idRecette}";
            
        </script>
EOT;


}
if ($type == 'update') {
    echo <<< EOT
        <script type="text/javascript"> 
            const idRecette = "{$idRecette}";
        </script>
EOT;
}

echo <<< EOT
        <script type="text/javascript"> 
            const type = "{$type}";
        </script>
EOT;
?>

<script type="text/javascript" src="js/recetteCreateScript.js" defer></script>

<h1> Ajouter une recette </h1>

<div id="ajoutbox">

    <form method="post" action="index.php?controller=<?= static::$object ?>&action=<?= $isUpdate ? 'updated' : 'created' ?>">
        <div class="headerform">
            <div id="rightheader" class="header1">
                <div class="nomRecette">
                    <label for="nomRecette">Nom de la recette </label>
                    <input name="nomRecette" id="nomRecette" type="text" value="<?= $nomRecette ?>" required>
                </div>
                <div class="auteurRecette">
                    <label for="idUtilisateur[]">Créateur.s </label>
                    <!--        TODO en js get les utilisateurs. -->
                    <!--        TODO possibilité d'ajouter rapidement la valeur souhaitée n'est pas présente dans le select. -->
                    <select id="selectUtilisateurs" name="idUtilisateur[]" multiple>
                        <option disabled selected value="">--Utilisateurs--</option>
                        <!-- <option value="1">User 1</option>
                        <option value="2">User 2</option> -->
                    </select>
                </div>
            </div>
            <div id="leftheader" class="header1">
                <div class="nbcouvert">
                    <label for="nbCouvert">Nombre de couverts </label>
                    <input name="nbCouvert" type="number" min="1" id="nbCouvert" value="<?= $nbCouvert ?>" required>
                </div>
                <div class="categorieRecette">
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
            </div>
        </div>


        <div class="descriptif">
            <input name="descriptif" type="text" id="descriptifRecette" <?= $isUpdate ? "value =\"$descriptif\"" : "placeholder=\"$descriptif\"" ?> required>
        </div>

        <div class="entete">
            <div class="entete_progression">
                <h1>Progression</h1>
            </div>
            <div class="entete_denomination">
                <h1>Dénomination</h1>
            </div>
            <div class="entetevalorisation">
                <div class="entete_valorisation">
                    <h1>Valorisation</h1>
                </div>
                <div class="sousvalorisation">
                    <div class="entetequantite">
                        <h3>Quantité</h3>
                    </div>
                    <div class="enteteUnite">
                        <h3>Unité</h3>
                    </div>
                    <div class="enteteprixUnitaire">
                        <h3>Prix Unitaire</h3>
                    </div>
                    <div class="enteteprixHT">
                        <h3>Prix HT</h3>
                    </div>
                </div>
            </div>
        </div>

        <div id="listetapes">
            <div class="etape" id="etape">
                <div class="descriptifetape">
                    <label for="nomEtape">Nom de l'Étape</label>
                    <input type="text" class="nomEtape">
                    <textarea name="descriptif" type="text" placeholder="descriptif"></textarea>
                    <label for="sourecette">Est-ce une sous recette ?</label>
                    <input type="checkbox" name="sousRecette?" id="sousRecette?">
                </div>
                <div class="informationsEtape">
                    <input class="autreIngredient" type="button" id="buttonAddSelect" value="+">
                    <input class="autreIngredient" type="button" id="buttonDeleteSelect" value="-">
                    <div class="ingredient" id="ingredient0">
                        <div class="denomationIngredient"></div>
                        <div class="valorisationIngredient">
                            <div class="quantiteIngredient">
                                <input type="number" min="0" class="quantiteIngredientInput" id="quantiteIngredient" required>
                            </div>
                            <div class="uniteIngredient">unite</div>
                            <div class="prixUniteIngredient">prixUnitaire</div>
                            <div class="prixHTIngredient">prixHt</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="buttonsaddEtape">
            <input type="button" value="Nouvelle Étape" onclick="createNewEtape()">
            <input type="button" value="Supprimer la dernière étape" onclick="deleteLastEtape()">
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
            <label for="coefficient">Coefficient multiplicateur </label>
            <input name="coefficient" id="coefficientRecette" type="number" min="1" value="<?= $coefficient ?>" required>
        </div>

        <div>
            <label for="chargeSalariale">Prix de la charge salariale en € </label>
            <input name="chargeSalariale" id="chargeSalariale" type="number" min="0" value="<?= $chargeSalariale ?>" required>
        </div>

        <div id="totalRecette">
            <label for="total">Total de la recette : </label>
            <label for="totalPrix"></label>
        </div>

        <div>
            <input hidden name="idRecette" value="<?= $idRecette ?>">
            <input type="hidden" name="controller" value="<?= static::$object ?>" />
            <input type="button" id="ajouterButton" value="ajouter">
        </div>
    </form>
</div>