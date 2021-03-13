<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/TecnicosController.php';

    $numerocontrato= $_GET['numerocontrato'];
    $tecnicos_controlador = new TecnicosController;
    $tecnicos_mdl = $tecnicos_controlador->getTecnico($conexion, $numerocontrato);

    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form action="actualizar.php?numerocontrato=<?php echo $numerocontrato ?>" method="POST">
        <!--<form action="actualizar.php" method="POST">-->
            <br>
            <div style="text-align:center"><h2>Editar Técnico</h2></div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="numerocontrato">Contrato Nro: </label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="numerocontrato" value="<?php echo $numerocontrato ?>" readonly/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="nombre">Nombre: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="nombre" value="<?php echo utf8_encode($tecnicos_mdl->getNombre()) ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="dni">DNI: </label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="dni" value="<?php echo $tecnicos_mdl->getDni() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="celular">Celular: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="celular" value="<?php echo $tecnicos_mdl->getCelular() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="anionacimiento">Nacimiento: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="date" name="anionacimiento" value="<?php echo $tecnicos_mdl->getAnionacimiento() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="fechainicio">Inicio Contrato: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="date" name="fechainicio" value="<?php echo $tecnicos_mdl->getFechainicio() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="fechacaduca">Fin Contrato: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="date" name="fechacaduca" value="<?php echo $tecnicos_mdl->getFechacaduca() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="user">Usuario: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="user" value="<?php echo $tecnicos_mdl->getUser() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="pass">Contraseña: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="pass" value="<?php echo $tecnicos_mdl->getPass() ?>"/>
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