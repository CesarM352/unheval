<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabEquipoController.php';

    $codigopatrimonio = $_GET["id"];
    $equipo_actualizar = [
        "nombre" => utf8_decode($_POST["nombre"]),
        "descripcion" => utf8_decode($_POST["descripcion"]),
        "ram" => utf8_decode($_POST["ram"]),
        "procesador" => utf8_decode($_POST["procesador"]),
        "hdd" => utf8_decode($_POST["hdd"]),
        "ssd" => utf8_decode($_POST["ssd"]),
        "tarjetavideo" => utf8_decode($_POST["tarjetavideo"]),
        "resolucion" => utf8_decode($_POST["resolucion"]),
        "conectividad" => utf8_decode($_POST["conectividad"]),
        "tipoestabilizador" => utf8_decode($_POST["tipoestabilizador"]),
        "fechaingreso" => utf8_decode($_POST["fechaingreso"]),
        "rfid" => utf8_decode($_POST["rfid"]),
        "estadoperativo" => utf8_decode($_POST["estadoperativo"]),
        "fechacaduca" => utf8_decode($_POST["fechacaduca"]),
        "codtipoingreso" => utf8_decode($_POST["codtipoingreso"]),
        "codigoestado" => utf8_decode($_POST["codigoestado"]),
        "color" => utf8_decode($_POST["color"]),
        "modelo" => utf8_decode($_POST["modelo"]),
        "serie" => utf8_decode($_POST["serie"]),
    ];
    $equipo_controlador = new LabEquipoController;
    $equipo_controlador->actualizar($conexion, $codigopatrimonio, $equipo_actualizar);

    header("Location: ../LabTecnico/ver_inventario.php?ambiente_id=".$_GET['ambiente_id']);
?>