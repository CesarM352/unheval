<?php
    class LabCargoModel{
        private $idcargos;
        private $idusuarioresponsable;
        private $nombre;
        private $fechahoraprestamo;
        private $estadoinicial;
        private $idusuarioquesepresta;
        private $idtipo_caso;
        private $fechahoraretorno;
        private $estadodevolucion;
        private $detalles;
        private $estadosolicitud;
        private $fechahorasolicitud;
        private $documento;

        function __construct(){
            $a = func_get_args();
            $i = func_num_args();
            if (method_exists($this,$f='__construct'.$i)) {
                call_user_func_array(array($this,$f),$a);
            }
        }

        public function __construct1($data_consulta_bd){
            $this->idcargos = $data_consulta_bd->idcargos;
            $this->idusuarioresponsable = $data_consulta_bd->idusuarioresponsable;
            $this->nombre = $data_consulta_bd->nombre;
            $this->fechahoraprestamo = $data_consulta_bd->fechahoraprestamo;
            $this->estadoinicial = $data_consulta_bd->estadoinicial;
            $this->idusuarioquesepresta = $data_consulta_bd->idusuarioquesepresta;
            $this->idtipo_caso = $data_consulta_bd->idtipo_caso;
            $this->fechahoraretorno = $data_consulta_bd->fechahoraretorno;
            $this->estadodevolucion = $data_consulta_bd->estadodevolucion;
            $this->detalles = $data_consulta_bd->detalles;
            $this->estadosolicitud = $data_consulta_bd->estadosolicitud;
            $this->fechahorasolicitud = $data_consulta_bd->fechahorasolicitud;
            $this->documento = $data_consulta_bd->documento;
        }

        public function getId(){
            return $this->idcargos;
        }

        public function getIdUsuarioResponsable(){
            return $this->idusuarioresponsable;
        }

        public function setIdUsuarioResponsable($idusuarioresponsable){
            $this->idusuarioresponsable = $idusuarioresponsable;
        }

        public function getnombre(){
            return $this->nombre;
        }

        public function setnombre($nombre){
            $this->nombre = $nombre;
        }

        public function getFechaHoraPrestamo(){
            return $this->fechahoraprestamo;
        }

        public function setFechaHoraPrestamo($fechahoraprestamo){
            $this->fechahoraprestamo = $fechahoraprestamo;
        }

        public function getEstadoInicial(){
            return $this->estadoinicial;
        }

        public function setEstadoInicial($estadoinicial){
            $this->estadoinicial = $estadoinicial;
        }

        public function getIdUsuarioQueSePresta(){
            return $this->idusuarioquesepresta;
        }

        public function setIdUsuarioQueSePresta($idusuarioquesepresta){
            $this->idusuarioquesepresta = $idusuarioquesepresta;
        }

        public function getIdTipoCaso(){
            return $this->idtipo_caso;
        }

        public function setIdTipoCaso($idtipo_caso){
            $this->idtipo_caso = $idtipo_caso;
        }

        public function getFechaHoraRetorno(){
            return $this->fechahoraretorno;
        }

        public function setFechaHoraRetorno($fechahoraretorno){
            $this->fechahoraretorno = $fechahoraretorno;
        }

        public function getEstadoDevolucion(){
            return $this->estadodevolucion;
        }

        public function setEstadoDevolucion($estadodevolucion){
            $this->estadodevolucion = $estadodevolucion;
        }

        public function getDetalles(){
            return $this->detalles;
        }

        public function setDetalles($detalles){
            $this->detalles = $detalles;
        }

        public function getEstadoSolicitud(){
            return $this->estadosolicitud;
        }

        public function setEstadoSolicitud($estadosolicitud){
            $this->estadosolicitud = $estadosolicitud;
        }

        public function getFechaHoraSolicitud(){
            return $this->fechahorasolicitud;
        }

        public function setFechaHoraSolicitud($fechahorasolicitud){
            $this->fechahorasolicitud = $fechahorasolicitud;
        }

        public function getdocumento(){
            return $this->documento;
        }

        public function setdocumento($fechahorasolicitud){
            $this->documento = $documento;
        }
    }