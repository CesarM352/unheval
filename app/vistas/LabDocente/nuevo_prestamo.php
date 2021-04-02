<?php
    require_once '../../Conexion.php';
    include_once '../../controladores/LabEquipoController.php';
    $equipo_controlador = new LabEquipoController;
    $equipos = $equipo_controlador->getAllEquipos($conexion);

    include '../cabecera.html';
?>

<body class="principal">
    <div class="container">

        <form action="guardar_prestamo.php" method="POST" class="formulario">
            <br><br>
			<div class="container-fluid" style="text-align:center">
                <h2>Nueva Solicitud de préstamo</h2>
            </div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Detalles: </label>
                </div>
                <div class="col-md-5">
                    <textarea class="form-control" name="detalles" class="form-control" ></textarea>
                </div>
            </div>

            <div class="row form-group" id="fecha_clase">
                <div class="col-md-2">
                    <label>Equipo: </label>
                </div>
                <div class="col-md-7">
                    <select name="codigopatrimonio" id="equipo_id" class="form-control select2bs4">
                        <option value="">Seleccione</option>
                        <?php foreach ($equipos as $key => $equipo) {
                        ?>
                        <option value="<?php echo $equipo['codigopatrimonio'] ?>"><?php echo $equipo['codigopatrimonio'].' '.$equipo['nombre'] ?></option>
                        <?php } ?>
                    </select>
                    <button class="btn btn-warning btn-sm" type="button" id="btn_agregar"> Agregar</button>
                    <input type="hidden" id="equipos_seleccionados" name="equipos_seleccionados" />
                </div>
            </div>

            <div class="row form-group" id="fecha_clase">
                <div class="col-md-2">
                    <label>Equipos seleccionados: </label>
                </div>
                <div class="col-md-7">
                    <ul id="lista_seleccionados">
                    </ul>
                </div>
            </div>

            
            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-5">
                    <button class="btn btn-primary">Guardar</button>
                    <button class="btn btn-primary"><a href="index.php" style="color: inherit">Cancelar</button>
                </div>
            </div>

        </form>
    </div>
    <?php include '../foot.html' ?>
        <script>
        function var1(valor){
            let valor_actual = $("#equipos_seleccionados").val().replace(valor, '')
                    $("#equipos_seleccionados").val(valor_actual)

                    $("#lista_seleccionados li").remove()

                    lista = valor_actual.split(",")

                    lista.forEach(element => {
                        if( element != '')
                            $("#lista_seleccionados").append("<li>" + element + "<button type='button' onclick=\"var1('"+element+"')\" class='item' value=' "+ element +" '>X</button></li>")
                    });
            }
        $(function () {
            //Inicializar Select2
            $('.select2bs4').select2({
            theme: 'bootstrap4'
            });

            $("#btn_agregar").click( function(){
                //console.log( $("#equipos_seleccionados").val().search($("#equipo_id").val()) )
                if( $("#equipos_seleccionados").val().search($("#equipo_id").val()) == -1 ){
                    let valor_actual = $("#equipos_seleccionados").val() + "," + $("#equipo_id").val()
                    $("#equipos_seleccionados").val(valor_actual)

                    $("#lista_seleccionados li").remove()

                    lista = valor_actual.split(",")

                    lista.forEach(element => {
                        if( element != '')
                            $("#lista_seleccionados").append("<li>" + element + "<button type='button' onclick=\"var1('"+element+"')\" class='item' value=' "+ element +" '>X</button></li>")
                    });
                }
            });

            $(".item").click( function(){
                alert($(this).val())
            })
        });
        </script>
    </body>
</html>