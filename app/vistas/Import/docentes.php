<?php
require_once '../../Conexion.php';
require_once '../../controladores/DocentesController.php';
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
            
            foreach ($Reader as $key => $Row)
            {
              if($key>0){
                $codigodocente = "";
                if(isset($Row[0])) {
                    $codigodocente = $Row[0];
                }
                
                $celular = "";
                if(isset($Row[1])) {
                    $celular = $Row[1];
                }

                $dni = "";
                if(isset($Row[2])) {
                    $dni = $Row[2];
                }

                $direccion = "";
                if(isset($Row[3])) {
                    $direccion = $Row[3];
                }

                $nombre = "";
                if(isset($Row[4])) {
                    $nombre = $Row[4];
                }
				
                $codtipocontrato = "";
                if(isset($Row[5])) {
                    $codtipocontrato = $Row[5];
                }
				
                $user = "";
                if(isset($Row[6])) {
                    $user = $Row[6];
                }

                $pass = "";
                if(isset($Row[7])) {
                    $pass = $Row[7];
                }
                
                if (!empty($codigodocente) || !empty($celular) || !empty($dni) || !empty($direccion) || !empty($nombre) || !empty($codtipocontrato) || !empty($user) || !empty($pass)) {
                    $docente_nuevo = [
                        "codigodocente" => $codigodocente,
                        "celular" => $celular,
                        "dni" => $dni,
                        "direccion" => utf8_decode($direccion),
                        "nombre" => utf8_decode($nombre),
                        "codtipocontrato" => $codtipocontrato,
                        "user" => $user,
                        "pass" => $pass
                    ];
                    $docentes_controlador = new DocentesController;
                    $neo=$docentes_controlador->guardar($conexion, $docente_nuevo);
                
                    if (!empty($neo)) {
                        $type = "success";
                        $message = "Excel importado correctamente";
                        //header("Location: ../Docentes/index.php");
                    } else {
                        $type = "error";
                        $message = "Hubo un problema al importar registros";
                    }
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
        <h2 class="mt-1">Importar docentes de archivo excel</h2>
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
                        <button class="btn btn-primary"><a href="../Docentes/index.php" style="color: inherit">Volver</a></button>
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