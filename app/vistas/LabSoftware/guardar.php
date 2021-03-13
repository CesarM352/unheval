<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabSoftwareController.php';
    require_once '../../controladores/LabSoftwareAdquisicionController.php';

    $software_controlador = new LabSoftwareController;
    $software_adquisicion_controlador = new LabSoftwareAdquisicionController;

    $software_nuevo = [
        "codigosoftware" => $software_controlador->calcularNuevoCodigo($conexion),
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

    $software_adquisicion_nuevo = [
        "software_id" => $software_controlador->calcularNuevoCodigo($conexion),
        "nro_licencias" => $_POST["nro_licencias"],
        "fecha_compra" => $_POST["fecha_compra"],
        "duracion_dias" => $_POST["duracion_dias"],
        "nro_licencias_disponibles" => $_POST["nro_licencias"],
    ];
    $software_controlador->guardar($conexion,$software_nuevo);
    $software_adquisicion_controlador->guardar($conexion,$software_adquisicion_nuevo);

    header("Location: index.php");