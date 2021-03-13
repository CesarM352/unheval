<?php
    class LabAsistenciaModel{
        private $idasistencia;
        private $fecha;
        private $asistio;
        private $hora;
        private $idclases;
        private $codigoalum_matri;
        private $nropc;
        private $estadopc;
        private $codigopatrimonio;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->idasistencia = $data_consulta_bd->idasistencia;
            $this->fecha = $data_consulta_bd->fecha;
            $this->asistio = $data_consulta_bd->asistio;;
            $this->hora = $data_consulta_bd->hora;
            $this->idclases = $data_consulta_bd->idclases;
            $this->codigoalum_matri = $data_consulta_bd->codigoalum_matri;
            $this->nropc = $data_consulta_bd->nropc;
            $this->estadopc = $data_consulta_bd->estadopc;
            $this->codigopatrimonio = $data_consulta_bd->codigopatrimonio;
        }

        public function getId(){
            return $this->idasistencia;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
		
		public function getAsistio(){
            return $this->asistio;
        }

        public function setAsistio($asistio){
            $this->asistio = $asistio;
        }
				
		public function getHora(){
            return $this->hora;
        }

        public function setHora($hora){
            $this->hora = $hora;
        }

        public function getIdClases(){
            return $this->idclases;
        }

        public function setIdClases($idclases){
            $this->idclases = $idclases;
        }

        public function getCodigoAlumMatri(){
            return $this->codigoalum_matri;
        }

        public function setCodigoAlumMatri($codigoalum_matri){
            $this->codigoalum_matri = $codigoalum_matri;
        }

        public function getNroPc(){
            return $this->nropc;
        }

        public function setNroPc($nropc){
            $this->nropc = $nropc;
        }

        public function getEstadoPc(){
            return $this->estadopc;
        }

        public function setEstadoPc($estadopc){
            $this->estadopc = $estadopc;
        }

        public function getCodigoPatrimonio(){
            return $this->codigopatrimonio;
        }

        public function setCodigoPatrimonio($codigopatrimonio){
            $this->codigopatrimonio = $codigopatrimonio;
        }
    }