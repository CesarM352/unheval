<?php
    class LabAmbienteModel{
        private $codigooficina;
        private $nombre;
        private $aforo;
        private $piso;
        private $cantidadpc;
        private $descripcion;
        private $camaravigilancia;
        private $codtipoofi;
        private $codpabellon;
        private $idclases;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigooficina = $data_consulta_bd->codigooficina;
            $this->nombre = $data_consulta_bd->nombre;
            $this->aforo = $data_consulta_bd->aforo;
            $this->piso = $data_consulta_bd->piso;
            $this->cantidadpc = $data_consulta_bd->cantidadpc;
            $this->descripcion = $data_consulta_bd->descripcion;
            $this->camaravigilancia = $data_consulta_bd->camaravigilancia;
            $this->codtipoofi = $data_consulta_bd->codtipoofi;
            $this->codpabellon = $data_consulta_bd->codpabellon;
        }

        /*public function __construct2($id, $tipo, $nombre, $url, $estado, $proceso_id){
            $this->id = $id;
            $this->tipo = $tipo;
            $this->nombre = $nombre;
            $this->url = $url;
            $this->estado = $estado;
            $this->proceso_id = $proceso_id;
        }*/

        public function getId(){
            return $this->codigooficina;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getAforo(){
            return $this->aforo;
        }

        public function setAforo($aforo){
            $this->aforo = $aforo;
        }

        public function getPiso(){
            return $this->piso;
        }

        public function setPiso($piso){
            $this->piso = $piso;
        }

        public function getCantidadPc(){
            return $this->cantidadpc;
        }

        public function setCantidadPc($cantidadpc){
            $this->cantidadpc = $cantidadpc;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        public function getCamaraVigilancia(){
            return $this->camaravigilancia;
        }

        public function setCamaraVigilancia($camaravigilancia){
            $this->camaravigilancia = $camaravigilancia;
        }
		
		public function getTipoAmbienteId(){
            return $this->codtipoofi;
        }

        public function setCodTipoOfi($codtipoofi){
            $this->codtipoofi = $codtipoofi;
        }

        public function getCodPabellon(){
            return $this->codpabellon;
        }

        public function setCodPabellon($codpabellon){
            $this->codpabellon = $codpabellon;
        }

        public function getIdClases(){
            return $this->idclases;
        }

        public function setIdClases($idclases){
            $this->idclases = $idclases;
        }
        
    }