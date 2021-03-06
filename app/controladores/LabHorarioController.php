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
		
		public function verHorarioPorAmbiente($conexion, $codigooficina, $semanas_diferencias=0){
            $horarios_semana = [];
			$dias_semana = ["LUNES", "MARTES", "MIÉRCOLES", "JUEVES", "VIERNES", "SÁBADO", "DOMINGO"];
			$cantidad_filas_maxima = 0;
			
			foreach($dias_semana as $key => $dia){
				$cantidad_filas_dia = 0;
				//$sql_horario = "SELECT * FROM $this->tabla WHERE codigooficina=$codigooficina AND nro_dia = ".($key + 1)."  ORDER BY hora_inicio ASC";
				if($semanas_diferencias == 0)
				$sql_horario = "SELECT * FROM $this->tabla 
								WHERE codigooficina=$codigooficina 
								AND nro_dia = ".($key + 1)." AND ( ((fecha is NULL || fecha = '') AND tipo_horario=1) || (fecha BETWEEN date_format(date_sub(now(), INTERVAL (WEEKDAY(now()) - 2) DAY),'%Y-%m-%d') 
								AND date_format(date_add(now(), INTERVAL (8 - WEEKDAY(now()) )  DAY),'%y-%m-%d')  AND tipo_horario=2  ) ) 
								ORDER BY hora_inicio ASC";
				else
				$sql_horario = "SELECT * FROM $this->tabla 
								WHERE codigooficina=$codigooficina 
								AND nro_dia = ".($key + 1)." AND ( ((fecha is NULL || fecha = '') AND tipo_horario=1) || (fecha BETWEEN date_format(date_sub(date_add(now(), INTERVAL $semanas_diferencias WEEK), INTERVAL (WEEKDAY(date_add(now(), INTERVAL $semanas_diferencias WEEK)) - 2) DAY),'%Y-%m-%d') 
								AND date_format(date_add(date_add(now(), INTERVAL $semanas_diferencias WEEK), INTERVAL (8 - WEEKDAY(date_add(now(), INTERVAL $semanas_diferencias WEEK)) )  DAY),'%y-%m-%d')  AND tipo_horario=2  ) ) 
								ORDER BY hora_inicio ASC";
				$dias_bd = ConexionController::consultar($conexion, $sql_horario);
				
				foreach( $dias_bd as $s_key => $dia_bd ){
					$cantidad_filas_dia++;
					$var_tipo_horario = "";
					if( $dia_bd["tipo_horario"] == 2 )
						$var_tipo_horario = "PRÉSTAMO <BR> Fecha: ".$dia_bd["fecha"];

					$horarios_semana[$key + 1][$s_key] = $dia_bd["hora_inicio"]." - ".$dia_bd["hora_fin"]."<br>".utf8_encode($dia_bd["curso"])."<br>".utf8_encode($dia_bd["docente"])."<br>".$var_tipo_horario;
				}
				
				if($cantidad_filas_dia > $cantidad_filas_maxima)
					$cantidad_filas_maxima = $cantidad_filas_dia;
			}
			
			echo "<table class='table table-bordered table-hover'> <thead><tr>";
			foreach($dias_semana as $key => $dia){
				echo "<th>".$dia."</th>";
			}
			echo "</tr></thead>";
			
			for( $j=0; $j<$cantidad_filas_maxima; $j++ ){
				echo "<tbody><tr>";
				for($i=1; $i<=7; $i++){
					if (isset( $horarios_semana[$i][$j] ))
						echo "<td style='background: #E8F8F5'>".$horarios_semana[$i][$j]."</td>";
					else
						echo "<td style='background: #ECECEC'></td>";
				}
				echo "</tr></tbody>";
			}
			echo "</table>";
        }

		public function calcularNuevoCodigo($conexion){
            $sql_documento = "SELECT IFNULL(MAX(CAST( codigohorario AS INT )),0)+1 AS codigo_siguiente FROM $this->tabla";
            $fila = ConexionController::consultar($conexion, $sql_documento)->fetch_object();
            return $fila->codigo_siguiente;
        }

		public function cantidadHorarios($conexion, $tipo_horario, $nro_dia, $hora_inicio, $hora_fin, $fecha, $codigooficina){
			if( $tipo_horario == 'CLASE' ){
				$sql_documento = "SELECT COUNT(*) AS cantidad FROM $this->tabla 
									WHERE codigooficina=$codigooficina 
									AND nro_dia=$nro_dia 
									AND (
												(hora_inicio BETWEEN '$hora_inicio' AND '$hora_fin')
											OR	(hora_fin BETWEEN '$hora_inicio' AND '$hora_fin')
											OR	(hora_inicio <= '$hora_inicio' AND '$hora_fin' <= hora_fin)
											OR	('$hora_inicio' <= hora_inicio AND hora_fin <= '$hora_fin')
										)";
			}
			else {
				$sql_documento = "SELECT COUNT(*) AS cantidad FROM $this->tabla 
									WHERE codigooficina=$codigooficina 
									AND fecha='$fecha' 
									AND (
												(hora_inicio BETWEEN '$hora_inicio' AND '$hora_fin')
											OR	(hora_fin BETWEEN '$hora_inicio' AND '$hora_fin')
											OR	(hora_inicio <= '$hora_inicio' AND '$hora_fin' <= hora_fin)
											OR	('$hora_inicio' <= hora_inicio AND hora_fin <= '$hora_fin')
										)";
			}

			$result = ConexionController::consultar($conexion, $sql_documento)->fetch_object();
            return $result->cantidad;
		}
    }