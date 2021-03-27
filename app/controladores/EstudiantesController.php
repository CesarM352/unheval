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
        public function getAllEstudiantesDNI($conexion, $dni){
            $sql_estudiantes = "SELECT * FROM estudiantes WHERE dni='$dni'";
            return ConexionController::consultar($conexion, $sql_estudiantes);
        }

        public function calcularNuevoCodigo($conexion){
            $sql_documento = "SELECT IFNULL(MAX(CAST( codigoestudiante AS INT )),0)+1 AS codigo_siguiente FROM $this->tabla";
            $fila = ConexionController::consultar($conexion, $sql_documento)->fetch_object();
            return $fila->codigo_siguiente;
        }
    }
?>