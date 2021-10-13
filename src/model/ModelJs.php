<?php
require_once 'Model.php';

class ModelJs{

    public static function selectAll($table_name){
        $rep = Model::$pdo->query('Select * from ' . $table_name);
        $rep->setFetchMode(PDO::FETCH_OBJ);
        return json_encode($rep->fetchAll());
    }
}

if(isset($_POST['request']) && isset($_POST['object'])){
    $request = $_POST['request'];
    if($request=="selectAll"){
        echo ModelJs::selectAll($_POST['object']);
    }
}

?>