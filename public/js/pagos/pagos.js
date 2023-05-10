
function pagomatricula(){
    $.ajax({
        type: "POST",
        data: $('#frmpagomatricula').serialize(),
        url: "../controlador/pagos/pago.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#editar').modal('hide');
                $('#tablalistagrados').load('grados/listagrados.php');
                Swal.fire({
                    icon: 'success',
                    title: 'grado Actualizado Exitosamente',
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