<?php
    require '../../modelos/LabMantenimientoModel.php';

    class LabMantenimientoController{
        private $tabla = "problemas";

        public function getAllMantenimientos($conexion, $ambiente_id=0){
            if($ambiente_id==0)
                $sql_documento = "SELECT t.*,  
                                        (SELECT oficina.nombre FROM oficina WHERE oficina.codigooficina = (SELECT laboratorios_equipo.codigooficina FROM laboratorios_equipo WHERE laboratorios_equipo.codigopatrimonio = e.codigopatrimonio AND laboratorios_equipo.estadopresente=1 ORDER BY laboratorios_equipo.codigolaboratorioequipo DESC LIMIT 1 )) AS ambiente_nombre,
                                        e.codigopatrimonio AS equipo_codigo,
                                        e.descripcion AS equipo_descripcion,
                                        te.nombre AS equipo_tipo
                                    FROM $this->tabla AS t
                                    INNER JOIN equipos e ON t.codigopatrimonio = e.codigopatrimonio
                                    INNER JOIN tipoequipos te ON e.codtipoequipo = te.codtipoequipo";
            else
                $sql_documento = "SELECT t.*,  
                                        a.nombre AS ambiente_nombre,
                                        e.codigo AS equipo_codigo,
                                        e.codigo AS equipo_descripcion,
                                        te.nombre AS equipo_tipo
                                    FROM $this->tabla AS t
                                    INNER JOIN equipos e ON t.codigopatrimonio = e.codigopatrimonio
                                    -- INNER JOIN laboratorios_equipo le ON e.codigopatrimonio = le.codigopatrimonio
                                    -- INNER JOIN oficina o ON le.codigooficina = o.codigooficina
                                    INNER JOIN tipoequipos te ON e.codtipoequipo = te.codtipoequipo
                                    WHERE le.codigooficina=$ambiente_id";

            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function guardar($conexion, $datos){
            //$area_unidad_mdl = new TransaparenciaAvanceModel(null,$datos['denominacion']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getDocumento($conexion, $id){
            $sql_documento = "SELECT * FROM $this->tabla WHERE codigoproblema=$id";
            $documento_mdl = new LabMantenimientoModel( ConexionController::consultar($conexion, $sql_documento)->fetch_object() );

            return $documento_mdl;
        }

        public function actualizar($conexion, $id, $datos){
            //$area_unidad_mdl = new AreaUnidadModel(null,$datos['denominacion']);
            return ConexionController::actualizar($conexion, $this->tabla, $id, $datos, 'codigoproblema');
        }

        public function eliminar($conexion, $id){
            return ConexionController::eliminar($conexion, $this->tabla, $id);
        }

        public function getFunciones($conexion, $result, $funcion=""){
            switch($funcion){
                case "cantidad":
                    return ConexionController::consultarCantidad($conexion, $result);
                    break;
                default:
                    return null;
            }
        }

        public function calcularCantidadPendientes($conexion){
            $sql_documento = "SELECT * FROM $this->tabla WHERE estado='PENDIENTE'";
            return $this->getFunciones($conexion, ConexionController::consultar($conexion, $sql_documento), "cantidad");
        }

        public function calcularNuevoCodigo($conexion){
            $sql_documento = "SELECT IFNULL(MAX(CAST( codigoproblema AS INT )),0)+1 AS codigo_siguiente FROM $this->tabla";
            $fila = ConexionController::consultar($conexion, $sql_documento)->fetch_object();
            return $fila->codigo_siguiente;
        }
    }