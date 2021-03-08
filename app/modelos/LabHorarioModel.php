<?php
    class LabHorarioModel{
        private $codigohorario;
        private $fechainicio;
        private $fechafinal;
        private $codigodocente;
        private $codigogrupo;
        private $codigocurso;
        private $codigooficina;
        private $semestre;
        private $nro_dia;
        private $hora_inicio;
        private $hora_fin;
        private $curso;
        private $docente;
        private $tipo_horario;
        private $fecha;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigohorario = $data_consulta_bd->codigohorario;
            $this->semestre = $data_consulta_bd->semestre;
            $this->nro_dia = $data_consulta_bd->nro_dia;
            $this->hora_inicio = $data_consulta_bd->hora_inicio;
            $this->hora_fin = $data_consulta_bd->hora_fin;
            $this->curso = $data_consulta_bd->curso;
            $this->docente = $data_consulta_bd->docente;
            $this->tipo_horario = $data_consulta_bd->tipo_horario;
            $this->fecha = $data_consulta_bd->fecha;
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
            return $this->codigohorario;
        }

        public function getSemestre(){
            return $this->semestre;
        }

        public function setSemestre($semestre){
            $this->semestre = $semestre;
        }
		
		public function getAmbienteId(){
            return $this->ambiente_id;
        }

        public function setAmbienteId($ambiente_id){
            $this->ambiente_id = $ambiente_id;
        }
		
		public function getNroDia(){
            return $this->nro_dia;
        }

        public function setNroDia($nro_dia){
            $this->nro_dia = $nro_dia;
        }
		
		public function getHoraInicio(){
            return $this->hora_inicio;
        }

        public function setHoraInicio($hora_inicio){
            $this->hora_inicio = $hora_inicio;
        }
		
		public function getHoraFin(){
            return $this->hora_fin;
        }

        public function setHoraFin($hora_fin){
            $this->hora_fin = $hora_fin;
        }
		
		public function getCurso(){
            return $this->curso;
        }

        public function setCurso($curso){
            $this->curso = $curso;
        }
		
		public function getDocente(){
            return $this->docente;
        }

        public function setDocente($docente){
            $this->docente = $docente;
        }
		
		public function getTipoHorario(){
            return $this->tipo_horario;
        }

        public function setTipoHorario($tipo_horario){
            $this->tipo_horario = $tipo_horario;
        }
		
		public function getFecha(){
            return $this->fecha;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
        }
        
    }