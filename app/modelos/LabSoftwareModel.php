<?php
    class LabSoftwareModel{
        private $id;
        private $descripcion;
        private $tipo_sw;
        private $forma;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->id = $data_consulta_bd->id;
            $this->descripcion = $data_consulta_bd->descripcion;
            $this->tipo_sw = $data_consulta_bd->tipo_sw;
            $this->forma = $data_consulta_bd->forma;
        }

        public function getId(){
            return $this->id;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        public function geTtipoSw(){
            return $this->tipo_sw;
        }

        public function seTtipoSw($tipo_sw){
            $this->tipo_sw = $tipo_sw;
        }

        public function getForma(){
            return $this->forma;
        }

        public function setForma($forma){
            $this->forma = $forma;
        }
        
    }