<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/TecnicosController.php';

    $numerocontrato = $_GET["numerocontrato"];
    if($_POST["pass"]!=""){
        $tecnico_actualizar = [
            "nombre" => utf8_decode($_POST["nombre"]),
            "user" => $_POST["dni"],
            "pass" => crypt($_POST["pass"],'$2a$07$usesomesillystringforsalt$'),
            "anionacimiento" => $_POST["anionacimiento"],
            "celular" => $_POST["celular"],
            "fechainicio" => $_POST["fechainicio"],
            "dni" => $_POST["dni"],
            "fechacaduca" => $_POST["fechacaduca"]
        ];
    }else{
        $tecnico_actualizar = [
            "nombre" => utf8_decode($_POST["nombre"]),
            "user" => $_POST["dni"],
            "anionacimiento" => $_POST["anionacimiento"],
            "celular" => $_POST["celular"],
            "fechainicio" => $_POST["fechainicio"],
            "dni" => $_POST["dni"],
            "fechacaduca" => $_POST["fechacaduca"]
        ];
    }
    $tecnicos_controlador = new TecnicosController;
    $tecnicos_controlador->actualizar($conexion,$numerocontrato, $tecnico_actualizar);

    header("Location: index.php");
?>