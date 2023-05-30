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
    $('#conte-modal').load('informes/reporteventas.php?idalumno='+idalumno, function(){
        $('#repventa').modal("show");
        $(".modal-backdrop.in").hide();
    });
     // var idalumno = idalumno
    // // var ruta = 'informes/reporteventas.php?idalumno=' + idalumno;
    // // $.get(ruta,{
    // //     idalumno: idalumno
    // // //     $('#repventa').html(respuesta);
    // // //     $('#repventa').modal('show');
    // // });
    // $.ajax({
    //     type: "GET",
    //     url: "../controlador/informe/ventas.php?idalumno="+idalumno,
    //     success: function(respuesta){
    //         respuesta = jQuery.parseJSON(respuesta);
    //         console.log(respuesta);
    //         $('#idalumno').val(respuesta['idalumno']);
    //         $('#nomalu').val(respuesta['nomalu']);
    //         $('#telcel').val(respuesta['telcel']);
    //         $('#correo').val(respuesta['correo']);
    //         $('#direcc').val(respuesta['direcc']);
    //         $('#fecmat').val(respuesta['fecmat']);
    //     }
    // });
}

