<?php include '../cabecera.html' ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <br>
    <div style="text-align:center"><h2>MATRÍCULAS</h2></div>
    <br>
    <div class="wraper">
        <div class="row form-group" style="text-align:center">
            <div class="col-md-2">
            </div>
            <div class="col-md-1">
                <label>Buscar:</label>
            </div>
            <div class="col-md-5">
                <input type="text" class="form-control" id="buscar_matricula"></input>
            </div>
            <div class="col-md-2">
                <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                    <a href="../Import/matriculas.php" style="color: inherit">Importar <i class="fa fa-file-upload"></i></a>
                </button>
            </div>
        </div>
        <div class="container-fluid" id="tabla_matriculas">
            
        </div>
    </div>
    <?php include '../foot.html' ?>
    <script>
        //Para la carga de la tabla matriculas en el módulo matriculas
        $(buscar_matriculas());

        function buscar_matriculas(matricula){
            $.ajax({
                url: 'tabla_matriculas.php',
                type: 'POST',
                dataType: 'html',
                data: {matricula: matricula},
            })
            .done(function(respuesta){
                $("#tabla_matriculas").html(respuesta);
                //$('[data-toggle="tooltip"]').tooltip();
            })
            .fail(function(){
                console.log("error");
            })
        }

        //Detectar el nombre de matricula introducidos en el campo de texto matriculas
        $(document).on('keyup', '#buscar_matricula', function(){
            var matricula=$(this).val();
            if(matricula!=""){
                buscar_matriculas(matricula);
            }
            else{
                buscar_matriculas();
            }
        });
    </script>
</body>
</html>

