<?php

require_once '../../Conexion.php';
require_once '../../controladores/DocentesController.php';

$codigodocente= $_GET['codigodocente'];
$docentes_controlador = new DocentesController;
$docentes_controlador->eliminar($conexion, $codigodocente);

header("Location: index.php");

?>