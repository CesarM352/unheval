<?php
    class CursosModel{
        private $codigocurso;
        private $nombre;
        private $descripcion;
        private $numerocredito;
        private $codigocarrera;
        private $h_teoricas;
        private $h_practicas;
        private $tipo;

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
            $this->h_teoricas = $data_consulta_bd->h_teoricas;
            $this->h_practicas = $data_consulta_bd->h_practicas;
            $this->tipo = $data_consulta_bd->tipo;
        }

        public function __construct2($codigocurso, $nombre, $descripcion, $numerocredito, $codigocarrera, $h_teoricas, $h_practicas, $tipo){
            $this->codigocurso = $codigocurso;
            $this->nombre = $nombre;
            $this->descripcion = $descripcion;
            $this->numerocredito = $numerocredito;
            $this->codigocarrera = $codigocarrera;
            $this->h_teoricas = $h_teoricas;
            $this->h_practicas = $h_practicas;
            $this->tipo = $tipo;
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

        public function getH_teoricas(){
            return $this->h_teoricas;
        }

        public function setH_teoricas($h_teoricas){
            $this->h_teoricas = $h_teoricas;
        }

        public function getH_practicas(){
            return $this->h_practicas;
        }

        public function setH_practicas($h_practicas){
            $this->h_practicas = $h_practicas;
        }

        public function getTipo(){
            return $this->tipo;
        }

        public function setTipo($tipo){
            $this->tipo = $tipo;
        }
    }