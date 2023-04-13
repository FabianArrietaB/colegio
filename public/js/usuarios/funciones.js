$(document).ready(function(){
    $('#tablalistausuarios').load('usuarios/listausuarios.php');
});

function activarUsuario(idUsuarios, estado){
    $.ajax({
        type:"POST",
        data:"idUsuarios=" + idUsuarios +"&estado=" + estado,
        url:"../controlador/usuarios/crud/activarUsuario.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                Swal.fire(":D","Activado con exito!","success");
            }else{
                Swal.fire(":(","Fallo al activar!" + respuesta,"Error");
            }
        }
    });
}

function agregarNuevoUsuario(){
    $.ajax({
        type: "POST",
        data: $('#frmAgregarUsuario').serialize(),
        url: "../controlador/usuarios/crud/agregarNuevoUsuario.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablaUsuariosLoad').load('usuarios/tablaUsuarios.php');
                $('#frmAgregarUsuario')[0].reset();
                Swal.fire(":D","Agregado con exito!","success");
            }else{
                Swal.fire(":(","Error al agregar!" + respuesta,"Error");
            }
        }
    });

    return false;
}

function obtenerDatosUsuarios(idUsuarios){
    $.ajax({
        type: "POST",
        data: "idUsuarios=" + idUsuarios,
        url: "../controlador/usuarios/crud/obtenerDatosUsuarios.php",
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

function actualizarUsuario(){
    $.ajax({
        type: "POST",
        data: $('#frmActualizarUsuario').serialize(),
        url: "../controlador/usuarios/crud/actualizarUsuario.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablaUsuariosLoad').load("usuarios/tablaUsuarios.php");
                $('#modalActualizarUsuarios').modal('hide');
                Swal.fire(":D","Actualizado con exito!","success");

            }else{
                Swal.fire(":(","Error al Actualizar!" + respuesta,"Error");
            }
        }
    });

    return false;
}

function actualizarContraseña(){
        $.ajax({
            type:"POST",
            data:$('#frmActualizarContraseña').serialize(),
            url:"../controlador/usuarios/crud/actualizarContraseña.php",
            success:function(respuesta){
                respuesta = respuesta.trim();
                if(respuesta == 1){
                    $('#modalCambiarContraseña').modal('hide');
                    Swal.fire(":D","Actualizado con exito!","success");
    
                }else{
                    Swal.fire(":(","Error al Actualizar!" + respuesta,"Error");
                }
            }
        });
    return false;
}

