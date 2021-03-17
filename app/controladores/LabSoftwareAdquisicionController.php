<?php
    require '../../modelos/LabSoftwareAdquisicionModel.php';

    class LabSoftwareAdquisicionController{
        private $tabla = "software_adquisicion";

        public function getAllSoftwaresAdquisiciones($conexion, $software_id=0){
            if($software_id==0)
                $sql_documento = "SELECT t.*, 
                                        s.nombre AS software_descripcion,
                                        s.tipo_sw AS software_tipo_sw,
                                        s.forma AS software_forma
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