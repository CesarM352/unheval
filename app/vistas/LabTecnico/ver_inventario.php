<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabInventarioController.php';

    $inventario_controlador = new LabInventarioController;
    $inventarios = $inventario_controlador->getAllInventarios($conexion, $_GET['ambiente_id']);
	
	require_once '../../controladores/LabAmbienteController.php';
    $ambiente_controlador = new LabAmbienteController;
    $ambiente = $ambiente_controlador->getAmbiente($conexion, $_GET['ambiente_id']);
    $ambientes = $ambiente_controlador->getAllAmbientes($conexion, 0);

    //$proceso_mdl = $proceso_controlador->getProceso( $conexion, $_GET['proceso_id'] );

    include '../cabecera.html';
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wraper" style="text-align: center">
        <br>
		<h3> <?php //echo $proceso_mdl->getCodigo()." ".$proceso_mdl->getNombre() ?> OFICINA <?php echo $ambiente->getNombre() ?> </h3>
        <br>
        <!-- <a href="nuevo.php?proceso_id=<?php echo $_GET['proceso_id'] ?>">Nuevo</a>-->
        <div class="container-fluid" style="text-align: center">
		
			<form action="#" id="frm_operacion" method="POST">
				<div id="div_botones">
					<button onclick="cambiarOperacion(1,0,0)" class="btn btn-primary">Dar de baja</button>
					<!--<button onclick="cambiarOperacion(2,0,0)" class="btn btn-primary">Pasar a otra oficina</button>-->
					<button onclick="cambiarOperacion(3,0,0)" class="btn btn-primary">Asignar documento</button>
					<button id="btn_nuevo" class="btn btn-info font-weight-bolder">
						<a href="../LabTecnico/ver_equipo_index.php" style="color: inherit">Volver <i class="fa fa-backward"></i></a>
					</button>
				</div><br>
				<div style="text-align: left !important">
					<table class='table table-bordered table-hover' id="tabla_ambiente">
						<thead>
							<tr style="text-align: center">
								<th>CÓDIGO</th>
								<th>DESCRIPCIÓN</th>
								<th>TIPO</th>
								<th>ESTADO</th>
								<th>EDITAR</th>
								<th>PASAR A</th>
							</tr>
						</thead>
						<tbody>
					<?php
						foreach ($inventarios as $key => $inventario) {
					?>
						<tr style="text-align: center">
							<td>
								<label>
									<input type="checkbox" value="<?php echo $inventario["equipo_codigo"] ?>" name="equipos[]" />
									<?php echo $inventario["equipo_codigo"] ?> 
								</label>
								<?php if( $inventario["equipo_documento"] != '' ){ ?>
								<a href='../../../public/doc_equipo/<?php echo $inventario["equipo_documento"] ?>' data-toggle='tooltip' data-placement='left' title='Ver Documento'><i class='nav-icon fas fa-file'></i></a>
							<?php } ?>
							</td>
							<td> <?php echo $inventario["equipo_descripcion"] ?> </td>
							<td> <?php echo $inventario["equipo_tipo"] ?> </td>
							<td> <?php echo $inventario["estadopresente"] ?> </td>
							<td> <a href="../LabEquipo/editar.php?<?php echo 'id='.$inventario["equipo_codigo"].'&ambiente_id='.$_GET['ambiente_id'] ?>" data-toggle='tooltip' data-placement='left' title='Editar'><i class='nav-icon fas fa-edit'></i></a></td>
							<td> <a href="#" onclick="cambiarOperacion(2,<?php echo $inventario["equipo_codigo"].",".$inventario["codigolaboratorioequipo"] ?> )" data-toggle='tooltip' data-placement='left' title='Mover A'><i class='nav-icon fas fa-dolly'></i></a></td>
						</tr>
					<?php
						}
					?>
						</tbody>
					</table>
				</div>
			</form>
			
			<form action="#" id="frm_transferir" method="POST" style="display:none">
				<div class="row form-group">
					<div class="col-md-2">
						<label>Código del equipo a transferir: </label>
					</div>
					<div class="col-md-7" id="div_equipo_transferir">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-md-2">
						<label>Oficina de Destino: </label>
					</div>
					<div class="col-md-7">
						<select name="codigooficina" class="form-control" required>
							<option value="">Seleccione</option>
							<?php
								foreach ($ambientes as $key => $amb) {
									if( $amb['codigooficina'] == $_GET['ambiente_id'] )
										continue;
							?>
								<option value="<?php echo $amb['codigooficina'] ?>"><?php echo $amb['nombre'] ?></option>
							<?php
								}
							?>
						</select>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-2">
						<label>Justificación: </label>
					</div>
					<div class="col-md-7">
						<textarea class="form-control" name="justificacionretiro" maxlength=250 placeholder='250 caracteres' required></textarea>
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-2">
						<label>Fecha de retiro: </label>
					</div>
					<div class="col-md-7">
						<input type="hidden" name="codigopatrimonio" id="codigopatrimonio" class="form-control" value="" required />
						<input type="hidden" name="codigolaboratorioequipo" id="codigolaboratorioequipo" class="form-control" value="" required />
						<input type="hidden" name="oficinaorigen" class="form-control" value="<?php echo $ambiente->getNombre() ?>" required />
						<input type="date" name="fecharetiro" class="form-control" required />
					</div>
				</div>

				<div class="row form-group">
					<div class="col-md-2">
					</div>
					<div class="col-md-7">
						<button class="btn btn-primary">Guardar</button>
						<button class="btn btn-primary" onclick="document.getElementById('frm_transferir').style.display = 'none'"><a href="#">Cancelar</button>
					</div>
				</div>
			</form>
        </div>
    </div>
	<?php include '../foot.html' ?>
    <script>
        function eliminar(id, event){
            if(!confirm("Desea elminar el registro de codigo " + id) )
                event.preventDefault()
        }
		
		function cambiarOperacion(opcion, codigoequipo, codigolaboratorioequipo){
			switch(opcion){
				case 1:
					document.getElementById('frm_operacion').action = "../LabEquipo/dar_baja.php?oficinacodigo=<?php echo $_GET['ambiente_id'] ?>"
					break;
				case 2:
					document.getElementById('frm_transferir').action = "../LabLaboratorioEquipo/transferir.php?oficinacodigo=<?php echo $_GET['ambiente_id'] ?>"
					document.getElementById('frm_transferir').style.display = 'inline'
					document.getElementById('div_equipo_transferir').innerText = codigoequipo
					document.getElementById('codigopatrimonio').value = codigoequipo
					document.getElementById('codigolaboratorioequipo').value = codigolaboratorioequipo
					break;
				case 3:
					document.getElementById('frm_operacion').action = "../LabEquipo/asignar_documento.php"
					break;
			}
		}
    </script>
	<script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
	<script>
        $(function () {
           $('#tabla_ambiente').DataTable({
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
</body>
</html>