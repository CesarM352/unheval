<?php
    require '../../modelos/LabInventarioModel.php';

    class LabInventarioController{
        private $tabla = "laboratorios_equipo";

        public function getAllInventarios($conexion, $ambiente_id=0){
            if($ambiente_id==0)
                $sql_documento = "SELECT t.*,  
                                        o.nombre AS ambiente_nombre,
                                        e.codigopatrimonio AS equipo_codigo,
                                        e.descripcion AS equipo_descripcion,
                                        te.nombre AS equipo_tipo
                                    FROM $this->tabla AS t
                                    INNER JOIN equipos e ON t.codigopatrimonio = e.codigopatrimonio
                                    INNER JOIN oficina o ON t.codigooficina = o.codigooficina
                                    INNER JOIN tipoequipos te ON e.codtipoequipo = te.codtipoequipo";
            else
                $sql_documento = "SELECT t.*,  
                                        o.nombre AS ambiente_nombre,
                                        e.codigopatrimonio AS equipo_codigo,
                                        e.descripcion AS equipo_descripcion,
                                        te.nombre AS equipo_tipo
                                    FROM $this->tabla AS t
                                    INNER JOIN equipos e ON t.codigopatrimonio = e.codigopatrimonio
                                    INNER JOIN oficina o ON t.codigooficina = o.codigooficina
                                    INNER JOIN tipoequipos te ON e.codtipoequipo = te.codtipoequipo
                                    WHERE t.codigooficina=$ambiente_id";

            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function guardar($conexion, $datos){
            //$area_unidad_mdl = new TransaparenciaAvanceModel(null,$datos['denominacion']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getDocumento($conexion, $id){
            $sql_documento = "SELECT * FROM $this->tabla WHERE id=$id";
            $documento_mdl = new LabInventarioModel( ConexionController::consultar($conexion, $sql_documento)->fetch_object() );

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