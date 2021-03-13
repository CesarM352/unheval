<?php
    class LabClaseModel{
        private $idclases;
        private $dia;
        private $horainicio;
        private $horafin;
        private $codigohorario;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->idclases = $data_consulta_bd->idclases;
            $this->dia = $data_consulta_bd->dia;
            $this->horainicio = $data_consulta_bd->horainicio;;
            $this->horafin = $data_consulta_bd->horafin;
            $this->codigohorario = $data_consulta_bd->codigohorario;
        }

        public function getId(){
            return $this->idclases;
        }

        public function getDia(){
            return $this->dia;
        }

        public function setDia($dia){
            $this->dia = $dia;
        }
		
		public function getHoraInicio(){
            return $this->horainicio;
        }

        public function setHoraInicio($horainicio){
            $this->horainicio = $horainicio;
        }
				
		public function getHoraFin(){
            return $this->horafin;
        }

        public function setHoraFin($horafin){
            $this->horafin = $horafin;
        }

        public function getCodigoHorario(){
            return $this->codigohorario;
        }

        public function setCodigoHorario($codigohorario){
            $this->codigohorario = $codigohorario;
        }
    }