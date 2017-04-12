var ajaxComensales = function(accion, url, formulario){
	
	var datos = $('#'+formulario).serializeArray();
	datos.push({name:'accion', value:accion});
	
	$.ajax({
		
		url:url,
		data:datos,
		type:"POST",
		datatype:"JSON",
		success:function(response){
//			console.log("Registro Insertado");
			if(response.comensales !=null){
				
				$.each(response.comensales, function(index, comensal){
					
					$('#tablaComensales tbody').append(
					
						"<tr><td>"+comensal.id_cliente+"</td>"+
						"<td>"+comensal.nombre+"</td>"+
						"<td>"+comensal.apaterno+"</td>"+
						"<td>"+comensal.amaterno+"</td>"+
						"<td>"+comensal.correo+"</td>"+"</tr>"

					);
					
				});
				
			}
		}
		
	});

}