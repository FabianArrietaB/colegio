$(document).ready(function(){
    $('#tablalistausuarios').load('usuarios/listausuarios.php');
});

function activarUsuario(idusuario, estado){
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


