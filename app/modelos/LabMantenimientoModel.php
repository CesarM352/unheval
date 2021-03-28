<?php
    class LabMantenimientoModel{
        private $codigoproblema;
        private $fechareporte;
        private $codigoestudiante;
        private $detalles;
        private $codigoasunto;
        private $codigopatrimonio;
        private $codigooficina;
        private $usuario;
        private $estado;
        private $justificacion;
        private $tipo_problema;
        private $tecnico;
        private $fecha_hora_atencion;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigoproblema = $data_consulta_bd->codigoproblema;
            $this->codigopatrimonio = $data_consulta_bd->codigopatrimonio;
            //$this->codigooficina = $data_consulta_bd->codigooficina;
            $this->detalles = $data_consulta_bd->detalles;
            $this->fechareporte = $data_consulta_bd->fechareporte;
            $this->usuario = $data_consulta_bd->usuario;
            $this->estado = $data_consulta_bd->estado;
            $this->justificacion = $data_consulta_bd->justificacion;
            $this->tipo_problema = $data_consulta_bd->tipo_problema;
            $this->tecnico = $data_consulta_bd->tecnico;
            $this->fecha_hora_atencion = $data_consulta_bd->fecha_hora_atencion;
        }

        /*public function __construct2($id, $tipo, $nombre, $url, $estado, $proceso_id){
            $this->id = $id;
            $this->tipo = $tipo;
            $this->nombre = $nombre;
            $this->url = $url;
            $this->estado = $estado;
            $this->proceso_id = $proceso_id;
        }*/

        public function getId(){
            return $this->codigoproblema;
        }

        public function getEquipoId(){
            return $this->codigopatrimonio;
        }

        public function setEquipoId($codigopatrimonio){
            $this->codigopatrimonio = $codigopatrimonio;
        }
		
		public function getAmbienteId(){
            return $this->codigooficina;
        }

        public function setAmbienteId($codigooficina){
            $this->codigooficina = $codigooficina;
        }
		
		public function getDetalle(){
            return $this->detalle;
        }

        public function setDetalle($detalle){
            $this->detalle = $detalle;
        }
		
		public function getFechaReporte(){
            return $this->fechareporte;
        }

        public function setFecha($fechareporte){
            $this->fechareporte = $fechareporte;
        }
		
		public function getUsuario(){
            return $this->usuario;
        }

        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }
		
		public function getEstado(){
            return $this->estado;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }
		
		public function getJustificacion(){
            return $this->justificacion;
        }

        public function setJustificacion($justificacion){
            $this->justificacion = $justificacion;
        }

        public function getTipoProblema(){
            return $this->tipo_problema;
        }

        public function setTipoProblema($tipo_problema){
            $this->tipo_problema = $tipo_problema;
        }

        public function getTecnico(){
            return $this->tecnico;
        }

        public function setTecnico($tecnico){
            $this->tecnico = $tecnico;
        }

        public function getFechaHoraAtencion(){
            return $this->fecha_hora_atencion;
        }

        public function setFechaHoraAtencion($fecha_hora_atencion){
            $this->fecha_hora_atencion = $fecha_hora_atencion;
        }
        
    }