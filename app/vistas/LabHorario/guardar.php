<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabHorarioController.php';
    require_once '../../controladores/CursosController.php';
    require_once '../../controladores/GruposController.php';
    require_once '../../controladores/DocentesController.php';

    $mantenimiento_controlador = new LabHorarioController;
    $curso_controlador = new CursosController;
    $grupo_controlador = new GruposController;
    $docente_controlador = new DocentesController;

    if( $mantenimiento_controlador->cantidadHorarios($conexion, $_POST["tipo_horario"], $_POST["nro_dia"], $_POST["hora_inicio"], $_POST["hora_fin"], $_POST["fecha"], $_POST["ambiente_id"]) > 0){
        echo "Este horario está ocupado"; die();
    }

    $nuevo_codigo_horario = $mantenimiento_controlador->calcularNuevoCodigo($conexion);
    $dias = ['LUNES','MARTES','MIÉRCOLES','JUEVES','VIERNES','SÁBADO','DOMINGO'];

    if( $_POST["tipo_horario"] == 'CLASE' ){
        $horario_nuevo = [
            "codigohorario" => $nuevo_codigo_horario,
            "fechainicio" => date('Y-m-d'),
            "fechafinal" => date('Y-m-d'),
            "codigodocente" => $_POST["docente_clase"],
            "codigogrupo" => $_POST["curso_clase"],
            "codigocurso" => $grupo_controlador->getGrupo($conexion, $_POST["curso_clase"])->getCodigocurso(),
            "codigooficina" => $_POST["ambiente_id"],
            "semestre" => '2021-I',
            "nro_dia" => $_POST["nro_dia"],
            "hora_inicio" => $_POST["hora_inicio"],
            "hora_fin" => $_POST["hora_fin"],
            "curso" => $curso_controlador->getCurso($conexion, $grupo_controlador->getGrupo($conexion, $_POST["curso_clase"])->getCodigocurso())->getNombre(),
            "docente" => $docente_controlador->getDocente($conexion, $_POST["docente_clase"])->getNombre(),
            "tipo_horario" => 1,
        ];
    }
    else {
        $day_temp = date_create($_POST["fecha"]);
        $horario_nuevo = [
            "codigohorario" => $nuevo_codigo_horario,
            "fechainicio" => date('Y-m-d'),
            "fechafinal" => date('Y-m-d'),
            "codigodocente" => '0000',
            "codigogrupo" => '0000',
            "codigocurso" => '000000',
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

    if( $_POST["tipo_horario"] == 'CLASE' ){
        require_once '../../controladores/LabClaseController.php';
        $clase_controlador = new LabClaseController;
        $clase_nuevo = [
            "idclases" => $clase_controlador->calcularNuevoCodigo($conexion),
            "dia" => $dias[$_POST["nro_dia"]-1],
            "horainicio" => $_POST["hora_inicio"],
            "horafin" => $_POST["hora_fin"],
            "codigohorario" => $nuevo_codigo_horario,
        ];
        $clase_controlador->guardar($conexion,$clase_nuevo);
    }

    if( $_POST['perfil'] == 'tecnico' )
        header("Location: ../LabTecnico/ver_horario.php?ambiente_id=".$_POST["ambiente_id"]);
    elseif( $_POST['perfil'] == 'secretaria' )
        header("Location: ../LabSecretaria/ver_horario.php?ambiente_id=".$_POST["ambiente_id"]);