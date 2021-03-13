<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabSoftwareController.php';

    $id = $_GET['id'];
    $software_controlador = new LabSoftwareController;
    $software_controlador->eliminar($conexion,$id);

    header("Location: index.php");