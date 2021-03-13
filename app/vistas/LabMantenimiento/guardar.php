<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabMantenimientoController.php';
    require_once '../../controladores/LabTipoProblemaController.php';

    //Calcular el nuevo código
    $mantenimiento_controlador = new LabMantenimientoController;

    $tipo_problema_controlador = new LabTipoProblemaController;
    $tipo_problema = $tipo_problema_controlador->getTipoProblema($conexion,$_POST["codigoasunto"]);

    $mantenimiento_nuevo = [
        "codigoproblema" => $mantenimiento_controlador->calcularNuevoCodigo($conexion),
        "fechareporte" => date('Y-m-d H:i:s'),
        "codigoestudiante" => '1',
        "detalles" => $_POST["detalles"],
        "codigoasunto" => $_POST["codigoasunto"],
        "codigopatrimonio" => $_POST["codigopatrimonio"],
        //"codigooficina" => $_POST["codigooficina"],
        "usuario" => 'mi nombre',
        "estado" => 'PENDIENTE',
        "tipo_problema" => $tipo_problema->getNombre(),
    ];
    $mantenimiento_controlador->guardar($conexion,$mantenimiento_nuevo);

    if( $_POST['perfil'] == 'tecnico' )
        header("Location: ../LabTecnico/ver_mantenimiento.php");
    elseif( $_POST['perfil'] == 'estudiante' )
        header("Location: ../LabEstudiante/registrar_problema.php?registrado=1");