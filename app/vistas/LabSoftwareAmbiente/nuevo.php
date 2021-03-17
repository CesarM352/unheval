<?php
    require_once '../../Conexion.php';
    include_once '../../controladores/LabSoftwareAdquisicionController.php';
    $software_adquisicion_controlador = new LabSoftwareAdquisicionController;
    $softwares_adquisiciones = $software_adquisicion_controlador->getAllSoftwaresAdquisicionesNoParaInstalar($conexion, $_GET['ambiente_id']);

    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form action="guardar.php" method="POST">
            <br>
            <div style="text-align:left"><h2>Software</h2></div>
            <br>
            <div class="row form-group" id="curso_clase">
                <div class="col-md-2">
                    <label>Software: </label>
                </div>
                <div class="col-md-5">
                    <input type="hidden" name="ambiente_id" id="ambiente_id" class="form-control" value="<?php echo $_GET['ambiente_id'] ?>" required/>
                    <select name="sel_sw_ad" id="sel_sw_ad" class="form-control select2bs4" required>
                        <option value="">Seleccione</option>
                        <?php foreach ($softwares_adquisiciones as $key => $software_adquisicion) {
                            $texto_licencias = "POR IDENTIFICAR";
                            if( $software_adquisicion['nro_licencias_disponibles'] == -1 )
                                $texto_licencias = "LICENCIAS PERPETUAS";
                            elseif( $software_adquisicion['software_conlicencia'] == 1 && $software_adquisicion['nro_licencias_disponibles'] == 0 )
                                $texto_licencias = "SIN LICENCIAS";
                            elseif ( $software_adquisicion['software_propietario'] == 0  )
                                $texto_licencias = "NO PROPIETARIO";
                            elseif ( $software_adquisicion['software_conlicencia'] == 1 &&  $software_adquisicion['nro_licencias_disponibles'] > 0 )
                                $texto_licencias = $software_adquisicion['nro_licencias_disponibles']." LICENCIAS";
                        ?>
                        <option value="<?php echo $software_adquisicion['id'] ?>" data-texto="<?php echo $texto_licencias ?>" data-nrolicencias=<?php echo $software_adquisicion['nro_licencias_disponibles'] ?> ><?php echo $software_adquisicion['software_descripcion']." ".$software_adquisicion['software_tipo_sw']." ".$software_adquisicion['software_forma']." ".$texto_licencias ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row form-group" id="div_nro_licencias" style="display:none">
                <div class="col-md-2">
                    <label>Cantidad de Licencias a asignar: </label>
                </div>
                <div class="col-md-5">
                    <input type="number" name="nro_licencias" id="nro_licencias" class="form-control"/>
                </div>
            </div>

            <div class="row form-group" id="div_nro_licencias">
                <div class="col-md-2">
                    <label>Fecha de instalación: </label>
                </div>
                <div class="col-md-5">
                    <input type="date" name="fechainstalacion" id="fechainstalacion" class="form-control" required/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-5">
                    <button class="btn btn-primary">Guardar</button>
                    <button class="btn btn-primary"><a href="../LabTecnico/ver_horario.php?procesos_id=<?php echo $procesos_id ?>" style="color: inherit">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
    <?php include '../foot.html' ?>
    <script>
        $(function () {
            //Inicializar Select2
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            });

            $("#sel_sw_ad").change( function(){
                let nrolicencias = parseInt( $("#sel_sw_ad option:selected").data('nrolicencias') )
                let texto = parseInt( $("#sel_sw_ad option:selected").data('texto') )
                $("#nro_licencias").val('')
                $("#nro_licencias").prop('min','0')
                $("#nro_licencias").prop('max',nrolicencias)
                $("#div_nro_licencias").css('display','none')
                $("#div_nro_licencias").prop('required',false)

                if( nrolicencias > 0 ){
                    $("#nro_licencias").prop('min',1)
                    $("#div_nro_licencias").css('display','flex')
                    $("#div_nro_licencias").prop('required',true)
                }
            })
        })
    </script>
</body>
</html>