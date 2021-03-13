<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabSoftwareController.php';

    $id = $_GET['id'];
    $software_actualizar = [
        "nombre" => $_POST["nombre"],
        "version" => $_POST["version"],
        "propietario" => $_POST["propietario"],
        "conlicencia" => $_POST["conlicencia"],
        "tipo_sw" => $_POST["tipo_sw"],
        "forma" => $_POST["forma"],
        "minimoram" => $_POST["minimoram"],
        "minimovideo" => $_POST["minimovideo"],
        "minimoprocesador" => $_POST["minimoprocesador"],
        "minimohhd" => $_POST["minimohhd"],
        "detalles" => $_POST["detalles"],
        "detalles" => $_POST["detalles"],
    ];
    $software_controlador = new LabSoftwareController;
    $software_controlador->actualizar($conexion,$id, $software_actualizar);

    header("Location: index.php");