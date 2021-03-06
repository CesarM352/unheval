<?php
    require_once '../../Conexion.php';
    require_once '../../controladores/LabSoftwareAdquisicionController.php';

    $salida="";
    if(isset($_POST['software'])){
        $term=$_POST['software'];
        $software_adquisicion_controlador = new LabSoftwareAdquisicionController;
        $softwares = $software_adquisicion_controlador->getAllSoftwaresAdquisicionesComplete($conexion, $term);
    }else{
        $software_adquisicion_controlador = new LabSoftwareAdquisicionController;
        $softwares = $software_adquisicion_controlador->getAllSoftwaresAdquisiciones($conexion, 0);
    }

    if($softwares->num_rows > 0){
        $salida.="<table id='tbl_datos_todos' class='table table-bordered table-hover'>
                    <thead>
                        <tr style='text-align: center'>
                            <th>SOFTWARE</th>
                            <th>TIPO</th>
                            <th>FORMA</th>
                            <th>NRO LICENCIAS</th>
                            <th>FECHA COMPRA</th>
                            <th>DÍAS DE DURACIÓN</th>
                            <th>PERIODO DE VIGENCIA</th>
                            <th>CONDICIÓN</th>
                            <th>LICENCIAS DISPONIBLES</th>
                            <th>VER</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach ($softwares as $key => $software) {
                        $texto_vencimiento = '';
                        $color_fondo = '';
                        if( $software['duracion_dias'] >0 )
                            if($software['dias_por_vencer'] > 0){
                                $texto_vencimiento = 'Se venció hace '.abs($software['dias_por_vencer']).' días';
                                $color_fondo = 'bg-danger vencidos';
                            }
                            elseif($software['dias_por_vencer'] < 0){
                                $texto_vencimiento = 'Quedan '.abs($software['dias_por_vencer']).' días para vencer';
                                $color_fondo = 'por_vencer';
                            }
                            else{
                                $texto_vencimiento = 'Hoy se vencen las licencias';
                                $color_fondo = 'red';
                                $color_fondo = 'bg-warning por_vencer';
                            }
        $salida.="  <tr style='text-align: center' class='$color_fondo' data-dias_por_vencer=";
                        if( $software['dias_por_vencer'] <= 0) 
        $salida.=           abs($software['dias_por_vencer']);
        $salida.=">     <td>".$software['software_descripcion']."</td>
                        <td>".$software['software_tipo_sw']."</td>
                        <td>".$software['software_forma']."</td>
                        <td>".$software['nro_licencias']."</td>
                        <td>".$software["fecha_compra"]."</td>
                        <td>";
                            if( $software['duracion_dias'] >0 )
        $salida.=               $software['duracion_dias'] ;
                            else
        $salida.=           '&infin;';
        $salida.="      </td>
                        <td>";
                            if($software['software_propietario'] == 1 && $software['duracion_dias'] > 0 )
        $salida.=           $software['fecha_vencimiento'];
                            else
        $salida.=           ' - ';
        $salida.="      </td>
                        <td>".$texto_vencimiento."</td>
                        <td>";
                        if( $software['duracion_dias'] >0 || $software['duracion_dias'] == -1 )
        $salida.=       $software['nro_licencias_disponibles'] ;
                        else
        $salida.=       '&infin;';
        $salida.="      </td>        
                        <td><a href='requisitos.php?codigosoftware=".$software['software_id']."'  data-toggle='tooltip' data-placement='left' title='Requisitos Mínimos'><i class='nav-icon fas fa-list-alt'></i></a>
                        <a href='detalles.php?codigosoftware=".$software['software_id']."' data-toggle='tooltip' data-placement='left' title='Detalles'><i class='nav-icon fas fa-bookmark'></i></a></td>
                    </tr>";
                    }
        $salida.="  </tbody>
                </table>
                <script>
                    $(function () {
                        $('#btn_ver_todos').click( function(){
                            $('#dias_por_vencer').val('')
                            $('#tbl_datos_todos tbody tr').css('display','table-row')
                        })

                        $('#btn_ver_vencidos').click( function(){
                            $('#dias_por_vencer').val('')
                            $('#tbl_datos_todos tbody tr').css('display','none')
                            $('.vencidos').css('display','table-row')
                            
                        })

                        $('#dias_por_vencer').change( function(){
                            let valor = $(this).val()
                            if( $(this).val() != '' ){
                                $('#tbl_datos_todos tbody tr').css('display','none')
                                $('.por_vencer').each( function(){
                                    if( parseInt($(this).data('dias_por_vencer')) <= valor )
                                        $(this).css('display','table-row')
                                })
                            }
                            
                        })
                    })


                    function eliminar(id, event){
                        if(!confirm('Desea elminar el registro de codigo ' + id) )
                            event.preventDefault()
                    }

                function filtrarPorTipoAmbiente( numero ){
                    filas = document.getElementsByClassName('tbl_datos_filas')
                    for(i=0; i<filas.length; i++){
                        if( numero != 0 )
                            filas.item(i).style.display='none'
                        else
                            filas.item(i).style.display='table-row'
                    }
                    filas_mostrar = document.getElementsByClassName('tipo_ambiente_' + numero)
                    for(i=0; i<filas_mostrar.length; i++){
                        filas_mostrar.item(i).style.display='table-row'
                    }
                }
                </script>
                <script>
                    $(function () {
                        $('#tbl_datos_todos').DataTable({
                            'lengthMenu': [[15, 25, 50, -1], [15, 25, 50, 'All']],
                            'paging': true,
                            'lengthChange': true,
                            'searching': false,
                            'ordering': false,
                            'info': true,
                            'autoWidth': false,
                            'responsive': true,
                            
                            'language': {
                                'info': 'Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas',
                                'lengthMenu': 'Mostrar _MENU_ registros',
                                'paginate': {
                                    'first': 'Primeros',
                                    'last': 'Ultimos',
                                    'next': 'Siguiente',
                                    'previous': 'Anterior'
                                },
                            },
                            'columnDefs': [
								{ 'width': '20%', 'targets': 0,
                                  'width': '5%', 'targets': 9 }
							]
                          });
                    });
                </script>";
    }else{
        $salida.="<div style='text-align:center'><h5>Software no registrado</h5></div>";
    }
    echo $salida;
