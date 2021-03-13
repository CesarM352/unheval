<?php
    class LabSoftwareModel{
        private $codigosoftware;
        private $nombre;
        private $version;
        private $propietario;
        private $conlicencia;
        private $minimoram;
        private $minimovideo;
        private $minimoprocesador;
        private $minimohhd;
        private $detalles;
        private $tipo_sw;
        private $forma;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigosoftware = $data_consulta_bd->codigosoftware;
            $this->nombre = $data_consulta_bd->nombre;
            $this->version = $data_consulta_bd->version;
            $this->propietario = $data_consulta_bd->propietario;
            $this->conlicencia = $data_consulta_bd->conlicencia;
            $this->minimoram = $data_consulta_bd->minimoram;
            $this->minimovideo = $data_consulta_bd->minimovideo;
            $this->minimoprocesador = $data_consulta_bd->minimoprocesador;
            $this->minimohhd = $data_consulta_bd->minimohhd;
            $this->detalles = $data_consulta_bd->detalles;
            $this->tipo_sw = $data_consulta_bd->tipo_sw;
            $this->forma = $data_consulta_bd->forma;
        }

        public function getId(){
            return $this->codigosoftware;
        }

        public function getnombre(){
            return $this->nombre;
        }

        public function setnombre($nombre){
            $this->nombre = $nombre;
        }

        public function getVersion(){
            return $this->version;
        }

        public function setVersion($version){
            $this->version = $version;
        }

        public function getPropietario(){
            return $this->propietario;
        }

        public function setPropietario($propietario){
            $this->propietario = $propietario;
        }

        public function getConLicencia(){
            return $this->conlicencia;
        }

        public function setConLicencia($conlicencia){
            $this->conlicencia = $conlicencia;
        }

        public function getMinimoRam(){
            return $this->minimoram;
        }

        public function setMinimoRam($minimoram){
            $this->minimoram = $minimoram;
        }

        public function getMinimoVideo(){
            return $this->minimovideo;
        }

        public function setMinimoVideo($minimovideo){
            $this->minimovideo = $minimovideo;
        }

        public function getMinimoProcesador(){
            return $this->minimoprocesador;
        }

        public function setMinimoProcesador($minimoprocesador){
            $this->minimoprocesador = $minimoprocesador;
        }

        public function getMinimoHhd(){
            return $this->minimohhd;
        }

        public function setMinimoHhd($minimohhd){
            $this->minimohhd = $minimohhd;
        }

        public function getDetalles(){
            return $this->detalles;
        }

        public function setDetalles($detalles){
            $this->detalles = $detalles;
        }

        public function geTtipoSw(){
            return $this->tipo_sw;
        }

        public function seTtipoSw($tipo_sw){
            $this->tipo_sw = $tipo_sw;
        }

        public function getForma(){
            return $this->forma;
        }

        public function setForma($forma){
            $this->forma = $forma;
        }
        
    }