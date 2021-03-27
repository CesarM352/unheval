<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/TecnicosController.php';

    $salida="";
    
    if(isset($_POST['dni'])){
        $dni=$_POST['dni'];
        $tecnicos_controlador = new TecnicosController;
        $tecnicos = $tecnicos_controlador->getAllTecnicosDNI($conexion, $dni);
    
        if($tecnicos->num_rows > 0){
            $salida="¡El DNI ingresado ya esta registrado!";
        }else{
            $salida.="DNI válido";
        }
    }
    echo $salida;
?>