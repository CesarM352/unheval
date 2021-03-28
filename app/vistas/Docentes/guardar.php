<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/DocentesController.php';

    $docentes_nuevo = [
        "codigodocente" => $_POST["codigo"],
        "celular" => $_POST["celular"],
        "dni" => $_POST["dni"],
        "direccion" => utf8_decode($_POST["direccion"]),
        "nombre" => utf8_decode($_POST["nombre"]),
        "codtipocontrato" => $_POST["codtipocontrato"],
        "user" => $_POST["dni"],
        "pass" => crypt($_POST["pass"],'$2a$07$usesomesillystringforsalt$')
    ];
    $docentes_controlador = new DocentesController;
    $docentes_controlador->guardar($conexion, $docentes_nuevo);

    header("Location: index.php");
?>