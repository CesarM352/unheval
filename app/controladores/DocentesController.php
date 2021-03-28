<?php
    require '../../modelos/DocentesModel.php';

    class DocentesController{
        private $tabla = "docentes";

        public function getAllDocentes($conexion){
            $sql_docentes = "SELECT D.codigodocente, D.celular, D.dni, D.direccion, D.nombre, T.nombre nombrecontrato, D.user, D.pass
                            FROM docentes D
                            INNER JOIN tipocontratodoc T ON D.codtipocontrato = T.codtipocontrato
                            ORDER BY D.nombre";

            return ConexionController::consultar($conexion, $sql_docentes);
        }

        public function guardar($conexion, $datos){
            $docentes_mdl = new DocentesModel(null,$datos['codigodocente'],['celular'],['dni'],['direccion'],['nombre'],['codtipocontrato'],['user'],['pass']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getDocente($conexion, $codigodocente){
            $sql_docentes = "SELECT * FROM docentes WHERE codigodocente=$codigodocente";
            $docentes_mdl = new DocentesModel( ConexionController::consultar($conexion, $sql_docentes)->fetch_object() );
            return $docentes_mdl;
        }

        public function actualizar($conexion, $codigodocente, $datos){
            $docentes_mdl = new DocentesModel(null,$datos['codigodocente'],['celular'],['dni'],['direccion'],['nombre'],['codtipocontrato'],['user'],['pass']);
            return ConexionController::actualizarDocentes($conexion, $this->tabla, $codigodocente, $datos);
        }

        public function eliminar($conexion, $codigodocente){
            return ConexionController::eliminarDocentes($conexion, $this->tabla, $codigodocente);
        }

        public function getAllDocentesComplete($conexion, $term){
            $sql_docentes = "SELECT D.codigodocente, D.celular, D.dni, D.direccion, D.nombre, T.nombre nombrecontrato, D.user, D.pass
                            FROM docentes D
                            INNER JOIN tipocontratodoc T ON D.codtipocontrato = T.codtipocontrato
                            WHERE D.nombre like '%" .$term. "%' or D.codigodocente like '%" .$term. "%'
                            ORDER BY D.nombre";
            return ConexionController::consultar($conexion, $sql_docentes);
        }

        public function getAllDocentesDNI($conexion, $dni){
            $sql_docentes = "SELECT * FROM docentes WHERE dni='$dni'";
            return ConexionController::consultar($conexion, $sql_docentes);
        }

        public function calcularNuevoCodigo($conexion){
            $sql_documento = "SELECT IFNULL(MAX(CAST( codigodocente AS INT )),0)+1 AS codigo_siguiente FROM $this->tabla";
            $fila = ConexionController::consultar($conexion, $sql_documento)->fetch_object();
            return $fila->codigo_siguiente;
        }
    }
?>