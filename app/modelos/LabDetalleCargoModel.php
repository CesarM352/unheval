<?php
    class LabDetalleCargoModel{
        private $iddetallecargo;
        private $idcargo;
        private $codigopatrimonio;
        private $estadoprestamo;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->iddetallecargo = $data_consulta_bd->iddetallecargo;
            $this->idcargo = $data_consulta_bd->idcargo;
            $this->codigopatrimonio = $data_consulta_bd->codigopatrimonio;
            $this->estadoprestamo = $data_consulta_bd->estadoprestamo;
        }

        public function getId(){
            return $this->iddetallecargo;
        }

        public function getIdCargo(){
            return $this->idcargo;
        }

        public function setIdCargo($idcargo){
            $this->idcargo = $idcargo;
        }

        public function getCodigoPatrimonio(){
            return $this->codigopatrimonio;
        }

        public function setCodigoPatrimonio($codigopatrimonio){
            $this->codigopatrimonio = $codigopatrimonio;
        }

        public function getEstadoPrestamo(){
            return $this->estadoprestamo;
        }

        public function setEstadoPrestamo($estadoprestamo){
            $this->estadoprestamo = $estadoprestamo;
        }
    }