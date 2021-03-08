<?php
    class LabEquipoModel{
        private $id;
        private $codigo;
        private $descripcion;
        private $tipo;
        private $estado;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->id = $data_consulta_bd->id;
            $this->codigo = $data_consulta_bd->codigo;
            $this->descripcion = $data_consulta_bd->descripcion;
            $this->tipo = $data_consulta_bd->tipo;
            $this->estado = $data_consulta_bd->estado;
        }

        public function getId(){
            return $this->id;
        }

        public function getCodigo(){
            return $this->codigo;
        }

        public function setCodigo($codigo){
            $this->codigo = $codigo;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        public function getTipo(){
            return $this->tipo;
        }

        public function setTipo($tipo){
            $this->tipo = $tipo;
        }

        public function getEstado(){
            return $this->estado;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }
    }