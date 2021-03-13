<?php
    class DireccionesModel{
        private $codigodireccion;
        private $codigovia;
        private $nropuerta;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigodireccion = $data_consulta_bd->codigodireccion;
            $this->codigovia = $data_consulta_bd->codigovia;
            $this->nropuerta = $data_consulta_bd->nropuerta;
        }

        public function __construct2($codigodireccion, $codigovia, $nropuerta){
            $this->codigodireccion = $codigodireccion;
            $this->codigovia = $codigovia;
            $this->nropuerta = $nropuerta;
        }

        public function getCodigodireccion(){
            return $this->codigodireccion;
        }

        public function getCodigovia(){
            return $this->codigovia;
        }

        public function setCodigovia($codigovia){
            $this->codigovia = $codigovia;
        }

        public function getNropuerta(){
            return $this->nropuerta;
        }

        public function setNropuerta($nropuerta){
            $this->nropuerta = $nropuerta;
        }
    }