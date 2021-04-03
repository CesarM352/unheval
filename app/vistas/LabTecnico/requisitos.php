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
            <div style="text-align:center"><h2>Requisitos Mínimos</h2></div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Procesador: </label>
                </div>
                <div class="col-md-2">
                    <span><?php echo $software_mdl->getMinimoProcesador() ?></span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Memoria: </label>
                </div>
                <div class="col-md-2">
                    <span><?php echo $software_mdl->getMinimoRam() ?></span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Video: </label>
                </div>
                <div class="col-md-2">
                    <span><?php echo $software_mdl->getMinimoVideo() ?></span>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Disco Duro: </label>
                </div>
                <div class="col-md-2">
                    <span><?php echo $software_mdl->getMinimoHhd() ?></span>
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
