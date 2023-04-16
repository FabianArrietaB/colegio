$(document).ready(function(){
    $('#tablalistausuarios').load('usuarios/listausuarios.php');
});

function activarusuario(idusuario, estado){
    $.ajax({
        type:"POST",
        data:"idusuario=" + idusuario +"&estado=" + estado,
        url:"../controlador/usuarios/activar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistausuarios').load('usuarios/listausuarios.php');
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

function cambiopassword(){
    $.ajax({
        type:"POST",
        data:$('#formcambiopassword').serialize(),
        url:"../controlador/usuarios/password.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#password').modal('hide');
                $('#tablalistausuarios').load('usuarios/listausuarios.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Contraseña Actualizada',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'No se pudo Realizar la Operacion',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    });
    return false;
}

function agregarusuario(){
    $.ajax({
        type: "POST",
        data: $('#frmagregarusuario').serialize(),
        url: "../controlador/usuarios/agregar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistausuarios').load('usuarios/listausuarios.php');
                $('#frmagregarusuario')[0].reset();
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario Creado Exitosamente',
                    showConfirmButton: false,
                    timer: 1500
                });
            }else{
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Error al crear!',
                    showConfirmButton: false,
                    timer: 1500
                });
            }
        }
    });
    return false;
}

function detalleusuario(idusuario){
    $.ajax({
        type: "POST",
        data: "idusuario=" + idusuario,
        url: "../controlador/usuarios/detalle.php",
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            $('#idusuario').val(respuesta['idusuario']);
            $('#nombreu').val(respuesta['nombre']);
            $('#usuariou').val(respuesta['usuario']);
            $('#fechau').val(respuesta['fecha']);
            $('#correou').val(respuesta['correo']);
            $('#idRolu').val(respuesta['idrol']);
            $('#rol').val(respuesta['rol']);
        }
    });
}

function editarusuario(){
    $.ajax({
        type: "POST",
        data: $('#frmeditarusuario').serialize(),
        url: "../controlador/usuarios/editar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#editar').modal('hide');
                $('#tablalistausuarios').load('usuarios/listausuarios.php');
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario Actualizado Exitosamente',
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
        console.log(respuesta);
        }
        
    });
    return false;
}

function eliminarusuario(idusuario){
    $.ajax({
        type: "POST",
        data:"idusuario=" + idusuario,
        url:"../controlador/usuarios/eliminar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistausuarios').load('usuarios/listausuarios.php');
                    swal.fire({
                        icon: 'success',
                        title: 'Usuario Eliminado Exitosamente',
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

