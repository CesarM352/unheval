<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabMantenimientoController.php';

    $mantenimiento_controlador = new LabMantenimientoController;
	$mantenimientos = $mantenimiento_controlador->getAllMantenimientos($conexion, 0);

    include '../cabecera.html';

    //$proceso_mdl = $proceso_controlador->getProceso( $conexion, $_GET['proceso_id'] );
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wraper" style="text-align: center">
        <br>
        <!--<h2> <?php //echo $proceso_mdl->getCodigo()." ".$proceso_mdl->getNombre() ?>Mantenimiento</h2>-->
        <br>
            <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                <a href="../LabMantenimiento/nuevo.php" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
            </button>
            <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                <a href="ver_mantenimiento.php" style="color: inherit">Actualizar</a>
            </button>
        <br><br>
        <!-- <a href="nuevo.php?proceso_id=<?php //echo $_GET['proceso_id'] ?>">Nuevo</a>-->
        <div class="container-fluid" style="text-align:center">
            <table class='table table-bordered table-hover'>
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Equipo</th>
                        <th>Ambiente</th>
                        <th>Problema</th>
                        <th>Detalle</th>
                        <th>Fecha reporte</th>
                        <th>Usuario</th>
                        <th>Técnico</th>
                        <th>Fecha atención</th>
                        <th>Estado</th>
                        <th>Justificación</th>
						<th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($mantenimientos as $key => $mantenimiento) {
                ?>
                <tr>
                    <td> <?php echo $mantenimiento["codigoproblema"] ?> </td>
                    <td> <?php echo $mantenimiento["equipo_codigo"]." ".$mantenimiento["equipo_descripcion"]." ".$mantenimiento["equipo_tipo"] ?> </td>
                    <td> <?php echo $mantenimiento["ambiente_nombre"] ?> </td>
                    <td> <?php echo $mantenimiento["tipo_problema"] ?> </td>
                    <td> <?php echo $mantenimiento["detalles"] ?> </td>
                    <td> <?php echo $mantenimiento["fechareporte"] ?> </td>
                    <td> <?php echo $mantenimiento["usuario"] ?> </td>
                    <td> <?php echo $mantenimiento["tecnico"] ?> </td>
                    <td> <?php echo $mantenimiento["fecha_hora_atencion"] ?> </td>
                    <td> <?php echo $mantenimiento["estado"] ?> </td>
                    <td> <?php echo $mantenimiento["justificacion"] ?> </td>
					<td>
						<?php if( $mantenimiento["estado"] == 'PENDIENTE' ){ ?> 
						<a href="../LabMantenimiento/editar_atencion.php?id=<?php echo $mantenimiento["codigoproblema"] ?>">ACTUALIZAR</a>
						<?php } ?>
					</td>
                </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function eliminar(id, event){
            if(!confirm("Desea elminar el registro de codigo " + id) )
                event.preventDefault()
        }
    </script>
</body>
</html>