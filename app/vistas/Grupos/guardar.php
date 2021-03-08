<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/GruposController.php';

    $codigo_curso=$_GET['codigocurso'];
    $nombre_escuela=$_GET['carrera'];
    $nombre_curso=$_GET['nombre'];

    $grupo_nuevo = [
        "codigogrupo" => $_POST["codigogrupo"],
        "nombre" => utf8_decode($_POST["nombre"]),
        "numeroalumnos" => $_POST["numeroalumnos"],
        "maximoalumnos" => $_POST["maximoalumnos"],
        "codigodocente" => $_POST["codigodocente"],
        "codigocurso" => $_POST["codigocurso"]
    ];
    $grupo_controlador = new GruposController;
    $grupo_controlador->guardar($conexion, $grupo_nuevo);

    header("Location: index.php?codigocurso=".$codigo_curso."&carrera=".$nombre_escuela."&nombre=".$nombre_curso."");
?>