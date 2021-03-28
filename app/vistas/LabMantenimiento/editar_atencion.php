<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabMantenimientoController.php';

    $mantenimiento_controlador = new LabMantenimientoController;
	$mantenimiento = $mantenimiento_controlador->getDocumento($conexion, $_GET['id']);

    include '../cabecera.html';
?>
<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">

        <form action="actualizar_atencion.php?id=<?php echo $_GET['id'] ?>" method="POST" class="formulario">
            <br><br>
			<div class="container-fluid" style="text-align:center">
                <h2>Atender Asistencia</h2>
            </div>
			<br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Estado: </label>
                </div>
                <div class="col-md-5">
                    <select name="estado" class="form-control" required>
                        <option value="">Seleccione</option>
                        <option value="REPARADO" <?php echo ( $mantenimiento->getEstado() == 'REPARADO' ) ? 'selected' : ''?> >REPARADO</option>
                        <option value="MALOGRADO" <?php echo ( $mantenimiento->getEstado() == 'MALOGRADO' ) ? 'selected' : ''?> >MALOGRADO</option>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Justificación: </label>
                </div>
                <div class="col-md-5">
                    <textarea class="form-control" name="justificacion" maxlength=250 placeholder='250 caracteres' required><?php echo $mantenimiento->getJustificacion() ?></textarea>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-7">
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>

    </body>
</html>