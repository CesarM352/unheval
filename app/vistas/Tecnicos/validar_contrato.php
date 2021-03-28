<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/TecnicosController.php';

    $salida="";
    
    if(isset($_POST['contrato'])){
        $contrato=$_POST['contrato'];
        $tecnicos_controlador = new TecnicosController;
        $tecnicos = $tecnicos_controlador->getAlltecnicosContrato($conexion, $contrato);
    
        if($tecnicos->num_rows > 0){
            $salida="¡El N° de contrato ingresado ya esta registrado!";
        }else{
            $salida.="N° de contrato válido";
        }
    }
    echo $salida;
?>