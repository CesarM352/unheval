<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/DocentesController.php';

    $codigodocente = $_GET["codigodocente"];
    if($_POST["pass"]!=""){
        $docente_actualizar = [
            //"codigodocente" => $_POST["codigo"],
            "celular" => $_POST["celular"],
            "dni" => $_POST["dni"],
            "direccion" => utf8_decode($_POST["direccion"]),
            "nombre" => utf8_decode($_POST["nombre"]),
            "codtipocontrato" => $_POST["codtipocontrato"],
            "user" => $_POST["dni"],
            "pass" => crypt($_POST["pass"],'$2a$07$usesomesillystringforsalt$')
        ];
    }else{
        $docente_actualizar = [
            //"codigodocente" => $_POST["codigo"],
            "celular" => $_POST["celular"],
            "dni" => $_POST["dni"],
            "direccion" => utf8_decode($_POST["direccion"]),
            "nombre" => utf8_decode($_POST["nombre"]),
            "codtipocontrato" => $_POST["codtipocontrato"],
            "user" => $_POST["dni"]
        ];
    }
    $docentes_controlador = new DocentesController;
    $docentes_controlador->actualizar($conexion,$codigodocente, $docente_actualizar);

    header("Location: index.php");
?>