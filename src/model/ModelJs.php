<?php
require_once 'Model.php';

class ModelJs{

    public static function selectAll($table_name){
        $rep = Model::$pdo->query('Select * from ' . $table_name);
        $rep->setFetchMode(PDO::FETCH_OBJ);
        return json_encode($rep->fetchAll());
    }

    public static function select($table_name,$primary_key,$primary_value){
        if($table_name=="ingredient"){
            $sql = "SELECT I.idIngredient, I.nomIngredient, I.quantiteAchat, UQ.nomUnite, I.prixHT, T.montantTaxe, CI.nomCategorieIngredient, A.nomAllergene
                    FROM ingredient I
                    JOIN uniteQuantite UQ ON UQ.idUnite=I.idUniteQuantite
                    JOIN taxe T ON T.idTaxe=I.idTaxe
                    JOIN categorieIngredient CI ON CI.idCategorieIngredient=I.idCategorieIngredient
                    JOIN allergene A ON A.idAllergene=I.idAllergene
                    WHERE I.idIngredient =:nom_tag";
        }else {
            $sql = "SELECT * from " . $table_name . " WHERE " . $primary_key . "=:nom_tag";
        }
        
        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "nom_tag" => $primary_value,
        );
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_OBJ);
        $tab_gen = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false
        if (empty($tab_gen))
            return false;
        if($table_name == "ingredient"){
            return json_encode($tab_gen[0]);
        } else {
            return $tab_gen[0];
        }
        
    }

    public static function saveRecette($data){
        $data = json_decode($data,true);
        $sql = "INSERT INTO `recette` (`idRecette`, `nomRecette`, `nbCouvert`, `descriptif`, `coefficient`, `chargeSalariale`) VALUES (NULL, '".$data['nomRecette']."','". $data['nbCouvert']."','". $data['descriptif']."','". $data['coefficient']."','". $data['chargeSalariale']."'); ";
        $idRecette = self::getLastId("idRecette","recette");
        $tabEtape = array();

        foreach($data['tabEtapes'] as $key => $value){
            $sql .= "INSERT INTO `etape` (`idEtape`, `nomEtape`, `description`, `estSousRecette`) VALUES (NULL, '{$value['nom']}', '{$value['description']}', '{$value['sousRecette']}'); ";
            $tabEtape[self::getLastId("idEtape","etape")+1+$key]=$value;
        }
        foreach($tabEtape as $key => $value){
            foreach($value['ingredientlist'] as $key1 => $value1){
                $sql .= "INSERT INTO `asso_etape_ingredient` (`idEtape`, `idIngredient`, `quantite`) VALUES ('{$key}', '{$value1[0]}', '{$value1[1]}'); ";
            }
            $sql .= "INSERT INTO `asso_recette_etape` (`idRecette`, `idEtape`, `ordre`) VALUES ('{$idRecette}', '$key', '{$value['ordre']}'); ";
        }

        foreach($data['auteurs'] as $key => $value){
            $sql .= "INSERT INTO `asso_recette_utilisateur` (`idRecette`, `loginUtilisateur`) VALUES ('{$idRecette}', '{$value}'); ";
        }


        $sql = substr($sql, 0, -1);
        try {
            $prep = Model::$pdo->prepare($sql);
            $prep->execute();
        } catch (PDOException $e) {
            echo "L'insertion dans la base de données a rencontré cette erreur : <br> ";
            echo "{$e->getMessage()} <br><br>";
            return 0;
        }
        return 1;
    }

    public static function getLastId($object,$table)
    {
        $sql = "SELECT MAX({$object}) FROM {$table} ;";
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_NUM);
        
        return intval($req_prep->fetchAll()[0][0]);
    }

    public static function getAllIDEtapes($idRecette){
        $sql = "SELECT idEtape FROM `asso_recette_etape` WHERE idRecette = {$idRecette}";
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_NUM);
        return $req_prep->fetchAll();
    }

    public static function getAllEtapes($idRecette){
        $tabID = self::getAllIDEtapes($idRecette); //$tabID[nombrederecette][0] = idRecette
        $tabEtape = array();
        foreach($tabID as $key => $value){
            $tabEtape[$key]= get_object_vars(self::select('etape','idEtape',$value[0]));
        }
        for($i=0;$i<count($tabEtape);$i++){
            $tabEtape[$i]['ingredientList']= self::getAllIngredients($tabEtape[$i]['idEtape']);
        }
        $tabRecette  = get_object_vars(self::select('recette','idRecette',$idRecette));
        $tabRecette['tabEtape']=$tabEtape;
        return json_encode($tabRecette);

    }

    public static function getAllIngredients($idEtape){
        $sql = "SELECT a.idIngredient, a.quantite FROM `asso_etape_ingredient` a WHERE a.idEtape={$idEtape}";
        $req_prep = Model::$pdo->prepare($sql);
        $req_prep->execute();
        $req_prep->setFetchMode(PDO::FETCH_NUM);
        $ingredientList = array();
        foreach($req_prep->fetchAll() as $key => $value){
            $ingredientList[$key] = array(
                0 => $value[0], //idIngredient
                1 => $value[1] // quantite
            );;
        }
        return $ingredientList;
    }
}

if(isset($_POST['request']) && isset($_POST['object'])){
    $request = $_POST['request'];
    if($request=="selectAll"){
        echo ModelJs::selectAll($_POST['object']);
    }
    if($request=="selectByID"){
        echo ModelJs::select($_POST['object'],$_POST['primarykey'],$_POST['id']);
    }
    if($request== "saverecette"){
        echo ModelJs::saveRecette($_POST['object']);
    }

    if ($request=="updaterecette"){
        echo ModelJs::getAllEtapes($_POST['object']);
    }
}

?>