<?php
    class LabInventarioModel{
        private $id;
        private $equipo_id;
        private $ambiente_id;
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
            $this->equipo_id = $data_consulta_bd->equipo_id;
            $this->ambiente_id = $data_consulta_bd->ambiente_id;;
            $this->estado = $data_consulta_bd->estado;
        }

        public function getId(){
            return $this->id;
        }

        public function getEquipoId(){
            return $this->equipo_id;
        }

        public function setEquipoId($equipo_id){
            $this->equipo_id = $equipo_id;
        }
		
		public function getAmbienteId(){
            return $this->ambiente_id;
        }

        public function setAmbienteId($ambiente_id){
            $this->ambiente_id = $ambiente_id;
        }
				
		public function getEstado(){
            return $this->estado;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }
    }