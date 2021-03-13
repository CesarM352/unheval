<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/TecnicosController.php';

    $numerocontrato = $_GET["numerocontrato"];
    $tecnico_actualizar = [
        "nombre" => utf8_decode($_POST["nombre"]),
        "user" => $_POST["user"],
        "pass" => $_POST["pass"],
        "anionacimiento" => $_POST["anionacimiento"],
        "celular" => $_POST["celular"],
        "fechainicio" => $_POST["fechainicio"],
        "dni" => $_POST["dni"],
        "fechacaduca" => $_POST["fechacaduca"]
    ];
    $tecnicos_controlador = new TecnicosController;
    $tecnicos_controlador->actualizar($conexion,$numerocontrato, $tecnico_actualizar);

    header("Location: index.php");
?>