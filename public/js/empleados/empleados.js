$(document).ready(function(){
    $('#tablalistaempleados').load('empleados/listaempleados.php');
});

function activarempleado(idempleado, estado){
    $.ajax({
        type:"POST",
        data:"idempleado=" + idempleado +"&estado=" + estado,
        url:"../controlador/empleados/activar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistaempleados').load('empleados/listaempleados.php');
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