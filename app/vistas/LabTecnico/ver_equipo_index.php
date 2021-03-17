<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabAmbienteController.php';
    require_once '../../controladores/LabEquipoController.php';

    $ambiente_controlador = new LabAmbienteController;
    $ambientes = $ambiente_controlador->getAllAmbientes($conexion, 0);

    $equipo_controlador = new LabEquipoController;
    $equipos = $equipo_controlador->equiposActivos($conexion, 0);
    $equipos_baja = $equipo_controlador->equiposEnBaja($conexion, 0);
    //$proceso_mdl = $proceso_controlador->getProceso( $conexion, $_GET['proceso_id'] );
    include '../cabecera.html';
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wraper" style="text-align: center">
        <br>
        <h2> <?php //echo $proceso_mdl->getCodigo()." ".$proceso_mdl->getNombre() ?></h2>
        <br>
        <!-- <a href="nuevo.php?proceso_id=<?php //echo $_GET['proceso_id'] ?>">Nuevo</a>-->
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
                    <table class='table table-bordered table-hover'>
                        <thead>
                            <tr id="fil">
                                <th>AMBIENTE</th>
                                <th>TIPO</th>
                                <th>VER EQUIPOS</th>
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
                                <a href="ver_inventario.php?ambiente_id=<?php echo $ambiente["codigooficina"] ?>" > Ver Equipos</a> 
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
        <br>
		
		<button id="btn_nuevo" class="btn btn-info font-weight-bolder">
			<a href="../LabEquipo/nuevo.php" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
		</button>

        <div class="wraper">
            <div class="row form-group" style="text-align:center">
                <div class="col-md-1">
                </div>
                <div class="col-md-1">
                    <label>Código:</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="buscar_curso"></input>
                </div>
                <div class="col-md-2">
                </div>
                <div class="col-md-1">
                    <label>Ambiente:</label>
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" id="buscar_curso"></input>
                </div>
                <!--<div class="col-md-2">
                    <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                        <a href="nuevo.php" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
                    </button>
                </div>-->
            </div>
            <br>
            <div class="container-fluid" style="text-align:center" id="tabla_equipos">
                
            </div>
        </div>

        <div class="container-fluid" style="text-align:center">
            <H2>REPORTE DE EQUIPOS</H2>
            <table id="tbl_datos" class='table table-bordered table-hover'>
                <thead>
                    <tr id="fil">
                        <th>CÓDIGO</th>
                        <th>DESCRIPCIÓN</th>
                        <th>TIPO</th>
                        <th>ESTADO</th>
                        <th>UBICACIÓN</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                foreach ($equipos as $key => $equipo) {
            ?>
                <tr>
                    <td> <?php echo $equipo["codigopatrimonio"] ?> </td>
                    <td> <?php echo $equipo["descripcion"] ?> </td>
                    <td> <?php echo $equipo["equipo_tipo"] ?> </td>
                    <td> <?php echo $equipo["equipo_estado"] ?> </td>
                    <td> <?php echo $equipo["ambiente_nombre"] ?> </td>
                </tr>
            <?php
                }
            ?>
                </tbody>
            </table>
			
			<br>

            <H2>REPORTE DE EQUIPOS DADOS DE BAJA</H2>
			<table id="tbl_datos" class='table table-bordered table-hover'>
				<thead>
					<tr id="fil">
						<th>CÓDIGO</th>
						<th>DESCRIPCIÓN</th>
						<th>TIPO</th>
						<th>FECHA BAJA</th>
						<th>DOCUMENTO</th>
					</tr>
				</thead>
				<tbody>
			<?php
				foreach ($equipos_baja as $key => $equipo) {
			?>
				<tr>
					<td> <?php echo $equipo["codigopatrimonio"] ?> </td>
					<td> <?php echo $equipo["descripcion"] ?> </td>
					<td> <?php echo $equipo["equipo_tipo"] ?> </td>
					<td> <?php echo $equipo["fechabaja"] ?> </td>
					<td> <a href='../../../public/doc/<?php echo $equipo["documentobaja"] ?>'><?php echo $equipo["documentobaja"] ?></a> </td>
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
</body>
</html>