<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabMantenimientoController.php';

    $id = $_GET['id'];
    $mantenimiento_actualizar = [
        "estado" => $_POST["estado"],
        "justificacion" => $_POST["justificacion"],
        "tecnico" => "El técnico",
        "fecha_hora_atencion" => date('Y-m-d H:i:s'),
    ];
    $mantenimiento_controlador = new LabMantenimientoController;
    $mantenimiento_controlador->actualizar($conexion,$id, $mantenimiento_actualizar);

    header("Location: ../LabTecnico/ver_mantenimiento.php");