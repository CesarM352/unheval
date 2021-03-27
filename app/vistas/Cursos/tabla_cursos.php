<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/CursosController.php';

    $salida="";
    if(isset($_POST['curso'])){
        $term=utf8_decode($_POST['curso']);
        $curso_controlador = new CursosController;
        $cursos = $curso_controlador->getAllCursosComplete($conexion, $term);
    }else{
        $curso_controlador = new CursosController;
        $cursos = $curso_controlador->getAllCursos($conexion);
    }

    if($cursos->num_rows > 0){
        $salida.="<table class='table table-bordered table-hover' id='cursos'>
                    <thead>
                        <tr style='text-align: center'>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Créditos</th>
                            <th>Escuela</th>
                            <th>Horas Teóricas</th>
                            <th>Horas Prácticas</th>
                            <th>Tipo</th>
                            <th>Grupos</th>
                            <!--<th>Editar</th>
                            <th>Eliminar</th>-->
                        </tr>
                    </thead>
                    <tbody>";
                    foreach ($cursos as $key => $curso) {
                        $tipo='';
                        if($curso['tipo']=='1'){
                            $tipo='Obligatorio';
                        }else if($curso['tipo']=='0'){
                            $tipo='Electivo';
                        }else if($curso['tipo']==''){
                            $tipo='';
                        }
        $salida.="  <tr style='text-align: center'>
                        <td>".$curso['codigocurso']."</td>
                        <td>".utf8_encode($curso['nombre'])."</td>
                        <td>".utf8_encode($curso['descripcion'])."</td>
                        <td>".$curso['numerocredito']."</td>
                        <td>".utf8_encode($curso['nombre_carrera'])."</td>
                        <td>".$curso['h_teoricas']."</td>
                        <td>".$curso['h_practicas']."</td>
                        <td>".$tipo."</td>
                        <td> <a href='../Grupos/index.php?codigocurso=".$curso['codigocurso'].
                                                        "&nombre=".utf8_encode($curso['nombre']).
                                                        "&carrera=".utf8_encode($curso['nombre_carrera'])."' data-toggle='tooltip' data-placement='left' title='Ver'>
                                                        <i class='nav-icon fas fa-layer-group'></i></a></td>
                        <!--<td> <a href='editar.php?codigocurso=".$curso['codigocurso']."'>Editar</a> </td>
                        <td> <a href='eliminar.php?codigocurso=".$curso['codigocurso']."' onclick='eliminar(\"".utf8_encode($curso['nombre'])."\", \"".utf8_encode($curso['nombre_carrera'])."\", event)'>Eliminar</a></td>-->
                    </tr>";
                    }
        $salida.="  </tbody>
                </table><br>
                <script>
                    function eliminar(nombre, escuela, event){
                        if(!confirm('¿Desea eliminar al curso: ' + nombre + ', de la escuela de '+ escuela +'?'))
                            event.preventDefault()
                    }
                </script>
                <script>
                    $(function () {
                        $('#cursos').DataTable({
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
        $salida.="<div style='text-align:center'><h5>Curso no registrado</h5></div>";
    }
    echo $salida;
?>

