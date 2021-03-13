<?php
    require '../../modelos/LabSoftwareModel.php';

    class LabSoftwareController{
        private $tabla = "softwares";

        public function getAllSoftwares($conexion, $ambiente_id=0){
            if($ambiente_id==0)
                $sql_documento = "SELECT * FROM $this->tabla";
            else
                $sql_documento = "SELECT * FROM $this->tabla WHERE codigosoftware=$ambiente_id";

            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function guardar($conexion, $datos){
            //$area_unidad_mdl = new TransaparenciaAvanceModel(null,$datos['denominacion']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getSoftware($conexion, $id){
            $sql_documento = "SELECT * FROM $this->tabla WHERE codigosoftware=$id";
            $documento_mdl = new LabSoftwareModel( ConexionController::consultar($conexion, $sql_documento)->fetch_object() );

            return $documento_mdl;
        }

        public function actualizar($conexion, $id, $datos){
            //$area_unidad_mdl = new AreaUnidadModel(null,$datos['denominacion']);
            return ConexionController::actualizar($conexion, $this->tabla, $id, $datos,'codigosoftware');
        }

        public function eliminar($conexion, $id){
            return ConexionController::eliminar($conexion, $this->tabla, $id);
        }

        public function calcularNuevoCodigo($conexion){
            $sql_documento = "SELECT IFNULL(MAX(CAST( codigosoftware AS INT )),0)+1 AS codigo_siguiente FROM $this->tabla";
            $fila = ConexionController::consultar($conexion, $sql_documento)->fetch_object();
            return $fila->codigo_siguiente;
        }
    }