<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include'../cabezera.php' ?>
    </head>
    <body ng-app="App" ng-controller="producto">
        <header>
            <?php include '../barra.php'; ?> 
        </header> 

        <div class="container">
            <div class="row">

                <div class="navbar navbar-default" style="background: tomato; color:#ccffff  " role="navigation">
                    <div class="navbar-header"><a class="navbar-brand " href="#">Productos</a></div>
                    <ul class="nav navbar-nav">
                        <li><a href="" ng-click="botones('nuevo');" class="">Nuevo</a></li>
                        <li><a href=w"ayuda.php?tag=password" class="">Todos</a></li>
                        <li><a href="ayuda.php?tag=password" class="">Publicados</a></li>
                        <li><a href="ayuda.php?tag=password" class="">Acordados</a></li>
                        <li><a href="ayuda.php?tag=password" class="">Suspenso</a></li>
                        <li><a href="ayuda.php?tag=password" class="glyphicon glyphicon-question-sign"></a></li>

                    </ul>
                </div>
            </div>
            <div class="row" ng-show="nuevo">
                <div class="col-md-6">
                    <form id="produccion" class="form-horizontal" role="form" >
                        <div class="form-group ">
                            <div class="col-md-4">
                                <label for="siembra" class="control-label  ">Fecha Siembra</label>
                                <input type="date" class="form-control " id="fechasiembra" name="fechasiembra" placeholder="Fecha Siembra"  
                                       data-minlength="1" required/>
                            </div>
                        </div>
                        <div class="panel-info">
                            <div class="form-group">
                                <div class="col-md-4">
                                    <label for="Superficie" class="control-label  ">Superficie</label>
                                    <input type="text" class="form-control" id="superfice" title="Superficie estimada de produccion Ej:10 mts. X 10 mts. Son 100 m2" name="superficie" placeholder="Superficie m2"  
                                           data-minlength="1" required/>
                                </div>
                            </div>   
                            <div class="form-group">
                                <div class="col-md-5">
                                    <label for="Cantidad" class="control-label  ">Lineos</label>
                                    <span class="glyphicon glyphicon-question-sign"></span>
                                    <input type="number" class="form-control"  title="Cada lineos se concidera 50 mts. de largo y el espacio entre 
                                           lineos es 90 cm."id="superfice" name="superficie" placeholder="Cantidad de lineos"  
                                           data-minlength="1" required/>
                                </div>
                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="col-md-4">
                                <label for="cosecha" class="control-label  ">Fecha Cosecha</label>
                                <input type="date" class="form-control" id="fechacosecha" name="fechacosecha" placeholder="Fecha Cosecha"  
                                       data-minlength="1" required/>
                            </div>
                        </div>
                        <div class="form-group"> 
                            <label for="Cantidades" class="control-label c ">Producción Estimada</label>
                            <div class="col-md-12">


                                <div class="col-md-5">

                                    <div class="list-inline">
                                        <input type="number" class="form-control" id="produccionestimada" name="produccionestimada" placeholder="Producción estimada"  
                                               required/>

                                    </div>  
                                </div>
                                <div class="col-md-5">
                                    <select name="medida" class="form-control">
                                        <option value="u">Un</option>
                                        <option value="kg">kg</option>
                                        <option  value="tn">Tn</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-5">
                                <label for="Productos" class="control-label">Productos</label>
                                <select ng-model="productos" class="form-control" ng-options="ve.descripcion in vegetal ">

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-11">
                                <label for="observaciones" class="control-label ">Observaciones</label>

                                <textarea class="form-control" rows="5"id="observacion" placeholder="Observacion" >
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-11">
                                <button type="submit" class="btn btn-primary" ng-value="boton">Aceptar</button>
                            </div>
                        </div>   
                    </form>

                </div>
                <div class="col-md-5 ">
                    <form id="publicar" class="form-horizontal" role="form" >
                        <div class="form-group">
                            <div class="col-md-5">
                                <label for="Publicar" class="control-label ">Publicar</label>
                                <input class="form-control" ng-model="publicar" type="checkbox" name="publicar" value="ON" />
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
        <div id="dialog-confirm" title="Información">
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                <span id="mensaje"></span> </p>
        </div>
        <span id="mensaje1"></span>      
        </div>


    </body>

</html>
<script>

    var app = angular.module('App', []);
    app.controller('producto', function ($scope, $http) {
    $scope.nuevo = false;
    $scope.listavegetales = function () {
    $http({
    url: '../controles/vegetales.php',
            method: "POST"
 
    }).then(function (response) {
        $scope.vegetal = response.data.vegetales;
        console.log(response.data);
    });
    
    
    $scope.botones = function (id) {
    switch (id) {
    case 'nuevo':
            $scope.nuevo = true;
    break;
    }

    };
    });
    var formData = new FormData(document.getElementById("produccion"));
    $(function () {
    x = $('#dialog-confirm').dialog({
    autoOpen: false,
            resizable: false,
            height: "auto",
            width: 400,
            modal: false,
            buttons: {
            "Aceptar": function () {
            Produccion();
            $(this).dialog("close");
            },
                    "Cancelar": function () {
                    $(this).dialog("close");
                    }
            }
    });
    //Cuando el formulario con ID acceso se envíe...
    $("#produccion").on("submit", function (e) {
    //Evitamos que se envíe por defecto
    e.preventDefault();
    //Creamos un FormData con los datos del mismo formulario
    $('#mensaje').html("Esta Ofertando nueva produccion?");
    x.dialog("open");
    });
    function Produccion() {

    //Llamamos a la función AJAX de jQuery       
    $.ajax({
    //Definimos la URL del archivo al cual vamos a enviar los datos
    url: "../controles/produccion.php",
            //Definimos el tipo de método de envío
            type: "POST",
            //Definimos el tipo de datos que vamos a enviar y recibir
            dataType: "html",
            //Definimos la información que vamos a enviar
            data: formData,
            //Deshabilitamos el caché
            cache: false,
            //No especificamos el contentType
            contentType: false,
            //No permitimos que los datos pasen como un objeto
            processData: false,
            success: function (echo) {

            if (echo) {
            $('#mensaje1').html("Agrego con excito!");
            exit();
            } else
            {

            if (CambiarPassword()) {
            $('#mensaje1').html(echo);
            }

            }
            }
    });
    }
    ;
    function CambiarPassword() {

    //Llamamos a la función AJAX de jQuery       
    $.ajax({
    //Definimos la URL del archivo al cual vamos a enviar los datos
    url: "../controles/cambiarpassword.php",
            //Definimos el tipo de método de envío
            type: "POST",
            //Definimos el tipo de datos que vamos a enviar y recibir
            dataType: "html",
            //Definimos la información que vamos a enviar
            data: formData,
            //Deshabilitamos el caché
            cache: false,
            //No especificamos el contentType
            contentType: false,
            //No permitimos que los datos pasen como un objeto
            processData: false,
            success: function (echo) {
            console.log(echo);
            if (!echo) {
            $('#mensaje1').html("no pudo concretarse");
            } else {
            $('#mensaje1').html("Existo");
            }

            }


    });
    }
    ;
    });


</script>  