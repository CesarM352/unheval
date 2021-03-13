<?php
    require '../../modelos/DireccionesModel.php';

    class DireccionesController{
        private $tabla = "direcciones";

        public function getAllDirecciones($conexion){
            $sql_direcciones = "SELECT D.codigodireccion, D.codigovia, D.nropuerta, TV.nombre
                                FROM direcciones D
                                INNER JOIN tipovias TV ON D.codigovia = TV.codigovia
                                ORDER BY D.codigodireccion";

            return ConexionController::consultar($conexion, $sql_direcciones);
        }

        public function guardar($conexion, $datos){
            $direcciones_mdl = new DireccionesModel(null,$datos['codigodireccion'],['codigovia'],['nropuerta']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getDirecciones($conexion, $codigodireccion){
            $sql_direcciones = "SELECT * FROM direcciones WHERE codigodireccion=$codigodireccion";
            $direcciones_mdl = new DireccionesModel( ConexionController::consultar($conexion, $sql_direcciones)->fetch_object() );
            return $direcciones_mdl;
        }

/*        public function actualizar($conexion, $codigodireccion, $datos){
            $direcciones_mdl = new DireccionesModel(null,$datos['codigodireccion'],['codigovia'],['nropuerta']);
            return ConexionController::actualizar($conexion, $this->tabla, $codigodireccion, $datos);
        }

        public function eliminar($conexion, $codigodireccion){
            return ConexionController::eliminarDireccion($conexion, $this->tabla, $codigodireccion);
        }
*/
/*        public function getAlldireccionesComplete($conexion, $term){
            $sql_direcciones = "SELECT U.codigoDireccion, U.codigovia, U.descripcion, U.numerocredito, U.Direcciondireccion, C.codigovia codigovia_direccion
                                FROM direcciones U
                                INNER JOIN direcciones C ON u.codigodireccion = C.codigodireccion
                                WHERE U.codigovia like '%" .$term. "%'
                                ORDER BY C.codigovia, U.codigovia";
            return ConexionController::consultar($conexion, $sql_direcciones);
        }

        public function getDireccionsPerfil($conexion, $perfil){
            $sql_Direccions = "SELECT U.codigovia codigovia, P.perfil_id perfil_id, P.codigovia_perfil FROM Direccions U
                            INNER JOIN perfil P ON U.perfil_id = P.perfil_id
                            WHERE P.codigovia_perfil = '$perfil'
                            ORDER BY codigovia";
            return ConexionController::consultar($conexion, $sql_Direccions);
        }

        public function getDireccionsLogin($conexion, $usuario, $password){
            $sql_Direccions = "SELECT * FROM Direccions WHERE usuario = '$usuario' and password = '$password'";
            $Direccions_mdl = new DireccionsModel( ConexionController::consultar($conexion, $sql_Direccions)->fetch_object() );
            return $Direccions_mdl;
        }*/
    }
?>