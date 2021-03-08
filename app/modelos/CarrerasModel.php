<?php
    class CarrerasModel{
        private $codigocarrera;
        private $nombre;
        private $codigofacultad;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigocarrera = $data_consulta_bd->codigocarrera;
            $this->nombre = $data_consulta_bd->nombre;
            $this->codigofacultad = $data_consulta_bd->codigofacultad;
        }

        public function __construct2($codigocarrera, $nombre, $codigofacultad){
            $this->codigocarrera = $codigocarrera;
            $this->nombre = $nombre;
            $this->codigofacultad = $codigofacultad;
        }

        public function getcodigocarrera(){
            return $this->codigocarrera;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getcodigofacultad(){
            return $this->codigofacultad;
        }

        public function setcodigofacultad($codigofacultad){
            $this->codigofacultad = $codigofacultad;
        }
    }