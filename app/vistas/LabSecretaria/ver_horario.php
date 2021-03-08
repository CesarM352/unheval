<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabHorarioController.php';

    $horario_controlador = new LabHorarioController;

    //$proceso_mdl = $proceso_controlador->getProceso( $conexion, $_GET['proceso_id'] );
?>

<h3> <?php //echo $proceso_mdl->getCodigo()." ".$proceso_mdl->getNombre() ?> AMBIENTE </h3>
<br>
<!-- <a href="nuevo.php?proceso_id=<?php echo $_GET['proceso_id'] ?>">Nuevo</a>-->

<?php $horario_controlador->verHorarioPorAmbiente($conexion, $_GET['ambiente_id']) ?>

<script>
    function eliminar(id, event){
        if(!confirm("Desea elminar el registro de codigo " + id) )
            event.preventDefault()
    }
</script>