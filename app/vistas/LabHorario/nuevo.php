<?php
    require_once '../../Conexion.php';
    include_once '../../controladores/LabAmbienteController.php';
    $ambiente_controlador = new LabAmbienteController;
    $ambientes = $ambiente_controlador->getAllAmbientes($conexion);

    include_once '../../controladores/LabEquipoController.php';
    $equipo_controlador = new LabEquipoController;
    $equipos = $equipo_controlador->getAllEquipos($conexion);

    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form action="guardar.php" method="POST">
            <br>
            <div style="text-align:left"><h2>Nuevo horario</h2></div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Tipo: </label>
                </div>
                <div class="col-md-5">
                    <select id="tipo_horario" name="tipo_horario" class="form-control select2bs4" onchange="cambiarTipoHorario()">
                        <option value="CLASE">CLASE</option>
                        <option value="PRESTAMO">PRESTAMO</option>
                    </select>
                </div>
            </div>
            <div class="row form-group" id="fecha_clase">
                <div class="col-md-2">
                    <label>Día de la semana: </label>
                </div>
                <div class="col-md-5">
                    <select name="nro_dia" class="form-control select2bs4">
                        <option value="">Seleccione</option>
                        <option value="1">Lunes</option>
                        <option value="2">Martes</option>
                        <option value="3">Miércoles</option>
                        <option value="4">Jueves</option>
                        <option value="5">Viernes</option>
                        <option value="6">Sábado</option>
                        <option value="7">Domingo</option>
                    </select>
                </div>
            </div>
            <div class="row form-group" id="fecha_prestamo" style="display:none">
                <div class="col-md-2">
                    <label>Fecha de préstamo: </label>
                </div>
                <div class="col-md-3">
                    <input type="date" name="fecha" class="form-control"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Hora de inicio: </label>
                </div>
                <div class="col-md-3">
                    <input type="time" name="hora_inicio" class="form-control" required/>
                    <input type="hidden" name="ambiente_id" class="form-control" required value="<?php echo $_GET['ambiente_id'] ?>"/>
					<input type="hidden" name="perfil" required value="<?php echo $_GET['perfil'] ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Hora de término: </label>
                </div>
                <div class="col-md-3">
                    <input type="time" name="hora_fin" class="form-control" required/>
                </div>
            </div>
            <div class="row form-group" id="curso_clase">
                <div class="col-md-2">
                    <label>Curso: </label>
                </div>
                <div class="col-md-5">
                    <select name="curso_clase" class="form-control select2bs4">
                        <option value="">Seleccione</option>
                        <option value="BASE DE DATOS">BASE DE DATOS</option>
                        <option value="TICS">TICS</option>
                        <option value="SISTEMAS OPERATIVOS">SISTEMAS OPERATIVOS</option>
                        <option value="PROYECTO INTER Y TRANSDISCIPLIARIO">PROYECTO INTER Y TRANSDISCIPLIARIO</option>
                    </select>
                </div>
            </div>
            <div class="row form-group" id="curso_prestamo" style="display:none">
                <div class="col-md-2">
                    <label>Curso de préstamo: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="curso_prestamo" class="form-control"/>
                </div>
            </div>

            <div class="row form-group" id="docente_clase">
                <div class="col-md-2">
                    <label>Docente: </label>
                </div>
                <div class="col-md-5">
                    <select name="docente_clase" class="form-control select2bs4">
                        <option value="">Seleccione</option>
                        <option value="ELMER CHUQUIYAURI">ELMER CHUQUIYAURI</option>
                        <option value="VELSY RIVERA VIDAL">VELSY RIVERA VIDAL</option>
                        <option value="INÉS JESÚS TOLENTINO">INÉS JESÚS TOLENTINO</option>
                        <option value="ADAM FRANCISCO PAREDES">ADAM FRANCISCO PAREDES</option>
                    </select>
                </div>
            </div>
            <div class="row form-group" id="docente_prestamo" style="display:none">
                <div class="col-md-2">
                    <label>Entidad: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="docente_prestamo" class="form-control"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-5">
                    <button class="btn btn-primary">Guardar</button>
                    <button class="btn btn-primary"><a href="../LabTecnico/ver_horario.php?procesos_id=<?php echo $procesos_id ?>" style="color: inherit">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
    <?php include '../foot.html' ?>
    <script>
        $(function () {
            //Inicializar Select2
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            })
        })
    </script>
    <!-- <script src="../../../public/js/bootstrap/bootstrap.min.js"></script>
    <script src="../../../public/js/jquery-3.4.1.min.js"></script>
    <script src="../../../public/js/jquery-ui.js"></script> -->
    <script>
        function cambiarTipoHorario(){
            var tipohorario = document.getElementById('tipo_horario').value

            if( tipohorario == 'CLASE' ){
                document.getElementById('fecha_clase').style.display = ''
                document.getElementById('fecha_prestamo').style.display = 'none'
                document.getElementById('curso_clase').style.display = ''
                document.getElementById('curso_prestamo').style.display = 'none'
                document.getElementById('docente_clase').style.display = ''
                document.getElementById('docente_prestamo').style.display = 'none'
            }
            else{
                document.getElementById('fecha_clase').style.display = 'none'
                document.getElementById('fecha_prestamo').style.display = ''
                document.getElementById('curso_clase').style.display = 'none'
                document.getElementById('curso_prestamo').style.display = ''
                document.getElementById('docente_clase').style.display = 'none'
                document.getElementById('docente_prestamo').style.display = ''
            }
        }
    </script>
</body>
</html>