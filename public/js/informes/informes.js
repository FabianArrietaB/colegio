$(document).ready(function(){

    $('#ventasbtn').click(function(){
        ocultarsecciondes();
        $('#tablaventas').load('informes/tablaventas.php');
        $('#tablaventas').show();
    });

    $('#pensionbtn').click(function(){
        ocultarsecciondes();
        $('#tablapension').load('informes/tablapension.php');
        $('#tablapension').show();
    });
    
    $('#matriculasbtn').click(function(){
        ocultarsecciondes();
        $('#tablamatriculas').load('informes/tablamatriculas.php');
        $('#tablamatriculas').show();
    });
});

function ocultarsecciondes(){
    $('#tablaventas').hide();
    $('#tablapension').hide();
    $('#tablamatriculas').hide();
    return false;
}

function detalleventa(idalumno){
    $.ajax({
        type: "POST",
        data: "idalumno=" + idalumno,
        url: "../controlador/informe/ventas.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idalumno').val(respuesta['idalumno']);
            $('#nomalu').val(respuesta['nomalu']);
            $('#telcel').val(respuesta['telcel']);
            $('#correo').val(respuesta['correo']);
            $('#direcc').val(respuesta['direcc']);
            $('#fecmat').val(respuesta['fecmat']);
            respuesta.ventas.forEach(item => {
                
            });
        }
    });
}

