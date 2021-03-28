<?php
    require '../../modelos/GruposModel.php';

    class GruposController{
        private $tabla = "grupos";

        public function getAllGrupos($conexion){
            $sql_grupos = "SELECT G.*,
                            D.nombre nombre_docente,
                            C.nombre nombre_curso
                            FROM grupos G
                            INNER JOIN docentes D ON G.codigodocente = D.codigodocente
                            INNER JOIN cursos C ON G.codigocurso = C.codigocurso
                            ORDER BY nombre";

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

        public function getAllGruposCursoIdComplete($conexion, $codigo_curso, $nombre){
            $sql_grupos = "SELECT G.codigogrupo, G.nombre, G.numeroalumnos, G.maximoalumnos, D.nombre nombre_docente, G.codigocurso
                            FROM grupos G
                            INNER JOIN docentes D ON G.codigodocente = D.codigodocente
                            INNER JOIN cursos C ON G.codigocurso = C.codigocurso
                            WHERE G.codigocurso = '$codigo_curso' and G.nombre like '$nombre'
                            ORDER BY G.nombre";

            return ConexionController::consultar($conexion, $sql_grupos);
        }

        public function calcularNuevoCodigo($conexion){
            $sql_documento = "SELECT IFNULL(MAX(CAST( codigogrupo AS INT )),0)+1 AS codigo_siguiente FROM $this->tabla";
            $fila = ConexionController::consultar($conexion, $sql_documento)->fetch_object();
            return $fila->codigo_siguiente;
        }
    }
?>