<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/GruposController.php';
    require_once '../../controladores/DocentesController.php';

    $codigo_grupo= $_GET['codigogrupo'];
    $codigo_curso=$_GET['codigocurso'];
    $nombre_escuela=$_GET['carrera'];
    $nombre_curso=$_GET['nombre'];
    $grupos_controlador = new GruposController;
    $grupos_mdl = $grupos_controlador->getGrupo($conexion, $codigo_grupo);

    $docentes_controlador = new DocentesController;
    $docentes = $docentes_controlador->getAllDocentes($conexion);

    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form action="actualizar.php?codigocurso=<?php echo $codigo_curso ?>&codigogrupo=<?php echo $codigo_grupo ?>&carrera=<?php echo $nombre_escuela ?>&nombre=<?php echo $nombre_curso ?>" method="POST">
            <br>
            <div class="container-fluid" style="text-align:center">
                <h2><?php echo $nombre_escuela ?></h2>
                <h2><?php echo $nombre_curso.' - '.$codigo_curso ?></h2>
            </div>
            <div style="text-align:left"><h2>Editar grupo</h2></div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="nombre">Nombre grupo: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="nombre" value="<?php echo utf8_encode($grupos_mdl->getNombre()) ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="numeroalumnos">numero alumnos: </label>
                </div>
                <div class="col-md-1">
                    <input type="text" class="form-control" name="numeroalumnos" value="<?php echo $grupos_mdl->getNumeroalumnos() ?>">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="maximoalumnos">maximo alumnos: </label>
                </div>
                <div class="col-md-1">
                    <input class="form-control" type="text" name="maximoalumnos" value="<?php echo $grupos_mdl->getMaximoalumnos() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="codigodocente">Docente: </label>
                </div>
                <div class="col-md-4">
                    <select name="codigodocente" class="form-control select2bs4" required>
                        <?php
                            foreach ($docentes as $key => $docente) {
                        ?>
                        <option value="<?php echo $docente['codigodocente'] ?>" <?php echo ( $grupos_mdl->getCodigodocente() == $docente['codigodocente'] ) ? "selected" : "" ?>><?php echo utf8_encode($docente['nombre']) ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-7">
                <button class="btn btn-primary">Actualizar</button>
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