<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabEquipoController.php';

    $oficinacodigo = $_GET['oficinacodigo'];
    $archivo = $_FILES["archivo"]["name"];

    if ($_FILES["archivo"]["name"] != ''){
        if( !file_exists('../../../public/doc/'.$_FILES["archivo"]["name"] ) ){
            move_uploaded_file($_FILES['archivo']['tmp_name'], '../../../public/doc/'.$_FILES["archivo"]["name"] );
        }
        /* else{
            echo "EL ARCHIVO YA EXISTE";
            exit();
        } */
    }
    else {
        echo "FALTA CARGAR EL ARCHIVO";
        exit();
    }

    $equipo_actualizar = [
        "codigoestado" => 2,
        "fechabaja" => $_POST["fechabaja"],
        "documentobaja" => $_FILES["archivo"]["name"],
    ];
    $equipo_controlador = new LabEquipoController;

    $codigos = explode(',',substr($_POST['codigos'],0,-1));

    foreach ($codigos as $key => $codigo) {
        $codigo_equipo .= $codigo.",";
        $equipo_controlador->actualizar($conexion,$codigo, $equipo_actualizar);
    }

    //header("Location: ../LabTecnico/ver_equipo_index.php");
    if($oficinacodigo == 0)
        header("Location: ../LabTecnico/ver_equipo_index.php");
    elseif ($oficinacodigo > 0) {
        //header("Location: ../LabTecnico/ver_inventario.php?ambiente_id=$oficinacodigo");
        header("Location: reporte_baja.php?ambiente_id=$oficinacodigo&codigos=$codigo_equipo&archivo=$archivo");
    }
