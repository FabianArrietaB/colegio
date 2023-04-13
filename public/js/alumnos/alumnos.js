$(document).ready(function(){
    $('#tablalistaalumnos').load('alumnos/listaalumnos.php');
});

function activarAlumno(id_alumno, alu_estado){
    $.ajax({
        type:"POST",
        data:"idUsuarios=" + id_alumno +"&estado=" + alu_estado,
        url:"../Controlador/usuarios/crud/activarUsuario.php",
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