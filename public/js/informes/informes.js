$(document).ready(function(){

    $('#ventasbtn').click(function(){
        ocultarsecciondes();
        $('#tablaventas').load('informes/tablaventas.php');
        $('#tablaventas').show();
    });

    $('#pensionbtn').click(function(){
        ocultarsecciondes();
        $('#tablapension').load('informes/tablapension.php');
        $('#tablapension').show();
    });
    
    $('#matriculasbtn').click(function(){
        ocultarsecciondes();
        $('#tablamatriculas').load('informes/tablamatriculas.php');
        $('#tablamatriculas').show();
    });
});

function ocultarsecciondes(){
    $('#tablaventas').hide();
    $('#tablapension').hide();
    $('#tablamatriculas').hide();
    return false;
}

// function informeventa(idalumno){
//     $('#modal-title').html([idalumno].producto);
//     $('#modal-body').html('<p>' + [idalumno].precio + '</p>');
//     $('#myModal').modal('show');
//   }
function detalleventa(idalumno){
    $.ajax({
        type: "GET",
        url: "../controlador/informe/ventas.php?idalumno="+idalumno,
        success: function(respuesta){
            respuesta = jQuery.parseJSON(respuesta);
            console.log(respuesta);
            let id = respuesta['idalumno'];
            document.getElementById("idalumno").value=id;
            console.log(id)
            $('#idalumno').val(respuesta['idalumno']);
            $('#nomalu').val(respuesta['nomalu']);
            $('#telcel').val(respuesta['telcel']);
            $('#correo').val(respuesta['correo']);
            $('#direcc').val(respuesta['direcc']);
            $('#fecmat').val(respuesta['fecmat']);
            // let tbl = '';
            // respuesta['lista'].forEach(item => {
            // tbl += `
            //     <tr>
            //         <td>${item.pro_nombre}</td>
            //         <td>${item.precio}</td>
            //         <td>${item.fecha}</td>
            //     </tr>
            // `
            // });
            // document.getElementById('tblventaalu').innerHTML = tbl;
        }
    });
}

