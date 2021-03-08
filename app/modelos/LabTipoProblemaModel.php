<?php
    class LabTipoProblemaModel{
        private $codigoasunto;
        private $nombre;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigoasunto = $data_consulta_bd->codigoasunto;
            $this->nombre = $data_consulta_bd->nombre;
            $this->tipo_sw = $data_consulta_bd->tipo_sw;
            $this->forma = $data_consulta_bd->forma;
        }

        public function getId(){
            return $this->codigoasunto;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
    }