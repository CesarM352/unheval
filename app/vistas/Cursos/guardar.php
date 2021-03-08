<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/CursosController.php';

    $curso_nuevo = [
        "codigocurso" => $_POST["codigocurso"],
        "nombre" => utf8_decode($_POST["nombre"]),
        "descripcion" => utf8_decode($_POST["descripcion"]),
        "numerocredito" => $_POST["numerocredito"],
        "cursocarrera" => $_POST["cursocarrera"],
        "codigocarrera" => $_POST["codigocarrera"]
    ];
    $curso_controlador = new CursosController;
    $curso_controlador->guardar($conexion, $curso_nuevo);

    header("Location: index.php");
?>