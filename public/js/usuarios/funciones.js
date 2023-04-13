$(document).ready(function(){
    $('#tablalistausuarios').load('usuarios/listausuarios.php');
});

function activarusuario(idusuario, estado){
    $.ajax({
        url:"../controlador/usuarios/activar.php",
        type:"POST",
        data:"idusuario=" + idusuario +"&estado=" + estado,
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistausuarios').load("usuarios/listausuarios.php");
                Swal.fire(
                    ":D","Operacion con exito!","success"
                    );
            }else{
                Swal.fire(":(","Fallo al activar!" + respuesta,"Error");
            }
        }
    });
}

function agregarusuario(){
    $.ajax({
        type: "POST",
        data: $('#frmagregarusuario').serialize(),
        url: "../controlador/usuarios/agregar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistausuarios').load('tablalistausuarios');
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
            $('#idUsuarios').val(respuesta['idUsuarios']);
            $('#nombreu').val(respuesta['nombrePersona']);
            $('#fechau').val(respuesta['fecha']);
            $('#telefonou').val(respuesta['telefono']);
            $('#correou').val(respuesta['correo']);
            $('#usuariou').val(respuesta['nombreUsuario']);
            $('#idRolu').val(respuesta['idRol']);
            $('#ubicacionu').val(respuesta['ubicacion']);
            
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
                $('#tablalistausuarios').load("tablalistausuarios");
                $('#modalActualizarUsuarios').modal('hide');
                Swal.fire(":D","Actualizado con exito!","success");

            }else{
                Swal.fire(":(","Error al Actualizar!" + respuesta,"Error");
            }
        }
    });

    return false;
}

