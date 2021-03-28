<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabHorarioController.php';

    $horario_controlador = new LabHorarioController;

    include '../cabecera.html';

    //$proceso_mdl = $proceso_controlador->getProceso( $conexion, $_GET['proceso_id'] );
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wraper" style="text-align: center">
        <br>
        <h2> <?php //echo $proceso_mdl->getCodigo()." ".$proceso_mdl->getNombre() ?><?php echo $_GET['tipo_oficina_nombre'].' '.$_GET['ambiente_nombre'] ?></h2>
        <br>
        <button class='btn btn-info font-weight-bolder'>
            <a href='../LabDocente/index.php' style="color: inherit">Volver <i class="fa fa-backward"></i></a>
        </button>
        <!-- <a href="nuevo.php?proceso_id=<?php //echo $_GET['proceso_id'] ?>">Nuevo</a>-->
        <div class="container-fluid" style="text-align:center">
            <?php $horario_controlador->verHorarioPorAmbiente($conexion, $_GET['ambiente_id']) ?>
        </div>
    </div>
    <script>
        function eliminar(id, event){
            if(!confirm("Desea elminar el registro de codigo " + id) )
                event.preventDefault()
        }
    </script>
</body>
</html>