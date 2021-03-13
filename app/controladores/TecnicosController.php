<?php
    require '../../modelos/TecnicosModel.php';

    class TecnicosController{
        private $tabla = "tecnicos";

        public function getAllTecnicos($conexion){
            $sql_tecnicos = "SELECT * FROM $this->tabla ORDER BY nombre";

            return ConexionController::consultar($conexion, $sql_tecnicos);
        }

        public function guardar($conexion, $datos){
            $tecnicos_mdl = new TecnicosModel(null,$datos['numerocontrato'],['nombre'],['user'],['pass'],['anionacimiento'],['celular'],['fechainicio'],['dni'],['fechacaduca']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getTecnico($conexion, $numerocontrato){
            $sql_tecnicos = "SELECT * FROM tecnicos WHERE numerocontrato=$numerocontrato";
            $tecnicos_mdl = new TecnicosModel( ConexionController::consultar($conexion, $sql_tecnicos)->fetch_object() );
            return $tecnicos_mdl;
        }

        public function actualizar($conexion, $numerocontrato, $datos){
            $tecnicos_mdl = new TecnicosModel(null,$datos['numerocontrato'],['nombre'],['user'],['pass'],['anionacimiento'],['celular'],['fechainicio'],['dni'],['fechacaduca']);
            return ConexionController::actualizarTecnicos($conexion, $this->tabla, $numerocontrato, $datos);
        }

        public function eliminar($conexion, $numerocontrato){
            return ConexionController::eliminarTecnicos($conexion, $this->tabla, $numerocontrato);
        }

        public function getAllTecnicosComplete($conexion, $term){
            $sql_tecnicos = "SELECT * FROM $this->tabla
                             WHERE nombre like '%" .$term. "%' or numerocontrato like '%" .$term. "%'
                             ORDER BY nombre";
            return ConexionController::consultar($conexion, $sql_tecnicos);
        }
/*
        public function gettecnicosPerfil($conexion, $perfil){
            $sql_tecnicos = "SELECT U.nombre nombre, P.perfil_id perfil_id, P.nombre_perfil FROM cursos U
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