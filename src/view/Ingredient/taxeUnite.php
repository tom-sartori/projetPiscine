<?php

$object = 'Taxe';

echo <<< EOT
<div id="div{$object}">
    <div id="divCreation{$object}">
        <form method="post" action="index.php?controller=Ingredient&action=create{$object}">
            <label for="montant{$object}" >Ajouter une valeure de taxe : </label>
            <input type="number" name="montant{$object}">
            
            <button type="submit">Ajouter</button>
        </form>
    </div>
EOT;


echo '<p>Attention, la modification d\'une de ces valeurs, la modifiera pour tous les ingrédients. </p>';

foreach ($tabTaxe as $taxe) {
    $spe_idTaxe = $taxe->get('idTaxe');
    $spe_montantTaxe = $taxe->get('montantTaxe');

    echo <<< EOT
        <div id="divList{$object}">
            <ul>
                <li class="listeEspace">
                    <form method="post" action="index.php?controller=Ingredient&action=update{$object}">
                        <button class="buttonCheckSize">
                            <img class = "iconCheck" src="image/check.png" alt="Valider"/> </button>
                        </button> 
                
                        <input hidden name="id{$object}" value="$spe_idTaxe">
                        <input type="text" name="montant{$object}" value="{$spe_montantTaxe}">
                    </form>
                </li>
            </ul>
        </div>
EOT;
}

echo '</div>';
?>

<?php

$object = 'Unite';

echo <<< EOT
<div id="div{$object}">
    <div id="divCreation{$object}">
        <form method="post" action="index.php?controller=Ingredient&action=create{$object}">
            <label for="nom{$object}" >Ajouter une unité : </label>
            <input type="text" name="nom{$object}">
            
            <button type="submit">Ajouter</button>
        </form>
    </div>
EOT;


echo '<p>Attention, la modification d\'une de ces valeurs, la modifiera pour tous les ingrédients. </p>';

foreach ($tabUnite as $unite) {
    $spe_idUnite = $unite->get('idUnite');
    $spe_nomUnite = $unite->get('nomUnite');

    echo <<< EOT
        <div id="divList{$object}">
            <ul>
                <li class="listeEspace">
                    <form method="post" action="index.php?controller=Ingredient&action=update{$object}">
                        <button class="buttonCheckSize">
                            <img class = "iconCheck" src="image/check.png" alt="Valider"/> </button>
                        </button> 
                        
                        <input hidden name="id{$object}" value="$spe_idUnite">
                        <input type="text" name="nom{$object}" value="{$spe_nomUnite}">
                    </form>
                </li>
            </ul>
        </div>
EOT;
}

echo '</div>';
?>
