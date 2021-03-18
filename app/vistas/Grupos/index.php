<!DOCTYPE html>
<html lang='es'>
<head>
    <?php include '../cabecera.html' ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php
        require_once '../../Conexion.php';
        require_once '../../controladores/GruposController.php';

        $codigo_curso=$_GET['codigocurso'];
        $nombre_escuela=$_GET['carrera'];
        $nombre_curso=$_GET['nombre'];
        $grupos_controlador = new GruposController;
        $grupos = $grupos_controlador->getAllGruposCursoId($conexion, $codigo_curso);
        
    ?>
    <br>
    <div class="wraper">
        <div class="container-fluid" style="text-align:center">
            <h2><?php echo $nombre_escuela ?></h2>
            <h2><?php echo $nombre_curso.' - '.$codigo_curso ?></h2>
        </div>
        <br>
        <div class="container-fluid" style="text-align:center">
            <table class='table table-bordered table-hover'>
                <thead>
                    <tr>
                        <th>Código grupo</th>
                        <th>Nombre</th>
                        <th>Número de alumnos</th>
                        <th>Máximo</th>
                        <th>Docente</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($grupos as $key => $grupo) { ?>
                        <tr>
                            <td><?php echo($grupo['codigogrupo'])?></td>
                            <td><?php echo(utf8_encode($grupo['nombre']))?></td>
                            <td><?php echo($grupo['numeroalumnos'])?></td>
                            <td><?php echo($grupo['maximoalumnos'])?></td>
                            <td><?php echo(utf8_encode($grupo['nombre_docente']))?></td>
                            <td><a href='editar.php?codigogrupo=<?php echo $grupo['codigogrupo'] ?>&codigocurso=<?php echo $codigo_curso ?>&carrera=<?php echo $nombre_escuela ?>&nombre=<?php echo $nombre_curso ?>'>Editar</a></td>
                            <td><a href='eliminar.php?codigogrupo=<?php echo $grupo['codigogrupo'] ?>&codigocurso=<?php echo $codigo_curso ?>&carrera=<?php echo $nombre_escuela ?>&nombre=<?php echo $nombre_curso ?>' onclick='eliminar("<?php echo $grupo["nombre"] ?>", "<?php echo $nombre_curso ?>", "<?php echo $nombre_escuela ?>", event)'>Eliminar</a></td>
                        </tr>
                        <?php } ?>
                </tbody>
            </table>
        </div>
        <br>
        <div class="container-fluid" style="text-align:center">
            <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                <a href="nuevo.php?codigocurso=<?php echo $codigo_curso ?>&carrera=<?php echo $nombre_escuela ?>&nombre=<?php echo $nombre_curso ?>" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
            </button>
            <button class='btn btn-info font-weight-bolder'>
                <a href='../cursos/index.php' style="color: inherit">Volver
            </button>
        </div>
    </div>

    <?php include '../foot.html' ?>

    <script>
        function eliminar(nombre, curso, escuela, event){
            if(!confirm('¿Desea eliminar el '+nombre+' del curso '+curso+' de la escuela '+escuela+' ?'))
                event.preventDefault()
        }
    </script>
</body>
</html>

