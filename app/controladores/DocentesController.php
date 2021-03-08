<?php
    require '../../modelos/DocentesModel.php';

    class DocentesController{
        private $tabla = "docentes";

        public function getAlldocentes($conexion){
            $sql_docentes = "SELECT D.codigodocente, D.celular, D.dni, D.codigodireccion, D.nombre, D.codtipocontrato, D.user, D.pass
                            FROM docentes D
                            INNER JOIN tipocontratodoc T ON D.codtipocontrato = T.codtipocontrato
                            ORDER BY D.nombre";

            return ConexionController::consultar($conexion, $sql_docentes);
        }

        public function guardar($conexion, $datos){
            $docentes_mdl = new docentesModel(null,$datos['codigodocente'],['celular'],['dni'],['codigodireccion'],['nombre'],['codtipocontrato'],['user'],['pass']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getCurso($conexion, $codigodocente){
            $sql_docentes = "SELECT * FROM docentes WHERE codigodocente=$codigodocente";
            $docentes_mdl = new docentesModel( ConexionController::consultar($conexion, $sql_docentes)->fetch_object() );
            return $docentes_mdl;
        }

        public function actualizar($conexion, $codigodocente, $datos){
            $docentes_mdl = new docentesModel(null,$datos['codigodocente'],['celular'],['dni'],['codigodireccion'],['nombre'],['codtipocontrato'],['user'],['pass']);
            return ConexionController::actualizarCurso($conexion, $this->tabla, $codigodocente, $datos);
        }

        public function eliminar($conexion, $codigodocente){
            return ConexionController::eliminarCurso($conexion, $this->tabla, $codigodocente);
        }

        public function getAlldocentesComplete($conexion, $term){
            $sql_docentes = "SELECT U.codigodocente, U.celular, U.dni, U.codigodireccion, U.nombre, C.nombre nombre_carrera
                            FROM docentes U
                            INNER JOIN carreras C ON u.codtipocontrato = C.codtipocontrato
                            WHERE U.nombre like '%" .$term. "%' or U.codigodocente like '%" .$term. "%'
                            ORDER BY C.nombre, U.nombre";
            return ConexionController::consultar($conexion, $sql_docentes);
        }
/*
        public function getdocentesPerfil($conexion, $perfil){
            $sql_docentes = "SELECT U.nombre nombre, P.perfil_id perfil_id, P.nombre_perfil FROM cursos U
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