<?php
    require '../../modelos/CarrerasModel.php';

    class CarrerasController{
        private $tabla = "carreras";

        public function getAllCarreras($conexion){
            $sql_carreras = "SELECT C.codigocarrera, C.nombre, C.codigofacultad, F.nombre nombre_facultad
                            FROM carreras C
                            INNER JOIN facultades F ON C.codigofacultad = F.codigofacultad
                            ORDER BY C.nombre";

            return ConexionController::consultar($conexion, $sql_carreras);
        }

        public function guardar($conexion, $datos){
            $carreras_mdl = new CarrerasModel(null,$datos['codigocarrera'],['nombre'],['codigofacultad']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getCurso($conexion, $codigocarrera){
            $sql_carreras = "SELECT * FROM carreras WHERE codigocarrera=$codigocarrera";
            $carreras_mdl = new CarrerasModel( ConexionController::consultar($conexion, $sql_carreras)->fetch_object() );
            return $carreras_mdl;
        }

/*        public function actualizar($conexion, $codigocarrera, $datos){
            $carreras_mdl = new CarrerasModel(null,$datos['codigocarrera'],['nombre'],['codigofacultad']);
            return ConexionController::actualizar($conexion, $this->tabla, $codigocarrera, $datos);
        }

        public function eliminar($conexion, $codigocarrera){
            return ConexionController::eliminarCurso($conexion, $this->tabla, $codigocarrera);
        }
*/
/*        public function getAllcarrerasComplete($conexion, $term){
            $sql_carreras = "SELECT U.codigocurso, U.nombre, U.descripcion, U.numerocredito, U.cursocarrera, C.nombre nombre_carrera
                            FROM carreras U
                            INNER JOIN carreras C ON u.codigocarrera = C.codigocarrera
                            WHERE U.nombre like '%" .$term. "%'
                            ORDER BY C.nombre, U.nombre";
            return ConexionController::consultar($conexion, $sql_carreras);
        }

        public function getcursosPerfil($conexion, $perfil){
            $sql_cursos = "SELECT U.nombre nombre, P.perfil_id perfil_id, P.nombre_perfil FROM cursos U
                            INNER JOIN perfil P ON U.perfil_id = P.perfil_id
                            WHERE P.nombre_perfil = '$perfil'
                            ORDER BY nombre";
            return ConexionController::consultar($conexion, $sql_cursos);
        }

        public function getcursosLogin($conexion, $usuario, $password){
            $sql_cursos = "SELECT * FROM cursos WHERE usuario = '$usuario' and password = '$password'";
            $cursos_mdl = new CursosModel( ConexionController::consultar($conexion, $sql_cursos)->fetch_object() );
            return $cursos_mdl;
        }*/
    }
?>