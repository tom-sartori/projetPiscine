<?php
class Conf {

  // la variable debug est un boolean
    static private $debug = True;

    static public function getDebug() {
    	return self::$debug;
    }

  static private $databases = array(
    // Le nom d'hote de la base de données
    'hostname' => 'localhost',
    // Le nom de la BDD
    'database' => '...',
   // login du PHPmyAdmin
    'login' => '...',
   //password du PHPmyAdmin 
    'password' => '...'
  );

  static public function getLogin() {
    return self::$databases['login'];
  }

  static public function getHostname(){
    return self::$databases['hostname'];
  }

  static public function getDatabase(){
      return self::$databases['database'];
  }

  static public function getPassword(){
    return self::$databases['password'];
  }

}
