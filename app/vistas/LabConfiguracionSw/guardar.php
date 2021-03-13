<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabConfiguracionSwController.php';

    $configuracion_nuevo = [
        "descripcion" => $_POST["descripcion"],
        "valor" => $_POST["valor"],
    ];
    $confguracion_sw_controlador = new LabConfiguracionSwController;
    $confguracion_sw_controlador->guardar($conexion,$configuracion_nuevo);

    header("Location: index.php");