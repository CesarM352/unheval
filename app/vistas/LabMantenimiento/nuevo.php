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
                    <select name="ambiente_id" class="form-control" required>
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
                    <select name="equipo_id" class="form-control" required>
                        <option value="">Seleccione</option>
                        <?php
                            foreach ($equipos as $key => $equipo) {
                        ?>
                            <option value="<?php echo $equipo['codigopatrimonio'] ?>"><?php echo $equipo['codigopatrimonio']." ".$equipo['equipo_tipo']." ".$equipo['descripcion'] ?></option>
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
                    <select name="tipo_problema" class="form-control" required>
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
    <script src="../../../public/js/bootstrap/bootstrap.min.js"></script>
    <script src="../../../public/js/jquery-3.4.1.min.js"></script>
    <script src="../../../public/js/jquery-ui.js"></script>
</body>
</html>