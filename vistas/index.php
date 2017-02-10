
<?php ?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <?php include '../cabezera.php';
        ?>   
    </head>
    <body>
        <header>

        </header>
        <?php include '../barra.php'; ?> 
        <section class="cuerpo">
            <div class="col-md-12 text-center">
                <h2>Mercado Abierto Horticola</h2>
                <p>Bienvenidos</p>
                <?php
//                if (!isset($_SESSION['rubro'])) {
//                    echo "existe";
//                }
                include '../controles/conexionmysql.php';
                $Consulrubro = $pdo->prepare("select r.* from personas_rubro pr join rubro r on pr.idrubro=r.idrubro  where idpersona=:idpersona");
                $Consulrubro->bindparam(':idpersona',$_SESSION['idpersona']);
                $Consulrubro->execute();
                
                if ($Consulrubro->rowCount()) {
                                  
                    while($rubro =$Consulrubro->fetch()) {
                        
                   $_SESSION['ids'][] = $rubro['rubro'];
                        
                }}
                print($_SESSION['ids'][0][2]);
                    ?>
                </div>
            </section>

            <footer>
                <?php include '../pie.php'; ?>   
        </footer>

    </body>
</html>
