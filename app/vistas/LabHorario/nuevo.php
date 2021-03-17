<?php
    require_once '../../Conexion.php';
    include_once '../../controladores/GruposController.php';
    $grupo_controlador = new GruposController;
    $grupos = $grupo_controlador->getAllGrupos($conexion);

    include_once '../../controladores/DocentesController.php';
    $docente_controlador = new DocentesController;
    $docentes = $docente_controlador->getAllDocentes($conexion);

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
                    <input type="time" name="hora_inicio" id="hora_inicio" class="form-control" required/>
                    <input type="hidden" name="ambiente_id" class="form-control" required value="<?php echo $_GET['ambiente_id'] ?>"/>
					<input type="hidden" name="perfil" required value="<?php echo $_GET['perfil'] ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Hora de término: </label>
                </div>
                <div class="col-md-3">
                    <input type="time" name="hora_fin" id="hora_fin" class="form-control" required/>
                </div>
            </div>
            <div class="row form-group" id="curso_clase">
                <div class="col-md-2">
                    <label>Curso: </label>
                </div>
                <div class="col-md-5">
                    <input type="hidden" name="codigo_curso" id="codigo_curso" class="form-control" required/>
                    <select name="curso_clase" id="sel_curso_clase" class="form-control select2bs4">
                        <option value="">Seleccione</option>
                        <?php foreach ($grupos as $key => $grupo) {
                        ?>
                        <option value="<?php echo $grupo['codigogrupo'] ?>" data-cod_curso="<?php echo $grupo['codigocurso'] ?>" data-cod_docente="<?php echo $grupo['codigodocente'] ?>" data-docente="<?php echo $grupo['nombre_docente'] ?>" ><?php echo $grupo['codigogrupo']." ".$grupo['nombre_curso']." ".$grupo['nombre'] ?></option>
                        <?php } ?>
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
                    <select name="docente_clase" id="sel_docente_clase" class="form-control select2bs4">
                        <option value="">Seleccione</option>
                        <?php foreach ($docentes as $key => $docente) {
                        ?>
                        <option value="<?php echo $docente['codigodocente'] ?>" data-docente="<?php echo $docente['nombre'] ?>" ><?php echo $docente['nombre'] ?></option>
                        <?php } ?>
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
            });

            $("#sel_curso_clase").change( function(){
                let valor_sel = $(this).val()
                let doc_codigo = $("#sel_curso_clase option[value='"+valor_sel+"']").data('cod_docente')
                let doc_nombre = $("#sel_curso_clase option[value='"+valor_sel+"']").data('docente')
                $("#codigo_curso").val($("#sel_curso_clase option[value='"+valor_sel+"']").data('cod_curso'))

                console.log(doc_codigo + ',' +doc_nombre + ',' + valor_sel )

                $("#sel_docente_clase").val(doc_codigo)
                $('#sel_docente_clase').select2().trigger('change'); 
                $('#sel_docente_clase').select2({
                    theme: 'bootstrap4'
                });
            })

            $("#hora_inicio").change(function(){
                $("#hora_fin").val($(this).val())
                $("#hora_fin").prop('min',$(this).val())
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