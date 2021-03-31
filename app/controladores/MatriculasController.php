<?php
    require '../../modelos/MatriculasModel.php';

    class matriculasController{
        private $tabla = "matriculas";

        public function getAllMatriculas($conexion){
            $sql_matriculas = "SELECT M.*, E.nombre estudiante_nombre, C.nombre curso_nombre
                                FROM matriculas M
                                INNER JOIN estudiantes E ON M.codigoestudiante = E.codigoestudiante
                                INNER JOIN cursos C ON M.codigocurso = C.codigocurso
                                ORDER BY estudiante_nombre";

            return ConexionController::consultar($conexion, $sql_matriculas);
        }

        public function guardar($conexion, $datos){
            //$matriculas_mdl = new MatriculasModel(null,$datos['codigomatricula'],['nombre'],['numeroalumnos'],['maximoalumnos'],['codigodocente'],['codigocurso']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getMatricula($conexion, $codigomatricula){
            $sql_matriculas = "SELECT * FROM matriculas WHERE codigomatricula=$codigomatricula";
            $matriculas_mdl = new MatriculasModel( ConexionController::consultar($conexion, $sql_matriculas)->fetch_object() );
            return $matriculas_mdl;
        }

        public function getAllMatriculasComplete($conexion, $term){
            $sql_matriculas = "SELECT M.*, E.nombre estudiante_nombre, C.nombre curso_nombre
                                FROM matriculas M
                                INNER JOIN estudiantes E ON M.codigoestudiante = E.codigoestudiante
                                INNER JOIN cursos C ON M.codigocurso = C.codigocurso
                                WHERE M.codigomatricula like '%" .$term. "%' or E.nombre like '%" .$term. "%'
                                ORDER BY E.nombre";
            return ConexionController::consultar($conexion, $sql_matriculas);
        }

        /*public function getAllMatriculas($conexion){
            $sql_matriculas = "SELECT M.*, E.nombre estudiante_nombre, C.nombre curso_nombre, G.nombre grupo_nombre
                                FROM matriculas M
                                INNER JOIN estudiantes E ON M.codigoestudiante = E.codigoestudiante
                                INNER JOIN cursos C ON M.codigocurso = C.codigocurso
                                INNER JOIN grupos G ON M.codigogrupo = G.codigogrupo
                                ORDER BY estudiante_nombre";

            return ConexionController::consultar($conexion, $sql_matriculas);
        }*/
    }
?>