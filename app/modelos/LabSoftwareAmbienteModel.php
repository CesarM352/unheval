<?php
    class LabSoftwareAmbienteModel{
        private $id;
        private $codigosoftware;
        private $codigooficina;
        private $nro_licencias;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->id = $data_consulta_bd->id;
            $this->codigosoftware = $data_consulta_bd->codigosoftware;
            $this->codigooficina = $data_consulta_bd->codigooficina;
            $this->nro_licencias = $data_consulta_bd->nro_licencias;
        }

        public function getId(){
            return $this->id;
        }

        public function getSoftwareId(){
            return $this->codigosoftware;
        }

        public function setSoftwareId($codigosoftware){
            $this->codigosoftware = $codigosoftware;
        }

        public function getAmbienteId(){
            return $this->codigooficina;
        }

        public function setAmbienteId($codigooficina){
            $this->codigooficina = $codigooficina;
        }

        public function getNroLicencias(){
            return $this->nro_licencias;
        }

        public function setNroLicencias($nro_licencias){
            $this->nro_licencias = $nro_licencias;
        }
        
    }