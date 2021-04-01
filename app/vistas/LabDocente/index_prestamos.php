<?php
/*temporal*/
session_start();
$_SESSION["codigo"] = 1;
/*fin temporal*/
    require_once '../../Conexion.php';
    include_once '../../controladores/LabCargoController.php';
    include_once '../../controladores/UsuariosController.php';
    $cargo_controlador = new LabCargoController;
    $cargos = $cargo_controlador->getAllCargos($conexion, $_SESSION["codigo"]);

    $usuario_controlador = new UsuariosController;

    include '../cabecera.html';
?>
    <body class="hold-transition sidebar-mini layout-fixed">
		<div class="wraper">
			<br>
			<div style='text-align: center'>
				<button id="btn_nuevo" class="btn btn-info font-weight-bolder">
					<a href="nuevo_prestamo.php" style="color: inherit">Nueva Solicitud de préstamo<i class="fa fa-plus-circle"></i></a>
				</button>
			</div>
			<br>
			<div class="container-fluid">
				<table  class='table table-bordered table-hover' id='software'>
					<thead>
						<tr style='text-align: center'>
							<th>COD</th>
							<th>Prestado por</th>
							<th>Tipo de registro</th>
							<th>Fecha registro</th>
							<th>Situación</th>
							<th>Ver detalles</th>
						</tr>
					</thead>
					<tbody>
				<?php
					foreach ($cargos as $key => $software) {
                        $sql_usuario = "SELECT * FROM usuarios WHERE codigo=".$software["idusuarioresponsable"];
                        $usuario_mdl = new UsuariosModel( ConexionController::consultar($conexion, $sql_usuario)->fetch_object() );
				?>
					<tr style='text-align: center'>
						<td> <?php echo $software["idcargos"] ?> </td>
						<td> <?php echo $usuario_mdl->getNombre() ?> </td>
						<td> <?php echo $software["tipo_caso_descripcion"] ?> </td>
						<td> <?php echo $software["fechahoraprestamo"].$software["fechahorasolicitud"] ?> </td>
						<td> <?php 
                                if( is_null($software["fechahoraprestamo"]) ){
                                    echo "NO DEVUELTO";
                                }
                                else {
                                    echo "DEVUELTO";
                                }
                            ?> 
                        </td>
						<td> <a href='../LabDetalleCargo/index.php?idcargo=<?php echo $software["idcargos"] ?>' data-toggle='tooltip' data-placement='left' title='Ver Detalles'><i class='nav-icon fas fa-shopping-cart'></i></a></td>
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
                          });
                    });
            </script>
			<script>
				$(function () {
					$('[data-toggle="tooltip"]').tooltip()
				})
			</script>
    </body>