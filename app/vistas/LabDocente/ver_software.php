<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabSoftwareAmbienteController.php';

    $software_ambiente_controlador = new LabSoftwareAmbienteController;
    $softwares = $software_ambiente_controlador->getAllSoftwaresAmbientes($conexion, $_GET['ambiente_id']);

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
            <div class="row form-group">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class='table table-bordered table-hover'>
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
                            <td> <?php echo $software["software_nombre"] ?> </td>
                            <td> <?php echo $software["software_tipo_sw"] ?> </td>
                            <td> <?php echo $software["software_forma"] ?> </td>
                            <td> <?php echo $software["nro_licencias"] ?> </td>
                        </tr>
                    <?php
                        }
                    ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div> 
                <BR>
                <?php
                    //$softwares = $software_ambiente_controlador->getAllSoftwares($conexion, $_GET['ambiente_id']);

                    //$proceso_mdl = $proceso_controlador->getProceso( $conexion, $_GET['proceso_id'] );
                ?>
            </div>
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