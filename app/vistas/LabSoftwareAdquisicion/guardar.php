<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabSoftwareAdquisicionController.php';

    $software_adquisicion_nuevo = [
        "software_id" => $_GET['software_id'],
        "nro_licencias" => $_POST["nro_licencias"],
        "fecha_compra" => $_POST["fecha_compra"],
        "duracion_dias" => $_POST["duracion_dias"],
        "nro_licencias_disponibles" => $_POST["nro_licencias"],
    ];
    $software_adquisicion_controlador = new LabSoftwareAdquisicionController;
    $software_adquisicion_controlador->guardar($conexion,$software_adquisicion_nuevo);

    header("Location: index.php?id=".$_GET['software_id']);