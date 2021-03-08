<?php
    require '../../modelos/GruposModel.php';

    class GruposController{
        private $tabla = "grupos";

        public function getAllGrupos($conexion){
            $sql_grupos = "SELECT * FROM grupos ORDER BY nombre";

            return ConexionController::consultar($conexion, $sql_grupos);
        }

        public function guardar($conexion, $datos){
            $grupos_mdl = new GruposModel(null,$datos['codigogrupo'],['nombre'],['numeroalumnos'],['maximoalumnos'],['codigodocente'],['codigocurso']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getGrupo($conexion, $codigogrupo){
            $sql_grupos = "SELECT * FROM grupos WHERE codigogrupo=$codigogrupo";
            $grupos_mdl = new GruposModel( ConexionController::consultar($conexion, $sql_grupos)->fetch_object() );
            return $grupos_mdl;
        }

        public function actualizar($conexion, $codigogrupo, $datos){
            $grupos_mdl = new GruposModel(null,$datos['codigogrupo'],['nombre'],['numeroalumnos'],['maximoalumnos'],['codigodocente'],['codigocurso']);
            return ConexionController::actualizarGrupo($conexion, $this->tabla, $codigogrupo, $datos);
        }

        public function eliminar($conexion, $codigogrupo){
            return ConexionController::eliminarGrupo($conexion, $this->tabla, $codigogrupo);
        }

        public function getAllGruposCursoId($conexion, $codigo_curso){
            $sql_grupos = "SELECT G.codigogrupo, G.nombre, G.numeroalumnos, G.maximoalumnos, D.nombre nombre_docente, G.codigocurso
                            FROM grupos G
                            INNER JOIN docentes D ON G.codigodocente = D.codigodocente
                            INNER JOIN cursos C ON G.codigocurso = C.codigocurso
                            WHERE G.codigocurso = '$codigo_curso'
                            ORDER BY G.nombre";

            return ConexionController::consultar($conexion, $sql_grupos);
        }
/*
        public function getAllgruposComplete($conexion, $term){
            $sql_grupos = "SELECT u.id id, u.nombre nombre, p.perfil_id perfilid, p.nombre_perfil nombreperfil, u.area_unidad_id area_id, u.email, u.estado_email, au.denominacion denominacion
                            FROM grupos u
                            INNER JOIN area_unidad au ON u.area_unidad_id = au.id
                            INNER JOIN perfil p ON u.perfil_id = p.perfil_id
                            WHERE u.nombre like '%" .$term. "%'
                            ORDER BY id";
            return ConexionController::consultar($conexion, $sql_grupos);
        }

        public function getgruposPerfil($conexion, $perfil){
            $sql_grupos = "SELECT U.nombre nombre, P.perfil_id perfil_id, P.nombre_perfil FROM grupos U
                            INNER JOIN perfil P ON U.perfil_id = P.perfil_id
                            WHERE P.nombre_perfil = '$perfil'
                            ORDER BY nombre";
            return ConexionController::consultar($conexion, $sql_grupos);
        }

        public function getgruposLogin($conexion, $usuario, $password){
            $sql_grupos = "SELECT * FROM grupos WHERE usuario = '$usuario' and password = '$password'";
            $grupos_mdl = new GruposModel( ConexionController::consultar($conexion, $sql_grupos)->fetch_object() );
            return $grupos_mdl;
        }*/
    }
?>