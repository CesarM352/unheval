

<?php include '../cabecera.html' ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <br>
    <div class="wraper">
        <div class="row form-group" style="text-align:center">
            <div class="col-md-2">
            </div>
            <div class="col-md-1">
                <label>Buscar:</label>
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" id="buscar_curso"></input>
            </div>
            <div class="col-md-2">
                <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                    <a href="nuevo.php" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
                </button>
            </div>
        </div>
        <br>
        <div class="container-fluid" style="text-align:center" id="tabla_cursos">
            
        </div>
    </div>
    <?php include '../foot.html' ?>
    <script>
        //Para la carga de la tabla cursos en el módulo cursos
        $(buscar_cursos());

        function buscar_cursos(curso){
            $.ajax({
                url: 'tabla_cursos.php',
                type: 'POST',
                dataType: 'html',
                data: {curso: curso},
            })
            .done(function(respuesta){
                $("#tabla_cursos").html(respuesta);
            })
            .fail(function(){
                console.log("error");
            })
        }

        //Detectar los curso introducidos en el campo de texto cursos
        $(document).on('keyup', '#buscar_curso', function(){
            var curso=$(this).val();
            if(curso!=""){
                buscar_cursos(curso);
            }
            else{
                buscar_cursos();
            }
        });
    </script>
    <script>
        $(function(){
            $('#mi-tabla').tablesorter(); 
        });
    </script>
</body>
</html>

