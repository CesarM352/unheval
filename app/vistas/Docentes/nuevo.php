<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/DocentesController.php';
    require_once '../../controladores/DireccionesController.php';
    require_once '../../controladores/TipoContratoDocController.php';

    $docentes_controlador = new DocentesController;
    $codigodocente = $docentes_controlador->calcularNuevoCodigo($conexion);

    $direcciones_controlador = new DireccionesController;
    $direcciones = $direcciones_controlador->getAllDirecciones($conexion);

    $tipocontratodoc_controlador = new TipoContratoDocController;
    $tipocontratodoc = $tipocontratodoc_controlador->getAllTipoContratoDoc($conexion);

    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form onsubmit="return verifyPassword() && matchPassword() && valida_dni()" action="guardar.php" method="POST">
            <br>
            <div style="text-align:center"><h2>Nuevo Docente</h2></div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="codigo">Código: </label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="codigo" value="<?php echo $codigodocente ?>" readonly/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="nombre">Nombre: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="nombre" id="nombre" pattern="[A-Za-záéíóú ]{1,100}" title="(No se permiten números en este campo)" required/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="dni">DNI: </label>
                </div>
                <div class="col-md-2">
                    <input type="number" class="form-control" name="dni" id="dni" required/>
                </div>
                <div class="col-md-4">
                    <span id="message"> </span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="celular">Celular: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="number" name="celular"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="direccion">Dirección: </label>
                </div>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="direccion"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="pass">Password: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="password" name="pass" id="pswd1" required/>
                </div>
                <div class="col-md-4">
                    <span id = "message1"> </span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="pass">Confirmar Password: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="password" id="pswd2" required/>
                </div>
                <div class="col-md-4">
                    <span id = "message2"> </span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="codtipocontrato">tipo Contrato: </label>
                </div>
                <div class="col-md-4">
                    <select name="codtipocontrato" class="form-control" required>
                        <?php
                            foreach ($tipocontratodoc as $key => $tipocontratodo) {
                        ?>
                        <option value="<?php echo $tipocontratodo['codtipocontrato'] ?>"><?php echo utf8_encode($tipocontratodo['nombre']) ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-7">
                    <button class="btn btn-primary" onclick="validar_form()">Guardar</button>
                    <button class="btn btn-primary"><a href="index.php" style="color: inherit">Cancelar</a></button>
                </div>
            </div>
        </form>
    </div>
    <?php include '../foot.html' ?>

    <script>//validar password
        
        $('#pswd1').blur(function(){
            verifyPassword();
        })

        $('#pswd2').blur(function(){
            matchPassword();
        })

        $(document).on('keyup', '#pswd1', function(){
            verifyPassword();
            matchPassword();
        });

        $(document).on('keyup', '#pswd2', function(){
            matchPassword();
            verifyPassword();
        });

        function verifyPassword() {
            var pw1=$('#pswd1').val();

            if(pw1 == "") {
                document.getElementById("message1").innerHTML = ""; 
                return false;
            }
            if(pw1.length >= 1 && pw1.length < 6) {  
                $('#message1').css("color", "red");
                document.getElementById("message1").innerHTML = "¡Mínimo 6 caracteres!"; 
                return false;  
            }
            /*if(pw1.length > 6) {  
                $('#message1').css("color", "red");
                document.getElementById("message1").innerHTML = "¡Máximo 6 caracteres!"; 
                return false;
            }*/
            else {//seguridad de la contraseña
                if(pw1.match(/[a-z]/) && pw1.match(/[A-Z]/) && pw1.match(/\d/)) {  
                    $('#message1').css("color", "green");
                    document.getElementById("message1").innerHTML = "¡Correcto!";
                    return true
                }else{
                    $('#message1').css("color", "red");
                    document.getElementById("message1").innerHTML = "¡Debe contener números, letras mayusculas y minúsculas!"; 
                    return false; 
                }
            }
        }  

        function matchPassword() {  
            var pw1 = $('#pswd1').val(); 
            var pw2 = $('#pswd2').val();

            if(pw2 == "") {
                document.getElementById("message2").innerHTML = "";
                return false;
            }
            if((pw2.length >= 1 && pw2.length < 6)){
                $('#message2').css("color", "red");
                document.getElementById("message2").innerHTML = "¡Mínimo 6 caracteres!";
                return false;
            }
            if((pw2.length >= 6) && (pw1 != pw2)){   
                $('#message2').css("color", "red");
                document.getElementById("message2").innerHTML = "¡No hay coincidencia!";
                return false;
            } else if((pw2.length >= 6) && (pw1 == pw2)){  
                $('#message2').css("color", "green");
                document.getElementById("message2").innerHTML = "¡Correcto!";
                return true
            }  
        }
    </script>
    <script>
        //Para buscar la existencia del dni
        $(buscar_dni());

        function buscar_dni(dni){
            $.ajax({
                url: 'validar_dni.php',
                type: 'POST',
                dataType: 'html',
                data: {dni: dni},
            })
            .done(function(respuesta){
                $("#message").text(respuesta);
                if(respuesta=='DNI válido'){
                    $("#message").css("color", "green");
                }
                if(respuesta=='¡El DNI ingresado ya esta registrado!'){
                    $("#message").css("color", "red");
                }
            })
            .fail(function(){
                console.log("error");
            })
        }

        //Detectar los dni introducidos en el campo de texto dni
        $(document).on('keyup', '#dni', function(){
            var dni=$(this).val();
            if(dni !=''){
                if(dni.length==8){
                    buscar_dni(dni);
                }else{
                    $("#message").text('¡Ingrese 8 digitos!');
                    $("#message").css("color", "red");
                }
            }
            else{
                buscar_dni();
            }
        });
    </script>
    <script>
        function valida_dni(){//validar los DNI
            var validar_dni=$('#message').text();
            if(validar_dni=="¡El DNI ingresado ya esta registrado!"){
                return false;
            }
            if(validar_dni=="¡Ingrese 8 digitos!"){
                return false;
            }else if(validar_dni=='DNI válido'){
                return true;
            }
        }
    </script>
    <script>
        function validar_form(){//Mensajes de error de validación
            var valida_dni=$('#message').text();
            var valida_pw1=$('#message1').text();
            var valida_pw2=$('#message2').text();

            if(valida_dni=="¡El DNI ingresado ya esta registrado!"){
                Swal.fire('¡El DNI ingresado ya esta registrado!, por favor cambielo');
                
            }
            if(valida_dni=="¡Ingrese 8 digitos!"){
                Swal.fire('El DNI ingresado no es válido, ¡Ingrese 8 digitos!');
                
            }
            else if(valida_pw1=="¡Mínimo 6 caracteres!"){
                Swal.fire('La contraseña ingresada no es válida, ¡Mínimo 6 caracteres!');
                
            }
            if(valida_pw1=="¡Debe contener números, letras mayusculas y minúsculas!"){
                Swal.fire('La contraseña ingresada no es válida, ¡Debe contener números, letras mayusculas y minúsculas!');
                
            }
            if(valida_pw2=="¡No hay coincidencia!"){
                Swal.fire('La confirmación de contraseña no es válida, ¡No hay coincidencia!');
                
            }
        }
    </script>

</body>
</html>