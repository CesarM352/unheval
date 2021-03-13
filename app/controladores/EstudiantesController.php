<?php
    require '../../modelos/EstudiantesModel.php';

    class EstudiantesController{
        private $tabla = "estudiantes";

        public function getAllEstudiantes($conexion){
            $sql_estudiantes = "SELECT * FROM $this->tabla ORDER BY nombre";

            return ConexionController::consultar($conexion, $sql_estudiantes);
        }

        public function guardar($conexion, $datos){
            $estudiantes_mdl = new EstudiantesModel(null,$datos['codigoestudiante'],['nombre'],['user'],['pass'],['anionacimiento'],['fechaingreso'],['dni'],['celular'],['email']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getEstudiante($conexion, $codigoestudiante){
            $sql_estudiantes = "SELECT * FROM estudiantes WHERE codigoestudiante=$codigoestudiante";
            $estudiantes_mdl = new EstudiantesModel( ConexionController::consultar($conexion, $sql_estudiantes)->fetch_object() );
            return $estudiantes_mdl;
        }

        public function actualizar($conexion, $codigoestudiante, $datos){
            $estudiantes_mdl = new EstudiantesModel(null,$datos['codigoestudiante'],['nombre'],['user'],['pass'],['anionacimiento'],['fechaingreso'],['dni'],['celular'],['email']);
            return ConexionController::actualizarEstudiantes($conexion, $this->tabla, $codigoestudiante, $datos);
        }

        public function eliminar($conexion, $codigoestudiante){
            return ConexionController::eliminarEstudiantes($conexion, $this->tabla, $codigoestudiante);
        }

        public function getAllEstudiantesComplete($conexion, $term){
            $sql_estudiantes = "SELECT * FROM $this->tabla
                                WHERE nombre like '%" .$term. "%' or codigoestudiante like '%" .$term. "%'
                                ORDER BY nombre";
            return ConexionController::consultar($conexion, $sql_estudiantes);
        }
/*
        public function getestudiantesPerfil($conexion, $perfil){
            $sql_estudiantes = "SELECT U.nombre nombre, P.perfil_id perfil_id, P.nombre_perfil FROM cursos U
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