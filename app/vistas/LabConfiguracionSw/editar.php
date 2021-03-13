<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabConfiguracionSwController.php';

    $configuracion_sw_controlador = new LabConfiguracionSwController;
    $configuracion_sw_mdl = $configuracion_sw_controlador->getConfiguracionSw($conexion, $_GET['id']);

    include '../cabecera.html';
?>
<body class="principal">
    <div class="container">

        <form action="actualizar.php?id=<?php echo $_GET['id'] ?>" method="POST" class="formulario">
            <br><br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Descripción: </label>
                </div>
                <div class="col-md-7">
                    <textarea class="form-control" name="descripcion" ><?php echo $configuracion_sw_mdl->getDescripcion() ?></textarea>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Valor: </label>
                </div>
                <div class="col-md-7">
                    <textarea class="form-control" name="valor" ><?php echo $configuracion_sw_mdl->getValor() ?></textarea>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-7">
                    <button class="btn btn-primary">Actualizar</button>
                    <button class="btn btn-primary"><a href="index.php?procesos_id=<?php echo $configuracion_sw_mdl->getProcesosId() ?>">Cancelar</button>
                </div>
            </div>
        </form>

        <script src="../../../public/js/bootstrap/bootstrap.min.js"></script>
        <script src="../../../public/js/jquery-3.4.1.min.js"></script>
        <script src="../../../public/js/jquery-ui.js"></script>
    </body>
</html>