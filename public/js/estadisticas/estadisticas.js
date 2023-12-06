$(document).ready(function(){
    $('#tablaestadisticas').load('informes/general.php');
});

//CONSULTAR DATOS ALUMNO

function obteneralumno(){
    console.log('Lista Alumnos')
}

function datosAlumnos(){
    
}

$('#frmaestadistica').change(function(){
    //condicion para limpiar campos
    if($('#docume').val()==0){
        $('#idalumno').val("");
        $('#cladoc').val("");
        $('#nombre').val("");
        $('#telcel').val("");
        $('#ciudad').val("");
        $('#direcc').val("");
        $('#fecing').val("");
        $('#grado').val("");
        $('#correo').val("");
        $('#nommad').val("");
        $('#nompad').val("");
        return
    }
    $.ajax({
        type:"POST",
        data:"docume=" + $('#docume').val(),
        url:"../controlador/informe/detalle.php",
        success:function(respuesta){
            respuesta=jQuery.parseJSON(respuesta);
            $('#idalumno').val(respuesta['idalumno']);
            $('#cladoc').val(respuesta['cladoc']);
            $('#nombre').val(respuesta['nombre']);
            $('#telcel').val(respuesta['telcel']);
            $('#ciudad').val(respuesta['ciudad']);
            $('#direcc').val(respuesta['direcc']);
            $('#fecing').val(respuesta['fecing']);
            $('#grado').val(respuesta['grado']);
            $('#correo').val(respuesta['correo']);
        }
    });
    
});




function generar(){
    var idalumno = $('#idalumno').val();
    var modulo = $('#modulo').val();
    var desde = $('#fecini').val();
    var hasta = $('#fecfin').val();
    $.ajax({
        method: 'GET',
    }).done(function(info) {
        $('#tablaestadisticas').load('informes/general.php?idalumno='+idalumno+'&modulo='+modulo+'&desde='+desde+'&hasta='+hasta);
    })
    console.log(desde)
    console.log(hasta)
}

function pdf(){
    var idalumno = $('#idalumno').val();
    var modulo = $('#modulo').val();
    var desde = $('#fecini').val();
    var hasta = $('#fecfin').val();
    $.ajax({
        method: 'GET',
    }).done(function(info) {
        window.open('facturas/informepdf.php?idalumno='+idalumno+'&modulo='+modulo+'&desde='+desde+'&hasta='+hasta);
    })
}

function excel(){
    var idalumno = $('#idalumno').val();
    var modulo = $('#modulo').val();
    var desde = $('#fecini').val();
    var hasta = $('#fecfin').val();
    $.ajax({
        method: 'GET',
    }).done(function(info) {
        window.open('facturas/informeexcel.php?idalumno='+idalumno+'&modulo='+modulo+'&desde='+desde+'&hasta='+hasta);
    })
}