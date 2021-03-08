<?php
    class ConexionModel{
        private $host;
        private $base_datos;
        private $usuario;
        private $clave;

        public function __construct($host, $base_datos, $usuario, $clave){
            $this->host = $host;
            $this->base_datos = $base_datos;
            $this->usuario = $usuario;
            $this->clave = $clave;
        }

        public function getHost(){
            return $this->host;
        }

        public function getBaseDatos(){
            return $this->base_datos;
        }

        public function getUsuario(){
            return $this->usuario;
        }

        public function getClave(){
            return $this->clave;
        }

        public function setHost($host){
            $this->host = $host;
        }

        public function setBaseDatos($base_datos){
            $this->base_datos = $base_datos;
        }

        public function setUsuario($usuario){
            $this->usuario = $usuario;
        }

        public function setClave($clave){
            $this->clave = $clave;
        }
    }