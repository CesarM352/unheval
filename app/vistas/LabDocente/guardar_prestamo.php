<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabCargoController.php';
    require_once '../../controladores/LabDetalleCargoController.php';

    session_start();
    /* temporal*/
    $_SESSION["codigo"]=1;
    /* fin temporal*/

    $cargo_nuevo = [
        "idusuarioresponsable" => '005',
        "idusuarioquesepresta" => $_SESSION["codigo"],
        "idtipo_caso" => 1,
        "detalles" => $_POST["detalles"],
        "estadosolicitud" => "SOLICITADO",
        "fechahorasolicitud" => date("Y-m-d H:i:s"),
    ];
    $cargo_controlador = new LabCargoController;
    $guardado = $cargo_controlador->guardar($conexion, $cargo_nuevo);
    $codigo_cargo_nuevo = $conexion ["var_conexion"]->insert_id;

    $equipos = explode(",",$_POST["equipos_seleccionados"]);
    $detalle_cargo_controlador = new LabDetalleCargoController;

    foreach ($equipos as $key => $equipo) {
        if( $equipo != ''){
            $detalle_cargo_nuevo = [
                "idcargo" => $codigo_cargo_nuevo,
                "codigopatrimonio" => $equipo,
                "estadoprestamo" => "NO DEVUELTO",
            ];
            $detalle_cargo_controlador->guardar($conexion, $detalle_cargo_nuevo);
        }
    }

    header("Location: index_prestamos.php");