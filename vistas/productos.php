<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <?php include'../cabezera.php' ?>
    </head>
    <body  >
        <header>
            <?php include '../barra.php'; ?> 
        </header> 

        <div class="container">
            <div class="row">

                <div class="navbar navbar-default" style="background: tomato; color:#ccffff  " role="navigation">
                    <div class="navbar-header"><a class="navbar-brand " href="#">Productos</a></div>
                    <ul class="nav navbar-nav">
                        <li><a href="ayuda.php?tag=password" class="">Nuevo</a></li>
                        <li><a href="ayuda.php?tag=password" class="">Todos</a></li>
                        <li><a href="ayuda.php?tag=password" class="">Publicados</a></li>
                        <li><a href="ayuda.php?tag=password" class="">Acordados</a></li>
                        <li><a href="ayuda.php?tag=password" class="">Suspenso</a></li>
                        <li><a href="ayuda.php?tag=password" class="glyphicon glyphicon-question-sign"></a></li>

                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <form id="Cambiopassword" class="form-horizontal" role="form" >
                        <div class="form-group ">
                            <div class="col-md-5">
                                <label for="siembra" class="control-label  ">Fecha Siembra</label>
                                <input type="date" class="form-control " id="fechasiembra" name="fechasiembra" placeholder="Fecha Siembra"  
                                       data-minlength="1" required/>
                            </div>
                        </div>
                        <div class="panel-info">
                            <div class="form-group">

                                <div class="col-md-5">
                                    <label for="Cantidad" class="control-label  ">Cantidad</label>
                                    <input type="text" class="form-control" id="superfice" name="superficie" placeholder="Superficie m2"  
                                           data-minlength="1" required/>
                                </div>

                            </div>   
                            <div class="form-group">

                                <div class="col-md-5">
                                    <label for="Cantidad" class="control-label  ">Lineos</label>
                                    <span class="glyphicon glyphicon-question-sign"></span>
                                    <input type="text" class="form-control"  title="Cada lineos se concidera 50 mts. de largo y el espacio entre 
                                           lineos es 90 cm."id="superfice" name="superficie" placeholder="Cantidad de lineos"  
                                           data-minlength="1" required/>
                                </div>

                            </div> 
                        </div>

                        <div class="form-group">
                            <div class="col-md-5">
                                <label for="cosecha" class="control-label  ">Fecha Cosecha</label>
                                <input type="date" class="form-control" id="fechacosecha" name="fechacosecha" placeholder="Fecha Cosecha"  
                                       data-minlength="1" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                <label for="Cantidades" class="control-label c ">Producción Estimada</label>
                                <div class="list-inline">
                                    <input type="text" class="form-control" id="produccionestimada" name="produccionestimada" placeholder="Producción estimada"  
                                           required/>
                                    
                                    <select name="Productos" class="form-control">

                                        <option value="u">Un</option>
                                        <option value="kg">kg</option>
                                        <option  value="tn">tn</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-5">
                                <label for="Productos" class="control-label">Productos</label>
                                <select name="Productos" multiple="multiple">
                                    <option></option>
                                    <option>Lechuga</option>
                                    <option>Zapallo</option>
                                    <option>Zanahoria</option>
                                    <option>Apio</option>
                                    <option>Tomate</option>
                                    <option>Morron</option>
                                    <option>Perejil</option>
                                    <option>Oregano</option>

                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-11">
                                <label for="Observaciones" class="control-label ">Observaciones</label>

                                <textarea class="form-control" id="Observacion" placeholder="Observacion" >
                                </textarea>
                            </div>
                        </div>
                        <div class="form-group">

                            <button type="submit" class="btn btn-primary">Aceptar</button>
                        </div>   
                    </form>

                </div>
                <div class="col-md-5 ">
                    <form id="publicar" class="form-horizontal" role="form" >
                        <div class="form-group">
                            <div class="col-md-5">
                                <label for="Publicar" class="control-label ">Publicar</label>
                                <input class="form-control"  type="checkbox" name="publicar" value="ON" />
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
        <script>
            var formData = new FormData(document.getElementById("Cambiopassword"));
            $(function () {
                x = $('#dialog-confirm').dialog({
                    autoOpen: false,
                    resizable: false,
                    height: "auto",
                    width: 400,
                    modal: false,
                    buttons: {
                        "Aceptar": function () {
                            BuscarPassword();
                            $(this).dialog("close");
                        },
                        "Cancelar": function () {
                            $(this).dialog("close");
                        }
                    }
                });
                //Cuando el formulario con ID acceso se envíe...
                $("#Cambiopassword").on("submit", function (e) {
                    //Evitamos que se envíe por defecto
                    e.preventDefault();
                    //Creamos un FormData con los datos del mismo formulario
                    $('#mensaje').html("Esta seguro de Cambiar su Clave?");
                    x.dialog("open");


                });


                function BuscarPassword() {

                    //Llamamos a la función AJAX de jQuery       
                    $.ajax({
                        //Definimos la URL del archivo al cual vamos a enviar los datos
                        url: "../controles/buscarpassword.php",
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
                                $('#mensaje1').html("La clave no corresponde");
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

    </body>
</html>