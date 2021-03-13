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
                <input type="text" class="form-control" id="buscar_tecnico"></input>
            </div>
            <div class="col-md-2">
                <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                    <a href="nuevo.php" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
                </button>
            </div>
        </div>
        <br>
        <div class="container-fluid" style="text-align:center" id="tabla_tecnicos">
            
        </div>
    </div>
    <?php include '../foot.html' ?>
    <script>
        //Para la carga de la tabla tecnicos en el módulo tecnicos
        $(buscar_tecnicos());

        function buscar_tecnicos(tecnico){
            $.ajax({
                url: 'tabla_tecnicos.php',
                type: 'POST',
                dataType: 'html',
                data: {tecnico: tecnico},
            })
            .done(function(respuesta){
                $("#tabla_tecnicos").html(respuesta);
            })
            .fail(function(){
                console.log("error");
            })
        }

        //Detectar los tecnico introducidos en el campo de texto tecnicos
        $(document).on('keyup', '#buscar_tecnico', function(){
            var tecnico=$(this).val();
            if(tecnico!=""){
                buscar_tecnicos(tecnico);
            }
            else{
                buscar_tecnicos();
            }
        });
    </script>
</body>
</html>

