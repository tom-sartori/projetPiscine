<?php

require_once '../config/Conf.php';

class Model {

    public static $pdo;

    public static function Init()
    {

        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();

        try {
            // Connexion à la base de données
            // Le dernier argument sert à ce que toutes les chaines de caractères
            // en entrée et sortie de MySql soit dans le codage UTF-8
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            // On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // affiche un message d'erreur
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    public static function selectAll () {
        $sql = 'SELECT * FROM ' . static::$tableName . ';';
        $req = Model::$pdo->query($sql);
        $req->setFetchMode(PDO::FETCH_OBJ);
        return $req->fetchAll();
    }

    public static function selectAllOrderer ($order) {
        // FIXME Preparer
        $sql = 'SELECT * FROM ' . static::$tableName . ' ORDER BY ' . $order . ';';
        $req = Model::$pdo->query($sql);
        $req->setFetchMode(PDO::FETCH_OBJ);
        return $req->fetchAll();
    }

    public static function delete ($id) {
        $sql = 'DELETE FROM ' . static::$tableName . ' WHERE ' . static::$primaryKey . ' =:valId';

        try {
            $req_prep = Model::$pdo->prepare($sql);
            $value = array(
                "valId" => $id
            );
            $req_prep->execute($value);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return 0;
        }
        return 1;
    }
}

Model::Init();

?>