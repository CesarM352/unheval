<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabTipoEquipoController.php';
    require_once '../../controladores/LabTipoIngresoController.php';
    require_once '../../controladores/LabEstadoEquipoController.php';
    include_once '../../controladores/LabAmbienteController.php';
    $ambiente_controlador = new LabAmbienteController;
    $ambientes = $ambiente_controlador->getAllAmbientes($conexion);

    $tipo_equipo_controlador = new LabTipoEquipoController;
    $tipos_equipos = $tipo_equipo_controlador->getAllTiposEquipos($conexion, 0);

    $tipo_ingreso_controlador = new LabTipoIngresoController;
    $tipos_ingresos = $tipo_ingreso_controlador->getAllTiposIngresos($conexion, 0);
    
    $estado_equipo_controlador = new LabEstadoEquipoController;
    $estados_equipos = $estado_equipo_controlador->getAllEstadosEquipos($conexion, 0);
	
	include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form action="guardar.php" method="POST" class="formulario">
            <br><br>
            <div class="container-fluid" style="text-align:center">
                <h2>Nuevo Equipo</h2>
            </div>
            <div class="row form-group" id="fecha_clase">
                <div class="col-md-2">
                    <label>Tipo Equipo: (*)</label>
                </div>
                <div class="col-md-5">
                    <select name="codtipoequipo" id="codtipoequipo" class="form-control" onchange="cambiarTipoEquipo()" required>
                        <option value="">Seleccione</option>
                        <?php foreach ($tipos_equipos as $key => $tipo_equipo) {
                        ?>
                        <option value="<?php echo $tipo_equipo['codtipoequipo'] ?>" data-codpat="<?php echo $tipo_equipo['codigopatrimonialinicial'] ?>" ><?php echo $tipo_equipo['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Código Patrimonial: (*)</label>
                </div>
                <div class="row col-md-5" style="padding-left: 15px;">
                    <input type="text" name="codigopatrimonialinicial" id="codigopatrimonialinicial" class="form-control col-md-3" readonly required />
                    <input type="text" name="codigopatrimonio" id="codigopatrimonio" class="form-control col-md-6" required />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Nombre: (*) </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="nombre" class="form-control" required />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
					<label>Descripción: </label>
                </div>
                <div class="col-md-5">
                    <textarea class="form-control" name="descripcion" class="form-control" ></textarea>
                </div>
            </div>

            <div class="row form-group datospc">
                <div class="col-md-2">
					<label>RAM: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="ram" id="ram" class="form-control" />
                </div>
            </div>

            <div class="row form-group datospc">
                <div class="col-md-2">
					<label>Procesador: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="procesador" id="procesador" class="form-control" />
                </div>
            </div>

            <div class="row form-group datospc">
                <div class="col-md-2">
					<label>HDD: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="hdd" id="hdd" class="form-control" />
                </div>
            </div>

            <div class="row form-group datospc">
                <div class="col-md-2">
					<label>SDD: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="ssd" id="ssd" class="form-control" />
                </div>
            </div>

            <div class="row form-group datospc">
                <div class="col-md-2">
                    <label>Tarjeta Video: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="tarjetavideo" class="form-control" />
                </div>
            </div>

            <div class="row form-group datosmonitor">
                <div class="col-md-2">
					<label>Resolución: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="resolucion" id="resolucion" class="form-control" />
                </div>
            </div>

            <div class="row form-group datosteclado">
                <div class="col-md-2">
					<label>Conectividad: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="conectividad" id="conectividad" class="form-control" placeholder="usb, bluetooh, etc." />
                </div>
            </div>

            <div class="row form-group datosestabilizador">
                <div class="col-md-2">
					<label>Tipo de estabilizador: </label>
                </div>
                <div class="col-md-5">
                    <select name="tipoestabilizador" id="tipoestabilizador" class="form-control">
                            <option value="">Seleccione</option>
                            <option value="SÓLIDO">SÓLIDO</option>
                            <option value="HÍBRIDO">HÍBRIDO</option>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Fecha Ingreso: (*)</label>
                </div>
                <div class="col-md-5">
                    <input type="date" name="fechaingreso" class="form-control" required />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>RFID: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="rfid" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Estado Operativo: </label>
                </div>
                <div class="col-md-5">
                    <label><input type="radio" name="estadoperativo" value="1" required />OPERATIVO</label>
                    <label><input type="radio" name="estadoperativo" value="0" required />INOPERATIVO</label>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Fecha Caduca: (*)</label>
                </div>
                <div class="col-md-5">
                    <input type="date" name="fechacaduca" class="form-control" required />
                </div>
            </div>

            <div class="row form-group" id="fecha_clase">
                <div class="col-md-2">
                    <label>Tipo Ingreso: (*)</label>
                </div>
                <div class="col-md-5">
                    <select name="codtipoingreso" id="codtipoingreso" class="form-control" required>
                        <option value="">Seleccione</option>
                        <?php foreach ($tipos_ingresos as $key => $tipo_ingreso) {
                        ?>
                        <option value="<?php echo $tipo_ingreso['codtipoingreso'] ?>"><?php echo $tipo_ingreso['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row form-group" id="fecha_clase">
                <div class="col-md-2">
                    <label>Estado: (*)</label>
                </div>
                <div class="col-md-5">
                    <select name="codigoestado" id="codigoestado" class="form-control" required>
                        <option value="">Seleccione</option>
                        <?php foreach ($estados_equipos as $key => $estado_equipo) {
                            if($estado_equipo['nombre'] == 'BAJA')
                                continue;
                        ?>
                        <option value="<?php echo $estado_equipo['codigoestado'] ?>"><?php echo $estado_equipo['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Color: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="color" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Modelo: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="modelo" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Serie: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="serie" class="form-control" />
                </div>
            </div>

            <div class="row form-group" id="fecha_clase">
                <div class="col-md-2">
                    <label>Oficina: (*)</label>
                </div>
                <div class="col-md-5">
                    <select name="codigooficina" class="form-control" required>
                        <option value="">Seleccione</option>
                        <?php foreach ($ambientes as $key => $ambiente) {
                        ?>
                        <option value="<?php echo $ambiente['codigooficina'] ?>"><?php echo $ambiente['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-5">
                    <button class="btn btn-primary">Guardar</button>
                    <button class="btn btn-primary"><a href="../LabTecnico/ver_equipo_index.php" style="color: inherit">Cancelar</button>
                </div>
            </div>

        </form>
    </div>

    <?php include '../foot.html' ?>

    <script>
        function asignarValorDefecto(campo, opcion){
            if( campo == 'propietario' ){
                if(opcion==0){
                    document.getElementById('tipo_sw').value='LIBRE'
                    document.getElementById('nro_licencias').value=0
                    document.getElementById('duracion_dias').value=0
                    document.getElementById('fecha_compra').value=''
                }
                else if(opcion==1){
                    document.getElementById('tipo_sw').value='LICENCIADO'
                }
            }
        }

        $(".datospc").hide()
        $(".datosmonitor").hide()
        $(".datosteclado").hide()
        $(".datosestabilizador").hide()

        function cambiarTipoEquipo(){
            let codigoInicialSeleccionado = $("#codtipoequipo option:selected").data('codpat')
            $("#codigopatrimonialinicial").val(codigoInicialSeleccionado)

            if( codigoInicialSeleccionado == 74089950 || codigoInicialSeleccionado == 74089949 ){
                $(".datospc").show()
                $(".datosmonitor").hide()
                $(".datosteclado").hide()
                $(".datosestabilizador").hide()
            }
            else if(codigoInicialSeleccionado == 74087700){
                $(".datospc").hide()
                $(".datosmonitor").show()
                $(".datosteclado").hide()
                $(".datosestabilizador").hide()
            }
            else if(codigoInicialSeleccionado == 74089500){
                $(".datospc").hide()
                $(".datosmonitor").hide()
                $(".datosteclado").show()
                $(".datosestabilizador").hide()
            }
            else if(codigoInicialSeleccionado == 46225215){
                $(".datospc").hide()
                $(".datosmonitor").hide()
                $(".datosteclado").hide()
                $(".datosestabilizador").show()
            }
            
        }
    </script>
</body>