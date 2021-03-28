<?php
    class LabTipoEquipoModel{
        private $codtipoequipo;
        private $tiempoobsolecencia;
        private $nombre;
        private $codigopatrimonialinicial;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codtipoequipo = $data_consulta_bd->codtipoequipo;
            $this->tiempoobsolecencia = $data_consulta_bd->tiempoobsolecencia;
            $this->nombre = $data_consulta_bd->nombre;
            $this->codigopatrimonialinicial = $data_consulta_bd->codigopatrimonialinicial;
        }

        public function getId(){
            return $this->codtipoequipo;
        }

        public function getTiempoObsolecencia(){
            return $this->tiempoobsolecencia;
        }

        public function setTiempoObsolecencia($tiempoobsolecencia){
            $this->tiempoobsolecencia = $tiempoobsolecencia;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getCodigoPatrimonialInicial(){
            return $this->codigopatrimonialinicial;
        }

        public function setCodigoPatrimonialInicial($codigopatrimonialinicial){
            $this->codigopatrimonialinicial = $codigopatrimonialinicial;
        }
    }