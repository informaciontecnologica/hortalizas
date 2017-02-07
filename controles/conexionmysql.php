<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
$dsn = "mysql:host=$host;dbname=$base";
try {
$pdo = new PDO($dsn, $user, $clave, $opciones)
        or die('No se pudo conectar: ' . mysql_error());
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 } catch(PDOException $ex) {
       echo $ex->getMessage();
       die();
    }
//echo 'Connected successfully';
