<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/DocentesController.php';

    $codigo_curso=$_GET['codigocurso'];
    $nombre_escuela=$_GET['carrera'];
    $nombre_curso=$_GET['nombre'];
    $docentes_controlador = new DocentesController;
    $docentes = $docentes_controlador->getAllDocentes($conexion);

    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form onsubmit="return validar_form()" action="guardar.php?codigocurso=<?php echo $codigo_curso ?>&carrera=<?php echo $nombre_escuela ?>&nombre=<?php echo $nombre_curso ?>" method="POST">
            <br>
            <div class="container-fluid" style="text-align:center">
                <h2><?php echo $nombre_escuela ?></h2>
                <h2><?php echo $nombre_curso.' - '.$codigo_curso ?></h2>
            </div>
            <br>
            <div style="text-align:left"><h2>Nuevo grupo</h2></div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="codigogrupo">Código: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="codigogrupo" required/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="nombre">Nombre: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="nombre" id="nombre" autocomplete="off" required/>
                    <input type="hidden" class="form-control" id="codigocurso" value="<?php echo $codigo_curso ?>"/>
                    <input type="hidden" class="form-control" name="validar" id="validar"/>
                    
                </div>
                <div id="mensaje"></div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="numeroalumnos">numero alumnos: </label>
                </div>
                <div class="col-md-1">
                    <input type="text" class="form-control" name="numeroalumnos" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="maximoalumnos">maximo alumnos: </label>
                </div>
                <div class="col-md-1">
                    <input class="form-control" type="text" name="maximoalumnos" required/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="codigodocente">Docente: </label>
                </div>
                <div class="col-md-4">
                    <select name="codigodocente" class="form-control select2bs4" required>
                        <option disabled selected>Seleccione</option>
                        <?php
                            foreach ($docentes as $key => $docente) {
                        ?>
                        <option value="<?php echo $docente['codigodocente'] ?>"><?php echo utf8_encode($docente['nombre']) ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <input type="hidden" value="<?php echo $codigo_curso ?>" class="form-control" name="codigocurso"/>
                </div>
            </div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-7">
                    <button class="btn btn-primary">Guardar</button>
                    <button class="btn btn-primary"><a href="index.php?codigocurso=<?php echo $codigo_curso ?>&carrera=<?php echo $nombre_escuela ?>&nombre=<?php echo $nombre_curso ?>" style="color: inherit">Cancelar</a></button>
                </div>
            </div>
        </form>
    </div>
        <?php include '../foot.html' ?>
        <script>
            $(function () {
                //Inicializar Select2
                $('.select2bs4').select2({
                theme: 'bootstrap4'
                })
            })
        </script>
        <script>
            //Para buscar la existencia del nombre de grupo
            $(buscar_nombregrupo());

            function buscar_nombregrupo(codigo, nombre){
                $.ajax({
                    url: 'validar_grupo.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {codigo: codigo,
                           nombre: nombre},
                })
                .done(function(respuesta){
                    $("#validar").val(respuesta);
                })
                .fail(function(){
                    console.log("error");
                })
            }

            //Detectar los nombres introducidos en el campo de texto nombre
            $(document).on('keyup', '#nombre', function(){
                var codigo= $('#codigocurso').val();
                var nombre=$(this).val();
                if(nombre !=''){
                    buscar_nombregrupo(codigo, nombre);
                }
                else{
                    buscar_nombregrupo();
                }
            });
        </script>
        <script>
            //validar el nombre de grupo
            function validar_form(){
                var validar=$('#validar').val();
                if(validar=="No valido"){
                    alertify.alert('Ya existe un grupo con ese nombre, por favor cambielo').set('basic', true);
                    //$('#mensaje').html("Ya existe un grupo con ese nombre, por favor cambielo");
                    $('#nombre').focus();
                    $("#nombre").blur(function(){
    		        $(this).css("background-color", "#FFFFCC");
                    });
                    return false;
                }else if(validar=='Valido'){
                    return true;
                }
            }
        </script>
    </body>
</html>