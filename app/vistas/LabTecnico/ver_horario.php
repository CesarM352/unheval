<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabHorarioController.php';
    require_once '../../controladores/LabAmbienteController.php';

    $horario_controlador = new LabHorarioController;
    $ambiente_controlador = new LabAmbienteController;
    $ambiente_mdl = $ambiente_controlador->getAmbiente($conexion, $_GET["ambiente_id"]);

    //$proceso_mdl = $proceso_controlador->getProceso( $conexion, $_GET['proceso_id'] );
    include '../cabecera.html';
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wraper" style="text-align: center">
        <br>
        <h3> <?php //echo $proceso_mdl->getCodigo()." ".$proceso_mdl->getNombre() ?> AMBIENTE <?php echo $ambiente_mdl->getNombre() ?> </h3>
        <br>
        <!-- <a href="nuevo.php?proceso_id=<?php echo $_GET['proceso_id'] ?>">Nuevo</a>-->

        <?php 
            $valor_semana = date("Y")."-W".date("W");
            if( isset($_GET["semana_valor"]) )
                 $valor_semana = $_GET["semana_valor"];

            $semanas_diferencias = substr($valor_semana,6) - date("W");
        ?>

        <input type="week" id="semana" name="semana" value="<?php echo $valor_semana ?>" /><button class="btn btn-warning btn-sm" id="btn_ir">Ir</button>
        <br>

        <button class="btn btn-info font-weight-bolder">
            <a href="../LabHorario/nuevo.php?ambiente_id=<?php echo $_GET['ambiente_id'].'&perfil=tecnico' ?>" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
        </button>
        <br><br>
        <div class="container-fluid" style="text-align:center">
            <?php $horario_controlador->verHorarioPorAmbiente($conexion, $_GET['ambiente_id'], $semanas_diferencias) ?>
        </div>
    </div>
    <br>
    <?php include '../foot.html'; ?>
    <script>
        function eliminar(id, event){
            if(!confirm("Desea elminar el registro de codigo " + id) )
                event.preventDefault()
        }

        $("#btn_ir").click(function(){
            location.href = 'ver_horario.php?ambiente_id=<?php echo $_GET["ambiente_id"] ?>&semana_valor=' + $("#semana").val()
        })
    </script>
</body>
</html>