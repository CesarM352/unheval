<?php
    require '../../modelos/LabSoftwareAmbienteModel.php';

    class LabSoftwareAmbienteController{
        private $tabla = "laboratorios_software";

        public function getAllSoftwaresAmbientes($conexion, $codigooficina=0){
            if($codigooficina==0)
                $sql_documento = "SELECT t.*, 
                                        s.nombre AS software_nombre,
                                        s.tipo_sw AS software_tipo_sw,
                                        s.forma AS software_forma
                                    FROM $this->tabla AS t
                                    INNER JOIN softwares s ON t.codigosoftware = s.codigosoftware";
            else
                $sql_documento = "SELECT t.*, 
                                        s.nombre AS software_nombre,
                                        s.tipo_sw AS software_tipo_sw,
                                        s.forma AS software_forma
                                    FROM $this->tabla AS t
                                    INNER JOIN softwares s ON t.codigosoftware = s.codigosoftware
                                    WHERE codigooficina=$codigooficina";

            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function guardar($conexion, $datos){
            //$area_unidad_mdl = new TransaparenciaAvanceModel(null,$datos['denominacion']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getDocumento($conexion, $id){
            $sql_documento = "SELECT * FROM $this->tabla WHERE id=$id";
            $documento_mdl = new LabSoftwareAmbienteModel( ConexionController::consultar($conexion, $sql_documento)->fetch_object() );

            return $documento_mdl;
        }

        public function actualizar($conexion, $id, $datos){
            //$area_unidad_mdl = new AreaUnidadModel(null,$datos['denominacion']);
            return ConexionController::actualizar($conexion, $this->tabla, $id, $datos);
        }

        public function eliminar($conexion, $id){
            return ConexionController::eliminar($conexion, $this->tabla, $id);
        }
    }