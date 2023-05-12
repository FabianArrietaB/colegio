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
            $('#nombreu').val(respuesta['nombre']);
            $('#matriculau').val(respuesta['matricula']);
            $('#canaluu').val(respuesta['canalu']);
            $('#iddiru').val(respuesta['iddir']);
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