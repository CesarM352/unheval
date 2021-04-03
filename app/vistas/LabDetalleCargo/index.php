<?php
    require_once '../../Conexion.php';
    include_once '../../controladores/LabDetalleCargoController.php';
    include_once '../../controladores/UsuariosController.php';
    $detalle_cargo_controlador = new LabDetalleCargoController;
    $detalles_cargos = $detalle_cargo_controlador->getAllDetallesCargos($conexion, $_GET['idcargo']);

	$cantidad_checks = 0;

    include '../cabecera.html';
?>
    <body class="hold-transition sidebar-mini layout-fixed">
		<div class="wraper">
			<br> 
			<!-- <div style='text-align: center'>
				<button id="btn_nuevo" class="btn btn-info font-weight-bolder">
					<a href="nuevo_prestamo.php" style="color: inherit">Nueva Solicitud de préstamo<i class="fa fa-plus-circle"></i></a>
				</button>
			</div> -->
			<br>
			<div class="container-fluid">
				<form action="guardar_retorno.php" id="frm_operacion" method="POST">
					<div id="div_botones">
						<button class="btn btn-primary">Registrar devolución</button>
					</div>

					<div class="row form-group" id="div_fechahoaretorno" style="display:none">
						<div class="col-md-2">
							<label>Fecha de devolución: </label>
						</div>
						<div class="col-md-5">
							<input type="datetime-local" class="form-control" name="fechahoaretorno" id="fechahoaretorno" />
						</div>
					</div>

					<table  class='table table-bordered table-hover' id='software'>
						<thead>
							<tr style='text-align: center'>
								<th>Código Patrimonial</th>
								<th>Nombre</th>
								<th>Descripción</th>
								<th>Situación</th>
							</tr>
						</thead>
						<tbody>
					<?php
						foreach ($detalles_cargos as $key => $software) {
							$cantidad_checks++;
					?>
						<tr style='text-align: center'>
							<td>
								<input type="checkbox" value="<?php echo $software["iddetallecargo"] ?>" name="equipos[]" class="chk_equipos" <?php echo ($software["estadoprestamo"] == 'DEVUELTO') ? 'CHECKED' : '' ?> /> 
								<?php echo $software["codigopatrimonio"] ?> 
							</td>
							<td> <?php echo $software["equipo_nombre"] ?> </td>
							<td> <?php echo $software["equipo_descripcion"] ?> </td>
							<td> <?php echo $software["estadoprestamo"] ?> </td>
						</tr>
					<?php
						}
					?>
						</tbody>
					</table>
					<input type="hidden" id="cantidad_checks" name="cantidad_checks" value="<?php echo $cantidad_checks ?>" />
					<input type="hidden" id="idcargo" name="idcargo" value="<?php echo $_GET['idcargo'] ?>" />
				</form>
			</div>
		</div>
		<?php include '../foot.html'; ?>
			<script>
				$(function () {
					$("#div_botones").hide()
					$('[data-toggle="tooltip"]').tooltip()

					$(".chk_equipos").click( function(){
						if( $(".chk_equipos:checked").length > 0 )
							$("#div_botones").show()
						else
							$("#div_botones").hide()

						if( <?php echo $cantidad_checks ?> == $(".chk_equipos:checked").length ){
							$("#div_fechahoaretorno").css('display','flex')
						}
						else{
							$("#fechahoaretorno").val('')
							$("#div_fechahoaretorno").css('display','none')
						}
					})
				})
			</script>
    </body>