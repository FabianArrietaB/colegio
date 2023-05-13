$(document).ready(function(){
    $('#config').load('config/dashboard.php');
});

function agregarparafiscal(){
  $.ajax({
      type: "POST",
      data: $('#frmagregarparafiscal').serialize(),
      url: "../controlador/config/crearparafiscal.php",
      success:function(respuesta){
          respuesta = respuesta.trim();
          if(respuesta == 1){
              $('#parametros').load('config/parafiscales.php');
              $('#frmagregarparafiscal')[0].reset();
              Swal.fire({
                  icon: 'success',
                  title: 'Agregado Exitosamente',
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