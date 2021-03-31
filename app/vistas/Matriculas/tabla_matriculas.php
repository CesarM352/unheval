<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/MatriculasController.php';

    $salida="";
    if(isset($_POST['matricula'])){
        $term=utf8_decode($_POST['matricula']);
        $matriculas_controlador = new MatriculasController;
        $matriculas = $matriculas_controlador->getAllMatriculasComplete($conexion, $term);
    }else{
        $matriculas_controlador = new MatriculasController;
        $matriculas = $matriculas_controlador->getAllMatriculas($conexion);
    }

    if($matriculas->num_rows > 0){
        $salida.="<table class='table table-bordered table-hover' id='matriculas'>
                    <thead>
                        <tr style='text-align: center'>
                            <th>Código Matrícula</th>
                            <th>Estudiante</th>
                            <th>Curso</th>
                            <th>Grupo</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach ($matriculas as $key => $matricula) {
        $salida.="  <tr style='text-align: center'>
                        <td>".$matricula['codigomatricula']."</td>
                        <td>".utf8_encode($matricula['estudiante_nombre'])."</td>
                        <td>".utf8_encode($matricula['curso_nombre'])."</td>
                        <td>".$matricula['codigocurso']."</td>
                    </tr>";
                    }
        $salida.="  </tbody>
                </table><br>
                <script>
                    $(function () {
                        $('#matriculas').DataTable({
                            'lengthMenu': [[15, 25, 50, -1], [15, 25, 50, 'All']],
                            'paging': true,
                            'lengthChange': true,
                            'searching': false,
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
        $salida.="<div style='text-align:center'><h5>No registrado</h5></div>";
    }
    echo $salida;
?>

