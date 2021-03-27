
<?php include '../cabecera.html' ?>

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
            <table class='table table-bordered table-hover' id="grupos">
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
                            <td><a href='editar.php?codigogrupo=<?php echo $grupo['codigogrupo'] ?>&codigocurso=<?php echo $codigo_curso ?>&carrera=<?php echo $nombre_escuela ?>&nombre=<?php echo $nombre_curso ?>' data-toggle='tooltip' data-placement='left' title='Editar'><i class='nav-icon fas fa-edit'></i></a></td>
                            <td><a href='#' onclick='eliminar("<?php echo $grupo["nombre"] ?>", "<?php echo $nombre_curso ?>", "<?php echo $nombre_escuela ?>",
                                                    "<?php echo $grupo["codigogrupo"] ?>", "<?php echo $codigo_curso ?>", event)' data-toggle='tooltip' data-placement='left' title='Eliminar'><i class='nav-icon fas fa-trash-alt'></i></a></td>
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
                <a href='../cursos/index.php' style="color: inherit">Volver <i class="fa fa-backward"></i></a>
            </button>
        </div>
    </div>

    <?php include '../foot.html' ?>

    <!--<script>
        function eliminar(nombre, curso, escuela, cod_grupo, cod_curso, event){
            if(!confirm('¿Desea eliminar el '+nombre+' del curso '+curso+' de la escuela '+escuela+' ?'))
                event.preventDefault()
        }
    </script>-->
    <script>
        $(function () {
            $('#grupos').DataTable({
                'lengthMenu': [[15, 25, 50, -1], [15, 25, 50, 'All']],
                'paging': false,
                'lengthChange': false,
                'searching': false,
                'ordering': false,
                'info': false,
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
    <script>
        function eliminar(nombre, curso, escuela, cod_grupo, cod_curso, event){
            Swal.fire({
                title: '¿Esta seguro?',
                text: "Se va a eliminar el "+nombre+" del curso "+curso+" de la escuela de "+escuela,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Borrar',
                }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'eliminar.php',
                        type: 'POST',
                        dataType: 'html',
                        data: {cod_grupo: cod_grupo}
                    })
                    .done(function(response){
                        if(response=='ok'){
                            window.location="index.php?codigocurso="+cod_curso+"&carrera="+escuela+"&nombre="+curso;
                        }else{
                            Swal.fire('Error MySql: '+response);
                        }
                    })
                }
                })
        }
    </script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>
</html>

