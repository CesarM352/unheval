<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabLaboratorioEquipoController.php';

    $oficinacodigo = $_GET['oficinacodigo'];
    $codigo = $_POST['codigolaboratorioequipo'];

    $laboratorio_equipo_actualizar = [
        "estadopresente" => 0,
        "justificacionretiro" => $_POST["justificacionretiro"],
        "fecharetiro" => $_POST["fecharetiro"],
    ];
    $laboratorio_equipo_controlador = new LabLaboratorioEquipoController;
    $laboratorio_equipo_controlador->actualizar($conexion, $codigo, $laboratorio_equipo_actualizar);

    $laboratorio_equipo_nuevo = [
        "codigolaboratorioequipo" => $laboratorio_equipo_controlador->calcularNuevoCodigo($conexion),
        "codigooficina" => $_POST["codigooficina"],
        "fechaingreso" => $_POST["fecharetiro"],
        "estadopresente" => 1,
        "codigopatrimonio" => $_POST["codigopatrimonio"],
        "oficinaorigen" => $_POST["oficinaorigen"],
    ];
    $laboratorio_equipo_controlador->guardar($conexion, $laboratorio_equipo_nuevo);

    if($oficinacodigo == 0)
        header("Location: ../LabTecnico/ver_equipo_index.php");
    elseif ($oficinacodigo > 0) {
        header("Location: ../LabTecnico/ver_inventario.php?ambiente_id=$oficinacodigo");
    }