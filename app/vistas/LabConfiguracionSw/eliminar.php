<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabConfiguracionSwController.php';

    $id = $_GET['id'];
    $configuracion_sw_controlador = new LabConfiguracionSwController;
    $configuracion_sw_controlador->eliminar($conexion,$id);

    header("Location: index.php");