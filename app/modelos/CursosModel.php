<?php
    class CursosModel{
        private $codigocurso;
        private $nombre;
        private $descripcion;
        private $numerocredito;
        private $codigocarrera;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigocurso = $data_consulta_bd->codigocurso;
            $this->nombre = $data_consulta_bd->nombre;
            $this->descripcion = $data_consulta_bd->descripcion;
            $this->numerocredito = $data_consulta_bd->numerocredito;
            $this->codigocarrera = $data_consulta_bd->codigocarrera;
        }

        public function __construct2($codigocurso, $nombre, $descripcion, $numerocredito, $codigocarrera){
            $this->codigocurso = $codigocurso;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->numerocredito = $numerocredito;
            $this->codigocarrera = $codigocarrera;
        }

        public function getCodigocurso(){
            return $this->codigocurso;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        public function getNumerocredito(){
            return $this->numerocredito;
        }

        public function setNumerocredito($numerocredito){
            $this->numerocredito = $numerocredito;
        }

        public function getCodigocarrera(){
            return $this->codigocarrera;
        }

        public function setCodigocarrera($codigocarrera){
            $this->codigocarrera = $codigocarrera;
        }
    }