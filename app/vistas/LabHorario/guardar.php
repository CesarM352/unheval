<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabHorarioController.php';

    if( $_POST["tipo_horario"] == 'CLASE' ){
        $horario_nuevo = [
            "semestre" => '2021-I',
            "ambiente_id" => $_POST["ambiente_id"],
            "nro_dia" => $_POST["nro_dia"],
            "hora_inicio" => $_POST["hora_inicio"],
            "hora_fin" => $_POST["hora_fin"],
            "curso" => $_POST["curso_clase"],
            "docente" => $_POST["docente_clase"],
            "tipo_horario" => 1,
        ];
    }
    else {
        $horario_nuevo = [
            "semestre" => '2021-I',
            "ambiente_id" => $_POST["ambiente_id"],
            "nro_dia" => 1,
            "hora_inicio" => $_POST["hora_inicio"],
            "hora_fin" => $_POST["hora_fin"],
            "curso" => $_POST["curso_prestamo"],
            "docente" => $_POST["docente_prestamo"],
            "tipo_horario" => 2,
            "fecha" => $_POST["fecha"],
        ];
    }
    
    $mantenimiento_controlador = new LabHorarioController;
    $mantenimiento_controlador->guardar($conexion,$horario_nuevo);

    header("Location: ../LabTecnico/ver_horario.php?ambiente_id=".$_POST["ambiente_id"]);