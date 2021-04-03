<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabAmbienteController.php';
    require_once '../../controladores/LabEquipoController.php';

    $ambiente_controlador = new LabAmbienteController;
    $ambientes = $ambiente_controlador->getAllAmbientes($conexion, 0);

    $equipo_controlador = new LabEquipoController;
    $equipos = $equipo_controlador->equiposActivos($conexion, 0);
    $equipos_baja = $equipo_controlador->equiposEnBaja($conexion, 0);
    //$proceso_mdl = $proceso_controlador->getProceso( $conexion, $_GET['proceso_id'] );
    include '../cabecera.html';
?>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wraper" style="text-align: center">
        <br>
        <h2> <?php //echo $proceso_mdl->getCodigo()." ".$proceso_mdl->getNombre() ?></h2>
        <br>
        <!-- <a href="nuevo.php?proceso_id=<?php //echo $_GET['proceso_id'] ?>">Nuevo</a>-->
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
                    <table class='table table-bordered table-hover'>
                        <thead>
                            <tr id="fil">
                                <th>AMBIENTE</th>
                                <th>TIPO</th>
                                <th>VER EQUIPOS</th>
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
                                <a href="ver_inventario.php?ambiente_id=<?php echo $ambiente["codigooficina"] ?>" data-toggle='tooltip' data-placement='left' title='Equipos'><i class='nav-icon fas fa-desktop'></i></a> 
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div><br>
        </div>
        <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
            <a href="../LabEquipo/nuevo.php" style="color: inherit">Nuevo <i class="fa fa-plus-circle"></i></a>
        </button>
        <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                    <a href="../import/equipos.php" style="color: inherit">Importar <i class="fa fa-file-upload"></i></a>
        </button>
        <br><br>

        <div><H2>REPORTE DE EQUIPOS</H2></div>
        <div class="form-inline" style="justify-content: center;">
            <div class="icheck-primary d-inline">
                <input type="radio" id="rdb_tipo_equipo_1" name="rdb_tipo_equipo" value="1" onclick="filtrarPorTipoEquipo(1)"/>
                <label for="rdb_tipo_equipo_1">VIGENTES &nbsp;&nbsp;&nbsp;</label>
            </div>
            <div class="icheck-primary d-inline">
                <input type="radio" id="rdb_tipo_equipo_2" name="rdb_tipo_equipo" value="2" onclick="filtrarPorTipoEquipo(2)"/>
                <label for="rdb_tipo_equipo_2">POR VENCER &nbsp;&nbsp;&nbsp;</label>
            </div>
            <div class="icheck-primary d-inline">
                <input type="radio" id="rdb_tipo_equipo_3" name="rdb_tipo_equipo" value="3" onclick="filtrarPorTipoEquipo(3)"/>
                <label for="rdb_tipo_equipo_3">OBSOLETOS &nbsp;&nbsp;&nbsp;</label>
            </div>
            <div class="icheck-primary d-inline">
                <input type="radio" id="rdb_tipo_equipo_4" name="rdb_tipo_equipo" value="4" onclick="filtrarPorTipoEquipo(4)"/>
                <label for="rdb_tipo_equipo_4">DE BAJA &nbsp;&nbsp;&nbsp;</label>
            </div>
        </div>
        <div class="container-fluid" id="tabla_equipos" style="text-align: left"></div>
    </div>
    <?php include '../foot.html'; ?>

    <script>
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
        function filtrarPorTipoEquipo( numero ){
            filas = document.getElementsByClassName("tbl_datos_filas")
            for(i=0; i<filas.length; i++){
                if( numero != 0 )
                    filas.item(i).style.display="none"
                else
                    filas.item(i).style.display="table-row"
            }
            filas_mostrar = document.getElementsByClassName("tipo_equipo_" + numero)
            for(i=0; i<filas_mostrar.length; i++){
                filas_mostrar.item(i).style.display="table-row"
            }
        }
    </script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script>
        //Para la carga de la tabla equipos en el módulo equipos
        $(buscar_equipos());

        function buscar_equipos(equipo){
            $.ajax({
                url: 'tabla_equipos.php',
                type: 'POST',
                dataType: 'html',
                data: {equipo: equipo},
            })
            .done(function(respuesta){
                $("#tabla_equipos").html(respuesta);
                $('[data-toggle="tooltip"]').tooltip();
            })
            .fail(function(){
                console.log("error");
            })
        }
        //Detectar el nombre de equipo introducidos en el campo de texto equipos
        function filtrarPorTipoEquipo(numero){
            var equipo=numero;
            if(equipo!=""){
                buscar_equipos(equipo);
            }else{
                buscar_equipos();
            }
        };
    </script>
</body>
</html>