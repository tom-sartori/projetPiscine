<?php

require_once 'Model.php';


class ModelIngredient extends Model {

    protected static $tableName = 'ingredient';
    protected static $primaryKey = 'idIngredient';
    protected static $nomAllergene = 'nomIngredient';

}

?>