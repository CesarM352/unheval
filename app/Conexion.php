<?php
    require_once 'controladores/ConexionController.php';

    $conexion = ConexionController::crearConexion('localhost','laboratoriosbd','root','','mysql');