<?php

require_once '../../Conexion.php';
require_once '../../controladores/DocentesController.php';

$codigodocente= $_POST['codigodocente'];

if (!$mysqli->query("delete from docentes where codigodocente='$codigodocente'")) {
    echo($mysqli->errno);
}else{
    echo('ok');
}

?>