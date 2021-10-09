<?php

class Conf {

    static private $debug = True;

    static public function getDebug() {
    	return self::$debug;
    }

    private static $database = array(
        'hostname' => 'localhost',
        'database' => 'projetPiscine',
        'login'    => 'root',
        'password' => ''
    );

  static public function getLogin() {
    return self::$database['login'];
  }

  static public function getHostname(){
    return self::$database['hostname'];
  }

  static public function getDatabase(){
      return self::$database['database'];
  }

  static public function getPassword(){
    return self::$database['password'];
  }

}
