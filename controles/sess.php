<?php

session_start();
include 'conexionmysql.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ((isset($_POST['mail'])) and ( isset($_POST['password'])) and ( $_POST['password'] != '') and ( $_POST['mail'] != '')) {
        $password = $_POST['password'];
        $mail = $_POST['mail'];

        $consulta = $pdo->prepare("Select * from usuario  where mail=:mail and clave=:clave");
        $consulta->bindparam(':mail', $mail);
        $consulta->bindparam(':clave', md5($password));
        $consulta->execute();

        if ($consulta->rowCount() > 0) {
            while ($resultados = $consulta->fetch()) {
                $_SESSION['usuario'] = $resultados['mail'];
                $_SESSION['idusuario'] = $resultados['idusuario'];
                $_SESSION['mail'] = $resultados['mail'];
                $_SESSION['perfil'] = $resultados['id_perfil'];
//              $_SESSION['userAgent'] = $_SERVER['HTTP_USER_AGENT'];
                $_SESSION['SKey'] = uniqid(mt_rand(), true);
                $_SESSION['start'] = time(); // Taking now logged in time.
//////         // Ending a session in 30 minutes from the starting time.
                $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
//              $_SESSION['LastActivity'] = $_SERVER['REQUEST_TIME'];
//              $ip = !empty($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR'];
//              $_SESSION['IPaddress'] = $ip;

                $Consultaper = $pdo->prepare("select * from personas p  where idusuario=:idusuario");
                $Consultaper->bindparam(':idusuario', $_SESSION['idusuario']);
                $Consultaper->execute();


                if ($Consultaper->rowCount() > 0) {
                    $Regpersonas = $Consultaper->fetch();
                    $_SESSION['nombre'] = $Regpersonas['nombre'];
                    if (isset($Regpersonas['nombre'])) {
                        $_SESSION['idpersona'] = $Regpersonas['idpersona'];
                        $Consulrubro = $pdo->prepare("select * from personas_rubro pr join rubro r on pr.idrubro=r.idrubro  where idpersona=:idpersona");
                        $Consulrubro->bindparam(':idpersona', $Regpersonas['idpersona']);
                        $Consulrubro->execute();
                        if ($Consultaper->rowCount()){
                            echo "hay";
                            foreach ($Consultaper->fetch()as $rubro){
                             $_session['rubro'][]=$rubro['idrubro'];
                             echo $rubro['idrubro'];
                            
                                
                            }
                        }
                        $persona = TRUE;
                    } else {
                        $persona = FALSE;
                    }
                    header("location: ../index.php");
                    exit;
                } else {

                    header("location: ../vistas/perfil.php");
                    exit;
                }
            }
        } else {
            header("location: ../vistas/errorsession.php");
            exit;
        }
        mysql_free_result($seleccion);
    }
} 
  