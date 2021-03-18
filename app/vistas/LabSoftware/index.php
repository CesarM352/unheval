<?php
	require_once '../../Conexion.php';
	require_once '../../controladores/LabSoftwareController.php';
	$software_controlador = new LabSoftwareController;
	$softwares = $software_controlador->getAllSoftwares($conexion);

    include '../cabecera.html';
?>
    <body class="hold-transition sidebar-mini layout-fixed">
		<div class="wraper" style="text-align: center">
			<br>
			<button id="btn_nuevo" class="btn btn-info font-weight-bolder">
				<a href="nuevo.php" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
			</button>
			<br><br>
			<div class="container-fluid" style="text-align:center">
				<table  class='table table-bordered table-hover'>

					<thead>
						<tr>
							<th>COD</th>
							<th>Nombre</th>
							<th>Versión</th>
							<th>Propietario</th>
							<th>Licenciado</th>
							<th>Mínimo RAM</th>
							<th>Mínimo Vídeo</th>
							<th>Mínimo Procesador</th>
							<th>Mínimo HHD</th>
							<th>Detalles</th>
							<th>Tipo Sw</th>
							<th>Forma</th>
							<th>Adquisiciones</th>
							<th>Editar</th>
							<th>Eliminar</th>
						</tr>
					</thead>
					<tbody>
				<?php
					foreach ($softwares as $key => $software) {
				?>
					<tr>
						<td> <?php echo $software["codigosoftware"] ?> </td>
						<td> <?php echo $software["nombre"] ?> </td>
						<td> <?php echo $software["version"] ?> </td>
						<td> <?php echo $software["propietario"] ?> </td>
						<td> <?php echo $software["conlicencia"] ?> </td>
						<td> <?php echo $software["minimoram"] ?> </td>
						<td> <?php echo $software["minimovideo"] ?> </td>
						<td> <?php echo $software["minimoprocesador"] ?> </td>
						<td> <?php echo $software["minimohhd"] ?> </td>
						<td> <?php echo $software["detalles"] ?> </td>
						<td> <?php echo $software["tipo_sw"] ?> </td>
						<td> <?php echo $software["forma"] ?> </td>
						<td> <a href='../LabSoftwareAdquisicion/index.php?id=<?php echo $software["codigosoftware"] ?>'>Adquisiciones</a> </td>
						<td> <a href='editar.php?id=<?php echo $software["codigosoftware"] ?>'>Editar</a> </td>
						<td> <a href='eliminar.php?id=<?php echo $software["codigosoftware"] ?>' onclick="eliminar(<?php echo $software["codigosoftware"] ?>, event)">Eliminar</a> </td>
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
					if(!confirm("Desea elminar el registro de codigo" + id) )
						event.preventDefault()
				}
			</script>
    </body>