<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabSoftwareAdquisicionController.php';
    require_once '../../controladores/LabSoftwareController.php';
    $software_adquisicion_controlador = new LabSoftwareAdquisicionController;
    $softwares_adquisicion = $software_adquisicion_controlador->getAllSoftwaresAdquisiciones($conexion, $_GET['id']);
    $software_controlador = new LabSoftwareController;
	$software = $software_controlador->getSoftware($conexion, $_GET['id']);
    include '../cabecera.html';
?>
<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wraper" style="text-align: center">
	<?php if( $software->getPropietario() == 1 && $software->getConLicencia() == 1 ){ ?>
		<button id="btn_nuevo" class="btn btn-info font-weight-bolder">
			<a href="nuevo.php?software_id=<?php echo $_GET['id'] ?>" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
		</button>
	<?php } ?>
	<br>
		<button id="btn_nuevo" class="btn btn-info font-weight-bolder">
			<a href="../LabSoftware/index.php" style="color: inherit">Volver <i class="fa fa-backward"></i></a>
		</button>
		<div class="container-fluid" style="text-align:center">
			<table class='table table-bordered table-hover'>
				<thead>
					<tr>
						<th>COD</th>
						<th>Nro. Licencias</th>
						<th>Fecha de compra</th>
						<th>Duración en días</th>
						<th>Licencias disponibles</th>
						<th>Editar</th>
						<th>Eliminar</th>
					</tr>
				</thead>
				<tbody>
			<?php
				foreach ($softwares_adquisicion as $key => $softwares_adquisicion) {
			?>
				<tr>
					<td> <?php echo $softwares_adquisicion["id"] ?> </td>
					<td> <?php echo $softwares_adquisicion["nro_licencias"] ?> </td>
					<td> <?php echo $softwares_adquisicion["fecha_compra"] ?> </td>
					<td> <?php echo $softwares_adquisicion["duracion_dias"] ?> </td>
					<td> <?php echo $softwares_adquisicion["nro_licencias_disponibles"] ?> </td>
					<td> <a href='editar.php?id=<?php echo $softwares_adquisicion["id"] ?>'>Editar</a> </td>
					<td> <a href='eliminar.php?id=<?php echo $softwares_adquisicion["id"] ?>' onclick="eliminar(<?php echo $softwares_adquisicion["id"] ?>, event)">Eliminar</a> </td>
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