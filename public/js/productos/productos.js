$(document).ready(function(){
    $('#tablalistaproductos').load('productos/listaproductos.php');
});

//FILTRAR
$(document).ready(function(){
    setInterval(
        function(){
            const filtro = $('#filtro').val()
            $('#Recargar').load('productos/listaproductos.php?filtro='+filtro);
        },1000
    );
});

function activarproducto(idproducto, estado){
    $.ajax({
        type:"POST",
        data:"idproducto=" + idproducto +"&estado=" + estado,
        url:"../controlador/productos/activar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistaproductos').load('productos/listaproductos.php');
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

function agregarproducto(){
    $.ajax({
        type: "POST",
        data: $('#frmagregarproducto').serialize(),
        url: "../controlador/productos/crear.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistaproductos').load('productos/listaproductos.php');
                $('#frmagregarproducto')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Producto Creado Exitosamente',
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
    return false;
}

function detalleproducto(idproducto){
    $.ajax({
        type: "POST",
        data: "idproducto=" + idproducto,
        url: "../controlador/productos/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idproducto').val(respuesta['idproducto']);
            $('#nombreu').val(respuesta['nombre']);
            $('#categou').val(respuesta['catego']);
            $('#preciou').val(respuesta['precio']);
        }
    });
}

function editarproducto(){
    $.ajax({
        type: "POST",
        data: $('#frmeditarproducto').serialize(),
        url: "../controlador/productos/editar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#editar').modal('hide');
                $('#tablalistaproductos').load('productos/listaproductos.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Producto Actualizado Exitosamente',
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

function eliminarproducto(idproducto){
    $.ajax({
        type: "POST",
        data:"idproducto=" + idproducto,
        url:"../controlador/productos/eliminar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistaproductos').load('productos/listaproductos.php');
                    swal.fire({
                        icon: 'success',
                        title: 'Producto Eliminado Exitosamente',
                        showConfirmButton: false,
                        timer: 1500
                    });
            }else{
                swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al Eliminar!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    });
}

