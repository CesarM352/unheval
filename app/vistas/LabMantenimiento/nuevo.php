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
<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form action="guardar.php" method="POST">
            <br><br>
            <div class="container-fluid" style="text-align:center">
                <h2>Nueva Atención</h2>
            </div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Laboratorio: </label>
                </div>
                <div class="col-md-5">
                    <input type="hidden" name="perfil" required value="tecnico"/>
                    <select name="codigooficina" id="ambiente_id" class="form-control select2bs4" required>
                        <option value="">Seleccione</option>
                        <?php
                            foreach ($ambientes as $key => $ambiente) {
                        ?>
                            <option value="<?php echo $ambiente['codigooficina'] ?>"><?php echo $ambiente['nombre'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Equipo: </label>
                </div>
                <div class="col-md-5">
                    <select name="codigopatrimonio" id="equipo_id" class="form-control select2bs4" required>
                        <option value="">Seleccione</option>
                        <?php
                            $arr_usos = [];
                            foreach ($equipos as $key => $equipo) {
                                $arr_usos[$equipo['ambiente_codigooficina']][] = [ "id" => $equipo['codigopatrimonio'], "text" => $equipo['codigopatrimonio']." ".$equipo['equipo_tipo']." ".$equipo['descripcion'] ];
                        ?>
                            <!-- <option value="<?php echo $equipo['codigopatrimonio'] ?>"><?php echo $equipo['codigopatrimonio']." ".$equipo['equipo_tipo']." ".$equipo['descripcion'] ?></option> -->
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Tipo de problema: </label>
                </div>
                <div class="col-md-5">
                    <select name="codigoasunto" class="form-control select2bs4" required>
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
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Detalle del problema: </label>
                </div>
                <div class="col-md-5">
                    <textarea class="form-control" name="detalles" maxlength=250 placeholder='250 caracteres' required></textarea>
                </div>
            </div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-5">
                    <button class="btn btn-primary">Guardar</button>
                    <button class="btn btn-primary"><a href="../LabTecnico/ver_mantenimiento.php" style="color: inherit">Cancelar</button>
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

            $("#ambiente_id").change( function(){
                $("#equipo_id option").remove()
                $("#equipo_id").select2("destroy");

                let valor_sel = $(this).val()
                    $.ajax(
                        {
                            url: '../LabEquipo/equipooficina.php?codigooficina=' + $("#ambiente_id").val(),
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