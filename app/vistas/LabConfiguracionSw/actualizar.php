<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabConfiguracionSwController.php';

    $id = $_GET['id'];
    $configuracion_sw_actualizar = [
        "descripcion" => $_POST["descripcion"],
        "valor" => $_POST["valor"],
    ];
    $configuracion_sw_controlador = new LabConfiguracionSwController;
    $configuracion_sw_controlador->actualizar($conexion,$id, $configuracion_sw_actualizar);

    header("Location: index.php");