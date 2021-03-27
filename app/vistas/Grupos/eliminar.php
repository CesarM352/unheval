<?php

require_once '../../Conexion.php';
require_once '../../controladores/GruposController.php';

//try{
    $codigo_grupo= $_POST['cod_grupo'];
    //$codigo_curso=$_POST['cod_curso'];
    //$nombre_escuela=$_POST['escuela'];
    //$nombre_curso=$_POST['curso'];

    /*$codigogrupo= $_GET['codigogrupo'];
    $codigo_curso=$_GET['codigocurso'];
    $nombre_escuela=$_GET['carrera'];
    $nombre_curso=$_GET['nombre'];*/
    //$grupos_controlador = new GruposController;
    //$a=$grupos_controlador->eliminar($conexion, $codigo_grupo);
    //var_dump($a);

    if (!$mysqli->query("delete from grupos where codigogrupo='$codigo_grupo'")) {
        echo($mysqli->errno);
    }else{
        echo('ok');
    }

    //header("Location: index.php?codigocurso=".$codigo_curso."&carrera=".$nombre_escuela."&nombre=".$nombre_curso."");
    //include('index.php');

    /*if($a)
        return 1;
}
catch (Exception $e){
    echo $e->getMessage();
}*/
?>