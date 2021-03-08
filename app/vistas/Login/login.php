<?php
    include '../cabecera.html';
?>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
            <h1><b>UNHEVAL</b></h1>
            </div>
            <div class="card-body">
                <form action="comprueba_login.php" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="usuario" placeholder="Usuario">
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="password" class="form-control" name="password" placeholder="Contraseña">
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary">INGRESAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include '../foot.html' ?>
</body>
</html>