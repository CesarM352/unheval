<?php

require_once '../../Conexion.php';
require_once '../../controladores/TecnicosController.php';

$numerocontrato= $_GET['numerocontrato'];
$tecnicos_controlador = new TecnicosController;
$tecnicos_controlador->eliminar($conexion, $numerocontrato);

header("Location: index.php");

?>