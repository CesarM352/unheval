<?php
    class LabTipoIngresoModel{
        private $codtipoingreso;
        private $nombre;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codtipoingreso = $data_consulta_bd->codtipoingreso;
            $this->nombre = $data_consulta_bd->nombre;
        }

        public function getId(){
            return $this->codtipoingreso;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }
    }