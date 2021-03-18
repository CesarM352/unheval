<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabSoftwareAdquisicionController.php';
    require_once '../../controladores/LabSoftwareAmbienteController.php';

    $software_adquisicion_controlador = new LabSoftwareAdquisicionController;
    $software_ambiente_controlador = new LabSoftwareAmbienteController;

    $software_ambiente_nuevo = [
        "codigooficina" => $_POST["ambiente_id"],
        "codigosoftware" => $software_adquisicion_controlador->getDocumento($conexion, $_POST['sel_sw_ad'])->getSoftwareId(),
        "fechainstalacion" => $_POST["fechainstalacion"],
        "nro_licencias" => $_POST["nro_licencias"],
        "softwareadquisicionid" => $software_adquisicion_controlador->getDocumento($conexion, $_POST['sel_sw_ad'])->getId(),
    ];
    $software_ambiente_controlador->guardar($conexion,$software_ambiente_nuevo);

    $software_adquisicion_edicion = [
        "nro_licencias_disponibles" => $software_adquisicion_controlador->getDocumento($conexion, $_POST['sel_sw_ad'])->getNroLicenciasDisponibles() - $_POST["nro_licencias"],
    ];
    $software_adquisicion_controlador->actualizar($conexion, $_POST['sel_sw_ad'], $software_adquisicion_edicion);

    header("Location: ../LabTecnico/ver_software.php?ambiente_id=".$_POST["ambiente_id"]);