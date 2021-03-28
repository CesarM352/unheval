<?php
    require_once '../../Conexion.php';
    include_once '../../controladores/LabAmbienteController.php';
    $ambiente_controlador = new LabAmbienteController;
    $ambientes = $ambiente_controlador->getAllAmbientes($conexion);

    include_once '../../controladores/LabEquipoController.php';
    $equipo_controlador = new LabEquipoController;
    $equipos = $equipo_controlador->getAllEquipos($conexion);

    include_once '../../controladores/LabTipoProblemaController.php';
    $tipo_problema_controlador = new LabTipoProblemaController;
    $tipos_problemas = $tipo_problema_controlador->getAllTiposProblemas($conexion);
	
	include '../cabecera.html';
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">

        <?php
            if(isset($_GET['registrado']) && $_GET['registrado']==1){
                //echo "Se registró su problema";
        ?>
            <script>
                Swal.fire('Se registró su problema').then( (result) => {
                    window.location.href = '../../../public/index.php'
                } )
            </script>
        <?php
            }
        ?>

        <form action="../LabMantenimiento/guardar.php" method="POST" >
            <br>
            <div style="text-align:left"><h2>REGISTRE EL INCONVENIENTE CON EL EQUIPO</h2></div>
            <br>
            <div class="row form-group" id="fecha_clase">
                <div class="col-md-2">
                    <label>Laboratorio: </label>
                </div>
                <div class="col-md-7">
                    <input type="hidden" name="perfil" required value="estudiante"/>
                    <select name="codigooficina" id="codigooficina" class="form-control select2bs4">
                        <option value="">Seleccione</option>
                        <?php foreach ($ambientes as $key => $ambiente) {
                        ?>
                        <option value="<?php echo $ambiente['codigooficina'] ?>"><?php echo $ambiente['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row form-group" id="fecha_clase">
                <div class="col-md-2">
                    <label>Equipo: </label>
                </div>
                <div class="col-md-7">
                    <select name="codigopatrimonio" id="equipo_id" class="form-control select2bs4">
                        <option value="">Seleccione</option>
                        <?php foreach ($equipos as $key => $equipo) {
                        ?>
                        <!-- <option value="<?php echo $equipo['codigopatrimonio'] ?>"><?php echo $equipo['codigopatrimonio'].' '.$equipo['nombre'] ?></option> -->
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Tipo de problema: </label>
                </div>
                <div class="col-md-7">
                    <select name="codigoasunto" required class="form-control select2bs4">
                        <option value="">Seleccione</option>
                        <?php
                            foreach ($tipos_problemas as $key => $tipo_problema) {
                        ?>
                            <option value="<?php echo $tipo_problema['codigoasunto'] ?>"><?php echo $tipo_problema['nombre'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="row form-group" id="fecha_clase">
                <div class="col-md-2">
                    <label>Detalles: </label>
                </div>
                <div class="col-md-7">
                    <textarea name="detalles" class="form-control"></textarea>
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-7">
                    <button class="btn btn-primary">Guardar</button>
                    <button class="btn btn-primary"><a href="index.php?procesos_id=<?php echo $procesos_id ?>">Cancelar</button>
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
            });

            $("#codigooficina").change( function(){
                $("#equipo_id option").remove()
                $("#equipo_id").select2("destroy");

                let valor_sel = $(this).val()
                    $.ajax(
                        {
                            url: '../LabEquipo/equipooficina.php?codigooficina=' + $("#codigooficina").val(),
                            dataType: 'json',
                            success: function( result ) {
                                $('#equipo_id').select2({
                                    data: result,
                                    theme: 'bootstrap4'
                                })
                            }
                        }
                    )
            })
        })
        </script>
    </body>
</html>