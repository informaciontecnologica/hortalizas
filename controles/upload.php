<?php

session_start();

include '../controles/conexion.php';

$idpersona = $_POST['idpersona'];
$nombre = $_SESSION['nombre'];

$filenombre = $nombre.$idpersona;
     
$nombre_carpeta =  "imagenes/front-end/avatar";

if (!is_dir($nombre_carpeta)) {
    mkdir($nombre_carpeta, 0777);
} else {
    echo "Ya existe ese directorio\n";
// extraer extension del archivo
    $imageFileType = pathinfo(basename($_FILES["file"]["name"]), PATHINFO_EXTENSION);
    $imagen = $imageFileType;
    $target_file = $nombre_carpeta . "/" . $filenombre . "." . $imagen;
    echo $target_file;
}

$imagen = $filenombre . "." . $imageFileType;

//basename($_FILES["file"]["name"]);
// Check if image file is a actual image or fake image

if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["file"]["size"] > 350000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

//
//// Check if $uploadOk is set to 0 by an error

if ($uploadOk > 0) {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file " . basename($nombre_carpeta . $_FILES["file"]["name"]) . " has been uploaded./n $target_file ";
        $ok = 1;
    } else {
        echo "Sorry, there was an error uploading your file.";
        $ok = 2;
    }
}

if ($ok == 1) {

    if ($uploadOk == 2) {
        $pdo = new Conexion();

        $consulta = "update foto 
            set 
            foto =:foto  
            where idpersona=:idpersona ";

        $actualizar = $pdo->prepare($consulta);
        $consulta = bindparam(":idpersona", $idpersona);
        $consulta = bindparam(":foto", $filenombre);
        $consulta->excute();
        //Si los datos se introducen correctamente, mostramos los datos
        //Sino, mostramos un mensaje de error, GeomFromText($area)
        if (mysql_query($consulta)) {
            die('Registrado con éxito <br>' .
                    'Se a modificado <br>');
        } else {
            die($consulta);
        }
    }
    if ($uploadOk == 1) {
        $pdo = new Conexion();

        $sql = "INSERT INTO foto (idpersona,foto) values (:idpersona,foto)";
        $alta = $pdo->prepare($sql);
        $alta = bindparam(':idpersona', $idpersona);
        $alta = bindparam(':foto', $filenombre);
        $alta->execute();
        //Si los datos se introducen correctamente, mostramos los datos
        //Sino, mostramos un mensaje de error, GeomFromText($area)
        if (mysql_query($consulta)) {
            die('Registrado con éxito <br>' .
                    'Se a modificado el Perfil<br>');
        } else {
            die($consulta);
        }
    }
}
