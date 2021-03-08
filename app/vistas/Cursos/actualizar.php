<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/CursosController.php';

    $codigocurso = $_GET['codigocurso'];
    $curso_actualizar = [
        "nombre" => utf8_decode($_POST["nombre"]),
        "descripcion" => utf8_decode($_POST["descripcion"]),
        "numerocredito" => $_POST["numerocredito"],
        "cursocarrera" => $_POST["cursocarrera"],
        "codigocarrera" => $_POST["codigocarrera"]
    ];
    $usuario_controlador = new CursosController;
    $usuario_controlador->actualizar($conexion,$codigocurso, $curso_actualizar);

    header("Location: index.php");
?>