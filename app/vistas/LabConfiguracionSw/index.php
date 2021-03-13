<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/principal.css">
        <link rel="stylesheet" href="../css/fontawesome/css/all.css">
    </head>

    <body class="principal">

        <?php
            require_once '../../Conexion.php';
            require_once '../../controladores/LabConfiguracionSwController.php';

            $configuracion_sw_controlador = new LabConfiguracionSwController;
            $configuraciones_sw = $configuracion_sw_controlador->getAllConfiguracionesSw($conexion);

            include '../cabecera.html';
        ?>

        <div class="container-fluid" style="text-align:center">
            <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                <a href="nuevo.php">Nuevo <i class="fa fa-plus-circle"></i></a>
            </button>
            <!-- <button id="btn_nuevo" class="btn btn-info font-weight-bolder">
                <a href="nuevo.php">Nuevo</a>
            </button> -->
        </div>

        <table class='table table-hover'>

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Descripción</th>
                    <th>Valor</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
        <?php
            foreach ($configuraciones_sw as $key => $configuracion_sw) {
        ?>
            <tr>
                <td> <?php echo $configuracion_sw["codigoconfiguracionsw"] ?> </td>
                <td> <?php echo $configuracion_sw["descripcion"] ?> </td>
                <td> <?php echo $configuracion_sw["valor"] ?> </td>
                <td> <a href='editar.php?id=<?php echo $configuracion_sw["codigoconfiguracionsw"] ?>'>Editar</a> </td>
                <td> <a href='eliminar.php?id=<?php echo $configuracion_sw["codigoconfiguracionsw"] ?>' onclick="eliminar(<?php echo $configuracion_sw["codigoconfiguracionsw"] ?>, event)">Eliminar</a> </td>
            </tr>
        <?php
            }
        ?>
            </tbody>
        </table>

        <script>
            function eliminar(id, event){
                if(!confirm("Desea elminar el registro de codigo" + id) )
                    event.preventDefault()
            }
        </script>
    </body>
</html>