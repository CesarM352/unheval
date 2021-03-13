<?php
    class TipoContratoDocModel{
        private $codtipocontrato;
        private $nombre;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codtipocontrato = $data_consulta_bd->codtipocontrato;
            $this->nombre = $data_consulta_bd->nombre;
        }

        public function __construct2($codtipocontrato, $nombre){
            $this->codtipocontrato = $codtipocontrato;
            $this->nombre = $nombre;
        }

        public function getCodtipocontrato(){
            return $this->codtipocontrato;
        }

        public function getnombre(){
            return $this->nombre;
        }

        public function setnombre($nombre){
            $this->nombre = $nombre;
        }
    }