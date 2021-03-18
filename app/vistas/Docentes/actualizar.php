<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/DocentesController.php';

    $codigodocente = $_GET["codigodocente"];
    echo $codigodocente;
    $docente_actualizar = [
        //"codigodocente" => $_POST["codigo"],
        "celular" => $_POST["celular"],
        "dni" => $_POST["dni"],
        "direccion" => utf8_decode($_POST["direccion"]),
        "nombre" => utf8_decode($_POST["nombre"]),
        "codtipocontrato" => $_POST["codtipocontrato"],
        "user" => $_POST["user"],
        "pass" => $_POST["pass"]
    ];
    $docentes_controlador = new DocentesController;
    $docentes_controlador->actualizar($conexion,$codigodocente, $docente_actualizar);

    header("Location: index.php");
?>