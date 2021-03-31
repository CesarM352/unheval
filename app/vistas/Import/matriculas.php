<?php
require_once '../../Conexion.php';
require_once '../../controladores/MatriculasController.php';
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
                $codigo_matricula = "";
                if(isset($Row[0])) {
                    $codigo_matricula = $Row[0];
                }

                $codigo_curso = "";
                if(isset($Row[1])) {
                    $codigo_curso = $Row[1];
                }
                
                $codigo_estudiante = "";
                if(isset($Row[2])) {
                    $codigo_estudiante = $Row[2];
                }
				
                $codigo_grupo = "";
                if(isset($Row[3])) {
                    $codigo_grupo = $Row[3];
                }
                
                if (!empty($codigo_matricula) || !empty($codigo_estudiante) || !empty($codigo_curso) || !empty($codigo_grupo)) {
                    $matricula_nuevo = [
                        "codigomatricula" => $codigo_matricula,
                        "codigocurso" => $codigo_curso,
                        "codigoestudiante" => $codigo_estudiante,
                        "codigogrupo" => $codigo_grupo,
                    ];
                    $matriculas_controlador = new MatriculasController;
                    $neo=$matriculas_controlador->guardar($conexion, $matricula_nuevo);
                
                    if (!empty($neo)) {
                        $type = "container success";
                        $message = "Excel importado correctamente";
                    } else {
                        $type = "container error";
                        $message = "Hubo un problema al importar registros";
                    }
                }
              }
            }
        
        }
    }
    else
    { 
            $type = "container error";
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
    <div class="container-fluid">
        <h2 class="mt-1">Importar matriculas de archivo excel</h2>
        <hr>
        <div class="row">
            <div class="col-12 col-md-12">
            <div class="outer-container">
                <form action="" method="post"
                    name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                    <div class="container" style="overflow:auto">
                        <label>Suba su archivo aqui &nbsp;</label> <input type="file" name="file" id="file" accept=".xls,.xlsx">&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;<button type="submit" id="submit" name="import" class="btn-info">Importar Registros</button><br><br>
                    </div>
                    <br>  
                    <div class="container-fluid" style="text-align: center">
                        <button class="btn btn-primary"><a href="../matriculas/index.php" style="color: inherit">Volver</a></button>
                    </div>
                    </div>
                </form>
            </div>
            <div id="response" style="text-align: center" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
        </div>       
    </div>
    <?php include '../foot.html' ?>
</body>
</html>