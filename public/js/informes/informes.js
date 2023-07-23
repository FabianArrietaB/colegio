$(document).ready(function(){

    $('#ventasbtn').click(function(){
        ocultar();
        $('#tablaventas').load('informes/tablaventas.php');
        $('#tablaventas').show();
    });

    $('#pensionbtn').click(function(){
        ocultar();
        $('#tablapension').load('informes/tablapension.php');
        $('#tablapension').show();
    });
    
    $('#matriculasbtn').click(function(){
        ocultar();
        $('#tablamatriculas').load('informes/tablamatriculas.php');
        $('#tablamatriculas').show();
    });

    $('#facturasbtn').click(function(){
        ocultar();
        $('#tablafacturas').load('informes/tablafacturas.php');
        $('#tablafacturas').show();
    });
});

function ocultar(){
    $('#tablaventas').hide();
    $('#tablapension').hide();
    $('#tablamatriculas').hide();
    $('#tablafacturas').hide();
    return false;
}

function detalleventa(idalumno){
    $('#conte-modal-venta').load('informes/reporteventas.php?idalumno='+idalumno, function(){
        $('#repventa').modal("show");
        $('.modal-backdrop').remove()
    });
}

function detallematricula(idalumno){
    $('#conte-modal-matricula').load('informes/reportematriculas.php?idalumno='+idalumno, function(){
        $('#repmatricula').modal("show");
        $('.modal-backdrop').remove()
    });
}

function detallepension(idalumno){
    $('#conte-modal-pension').load('informes/reportepesiones.php?idalumno='+idalumno, function(){
        $('#reppensiones').modal("show");
        $('.modal-backdrop').remove()
    });
}

function detallefactura(idfacturas){
    window.open('facturas/factura.php?idfacturas='+idfacturas);
}

function obtenergrado(){
    var grado = $('#grado').val();
    //console.log(grado)
    $.ajax({
        method: 'GET',
    }).done(function(info) {
        $('#tablapension').load('informes/tablapension.php?grado='+grado);
    })
}

function obtenergradoventas(){
    var grado = $('#grado').val();
    console.log(grado)
    $.ajax({
        method: 'GET',
    }).done(function(info) {
        $('#tablapension').load('informes/tablaventas.php?grado='+grado);
    })
}

function obteneracudiente(idfacturas){
    $('#conte-modal-acudientes').load('informes/acudiente.php?idfacturas='+idfacturas, function(){
        $('#acudientes').modal("show");
        $('.modal-backdrop').remove()
    });
}

function datosacudientes(idacudiente, idfacturas){
    $.ajax({
        type:"POST",
        data:"idacudiente=" + idacudiente +"&idfacturas=" + idfacturas,
        url:"../controlador/informe/addacudiente.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                console.log(respuesta)
                $('#tablafacturas').load('informes/tablafacturas.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Operacion Exitosa',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo realizar la operacion!',
                    showConfirmButton: false,
                    timer: 2000
                });
            }
        }
    });
}