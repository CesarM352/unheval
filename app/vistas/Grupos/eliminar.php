<?php

require_once '../../Conexion.php';
require_once '../../controladores/GruposController.php';

$codigogrupo= $_GET['codigogrupo'];
$codigo_curso=$_GET['codigocurso'];
$nombre_escuela=$_GET['carrera'];
$nombre_curso=$_GET['nombre'];
$grupos_controlador = new GruposController;
$grupos_controlador->eliminar($conexion, $codigogrupo);

header("Location: index.php?codigocurso=".$codigo_curso."&carrera=".$nombre_escuela."&nombre=".$nombre_curso."");

?>