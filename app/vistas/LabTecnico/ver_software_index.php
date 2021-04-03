<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabAmbienteController.php';
    require_once '../../controladores/LabSoftwareAdquisicionController.php';

    $ambiente_controlador = new LabAmbienteController;
    $ambientes = $ambiente_controlador->getAllAmbientes($conexion, 0);

    $software_adquisicion_controlador = new LabSoftwareAdquisicionController;
    $softwares = $software_adquisicion_controlador->getAllSoftwaresAdquisiciones($conexion, 0);
    include '../cabecera.html';
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wraper" style="text-align: center">
        <br>
		<button id="btn_nuevo" class="btn btn-info font-weight-bolder">
			<a href="../LabSoftware/index.php" style="color: inherit">Administrar Softwares <i class="fa fa-book"></i></a>
		</button>
        <br><br>
        <div class="form-inline" style="justify-content: center;">
            <div class="icheck-primary d-inline">
                <input type="radio" id="rdb_tipo_ambiente_0" name="rdb_tipo_ambiente" value="0" checked onclick="filtrarPorTipoAmbiente(0)"/>
                <label for="rdb_tipo_ambiente_0">TODOS &nbsp;&nbsp;&nbsp;</label>
            </div>
            <div class="icheck-primary d-inline">
                <input type="radio" id="rdb_tipo_ambiente_1" name="rdb_tipo_ambiente" value="1" onclick="filtrarPorTipoAmbiente(1)"/>
                <label for="rdb_tipo_ambiente_1">AULA &nbsp;&nbsp;&nbsp;</label>
            </div>
            <div class="icheck-primary d-inline">
                <input type="radio" id="rdb_tipo_ambiente_2" name="rdb_tipo_ambiente" value="2" onclick="filtrarPorTipoAmbiente(2)"/>
                <label for="rdb_tipo_ambiente_2">LABORATORIO &nbsp;&nbsp;&nbsp;</label>
            </div>
            <div class="icheck-primary d-inline">
                <input type="radio" id="rdb_tipo_ambiente_3" name="rdb_tipo_ambiente" value="3" onclick="filtrarPorTipoAmbiente(3)"/>
                <label for="rdb_tipo_ambiente_3">OFICINA &nbsp;&nbsp;&nbsp;</label>
            </div>
        </div>
        <br>
        <div class="container-fluid" style="text-align:center">
            <div class="row form-group">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table id="tbl_datos" class='table table-bordered table-hover'>
                        <thead>
                            <tr id="fil">
                                <th>AMBIENTE</th>
                                <th>TIPO</th>
                                <th>VER SOFTWARE</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                        foreach ($ambientes as $key => $ambiente) {
                    ?>
                        <tr id="fila_<?php echo $ambiente["codigooficina"] ?>" class=" tbl_datos_filas tipo_ambiente_<?php echo $ambiente["codtipoofi"] ?>">
                            <td> <?php echo $ambiente["nombre"] ?> </td>
                            <td> <?php echo $ambiente["tipo_oficina_nombre"] ?> </td>
                            <td> 
                                <a href="ver_software.php?ambiente_id=<?php echo $ambiente["codigooficina"] ?>" data-toggle='tooltip' data-placement='left' title='Software'><i class='nav-icon fas fa-th'></i></a> 
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div><br>
        <div class="wraper">
            <div class="row form-group" style="text-align:center">
                <div class="col-md-1">
                    <label>Buscar:</label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="buscar_software"></input>
                </div>
                <div class="col-md-6">
                    <label>Días por vencer:</label> &nbsp;&nbsp;<input type="number" id="dias_por_vencer" min=0 />
                    <button class="btn btn-sm btn-danger" id="btn_ver_vencidos">Ver Vencidos</button>
                    <button class="btn btn-sm btn-info" id="btn_ver_todos">Ver Todos</button>
                </div>
            </div>
            <br>
            <div class="container-fluid" style="text-align:left" id="tabla_software">
            </div>
        </div>
        <br>
    </div>
    <?php include '../foot.html' ?>
    <script>
        $(function () {
            $("#btn_ver_todos").click( function(){
                $("#dias_por_vencer").val('')
                $("#tbl_datos_todos tbody tr").css('display','table-row')
            })

            $("#btn_ver_vencidos").click( function(){
                $("#dias_por_vencer").val('')
                $("#tbl_datos_todos tbody tr").css('display','none')
                $(".vencidos").css('display','table-row')
                
            })

            $("#dias_por_vencer").change( function(){
                let valor = $(this).val()
                if( $(this).val() != '' ){
                    $("#tbl_datos_todos tbody tr").css('display','none')
                    $(".por_vencer").each( function(){
                        if( parseInt($(this).data('dias_por_vencer')) <= valor )
                            $(this).css('display','table-row')
                    })
                }
                
            })
        })


        function eliminar(id, event){
            if(!confirm("Desea elminar el registro de codigo " + id) )
                event.preventDefault()
        }

    function filtrarPorTipoAmbiente( numero ){
        filas = document.getElementsByClassName("tbl_datos_filas")
        for(i=0; i<filas.length; i++){
            if( numero != 0 )
                filas.item(i).style.display="none"
            else
                filas.item(i).style.display="table-row"
        }
        filas_mostrar = document.getElementsByClassName("tipo_ambiente_" + numero)
        for(i=0; i<filas_mostrar.length; i++){
            filas_mostrar.item(i).style.display="table-row"
        }
    }
    </script>
    <script>
        //Para la carga de la tabla software en el módulo software
        $(buscar_software());

        function buscar_software(software){
            $.ajax({
                url: 'tabla_software.php',
                type: 'POST',
                dataType: 'html',
                data: {software: software},
            })
            .done(function(respuesta){
                $("#tabla_software").html(respuesta);
                $('[data-toggle="tooltip"]').tooltip();
            })
            .fail(function(){
                console.log("error");
            })
        }

        //Detectar los software introducidos en el campo de texto software
        $(document).on('keyup', '#buscar_software', function(){
            var software=$(this).val();
            if(software!=""){
                buscar_software(software);
            }
            else{
                buscar_software();
            }
        });
    </script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</body>
</html>