<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabSoftwareAdquisicionController.php';

    $salida="";
    if(isset($_POST['software'])){
        $term=$_POST['software'];
        $software_adquisicion_controlador = new LabSoftwareAdquisicionController;
        $softwares = $software_adquisicion_controlador->getAllSoftwaresAdquisicionesComplete($conexion, $term);
    }else{
        $software_adquisicion_controlador = new LabSoftwareAdquisicionController;
        $softwares = $software_adquisicion_controlador->getAllSoftwaresAdquisiciones($conexion, 0);
    }

    if($softwares->num_rows > 0){
        $salida.="<table class='table table-bordered table-hover'>
                    <thead>
                        <tr>
                            <th>SOFTWARE</th>
                            <th>TIPO</th>
                            <th>FORMA</th>
                            <th>NRO LICENCIAS</th>
                            <th>FECHA COMPRA</th>
                            <th>DURACIÓN</th>
                            <th>PERIODO DE VIGENCIA</th>
                            <th>LICENCIAS DISPONIBLES</th>
                            <th>REQUISITOS MINIMOS</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach ($softwares as $key => $software) {
        $salida.="  <tr>
                        <td>".$software['software_descripcion']."</td>
                        <td>".$software['software_tipo_sw']."</td>
                        <td>".$software['software_forma']."</td>
                        <td>".$software['nro_licencias']."</td>
                        <td>".$software["fecha_compra"]."</td>
                        <td>".$software["duracion_dias"]."</td>
                        <td>".$software["duracion_dias"]."</td>
                        <td>".$software["nro_licencias_disponibles"]."</td>
                        <td>".$software["requisitos_minimos"]."</td>
                    </tr>";
                    }
        $salida.="  </tbody>
                </table>

                <script>
                    function eliminar(nombre, escuela, event){
                        if(!confirm('¿Desea eliminar al software: ' + nombre + ', de la escuela de '+ escuela +'?'))
                            event.preventDefault()
                    }
                </script>";
    }else{
        $salida.="<div style='text-align:center'><h5>Software no registrado</h5></div>";
    }
    echo $salida;
?>