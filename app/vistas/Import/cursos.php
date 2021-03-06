<?php
require_once '../../Conexion.php';
require_once '../../controladores/CursosController.php';
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
                $codigocurso = "";
                if(isset($Row[0])) {
                    $codigocurso = $Row[0];
                }
                
                $nombre = "";
                if(isset($Row[1])) {
                    $nombre = $Row[1];
                }
				
                $descripcion = "";
                if(isset($Row[2])) {
                    $descripcion = $Row[2];
                }
				
                $numerocredito = "";
                if(isset($Row[3])) {
                    $numerocredito = $Row[3];
                }

                $h_teoricas = "";
                if(isset($Row[4])) {
                    $h_teoricas = $Row[4];
                }

                $h_practicas = "";
                if(isset($Row[5])) {
                    $h_practicas = $Row[5];
                }

                $tipo = "";
                if(isset($Row[6])) {
                    $tipo = $Row[6];
                }
                
                if (!empty($codigocurso) || !empty($nombre) || !empty($descripcion) || !empty($numerocredito) || !empty($codigocarrera)|| !empty($h_teoricas)|| !empty($h_practicas)|| !empty($tipo)) {
                    $curso_nuevo = [
                        "codigocurso" => $codigocurso,
                        "nombre" => utf8_decode($nombre),
                        "descripcion" => utf8_decode($descripcion),
                        "numerocredito" => $numerocredito,
                        "codigocarrera" => $_POST['escuela'],
                        "h_teoricas" => $h_teoricas,
                        "h_practicas" => $h_practicas,
                        "tipo" => $tipo
                    ];
                    $curso_controlador = new CursosController;
                    $neo=$curso_controlador->guardar($conexion, $curso_nuevo);
                
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
        <h2 class="mt-1">Importar cursos de archivo excel</h2>
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
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Seleccione Escuela:</label>
                        <select class="form-control form-control-md col-sm-4" name="escuela">
                            <option value="000465">Ingenier??a de Sistemas e Inform??tica</option>
                            <option value="000568">Ingenier??a Industrial</option>
                        </select>
                    </div>
                    <br>  
                    <div class="container-fluid" style="text-align: center">
                        <button class="btn btn-primary"><a href="../Cursos/index.php" style="color: inherit">Volver</a></button>
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