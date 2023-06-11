$(document).ready(function(){
    $('#tablalistasolicitudes').load('solicitudes/listasolicitudes.php');
});

$(document).ready(function(){
    $('#tablalistasolicitudesadmin').load('solicitudes/listasolicitudesadmin.php');
});

//FILTRAR
$(document).ready(function(){
    setInterval(
        function(){
            const filtro = $('#filtro').val()
            $('#Recargar').load('solicitudes/listasolicitudesadmin.php?filtro='+filtro);
        },1000
    );
});

//Llenar Campos Producto
$('#frmventa').change(function(){
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
                //console.log(respuesta)
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
                //console.log(respuesta)
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
            //console.log(respuesta)
            respuesta = jQuery.parseJSON(respuesta);
            $('#idsolicitud').val(respuesta['idsolicitud']);
            $('#idusuario').val(respuesta['idusuario']);
            $('#idgrado').val(respuesta['idgrado']);
            $('#reptipo').val(respuesta['reptipo']);
            $('#detalleu').val(respuesta['detalle']);
            $('#estadou').val(respuesta['estado']);
            $('#solucionu').val(respuesta['solucion']);
            $('#usuariou').val(respuesta['usuario']);
        }
    });
}

function detalleventa(idsolicitud){
    $.ajax({
        type: "POST",
        data: "idsolicitud=" + idsolicitud,
        url: "../controlador/solicitudes/detalleventa.php",
        success: function(respuesta){
            //console.log(respuesta)
            respuesta = jQuery.parseJSON(respuesta);
            $('#idsolicitudu').val(respuesta['idsolicitudu']);
            $('#idusuariou').val(respuesta['idusuariou']);
            $('#idgradou').val(respuesta['idgradou']);
            $('#reptipou').val(respuesta['reptipou']);
            $('#detalle').val(respuesta['detalleu']);
            $('#estado').val(respuesta['estadou']);
            $('#solucion').val(respuesta['solucionu']);
            $('#usuario').val(respuesta['usuariou']);
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
                //console.log(respuesta)
                $('#frmsolucion')[0].reset();
                $('#tablalistasolicitudesadmin').load('solicitudes/listasolicitudesadmin.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Solicitud Cerrada Exitosamente',
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
        data: $('#frmventa').serialize(),
        url: "../controlador/solicitudes/ventas.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            console.log(respuesta)
            if(respuesta == 1){
                //console.log(respuesta)
                $('#frmventa')[0].reset();
                $('#tablalistasolicitudesadmin').load('solicitudes/listasolicitudesadmin.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Solicitud Cerrada Exitosamente',
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
