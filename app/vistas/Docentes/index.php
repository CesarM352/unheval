
<?php include '../cabecera.html' ?>

<body class="hold-transition sidebar-mini layout-fixed">
    <br>
    <div style="text-align:center"><h2>DOCENTES</h2></div>
    <br>
    <div class="wraper">
        <div class="row form-group" style="text-align:center">
            <div class="col-md-2">
            </div>
            <div class="col-md-1">
                <label>Buscar:</label>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="buscar_docente"></input>
            </div>
            <div class="col-md-5">
                <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                    <a href="nuevo.php" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
                </button>
                <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                    <a href="../import/docentes.php" style="color: inherit">Importar <i class="fa fa-file-upload"></i></a>
                </button>
            </div>
        </div>
        <div class="container-fluid" id="tabla_docentes">
            
        </div>
    </div>
    <?php include '../foot.html' ?>
    <script>
        //Para la carga de la tabla docentes en el módulo docentes
        $(buscar_docentes());

        function buscar_docentes(docente){
            $.ajax({
                url: 'tabla_docentes.php',
                type: 'POST',
                dataType: 'html',
                data: {docente: docente},
            })
            .done(function(respuesta){
                $("#tabla_docentes").html(respuesta);
                $('[data-toggle="tooltip"]').tooltip();
            })
            .fail(function(){
                console.log("error");
            })
        }

        //Detectar los docente introducidos en el campo de texto docentes
        $(document).on('keyup', '#buscar_docente', function(){
            var docente=$(this).val();
            if(docente!=""){
                buscar_docentes(docente);
            }
            else{
                buscar_docentes();
            }
        });
    </script>
</body>
</html>

