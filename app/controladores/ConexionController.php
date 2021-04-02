<?php
    //require '../../modelos/ConexionModel.php';
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

    class ConexionController{

        public static function crearConexion($host, $base_datos, $usuario, $clave, $sgbd){
            $conexion = new ConexionModel($host, $base_datos, $usuario, $clave);

            if( $sgbd == "mysql" )
                return ["var_conexion" => self::conectarMysql($conexion),
                        "sgbd" => $sgbd];
        }

        public static function conectarMysql( $conexion ){
            return new mysqli( $conexion->getHost(), $conexion->getUsuario(), $conexion->getClave(), $conexion->getBaseDatos() );
        }

        public static function consultar($conexion_bd, $query){
            if( !is_null( $conexion_bd["var_conexion"] ) )
                return $conexion_bd["var_conexion"]->query($query);

            return null;
        }

        public static function consultarCantidad($conexion_bd, $result){
            if( $conexion_bd["sgbd"] == "mysql" )
                return $result->num_rows;
        }

        public static function guardar(&$conexion_bd, $tabla, $datos){
            $cad_campos_insertar = "";
            $cad_valores_insertar = "";
            foreach ($datos as $key => $value) {
                $cad_campos_insertar.= $key.',';
                $cad_valores_insertar.= "'".$value."',";
            }

            $cad_campos_insertar = substr($cad_campos_insertar, 0, -1);
            $cad_valores_insertar = substr($cad_valores_insertar, 0, -1);

            $sql_insertar = "INSERT INTO $tabla ($cad_campos_insertar) VALUES($cad_valores_insertar)"; //echo $sql_insertar;
            return self::consultar($conexion_bd, $sql_insertar);
        }

        public static function actualizar($conexion_bd, $tabla, $id, $datos, $nombre_pk_alternativo=''){
            $cad_actualizar = "";
            foreach ($datos as $key => $value) {
                $cad_actualizar.= $key." = '$value',";
            }

            $cad_actualizar = substr($cad_actualizar, 0, -1);

            if( $nombre_pk_alternativo=='' )
                $sql_actualizar = "UPDATE $tabla SET $cad_actualizar WHERE id=$id";
            else
                $sql_actualizar = "UPDATE $tabla SET $cad_actualizar WHERE $nombre_pk_alternativo=$id";
            return self::consultar($conexion_bd, $sql_actualizar);
        }

        public static function eliminar($conexion_bd, $tabla, $id){
            $sql_eliminar = "DELETE FROM $tabla WHERE id=$id";
            return self::consultar($conexion_bd, $sql_eliminar);
        }

        //--------------------------------------------------------------------------------------------
        public static function actualizarCurso($conexion_bd, $tabla, $id, $datos){
            $cad_actualizar = "";
            foreach ($datos as $key => $value) {
                $cad_actualizar.= $key." = '$value',";
            }

            $cad_actualizar = substr($cad_actualizar, 0, -1);

            $sql_actualizar = "UPDATE $tabla SET $cad_actualizar WHERE codigocurso=$id";
            return self::consultar($conexion_bd, $sql_actualizar);
        }

        public static function eliminarCurso($conexion_bd, $tabla, $id){
            $sql_eliminar = "DELETE FROM $tabla WHERE codigocurso=$id";
            return self::consultar($conexion_bd, $sql_eliminar);
        }

        //----------------------------------------------------------------------------------------------
        public static function actualizarGrupo($conexion_bd, $tabla, $id, $datos){
            $cad_actualizar = "";
            foreach ($datos as $key => $value) {
                $cad_actualizar.= $key." = '$value',";
            }

            $cad_actualizar = substr($cad_actualizar, 0, -1);

            $sql_actualizar = "UPDATE $tabla SET $cad_actualizar WHERE codigogrupo=$id";
            return self::consultar($conexion_bd, $sql_actualizar);
        }

        public static function eliminarGrupo($conexion_bd, $tabla, $id){
            $sql_eliminar = "DELETE FROM $tabla WHERE codigogrupo=$id";
            return self::consultar($conexion_bd, $sql_eliminar);
        }

        //----------------------------------------------------------------------------------------------
        public static function actualizarDocentes($conexion_bd, $tabla, $id, $datos){
            $cad_actualizar = "";
            foreach ($datos as $key => $value) {
                $cad_actualizar.= $key." = '$value',";
            }

            $cad_actualizar = substr($cad_actualizar, 0, -1);

            $sql_actualizar = "UPDATE $tabla SET $cad_actualizar WHERE codigodocente=$id";
            return self::consultar($conexion_bd, $sql_actualizar);
        }

        public static function eliminarDocentes($conexion_bd, $tabla, $id){
            $sql_eliminar = "DELETE FROM $tabla WHERE codigodocente=$id";
            return self::consultar($conexion_bd, $sql_eliminar);
        }

        //----------------------------------------------------------------------------------------------
        public static function actualizarTecnicos($conexion_bd, $tabla, $id, $datos){
            $cad_actualizar = "";
            foreach ($datos as $key => $value) {
                $cad_actualizar.= $key." = '$value',";
            }

            $cad_actualizar = substr($cad_actualizar, 0, -1);

            $sql_actualizar = "UPDATE $tabla SET $cad_actualizar WHERE numerocontrato=$id";
            return self::consultar($conexion_bd, $sql_actualizar);
        }

        public static function eliminarTecnicos($conexion_bd, $tabla, $id){
            $sql_eliminar = "DELETE FROM $tabla WHERE numerocontrato=$id";
            return self::consultar($conexion_bd, $sql_eliminar);
        }

        //----------------------------------------------------------------------------------------------
        public static function actualizarEstudiantes($conexion_bd, $tabla, $id, $datos){
            $cad_actualizar = "";
            foreach ($datos as $key => $value) {
                $cad_actualizar.= $key." = '$value',";
            }

            $cad_actualizar = substr($cad_actualizar, 0, -1);

            $sql_actualizar = "UPDATE $tabla SET $cad_actualizar WHERE codigoestudiante=$id";
            return self::consultar($conexion_bd, $sql_actualizar);
        }

        public static function eliminarEstudiantes($conexion_bd, $tabla, $id){
            $sql_eliminar = "DELETE FROM $tabla WHERE codigoestudiante=$id";
            return self::consultar($conexion_bd, $sql_eliminar);
        }
    }