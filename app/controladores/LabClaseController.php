<?php
    require '../../modelos/LabClaseModel.php';

    class LabClaseController{
        private $tabla = "clases";

        public function getAllClases($conexion){
            $sql_documento = "SELECT t.*,  
                                    g.nombre AS grupo_nombre,
                                    cu.nombre AS curso_nombre
                                FROM $this->tabla AS t
                                INNER JOIN horarios h ON t.codigohorario = h.codigohorario
                                INNER JOIN grupos g ON h.codigogrupo = h.codigogrupo
                                INNER JOIN cursos cu ON g.codigocurso = cu.codigocurso";

            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function guardar($conexion, $datos){
            //$area_unidad_mdl = new TransaparenciaAvanceModel(null,$datos['denominacion']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getClase($conexion, $id){
            $sql_documento = "SELECT * FROM $this->tabla WHERE idclases=$id";
            $documento_mdl = new LabAsistenciaModel( ConexionController::consultar($conexion, $sql_documento)->fetch_object() );

            return $documento_mdl;
        }

        public function actualizar($conexion, $id, $datos){
            //$area_unidad_mdl = new AreaUnidadModel(null,$datos['denominacion']);
            return ConexionController::actualizar($conexion, $this->tabla, $id, $datos,'idclases');
        }

        public function eliminar($conexion, $id){
            return ConexionController::eliminar($conexion, $this->tabla, $id);
        }

        public function calcularNuevoCodigo($conexion){
            $sql_documento = "SELECT IFNULL(MAX(CAST( idclases AS INT )),0)+1 AS codigo_siguiente FROM $this->tabla";
            $fila = ConexionController::consultar($conexion, $sql_documento)->fetch_object();
            return $fila->codigo_siguiente;
        }

        public function claseHoy($conexion, $codigooficina){
            $sql_documento = "SELECT t.*,  
                                    g.nombre AS grupo_nombre,
                                    cu.nombre AS curso_nombre
                                FROM $this->tabla AS t
                                INNER JOIN horarios h ON t.codigohorario = h.codigohorario
                                INNER JOIN grupos g ON h.codigogrupo = g.codigogrupo
                                INNER JOIN cursos cu ON g.codigocurso = cu.codigocurso
                                WHERE h.codigooficina = $codigooficina
                                AND (nro_dia = (WEEKDAY(NOW())+1) AND NOW() BETWEEN h.hora_inicio AND h.hora_fin )";
                                
            return ConexionController::consultar($conexion, $sql_documento);
        }
    }