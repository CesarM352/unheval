<?php

require_once '../../Conexion.php';
require_once '../../controladores/EstudiantesController.php';

$codigoestudiante= $_POST['codigoestudiante'];

if (!$mysqli->query("delete from estudiantes where codigoestudiante='$codigoestudiante'")) {
    echo($mysqli->errno);
}else{
    echo('ok');
}

?>