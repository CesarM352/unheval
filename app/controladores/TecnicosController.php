<?php
    require '../../modelos/TecnicosModel.php';

    class TecnicosController{
        private $tabla = "tecnicos";

        public function getAllTecnicos($conexion){
            $sql_tecnicos = "SELECT * FROM $this->tabla ORDER BY nombre";

            return ConexionController::consultar($conexion, $sql_tecnicos);
        }

        public function guardar($conexion, $datos){
            $tecnicos_mdl = new TecnicosModel(null,$datos['numerocontrato'],['nombre'],['user'],['pass'],['anionacimiento'],['celular'],['fechainicio'],['dni'],['fechacaduca']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getTecnico($conexion, $numerocontrato){
            $sql_tecnicos = "SELECT * FROM tecnicos WHERE numerocontrato=$numerocontrato";
            $tecnicos_mdl = new TecnicosModel( ConexionController::consultar($conexion, $sql_tecnicos)->fetch_object() );
            return $tecnicos_mdl;
        }

        public function actualizar($conexion, $numerocontrato, $datos){
            $tecnicos_mdl = new TecnicosModel(null,$datos['numerocontrato'],['nombre'],['user'],['pass'],['anionacimiento'],['celular'],['fechainicio'],['dni'],['fechacaduca']);
            return ConexionController::actualizarTecnicos($conexion, $this->tabla, $numerocontrato, $datos);
        }

        public function eliminar($conexion, $numerocontrato){
            return ConexionController::eliminarTecnicos($conexion, $this->tabla, $numerocontrato);
        }

        public function getAllTecnicosComplete($conexion, $term){
            $sql_tecnicos = "SELECT * FROM $this->tabla
                             WHERE nombre like '%" .$term. "%' or numerocontrato like '%" .$term. "%'
                             ORDER BY nombre";
            return ConexionController::consultar($conexion, $sql_tecnicos);
        }

        public function getAllTecnicosDNI($conexion, $dni){
            $sql_tecnicos = "SELECT * FROM tecnicos WHERE dni='$dni'";
            return ConexionController::consultar($conexion, $sql_tecnicos);
        }

        public function getAllTecnicosContrato($conexion, $numerocontrato){
            $sql_tecnicos = "SELECT * FROM tecnicos WHERE numerocontrato='$numerocontrato'";
            return ConexionController::consultar($conexion, $sql_tecnicos);
        }

    }
?>