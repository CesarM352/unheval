<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/EstudiantesController.php';

    $salida="";
    
    if(isset($_POST['dni'])){
        $dni=$_POST['dni'];
        $estudiantes_controlador = new EstudiantesController;
        $estudiantes = $estudiantes_controlador->getAllEstudiantesDNI($conexion, $dni);
    
        if($estudiantes->num_rows > 0){
            $salida="¡El DNI ingresado ya esta registrado!";
        }else{
            $salida.="DNI válido";
        }
    }
    echo $salida;
?>