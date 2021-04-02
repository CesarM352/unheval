<?php
    require_once 'controladores/ConexionController.php';

    $conexion = ConexionController::crearConexion('localhost','laboratoriosbd2','root','','mysql');

    $mysqli = new mysqli("localhost", "root", "", "laboratoriosbd2");