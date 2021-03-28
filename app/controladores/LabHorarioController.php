<?php
    require '../../modelos/LabHorarioModel.php';

    class LabHorarioController{
        private $tabla = "horarios";

        public function getAllHorarios($conexion, $codigooficina=0){
            if($codigooficina==0)
                $sql_documento = "SELECT * FROM $this->tabla";
            else
                $sql_documento = "SELECT * FROM $this->tabla WHERE codigooficina=$codigooficina";

            return ConexionController::consultar($conexion, $sql_documento);
        }

        public function guardar($conexion, $datos){
            //$area_unidad_mdl = new TransaparenciaAvanceModel(null,$datos['denominacion']);
            return ConexionController::guardar($conexion, $this->tabla, $datos);
        }

        public function getDocumento($conexion, $id){
            $sql_documento = "SELECT * FROM $this->tabla WHERE id=$id";
            $documento_mdl = new LabAmbienteModel( ConexionController::consultar($conexion, $sql_documento)->fetch_object() );

            return $documento_mdl;
        }

        public function actualizar($conexion, $id, $datos){
            //$area_unidad_mdl = new AreaUnidadModel(null,$datos['denominacion']);
            return ConexionController::actualizar($conexion, $this->tabla, $id, $datos);
        }

        public function eliminar($conexion, $id){
            return ConexionController::eliminar($conexion, $this->tabla, $id);
        }
		
		public function verHorarioPorAmbiente($conexion, $codigooficina){
            $horarios_semana = [];
			$dias_semana = ["LUNES", "MARTES", "MIÉRCOLES", "JUEVES", "VIERNES", "SÁBADO", "DOMINGO"];
			$cantidad_filas_maxima = 0;
			
			foreach($dias_semana as $key => $dia){
				$cantidad_filas_dia = 0;
				//$sql_horario = "SELECT * FROM $this->tabla WHERE codigooficina=$codigooficina AND nro_dia = ".($key + 1)."  ORDER BY hora_inicio ASC";
				$sql_horario = "SELECT * FROM $this->tabla 
								WHERE codigooficina=$codigooficina 
								AND nro_dia = ".($key + 1)." AND ( ((fecha is NULL || fecha = '') AND tipo_horario=1) || (fecha BETWEEN date_format(date_sub(now(), INTERVAL (WEEKDAY(now()) - 2) DAY),'%Y-%m-%d') 
								AND date_format(date_add(now(), INTERVAL (8 - WEEKDAY(now()) )  DAY),'%y-%m-%d')  AND tipo_horario=2  ) ) 
								ORDER BY hora_inicio ASC";
				$dias_bd = ConexionController::consultar($conexion, $sql_horario);
				
				foreach( $dias_bd as $s_key => $dia_bd ){
					$cantidad_filas_dia++;
					$var_tipo_horario = "";
					if( $dia_bd["tipo_horario"] == 2 )
						$var_tipo_horario = "PRÉSTAMO <BR> Fecha: ".$dia_bd["fecha"];

					$horarios_semana[$key + 1][$s_key] = $dia_bd["hora_inicio"]." - ".$dia_bd["hora_fin"]."<br>".$dia_bd["curso"]."<br>".$dia_bd["docente"]."<br>".$var_tipo_horario;
				}
				
				if($cantidad_filas_dia > $cantidad_filas_maxima)
					$cantidad_filas_maxima = $cantidad_filas_dia;
			}
			
			echo "<table  class='table table-bordered table-hover'><tr>";
			foreach($dias_semana as $key => $dia){
				echo "<td>".$dia."</td>";
			}
			echo "</tr>";
			
			for( $j=0; $j<$cantidad_filas_maxima; $j++ ){
				echo "<tr>";
				for($i=1; $i<=7; $i++){
					if (isset( $horarios_semana[$i][$j] ))
						echo "<td>".$horarios_semana[$i][$j]."</td>";
					else
						echo "<td style='background-color:#b9c6d2'></td>";
				}
				echo "</tr>";
			}
			echo "</table>";
        }

		public function calcularNuevoCodigo($conexion){
            $sql_documento = "SELECT IFNULL(MAX(CAST( codigohorario AS INT )),0)+1 AS codigo_siguiente FROM $this->tabla";
            $fila = ConexionController::consultar($conexion, $sql_documento)->fetch_object();
            return $fila->codigo_siguiente;
        }
    }