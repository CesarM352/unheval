<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabAmbienteController.php';

    $ambiente_controlador = new LabAmbienteController;
    $ambientes = $ambiente_controlador->getAllAmbientes($conexion, 0);

    include '../cabecera.html';

    //$proceso_mdl = $proceso_controlador->getProceso( $conexion, $_GET['proceso_id'] );
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wraper" style="text-align: center">
        <br><br>
        <div class="form-inline" style="justify-content: center;">
            <div class="icheck-primary d-inline">
                <input type="radio" id="rdb_tipo_ambiente_0" name="rdb_tipo_ambiente" value="0" checked onclick="filtrarPorTipoAmbiente(0)"/>
                <label for="rdb_tipo_ambiente_0">TODOS &nbsp;&nbsp;&nbsp;</label>
            </div>
            <div class="icheck-primary d-inline">
                <input type="radio" id="rdb_tipo_ambiente_1" name="rdb_tipo_ambiente" value="1" onclick="filtrarPorTipoAmbiente(1)"/>
                <label for="rdb_tipo_ambiente_1">AULA &nbsp;&nbsp;&nbsp;</label>
            </div>
            <div class="icheck-primary d-inline">
                <input type="radio" id="rdb_tipo_ambiente_2" name="rdb_tipo_ambiente" value="2" onclick="filtrarPorTipoAmbiente(2)"/>
                <label for="rdb_tipo_ambiente_2">LABORATORIO &nbsp;&nbsp;&nbsp;</label>
            </div>
            <div class="icheck-primary d-inline">
                <input type="radio" id="rdb_tipo_ambiente_3" name="rdb_tipo_ambiente" value="3" onclick="filtrarPorTipoAmbiente(3)"/>
                <label for="rdb_tipo_ambiente_3">OFICINA &nbsp;&nbsp;&nbsp;</label>
            </div>
        </div>
        <br>
        <div class="container-fluid" style="text-align:center">
            <div class="row form-group">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class='table table-bordered table-hover' id="tbl_datos">
                        <thead>
                            <tr id="fil">
                                <th>AMBIENTE</th>
                                <th>TIPO</th>
                                <th>VER HORARIOS</th>
                                <th>VER SOFTWARE</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                        foreach ($ambientes as $key => $ambiente) {
                    ?>
                        <tr id="fila_<?php echo $ambiente["codigooficina"] ?>" class=" tbl_datos_filas tipo_ambiente_<?php echo $ambiente["codtipoofi"] ?>">
                            <td> <?php echo $ambiente["nombre"] ?> </td>
                            <td> <?php echo $ambiente["tipo_oficina_nombre"] ?> </td>
                            <td> 
                                <?php if( $ambiente["tipo_oficina_nombre"] != "OFICINA" ){ ?>
                                <a href="ver_horario.php?ambiente_id=<?php echo $ambiente["codigooficina"] ?>&ambiente_nombre=<?php echo $ambiente["nombre"] ?>&tipo_oficina_nombre=<?php echo $ambiente["tipo_oficina_nombre"] ?>" data-toggle='tooltip' data-placement='left' title='Horario'><i class='nav-icon fas fa-calendar-alt'></i></a>
                                <?php } ?>
                            </td>
                            <td> 
                                <a href="ver_software.php?ambiente_id=<?php echo $ambiente["codigooficina"] ?>&ambiente_nombre=<?php echo $ambiente["nombre"] ?>&tipo_oficina_nombre=<?php echo $ambiente["tipo_oficina_nombre"] ?>" data-toggle='tooltip' data-placement='left' title='Software'><i class='nav-icon fas fa-th'></i></a> 
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
    <?php include '../foot.html' ?>
    <script>
        function eliminar(id, event){
            if(!confirm("Desea elminar el registro de codigo " + id) )
                event.preventDefault()
        }

        function filtrarPorTipoAmbiente( numero ){
            filas = document.getElementsByClassName("tbl_datos_filas")
            for(i=0; i<filas.length; i++){
                if( numero != 0 )
                    filas.item(i).style.display="none"
                else
                    filas.item(i).style.display="table-row"
            }
            filas_mostrar = document.getElementsByClassName("tipo_ambiente_" + numero)
            for(i=0; i<filas_mostrar.length; i++){
                filas_mostrar.item(i).style.display="table-row"
            }
        }
    </script>
    <script>
		$(function () {
			$('[data-toggle="tooltip"]').tooltip()
		})
	</script>
</body>
</html>