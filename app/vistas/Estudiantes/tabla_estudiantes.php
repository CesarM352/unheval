<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/EstudiantesController.php';

    $salida="";
    if(isset($_POST['estudiante'])){
        $term=utf8_decode($_POST['estudiante']);
        $estudiantes_controlador = new EstudiantesController;
        $estudiantes = $estudiantes_controlador->getAllEstudiantesComplete($conexion, $term);
    }else{
        $estudiantes_controlador = new EstudiantesController;
        $estudiantes = $estudiantes_controlador->getAllEstudiantes($conexion);
    }

    if($estudiantes->num_rows > 0){
        $salida.="<table class='table table-bordered table-hover' id='estudiantes'>
                    <thead>
                        <tr style='text-align: center'>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Celular</th>
                            <th>Correo</th>
                            <th>Nacimiento</th>
                            <th>Fecha Ingreso</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach ($estudiantes as $key => $estudiante) {
        $salida.="  <tr style='text-align: center'>
                        <td>".$estudiante['codigoestudiante']."</td>
                        <td>".utf8_encode($estudiante['nombre'])."</td>
                        <td>".$estudiante['dni']."</td>
                        <td>".$estudiante['celular']."</td>
                        <td>".$estudiante['email']."</td>
                        <td>".date_format(date_create($estudiante['anionacimiento']),'d-m-Y')."</td>
                        <td>".date_format(date_create($estudiante['fechaingreso']),'d-m-Y')."</td>
                        <td> <a href='editar.php?codigoestudiante=".$estudiante['codigoestudiante']."'data-toggle='tooltip' data-placement='left' title='Editar'><i class='nav-icon fas fa-edit'></i></a></td>
                        <td> <a href='#' onclick='eliminar(\"".$estudiante['codigoestudiante']."\",\"".utf8_encode($estudiante['nombre'])."\", event)' data-toggle='tooltip' data-placement='left' title='Eliminar'><i class='nav-icon fas fa-trash-alt'></i></a></td>
                    </tr>";
                    }
        $salida.="  </tbody>
                </table>

                <!--<script>
                    function eliminar(nombre, event){
                        if(!confirm('¿Desea eliminar al estudiante: ' + nombre + '?'))
                            event.preventDefault()
                    }
                </script>-->
                <script>
                    $(function () {
                        $('#estudiantes').DataTable({
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
                </script>
                <script>
                    function eliminar(codigoestudiante, nombre, event){
                        Swal.fire({
                            title: '¿Esta seguro?',
                            text: 'Va a eliminar al estudiante: ' + nombre,
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Borrar',
                            }).then((result) => {
                            if (result.isConfirmed) {
                                $.ajax({
                                    url: 'eliminar.php',
                                    type: 'POST',
                                    dataType: 'html',
                                    data: {codigoestudiante: codigoestudiante}
                                })
                                .done(function(response){
                                    if(response=='ok'){
                                        window.location='index.php';
                                    }else{
                                        Swal.fire('Error MySql: '+response);
                                    }
                                })
                            }
                            })
                    }
                </script>";
    }else{
        $salida.="<div style='text-align:center'><h5>Estudiante no registrado</h5></div>";
    }
    echo $salida;
?>

