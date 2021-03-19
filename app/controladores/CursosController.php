<?php
    require '../../modelos/CursosModel.php';

    class CursosController{
        private $tabla = "cursos";

        public function getAllCursos($conexion){
            $sql_cursos = "SELECT U.codigocurso, U.nombre, U.descripcion, U.numerocredito, C.nombre nombre_carrera, U.h_teoricas, U.h_practicas, U.tipo
                            FROM cursos U
                            INNER JOIN carreras C ON u.codigocarrera = C.codigocarrera
                            ORDER BY C.nombre, U.nombre";

            return ConexionController::consultar($conexion, $sql_cursos);
        }

        public function guardar($conexion, $datos){
            $cursos_mdl = new CursosModel(null,$datos['codigocurso'],['nombre'],['descripcion'],['numerocredito'],['codigocarrera']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getCurso($conexion, $codigocurso){
            $sql_cursos = "SELECT * FROM cursos WHERE codigocurso=$codigocurso";
            $cursos_mdl = new CursosModel( ConexionController::consultar($conexion, $sql_cursos)->fetch_object() );
            return $cursos_mdl;
        }

        public function actualizar($conexion, $codigocurso, $datos){
            $cursos_mdl = new CursosModel(null,$datos['codigocurso'],['nombre'],['descripcion'],['numerocredito'],['codigocarrera']);
            return ConexionController::actualizarCurso($conexion, $this->tabla, $codigocurso, $datos);
        }

        public function eliminar($conexion, $codigocurso){
            return ConexionController::eliminarCurso($conexion, $this->tabla, $codigocurso);
        }

        public function getAllcursosComplete($conexion, $term){
            $sql_cursos = "SELECT U.codigocurso, U.nombre, U.descripcion, U.numerocredito, C.nombre nombre_carrera, U.h_teoricas, U.h_practicas, U.tipo
                            FROM cursos U
                            INNER JOIN carreras C ON u.codigocarrera = C.codigocarrera
                            WHERE U.nombre like '%" .$term. "%' or U.codigocurso like '%" .$term. "%'
                            ORDER BY C.nombre, U.nombre";
            return ConexionController::consultar($conexion, $sql_cursos);
        }
    }
?>