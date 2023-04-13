$(document).ready(function(){
    $('#tablalistausuarios').load('usuarios/listausuarios.php');
});

function activarUsuario(idUsuario, estado){
    $.ajax({
        type:"POST",
        data:"idUsuario=" + idUsuario +"&estado=" + estado,
        url:"controlador/usuarios/activar.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                $('#tablalistausuarios').load("usuarios/listausuarios.php");
                Swal.fire(
                    ":D","Activado con exito!","success"
                    );
            }else{
                Swal.fire(":(","Fallo al activar!" + respuesta,"Error");
            }
        }
    });
}


