<?php
    require '../../modelos/TipoContratoDocModel.php';

    class tipocontratodocController{
        private $tabla = "tipocontratodoc";

        public function getAllTipoContratoDoc($conexion){
            $sql_tipocontratodoc = "SELECT * from $this->tabla ORDER BY codtipocontrato";

            return ConexionController::consultar($conexion, $sql_tipocontratodoc);
        }

        public function guardar($conexion, $datos){
            $tipocontratodoc_mdl = new TipoContratoDocModel(null,$datos['codtipocontrato'],['nombre']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getTipoContratoDoc($conexion, $codtipocontrato){
            $sql_tipocontratodoc = "SELECT * FROM tipocontratodoc WHERE codtipocontrato=$codtipocontrato";
            $tipocontratodoc_mdl = new TipoContratoDocModel( ConexionController::consultar($conexion, $sql_tipocontratodoc)->fetch_object() );
            return $tipocontratodoc_mdl;
        }

/*        public function actualizar($conexion, $codtipocontrato, $datos){
            $tipocontratodoc_mdl = new TipoContratoDocModel(null,$datos['codtipocontrato'],[''],['nombre']);
            return ConexionController::actualizar($conexion, $this->tabla, $codtipocontrato, $datos);
        }

        public function eliminar($conexion, $codtipocontrato){
            return ConexionController::eliminarDireccion($conexion, $this->tabla, $codtipocontrato);
        }
*/
/*        public function getAlltipocontratodocComplete($conexion, $term){
            $sql_tipocontratodoc = "SELECT U.codtipocontrato, U., U.descripcion, U.numerocredito, U.Direcciondireccion, C. _direccion
                                FROM tipocontratodoc U
                                INNER JOIN tipocontratodoc C ON u.codtipocontrato = C.codtipocontrato
                                WHERE U. like '%" .$term. "%'
                                ORDER BY C., U.";
            return ConexionController::consultar($conexion, $sql_tipocontratodoc);
        }

        public function getDireccionsPerfil($conexion, $perfil){
            $sql_Direccions = "SELECT U. , P.perfil_id perfil_id, P._perfil FROM Direccions U
                            INNER JOIN perfil P ON U.perfil_id = P.perfil_id
                            WHERE P._perfil = '$perfil'
                            ORDER BY ";
            return ConexionController::consultar($conexion, $sql_Direccions);
        }

        public function getDireccionsLogin($conexion, $usuario, $password){
            $sql_Direccions = "SELECT * FROM Direccions WHERE usuario = '$usuario' and password = '$password'";
            $Direccions_mdl = new DireccionsModel( ConexionController::consultar($conexion, $sql_Direccions)->fetch_object() );
            return $Direccions_mdl;
        }*/
    }
?>