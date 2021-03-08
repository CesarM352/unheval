<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/DocentesController.php';

    $codigo_curso=$_GET['codigocurso'];
    $nombre_escuela=$_GET['carrera'];
    $nombre_curso=$_GET['nombre'];
    $docentes_controlador = new DocentesController;
    $docentes = $docentes_controlador->getAllDocentes($conexion);

    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form action="guardar.php?codigocurso=<?php echo $codigo_curso ?>&carrera=<?php echo $nombre_escuela ?>&nombre=<?php echo $nombre_curso ?>" method="POST">
            <br>
            <div class="container-fluid" style="text-align:center">
                <h2><?php echo $nombre_escuela ?></h2>
                <h2><?php echo $nombre_curso.' - '.$codigo_curso ?></h2>
            </div>
            <br>
            <div style="text-align:left"><h2>Nuevo grupo</h2></div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="codigogrupo">Código: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="codigogrupo" required/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="nombre">Nombre: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="nombre" required/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="numeroalumnos">numero alumnos: </label>
                </div>
                <div class="col-md-1">
                    <input type="text" class="form-control" name="numeroalumnos" required>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="maximoalumnos">maximo alumnos: </label>
                </div>
                <div class="col-md-1">
                    <input class="form-control" type="text" name="maximoalumnos" required/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="codigodocente">Docente: </label>
                </div>
                <div class="col-md-4">
                    <select name="codigodocente" class="form-control select2bs4" required>
                        <option disabled selected>Seleccione</option>
                        <?php
                            foreach ($docentes as $key => $docente) {
                        ?>
                        <option value="<?php echo $docente['codigodocente'] ?>"><?php echo utf8_encode($docente['nombre']) ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <input type="hidden" value="<?php echo $codigo_curso ?>" class="form-control" name="codigocurso"/>
                </div>
            </div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-7">
                    <button class="btn btn-primary">Guardar</button>
                    <button class="btn btn-primary"><a href="index.php?codigocurso=<?php echo $codigo_curso ?>&carrera=<?php echo $nombre_escuela ?>&nombre=<?php echo $nombre_curso ?>" style="color: inherit">Cancelar</a></button>
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
    </body>
</html>