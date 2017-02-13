<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



//$opciones = array(
//    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
//);
//$dsn = "mysql:host=$host;dbname=$base";
//try {
//    $pdo = new PDO($dsn, $user, $clave, $opciones)
//            or die('No se pudo conectar: ' . mysql_error());
//    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//} catch (PDOException $ex) {
//    echo $ex->getMessage();
//    die();
//}

//echo 'Connected successfully';

class BaseDatos {

//    private $url = " ";
    public $db;   // handle of the db connexion    

//    private static $dns = "mysql:host=localhost;dbname=northwind";
//    private static $user = "user";
//    private static $pass = "password";
    private static $instance;

    public function __construct() {
        $url = $_SERVER['SERVER_NAME'];
        if ($url == 'localhost') {
            $host = "localhost";
            $user = "root";
            $clave = "";
            $base = "mah";
        } else {
            $host = "localhost";
            $user = "informac_mah";
            $clave = "qwedcxz123";
            $base = "informac_mah";
        }

        $opciones = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        );

        $dns = "mysql:host=$host;dbname=$base";
        try {
            $this->db = new PDO($dns, $user, $clave, $opciones);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            die();
        }
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $object = __CLASS__;
            self::$instance = new $object;
        }
        return self::$instance;
    }

}
