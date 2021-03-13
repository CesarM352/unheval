<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabAmbienteController.php';
    require_once '../../controladores/LabSoftwareAdquisicionController.php';

    $ambiente_controlador = new LabAmbienteController;
    $ambientes = $ambiente_controlador->getAllAmbientes($conexion, 0);

    $software_adquisicion_controlador = new LabSoftwareAdquisicionController;
    $softwares = $software_adquisicion_controlador->getAllSoftwaresAdquisiciones($conexion, 0);
    //$proceso_mdl = $proceso_controlador->getProceso( $conexion, $_GET['proceso_id'] );
	include '../cabecera.html';
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wraper" style="text-align: center">
		<h3> <?php //echo $proceso_mdl->getCodigo()." ".$proceso_mdl->getNombre() ?> FACULTAD </h3>
		<br>
		<!-- <a href="nuevo.php?proceso_id=<?php echo $_GET['proceso_id'] ?>">Nuevo</a>-->

		<label>
			<input type="radio" id="rdb_tipo_ambiente_0" name="rdb_tipo_ambiente" value="0" checked onclick="filtrarPorTipoAmbiente(0)"/>TODOS
		</label>
		<label>
			<input type="radio" id="rdb_tipo_ambiente_1" name="rdb_tipo_ambiente" value="1" onclick="filtrarPorTipoAmbiente(1)"/>AULA
		</label>
		<label>
			<input type="radio" id="rdb_tipo_ambiente_2" name="rdb_tipo_ambiente" value="2" onclick="filtrarPorTipoAmbiente(2)"/>LABORATORIO
		</label>
		<label>
			<input type="radio" id="rdb_tipo_ambiente_3" name="rdb_tipo_ambiente" value="3" onclick="filtrarPorTipoAmbiente(3)"/>OFICINA
		</label>

		<div class="container-fluid" style="text-align:center">
			<div class="row form-group">
                <div class="col-md-2"></div>
                <div class="col-md-8">
				<table id="tbl_datos" class='table table-bordered table-hover'>
					<thead>
						<tr id="fil">
							<th>AMBIENTE</th>
							<th>TIPO</th>
							<th>VER SOFTWARE</th>
						</tr>
					</thead>
					<tbody>
				<?php
					foreach ($ambientes as $key => $ambiente) {
				?>
					<tr id="fila_<?php echo $ambiente["id"] ?>" class=" tbl_datos_filas tipo_ambiente_<?php echo $ambiente["codtipoofi"] ?>">
						<td> <?php echo $ambiente["nombre"] ?> </td>
						<td> <?php echo $ambiente["tipo_oficina_nombre"] ?> </td>
						<td> 
							<a href="ver_software.php?ambiente_id=<?php echo $ambiente["codigooficina"] ?>" > Ver Software</a> 
						</td>
					</tr>
				<?php
					}
				?>
					</tbody>
				</table>
			</div>
		</div>

		<br>

		<table id="tbl_datos" class='table table-bordered table-hover'>
			<thead>
				<tr id="fil">
					<th>SOFTWARE</th>
					<th>TIPO</th>
					<th>FORMA</th>
					<th>NRO LICENCIAS</th>
					<th>FECHA COMPRA</th>
					<th>DURACIÓN</th>
					<th>PERIODO DE VIGENCIA</th>
					<th>LICENCIAS DISPONIBLES</th>
					<th>REQUISITOS MINIMOS</th>
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
				<td> <?php echo $software["fecha_compra"] ?> </td>
				<td> <?php echo $software["duracion_dias"] ?> </td>
				<td> <?php echo $software["duracion_dias"] ?> </td>
				<td> <?php echo $software["nro_licencias_disponibles"] ?> </td>
				<td> <?php echo $software["requisitos_minimos"] ?> </td>
			</tr>
		<?php
			}
		?>
			</tbody>
		</table>
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