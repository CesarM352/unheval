<?php
try{
    require_once '../../Conexion.php';
    require_once '../../controladores/UsuariosController.php';
    require_once '../../controladores/LabMantenimientoController.php';

    $usuario=htmlentities(addslashes($_POST["usuario"]));
    $password=htmlentities(addslashes($_POST["password"]));

    $usuarios_controlador = new UsuariosController;
    $usuarios = $usuarios_controlador->getUsuariosLogin($conexion, $usuario, $password);

    if($usuarios->getUser()!=''){
        session_start();
        $_SESSION["codigo"]=$usuarios->getcodigo();
        $_SESSION["nombre"]=$usuarios->getNombre();
        $_SESSION["usuario"]=$usuarios->getUser();
        $_SESSION["perfil_id"]=$usuarios->getPerfil_id();

        
        //cargar la Cargar la variable $_SESSION con el número de mantenimientos pendientes
        $mantenimiento_controlador = new LabMantenimientoController;

        $_SESSION["mant_pendientes"] = $mantenimiento_controlador->calcularCantidadPendientes($conexion);



        // Cargar la variable $_SESSION con el nombre del area del usuario logueado 
        /*$term=$_SESSION["nombre"];

        $usuario_controlador = new UsuariosController;
        $usuario = $usuario_controlador->getAllUsuariosComplete($conexion, $term);

        foreach ($usuario as $key => $user) {
            $_SESSION["area"] = $user['denominacion'];
            $_SESSION["perfil"] = $user['nombreperfil'];
            $_SESSION["email"] = $user['email'];
            $_SESSION["estadoemail"] = $user['estado_email'];
        }*/

        header("location:../../../public/");
    }else{
        header("location:login.php");
    }

}catch(Exception $e){
    die("Error:".$e->getMessage());
}
?>