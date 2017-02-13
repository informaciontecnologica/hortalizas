<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'conexionmysql.php';




    
    $consulta1=$pdo->prepare("select * from rubro");
    $consulta1->execute();
    while ($rubros=$consulta1->fetch()){
    echo $rubros['rubro']."  <input type = \"checkbox\" name = \"".$rubros['rubro']."\" value = \"ON\" /><br/>";
    }
