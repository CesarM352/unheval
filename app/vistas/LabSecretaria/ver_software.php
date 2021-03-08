<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabSoftwareAmbienteController.php';

    $software_ambiente_controlador = new LabSoftwareAmbienteController;
    $softwares = $software_ambiente_controlador->getAllSoftwaresAmbientes($conexion, $_GET['ambiente_id']);

    //$proceso_mdl = $proceso_controlador->getProceso( $conexion, $_GET['proceso_id'] );
?>

<h3> <?php //echo $proceso_mdl->getCodigo()." ".$proceso_mdl->getNombre() ?> AMBIENTE </h3>
<br>
<!-- <a href="nuevo.php?proceso_id=<?php echo $_GET['proceso_id'] ?>">Nuevo</a>-->

<table BORDER=1>
    <thead>
        <tr>
            <th>SOFTWARE</th>
            <th>TIPO</th>
            <th>FORMA</th>
            <th>NRO. LICENCIAS</th>
        </tr>
    </thead>
    <tbody>
<?php
    foreach ($softwares as $key => $software) {
?>
    <tr>
        <td> <?php echo $software["software_descripcion"] ?> </td>
        <td> <?php echo $software["software_tipo_sw"] ?> </td>
        <td> <?php echo $software["software_forma"] ?> </td>
        <td> <?php echo $software["nro_licencias"] ?> </td>
    </tr>
<?php
    }
?>
    </tbody>
</table>
<script>
    function eliminar(id, event){
        if(!confirm("Desea elminar el registro de codigo " + id) )
            event.preventDefault()
    }
</script>