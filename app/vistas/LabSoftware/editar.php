<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabSoftwareController.php';

    $software_controlador = new LabSoftwareController;
    $software_mdl = $software_controlador->getSoftware($conexion, $_GET['id']);

    include '../cabecera.html';
?>
<body class="principal">
    <div class="container">

        <form action="actualizar.php?id=<?php echo $_GET['id'] ?>" method="POST" class="formulario">
            <br><br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label>Nombre: </label>
                </div>
                <div class="col-md-7">
                    <textarea class="form-control" name="nombre" ><?php echo $software_mdl->getnombre() ?></textarea>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Versión: </label>
                </div>
                <div class="col-md-7">
                    <input type="text" name="version" value="<?php echo $software_mdl->getVersion() ?>" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Es propietario: </label>
                </div>
                <div class="col-md-7">
                    <label><input type="radio" name="propietario" value="1" <?php echo ($software_mdl->getPropietario() == 1) ? 'checked' : '' ?> onclick="asignarValorDefecto('propietario',1)" required />SÍ</label>
                    <label><input type="radio" name="propietario" value="0" <?php echo ($software_mdl->getPropietario() == 0) ? 'checked' : '' ?> onclick="asignarValorDefecto('propietario',0)" required />NO</label>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Tiene licencia: </label>
                </div>
                <div class="col-md-7">
                    <label><input type="radio" name="conlicencia" value="1" <?php echo ($software_mdl->getConLicencia() == 1) ? 'checked' : '' ?> onclick="asignarValorDefecto('conlicencia',1)" required />SÍ</label>
                    <label><input type="radio" name="conlicencia" value="0" <?php echo ($software_mdl->getConLicencia() == 0) ? 'checked' : '' ?> onclick="asignarValorDefecto('conlicencia',0)" required />NO</label>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    Tipo SW
                </div>
                <div class="col-md-7">
                    <input type="text" name="tipo_sw" id="tipo_sw" value="<?php echo $software_mdl->geTtipoSw() ?>" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    Forma
                </div>
                <div class="col-md-7">
                    <input type="text" name="forma" id="forma" value="<?php echo $software_mdl->getForma() ?>" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Requerimiento mínimo de RAM: </label>
                </div>
                <div class="col-md-7">
                    <input type="text" name="minimoram" value="<?php echo $software_mdl->getMinimoRam() ?>" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Requerimiento mínimo de video: </label>
                </div>
                <div class="col-md-7">
                    <input type="text" name="minimovideo" value="<?php echo $software_mdl->getMinimoVideo() ?>" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Requerimiento mínimo de procesador: </label>
                </div>
                <div class="col-md-7">
                    <input type="text" name="minimoprocesador" value="<?php echo $software_mdl->getMinimoProcesador() ?>" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Requerimiento mínimo de Disco Duro: </label>
                </div>
                <div class="col-md-7">
                    <input type="text" name="minimohhd" value="<?php echo $software_mdl->getMinimoHhd() ?>" />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    Detalles
                </div>
                <div class="col-md-7">
                    <textarea class="form-control" name="detalles" ><?php echo $software_mdl->getDetalles() ?></textarea>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-7">
                    <button class="btn btn-primary">Actualizar</button>
                    <button class="btn btn-primary"><a href="index.php?procesos_id=<?php //echo $software_mdl->getProcesosId() ?>" style="color: inherit">Cancelar</button>
                </div>
            </div>
        </form>

        <script src="../../../public/js/bootstrap/bootstrap.min.js"></script>
        <script src="../../../public/js/jquery-3.4.1.min.js"></script>
        <script src="../../../public/js/jquery-ui.js"></script>
    </body>
</html>