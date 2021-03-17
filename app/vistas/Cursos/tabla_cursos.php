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
        $salida.="<table class='table table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Créditos</th>
                            <th>Escuela</th>
                            <th>Grupos</th>
                            <!--<th>Editar</th>
                            <th>Eliminar</th>-->
                        </tr>
                    </thead>
                    <tbody>";
                    foreach ($cursos as $key => $curso) {
        $salida.="  <tr>
                        <td>".$curso['codigocurso']."</td>
                        <td>".utf8_encode($curso['nombre'])."</td>
                        <td>".utf8_encode($curso['descripcion'])."</td>
                        <td>".$curso['numerocredito']."</td>
                        <td>".utf8_encode($curso['nombre_carrera'])."</td>
                        <td> <a href='../Grupos/index.php?codigocurso=".$curso['codigocurso'].
                                                        "&nombre=".utf8_encode($curso['nombre']).
                                                        "&carrera=".utf8_encode($curso['nombre_carrera'])."'>Ver</a> </td>
                        <!--<td> <a href='editar.php?codigocurso=".$curso['codigocurso']."'>Editar</a> </td>
                        <td> <a href='eliminar.php?codigocurso=".$curso['codigocurso']."' onclick='eliminar(\"".utf8_encode($curso['nombre'])."\", \"".utf8_encode($curso['nombre_carrera'])."\", event)'>Eliminar</a></td>-->
                    </tr>";
                    }
        $salida.="  </tbody>
                </table>

                <script>
                    function eliminar(nombre, escuela, event){
                        if(!confirm('¿Desea eliminar al curso: ' + nombre + ', de la escuela de '+ escuela +'?'))
                            event.preventDefault()
                    }
                </script>";
    }else{
        $salida.="<div style='text-align:center'><h5>Curso no registrado</h5></div>";
    }
    echo $salida;
?>

