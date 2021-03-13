<?php
    class LabLaboratorioEquipoModel{
        private $codigolaboratorioequipo;
        private $codigooficina;
        private $fechaingreso;
        private $estadopresente;
        private $codigopatrimonio;
        private $justificacionretiro;
        private $fecharetiro;
        private $oficinaorigen;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->codigolaboratorioequipo = $data_consulta_bd->codigolaboratorioequipo;
            $this->codigooficina = $data_consulta_bd->codigooficina;
            $this->fechaingreso = $data_consulta_bd->fechaingreso;
            $this->estadopresente = $data_consulta_bd->estadopresente;
            $this->codigopatrimonio = $data_consulta_bd->codigopatrimonio;
            $this->justificacionretiro = $data_consulta_bd->justificacionretiro;
            $this->fecharetiro = $data_consulta_bd->fecharetiro;
            $this->oficinaorigen = $data_consulta_bd->oficinaorigen;
        }

        public function getId(){
            return $this->codigolaboratorioequipo;
        }

        public function getCodigoOficina(){
            return $this->codigooficina;
        }

        public function setCodigoOficina($codigooficina){
            $this->codigooficina = $codigooficina;
        }

        public function getFechaIngreso(){
            return $this->fechaingreso;
        }

        public function setFechaIngreso($fechaingreso){
            $this->fechaingreso = $fechaingreso;
        }

        public function getEstadoPresente(){
            return $this->estadopresente;
        }

        public function setEstadoPresente($estadopresente){
            $this->estadopresente = $estadopresente;
        }

        public function getCodigoPatrimonio(){
            return $this->codigopatrimonio;
        }

        public function setCodigoPatrimonio($codigopatrimonio){
            $this->codigopatrimonio = $codigopatrimonio;
        }

        public function getJustificacionRetiro(){
            return $this->justificacionretiro;
        }

        public function setJustificacionRetiro($justificacionretiro){
            $this->justificacionretiro = $justificacionretiro;
        }

        public function getFechaRetiro(){
            return $this->fecharetiro;
        }

        public function setFechaRetiro($fecharetiro){
            $this->fecharetiro = $fecharetiro;
        }

        public function getOficinaOrigen(){
            return $this->oficinaorigen;
        }

        public function setOficinaOrigen($oficinaorigen){
            $this->oficinaorigen = $oficinaorigen;
        }
    }