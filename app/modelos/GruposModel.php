<?php
    class GruposModel{
        private $codigogrupo;
        private $nombre;
        private $numeroalumnos;
        private $maximoalumnos;
        private $codigodocente;
        private $codigocurso;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigogrupo = $data_consulta_bd->codigogrupo;
            $this->nombre = $data_consulta_bd->nombre;
            $this->numeroalumnos = $data_consulta_bd->numeroalumnos;
            $this->maximoalumnos = $data_consulta_bd->maximoalumnos;
            $this->codigodocente = $data_consulta_bd->codigodocente;
            $this->codigocurso = $data_consulta_bd->codigocurso;
        }

        public function __construct2($codigogrupo, $nombre, $numeroalumnos, $maximoalumnos, $codigodocente, $codigocurso){
            $this->codigogrupo = $codigogrupo;
            $this->nombre = $nombre;
            $this->numeroalumnos = $numeroalumnos;
            $this->maximoalumnos = $maximoalumnos;
            $this->codigodocente = $codigodocente;
            $this->codigocurso = $codigocurso;
        }

        public function getCodigogrupo(){
            return $this->codigogrupo;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getNumeroalumnos(){
            return $this->numeroalumnos;
        }

        public function setNumeroalumnos($numeroalumnos){
            $this->numeroalumnos = $numeroalumnos;
        }

        public function getMaximoalumnos(){
            return $this->maximoalumnos;
        }

        public function setMaximoalumnos($maximoalumnos){
            $this->maximoalumnos = $maximoalumnos;
        }

        public function getCodigodocente(){
            return $this->codigodocente;
        }

        public function setCodigodocente($codigodocente){
            $this->codigodocente = $codigodocente;
        }

        public function getCodigocurso(){
            return $this->codigocurso;
        }

        public function setCodigocurso($codigocurso){
            $this->codigocurso = $codigocurso;
        }
    }