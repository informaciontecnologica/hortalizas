<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require('conexionmysql.php');

//Obtenemos los datos del formulario de registro
$mail = $_POST['mail'];
if (empty($_POST['idpersonas'])) {
    $idpersonas = $_POST['idpersonas'];
} else {
    $idpersonas = $_POST['idpersonas'];
}

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$documento = $_POST['documento'];
$idusuario = $_POST['idusuario'];
$nacimiento = $_POST['nacimiento'];
//                     $idciudad=$_POST['idciudad'] ;
//                     $idprovincia=$_POST['idprovincia'] ;
//Filtro anti-XSS
$mail = htmlspecialchars(mysql_real_escape_string($mail));
//                     $idpersonas=htmlspecialchars(mysql_real_escape_string( $idpersonas));
$nombre = htmlspecialchars(mysql_real_escape_string($nombre));
$apellido = htmlspecialchars(mysql_real_escape_string($apellido));
$telefono = htmlspecialchars(mysql_real_escape_string($telefono));
$direccion = htmlspecialchars(mysql_real_escape_string($direccion));
$documento = htmlspecialchars(mysql_real_escape_string($documento));


echo $documento;

//ve si existe el numero de documento en la tabla personas
$consultaUsuarios = $pdo->prepare("select * from `personas` where documento=:documento");
$consultaUsuarios->bindparam(':documento', $documento);
$consultaUsuarios->execute();
if ($consultaUsuarios->rowCount() > 0) {
    $ExistDocumento = true;
    $datosConsultaUsuarios = $consulta->fetch();
    $documento1 = $datosConsultaUsuarios['documento'];
}


//Si el input de usuario o contraseña está vacío, mostramos un mensaje de error
//Si el valor del input del usuario es igual a alguno que ya exista, mostramos un mensaje de error
if (empty($_POST['idpersonas'])) {


    $consulta = $pdo->prepare("INSERT INTO `personas` (nombre,apellido,nacimiento,
            mail,telefono,direccion,documento,idusuario)" .
            "VALUES (:nombre,:apellido,:nacimiento,:mail,:telefono,:direccion,:documento,:idusuario)");
    $consulta->bindparam(':nombre', $nombre);
    $consulta->bindparam(':apellido', $apellido);
    $consulta->bindparam(':nacimiento', $nacimiento);
    $consulta->bindparam(':mail', $mail);
    $consulta->bindparam(':telefono', $telefono);
    $consulta->bindparam(':direccion', $direccion);
    $consulta->bindparam(':documento', $documento);
    $consulta->bindparam(':idusuario', $idusuario);
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
} else {
    $Actualizar = $pdo->prepare("update `personas` 
            set nombre =:nombre ,
            apellido=:apellido ,
            nacimiento= :nacimiento,
            mail=:mail ,
            telefono= :telefono,
            direccion= :direccion,
            documento=:documento 
            where idpersonas=:idpersonas ");
    $consulta->bindparam(':nombre', $nombre);
    $consulta->bindparam(':apellido', $apellido);
    $consulta->bindparam(':nacimiento', $nacimiento);
    $consulta->bindparam(':mail', $mail);
    $consulta->bindparam(':telefono', $telefono);
    $consulta->bindparam(':direccion', $direccion);
    $consulta->bindparam(':documento', $documento);
    $consulta->bindparam(':idpersonas', $idpersonas);
    $consulta->execute();

    //Si los datos se introducen correctamente, mostramos los datos
    //Sino, mostramos un mensaje de error, GeomFromText($area)
    if ($consulta->rowCount()) {
        $ok = TRUE;
        die('Registrado con éxito <br>' .
                'Se a modificado el Perfil<br>');
    } else {
        $ok = FALSE;
        die($consulta);
    }
}
if ($ok) {
    $_SESSION['nombre'] = $nombre;
}

