#!/bin/bash

fichierNom=nom.txt; 
fichierPrix=prix.txt;
fichierPrixInter=prixInter.txt; 
fichierPrixFixed=prixFixed.txt; 
fichierUnit=unit.txt;  
fichierResult=result.txt; 
fichierCatego=catego.txt; 

qttAchat=1;
idTva=2; 
idAllergene=0;

sed "s/\€//g" < $fichierPrix > $fichierPrixInter
sed "s/\,/./g" < $fichierPrixInter > $fichierPrixFixed 

nbLigne=$(less $fichierNom | wc -l);
echo $nbLigne; 

echo ' ' > $fichierResult; 

for (( i=1; i <= $(($nbLigne+1)); ++i ))
do
	text='INSERT INTO `ingredient` (`idIngredient`, `nomIngredient`, `quantiteAchat`, `idUniteQuantite`, `prixHT`, `idTaxe`, `idCategorieIngredient`, `idAllergene`) VALUES (NULL, '; 
	text="${text} '"; 
	text="${text} $(head -n $i $fichierNom | tail -n 1)"; 
	text="${text} ', '${qttAchat}', '"; 
	text="${text} $(head -n $i $fichierUnit | tail -n 1)"; 
	text="${text} ', '"; 
	text="${text} $(head -n $i $fichierPrixFixed | tail -n 1)"; 
	text="${text} ', '${idTva}', '"; 
	text="${text} $(head -n $i $fichierCatego | tail -n 1)"; 
	text="${text} ', '${idAllergene}');"; 
	echo $text >> $fichierResult; 
done


