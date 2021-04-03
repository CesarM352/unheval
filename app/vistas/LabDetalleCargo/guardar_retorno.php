<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabCargoController.php';
    require_once '../../controladores/LabDetalleCargoController.php';

    $detalle_cargo_actualizar = [
        "estadoprestamo" => 'DEVUELTO',
    ];
    $detalle_cargo_controlador = new LabDetalleCargoController;

    foreach ($_POST['equipos'] as $key => $codigo) {
        $detalle_cargo_controlador->actualizar($conexion,$codigo, $detalle_cargo_actualizar);
    }
 
    $cargo_actualizar = [
        "fechahoaretorno" => ( count($_POST["equipos"]) == $_POST["cantidad_checks"] ) ? $_POST["fechahoaretorno"] : null,
    ];
    $cargo_controlador = new LabCargoController;
    $cargo_controlador->actualizar($conexion, $_POST['idcargo'], $cargo_actualizar);

    header("Location: ../LabTecnico/ver_prestamo_index.php");