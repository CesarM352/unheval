<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/TecnicosController.php';

    $tecnicos_nuevo = [
        "numerocontrato" => utf8_decode($_POST["numerocontrato"]),
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
    $tecnicos_controlador->guardar($conexion, $tecnicos_nuevo);

    header("Location: index.php");
?>