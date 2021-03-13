<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/CursosController.php';
    require_once '../../controladores/CarrerasController.php';

    $codigocurso= $_GET['codigocurso'];
    $cursos_controlador = new CursosController;
    $cursos_mdl = $cursos_controlador->getCurso($conexion, $codigocurso);

    $carreras_controlador = new CarrerasController;
    $carreras = $carreras_controlador->getAllCarreras($conexion);

    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form action="actualizar.php?codigocurso=<?php echo $codigocurso ?>" method="POST">
            <br>
            <div style="text-align:center"><h2>Editar curso</h2></div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="nombre">Nombre: </label>
                </div>
                <div class="col-md-5">
                    <input type="text" class="form-control" name="nombre" value="<?php echo utf8_encode($cursos_mdl->getNombre()) ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="descripcion">Descripción: </label>
                </div>
                <div class="col-md-5">
                    <textarea class="form-control" name="descripcion" rows="2"><?php echo utf8_encode($cursos_mdl->getDescripcion()) ?></textarea>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="creditos">Créditos: </label>
                </div>
                <div class="col-md-1">
                    <input class="form-control" type="text" name="numerocredito" value="<?php echo $cursos_mdl->getNumerocredito() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="carrera">Escuela: </label>
                </div>
                <div class="col-md-5">
                    <select name="codigocarrera" class="form-control">
                        <?php
                            foreach ($carreras as $key => $carrera) {
                        ?>
                        <option value="<?php echo $carrera['codigocarrera'] ?>" <?php echo ( $cursos_mdl->getCodigocarrera() == $carrera['codigocarrera'] ) ? "selected" : "" ?> ><?php echo utf8_encode($carrera['nombre']) ?></option>
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
                    <button class="btn btn-primary">Actualizar</button>
                    <button class="btn btn-primary"><a href="index.php" style="color: inherit">Cancelar</a></button>
                </div>
            </div>
        </form>
    </div>
        <?php include '../foot.html' ?>
    </body>
</html>