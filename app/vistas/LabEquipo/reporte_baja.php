<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabAmbienteController.php';

    $ambiente_controlador = new LabAmbienteController;
    $ambiente = $ambiente_controlador->getAmbiente($conexion, $_GET['ambiente_id']);
    
    $codigo_equipo = "";

    $archivo=$_GET['archivo'];

    $codigos = explode(',',substr($_GET['codigos'],0,-1));


    foreach ($codigos as $key => $codigo) {
        $codigo_equipo .= $codigo." / ";
    }

    date_default_timezone_set("America/Lima");

    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid" style="text-align: center">
        <div class="card-header text-center" style="color:blue">
            <br>
            <img id="profile-img" class="profile-img-card" src="../../../public/dist/img/Unheval.png" width="10%" height="10%"/>
            <h1><b>UNHEVAL</b></h1>
            <h3>Facultad de Ingeniería Industrial y Sistemas</h3>
        </div>
        <br><br><h2>REPORTE DE BAJA DE EQUIPOS</h2><br><br>
    </div>
    <div class="container-fluid">
        <div class="row form-group">
            <div class="col-3"></div>
            <div class="col-2">
                <label>CÓDIGO:</label>
            </div>
            <div class="col-3">
                <?php //foreach ($codigos as $key => $codigo) {?>
                    <span><?php echo $codigo_equipo ?></span>
                 <?php //} ?>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-3"></div>
            <div class="col-2">
                <label>AMBIENTE:</label>
            </div>
            <div class="col-2">
                <span><?php echo $ambiente->getNombre() ?></span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-3"></div>
            <div class="col-2">
                <label>FECHA:</label>
            </div>
            <div class="col-2">
                <span><?php echo date('d/m/Y') ?></span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-3"></div>
            <div class="col-2">
                <label>HORA:</label>
            </div>
            <div class="col-2">
                <span><?php echo date('h:i:s a') ?></span>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-3"></div>
            <div class="col-2">
                <label>Documento:</label>
            </div>
            <div class="col-2">
                <span><?php echo $archivo ?></span>
            </div>
        </div>
    </div><br>
    <div class="container-fluid" style="text-align: center">
        <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
            <a href="../LabTecnico/ver_equipo_index.php" style="color: inherit">Inventario <i class="fa fa-clipboard-list"></i></a>
        </button>
        <button id="btn_nuevo" class="btn btn-info font-weight-bolder" onclick="window.print()">
            <a style="color: inherit">Imprimir <i class="fa fa-print"></i></a>
        </button>
    </div><br>
</body>
</html>