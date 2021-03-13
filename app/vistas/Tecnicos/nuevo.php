<?php
    include '../cabecera.html';
?>

<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">
        <form action="guardar.php" method="POST">
        <!--<form action="actualizar.php" method="POST">-->
            <br>
            <div style="text-align:center"><h2>Nuevo Técnico</h2></div>
            <br>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="numerocontrato">Contrato Nro: </label>
                </div>
                <div class="col-md-2">
                    <input type="text" class="form-control" name="numerocontrato"/>
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
                    <label for="anionacimiento">Nacimiento: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="date" name="anionacimiento"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="fechainicio">Inicio Contrato: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="date" name="fechainicio"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-2">
                    <label for="fechacaduca">Fin Contrato: </label>
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="date" name="fechacaduca"/>
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