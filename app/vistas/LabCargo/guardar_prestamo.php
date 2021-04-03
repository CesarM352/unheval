<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabCargoController.php';
    require_once '../../controladores/LabDetalleCargoController.php';

    session_start();
    /* temporal*/
    $_SESSION["codigo"]=1;
    /* fin temporal*/

    if ($_FILES["archivo"]["name"] != ''){
        $documento = $_FILES["archivo"]["name"];
        if( !file_exists('../../../public/doc_prestamo/'.$_FILES["archivo"]["name"] ) ){
            move_uploaded_file($_FILES['archivo']['tmp_name'], '../../../public/doc_prestamo/'.$_FILES["archivo"]["name"] );
        }
        /* else{
            echo "EL ARCHIVO YA EXISTE";
            exit();
        } */
    }
    else {
        $documento = null;
    }

    $cargo_nuevo = [
        "idusuarioresponsable" => $_SESSION["codigo"],
        "fechahoraprestamo" => $_POST["fechahoraprestamo"],
        "idusuarioquesepresta" => ($_POST["fechahoraprestamo"] == '' || $_POST["fechahoraprestamo"] == -1) ? NULL : $_POST["fechahoraprestamo"],
        "nombrequesepresta" => $_POST["nombrequesepresta"],
        "idtipo_caso" => $_POST["idtipo_caso"],
        "detalles" => $_POST["detalles"],
        /* "estadosolicitud" => "APROBADO",
        "fechahorasolicitud" => $_POST["fechahoraprestamo"], */
        "documento" => $documento,
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

    header("Location: ../LabTecnico/ver_prestamo_index.php");