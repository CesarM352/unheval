<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabEquipoController.php';
    require_once '../../controladores/LabLaboratorioEquipoController.php';
    require_once '../../controladores/LabTipoEquipoController.php';

    //$oficinacodigo = $_GET['oficinacodigo'];

    $tipo_equipo = (new LabTipoEquipoController)->getTipoEquipo($conexion, $_POST["codtipoequipo"] );
    $fecha_ini = date_create($_POST["fechaingreso"]);
    date_add($fecha_ini, date_interval_create_from_date_string( $tipo_equipo->getTiempoObsolecencia().' years'));

    $equipo_nuevo = [
        "codigopatrimonio" => $_POST["codigopatrimonialinicial"].$_POST["codigopatrimonio"],
        "descripcion" => $_POST["descripcion"],
        "ram" => $_POST["ram"],
        "procesador" => $_POST["procesador"],
        "hdd" => $_POST["hdd"],
        "ssd" => $_POST["ssd"],
        "fechaingreso" => $_POST["fechaingreso"],
        "tarjetavideo" => $_POST["tarjetavideo"],
        "rfid" => $_POST["rfid"],
        "estadoperativo" => $_POST["estadoperativo"],
        "fechacaduca" => $fecha_ini->format('Y-m-d H:i:s.u'),
        "codtipoingreso" => $_POST["codtipoingreso"],
        "codtipoequipo" => $_POST["codtipoequipo"],
        "codigoestado" => $_POST["codigoestado"],
        "color" => $_POST["color"],
        "modelo" => $_POST["modelo"],
        "serie" => $_POST["serie"],
        "resolucion" => $_POST["resolucion"],
        "conectividad" => $_POST["conectividad"],
        "tipoestabilizador" => $_POST["tipoestabilizador"],
    ];
    $equipo_controlador = new LabEquipoController;
    $equipo_controlador->guardar($conexion, $equipo_nuevo);

    $laboratorio_equipo_controlador = new LabLaboratorioEquipoController;
    $laboratorio_equipo_nuevo = [
        "codigolaboratorioequipo" => $laboratorio_equipo_controlador->calcularNuevoCodigo($conexion),
        "codigooficina" => $_POST["codigooficina"],
        "fechaingreso" => $_POST["fechaingreso"],
        "estadopresente" => 1,
        "codigopatrimonio" => $_POST["codigopatrimonialinicial"].$_POST["codigopatrimonio"],
    ];
    $laboratorio_equipo_controlador->guardar($conexion, $laboratorio_equipo_nuevo);

    header("Location: ../LabTecnico/ver_equipo_index.php");