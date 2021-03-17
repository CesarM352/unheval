<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/DocentesController.php';
    require_once '../../controladores/DireccionesController.php';
    require_once '../../controladores/TipoContratoDocController.php';

    $codigodocente= $_GET['codigodocente'];
    $docentes_controlador = new DocentesController;
    $docentes_mdl = $docentes_controlador->getDocente($conexion, $codigodocente);

    $direcciones_controlador = new DireccionesController;
    $direcciones = $direcciones_controlador->getAllDirecciones($conexion);

    $tipocontratodoc_controlador = new TipoContratoDocController;
    $tipocontratodoc = $tipocontratodoc_controlador->getAllTipoContratoDoc($conexion);

    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form action="actualizar.php?codigodocente=<?php echo $codigodocente ?>" method="POST">
        <!--<form action="actualizar.php" method="POST">-->
            <br>
            <div style="text-align:center"><h2>Editar Docente</h2></div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="codigo">Código: </label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="codigo" value="<?php echo $codigodocente ?>" readonly/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="nombre">Nombre: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="nombre" value="<?php echo utf8_encode($docentes_mdl->getNombre()) ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="dni">DNI: </label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="dni" value="<?php echo $docentes_mdl->getDni() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="celular">Celular: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="celular" value="<?php echo $docentes_mdl->getCelular() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="direccion">Dirección: </label>
                </div>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="direccion" value="<?php echo $docentes_mdl->getDireccion() ?>"/>
                </div>
            </div>
            <!--<div class="row form-group">
                <div class="col-md-2">
                    <label for="codigodireccion">Dirección: </label>
                </div>
                <div class="col-md-5">
                    <select name="codigodireccion" class="form-control">
                        <?php
                            //foreach ($direcciones as $key => $direccion) {
                        ?>
                        <option value="<?php //echo $direccion['codigodireccion'] ?>" <?php //echo ( $docentes_mdl->getCodigodireccion() == $direccion['codigodireccion'] ) ? "selected" : "" ?> ><?php echo utf8_encode($direccion['nombre'].' '.$direccion['nropuerta']) ?></option>
                        <?php
                           // }
                        ?>
                    </select>
                </div>
            </div>-->
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="codtipocontrato">tipo Contrato: </label>
                </div>
                <div class="col-md-5">
                    <select name="codtipocontrato" class="form-control">
                        <?php
                            foreach ($tipocontratodoc as $key => $tipocontratodo) {
                        ?>
                        <option value="<?php echo $tipocontratodo['codtipocontrato'] ?>" <?php echo ( $docentes_mdl->getCodtipocontrato() == $tipocontratodo['codtipocontrato'] ) ? "selected" : "" ?> ><?php echo utf8_encode($tipocontratodo['nombre']) ?></option>
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
                    <input class="form-control" type="text" name="user" value="<?php echo $docentes_mdl->getUser() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="pass">Contraseña: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="pass" value="<?php echo $docentes_mdl->getPass() ?>"/>
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