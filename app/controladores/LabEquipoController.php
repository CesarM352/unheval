<?php
    require '../../modelos/LabEquipoModel.php';

    class LabEquipoController{
        private $tabla = "equipos";

        public function getAllEquipos($conexion){
            $sql_documento = "SELECT t.*, 
                                o.codigooficina AS ambiente_codigooficina,
                                o.nombre AS ambiente_nombre,
                                te.nombre AS equipo_tipo,
                                ee.nombre AS equipo_estado
                                FROM $this->tabla AS t 
                                INNER JOIN laboratorios_equipo le ON t.codigopatrimonio = le.codigopatrimonio
                                INNER JOIN oficina o ON le.codigooficina = o.codigooficina
                                INNER JOIN tipoequipos te ON t.codtipoequipo = te.codtipoequipo
                                INNER JOIN estadoequipo ee ON t.codigoestado = ee.codigoestado
                                WHERE le.estadopresente = 1";

            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function guardar($conexion, $datos){
            //$area_unidad_mdl = new TransaparenciaAvanceModel(null,$datos['denominacion']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getDocumento($conexion, $id){
            $sql_documento = "SELECT * FROM $this->tabla WHERE codigopatrimonio=$id";
            $documento_mdl = new LabEquipoModel( ConexionController::consultar($conexion, $sql_documento)->fetch_object() );

            return $documento_mdl;
        }

        public function actualizar($conexion, $id, $datos){
            //$area_unidad_mdl = new AreaUnidadModel(null,$datos['denominacion']);
            return ConexionController::actualizar($conexion, $this->tabla, $id, $datos, 'codigopatrimonio');
        }

        public function eliminar($conexion, $id){
            return ConexionController::eliminar($conexion, $this->tabla, $id);
        }

        public function equiposActivos($conexion){
            $sql_documento = "SELECT t.*, 
                                o.nombre AS ambiente_nombre,
                                te.nombre AS equipo_tipo,
                                ee.nombre AS equipo_estado
                                FROM $this->tabla AS t 
                                INNER JOIN laboratorios_equipo le ON t.codigopatrimonio = le.codigopatrimonio
                                INNER JOIN oficina o ON le.codigooficina = o.codigooficina
                                INNER JOIN tipoequipos te ON t.codtipoequipo = te.codtipoequipo
                                INNER JOIN estadoequipo ee ON t.codigoestado = ee.codigoestado
                                WHERE ee.nombre <> 'BAJA' AND le.estadopresente = 1";

            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function equiposEnBaja($conexion){
            $sql_documento = "SELECT t.*, 
                                te.nombre AS equipo_tipo,
                                ee.nombre AS equipo_estado
                                FROM $this->tabla AS t 
                                INNER JOIN tipoequipos te ON t.codtipoequipo = te.codtipoequipo
                                INNER JOIN estadoequipo ee ON t.codigoestado = ee.codigoestado
                                WHERE ee.nombre = 'BAJA'";

            return ConexionController::consultar($conexion, $sql_documento);
        }
    }