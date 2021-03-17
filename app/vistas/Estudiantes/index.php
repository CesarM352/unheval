<?php include '../cabecera.html' ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <br>
    <div style="text-align:center"><h2>ESTUDIANTES</h2></div>
    <br>
    <div class="wraper">
        <div class="row form-group" style="text-align:center">
            <div class="col-md-2">
            </div>
            <div class="col-md-1">
                <label>Buscar:</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="buscar_estudiante"></input>
            </div>
            <div class="col-md-5">
                <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                    <a href="nuevo.php" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
                </button>
                <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                    <a href="../Import/estudiantes.php" style="color: inherit">Importar <i class="fa fa-file-upload"></i></a>
                </button>
            </div>
        </div>
        <br>
        <div class="container-fluid" style="text-align:center" id="tabla_estudiantes">
            
        </div>
    </div>
    <?php include '../foot.html' ?>
    <script>
        //Para la carga de la tabla estudiantes en el módulo estudiantes
        $(buscar_estudiantes());

        function buscar_estudiantes(estudiante){
            $.ajax({
                url: 'tabla_estudiantes.php',
                type: 'POST',
                dataType: 'html',
                data: {estudiante: estudiante},
            })
            .done(function(respuesta){
                $("#tabla_estudiantes").html(respuesta);
            })
            .fail(function(){
                console.log("error");
            })
        }

        //Detectar los estudiante introducidos en el campo de texto estudiantes
        $(document).on('keyup', '#buscar_estudiante', function(){
            var estudiante=$(this).val();
            if(estudiante!=""){
                buscar_estudiantes(estudiante);
            }
            else{
                buscar_estudiantes();
            }
        });
    </script>
</body>
</html>

