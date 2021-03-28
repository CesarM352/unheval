<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabTipoEquipoController.php';
    require_once '../../controladores/LabTipoIngresoController.php';
    require_once '../../controladores/LabEstadoEquipoController.php';
    include_once '../../controladores/LabAmbienteController.php';
    include_once '../../controladores/LabEquipoController.php';
    $ambiente_controlador = new LabAmbienteController;
    $ambientes = $ambiente_controlador->getAllAmbientes($conexion);

    $tipo_equipo_controlador = new LabTipoEquipoController;
    $tipos_equipos = $tipo_equipo_controlador->getAllTiposEquipos($conexion, 0);

    $tipo_ingreso_controlador = new LabTipoIngresoController;
    $tipos_ingresos = $tipo_ingreso_controlador->getAllTiposIngresos($conexion, 0);
    
    $estado_equipo_controlador = new LabEstadoEquipoController;
    $estados_equipos = $estado_equipo_controlador->getAllEstadosEquipos($conexion, 0);

    $equipo_controlador = new LabEquipoController;
    $equipo = $equipo_controlador->getDocumento($conexion, $_GET['id']);
	
	include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form action="actualizar.php?<?php echo 'id='.$_GET['id'],'ambiente_id='.$_GET['ambiente_id'] ?>" method="POST" class="formulario">
            <br><br>
            <div class="container-fluid" style="text-align:center">
                <h2>Nuevo Equipo</h2>
            </div>
            <!-- <div class="row form-group" id="fecha_clase">
                <div class="col-md-2">
                    <label>Tipo Equipo: (*)</label>
                </div>
                <div class="col-md-5">
                    <select name="codtipoequipo" id="codtipoequipo" class="form-control" onchange="cambiarTipoEquipo()" required>
                        <option value="">Seleccione</option>
                        <?php foreach ($tipos_equipos as $key => $tipo_equipo) {
                        ?>
                        <option value="<?php echo $tipo_equipo['codtipoequipo'] ?>" data-codpat="<?php echo $tipo_equipo['codigopatrimonialinicial'] ?>" <?php echo ($equipo->getCodTipoEquipo() == $tipo_equipo['codtipoequipo'] ) ? 'selected' : '' ?> ><?php echo $tipo_equipo['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Código Patrimonial: (*)</label>
                </div>
                <div class="row col-md-5" style="padding-left: 15px;">
                    <input type="text" name="codigopatrimonialinicial" id="codigopatrimonialinicial" class="form-control col-md-3" readonly required value="<?php echo substr($equipo->getId(),0,8) ?>" />
                    <input type="text" name="codigopatrimonio" id="codigopatrimonio" class="form-control col-md-6" required value="<?php echo substr($equipo->getId(),9) ?>" />
                </div>
            </div> -->

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Nombre: (*) </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="nombre" class="form-control" required value="<?php echo $equipo->getNombre() ?>" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
					<label>Descripción: </label>
                </div>
                <div class="col-md-5">
                    <textarea class="form-control" name="descripcion" class="form-control" ><?php echo $equipo->getDescripcion() ?></textarea>
                </div>
            </div>

            <div class="row form-group datospc">
                <div class="col-md-2">
					<label>RAM: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="ram" id="ram" class="form-control" value="<?php echo $equipo->getRam() ?>" />
                </div>
            </div>

            <div class="row form-group datospc">
                <div class="col-md-2">
					<label>Procesador: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="procesador" id="procesador" class="form-control" value="<?php echo $equipo->getProcesador() ?>" />
                </div>
            </div>

            <div class="row form-group datospc">
                <div class="col-md-2">
					<label>HDD: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="hdd" id="hdd" class="form-control" value="<?php echo $equipo->getHdd() ?>" />
                </div>
            </div>

            <div class="row form-group datospc">
                <div class="col-md-2">
					<label>SDD: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="ssd" id="ssd" class="form-control" value="<?php echo $equipo->getSdd() ?>" />
                </div>
            </div>

            <div class="row form-group datospc">
                <div class="col-md-2">
                    <label>Tarjeta Video: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="tarjetavideo" class="form-control" value="<?php echo $equipo->getTarjetaVideo() ?>" />
                </div>
            </div>

            <div class="row form-group datosmonitor">
                <div class="col-md-2">
					<label>Resolución: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="resolucion" id="resolucion" class="form-control" value="<?php echo $equipo->getResolucion() ?>" />
                </div>
            </div>

            <div class="row form-group datosteclado">
                <div class="col-md-2">
					<label>Conectividad: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="conectividad" id="conectividad" class="form-control" placeholder="usb, bluetooh, etc." value="<?php echo $equipo->getConectividad() ?>" />
                </div>
            </div>

            <div class="row form-group datosestabilizador">
                <div class="col-md-2">
					<label>Tipo de estabilizador: </label>
                </div>
                <div class="col-md-5">
                    <select name="tipoestabilizador" id="tipoestabilizador" class="form-control">
                            <option value="">Seleccione</option>
                            <option value="SÓLIDO" <?php echo ( $equipo->getTipoEstabilizador() == 'SÓLIDO' ) ? 'selected' : '' ?> >SÓLIDO</option>
                            <option value="HÍBRIDO" <?php echo ( $equipo->getTipoEstabilizador() == 'HÍBRIDO' ) ? 'selected' : '' ?> >HÍBRIDO</option>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Fecha Ingreso: (*)</label>
                </div>
                <div class="col-md-5">
                    <input type="date" name="fechaingreso" class="form-control" required value="<?php echo $equipo->getFechaingreso() ?>" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>RFID: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="rfid" class="form-control" value="<?php echo $equipo->getRfid() ?>" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Estado Operativo: </label>
                </div>
                <div class="col-md-5">
                    <label><input type="radio" name="estadoperativo" value="1"  <?php echo ( $equipo->getEstadOperativo() == 1 ) ? 'selected' : '' ?> required />OPERATIVO</label>
                    <label><input type="radio" name="estadoperativo" value="0"  <?php echo ( $equipo->getEstadOperativo() == 0 ) ? 'selected' : '' ?> required />INOPERATIVO</label>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Fecha Caduca: (*)</label>
                </div>
                <div class="col-md-5">
                    <input type="date" name="fechacaduca" class="form-control" required value="<?php echo $equipo->getFechaCaduca() ?>" />
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
                        <option value="<?php echo $tipo_ingreso['codtipoingreso'] ?>" <?php echo ( $equipo->getCodTipoIngreso() == $tipo_ingreso['codtipoingreso'] ) ? 'selected' : '' ?> ><?php echo $tipo_ingreso['nombre'] ?></option>
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
                        <option value="<?php echo $estado_equipo['codigoestado'] ?>" <?php echo ( $equipo->getCodigoEstado() == $tipo_ingreso['codigoestado'] ) ? 'selected' : '' ?>><?php echo $estado_equipo['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Color: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="color" class="form-control" value="<?php echo $equipo->getColor() ?>" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Modelo: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="modelo" class="form-control" value="<?php echo $equipo->getModelo() ?>" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Serie: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="serie" class="form-control" value="<?php echo $equipo->getSerie() ?>" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-5">
                    <button class="btn btn-primary">Actualizar</button>
                    <button class="btn btn-primary"><a href="index.php?procesos_id=<?php echo $procesos_id ?>">Cancelar</button>
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
        
        switch( <?php substr($equipo->getCodTipoEquipo(),0,8) ?> ){
            case '42158574':
                $(".datospc").show()
                break;

            case '42158575':
                $(".datosmonitor").show()
                break;

            case '42158576':
                $(".datosteclado").show()
                break;

            case '42158577':
                $(".datosestabilizador").show()
                break;
        }

        /* function cambiarTipoEquipo(){
            let codigoInicialSeleccionado = $("#codtipoequipo option:selected").data('codpat')
            $("#codigopatrimonialinicial").val(codigoInicialSeleccionado)

            if( codigoInicialSeleccionado == 42158574 ){
                $(".datospc").show()
                $(".datosmonitor").hide()
                $(".datosteclado").hide()
                $(".datosestabilizador").hide()
            }
            else if(codigoInicialSeleccionado == 42158575){
                $(".datospc").hide()
                $(".datosmonitor").show()
                $(".datosteclado").hide()
                $(".datosestabilizador").hide()
            }
            else if(codigoInicialSeleccionado == 42158576){
                $(".datospc").hide()
                $(".datosmonitor").hide()
                $(".datosteclado").show()
                $(".datosestabilizador").hide()
            }
            else if(codigoInicialSeleccionado == 42158577){
                $(".datospc").hide()
                $(".datosmonitor").hide()
                $(".datosteclado").hide()
                $(".datosestabilizador").show()
            }
        } */
    </script>
</body>