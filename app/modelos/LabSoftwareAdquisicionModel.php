<?php
    class LabSoftwareAdquisicionModel{
        private $id;
        private $software_id;
        private $nro_licencias;
        private $fecha_compra;
        private $duracion_dias;
        private $nro_licencias_disponibles;
        private $requisitos_minimos;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->id = $data_consulta_bd->id;
            $this->software_id = $data_consulta_bd->software_id;
            $this->nro_licencias = $data_consulta_bd->nro_licencias;
            $this->fecha_compra = $data_consulta_bd->fecha_compra;
            $this->duracion_dias = $data_consulta_bd->duracion_dias;
            $this->nro_licencias_disponibles = $data_consulta_bd->nro_licencias_disponibles;
            $this->requisitos_minimos = $data_consulta_bd->requisitos_minimos;
        }

        public function getId(){
            return $this->id;
        }

        public function getSoftwareId(){
            return $this->software_id;
        }

        public function setSoftwareId($software_id){
            $this->software_id = $software_id;
        }

        public function getNroLicencias(){
            return $this->nro_licencias;
        }

        public function setNroLicencias($nro_licencias){
            $this->nro_licencias = $nro_licencias;
        }

        public function getFechaCompra(){
            return $this->fecha_compra;
        }

        public function setFechaCompra($fecha_compra){
            $this->fecha_compra = $fecha_compra;
        }

        public function getDuracionDias(){
            return $this->duracion_dias;
        }

        public function setDuracionDias($duracion_dias){
            $this->duracion_dias = $duracion_dias;
        }

        public function getNroLicenciasDisponibles(){
            return $this->nro_licencias_disponibles;
        }

        public function setNroLicenciasDisponibles($nro_licencias_disponibles){
            $this->nro_licencias_disponibles = $nro_licencias_disponibles;
        }

        public function getRequisitosMinimos(){
            return $this->requisitos_minimos;
        }

        public function setRequisitosMinimos($requisitos_minimos){
            $this->requisitos_minimos = $requisitos_minimos;
        }
        
    }