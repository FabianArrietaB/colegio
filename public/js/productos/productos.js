$(document).ready(function(){
    $('#tablalistarproductos').load('productos/listaproductos.php');
});

function activarproducto(idproducto, estado){
    $.ajax({
        type:"POST",
        data:"idproducto=" + idproducto +"&estado=" + estado,
        url:"../controlador/productos/activar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistarproductos').load('productos/listaproductos.php');
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