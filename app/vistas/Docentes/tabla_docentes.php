<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/DocentesController.php';

    $salida="";
    if(isset($_POST['docente'])){
        $term=utf8_decode($_POST['docente']);
        $docentes_controlador = new DocentesController;
        $docentes = $docentes_controlador->getAlldocentesComplete($conexion, $term);
    }else{
        $docentes_controlador = new DocentesController;
        $docentes = $docentes_controlador->getAlldocentes($conexion);
    }

    if($docentes->num_rows > 0){
        $salida.="<table class='table table-bordered table-hover' id='docentes'>
                    <thead>
                        <tr style='text-align: center'>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Celular</th>
                            <th>Dirección</th>
                            <th>Tipo Contrato</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach ($docentes as $key => $docente) {
        $salida.="  <tr style='text-align: center'>
                        <td>".$docente['codigodocente']."</td>
                        <td>".utf8_encode($docente['nombre'])."</td>
                        <td>".$docente['dni']."</td>
                        <td>".$docente['celular']."</td>
                        <td>".utf8_encode($docente['direccion'])."</td>
                        <td>".$docente['nombrecontrato']."</td>
                        <td> <a href='editar.php?codigodocente=".$docente['codigodocente']."' data-toggle='tooltip' data-placement='left' title='Editar'><i class='nav-icon fas fa-edit'></i></a></td>
                        <td> <a href='#' onclick='eliminar(\"".$docente['codigodocente']."\",\"".utf8_encode($docente['nombre'])."\", event)' data-toggle='tooltip' data-placement='left' title='Eliminar'><i class='nav-icon fas fa-trash-alt'></i></a></td>
                    </tr>";
                    }
        $salida.="  </tbody>
                </table>

                <!--<script>
                    function eliminar(nombre, event){
                        if(!confirm('¿Desea eliminar al docente: ' + nombre + '?'))
                            event.preventDefault()
                    }
                </script>-->
                <script>
                    $(function () {
                        $('#docentes').DataTable({
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
                    function eliminar(codigodocente, nombre, event){
                        Swal.fire({
                            title: '¿Esta seguro?',
                            text: 'Va a eliminar al docente: ' + nombre,
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
                                    data: {codigodocente: codigodocente}
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
        $salida.="<div style='text-align:center'><h5>Docente no registrado</h5></div>";
    }
    echo $salida;
?>

