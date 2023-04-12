$(document).ready(function(){
    $('#tablalistarproductos').load('productos/listaproductos.php');
});

function agregarproducto(){
    $.ajax({
        type: "POST",
        data: $('#frmagregarproducto').serialize(),
        url: "../Controlador/usuarios/crud/agregarNuevoUsuario.php",
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