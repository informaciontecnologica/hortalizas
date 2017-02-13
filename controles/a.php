<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "conexionmysql.php"; 


$cc = BaseDatos::getInstance(); 
        $sql = "SELECT * from rubro";        
        $result = $cc->db->prepare($sql); 
        
        $result->execute(); 
        while($affected_rows = $result->fetch()) 
        {
            echo $affected_rows['rubro'];
        }