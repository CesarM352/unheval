<?php
    require_once 'controladores/ConexionController.php';

    $conexion = ConexionController::crearConexion('localhost','laboratoriosbd1','root','','mysql');

    $mysqli = new mysqli("localhost", "root", "", "laboratoriosbd2");