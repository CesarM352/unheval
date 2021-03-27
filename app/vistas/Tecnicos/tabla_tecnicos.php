<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/TecnicosController.php';

    $salida="";
    if(isset($_POST['tecnico'])){
        $term=utf8_decode($_POST['tecnico']);
        $tecnicos_controlador = new TecnicosController;
        $tecnicos = $tecnicos_controlador->getAllTecnicosComplete($conexion, $term);
    }else{
        $tecnicos_controlador = new TecnicosController;
        $tecnicos = $tecnicos_controlador->getAllTecnicos($conexion);
    }

    if($tecnicos->num_rows > 0){
        $salida.="<table class='table table-bordered table-hover' id='tecnicos'>
                    <thead>
                        <tr>
                            <th>Contrato Nro</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Celular</th>
                            <th>Nacimiento</th>
                            <th>Inicio Contrato</th>
                            <th>Fin Contrato</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach ($tecnicos as $key => $tecnico) {
        $salida.="  <tr>
                        <td>".$tecnico['numerocontrato']."</td>
                        <td>".utf8_encode($tecnico['nombre'])."</td>
                        <td>".$tecnico['dni']."</td>
                        <td>".$tecnico['celular']."</td>
                        <td>".date_format(date_create($tecnico['anionacimiento']),'d-m-Y')."</td>
                        <td>".date_format(date_create($tecnico['fechainicio']),'d-m-Y')."</td>
                        <td>".date_format(date_create($tecnico['fechacaduca']),'d-m-Y')."</td>
                        <td> <a href='editar.php?numerocontrato=".$tecnico['numerocontrato']."'data-toggle='tooltip' data-placement='left' title='Editar'><i class='nav-icon fas fa-edit'></i></a></td>
                        <td> <a href='#' onclick='eliminar(\"".$tecnico['numerocontrato']."\",\"".utf8_encode($tecnico['nombre'])."\", event)'data-toggle='tooltip' data-placement='left' title='Eliminar'><i class='nav-icon fas fa-trash-alt'></i></a></td>
                    </tr>";
                    }
        $salida.="  </tbody>
                </table>
                <!--<script>
                    function eliminar(nombre, event){
                        if(!confirm('¿Desea eliminar al técnico: ' + nombre + '?'))
                            event.preventDefault()
                    }
                </script>-->
                <script>
                    $(function () {
                        $('#tecnicos').DataTable({
                            'lengthMenu': [[15, 25, 50, -1], [15, 25, 50, 'All']],
                            'paging': false,
                            'lengthChange': false,
                            'searching': false,
                            'ordering': false,
                            'info': false,
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
                    function eliminar(numerocontrato, nombre, event){
                        Swal.fire({
                            title: '¿Esta seguro?',
                            text: 'Va a eliminar al técnico: ' + nombre,
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
                                    data: {numerocontrato: numerocontrato}
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
        $salida.="<div style='text-align:center'><h5>Técnico no registrado</h5></div>";
    }
    echo $salida;
?>

