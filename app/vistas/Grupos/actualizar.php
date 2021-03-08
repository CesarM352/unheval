<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/GruposController.php';

    $codigo_curso=$_GET['codigocurso'];
    $codigogrupo = $_GET['codigogrupo'];
    $nombre_escuela=$_GET['carrera'];
    $nombre_curso=$_GET['nombre'];
    
    $grupo_actualizar = [
        "nombre" => utf8_decode($_POST["nombre"]),
        "numeroalumnos" => $_POST["numeroalumnos"],
        "maximoalumnos" => $_POST["maximoalumnos"],
        "codigodocente" => $_POST["codigodocente"]
    ];
    $grupo_controlador = new GruposController;
    $grupo_controlador->actualizar($conexion,$codigogrupo, $grupo_actualizar);

    header("Location: index.php?codigocurso=".$codigo_curso."&carrera=".$nombre_escuela."&nombre=".$nombre_curso."");
?>