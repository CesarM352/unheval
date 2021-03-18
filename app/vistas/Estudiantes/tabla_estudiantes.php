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
        $salida.="<table class='table table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Celular</th>
                            <th>Correo</th>
                            <th>Nacimiento</th>
                            <th>Fecha Ingreso</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach ($estudiantes as $key => $estudiante) {
        $salida.="  <tr>
                        <td>".$estudiante['codigoestudiante']."</td>
                        <td>".utf8_encode($estudiante['nombre'])."</td>
                        <td>".$estudiante['dni']."</td>
                        <td>".$estudiante['celular']."</td>
                        <td>".$estudiante['email']."</td>
                        <td>".date_format(date_create($estudiante['anionacimiento']),'d-m-Y')."</td>
                        <td>".date_format(date_create($estudiante['fechaingreso']),'d-m-Y')."</td>
                        <td>".$estudiante['user']."</td>
                        <td>".$estudiante['pass']."</td>
                        <td> <a href='editar.php?codigoestudiante=".$estudiante['codigoestudiante']."'>Editar</a></td>
                        <td> <a href='eliminar.php?codigoestudiante=".$estudiante['codigoestudiante']."' onclick='eliminar(\"".utf8_encode($estudiante['nombre'])."\", event)'>Eliminar</a> </td>
                    </tr>";
                    }
        $salida.="  </tbody>
                </table>

                <script>
                    function eliminar(nombre, event){
                        if(!confirm('¿Desea eliminar al estudiante: ' + nombre + '?'))
                            event.preventDefault()
                    }
                </script>";
    }else{
        $salida.="<div style='text-align:center'><h5>Estudiante no registrado</h5></div>";
    }
    echo $salida;
?>

