<?php
    require '../../modelos/LabSoftwareAdquisicionModel.php';

    class LabSoftwareAdquisicionController{
        private $tabla = "software_adquisicion";

        public function getAllSoftwaresAdquisiciones($conexion, $software_id=0){
            if($software_id==0)
                $sql_documento = "SELECT t.*, 
                                        s.nombre AS software_descripcion,
                                        s.tipo_sw AS software_tipo_sw,
                                        s.forma AS software_forma,
                                        s.propietario AS software_propietario,
                                        s.conlicencia AS software_conlicencia,
                                        DATE_ADD(t.fecha_compra, INTERVAL t.duracion_dias DAY) AS fecha_vencimiento,
                                        DATEDIFF( NOW(), DATE_ADD(t.fecha_compra, INTERVAL t.duracion_dias DAY) ) AS dias_por_vencer
                                    FROM $this->tabla AS t
                                    INNER JOIN softwares s ON t.software_id = s.codigosoftware";
            else
                $sql_documento = "SELECT t.*, 
                                        s.nombre AS software_descripcion,
                                        s.tipo_sw AS software_tipo_sw,
                                        s.forma AS software_forma
                                    FROM $this->tabla AS t
                                    INNER JOIN softwares s ON t.software_id = s.codigosoftware
                                    WHERE software_id=$software_id";

            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function guardar($conexion, $datos){
            //$area_unidad_mdl = new TransaparenciaAvanceModel(null,$datos['denominacion']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getDocumento($conexion, $id){
            $sql_documento = "SELECT * FROM $this->tabla WHERE id=$id";
            $documento_mdl = new LabSoftwareAdquisicionModel( ConexionController::consultar($conexion, $sql_documento)->fetch_object() );

            return $documento_mdl;
        }

        public function actualizar($conexion, $id, $datos){
            //$area_unidad_mdl = new AreaUnidadModel(null,$datos['denominacion']);
            return ConexionController::actualizar($conexion, $this->tabla, $id, $datos);
        }

        public function eliminar($conexion, $id){
            return ConexionController::eliminar($conexion, $this->tabla, $id);
        }


        public function getAllSoftwaresAdquisicionesNoParaInstalar($conexion, $codigooficina=0){
            $sql_documento = "SELECT t.*, 
                                    s.nombre AS software_descripcion,
                                    s.tipo_sw AS software_tipo_sw,
                                    s.forma AS software_forma,
                                    s.propietario AS software_propietario,
                                    s.conlicencia AS software_conlicencia
                                FROM $this->tabla AS t
                                INNER JOIN softwares s ON t.software_id = s.codigosoftware
                                WHERE ( s.propietario=0 && NOT EXISTS (SELECT * FROM laboratorios_software ls WHERE ls.codigooficina = $codigooficina AND t.id=ls.softwareadquisicionid AND s.codigosoftware = ls.codigosoftware) )
                                    OR ( s.propietario=1 && s.conlicencia=1 && t.nro_licencias_disponibles>0 && ( t.duracion_dias = -1 || ( now() BETWEEN fecha_compra AND DATE_ADD(t.fecha_compra, INTERVAL t.duracion_dias+1 DAY) ) ) )
                                    OR ( s.propietario=1 && s.conlicencia=0 && ( t.duracion_dias = -1 || ( now() BETWEEN fecha_compra AND DATE_ADD(t.fecha_compra, INTERVAL t.duracion_dias+1 DAY) ) ) )";

            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function getAllSoftwaresAdquisicionesComplete($conexion, $term){
            $sql_software = "SELECT t.*, 
                                    s.nombre AS software_descripcion,
                                    s.tipo_sw AS software_tipo_sw,
                                    s.forma AS software_forma
                                FROM $this->tabla AS t
                                INNER JOIN softwares s ON t.software_id = s.codigosoftware
                                WHERE s.nombre like '%" .$term. "%'
                                ORDER BY s.nombre";
            return ConexionController::consultar($conexion, $sql_software);

        }
    }