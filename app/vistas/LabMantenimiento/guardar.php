<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabMantenimientoController.php';

    $mantenimiento_nuevo = [
        "equipo_id" => $_POST["equipo_id"],
        "ambiente_id" => $_POST["ambiente_id"],
        "detalles" => $_POST["detalle"],
        "fecha" => date('Y-m-d H:i:s'),
        "usuario" => 'mi nombre',
        "estado" => 'PENDIENTE',
        "tipo_problema" => $_POST["tipo_problema"],
    ];
    $mantenimiento_controlador = new LabMantenimientoController;
    $mantenimiento_controlador->guardar($conexion,$mantenimiento_nuevo);

    header("Location: ../LabTecnico/ver_mantenimiento.php");