function ingresar(){
    $.ajax({
        type:"POST",
        data:$('#frmIngreso').serialize(),
        url:"controlador/usuarios/login.php",
        success:function(respuesta){
                respuesta = respuesta.trim(); 
                if(respuesta == 1){
                    window.location.href = "Vistas/inicio.php";
                }else{

                    swal.fire(":(","Error al entrar!" + respuesta, "error");

                }     

        }
    });
return false;

}