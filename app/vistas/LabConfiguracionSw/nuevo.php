<?php
    include '../cabecera.html';
?>

<body class="principal">
    <div class="container">

        <form action="guardar.php" method="POST" class="formulario">
            <br><br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Descripción: </label>
                </div>
                <div class="col-md-7">
                    <textarea class="form-control" name="descripcion" ></textarea>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Valor: </label>
                </div>
                <div class="col-md-7">
                    <textarea class="form-control" name="valor" ></textarea>
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