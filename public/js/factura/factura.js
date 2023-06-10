//Buscar Persona
$(document).ready(function() {
    $( '#idpersona' ).select2({
        width: '100%',
        ajax: {
            url: "../controlador/alumnos/buscaracudiente.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    persona: params.term // search term
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };
            },
            cache: true
        },
        minimumInputLength: 2
    }).on('change', function (e){
        var id = $('#idpersona').select2('data')[0].id;
        var nomacu = $('#idpersona').select2('data')[0].text;
		var nomalu = $('#idpersona').select2('data')[0].nomalu;
		var direcc = $('#idpersona').select2('data')[0].direcc;

        $('#id').html(id);
        document.getElementById("nomacu").value=nomacu;
        document.getElementById("nomalu").value=nomalu;
		document.getElementById("direcc").value=direcc;
    })
});

function mostrar_items(){
	var parametros={"action":"ajax"};
	$.ajax({
		url:'facturas/items.php',
		data: parametros,
			beforeSend: function(objeto){
			$('.items').html('Cargando...');
		},
		success:function(data){
			$(".items").html(data).fadeIn('slow');
	}
	})
}

function eliminar_item(id){
	$.ajax({
		type: "GET",
		url: "facturas/items.php",
		data: "action=ajax&id="+id,
			beforeSend: function(objeto){
				$('.items').html('Cargando...');
			},
		success: function(data){
			$(".items").html(data).fadeIn('slow');
		}
	});
}

$("#guardar_item").submit(function(event){
parametros = $(this).serialize();
	$.ajax({
	type: "POST",
	url:'facturas/items.php',
	data: parametros,
		beforeSend: function(objeto){
			$('.items').html('Cargando...');
		},
		success:function(data){
		$(".items").html(data).fadeIn('slow');
		$("#producto").modal('hide');
		}
	})
	event.preventDefault();
})

$("#datos_factura").submit(function(){
var cliente = $("#idpersona").val();
	if (cliente>0){
	window.open('vista/facturas/ticket.php?cliente='+cliente);
	} else {
	alert("Selecciona el cliente");
	return false;
	}
});

mostrar_items();

//Llenar Campos Producto
$('#guardar_item').change(function(){
    //condicion para limpiar campos
	
    if($('#idproducto').val()==0){
        $('#precio').val("0");
        return
    }
    $.ajax({
        type:"POST",
        data:"idproducto=" + $('#idproducto').val(),
        url:"../controlador/productos/detalle.php",
        success:function(respuesta){
            respuesta=jQuery.parseJSON(respuesta);
            $('#precio').val(respuesta['precio']);
			$('#detalle').val(respuesta['nombre']);
        }
    });
});

//Llenar Campos Detalle
$('#idtippagou').change(function(){
    //condicion para limpiar campos
    var valor = $(this).val();
	switch (valor) {
		case '1':
			$("#detalle").val("ABONO MATRICULA");
		break;
		case '2':
			$("#detalle").val("PAGO TOTAL MATRICULA");
		break;
		case '3':
			$("#detalle").val("ABONO PENSION");
		break;
		case '3':
			$("#detalle").val("PAGO TOTAL PENSION");
		break;
	}
});
