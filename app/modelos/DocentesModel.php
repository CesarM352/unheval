<?php
    class DocentesModel{
        private $codigodocente;
        private $celular;
        private $dni;
        private $codigodireccion;
        private $nombre;
        private $codtipocontrato;
        private $user;
        private $pass;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigodocente = $data_consulta_bd->codigodocente;
            $this->celular = $data_consulta_bd->celular;
            $this->dni = $data_consulta_bd->dni;
            $this->codigodireccion = $data_consulta_bd->codigodireccion;
            $this->nombre = $data_consulta_bd->nombre;
            $this->codtipocontrato = $data_consulta_bd->codtipocontrato;
            $this->user = $data_consulta_bd->user;
            $this->pass = $data_consulta_bd->pass;
        }

        public function __construct2($codigodocente, $celular, $dni, $codigodireccion, $nombre, $codtipocontrato, $user, $pass){
            $this->codigodocente = $codigodocente;
            $this->celular = $celular;
            $this->dni = $dni;
            $this->codigodireccion = $codigodireccion;
            $this->nombre = $nombre;
            $this->codtipocontrato = $codtipocontrato;
            $this->user = $user;
            $this->pass = $pass;
        }

        public function getCodigodocente(){
            return $this->codigodocente;
        }

        public function getCelular(){
            return $this->celular;
        }

        public function setCelular($celular){
            $this->celular = $celular;
        }

        public function getDni(){
            return $this->dni;
        }

        public function setDni($dni){
            $this->dni = $dni;
        }

        public function getCodigodireccion(){
            return $this->codigodireccion;
        }

        public function setCodigodireccion($codigodireccion){
            $this->codigodireccion = $codigodireccion;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
        }

        public function getCodtipocontrato(){
            return $this->codtipocontrato;
        }

        public function setCodtipocontrato($codtipocontrato){
            $this->codtipocontrato = $codtipocontrato;
        }

        public function getUser(){
            return $this->user;
        }

        public function setUser($user){
            $this->user = $user;
        }

        public function getPass(){
            return $this->pass;
        }

        public function setPass($pass){
            $this->pass = $pass;
        }
    }