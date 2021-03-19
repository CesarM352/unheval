<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabAmbienteController.php';

    $ambiente_controlador = new LabAmbienteController;
    $ambientes = $ambiente_controlador->getAllAmbientes($conexion, 0);

    //$proceso_mdl = $proceso_controlador->getProceso( $conexion, $_GET['proceso_id'] );
	
	include '../cabecera.html';
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wraper" style="text-align: center">
        <br>
        <h2> HORARIOS POR AMBIENTES</h2>
        <br>
		<br>
		<!-- <a href="nuevo.php?proceso_id=<?php echo $_GET['proceso_id'] ?>">Nuevo</a>-->

		<div class="form-inline" style="justify-content: center;">
			<div class="icheck-primary d-inline">
			<label>
				<input type="radio" id="rdb_tipo_ambiente_0" name="rdb_tipo_ambiente" value="0" checked onclick="filtrarPorTipoAmbiente(0)"/>TODOS
			</label>
			</div>
			<label>
				<input type="radio" id="rdb_tipo_ambiente_1" name="rdb_tipo_ambiente" value="1" onclick="filtrarPorTipoAmbiente(1)"/>AULA
			</label>
			<label>
				<input type="radio" id="rdb_tipo_ambiente_2" name="rdb_tipo_ambiente" value="2" onclick="filtrarPorTipoAmbiente(2)"/>LABORATORIO
			</label>
			<label>
				<input type="radio" id="rdb_tipo_ambiente_3" name="rdb_tipo_ambiente" value="3" onclick="filtrarPorTipoAmbiente(3)"/>OFICINA
			</label>
		</div>
		
		<div class="container-fluid" style="text-align:center">
            <div class="row form-group">
                <div class="col-md-2"></div>
                <div class="col-md-8">
		<table id="tbl_datos" class='table table-bordered table-hover'>
			<thead>
				<tr id="fil">
					<th>AMBIENTE</th>
					<th>TIPO</th>
					<th>VER HORARIO</th>
				</tr>
			</thead>
			<tbody>
			<?php
				foreach ($ambientes as $key => $ambiente) {
			?>
				<tr class=" tbl_datos_filas tipo_ambiente_<?php echo $ambiente['codtipoofi'] ?>">
					<td> <?php echo $ambiente["nombre"] ?> </td>
					<td> <?php echo $ambiente["tipo_oficina_nombre"] ?> </td>
					<td> 
						<a href="ver_horario.php?ambiente_id=<?php echo $ambiente["codigooficina"] ?>" > Ver Horario </a>
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
	</div>
</body>