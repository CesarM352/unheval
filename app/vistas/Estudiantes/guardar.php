<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/EstudiantesController.php';

    $estudiante_nuevo = [
        "codigoestudiante" => $_POST["codigoestudiante"],
        "nombre" => utf8_decode($_POST["nombre"]),
        "user" => $_POST["dni"],
        "pass" => crypt($_POST["pass"],'$2a$07$usesomesillystringforsalt$'),
        "anionacimiento" => $_POST["anionacimiento"],
        "fechaingreso" => $_POST["fechaingreso"],
        "dni" => $_POST["dni"],
        "celular" => $_POST["celular"],
        "email" => $_POST["email"]
    ];
    $estudiantes_controlador = new EstudiantesController;
    $estudiantes_controlador->guardar($conexion, $estudiante_nuevo);

    header("Location: index.php");
?>