?>
    <script>
        $(function () {
            $("#btn_ver_todos").click( function(){
                $("#dias_por_vencer").val('')
                $("#tbl_datos_todos tbody tr").css('display','table-row')
            })

            $("#btn_ver_vencidos").click( function(){
                $("#dias_por_vencer").val('')
                $("#tbl_datos_todos tbody tr").css('display','none')
                $(".vencidos").css('display','table-row')
                
            })

            $("#dias_por_vencer").change( function(){
                let valor = $(this).val()
                if( $(this).val() != '' ){
                    $("#tbl_datos_todos tbody tr").css('display','none')
                    $(".por_vencer").each( function(){
                        if( parseInt($(this).data('dias_por_vencer')) <= valor )
                            $(this).css('display','table-row')
                    })
                }
                
            })
        })


        function eliminar(id, event){
            if(!confirm("Desea elminar el registro de codigo " + id) )
                event.preventDefault()
        }

    function filtrarPorTipoAmbiente( numero ){
        filas = document.getElementsByClassName("tbl_datos_filas")
        for(i=0; i<filas.length; i++){
            if( numero != 0 )
                filas.item(i).style.display="none"
            else
                filas.item(i).style.display="table-row"
        }
        filas_mostrar = document.getElementsByClassName("tipo_ambiente_" + numero)
        for(i=0; i<filas_mostrar.length; i++){
            filas_mostrar.item(i).style.display="table-row"
        }
    }
    </script>