<?php
    class UsuariosModel{
        private $codigo;
        private $nombre;
        private $user;
        private $pass;
        private $perfil_id;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigo = $data_consulta_bd->codigo;
            $this->nombre = $data_consulta_bd->nombre;
            $this->user = $data_consulta_bd->user;
            $this->pass = $data_consulta_bd->pass;
            $this->perfil_id = $data_consulta_bd->perfil_id;
        }

        public function __construct2($codigo, $nombre, $user, $pass, $perfil_id){
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->user = $user;
            $this->pass = $pass;
            $this->perfil_id = $perfil_id;
        }

        public function getcodigo(){
            return $this->codigo;
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

        public function getPerfil_id(){
            return $this->perfil_id;
        }

        public function setPerfil_id($perfil_id){
            $this->perfil_id = $perfil_id;
        }
    }