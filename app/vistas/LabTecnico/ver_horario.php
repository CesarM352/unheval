<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabHorarioController.php';

    $horario_controlador = new LabHorarioController;

    //$proceso_mdl = $proceso_controlador->getProceso( $conexion, $_GET['proceso_id'] );
    include '../cabecera.html';
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wraper" style="text-align: center">
        <br>
        <h3> <?php //echo $proceso_mdl->getCodigo()." ".$proceso_mdl->getNombre() ?> AMBIENTE </h3>
        <br>
        <!-- <a href="nuevo.php?proceso_id=<?php echo $_GET['proceso_id'] ?>">Nuevo</a>-->

        <button class="btn btn-info font-weight-bolder">
            <a href="../LabHorario/nuevo.php?ambiente_id=<?php echo $_GET['ambiente_id'] ?>" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
        </button>
        <br><br>
        <div class="container-fluid" style="text-align:center">
            <?php $horario_controlador->verHorarioPorAmbiente($conexion, $_GET['ambiente_id']) ?>
        </div>
    </div>
    <br>
    <script>
        function eliminar(id, event){
            if(!confirm("Desea elminar el registro de codigo " + id) )
                event.preventDefault()
        }
    </script>
</body>
</html>