<?php

require_once '../../Conexion.php';
require_once '../../controladores/TecnicosController.php';

$numerocontrato= $_POST['numerocontrato'];

if (!$mysqli->query("delete from tecnicos where numerocontrato='$numerocontrato'")) {
    echo($mysqli->errno);
}else{
    echo('ok');
}

?>