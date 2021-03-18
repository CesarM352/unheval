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
        $salida.="<table class='table table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Celular</th>
                            <th>Dirección</th>
                            <th>Tipo Contrato</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach ($docentes as $key => $docente) {
        $salida.="  <tr>
                        <td>".$docente['codigodocente']."</td>
                        <td>".utf8_encode($docente['nombre'])."</td>
                        <td>".$docente['dni']."</td>
                        <td>".$docente['celular']."</td>
                        <td>".utf8_encode($docente['direccion'])."</td>
                        <td>".$docente['nombrecontrato']."</td>
                        <td>".$docente['user']."</td>
                        <td>".$docente['pass']."</td>
                        <td> <a href='editar.php?codigodocente=".$docente['codigodocente']."'>Editar</a></td>
                        <td> <a href='eliminar.php?codigodocente=".$docente['codigodocente']."' onclick='eliminar(\"".utf8_encode($docente['nombre'])."\", event)'>Eliminar</a> </td>
                    </tr>";
                    }
        $salida.="  </tbody>
                </table>

                <script>
                    function eliminar(nombre, event){
                        if(!confirm('¿Desea eliminar al docente: ' + nombre + '?'))
                            event.preventDefault()
                    }
                </script>";
    }else{
        $salida.="<div style='text-align:center'><h5>Docente no registrado</h5></div>";
    }
    echo $salida;
?>

