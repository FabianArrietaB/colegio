$(document).ready(function(){
    $('#tablalistagrados').load('grados/listagrados.php');
});

function activargrado(idgrado, estado){
    $.ajax({
        type:"POST",
        data:"idgrado=" + idgrado +"&estado=" + estado,
        url:"../controlador/grados/activar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistagrados').load('grados/listagrados.php');
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