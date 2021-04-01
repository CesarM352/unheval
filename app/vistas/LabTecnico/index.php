<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabMantenimientoController.php';

    $mantenimiento_controlador = new LabMantenimientoController;

    include '../cabecera.html';
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wraper" style="text-align: center">
        <br>
        <h1>MENÚ DEL TÉCNICO</h1>

        <b>SE TIENEN <?php echo $mantenimiento_controlador->calcularCantidadPendientes($conexion) ?> PENDIENTES DE ATENCIÓN</b>
        <br>

        <a href="ver_mantenimiento.php">MANTENIMIENTO</a>
        <a href="ver_equipo_index.php">INVENTARIO</a>
        <a href="ver_software_index.php">SOFTWARE</a>
        <a href="ver_horario_index.php">HORARIO</a>
        <a href="ver_prestamo_index.php">PRÉSTAMO/INCIDENCIAS</a>
</div>

    <script>
        function eliminar(id, event){
            if(!confirm("Desea elminar el registro de codigo " + id) )
                event.preventDefault()
        }
    </script>
</body>
</html>