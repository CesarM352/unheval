<?php 
    require_once '../../Conexion.php';
    $get_codigooficina = $_GET['codigooficina'];

    if( $get_codigooficina == '' )
        $get_codigooficina = 0;

    $sql_documento = "SELECT t.*, 
                                o.codigooficina AS ambiente_codigooficina,
                                o.nombre AS ambiente_nombre,
                                te.nombre AS equipo_tipo,
                                ee.nombre AS equipo_estado
                                FROM equipos AS t 
                                INNER JOIN laboratorios_equipo le ON t.codigopatrimonio = le.codigopatrimonio
                                INNER JOIN oficina o ON le.codigooficina = o.codigooficina
                                INNER JOIN tipoequipos te ON t.codtipoequipo = te.codtipoequipo
                                INNER JOIN estadoequipo ee ON t.codigoestado = ee.codigoestado
                                WHERE ee.nombre <> 'BAJA' AND le.estadopresente = 1 AND le.codigooficina = ".$get_codigooficina;

    $datos = ConexionController::consultar($conexion, $sql_documento);

    $retorno[] = ['id' => '', 'text' => 'Seleccione'];

    foreach ($datos as $key => $value) {
        $retorno[] = ['id' => $value['codigopatrimonio'], 'text' => $value['codigopatrimonio'], "text" => $value['codigopatrimonio']." ".$value['equipo_tipo']." ".$value['descripcion'] ];
    }

    echo json_encode($retorno);