--Requête qui retourne les ingrédients contenant des allergènes,
--pour une recette donnée

SELECT Recette.idRecette, ingredient.idIngredient, ingredient.nomIngredient
FROM ingredient,Recette,recetteIngredient
WHERE (Recette.id=recetteIngredient.idRecette) AND (recetteIngredient.idIngredient=ingredient.idIngredient)
AND idIngredient IN (SELECT id FROM INGREDIENT WHERE idAllergene !=0;) AND Recette.idRecette = $idRecette



