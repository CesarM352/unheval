<?php
    require '../../modelos/DocentesModel.php';

    class DocentesController{
        private $tabla = "docentes";

        public function getAllDocentes($conexion){
            $sql_docentes = "SELECT D.codigodocente, D.celular, D.dni, DI.nropuerta direccion, D.nombre, T.nombre nombrecontrato, D.user, D.pass
                            FROM docentes D
                            INNER JOIN tipocontratodoc T ON D.codtipocontrato = T.codtipocontrato
                            INNER JOIN direcciones DI ON D.codigodireccion = DI.codigodireccion
                            ORDER BY D.codigodocente";

            return ConexionController::consultar($conexion, $sql_docentes);
        }

        public function guardar($conexion, $datos){
            $docentes_mdl = new DocentesModel(null,$datos['codigodocente'],['celular'],['dni'],['codigodireccion'],['nombre'],['codtipocontrato'],['user'],['pass']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getDocente($conexion, $codigodocente){
            $sql_docentes = "SELECT * FROM docentes WHERE codigodocente=$codigodocente";
            $docentes_mdl = new DocentesModel( ConexionController::consultar($conexion, $sql_docentes)->fetch_object() );
            return $docentes_mdl;
        }

        public function actualizar($conexion, $codigodocente, $datos){
            $docentes_mdl = new DocentesModel(null,$datos['codigodocente'],['celular'],['dni'],['codigodireccion'],['nombre'],['codtipocontrato'],['user'],['pass']);
            return ConexionController::actualizarDocentes($conexion, $this->tabla, $codigodocente, $datos);
        }

        public function eliminar($conexion, $codigodocente){
            return ConexionController::eliminarDocentes($conexion, $this->tabla, $codigodocente);
        }

        public function getAllDocentesComplete($conexion, $term){
            $sql_docentes = "SELECT D.codigodocente, D.celular, D.dni, DI.nropuerta direccion, D.nombre, T.nombre nombrecontrato, D.user, D.pass
                            FROM docentes D
                            INNER JOIN tipocontratodoc T ON D.codtipocontrato = T.codtipocontrato
                            INNER JOIN direcciones DI ON D.codigodireccion = DI.codigodireccion
                            WHERE D.nombre like '%" .$term. "%' or D.codigodocente like '%" .$term. "%'
                            ORDER BY D.nombre";
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