$(document).ready(function() {
    $( ".cliente" ).select2({
    ajax: {
        url: "ajax/clientes_json.php",
        dataType: 'json',
        delay: 250,
        data: function (params) {
            return {
                q: params.term // search term
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
		var email = $('.cliente').select2('data')[0].email;
		var telefono = $('.cliente').select2('data')[0].telefono;
		var direccion = $('.cliente').select2('data')[0].direccion;
		$('#email').html(email);
		$('#telefono').html(telefono);
		$('#direccion').html(direccion);
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
	
	$( "#guardar_item" ).submit(function( event ) {
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
				$("#myModal").modal('hide');
			}
		})
		
	  event.preventDefault();
	})
	$("#datos_factura").submit(function(){
		  var cliente = $("#cliente").val();
		  
		 
		  
		  if (cliente>0)
		 {
			window.open('ticket.php?cliente='+cliente);
		 } else {
			 alert("Selecciona el cliente");
			 return false;
		 }
		 
	 });
		

		mostrar_items();
		
