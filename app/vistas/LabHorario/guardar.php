<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabHorarioController.php';

    $mantenimiento_controlador = new LabHorarioController;

    if( $_POST["tipo_horario"] == 'CLASE' ){
        $horario_nuevo = [
            "codigohorario" => $mantenimiento_controlador->calcularNuevoCodigo($conexion),
            "fechainicio" => date('Y-m-d'),
            "fechafinal" => date('Y-m-d'),
            "codigodocente" => 1,
            "codigogrupo" => 1,
            "codigocurso" => 2,
            "codigooficina" => $_POST["ambiente_id"],
            "semestre" => '2021-I',
            "nro_dia" => $_POST["nro_dia"],
            "hora_inicio" => $_POST["hora_inicio"],
            "hora_fin" => $_POST["hora_fin"],
            "curso" => $_POST["curso_clase"],
            "docente" => $_POST["docente_clase"],
            "tipo_horario" => 1,
        ];
    }
    else {
        $day_temp = date_create($_POST["fecha"]);
        $horario_nuevo = [
            "codigohorario" => $mantenimiento_controlador->calcularNuevoCodigo($conexion),
            "fechainicio" => date('Y-m-d'),
            "fechafinal" => date('Y-m-d'),
            "codigodocente" => 1,
            "codigogrupo" => 1,
            "codigocurso" => 2,
            "codigooficina" => $_POST["ambiente_id"],
            "semestre" => '2021-I',
            "nro_dia" => date_format($day_temp, 'N'),
            "hora_inicio" => $_POST["hora_inicio"],
            "hora_fin" => $_POST["hora_fin"],
            "curso" => $_POST["curso_prestamo"],
            "docente" => $_POST["docente_prestamo"],
            "tipo_horario" => 2,
            "fecha" => $_POST["fecha"],
        ];
    }
    $mantenimiento_controlador->guardar($conexion,$horario_nuevo);

    if( $_POST['perfil'] == 'tecnico' )
        header("Location: ../LabTecnico/ver_horario.php?ambiente_id=".$_POST["ambiente_id"]);
    elseif( $_POST['perfil'] == 'secretaria' )
        header("Location: ../LabSecretaria/ver_horario.php?ambiente_id=".$_POST["ambiente_id"]);