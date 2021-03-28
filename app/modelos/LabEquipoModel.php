<?php
    class LabEquipoModel{
        private $codigopatrimonio;
        private $nombre;
        private $descripcion;
        private $ram;
        private $procesador;
        private $hdd;
        private $ssd;
        private $fechaingreso;
        private $tarjetavideo;
        private $rfid;
        private $estadoperativo;
        private $fechacaduca;
        private $codtipoingreso;
        private $codtipoequipo;
        private $codigoestado;
        private $color;
        private $modelo;
        private $serie;
        private $fechabaja;
        private $documentobaja;
        private $resolucion;
        private $conectividad;
        private $tipoestabilizador;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigopatrimonio = $data_consulta_bd->codigopatrimonio;
            $this->nombre = $data_consulta_bd->nombre;
            $this->descripcion = $data_consulta_bd->descripcion;
            $this->ram = $data_consulta_bd->ram;
            $this->procesador = $data_consulta_bd->procesador;
            $this->hdd = $data_consulta_bd->hdd;
            $this->ssd = $data_consulta_bd->ssd;
            $this->fechaingreso = $data_consulta_bd->fechaingreso;
            $this->tarjetavideo = $data_consulta_bd->tarjetavideo;
            $this->rfid = $data_consulta_bd->rfid;
            $this->estadoperativo = $data_consulta_bd->estadoperativo;
            $this->fechacaduca = $data_consulta_bd->fechacaduca;
            $this->codtipoingreso = $data_consulta_bd->codtipoingreso;
            $this->codtipoequipo = $data_consulta_bd->codtipoequipo;
            $this->codigoestado = $data_consulta_bd->codigoestado;
            $this->color = $data_consulta_bd->color;
            $this->modelo = $data_consulta_bd->modelo;
            $this->serie = $data_consulta_bd->serie;
            $this->fechabaja = $data_consulta_bd->fechabaja;
            $this->documentobaja = $data_consulta_bd->documentobaja;
            $this->resolucion = $data_consulta_bd->resolucion;
            $this->conectividad = $data_consulta_bd->conectividad;
            $this->tipoestabilizador = $data_consulta_bd->tipoestabilizador;
        }

        public function getId(){
            return $this->codigopatrimonio;
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

        public function getRam(){
            return $this->ram;
        }

        public function setRam($ram){
            $this->ram = $ram;
        }

        public function getProcesador(){
            return $this->procesador;
        }

        public function setProcesador($procesador){
            $this->procesador = $procesador;
        }

        public function getHdd(){
            return $this->hdd;
        }

        public function setHdd($hdd){
            $this->hdd = $hdd;
        }

        public function getSdd(){
            return $this->ssd;
        }

        public function setSdd($ssd){
            $this->ssd = $ssd;
        }

        public function getFechaingreso(){
            return $this->fechaingreso;
        }

        public function setFechaingreso($fechaingreso){
            $this->fechaingreso = $fechaingreso;
        }

        public function getTarjetaVideo(){
            return $this->tarjetavideo;
        }

        public function setTarjetaVideo($tarjetavideo){
            $this->tarjetavideo = $tarjetavideo;
        }

        public function getRfid(){
            return $this->rfid;
        }

        public function setRfid($rfid){
            $this->rfid = $rfid;
        }

        public function getEstadOperativo(){
            return $this->estadoperativo;
        }

        public function setEstadOperativo($estadoperativo){
            $this->estadoperativo = $estadoperativo;
        }

        public function getFechaCaduca(){
            return $this->fechacaduca;
        }

        public function setFechaCaduca($fechacaduca){
            $this->fechacaduca = $fechacaduca;
        }

        public function getCodTipoIngreso(){
            return $this->codtipoingreso;
        }

        public function setCodTipoIngreso($codtipoingreso){
            $this->codtipoingreso = $codtipoingreso;
        }

        public function getCodTipoEquipo(){
            return $this->codtipoequipo;
        }

        public function setCodTipoEquipo($codtipoequipo){
            $this->codtipoequipo = $codtipoequipo;
        }

        public function getCodigoEstado(){
            return $this->codigoestado;
        }

        public function setCodigoEstado($codigoestado){
            $this->codigoestado = $codigoestado;
        }

        public function getColor(){
            return $this->color;
        }

        public function setColor($color){
            $this->color = $color;
        }

        public function getModelo(){
            return $this->modelo;
        }

        public function setModelo($modelo){
            $this->modelo = $modelo;
        }

        public function getSerie(){
            return $this->serie;
        }

        public function setSerie($serie){
            $this->serie = $serie;
        }

        public function getFechaBaja(){
            return $this->fechabaja;
        }

        public function setFechaBaja($fechabaja){
            $this->fechabaja = $fechabaja;
        }

        public function getDocumentoBaja(){
            return $this->documentobaja;
        }

        public function setDocumentoBaja($documentobaja){
            $this->documentobaja = $documentobaja;
        }

        public function getResolucion(){
            return $this->resolucion;
        }

        public function setResolucion($resolucion){
            $this->resolucion = $resolucion;
        }

        public function getConectividad(){
            return $this->conectividad;
        }

        public function setConectividad($conectividad){
            $this->conectividad = $conectividad;
        }

        public function getTipoEstabilizador(){
            return $this->tipoestabilizador;
        }

        public function setTipoEstabilizador($tipoestabilizador){
            $this->tipoestabilizador = $tipoestabilizador;
        }
    }