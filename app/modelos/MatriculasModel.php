<?php
    class MatriculasModel{
        private $codigomatricula;
        private $codigocurso;
        private $codigoestudiante;
        private $codigogrupo;
        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigomatricula = $data_consulta_bd->codigomatricula;
            $this->codigocurso = $data_consulta_bd->codigocurso;
            $this->codigoestudiante = $data_consulta_bd->codigoestudiante;
            $this->codigogrupo = $data_consulta_bd->codigogrupo;
        }

        public function __construct2($codigomatricula, $codigocurso, $codigoestudiante, $codigogrupo){
            $this->codigomatricula = $codigomatricula;
            $this->codigocurso = $codigocurso;
            $this->codigoestudiante = $codigoestudiante;
            $this->codigogrupo = $codigogrupo;
        }

        public function getCodigoMatricula(){
            return $this->codigomatricula;
        }

        public function getCodigoCurso(){
            return $this->codigocurso;
        }

        public function setCodigoCurso($codigocurso){
            $this->codigocurso = $codigocurso;
        }

        public function getCodigoEstudiante(){
            return $this->codigoestudiante;
        }

        public function setCodigoEstudiante($codigoestudiante){
            $this->codigoestudiante = $codigoestudiante;
        }

        public function getCodigoGrupo(){
            return $this->codigogrupo;
        }

        public function setCodigoGrupo($codigogrupo){
            $this->codigogrupo = $codigogrupo;
        }
    }