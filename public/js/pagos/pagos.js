$(document).ready(function(){
    $('#tablalistapagos').load('pagos/listapagos.php');
});

function detallematricula(idmatricula){
    $.ajax({
        type: "POST",
        data: "idmatricula=" + idmatricula,
        url: "../controlador/pagos/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idmatricula').val(respuesta['idmatricula']);
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