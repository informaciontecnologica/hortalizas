<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include'../cabezera.php';
        ?><script src="../js/perfil.js" type="text/javascript"></script>
    </head>
    <body>
        
        <header>
            <?php include '../barra.php'; ?> 
        </header> 
        <div class="container">


            <?php
            include '../controles/clases/conexion.php';
            $pdo = new Conexion();
            if ((isset($_GET['id'])) && (!empty($_GET['id']))) {
                $id = $_GET['id'];
            } else {
                $id = $_SESSION['idusuario'];
                $mail = $_SESSION['mail'];
            }
            $Verusuario = $pdo->prepare("select * from personas p  where idusuario=:id");
            $Verusuario->bindparam(':id', $id);
            $Verusuario->execute();


            if ($Verusuario->rowCount() > 0) {

                $registro = $Verusuario->fetch();

                if (isset($registro['idpersona'])) {
                    if ((!isset($_GET['id']))) {
                        $_SESSION['idpersona'] = $registro['idpersona'];
                    }
                }
                $mail = $registro['mail'];
                $idpersona = $registro['idpersona'];
                $nombre = $registro['nombre'];
                $apellido = $registro['apellido'];
                $nacimiento = $registro['nacimiento'];
                if ($nacimiento == "0000-00-00")
                    $nacimiento = '';

                $telefono = $registro['telefono'];
                $direccion = $registro['direccion'];
                $documento = $registro['documento'];
//                     $idciudad=$registro['idciudad'] ;
//                     $idprovincia=$registro['idprovincia'] ;
//                     $area=$registro['area'] ;
            } else {
                $idpersonas = "";
                $nombre = "";
                $apellido = "";
                $nacimiento = "";
                $telefono = "";
                $direccion = "";
                $documento = "";
//                     $idciudad="";
//                     $idprovincia="";
            }

            /// tipo de perfil 

            if ($_SESSION['perfil'] == 1) {
                $habilitar = true;
                $estadoinput = '';
                $estadofile = '';
                $estaadministrador = 'readonly';
                $Tipoperfil = "disabled ";
            } else {
                $habilitar = false;
                $estadoinput = 'readonly';
                $estadofile = 'disabled';
                $estaadministrador = '';
                $Tipoperfil = " ";
            }
            ?>

            <div class="row">
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header"><a class="navbar-brand" href="#">Perfil</a></div>
                    <ul class="nav navbar-nav">
                        <li><a  href="password.php" >Password</a></li> 
                        <li><a href="ayuda.php?tag=perfil" class="glyphicon glyphicon-question-sign"></a></li>

                    </ul>
                </div>
            </div>   

            <div class="row">
                <div class="col-md-6">
                    <form class="form-horizontal" role="form" id="perfil"  >

                        <div class="form-group">  
                            <div class="col-md-12 col-xs-12">
                                <label >Mail</label>
                                <input class="form-control" type="email" ng-model="mail" name="mail" required  autofocus value="<?php echo $mail ?>" />
                                <input type="hidden" name="idusuario" ng-model="idusuario" value="<?php echo $_SESSION['idusuario'] ?>"/>
                                <input type="hidden" name="idpersona"  value="<?php echo $idpersona ?>"/>

                            </div>
                        </div>

                        <div class="form-group">  
                            <div class="col-md-10  col-xs-5">
                                <label >Nombre</label>
                                <input   class="form-control" type="text" ng-model="nombre" required  name="nombre" value="<?php echo $nombre ?>" />
                            </div>
                        </div>
                        <div class="form-group">  

                            <div class="col-md-10 col-lg-10 col-xs-5">
                                <label >Apellido</label>
                                <input   class="form-control" type="text" ng-model="apellido" required  name="apellido" value="<?php echo $apellido ?>" />
                            </div>
                        </div>
                        <div class="form-group">  

                            <div class="col-md-8 col-lg-5 col-xs-5"> 
                                <label>Nacimiento</label>
                                <input   class="form-control" type="date" ng-model="nacimiento" required  name="nacimiento" value="<?php echo $nacimiento ?>" />
                            </div>
                        </div>
                        <div class="form-group">  

                            <div class="col-md-3 col-lg-3 col-xs-5"> 
                                <label >Documento</label>
                                <input   class="form-control" type="number" ng-model="documento" required  name="documento" value="<?php echo $documento ?>" />
                            </div>
                        </div>
                        <div class="form-group">  

                            <div class="col-md-3 col-lg-3 col-xs-5">
                                <label >Teléfono</label>
                                <input   class="form-control" type="tel" ng-model="telefono" required  name="telefono" value="<?php echo $telefono ?>"/>
                            </div>
                        </div>
                        <div class="form-group">  

                            <div class="col-md-12 col-lg-12 col-xs-12"> 
                                <label >Dirección</label>
                                <input   class="form-control" type="text" ng-model="direccion" required  name="direccion" value="<?php echo $direccion ?>"/>
                            </div>
                        </div>

                        <div class="form-group">  
                            <div class="col-md-offset-2 col-md-12 col-lg-12 col-xs-3">
                                <input   class="btn btn-primary" type="submit" value="Modificar" />
                            </div>
                        </div>
                    </form>
                    <?php ?>
                </div>
                <div class="col-md-5">
                    <form class="form-horizontal" role="form" id="foto"  >
                        <div class="panel panel-info">
                            <div class="panel-heading">Foto </div>
                            <div style="width: 150px; height: 250px; margin: auto; padding: 15px;">
                                <img  onclick="" width="200" height="200" class="img-circle" src="../imagenes/perfil/avatar/<?php echo $foto; ?>"></img></div>
                                <input type="file" value="Cambiar Foto" name="file" />
                                <input type="hidden" name="idpersona" value="<?php echo $_SESSION['idpersona'] ?>" />
                        </div>
                    </form>
                    <form class="form-horizontal" role="form" id="predio"  >
                        <div class="panel panel-info">
                            <div class="panel-heading">Detalle de Predio</div>
                            <div class="panel-body">
                                <div class="form-group"> 
                                    <div class="col-md-5  col-xs-3">
                                        <label>Superficie del Predio o finca</label>
                                        <div class="col-md-6  col-xs-3">
                                            <input   class="form-control" type="number" ng-model="supfinca" required  name="supfinca" value="<?php echo $supfinca ?>" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </body>
    
</html>