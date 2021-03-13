<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/DocentesController.php';

    $docentes_nuevo = [
        "codigodocente" => $_POST["codigo"],
        "celular" => $_POST["celular"],
        "dni" => $_POST["dni"],
        "codigodireccion" => $_POST["codigodireccion"],
        "nombre" => utf8_decode($_POST["nombre"]),
        "codtipocontrato" => $_POST["codtipocontrato"],
        "user" => $_POST["user"],
        "pass" => $_POST["pass"]
    ];
    $docentes_controlador = new DocentesController;
    $docentes_controlador->guardar($conexion, $docentes_nuevo);

    header("Location: index.php");
?>