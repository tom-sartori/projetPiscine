# projetPiscine

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ajouter un ingrédient</title>
    <link rel="stylesheet" href="baseCss.css" type="text/css">
</head>
<body>
<form action="" method="get">
    <div>
        <label for="name">Quel ingrédient souhaitez-vous ajouter ?</label>
        <input type="text" name="name" id="name" required>
    </div>

    <div>
        <label for="categorie">A quelle catégorie cet ingrédient appartient-il ?</label>
        <select id="categorie" required>
            <option value="">--Choisir une catégorie--</option>
            <option value="fruit"> Fruit </option>
            <option value="légume"> Légumes </option>
            <option value="viande"> Viande </option>
            <option value="fécul"> Féculents </option>
            <option value="prodlait"> Produits laitiers </option>
        </select>
    </div>

    <div>
        <label for="allergene">Contient-il un ou des allergène(s) ?</label>
        <select id="allergene" required>
            <option value="allerg0"> Non </option>
            <option value="allerg1"> Oeuf </option>
            <option value="allerg2"> Lait de vache </option>
            <option value="allerg3"> Arachide </option>
            <option value="allerg4"> Blé </option>
            <option value="allerg5"> Fruits à coque </option>
            <option value="allerg6"> Soja </option>
            <option value="allerg7"> Fruits de mer ou crustacés </option>
            <option value="allerg8"> Fruit ou légume </option>
        </select>
    </div>

    <div>
        <label for="quantite">Quantité à l'achat</label>
        <input type="number" min="0" id="quantite">
        <select id="unite" required>
            <option value="litre"> L </option>
            <option value="kilog"> kg </option>
        </select>
    </div>

    <div>
        <label for="prix">Prix d'achat HT</label>
        <input type="number" min="0" id="prix" required> €
    </div>

    <div>
        <label for="taxe">Taxe</label>
        <input type="number" min="0" id="taxe" value="20" required> %
    </div>

    <div>
        <input type="submit" value="Ajouter l'ingrédient">
    </div>
</form>
</body>
</html>
