<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require('clases/conexion.php');
$pdo=new Conexion();
//Obtenemos los datos del formulario de registro

$fechasiembra = $_POST['fechasiembra'];
$superficie = $_POST['superficie'];
$fechacosecha = $_POST['fechacosecha'];
$produccionestimada= $_POST['produccionestimada'];
$medida = $_POST['medida'];
$idproducto = $_POST['idproducto'];
$observacion = $_POST['observacion'];
$idpersona=$_SESSION['idpersona'];
//Filtro anti-XSS
$fechasiembra = htmlspecialchars(mysql_real_escape_string($fechasiembra));
$fechacosecha=htmlspecialchars(mysql_real_escape_string( $fechacosecha));
$produccionestimada = htmlspecialchars(mysql_real_escape_string($superficie));
$apellido = htmlspecialchars(mysql_real_escape_string($produccionestimada));
$medida = htmlspecialchars(mysql_real_escape_string($medida));
$idproducto= htmlspecialchars(mysql_real_escape_string($idproducto));
$observacion = htmlspecialchars(mysql_real_escape_string($observacion));

if (!empty($idpersona)) {


    $consulta = $pdo->prepare("INSERT INTO PRODUCTO_OFERTA (idpersona,idproducto,fechasiembra,fechacosecha,superficie"
            . ",produccionestimada,medida,observacion)" .
            "VALUES (:idpersona,:idproducto,:fechasiembra,:fechacosecha,:superficie"
            . ",:produccionestimada,:medida,:observacion)");
    $consulta->bindparam(':idpersona', $idpersona);
    $consulta->bindparam(':idproducto', $idproducto);
    $consulta->bindparam(':fechacosecha', $fechacosecha);
    $consulta->bindparam(':fechasiembra', $fechasiembra);
    $consulta->bindparam(':superficie', $superficie);
    $consulta->bindparam(':produccionestimada', $produccionestimada);
    $consulta->bindparam(':medida', $medida);
    $consulta->bindparam(':observacion', $observacion);
    $consulta->execute();



//	echo $consulta;
    //Si los datos se introducen correctamente, mostramos los datos
    //Sino, mostramos un mensaje de error, GeomFromText($area)
    if ($consulta->rowCount() > 0) {
        $ok = TRUE;
        die('Registrado con éxito <br>' .
                'Se a modificado el Perfil<br>');
    } else {
        $ok = FALSE;
        die($consulta);
    }
} else if($_POST['boton']=="modificar") {
//    $Actualizar = $pdo->prepare("update `personas` 
//            set nombre =:nombre ,
//            apellido=:apellido ,
//            nacimiento= :nacimiento,
//            mail=:mail ,
//            telefono= :telefono,
//            direccion= :direccion,
//            documento=:documento 
//            where idpersona=:idpersona ");
//    $Actualizar->bindparam(':nombre', $nombre);
//    $Actualizar->bindparam(':apellido', $apellido);
//    $Actualizar->bindparam(':nacimiento', $nacimiento);
//    $Actualizar->bindparam(':mail', $mail);
//    $Actualizar->bindparam(':telefono', $telefono);
//    $Actualizar->bindparam(':direccion', $direccion);
//    $Actualizar->bindparam(':documento', $documento);
//    $Actualizar->bindparam(':idpersona',$idpersona  );
//    $Actualizar->execute();

    //Si los datos se introducen correctamente, mostramos los datos
    //Sino, mostramos un mensaje de error, GeomFromText($area)
    if ($Actualizar) {
        $ok = TRUE;
        die('Registrado con éxito <br>' .
                'Se a modificado el Perfil<br>');
    } else {
        $ok = FALSE;
        die($Actualizar);
    }
}
//if ($ok) {
//    $_SESSION['nombre'] = $nombre;
//}

