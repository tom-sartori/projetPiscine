<?php

require_once 'Model.php';


class ModelRecette extends Model {

    protected static $tableName = 'recette';
    protected static $primaryKey = 'idRecette';
    protected static $nomAllergene = 'nomRecette';

}

?>