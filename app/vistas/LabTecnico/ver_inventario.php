<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabInventarioController.php';

    $inventario_controlador = new LabInventarioController;
    $inventarios = $inventario_controlador->getAllInventarios($conexion, $_GET['ambiente_id']);

    //$proceso_mdl = $proceso_controlador->getProceso( $conexion, $_GET['proceso_id'] );

    include '../cabecera.html';
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wraper" style="text-align: center">
        <br>
        <h3> <?php echo $_GET['ambiente_id']//echo $proceso_mdl->getCodigo()." ".$proceso_mdl->getNombre() ?> AMBIENTE </h3>
        <br>
        <!-- <a href="nuevo.php?proceso_id=<?php echo $_GET['proceso_id'] ?>">Nuevo</a>-->
        <div class="container-fluid" style="text-align:center">
            <table class='table table-bordered table-hover'>
                <thead>
                    <tr>
                        <th>CÓDIGO</th>
                        <th>DESCRIPCIÓN</th>
                        <th>TIPO</th>
                        <th>ESTADO</th>
                        <th>EDITAR</th>
                        <th>PASAR A</th>
                        <th>DAR DE BAJA</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                foreach ($inventarios as $key => $inventario) {
            ?>
                <tr>
                    <td> <?php echo $inventario["equipo_codigo"] ?> </td>
                    <td> <?php echo $inventario["equipo_descripcion"] ?> </td>
                    <td> <?php echo $inventario["equipo_tipo"] ?> </td>
                    <td> <?php echo $inventario["estadopresente"] ?> </td>
                    <td> <a href="#">EDITAR</a> </td>
                    <td> <a href="#">PASAR A</a> </td>
                    <td> <a href="#">DAR DE BAJA</a> </td>
                </tr>
            <?php
                }
            ?>
                </tbody>
            </table>
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