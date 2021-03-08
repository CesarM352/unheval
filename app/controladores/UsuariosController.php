<?php
    require '../../modelos/UsuariosModel.php';

    class UsuariosController{
        private $tabla = "usuarios";

        public function getAllUsuarios($conexion){
            $sql_usuarios = "SELECT * FROM usuarios ORDER BY id";

            return ConexionController::consultar($conexion, $sql_usuarios);
        }
/*
        public function guardar($conexion, $datos){
            $usuario_mdl = new UsuariosModel(null,$datos['usuario'],['password'],['nombre'],['perfil_id'],['area_unidad_id'],['email'],['estado_email']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getUsuario($conexion, $id){
            $sql_usuario = "SELECT * FROM usuarios WHERE id=$id";
            $usuario_mdl = new UsuariosModel( ConexionController::consultar($conexion, $sql_usuario)->fetch_object() );
            return $usuario_mdl;
        }

        public function actualizar($conexion, $id, $datos){
            $usuario_mdl = new UsuariosModel(null,$datos['usuario'],['password'],['nombre'],['perfil_id'],['area_unidad_id'],['email'],['estado_email']);
            return ConexionController::actualizar($conexion, $this->tabla, $id, $datos);
        }

        public function eliminar($conexion, $id){
            return ConexionController::eliminar($conexion, $this->tabla, $id);
        }

        public function getAllUsuariosComplete($conexion, $term){
            $sql_usuario = "SELECT u.id id, u.nombre nombre, p.perfil_id perfilid, p.nombre_perfil nombreperfil, u.area_unidad_id area_id, u.email, u.estado_email, au.denominacion denominacion
                            FROM usuarios u
                            INNER JOIN area_unidad au ON u.area_unidad_id = au.id
                            INNER JOIN perfil p ON u.perfil_id = p.perfil_id
                            WHERE u.nombre like '%" .$term. "%'
                            ORDER BY id";
            return ConexionController::consultar($conexion, $sql_usuario);
        }

        public function getUsuariosPerfil($conexion, $perfil){
            $sql_usuario = "SELECT U.nombre nombre, P.perfil_id perfil_id, P.nombre_perfil FROM usuarios U
                            INNER JOIN perfil P ON U.perfil_id = P.perfil_id
                            WHERE P.nombre_perfil = '$perfil'
                            ORDER BY nombre";
            return ConexionController::consultar($conexion, $sql_usuario);
        }
*/
        public function getUsuariosLogin($conexion, $usuario, $password){
            $sql_usuarios = "SELECT * FROM usuarios WHERE user = '$usuario' and pass = '$password'";
            $usuarios_mdl = new UsuariosModel( ConexionController::consultar($conexion, $sql_usuarios)->fetch_object() );
            return $usuarios_mdl;
        }
    }