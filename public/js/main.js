
//Para la funcionalidad del filtro de estados del soporte correctivo
/*$(buscar_datos());

function buscar_datos(consulta){
    $.ajax({
        url: 'tabla_asistencias.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $("#tabla_asistencias").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

//Detectar la opción elegida en el select de estados del soporte correctivo
$(document).on('change', '#estado', function(){
    var valor=$("#estado option:selected").text();
    if(valor == "Todos los estados"){
        buscar_datos();
    }
    else{
        buscar_datos(valor);
    }
});

//---------------------------------------------------------

//Para la funcionalidad de los tabs de los reportes
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

//------------------------------------------

//Para la funcionalidad de reportes por dia
$(buscar_dia());

function buscar_dia(consulta){
    $.ajax({
        url: 'tabla_dia.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $("#tabla_dia").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

//Detectar click del boton buscar por dia en reportes
$(document).ready(function(){
    $("#buscar_dia").click(function (e) {
        var valor=$('#fecha_dia').val();
        if(valor!=""){
            buscar_dia(valor);
        }else{
            buscar_dia();
        }
    });
});

//------------------------------------------

//Para la funcionalidad de reportes por mes
$(buscar_mes());

function buscar_mes(consulta){
    $.ajax({
        url: 'tabla_mes.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $("#tabla_mes").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

//Detectar click del boton buscar por mes en reportes
$(document).ready(function(){
    $("#buscar_mes").click(function (e) {
        var valor=$('#fecha_mes').val();
        if(valor!=""){
            buscar_mes(valor);
        }else{
            buscar_mes();
        }
    });
});

//------------------------------------------

//Para la funcionalidad de reportes por año
$(buscar_anio());

function buscar_anio(consulta){
    $.ajax({
        url: 'tabla_anio.php',
        type: 'POST',
        dataType: 'html',
        data: {consulta: consulta},
    })
    .done(function(respuesta){
        $("#tabla_anio").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

//Detectar click del boton buscar por año en reportes
$(document).ready(function(){
    $("#buscar_anio").click(function (e) {
        var valor=$('#fecha_anio').val();
        if(valor!=""){
            buscar_anio(valor);
        }else{
            buscar_anio();
        }
    });
});

//------------------------------------------

//Para la funcionalidad de reportes por periodo
$(buscar_periodo());

function buscar_periodo(fecha1, fecha2){
    $.ajax({
        url: 'tabla_periodo.php',
        type: 'POST',
        dataType: 'html',
        data: {fecha1: fecha1,
               fecha2: fecha2 },
    })
    .done(function(respuesta){
        $("#tabla_periodo").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

//Detectar click del boton buscar por periodo en reportes
$(document).ready(function(){
    $("#buscar_periodo").click(function (e) {
        var fecha1=$('#fecha_inicio').val();
        var fecha2=$('#fecha_final').val();
        if(fecha1!="" & fecha2!=""){
            if(fecha1 < fecha2){
                buscar_periodo(fecha1, fecha2);
            }
            else if(fecha1 > fecha2){
                alertify.alert('el periodo ingresado no es válido').set('basic', true);
            }
            else if(fecha1 = fecha2){
                alertify.alert('el periodo ingresado no es válido').set('basic', true);
            }
        }else{
            alertify.alert('ingrese una fecha de inicio y una fecha final\npara el periodo').set('basic', true); 
        }
    });
});

//------------------------------------------

//Para la funcionalidad de reportes transparencia
$(buscar_transparencia());

function buscar_transparencia(anio, mes){
    $.ajax({
        url: '../TransparenciaAvance/tabla_reporte.php',
        type: 'POST',
        dataType: 'html',
        data: {anio: anio,
               mes: mes },
    })
    .done(function(respuesta){
        $("#tabla_reporte").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

//Detectar click del boton ver en reporte transparencia
$(document).ready(function(){
    $("#buscar_transparencia").click(function (e) {
        var anio=$('#trans_anio').val();
        var mes=$('#trans_mes').val();
        if(anio!="" & mes!=""){
            buscar_transparencia(anio, mes);
        }
    });
});

//------------------------------------------

// Para cargar la ventana detalle de asistencias dentro de reportes día
function buscar_detalle_dia(id, nombre, denominacion){

    $.ajax({
        url: 'detalle.php',
        type: 'POST',
        dataType: 'html',
        data: {id: id,
               nombre: nombre,
               denominacion: denominacion},
    })
    .done(function(respuesta){
        $("#tabla_dia").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

function detalle_tabla_dia(id_tabla, nombre_tabla, denominacion_tabla){
    id = id_tabla;
    nombre = nombre_tabla;
    denominacion = denominacion_tabla;
    
    buscar_detalle_dia(id, nombre, denominacion);
    
}

//----------------------------------------------------------

// Para cargar la ventana detalle de asistencias dentro de reportes mes
function buscar_detalle_mes(id, nombre, denominacion){

    $.ajax({
        url: 'detalle.php',
        type: 'POST',
        dataType: 'html',
        data: {id: id,
               nombre: nombre,
               denominacion: denominacion},
    })
    .done(function(respuesta){
        $("#tabla_mes").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

function detalle_tabla_mes(id_tabla, nombre_tabla, denominacion_tabla){
    id = id_tabla;
    nombre = nombre_tabla;
    denominacion = denominacion_tabla;
    
    buscar_detalle_mes(id, nombre, denominacion);
    
}

//----------------------------------------------------------

// Para cargar la ventana detalle de asistencias dentro de reportes anio
function buscar_detalle_anio(id, nombre, denominacion){

    $.ajax({
        url: 'detalle.php',
        type: 'POST',
        dataType: 'html',
        data: {id: id,
               nombre: nombre,
               denominacion: denominacion},
    })
    .done(function(respuesta){
        $("#tabla_anio").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

function detalle_tabla_anio(id_tabla, nombre_tabla, denominacion_tabla){
    id = id_tabla;
    nombre = nombre_tabla;
    denominacion = denominacion_tabla;
    
    buscar_detalle_anio(id, nombre, denominacion);
    
}

//----------------------------------------------------------

// Para cargar la ventana detalle de asistencias dentro de reportes periodo
function buscar_detalle_periodo(id, nombre, denominacion){

    $.ajax({
        url: 'detalle.php',
        type: 'POST',
        dataType: 'html',
        data: {id: id,
               nombre: nombre,
               denominacion: denominacion},
    })
    .done(function(respuesta){
        $("#tabla_periodo").html(respuesta);
    })
    .fail(function(){
        console.log("error");
    })
}

function detalle_tabla_periodo(id_tabla, nombre_tabla, denominacion_tabla){
    id = id_tabla;
    nombre = nombre_tabla;
    denominacion = denominacion_tabla;
    
    buscar_detalle_periodo(id, nombre, denominacion);
    
}

//----------------------------------------------------------

// Para el funcionamiento de los botones principales en reportes
$(document).ready(function() {
    $("#asistencias").click(function(event) {
        $(this).attr("class", 'btn btn-warning font-weight-bolder');
        $("#reporte").load('asistencias.php');
        $("#correos").attr("class", 'btn btn-info font-weight-bolder');
        $("#transparencia").attr("class", 'btn btn-info font-weight-bolder');
    });
    $("#correos").click(function(event) {
        $(this).attr("class", 'btn btn-warning font-weight-bolder');
        $("#reporte").load('../Usuario/reporte.php');
        $("#asistencias").attr("class", 'btn btn-info font-weight-bolder');
        $("#transparencia").attr("class", 'btn btn-info font-weight-bolder');
    });
    $("#transparencia").click(function(event) {
        $(this).attr("class", 'btn btn-warning font-weight-bolder');
        $("#reporte").load('../TransparenciaAvance/reporte.php');
        $("#asistencias").attr("class", 'btn btn-info font-weight-bolder');
        $("#correos").attr("class", 'btn btn-info font-weight-bolder');
    });
});

//---------------------------------------------------------------------*/



//---------------------------------------------------------