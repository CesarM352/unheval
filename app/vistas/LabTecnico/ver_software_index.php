<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabAmbienteController.php';
    require_once '../../controladores/LabSoftwareAdquisicionController.php';

    $ambiente_controlador = new LabAmbienteController;
    $ambientes = $ambiente_controlador->getAllAmbientes($conexion, 0);

    $software_adquisicion_controlador = new LabSoftwareAdquisicionController;
    $softwares = $software_adquisicion_controlador->getAllSoftwaresAdquisiciones($conexion, 0);
    //$proceso_mdl = $proceso_controlador->getProceso( $conexion, $_GET['proceso_id'] );
    include '../cabecera.html';
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wraper" style="text-align: center">
        <br>
		<button id="btn_nuevo" class="btn btn-info font-weight-bolder">
			<a href="../LabSoftware/index.php" style="color: inherit">Administrar Softwares <i class="fa fa-book"></i></a>
		</button>
        <br>
        <h2> <?php //echo $proceso_mdl->getCodigo()." ".$proceso_mdl->getNombre() ?></h2>
        <br>
        <!-- <a href="nuevo.php?proceso_id=<?php //echo $_GET['proceso_id'] ?>">Nuevo</a>-->
        <!--<div class="form-inline" style="justify-content: center;">
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
                                <a href="ver_software.php?ambiente_id=<?php echo $ambiente["codigooficina"] ?>" > Ver Software</a> 
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
        </div>-->
        <div class="wraper">
            <div class="row form-group" style="text-align:center">
                <div class="col-md-2">
                </div>
                <div class="col-md-1">
                    <label>Buscar:</label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" id="buscar_software"></input>
                </div>
                <!--<div class="col-md-2">
                    <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                        <a href="../LabEquipo/nuevo.php" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
                    </button>
                </div>-->
                <!--<div class="col-md-2">
                    <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                        <a href="nuevo.php" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
                    </button>
                </div>-->
            </div>
            <br>
            <div class="container-fluid" style="text-align:center" id="tabla_software">
                
            </div>
        </div>
        <!--<br>
        <div class="container-fluid" style="text-align:center">
            Días por vencer: <input type="number" id="dias_por_vencer" min=0 />
            <button class="btn btn-sm btn-danger" id="btn_ver_vencidos">Ver Vencidos</button>
            <button class="btn btn-sm btn-info" id="btn_ver_todos">Ver Todos</button>
            <table id="tbl_datos_todos" class='table table-bordered table-hover'>
                <thead>
                    <tr id="fil">
                        <th>SOFTWARE</th>
                        <th>TIPO</th>
                        <th>FORMA</th>
                        <th>NRO LICENCIAS</th>
                        <th>FECHA COMPRA</th>
                        <th>DÍAS DE DURACIÓN</th>
                        <th>PERIODO DE VIGENCIA</th>
                        <th>CONDICÓN</th>
                        <th>LICENCIAS DISPONIBLES</th>
                        <th>REQUISITOS MINIMOS</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                foreach ($softwares as $key => $software) {
                    $texto_vencimiento = "";
                    $color_fondo = "";
                    if( $software["duracion_dias"] >0 )
                        if($software["dias_por_vencer"] > 0){
                            $texto_vencimiento = "Se venció hace ".abs($software["dias_por_vencer"])." días";
                            $color_fondo = "bg-danger vencidos";
                        }
                        elseif($software["dias_por_vencer"] < 0){
                            $texto_vencimiento = "Quedan ".abs($software["dias_por_vencer"])." días para vencer";
                            $color_fondo = "por_vencer";
                        }
                        else{
                            $texto_vencimiento = "Hoy se vencen las licencias";
                            $color_fondo = "red";
                            $color_fondo = "bg-warning por_vencer";
                        }
            ?>
                <tr class="<?php echo $color_fondo ?>" data-dias_por_vencer="<?php if( $software["dias_por_vencer"] <= 0) echo abs($software["dias_por_vencer"])  ?>">
                    <td> <?php echo $software["software_descripcion"] ?> </td>
                    <td> <?php echo $software["software_tipo_sw"] ?> </td>
                    <td> <?php echo $software["software_forma"] ?> </td>
                    <td> <?php echo $software["nro_licencias"] ?> </td>
                    <td> <?php echo $software["fecha_compra"] ?> </td>
                    <td> <?php 
                        if( $software["duracion_dias"] >0 )
                            echo $software["duracion_dias"] ;
                        else
                            echo "&infin;";
                        ?> 
                    </td>
                    <td> <?php 
                        if($software["software_propietario"] == 1 && $software["duracion_dias"] > 0 )
                            echo $software["fecha_vencimiento"];
                        else
                            echo " - ";
                    ?> </td>
                    <td> <?php echo $texto_vencimiento; ?> </td>
                    <td> <?php 
                        if( $software["duracion_dias"] >0 || $software["duracion_dias"] == -1 )
                            echo $software["nro_licencias_disponibles"] ;
                        else
                            echo "&infin;";
                    ?> </td>
                    <td> <?php echo $software["requisitos_minimos"] ?> </td>
                </tr>
            <?php
                }
            ?>
                </tbody>
            </table>
        </div>

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
    </script>-->
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
</body>
</html>