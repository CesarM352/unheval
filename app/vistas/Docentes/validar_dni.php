<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/DocentesController.php';

    $salida="";
    
    if(isset($_POST['dni'])){
        $dni=$_POST['dni'];
        $docentes_controlador = new DocentesController;
        $docentes = $docentes_controlador->getAllDocentesDNI($conexion, $dni);
    
        if($docentes->num_rows > 0){
            $salida="¡El DNI ingresado ya esta registrado!";
        }else{
            $salida.="DNI válido";
        }
    }
    echo $salida;
?>