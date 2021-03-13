<?php
    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form action="guardar.php" method="POST">
            <br>
            <div style="text-align:center"><h2>Nuevo Estudiante</h2></div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="codigoestudiante">Código: </label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="codigoestudiante" required/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="nombre">Nombre: </label>
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="nombre" required/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="dni">DNI: </label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="dni" required/>
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
                    <label for="email">Correo: </label>
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="text" name="email"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="anionacimiento">Nacimiento: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="date" name="anionacimiento"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="fechaingreso">Ingreso: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="date" name="fechaingreso"/>
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
                    <label for="pass">Contraseña: </label>
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