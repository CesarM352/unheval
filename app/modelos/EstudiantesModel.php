<?php
    class EstudiantesModel{
        private $codigoestudiante;
        private $nombre;
        private $user;
        private $pass;
        private $anionacimiento;
        private $fechaingreso;
        private $dni;
        private $celular;
        private $email;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigoestudiante = $data_consulta_bd->codigoestudiante;
            $this->nombre = $data_consulta_bd->nombre;
            $this->user = $data_consulta_bd->user;
            $this->pass = $data_consulta_bd->pass;
            $this->anionacimiento = $data_consulta_bd->anionacimiento;
            $this->fechaingreso = $data_consulta_bd->fechaingreso;
            $this->dni = $data_consulta_bd->dni;
            $this->celular = $data_consulta_bd->celular;
            $this->email = $data_consulta_bd->email;
        }

        public function __construct2($codigoestudiante, $nombre, $user, $pass, $anionacimiento, $fechaingreso, $dni, $celular, $email){
            $this->codigoestudiante = $codigoestudiante;
            $this->nombre = $nombre;
            $this->user = $user;
            $this->pass = $pass;
            $this->anionacimiento = $anionacimiento;
            $this->fechaingreso = $fechaingreso;
            $this->dni = $dni;
            $this->celular = $celular;
            $this->email = $email;
        }

        public function getCodigoestudiante(){
            return $this->codigoestudiante;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
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

        public function getAnionacimiento(){
            return $this->anionacimiento;
        }

        public function setAnionacimiento($anionacimiento){
            $this->anionacimiento = $anionacimiento;
        }

        public function getFechaingreso(){
            return $this->fechaingreso;
        }

        public function setFechaingreso($fechaingreso){
            $this->fechaingreso = $fechaingreso;
        }

        public function getDni(){
            return $this->dni;
        }

        public function setDni($dni){
            $this->dni = $dni;
        }

        public function getCelular(){
            return $this->celular;
        }

        public function setCelular($celular){
            $this->celular = $celular;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setEmail($email){
            $this->email = $email;
        }
    }