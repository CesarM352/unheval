<?php
    class LabConfiguracionSwModel{
        private $codigoconfiguracionsw;
        private $descripcion;
        private $valor;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigoconfiguracionsw = $data_consulta_bd->codigoconfiguracionsw;
            $this->descripcion = $data_consulta_bd->descripcion;
            $this->valor = $data_consulta_bd->valor;
        }

        public function getId(){
            return $this->codigoconfiguracionsw;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        public function getValor(){
            return $this->valor;
        }

        public function setValor($valor){
            $this->valor = $valor;
        }
    }