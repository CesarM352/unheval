<?php

require_once '../../Conexion.php';
require_once '../../controladores/CursosController.php';

$codigocurso= $_GET['codigocurso'];
$cursos_controlador = new CursosController;
$cursos_controlador->eliminar($conexion, $codigocurso);

header("Location: index.php");

?>