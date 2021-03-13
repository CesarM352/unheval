<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/DireccionesController.php';
    require_once '../../controladores/TipoContratoDocController.php';

    $direcciones_controlador = new DireccionesController;
    $direcciones = $direcciones_controlador->getAllDirecciones($conexion);

    $tipocontratodoc_controlador = new TipoContratoDocController;
    $tipocontratodoc = $tipocontratodoc_controlador->getAllTipoContratoDoc($conexion);

    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form action="guardar.php" method="POST">
        <!--<form action="actualizar.php" method="POST">-->
            <br>
            <div style="text-align:center"><h2>Editar docente</h2></div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="codigo">Código: </label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="codigo"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="nombre">Nombre: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="nombre"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="dni">DNI: </label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="dni"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="celular">Celular: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="celular"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="codigodireccion">Dirección: </label>
                </div>
                <div class="col-md-5">
                    <select name="codigodireccion" class="form-control">
                        <?php
                            foreach ($direcciones as $key => $direccion) {
                        ?>
                        <option value="<?php echo $direccion['codigodireccion'] ?>"><?php echo utf8_encode($direccion['nombre'].' '.$direccion['nropuerta']) ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="codtipocontrato">tipo Contrato: </label>
                </div>
                <div class="col-md-5">
                    <select name="codtipocontrato" class="form-control">
                        <?php
                            foreach ($tipocontratodoc as $key => $tipocontratodo) {
                        ?>
                        <option value="<?php echo $tipocontratodo['codtipocontrato'] ?>"><?php echo utf8_encode($tipocontratodo['nombre']) ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="user">Usuario: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="user"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="pass">Password: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="pass"/>
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