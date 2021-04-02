<?php
    require '../../modelos/LabDetalleCargoModel.php';

    class LabDetalleCargoController{
        private $tabla = "detalle_cargo";

        public function getAllDetallesCargos($conexion, $idcargo=0){
            $sql_documento = "SELECT t.*, 
                                e.nombre AS equipo_nombre,
                                e.descripcion AS equipo_descripcion
                                FROM $this->tabla AS t 
                                INNER JOIN cargos c ON t.idcargo = c.idcargos
                                INNER JOIN equipos e ON t.codigopatrimonio = e.codigopatrimonio";

            if( $idcargo > 0 )
                $sql_documento .= " WHERE t.idcargo = ".$idcargo;

            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function guardar($conexion, $datos){
            //$area_unidad_mdl = new TransaparenciaAvanceModel(null,$datos['denominacion']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getDetalleCargo($conexion, $iddetallecargo){
            $sql_documento = "SELECT t.*, 
                                e.nombre AS equipo_nombre,
                                e.descripcion AS equipo_descripcion
                                FROM $this->tabla AS t 
                                INNER JOIN cargos c ON t.iddetallecargo = c.idcargos
                                INNER JOIN equipos e ON t.codigopatrimonio = e.codigopatrimonio
                                WHERE iddetallecargo=$iddetallecargo";
            $documento_mdl = new LabDetalleCargoModel( ConexionController::consultar($conexion, $sql_documento)->fetch_object() );

            return $documento_mdl;
        }

        public function actualizar($conexion, $id, $datos){
            //$area_unidad_mdl = new AreaUnidadModel(null,$datos['denominacion']);
            return ConexionController::actualizar($conexion, $this->tabla, $id, $datos, 'iddetallecargo');
        }

        public function eliminar($conexion, $id){
            return ConexionController::eliminar($conexion, $this->tabla, $id);
        }

        /* public function equiposActivos($conexion){
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
        } */
    }