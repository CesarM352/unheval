<?php

require_once '../../Conexion.php';
require_once '../../controladores/EstudiantesController.php';

$codigoestudiante= $_GET['codigoestudiante'];
$estudiantes_controlador = new EstudiantesController;
$estudiantes_controlador->eliminar($conexion, $codigoestudiante);

header("Location: index.php");

?>