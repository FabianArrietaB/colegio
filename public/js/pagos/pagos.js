$(document).ready(function(){
    $('#tablalistapagos').load('pagos/listapagos.php');
});

function detallematricula(idalumno){
    $.ajax({
        type: "POST",
        data: "idalumno=" + idalumno,
        url: "../controlador/grados/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idalumno').val(respuesta['idalumno']);
            $('#nomaluu').val(respuesta['nomalu']);
            $('#idgradou').val(respuesta['idgrado']);
            $('#matriculau').val(respuesta['matricula']);
            $('#saldou').val(respuesta['saldo']);
        }
    });
}

function pagomatricula(){
    $.ajax({
        type: "POST",
        data: $('#frmpagomatricula').serialize(),
        url: "../controlador/pagos/pago.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#pago').modal('hide');
                $('#tablalistapagos').load('pagos/listapagos.php');
                $('#frmpagomatricula')[0].reset();
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