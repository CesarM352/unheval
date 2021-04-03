<?php 
    require_once '../../Conexion.php';
    require_once '../../controladores/LabSoftwareController.php';

    $id=$_GET['codigosoftware'];

    $softwares_controlador = new LabSoftwareController;
    $software_mdl = $softwares_controlador->getSoftware($conexion, $id);

    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form>
            <br>
            <div style="text-align:center"><h2>Detalles del Software</h2></div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <span><?php echo $software_mdl->getDetalles() ?></span>
                </div>
            </div>
        </form>
    </div>
    <div class="container-fluid" style="text-align: center">
        <button class='btn btn-info font-weight-bolder'>
            <a href='ver_software_index.php' style="color: inherit">Volver <i class="fa fa-backward"></i></a>
        </button>
    </div>
</body>
</html>
