<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . "File.php";
require_once File::build_path(array("config", "Conf.php"));

/**
 * Class Model
 *
 * Generic model which make sql request for all others model.
 * Used by controllers which get the data requested.
 */
class Model{
    public static $pdo;

    /**
     * Initialisation of the model with the logs in Conf.php.
     */
    public static function Init() {
        $hostname = Conf::getHostname();
        $database_name = Conf::getDatabase();
        $login = Conf::getLogin();
        $password = Conf::getPassword();

        try {
            // Connexion à la base de données.
            // Le dernier argument sert à ce que toutes les chaines de caractères
            // en entrée et sortie de MySql soient dans le codage UTF-8.
            self::$pdo = new PDO("mysql:host=$hostname;dbname=$database_name", $login, $password,
                array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

            // On active le mode d'affichage des erreurs, et le lancement d'exception en cas d'erreur.
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            if (Conf::getDebug()) {
                echo $e->getMessage(); // Affiche un message d'erreur.
            } else {
                echo 'Une erreur est survenue <a href=""> retour a la page d\'accueil </a>';
            }
            die();
        }
    }

    /**
     * Make a request of type :
     * SELECT * FROM $table_name;
     */
    public static function selectAll() {
        $table_name = static::$nomTable;
        $nomObject = static::$object;
        $class_name = "Model" . ucfirst($nomObject);
        $rep = Model::$pdo->query('SELECT * FROM ' . rawurlencode($table_name));
        $rep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        return $rep->fetchAll();
    }

    /**
     * Make a request of type :
     * SELECT * FROM $table_name WHERE $primary_key = $primaryValue;
     * Return false if the request doesn't works.
     */
    public static function select($primaryValue) {
        $table_name = static::$nomTable;
        $nomObject = static::$object;
        $class_name = "Model" . ucfirst($nomObject);
        $primary_key = static::$primary;
        $sql = "
            SELECT * 
            FROM " . rawurlencode($table_name) . " 
            WHERE " . rawurlencode($primary_key) . "=:nom_tag";

        // Préparation de la requête
        $req_prep = Model::$pdo->prepare($sql);

        $values = array(
            "nom_tag" => rawurlencode($primaryValue),
        );
        $req_prep->execute($values);

        // On récupère les résultats comme précédemment
        $req_prep->setFetchMode(PDO::FETCH_CLASS, $class_name);
        $tab_gen = $req_prep->fetchAll();
        // Attention, si il n'y a pas de résultats, on renvoie false.
        if (empty($tab_gen))
            return false;
        return $tab_gen[0];
    }

    /**
     * Make a request of type :
     * DELETE FROM $table_name WHERE $primary_key = $primaryValue;
     * Return false if the request doesn't works.
     */
    public static function delete($primaryValue) {
        $table_name = static::$nomTable;
        $class_name = "Model" . ucfirst($table_name);
        $primary_key = static::$primary;

        $sql = "DELETE FROM " . rawurlencode($table_name) . " WHERE " . rawurlencode($primary_key) . " =:valeur";

        try {
            $req_prep = Model::$pdo->prepare($sql);
            $value = array(
                "valeur" => rawurlencode($primaryValue)
            );
            $req_prep->execute($value);
        } catch (PDOException $e) {
            echo $e->getMessage();
            return 0;
        }
        return 1;
    }

    /**
     * Make a request of type :
     * UPDATE $table_name SET ($date) WHERE $primary_key = $primaryValue;
     * Return false if the request doesn't works.
     */
    public static function update($data, $primaryValue) {
        $table_name = static::$nomTable;
        $primary_key = static::$primary;
        try {
            $sql = "UPDATE $table_name SET";
            foreach ($data as $key => $value) {
                $raw_value = rawurlencode($value);
                $sql = $sql . " $key='$raw_value' ,";
            }
            $sql = rtrim($sql, ',');
            $sql = $sql . "WHERE $primary_key =:valeur";
            $req_prep = Model::$pdo->prepare($sql);
            $value = array(
                "valeur" => rawurlencode($primaryValue)
            );
            $req_prep->execute($value);
        } catch (PDOException $e) {
            echo " La mise à jour dans la base a rencontré cette erreur : <br>";
            echo "{$e->getMessage()} <br><br>";
            return 0;
        }
        return 1;
    }

    /**
     * Make a request of type :
     * INSERT INTO $table_name ($data) VALUES ($data);
     * Return false if the request doesn't works.
     */
    public static function save($data) {
        $table_name = static::$nomTable;
        $sql = "INSERT INTO $table_name (";
        foreach ($data as $key => $value) {
            $raw_key = rawurlencode($key);
            $sql = $sql . "$raw_key,";
        }
        $sql = rtrim($sql, ',') . ') VALUES(';
        foreach ($data as $key => $value) {
            $raw_value = rawurlencode($value);
            $sql = $sql . "'$raw_value',";
        }
        $sql = rtrim($sql, ',') . ')';


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
}

Model::Init();
?>