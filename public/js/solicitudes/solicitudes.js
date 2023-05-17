$(document).ready(function(){
    $('#tablalistasolicitudes').load('solicitudes/listasolicitudes.php');
});

$(document).ready(function(){
    $('#tablalistasolicitudesadmin').load('solicitudes/listasolicitudesadmin.php');
});

//Llenar Campos Producto
$('#frmventas').change(function(){
    //condicion para limpiar campos
    if($('#idproducto').val()==0){
        $('#precio').val("");
        return
    }
    $.ajax({
        type:"POST",
        data:"idproducto=" + $('#idproducto').val(),
        url:"../controlador/productos/detalle.php",
        success:function(respuesta){
            respuesta=jQuery.parseJSON(respuesta);
            $('#precio').val(respuesta['precio']);
        }
    });
});

//Usuario
function crearsolicitud(){
    $.ajax({
        type: "POST",
        data: $('#frmsolicitud').serialize(),
        url: "../controlador/solicitudes/crear.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                console.log(respuesta)
                $('#tablalistasolicitudes').load('solicitudes/listasolicitudes.php');
                $('#frmsolicitud')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Solicitud Registrada Exitosamente',
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

function eliminarsolicitud(idsolicitud){
    $.ajax({
        type: "POST",
        data:"idsolicitud=" + idsolicitud,
        url:"../controlador/solicitudes/eliminar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistasolicitudes').load('solicitudes/listasolicitudes.php');
                    swal.fire({
                        icon: 'success',
                        title: 'Solicitud Eliminada Exitosamente',
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
//Admin - Supervisor
function detallesolicitud(idsolicitud){
    $.ajax({
        type: "POST",
        data: "idsolicitud=" + idsolicitud,
        url: "../controlador/solicitudes/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta)
            $('#idsolicitud').val(respuesta['idsolicitud']);
            $('#idusuario').val(respuesta['idusuario']);
            $('#idgradou').val(respuesta['idgrado']);
            $('#idventau').val(respuesta['id_venta']);
            $('#estadou').val(respuesta['estado']);
        }
    });
}

function solucion(){
    $.ajax({
        type: "POST",
        data: $('#frmsolucion').serialize(),
        url: "../controlador/solicitudes/solucion.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                console.log(respuesta)
                $('#solucion').modal('hide');
                $('#tablalistasolicitudesadmin').load('solicitudes/listasolicitudesadmin.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Solucion Actualizada Exitosamente',
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

function ventas(){
    $.ajax({
        type: "POST",
        data: $('#frmventas').serialize(),
        url: "../controlador/solicitudes/ventas.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                console.log(respuesta)
                $('#ventas').modal('hide');
                $('#tablalistasolicitudesadmin').load('solicitudes/listasolicitudesadmin.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Venta Realizada Exitosamente',
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