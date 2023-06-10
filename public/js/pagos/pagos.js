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

function detallematricula(idmatricula){
    $.ajax({
        type: "POST",
        data: "idmatricula=" + idmatricula,
        url: "../controlador/pagos/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta)
            $('#idmatricula').val(respuesta['idmatricula']);
            $('#idalumno').val(respuesta['idalumno']);
            $('#idgrado').val(respuesta['idgrado']);
            $('#nomaluu').val(respuesta['nomalu']);
            $('#gradou').val(respuesta['grado']);
            $('#matriculau').val(respuesta['matricula']);
            $('#saldou').val(respuesta['saldo']);
        }
    });
}

function detallepension(idmatricula){
    $.ajax({
        type: "POST",
        data: "idmatricula=" + idmatricula,
        url: "../controlador/pagos/detallepension.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta)
            $('#idmatriculau').val(respuesta['idmatriculau']);
            $('#idalumnou').val(respuesta['idalumnou']);
            $('#idgradou').val(respuesta['idgradou']);
            $('#nomalu').val(respuesta['nomaluu']);
            $('#grado').val(respuesta['gradou']);
            $('#pensionu').val(respuesta['pension']);
            $('#salpenu').val(respuesta['salpen']);
        }
    });
}

function pagomatricula(){
    $.ajax({
        type: "POST",
        data: $('#frmpagomatricula').serialize(),
        url: "../controlador/pagos/pagos.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            console.log(respuesta)
            if(respuesta == 1){
                $('#frmpagomatricula')[0].reset();
                $('#tablalistapagos').load('pagos/listapagos.php');
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

function pagopension(){
    $.ajax({
        type: "POST",
        data: $('#frmpagopension').serialize(),
        url: "../controlador/pagos/pension.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            console.log(respuesta)
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
    $('#conte-modal-factura').load('facturas/vistapreviafactura.php?idfacturas='+idfacturas, function(){
        $('#viewfactura').modal("show");
        $('.modal-backdrop').remove()
    });
}

function imprimir(){
    var viewfactura = window.open("", "viewfactura", "width=800, heigth=600");
    factura.document.write("<html><head><title>Factura de Venta</title>");
    factura.document.write("<style><link rel='stylesheet' href='../../../public/css/ticket.css'></style></head><body>");
    factura.document.write($("#conte-modal-viewfactura").html());
    factura.document.write("</body></html>");
    factura.document.close();
    factura.print();
}