/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



            // *************** cuadro de dialogo *************
            //Cuando el formulario con ID acceso se envíe...
            $("#perfil").on("submit", function (e) {
                //Evitamos que se envíe por defecto
                e.preventDefault();
                envio();


            });

            function envio() {

                //Creamos un FormData con los datos del mismo formulario
                var formData = new FormData(document.getElementById("perfil"));

                //Llamamos a la función AJAX de jQuery
                $.ajax({
                    //Definimos la URL del archivo al cual vamos a enviar los datos
                    url: "../controles/modificacionperfil.php",
                    //Definimos el tipo de método de envío
                    type: "POST",
                    //Definimos el tipo de datos que vamos a enviar y recibir
                    dataType: "HTML",
                    //Definimos la información que vamos a enviar
                    data: formData,
                    //Deshabilitamos el caché
                    cache: false,
                    //No especificamos el contentType
                    contentType: false,
                    //No permitimos que los datos pasen como un objeto
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        console.log("paso po aqui");

                    }

                }).done(function () {
                    //Cuando recibamos respuesta, la mostramos
                    window.location.href = '../index.php';
                });
            }

         function foto() {

                //Creamos un FormData con los datos del mismo formulario
                var formData = new FormData(document.getElementById("foto"));

                //Llamamos a la función AJAX de jQuery
                $.ajax({
                    //Definimos la URL del archivo al cual vamos a enviar los datos
                    url: "../controles/perfil.php",
                    //Definimos el tipo de método de envío
                    type: "POST",
                    //Definimos el tipo de datos que vamos a enviar y recibir
                    dataType: "HTML",
                    //Definimos la información que vamos a enviar
                    data: formData,
                    //Deshabilitamos el caché
                    cache: false,
                    //No especificamos el contentType
                    contentType: false,
                    //No permitimos que los datos pasen como un objeto
                    processData: false,
                    success: function (response) {
                        console.log(response);
                        console.log("foto");

                    }

                }).done(function () {
                    //Cuando recibamos respuesta, la mostramos
//                    window.location.href = '../index.php';
                });
            }
            
            
            // Function to preview image after validation
    $(function () {
        $("#file").change(function () {
            $("#message").empty(); // To remove the previous error message
            var file = this.files[0];
            var imagefile = file.type;
            var match = ["image/jpeg", "image/png", "image/jpg"];
            if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
            {
                $('#previewing').attr('src', 'noimage.png');
                $("#message").html("<p id='error'>Please Select A valid Image File</p>"
                        + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                return false;
            } else
            {
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
            }
        });
    });

    function imageIsLoaded(e) {
//$("#file").css("color","green");
        $('#image_preview').css("display", "block");
        $('#previewing').attr('src', e.target.result);
        $('#previewing').attr('width', '550px');
        $('#previewing').attr('height', '350px');
    }
    ;

    function imagenborrar(e) {
        $('#previewing').attr('src', '../controles/imagenes/noimage.png');
        $('#previewing').attr('width', '250px');
        $('#previewing').attr('height', '230px');
        $('#file').val('');


    }
    $('#cancelar').click(function () {
        imagenborrar(e);
    });


