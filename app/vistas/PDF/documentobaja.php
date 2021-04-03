<?php

    require_once '../../Conexion.php';
    require_once '../../controladores/LabEquipoController.php';

    $equipo_controlador = new LabEquipoController;
    $equipo = $equipo_controlador->getDocumento($conexion, $_GET['id']);
    $equipos = $equipo_controlador->equiposEnBajaDoumento($conexion, $equipo->getDocumentoBaja());

    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        EQUIPOS DADOS DE BAJA<BR>
        <?php 
            foreach ($equipos as $key => $equipo) {
                echo $equipo["codigopatrimonio"]."<br>";
            }
        ?>
    </div>
</body>