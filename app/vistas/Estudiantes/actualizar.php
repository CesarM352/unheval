<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/EstudiantesController.php';

    $codigoestudiante = $_GET["codigoestudiante"];
    $estudiante_actualizar = [
        "nombre" => utf8_decode($_POST["nombre"]),
        "user" => $_POST["user"],
        "pass" => $_POST["pass"],
        "anionacimiento" => $_POST["anionacimiento"],
        "fechaingreso" => $_POST["fechaingreso"],
        "dni" => $_POST["dni"],
        "celular" => $_POST["celular"],
        "email" => $_POST["email"]
    ];
    $estudiantes_controlador = new EstudiantesController;
    $estudiantes_controlador->actualizar($conexion,$codigoestudiante, $estudiante_actualizar);

    header("Location: index.php");
?>