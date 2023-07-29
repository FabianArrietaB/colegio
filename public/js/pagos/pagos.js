$(document).ready(function(){

    $('#pagosbtn').click(function(){
        ocultar();
        $('#tablalistapagos').load('pagos/listapagos.php');
        $('#tablalistapagos').show();
    });

    $('#pensionbt').click(function(){
        ocultar();
        $('#tablalistapension').load('pagos/listapension.php');
        $('#tablalistapension').show();
    });

    $('#facturasbtn').click(function(){
        ocultar();
        $('#tablafacturas').load('informes/tablafacturas.php');
        $('#tablafacturas').show();
    });
});

function ocultar(){
    $('#tablalistapagos').hide();
    $('#tablalistapension').hide();
    $('#tablafacturas').hide();
    return false;
}

function detallepension(idmatricula){
    $.ajax({
        type: "POST",
        data: "idmatricula=" + idmatricula,
        url: "../controlador/pagos/detallepension.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            //console.log(respuesta)
            $('#idmatriculau').val(respuesta['idmatriculau']);
            $('#idalumnou').val(respuesta['idalumnou']);
            $('#idgradou').val(respuesta['idgradou']);
            $('#nomalu').val(respuesta['nomaluu']);
            $('#grado').val(respuesta['gradou']);
            $('#pensionu').val(respuesta['pension']);
        }
    });
}

function pagopension(){
    $.ajax({
        type: "POST",
        data: $('#frmpagopension').serialize(),
        url: "../controlador/pagos/pension.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            //console.log(respuesta)
            if(respuesta == 1){
                $('#frmpagopension')[0].reset();
                $('#tablalistapension').load('pagos/listapension.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Pago Realizado Exitosamente',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al Editar!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    });
    return false;
}

function detallefactura(idfacturas){
    window.open('facturas/factura.php?idfacturas='+idfacturas);
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
                //console.log(respuesta)
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