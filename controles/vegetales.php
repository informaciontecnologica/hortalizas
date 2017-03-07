<?php

session_start();
include 'clases/conexion.php';
$pdo = new Conexion();

$sql = "SELECT * FROM vegetales ";
$consultavegetales = $pdo->prepare($sql);

$consultavegetales->execute();
$row = $consultavegetales->fetchAll();
//  while ($resultados = $consultavegetales->fetch()){
//      $row[]=$resultados;
//  }
$da = array("vegetales" => $row);
echo json_encode($row);
