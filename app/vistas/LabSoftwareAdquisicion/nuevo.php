<?php
    include '../cabecera.html';
?>

<body class="principal">
    <div class="container">

        <form action="guardar.php?software_id=<?php echo $_GET['software_id'] ?>" method="POST" class="formulario">
            <br><br>
			<div class="container-fluid" style="text-align:center">
                <h2>Nueva Adquisición de software</h2>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Número de licencias</label>
                </div>
                <div class="col-md-7">
                    <input type="text" name="nro_licencias" id="nro_licencias" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Fecha de Compra</label>
                </div>
                <div class="col-md-7">
                    <input type="date" name="fecha_compra" id="fecha_compra" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Días de licencia</label>
                </div>
                <div class="col-md-7">
                    <input type="text" name="duracion_dias" id="duracion_dias" class="form-control" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-7">
                    <button class="btn btn-primary">Guardar</button>
                    <button class="btn btn-primary"><a href="index.php?procesos_id=<?php echo $procesos_id ?>">Cancelar</button>
                </div>
            </div>

        </form>
    </div>

        <script src="../../../public/js/bootstrap/bootstrap.min.js"></script>
        <script src="../../../public/js/jquery-3.4.1.min.js"></script>
        <script src="../../../public/js/jquery-ui.js"></script>
    </body>
</html>