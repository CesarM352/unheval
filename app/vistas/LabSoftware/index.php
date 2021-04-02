<?php
	require_once '../../Conexion.php';
	require_once '../../controladores/LabSoftwareController.php';
	$software_controlador = new LabSoftwareController;
	$softwares = $software_controlador->getAllSoftwares($conexion);

    include '../cabecera.html';
?>
    <body class="hold-transition sidebar-mini layout-fixed">
		<div class="wraper">
			<br>
			<div style='text-align: center'>
				<button id="btn_nuevo" class="btn btn-info font-weight-bolder">
					<a href="nuevo.php" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
				</button>
				<button id="btn_nuevo" class="btn btn-info font-weight-bolder">
					<a href="../LabTecnico/ver_software_index.php" style="color: inherit">Volver <i class="fa fa-backward"></i></a>
				</button>
			</div>
			<br>
			<div class="container-fluid">
				<table  class='table table-bordered table-hover table-sm' id='software'>
					<thead>
						<tr style='text-align: center'>
							<th>COD</th>
							<th >Nombre</th>
							<th>Versión</th>
							<th>Propietario</th>
							<th>Licenciado</th>
							<th >Mínimo RAM</th>
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
					<tr style='text-align: center'>
						<td> <?php echo $software["codigosoftware"] ?> </td>
						<td style="width: 800px"> <?php echo $software["nombre"] ?> </td>
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
						<td> <a href='../LabSoftwareAdquisicion/index.php?id=<?php echo $software["codigosoftware"] ?>' data-toggle='tooltip' data-placement='left' title='Adquisiciones'><i class='nav-icon fas fa-shopping-cart'></i></a></td>
						<td> <a href='editar.php?id=<?php echo $software["codigosoftware"] ?>' data-toggle='tooltip' data-placement='left' title='Editar'><i class='nav-icon fas fa-edit'></i></a></td>
						
						<td> <a href='eliminar.php?id=<?php echo $software["codigosoftware"] ?>' onclick="eliminar(<?php echo $software['codigosoftware'] ?>, event)" data-toggle='tooltip' data-placement='left' title='Eliminar'><i class='nav-icon fas fa-trash-alt'></i></a></td>
					</tr>
				<?php
					}
				?>
					</tbody>
				</table>
			</div>
		</div>
		<?php include '../foot.html'; ?>
			<script>
				function eliminar(id, event){
					if(!confirm("Desea eliminar el registro de codigo" + id) )
						event.preventDefault()
				}
			</script>
			<script>
                    $(function () {
                        $('#software').DataTable({
                            'lengthMenu': [[15, 25, 50, -1], [15, 25, 50, 'All']],
                            'paging': true,
                            'lengthChange': true,
                            'searching': true,
                            'ordering': false,
                            'info': true,
                            'autoWidth': false,
                            'responsive': true,

                            'language': {
                                'info': 'Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas',
                                'lengthMenu': 'Mostrar _MENU_ registros',
								"search": "Buscar:",
                                'paginate': {
                                    'first': 'Primeros',
                                    'last': 'Ultimos',
                                    'next': 'Siguiente',
                                    'previous': 'Anterior'
                                },
                            },

							'columnDefs': [
								{ 'width': '30%', 'targets': 1 }
							]
						});
                    });
            </script>
			<script>
				$(function () {
					$('[data-toggle="tooltip"]').tooltip()
				})
			</script>
    </body>