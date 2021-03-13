<?php
    class TecnicosModel{
        private $numerocontrato;
        private $nombre;
        private $user;
        private $pass;
        private $anionacimiento;
        private $celular;
        private $fechainicio;
        private $dni;
        private $fechacaduca;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->numerocontrato = $data_consulta_bd->numerocontrato;
            $this->nombre = $data_consulta_bd->nombre;
            $this->user = $data_consulta_bd->user;
            $this->pass = $data_consulta_bd->pass;
            $this->anionacimiento = $data_consulta_bd->anionacimiento;
            $this->celular = $data_consulta_bd->celular;
            $this->fechainicio = $data_consulta_bd->fechainicio;
            $this->dni = $data_consulta_bd->dni;
            $this->fechacaduca = $data_consulta_bd->fechacaduca;
        }

        public function __construct2($numerocontrato, $nombre, $user, $pass, $anionacimiento, $celular, $fechainicio, $dni, $fechacaduca){
            $this->numerocontrato = $numerocontrato;
            $this->nombre = $nombre;
            $this->user = $user;
            $this->pass = $pass;
            $this->anionacimiento = $anionacimiento;
            $this->celular = $celular;
            $this->fechainicio = $fechainicio;
            $this->dni = $dni;
            $this->fechacaduca = $fechacaduca;
        }

        public function getNumerocontrato(){
            return $this->numerocontrato;
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

        public function getCelular(){
            return $this->celular;
        }

        public function setCelular($celular){
            $this->celular = $celular;
        }

        public function getFechainicio(){
            return $this->fechainicio;
        }

        public function setFechainicio($fechainicio){
            $this->fechainicio = $fechainicio;
        }

        public function getDni(){
            return $this->dni;
        }

        public function setDni($dni){
            $this->dni = $dni;
        }

        public function getFechacaduca(){
            return $this->fechacaduca;
        }

        public function setFechacaduca($fechacaduca){
            $this->fechacaduca = $fechacaduca;
        }
    }