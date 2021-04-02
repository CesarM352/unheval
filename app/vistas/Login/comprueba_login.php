<?php
try{
    require_once '../../Conexion.php';
    require_once '../../controladores/UsuariosController.php';
    require_once '../../controladores/LabMantenimientoController.php';

    $usuario=htmlentities(addslashes($_POST["usuario"]));
    $password=htmlentities(addslashes($_POST["password"]));

    if($usuario==''){
        header("location:login.php");
    }else{
        $usuarios_controlador = new UsuariosController;
        $usuarios = $usuarios_controlador->getUsuariosLogin($conexion, $usuario);
        //echo$usuarios->getPass();
        //var_dump($usuarios);
        //if($usuarios->getUser()!=''){
        if(!is_null($usuarios->getPass())){
        if(hash_equals($usuarios->getPass(),crypt($password,'$2a$07$usesomesillystringforsalt$'))){
            session_start();
            $_SESSION["codigo"]=$usuarios->getcodigo();
            $_SESSION["nombre"]=utf8_encode($usuarios->getNombre());
            $_SESSION["usuario"]=$usuarios->getUser();
            $_SESSION["perfil_id"]=$usuarios->getPerfil_id();

                //cargar la Cargar la variable $_SESSION con el número de mantenimientos pendientes
                $mantenimiento_controlador = new LabMantenimientoController;

                $_SESSION["mant_pendientes"] = $mantenimiento_controlador->calcularCantidadPendientes($conexion);

                header("location:../../../public/");
            }else{
                header("location:login.php");
            }
        }else{
            header("location:login.php");
        }
    }else{
        header("location:login.php");
    }
    }
    
}catch(Exception $e){
    //die("Error:".$e->getMessage());
}
?>