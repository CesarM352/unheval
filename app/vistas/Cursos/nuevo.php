<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/CursosController.php';
    require_once '../../controladores/CarrerasController.php';

    $carreras_controlador = new CarrerasController;
    $carreras = $carreras_controlador->getAllCarreras($conexion);

    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form action="guardar.php" method="POST">
            <br>
            <div style="text-align:center"><h2>Nuevo curso</h2></div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="codigocurso">Código: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="codigocurso" required/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="nombre">Nombre: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="nombre" required/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="descripcion">Descripción: </label>
                </div>
                <div class="col-md-5">
                    <textarea class="form-control" name="descripcion" rows="2"></textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="creditos">Créditos: </label>
                </div>
                <div class="col-md-1">
                    <input class="form-control" type="text" name="numerocredito" required/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="cursocarrera">Curso/Carrera: </label>
                </div>
                <div class="col-md-1">
                    <input class="form-control" type="text" name="cursocarrera"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="carrera">Escuela: </label>
                </div>
                <div class="col-md-4">
                    <select name="codigocarrera" class="form-control" required>
                        <?php
                            foreach ($carreras as $key => $carrera) {
                        ?>
                        <option value="<?php echo $carrera['codigocarrera'] ?>"><?php echo utf8_encode($carrera['nombre']) ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-7">
                    <button class="btn btn-primary">Guardar</button>
                    <button class="btn btn-primary"><a href="index.php" style="color: inherit">Cancelar</a></button>
                </div>
            </div>
        </form>
    </div>
        <?php include '../foot.html' ?>
    </body>
</html>