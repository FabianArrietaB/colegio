
function detallefactura(idfacturas){
    $('#conte-modal-factura').load('facturas/vistapreviafactura.php?idfacturas='+idfacturas, function(){
        $('#factura').modal("show");
        $('.modal-backdrop').remove()
    });
}

function imprimir(){
    var factura = window.open("", "factura", "width=800, heigth=600");
    factura.document.write("<html><head><title>Factura de Venta</title>");
    factura.document.write("<style><link rel='stylesheet' href='../../../public/css/ticket.css'></style></head><body>");
    factura.document.write($("#conte-modal-factura").html());
    factura.document.write("</body></html>");
    factura.document.close();
    factura.print();
}

//CONSULTAR Datos Alumno
$('#frmaestadistica').change(function(){
  //condicion para limpiar campos
  if($('#docume').val()==0){
    $('#idalumno').val("");
    $('#nombre').val("");
    $('#fecing').val("");
    $('#telcel').val("");
    $('#direcc').val("");
    $('#grado').val("");
    $('#correo').val("");
    $('#nommad').val("");
    $('#nompad').val("");
    return
  }
  $.ajax({
      type:"POST",
      data:"docume=" + $('#docume').val(),
      url:"../controlador/informe/detalle.php",
      success:function(respuesta){
          respuesta=jQuery.parseJSON(respuesta);
          $('#idalumno').val(respuesta['idalumno']);
          $('#nombre').val(respuesta['nombre']);
          $('#fecing').val(respuesta['fecing']);
          $('#telcel').val(respuesta['telcel']);
          $('#direcc').val(respuesta['direcc']);
          $('#grado').val(respuesta['grado']);
          $('#correo').val(respuesta['correo']);
      }
  });
});