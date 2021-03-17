<?php
    class LabSoftwareAmbienteModel{
        private $codigooficina;
        private $codigosoftware;
        private $fechainstalacion;
        private $nro_licencias;
        private $softwareadquisicionid;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigosoftware = $data_consulta_bd->codigosoftware;
            $this->codigooficina = $data_consulta_bd->codigooficina;
            $this->fechainstalacion = $data_consulta_bd->fechainstalacion;
            $this->nro_licencias = $data_consulta_bd->nro_licencias;
            $this->softwareadquisicionid = $data_consulta_bd->softwareadquisicionid;
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

        public function getFechaInstalacion(){
            return $this->fechainstalacion;
        }

        public function setFechaInstalacion($fechainstalacion){
            $this->fechainstalacion = $fechainstalacion;
        }

        public function getNroLicencias(){
            return $this->nro_licencias;
        }

        public function setNroLicencias($nro_licencias){
            $this->nro_licencias = $nro_licencias;
        }

        public function getSoftwareAdquisicionId(){
            return $this->softwareadquisicionid;
        }

        public function setSoftwareAdquisicionId($softwareadquisicionid){
            $this->softwareadquisicionid = $softwareadquisicionid;
        }
        
    }