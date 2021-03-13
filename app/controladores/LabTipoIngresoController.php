<?php
    require '../../modelos/LabTipoIngresoModel.php';

    class LabTipoIngresoController{
        private $tabla = "tipoingresos";

        public function getAllTiposIngresos($conexion, $ambiente_id=0){
            $sql_documento = "SELECT * FROM $this->tabla";

            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function guardar($conexion, $datos){
            //$area_unidad_mdl = new TransaparenciaAvanceModel(null,$datos['denominacion']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getTipoIngreso($conexion, $id){
            $sql_documento = "SELECT * FROM $this->tabla WHERE codtipoingreso=$id";
            $documento_mdl = new LabTipoIngresoModel( ConexionController::consultar($conexion, $sql_documento)->fetch_object() );

            return $documento_mdl;
        }

        public function actualizar($conexion, $id, $datos){
            //$area_unidad_mdl = new AreaUnidadModel(null,$datos['denominacion']);
            return ConexionController::actualizar($conexion, $this->tabla, $id, $datos, 'codtipoingreso');
        }

        public function eliminar($conexion, $id){
            return ConexionController::eliminar($conexion, $this->tabla, $id);
        }
    }