$(document).ready(function(){
    $('#tablalistareportes').load('reportes/listareportes.php');
});

$(document).ready(function(){
    $('#tablalistareportesadmin').load('reportes/listareportesadmin.php');
});

//Usuario
function crearsolicitud(){
    $.ajax({
        type: "POST",
        data: $('#frmsolicitud').serialize(),
        url: "../controlador/reportes/crear.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistareportes').load('reportes/listareportes.php');
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
        url:"../controlador/reportes/eliminar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistareportes').load('reportes/listareportes.php');
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
        url: "../controlador/reportes/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idsolicitud').val(respuesta['idsolicitud']);
            $('#idusuario').val(respuesta['idusuario']);
            $('#idgradou').val(respuesta['idgrado']);
            $('#idempleado').val(respuesta['idempleado']);
            $('#usuariou').val(respuesta['usuario']);
            $('#tiposolicitudu').val(respuesta['tiposolicitud']);
            $('#detalleu').val(respuesta['detalle']);
            $('#solucionu').val(respuesta['solucion']);
            $('#estadou').val(respuesta['estado']);
        }
    });
}

function solucion(){
    $.ajax({
        type: "POST",
        data: $('#frmsolucion').serialize(),
        url: "../controlador/reportes/solucion.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#solucion').modal('hide');
                $('#tablalistareportesadmin').load('reportes/listareportesadmin.php');
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