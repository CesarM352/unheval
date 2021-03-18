<?php
require_once '../../Conexion.php';
require_once '../../controladores/EstudiantesController.php';
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

include '../cabecera.html';

if (isset($_POST["import"]))
{
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
    if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'subidas/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $codigoestudiante = "";
                if(isset($Row[0])) {
                    $codigoestudiante = $Row[0];
                }
                
                $nombre = "";
                if(isset($Row[1])) {
                    $nombre = $Row[1];
                }
				
                $user = "";
                if(isset($Row[2])) {
                    $user = $Row[2];
                }
				
                $pass = "";
                if(isset($Row[3])) {
                    $pass = $Row[3];
                }

                $anionacimiento = "";
                if(isset($Row[4])) {
                    $anionacimiento = $Row[4];
                }

                $fechaingreso = "";
                if(isset($Row[5])) {
                    $fechaingreso = $Row[5];
                }

                $dni = "";
                if(isset($Row[6])) {
                    $dni = $Row[6];
                }

                $celular = "";
                if(isset($Row[7])) {
                    $celular = $Row[7];
                }

                $email = "";
                if(isset($Row[8])) {
                    $email = $Row[8];
                }

                //convertir a formato date
                $nacimiento=date_create($anionacimiento);
                $ingreso=date_create($fechaingreso);

                if (!empty($codigoestudiante) || !empty($nombre) || !empty($user) || !empty($pass) || !empty($anionacimiento) || !empty($fechaingreso) || !empty($dni) || !empty($celular) || !empty($email)) {
                    $estudiante_nuevo = [
                        "codigoestudiante" => $codigoestudiante,
                        "nombre" => utf8_decode($nombre),
                        "user" => $user,
                        "pass" => $pass,
                        "anionacimiento" => date_format($nacimiento,"Y-m-d"),
                        "fechaingreso" => date_format($ingreso,"Y-m-d"),
                        "dni" => $dni,
                        "celular" => $celular,
                        "email" => $email
                    ];
                    
                    $estudiantes_controlador = new EstudiantesController;
                    $neo=$estudiantes_controlador->guardar($conexion, $estudiante_nuevo);
                
                    if (!empty($neo)) {
                        $type = "success";
                        $message = "Excel importado correctamente";
                        //header("Location: ../Estudiantes/index.php");
                    } else {
                        $type = "error";
                        $message = "Hubo un problema al importar registros";
                    }
                }
            }
        
        }
    }
    else
    { 
            $type = "error";
            $message = "El archivo enviado es invalido. Por favor vuelva a intentarlo";
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/sticky-footer-navbar.css" rel="stylesheet">
    <link href="assets/style.css" rel="stylesheet">
</head>
<body>
<br>
    <div class="container">
        <h2 class="mt-1">Importar estudiantes de archivo excel</h2>
        <hr>
        <div class="row">
            <div class="col-12 col-md-12">
            <div class="outer-container">
                <form action="" method="post"
                    name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                    <div>
                        <label>Suba su archivo aqui &nbsp;</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;<button type="submit" id="submit" name="import" class="btn-info">Importar Registros</button><br><br>
                        <div style="text-align: center">
                        <button class="btn btn-primary"><a href="../Estudiantes/index.php" style="color: inherit">Volver</a></button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
        </div>       
    </div>
    <?php include '../foot.html' ?>
</body>
</html>