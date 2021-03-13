<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/EstudiantesController.php';

    $codigoestudiante= $_GET['codigoestudiante'];
    $estudiantes_controlador = new EstudiantesController;
    $estudiantes_mdl = $estudiantes_controlador->getEstudiante($conexion, $codigoestudiante);

    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form action="actualizar.php?codigoestudiante=<?php echo $codigoestudiante ?>" method="POST">
        <!--<form action="actualizar.php" method="POST">-->
            <br>
            <div style="text-align:center"><h2>Editar Estudiante</h2></div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="codigoestudiante">Código: </label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="codigoestudiante" value="<?php echo $codigoestudiante ?>" readonly/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="nombre">Nombre: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="nombre" value="<?php echo utf8_encode($estudiantes_mdl->getNombre()) ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="dni">DNI: </label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="dni" value="<?php echo $estudiantes_mdl->getDni() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="celular">Celular: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="celular" value="<?php echo $estudiantes_mdl->getCelular() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="email">Correo: </label>
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="text" name="email" value="<?php echo $estudiantes_mdl->getEmail() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="anionacimiento">Nacimiento: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="date" name="anionacimiento" value="<?php echo $estudiantes_mdl->getAnionacimiento() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="fechaingreso">Ingreso: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="date" name="fechaingreso" value="<?php echo $estudiantes_mdl->getFechaIngreso() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="user">Usuario: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="user" value="<?php echo $estudiantes_mdl->getUser() ?>"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="pass">Contraseña: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="pass" value="<?php echo $estudiantes_mdl->getPass() ?>"/>
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