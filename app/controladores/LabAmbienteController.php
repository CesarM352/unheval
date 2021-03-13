<?php
    require '../../modelos/LabAmbienteModel.php';

    class LabAmbienteController{
        private $tabla = "oficina";

        public function getAllAmbientes($conexion, $facultad_id=0){
            if($facultad_id==0)
                $sql_documento = "SELECT t.*, ta.nombre as tipo_oficina_nombre 
                                    FROM $this->tabla AS t
                                    INNER JOIN tipooficina AS ta ON t.codtipoofi = ta.codtipoofi";
            else
                $sql_documento = "SELECT t.*, ta.nombre as tipo_oficina_nombre 
                                    FROM $this->tabla AS t
                                    INNER JOIN tipooficina AS ta ON t.codtipoofi = ta.codtipoofi 
                                    WHERE facultad=$facultad_id";
                                    
            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function guardar($conexion, $datos){
            //$area_unidad_mdl = new TransaparenciaAvanceModel(null,$datos['denominacion']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getAmbiente($conexion, $id){
            $sql_documento = "SELECT * FROM $this->tabla WHERE codigooficina=$id";
            $documento_mdl = new LabAmbienteModel( ConexionController::consultar($conexion, $sql_documento)->fetch_object() );

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