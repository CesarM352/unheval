<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/GruposController.php';

    $salida="";
    
    if(isset($_POST['nombre'])){
        $codigo_curso=$_POST['codigo'];
        $nombre=$_POST['nombre'];
        $grupos_controlador = new GruposController;
        $grupos = $grupos_controlador->getAllGruposCursoIdComplete($conexion, $codigo_curso, $nombre);
    
        if($grupos->num_rows > 0){
            $salida="¡Ya existe un grupo con ese nombre!";
        }else{
            $salida.="Nombre válido";
        }
    }
    echo $salida;
?>