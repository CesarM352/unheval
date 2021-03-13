<?php
    require_once '../../Conexion.php';
    include_once '../../controladores/LabAmbienteController.php';
    $ambiente_controlador = new LabAmbienteController;
    $ambientes = $ambiente_controlador->getAllAmbientes($conexion);

    include_once '../../controladores/LabEquipoController.php';
    $equipo_controlador = new LabEquipoController;
    $equipos = $equipo_controlador->getAllEquipos($conexion);

    include_once '../../controladores/LabAsistenciaController.php';
    $asistencia_controlador = new LabAsistenciaController;
    $asistencias_alumno = $asistencia_controlador->getAllAsistencias($conexion,1);
	
	include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">

        <form action="../LabAsistencia/guardar.php" method="POST">
			<br>
            <div style="text-align:left"><h2>CURSO:<LABEL id="lbl_curso"></LABEL></h2></div>
            <br>
            <div class="row form-group" id="fecha_clase">
                <div class="col-md-2">
                    <label>Laboratorio: </label>
                </div>
                <div class="col-md-5">
                    <input type="hidden" name="idclases" id="idclases" value="" />
                    <select name="codigooficina" id="codigooficina" onchange="verEquipos()" class="form-control select2bs4">
                        <option value="">Seleccione</option>
                        <?php foreach ($ambientes as $key => $ambiente) {
                        ?>
                        <option value="<?php echo $ambiente['codigooficina'] ?>"><?php echo $ambiente['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row form-group" id="fecha_clase">
                <div class="col-md-2">
                    <label>Equipo: </label>
                </div>
                <div class="col-md-5">
                    <select name="codigopatrimonio" class="form-control select2bs4">
                        <option value="">Seleccione</option>
                        <?php foreach ($equipos as $key => $equipo) {
                            if( substr($equipo['codigopatrimonio'],0,8) != '72142530' )
                                continue;
                        ?>
                        <option class=" equipos_lab lab_<?php echo $equipo['ambiente_codigooficina'] ?>" value="<?php echo $equipo['codigopatrimonio'] ?>"><?php echo substr($equipo['codigopatrimonio'],8,4).' '.$equipo['nombre'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-5">
                    <button class="btn btn-primary">Guardar</button>
                    <button class="btn btn-primary"><a href="index.php?procesos_id=<?php echo $procesos_id ?>">Cancelar</a></button>
                </div>
            </div>
        </form>

        <table class='table table-hover'>

            <thead>
                <tr>
                    <th>Nombres y Apellidos</th>
                    <th>CURSO</th>
                    <th>GRUPO</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Oficina</th>
                    <th>Nro PC</th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach ($asistencias_alumno as $key => $asistencia) {
        ?>
            <tr>
                <td> <?php echo $asistencia["estudiante_nombres"] ?> </td>
                <td> <?php echo $asistencia["curso_nombre"] ?> </td>
                <td> <?php echo $asistencia["grupo_nombre"] ?> </td>
                <td> <?php echo $asistencia["fecha"] ?> </td>
                <td> <?php echo $asistencia["hora"] ?> </td>
                <td> <?php echo $asistencia["oficina_nombre"] ?> </td>
                <td> <?php echo $asistencia["nropc"] ?> </td>
            </tr>
        <?php
            }
        ?>
            </tbody>
        </table>
    </div>

        <!-- <script src="../../../public/js/bootstrap/bootstrap.min.js"></script>
        <script src="../../../public/js/jquery-ui.js"></script> -->
        <script src="../../../public/js/jquery-3.4.1.min.js"></script>

        <script>
                filas = document.getElementsByClassName("equipos_lab")
                for(i=0; i<filas.length; i++){
                    if( codigooficina != '0' )
                        filas.item(i).style.display="none"
                }
            function verEquipos( ){
                let codigooficina = document.getElementById('codigooficina').value;
                filas = document.getElementsByClassName("equipos_lab")
                for(i=0; i<filas.length; i++){
                    if( codigooficina != '0' )
                        filas.item(i).style.display="none"
                    else
                        filas.item(i).style.display="inline"
                }
                filas_mostrar = document.getElementsByClassName("lab_" + codigooficina)
                for(i=0; i<filas_mostrar.length; i++){
                    filas_mostrar.item(i).style.display="inline"
                }

                claseActual(codigooficina)
            }

            function claseActual(codigooficina){
                $.ajax(
                    {
                        url: '../LabAsistencia/clase_actual.php?codigooficina=' + codigooficina,
                        dataType: 'json',
                        success: function( data ) {
                            document.getElementById('idclases').value=data[0]
                            document.getElementById('lbl_curso').innerHTML=data[1]
                        }
                    }
                )
            }
        </script>
    </body>
</html>