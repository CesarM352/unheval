<?php
require_once '../../Conexion.php';
require_once '../../controladores/LabEquipoController.php';
require_once '../../controladores/LabTipoEquipoController.php';
require_once '../../controladores/LabAmbienteController.php';
require_once '../../controladores/LabLaboratorioEquipoController.php';
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

        //obtener la fecha de caducidad
        $anios_vencimiento = 0;
        $tipo_equipo_controlador = new LabTipoEquipoController;
        if( isset($_POST["codtipoequipo"]) ){
            $anios_vencimiento = $tipo_equipo_controlador->getTipoEquipo($conexion, $_POST["codtipoequipo"])->getTiempoObsolecencia();
        }
        
        $sheetCount = count($Reader->sheets());
        for($i=0;$i<$sheetCount;$i++)
        {
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $key => $Row)
            {
              if($key>0){

                $datos_columna = [
                    "codigopatrimonio" => "",
                    "nombre" => "",
                    "codtipoequipo" => "",
                    "codigooficina" => "",
                    "descripcion" => "",
                    "ram" => "",
                    "procesador" => "",
                    "hdd" => "",
                    "ssd" => "",
                    "fechaingreso" => "",
                    "tarjetavideo" => "",
                    "rfid" => "",
                    "color" => "",
                    "modelo" => "",
                    "serie" => "",
                    "resolucion" => "",
                    "conectividad" => "",
                    "tipoestabilizador" => "",
                    "nombreusuarioresponsable" => "",
                ];

                $cont = 0;
                foreach ($datos_columna as $columna_nombre => $dato) {
                    if(isset($Row[$cont])) {
                        $datos_columna[$columna_nombre] = $Row[$cont++];
                    }
                }

                //excepciones
                if( $datos_columna["fechaingreso"] == "" ){
                    $datos_columna["fechaingreso"] = date("Y-m-d");
                }
                $tipo_equipo = ( isset($_POST["codtipoequipo"]) ) ? $_POST["codtipoequipo"] : $datos_columna["codtipoequipo"] ;
                $codigo_oficina = ( isset($_POST["codigooficina"]) ) ? $_POST["codigooficina"] : $datos_columna["codigooficina"] ;
                //fin excepciones

                if( $anios_vencimiento == 0 ){
                    $anios_vencimiento = $tipo_equipo_controlador->getTipoEquipo($conexion, $datos_columna["codtipoequipo"])->tiempoobsolecencia;
                }
                $fecha_ini = date_create($datos_columna["fechaingreso"]);
                date_add($fecha_ini, date_interval_create_from_date_string( $anios_vencimiento.' years'));
                
                if ( !empty($datos_columna["codigopatrimonio"]) || !empty($tipo_equipo) || !empty($codigo_oficina) || !empty($datos_columna["fechaingreso"]) ) {
                    $equipo_nuevo = [
                        "codigopatrimonio" => $datos_columna["codigopatrimonio"],
                        "descripcion" => $datos_columna["descripcion"],
                        "ram" => $datos_columna["ram"],
                        "procesador" => $datos_columna["procesador"],
                        "hdd" => $datos_columna["hdd"],
                        "ssd" => $datos_columna["ssd"],
                        "fechaingreso" => $datos_columna["fechaingreso"],
                        "tarjetavideo" => $datos_columna["tarjetavideo"],
                        "rfid" => $datos_columna["rfid"],
                        "estadoperativo" => 1,
                        "fechacaduca" => $fecha_ini->format('Y-m-d H:i:s.u'),
                        "codtipoingreso" => 1,
                        "codtipoequipo" => $tipo_equipo,
                        "codigoestado" => 1,
                        "color" => $datos_columna["color"],
                        "modelo" => $datos_columna["modelo"],
                        "serie" => $datos_columna["serie"],
                        "resolucion" => $datos_columna["resolucion"],
                        "conectividad" => $datos_columna["conectividad"],
                        "tipoestabilizador" => $datos_columna["tipoestabilizador"],
                    ];
                    $equipo_controlador = new LabEquipoController;
                    $neo=$equipo_controlador->guardar($conexion, $equipo_nuevo);

                    $laboratorio_equipo_controlador = new LabLaboratorioEquipoController;
                    $laboratorio_equipo_nuevo = [
                        "codigolaboratorioequipo" => $laboratorio_equipo_controlador->calcularNuevoCodigo($conexion),
                        "codigooficina" => $codigo_oficina,
                        "fechaingreso" => $datos_columna["fechaingreso"],
                        "estadopresente" => 1,
                        "codigopatrimonio" => $datos_columna["codigopatrimonio"],
                    ];
                    $laboratorio_equipo_controlador->guardar($conexion, $laboratorio_equipo_nuevo);
                
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
<?php
    $tipos_equipos = (new LabTipoEquipoController)->getAllTiposEquipos($conexion);
    $oficinas = (new LabAmbienteController)->getAllAmbientes($conexion);
?>
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
                        <label for="staticEmail" class="col-sm-3 col-form-label">Seleccione Tipo de equipo:</label>
                        <select class="form-control form-control-md col-sm-4" name="codtipoequipo">
                            <option value="">Seleccione</option>
                            <?php
                                foreach ($tipos_equipos as $key => $tipo_equipo) {
                            ?>
                            <option value="<?php echo $tipo_equipo["codtipoequipo"] ?>"><?php echo $tipo_equipo["nombre"] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Seleccione Oficina:</label>
                        <select class="form-control form-control-md col-sm-4" name="codigooficina" required>
                            <option value="">Seleccione</option>
                            <?php
                                foreach ($oficinas as $key => $oficina) {
                            ?>
                            <option value="<?php echo $oficina["codigooficina"] ?>"><?php echo $oficina["nombre"] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <br>  
                    <div class="container-fluid" style="text-align: center">
                        <button class="btn btn-primary"><a href="../LabTecnico/ver_equipo_index.php" style="color: inherit">Volver</a></button>
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