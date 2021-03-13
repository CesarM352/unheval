<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabAsistenciaController.php';

    $documento_controlador = new LabAsistenciaController;

    date_default_timezone_set('America/Lima');

    if( $_POST['idclases'] == '' || $_POST['idclases'] == 0 || $_POST['codigopatrimonio'] == '' ){
        echo "<script> history.go(-1) </script>";
    }else {
        //verificar si ya se registró:
            $sql_asistencia = "SELECT COUNT(*) AS cantidad FROM asistencias
            WHERE codigoalum_matri = 1 
            AND idclases = ".$_POST['idclases'];
            $result = ConexionController::consultar($conexion, $sql_asistencia)->fetch_object();
        if( $result->cantidad > 0 ){
            echo "Ya se registró su asistencia";
            echo "<a href='../LabEstudiante/registrar_asistencia.php'>Listo </a>";
        }
        else {
            $documento_nuevo = [
                "idasistencia" => $documento_controlador->calcularNuevoCodigo($conexion),
                "fecha" => date('Y-m-d'),
                "hora" => date('H:i:s'),
                "asistio" => 1,
                "idclases" => $_POST['idclases'],
                "codigoalum_matri" => '1',
                "nropc" => substr($_POST['codigopatrimonio'],8,4),
                "estadopc" => 1,
                "codigopatrimonio" => $_POST['codigopatrimonio'],
            ];
            $documento_controlador->guardar($conexion,$documento_nuevo);
        
            header("Location: ../LabEstudiante/registrar_asistencia.php");
        }
    }