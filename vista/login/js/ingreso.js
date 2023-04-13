function ingresar(){
    $.ajax({
        url:"./../../controlador/usuarios/login.php",
        type:"POST",
        data:$('#frmIngreso').serialize(),
        success:function(respuesta){
            respuesta = respuesta.trim();
            if(respuesta == 1){
                window.location.href = "../../home/inicio.php";
            }else{
                swal.fire(":(","Error al entrar!" + respuesta, "error");
            }
        }
    });
    return false;
}