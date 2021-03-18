<?php
    require '../../modelos/LabAsistenciaModel.php';

    class LabAsistenciaController{
        private $tabla = "asistencias";

        public function getAllAsistencias($conexion, $codigoestudiante=0){
            /* $sql_documento = "SELECT DISTINCT t.*,  
                                    e.nombre AS equipo_nombre,
                                    (SELECT oficina.nombre FROM oficina WHERE oficina.codigooficina = (SELECT laboratorios_equipo.codigooficina FROM laboratorios_equipo WHERE laboratorios_equipo.codigopatrimonio = e.codigopatrimonio AND laboratorios_equipo.estadopresente=1 ORDER BY laboratorios_equipo.codigolaboratorioequipo DESC LIMIT 1 )) AS oficina_nombre,
                                    es.nombre AS estudiante_nombres,
                                    g.nombre AS grupo_nombre,
                                    cu.nombre AS curso_nombre
                                FROM $this->tabla AS t
                                INNER JOIN equipos e ON t.codigopatrimonio = e.codigopatrimonio
                                INNER JOIN alumnos_en_matricula am ON t.codigoalum_matri = am.codigoalum_matri
                                INNER JOIN matriculas m ON am.codigomatricula = m.codigomatricula
                                INNER JOIN estudiantes es ON m.codigoestudiante = es.codigoestudiante
                                INNER JOIN clases c ON t.idclases = c.idclases
                                INNER JOIN horarios h ON c.codigohorario = h.codigohorario
                                INNER JOIN oficina o ON h.codigooficina = o.codigooficina
                                INNER JOIN grupos g ON h.codigogrupo = h.codigogrupo
                                INNER JOIN cursos cu ON g.codigocurso = cu.codigocurso"; */
            $sql_documento = "SELECT t.*,  
                                    e.nombre AS equipo_nombre,
                                    (SELECT oficina.nombre FROM oficina WHERE oficina.codigooficina = t.codigooficina ) AS oficina_nombre,
                                    (SELECT es.nombre FROM estudiantes es WHERE es.codigoestudiante = ( SELECT m.codigoestudiante FROM matriculas m WHERE m.codigomatricula = ( SELECT am.codigomatricula FROM alumnos_en_matricula am WHERE am.codigoalum_matri = t.codigoalum_matri) ) ) AS estudiante_nombres,
                                    (SELECT CONCAT(cu.nombre, ' ', g.nombre) FROM grupos g INNER JOIN cursos cu ON cu.codigocurso = g.codigocurso WHERE g.codigogrupo = ( SELECT h.codigogrupo FROM horarios h WHERE h.codigohorario = ( SELECT c.codigohorario FROM clases c WHERE c.idclases = t.idclases ) ) ) AS grupo_nombre
                                FROM $this->tabla AS t
                                INNER JOIN equipos e ON t.codigopatrimonio = e.codigopatrimonio";
            if($codigoestudiante>0)
                $sql_documento .= " WHERE (SELECT es1.codigoestudiante FROM estudiantes es1 WHERE es1.codigoestudiante = ( SELECT m.codigoestudiante FROM matriculas m WHERE m.codigomatricula = ( SELECT am.codigomatricula FROM alumnos_en_matricula am WHERE am.codigoalum_matri = t.codigoalum_matri) ) ) = '$codigoestudiante' ";

            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function guardar($conexion, $datos){
            //$area_unidad_mdl = new TransaparenciaAvanceModel(null,$datos['denominacion']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getAsistencia($conexion, $id){
            $sql_documento = "SELECT * FROM $this->tabla WHERE idasistencia=$id";
            $documento_mdl = new LabAsistenciaModel( ConexionController::consultar($conexion, $sql_documento)->fetch_object() );

            return $documento_mdl;
        }

        public function actualizar($conexion, $id, $datos){
            //$area_unidad_mdl = new AreaUnidadModel(null,$datos['denominacion']);
            return ConexionController::actualizar($conexion, $this->tabla, $id, $datos,'idasistencia');
        }

        public function eliminar($conexion, $id){
            return ConexionController::eliminar($conexion, $this->tabla, $id);
        }

        public function calcularNuevoCodigo($conexion){
            $sql_documento = "SELECT IFNULL(MAX(CAST( idasistencia AS INT )),0)+1 AS codigo_siguiente FROM $this->tabla";
            $fila = ConexionController::consultar($conexion, $sql_documento)->fetch_object();
            return $fila->codigo_siguiente;
        }
    }