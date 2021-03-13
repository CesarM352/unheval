<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/TecnicosController.php';

    $salida="";
    if(isset($_POST['tecnico'])){
        $term=$_POST['tecnico'];
        $tecnicos_controlador = new TecnicosController;
        $tecnicos = $tecnicos_controlador->getAllTecnicosComplete($conexion, $term);
    }else{
        $tecnicos_controlador = new TecnicosController;
        $tecnicos = $tecnicos_controlador->getAllTecnicos($conexion);
    }

    if($tecnicos->num_rows > 0){
        $salida.="<table class='table table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th>Contrato Nro</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>Celular</th>
                            <th>Nacimiento</th>
                            <th>Inicio Contrato</th>
                            <th>Fin Contrato</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
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
                        <td>".$tecnico['user']."</td>
                        <td>".$tecnico['pass']."</td>
                        <td> <a href='editar.php?numerocontrato=".$tecnico['numerocontrato']."'>Editar</a></td>
                        <td> <a href='eliminar.php?numerocontrato=".$tecnico['numerocontrato']."' onclick='eliminar(\"".utf8_encode($tecnico['nombre'])."\", event)'>Eliminar</a> </td>
                    </tr>";
                    }
        $salida.="  </tbody>
                </table>

                <script>
                    function eliminar(nombre, event){
                        if(!confirm('¿Desea eliminar al técnico: ' + nombre + '?'))
                            event.preventDefault()
                    }
                </script>";
    }else{
        $salida.="<div style='text-align:center'><h5>Técnico no registrado</h5></div>";
    }
    echo $salida;
?>

