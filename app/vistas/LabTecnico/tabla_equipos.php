<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabEquipoController.php';

    
    $salida="";

    if(isset($_POST["equipo"])){

        if($_POST["equipo"]==4){
            $equipos_controlador = new LabEquipoController;
            $equipos = $equipos_controlador->equiposEnBaja($conexion, 0);

            if($equipos->num_rows > 0){
                $salida.="<br><table class='table table-bordered table-hover' id='baja'>
                            <thead>
                                <tr style='text-align: center'>
                                    <th>CÓDIGO</th>
                                    <th>DESCRIPCIÓN</th>
                                    <th>TIPO</th>
                                    <th>FECHA BAJA</th>
                                    <th>DOCUMENTO</th>
                                </tr>
                            </thead>
                            <tbody>";
                            foreach ($equipos as $key => $equipo) {
                $salida.="  <tr style='text-align: center'>
                                <td>".$equipo["codigopatrimonio"]."</td>
                                <td>".$equipo["descripcion"]."</td>
                                <td>".$equipo["equipo_tipo"]."</td>
                                <td>".$equipo["fechabaja"]."</td>
                                <td> <a href='../../../public/doc/".$equipo["documentobaja"]."'>".$equipo["documentobaja"]."</a></td>
                            </tr>";
                            }
                $salida.="  </tbody>
                        </table>
                        <script>
                            $(function () {
                                $('#baja').DataTable({
                                    'lengthMenu': [[15, 25, 50, -1], [15, 25, 50, 'All']],
                                    'paging': true,
                                    'lengthChange': true,
                                    'searching': true,
                                    'ordering': false,
                                    'info': true,
                                    'autoWidth': false,
                                    'responsive': true,
                                    
                                    'language': {
                                        'info': 'Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas',
                                        'lengthMenu': 'Mostrar _MENU_ registros',
                                        'paginate': {
                                            'first': 'Primeros',
                                            'last': 'Ultimos',
                                            'next': 'Siguiente',
                                            'previous': 'Anterior'
                                        },
                                    },
                                });
                            });
                        </script>";
            }else{
                $salida.="<br><div style='text-align:center'><h5>No hay registros</h5></div>";
            }
            echo $salida;


        }else{
            if($_POST["equipo"]==1){
                $equipos_controlador = new LabEquipoController;
                $equipos = $equipos_controlador->equiposActivos($conexion, 0);
            }
            if($_POST["equipo"]==2){
                $equipos_controlador = new LabEquipoController;
                $equipos = $equipos_controlador->equiposPorVencer($conexion);
            }
            if($_POST["equipo"]==3){
                $equipos_controlador = new LabEquipoController;
                $equipos = $equipos_controlador->equiposObsoletos($conexion);
            }
                if($equipos->num_rows > 0){
                    $salida.="<br><table class='table table-bordered table-hover' id='vigentes'>
                                <thead>
                                    <tr style='text-align: center'>
                                        <th>CÓDIGO</th>
                                        <th>DESCRIPCIÓN</th>
                                        <th>TIPO</th>
                                        <th>ESTADO</th>
                                        <th>UBICACIÓN</th>
                                    </tr>
                                </thead>
                                <tbody>";
                                foreach ($equipos as $key => $equipo) {
                    $salida.="  <tr style='text-align: center'>
                                    <td>".$equipo["codigopatrimonio"]."</td>
                                    <td>".$equipo["descripcion"]."</td>
                                    <td>".$equipo["equipo_tipo"]."</td>
                                    <td>".$equipo["equipo_estado"]."</td>
                                    <td>".$equipo["ambiente_nombre"]."</td>
                                </tr>";
                                }
                    $salida.="  </tbody>
                            </table>
                            <script>
                                $(function () {
                                    $('#vigentes').DataTable({
                                        'lengthMenu': [[15, 25, 50, -1], [15, 25, 50, 'All']],
                                        'paging': true,
                                        'lengthChange': true,
                                        'searching': true,
                                        'ordering': false,
                                        'info': true,
                                        'autoWidth': false,
                                        'responsive': true,
                                        
                                        'language': {
                                            'info': 'Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas',
                                            'lengthMenu': 'Mostrar _MENU_ registros',
                                            'paginate': {
                                                'first': 'Primeros',
                                                'last': 'Ultimos',
                                                'next': 'Siguiente',
                                                'previous': 'Anterior'
                                            },
                                        },
                                    });
                                });
                            </script>";
                }else{
                    $salida.="<br><div style='text-align:center'><h5>No hay registros</h5></div>";
                }
                echo $salida;
        }
    }else{
        $equipos_controlador = new LabEquipoController;
        $equipos = $equipos_controlador->getAllEquipos($conexion);

        if($equipos->num_rows > 0){
            $salida.="<br><table class='table table-bordered table-hover' id='baja'>
                        <thead>
                            <tr style='text-align: center'>
                                <th>CÓDIGO</th>
                                <th>DESCRIPCIÓN</th>
                                <th>TIPO</th>
                                <th>ESTADO</th>
                                <th>UBICACIÓN</th>
                            </tr>
                        </thead>
                        <tbody>";
                        foreach ($equipos as $key => $equipo) {
            $salida.="  <tr style='text-align: center'>
                            <td>".$equipo["codigopatrimonio"]."</td>
                            <td>".$equipo["descripcion"]."</td>
                            <td>".$equipo["equipo_tipo"]."</td>
                            <td>".$equipo["equipo_estado"]."</td>
                            <td>".$equipo["ambiente_nombre"]."</td>
                        </tr>";
                        }
            $salida.="  </tbody>
                    </table>
                    <script>
                        $(function () {
                            $('#baja').DataTable({
                                'lengthMenu': [[15, 25, 50, -1], [15, 25, 50, 'All']],
                                'paging': true,
                                'lengthChange': true,
                                'searching': true,
                                'ordering': false,
                                'info': true,
                                'autoWidth': false,
                                'responsive': true,
                                
                                'language': {
                                    'info': 'Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas',
                                    'lengthMenu': 'Mostrar _MENU_ registros',
                                    'paginate': {
                                        'first': 'Primeros',
                                        'last': 'Ultimos',
                                        'next': 'Siguiente',
                                        'previous': 'Anterior'
                                    },
                                },
                            });
                        });
                    </script>";
        }else{
            $salida.="<br><div style='text-align:center'><h5>No hay registros</h5></div>";
        }
        echo $salida;
    }
?>