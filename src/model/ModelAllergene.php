<?php

require_once 'Model.php';


class ModelAllergene extends Model {

    protected static $tableName = 'allergene';
    protected static $primaryKey = 'idAllergene';
    protected static $nomAllergene = 'nomAllergene';


    public static function update ($id, $nom) {
        try {
            $sql =
                'UPDATE ' . static::$tableName .
                ' SET ' . static::$nomAllergene . ' =:valNom ' .
                ' WHERE ' . static::$primaryKey . ' =:valId; ';

            $req_prep = Model::$pdo->prepare($sql);
            $value = array(
                "valId" => $id,
                'valNom' => $nom
            );
            $req_prep->execute($value);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return 0;
        }
        return 1;
    }

    public static function save ($nom) {
        try {
            $sql =
                'INSERT INTO ' . static::$tableName . ' (' . static::$primaryKey . ' , ' . static::$nomAllergene . ' ) VALUES ( NULL, :valNom );';

            $req_prep = Model::$pdo->prepare($sql);
            $value = array(
                'valNom' => $nom
            );
            $req_prep->execute($value);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return 0;
        }
        return 1;
    }
}

?>