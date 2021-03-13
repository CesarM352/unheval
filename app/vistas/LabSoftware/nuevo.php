<?php
    include '../cabecera.html';
?>

<body class="principal">
    <div class="container">

        <form action="guardar.php" method="POST" class="formulario">
            <br><br>
			<div class="container-fluid" style="text-align:center">
                <h2>Nuevo Software</h2>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Nombre: </label>
                </div>
                <div class="col-md-5">
                    <textarea class="form-control" name="nombre" class="form-control" ></textarea>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Versión: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="version" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Es propietario: </label>
                </div>
                <div class="col-md-5">
                    <label><input type="radio" name="propietario" value="1" onclick="asignarValorDefecto('propietario',1)" required />SÍ</label>
                    <label><input type="radio" name="propietario" value="0" onclick="asignarValorDefecto('propietario',0)" required />NO</label>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Tiene licencia: </label>
                </div>
                <div class="col-md-5">
                    <label><input type="radio" name="conlicencia" value="1" onclick="asignarValorDefecto('conlicencia',1)" required />SÍ</label>
                    <label><input type="radio" name="conlicencia" value="0" onclick="asignarValorDefecto('conlicencia',0)" required />NO</label>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Tipo SW</label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="tipo_sw" id="tipo_sw" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Forma</label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="forma" id="forma" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Número de licencias</label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="nro_licencias" id="nro_licencias" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Fecha de Compra</label>
                </div>
                <div class="col-md-5">
                    <input type="date" name="fecha_compra" id="fecha_compra" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Días de licencia</label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="duracion_dias" id="duracion_dias" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Requerimiento mínimo de RAM: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="minimoram" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Requerimiento mínimo de video: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="minimovideo" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Requerimiento mínimo de procesador: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="minimoprocesador" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Requerimiento mínimo de Disco Duro: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="minimohhd" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Detalles</label>
                </div>
                <div class="col-md-5">
                    <textarea class="form-control" name="detalles" class="form-control" ></textarea>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-5">
                    <button class="btn btn-primary">Guardar</button>
                    <button class="btn btn-primary"><a href="index.php?procesos_id=<?php echo $procesos_id ?>">Cancelar</button>
                </div>
            </div>

        </form>
    </div>

        <script src="../../../public/js/bootstrap/bootstrap.min.js"></script>
        <script src="../../../public/js/jquery-3.4.1.min.js"></script>
        <script src="../../../public/js/jquery-ui.js"></script>
        <script>
            function asignarValorDefecto(campo, opcion){
                if( campo == 'propietario' ){
                    if(opcion==0){
                        document.getElementById('tipo_sw').value='LIBRE'
                        document.getElementById('nro_licencias').value=0
                        document.getElementById('duracion_dias').value=0
                        document.getElementById('fecha_compra').value=''
                    }
                    else if(opcion==1){
                        document.getElementById('tipo_sw').value='LICENCIADO'
                    }
                }
            }
        </script>
    </body>
</html>