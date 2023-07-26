$(document).ready(function(){
    $('#tablaestadisticas').load('informes/general.php');
});

//CONSULTAR Datos Alumno
$('#frmaestadistica').change(function(){
    //condicion para limpiar campos
    if($('#docume').val()==0){
        $('#idalumno').val("");
        $('#cladoc').val("");
        $('#nombre').val("");
        $('#fecing').val("");
        $('#telcel').val("");
        $('#direcc').val("");
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
            $('#fecing').val(respuesta['fecing']);
            $('#telcel').val(respuesta['telcel']);
            $('#direcc').val(respuesta['direcc']);
            $('#grado').val(respuesta['grado']);
            $('#correo').val(respuesta['correo']);
        }
    });
    var idalumno = $('#idalumno').val();
    var modulo = $('#modulo').val();
    var fecha = $('#fecope').val();
    $.ajax({
        method: 'GET',
    }).done(function(info) {
        $('#tablaestadisticas').load('informes/general.php?idalumno='+idalumno+'&modulo='+modulo+'&fecha='+fecha);
    })
    console.log(fecha)
});
