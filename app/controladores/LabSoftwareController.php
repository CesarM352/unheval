<?php
    require '../../modelos/LabSoftwareModel.php';

    class LabSoftwareController{
        private $tabla = "software";

        public function getAllSoftwares($conexion, $ambiente_id=0){
            if($ambiente_id==0)
                $sql_documento = "SELECT * FROM $this->tabla";
            else
                $sql_documento = "SELECT * FROM $this->tabla WHERE ambiente_id=$ambiente_id";

            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function guardar($conexion, $datos){
            //$area_unidad_mdl = new TransaparenciaAvanceModel(null,$datos['denominacion']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getDocumento($conexion, $id){
            $sql_documento = "SELECT * FROM $this->tabla WHERE id=$id";
            $documento_mdl = new LabSoftwareModel( ConexionController::consultar($conexion, $sql_documento)->fetch_object() );

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