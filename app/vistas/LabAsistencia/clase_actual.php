<?php 
    require_once '../../Conexion.php';
    include_once '../../controladores/LabClaseController.php';
    $clase_controlador = new LabClaseController;

    $codigooficina = $_GET['codigooficina'];
    $clases =  $clase_controlador->claseHoy($conexion,$codigooficina);

    $retorno = [0,''];

    foreach ($clases as $key => $value) {
        $retorno = [$value['idclases'], $value['curso_nombre']];
    }

    echo json_encode($retorno);