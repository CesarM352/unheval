<?php
    require '../../modelos/LabEstadoEquipoModel.php';

    class LabEstadoEquipoController{
        private $tabla = "estadoequipo";

        public function getAllEstadosEquipos($conexion, $ambiente_id=0){
            $sql_documento = "SELECT * FROM $this->tabla";

            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function guardar($conexion, $datos){
            //$area_unidad_mdl = new TransaparenciaAvanceModel(null,$datos['denominacion']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getEstadoEquipo($conexion, $id){
            $sql_documento = "SELECT * FROM $this->tabla WHERE codigoestado=$id";
            $documento_mdl = new LabEstadoEquipoModel( ConexionController::consultar($conexion, $sql_documento)->fetch_object() );

            return $documento_mdl;
        }

        public function actualizar($conexion, $id, $datos){
            //$area_unidad_mdl = new AreaUnidadModel(null,$datos['denominacion']);
            return ConexionController::actualizar($conexion, $this->tabla, $id, $datos, 'codigoestado');
        }

        public function eliminar($conexion, $id){
            return ConexionController::eliminar($conexion, $this->tabla, $id);
        }
    }