<?php
    include '../cabecera.html';
?>
<body class="hold-transition sidebar-mini layout-fixed" style="padding-left: 40px">
    <div class="container-fluid">

        <form action="guardar_dar_baja.php?oficinacodigo=<?php echo $_GET['oficinacodigo'] ?>" method="POST" class="formulario" enctype="multipart/form-data">
            <br><br>
            <ul>
            <?php
                $codigos = "";
                if(isset($_POST['equipos']))
                    foreach ($_POST['equipos'] as $key => $equipo) {
                        $codigos .= $equipo.",";
                        ?>
                        <li><?php echo $equipo ?></li>
                        <?php
                    }
                else {
                    echo "<LABEL>SELECCIONE POR LO MENOS UN EQUIPO</LABEL>";
                    exit(0);
                }
            ?>
            </ul>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Fecha de baja: </label>
                </div>
                <div class="col-md-5">
                    <input type="hidden" name="oficinacodigo" value="<?php echo $_GET['oficinacodigo'] ?>" required />
                    <input type="hidden" name="codigos" value="<?php echo $codigos ?>" required />
                    <input type="date" name="fechabaja" class="form-control" required/>
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                    <label>Documento: </label>
                </div>
                <div class="col-md-5">
                    <input class="form-control" type="file" name="archivo" required />
                </div>
            </div>

            <div class="row form-group">
                <div class="col-md-2">
                </div>
                <div class="col-md-5">
                    <button class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>

    </body>
</html>