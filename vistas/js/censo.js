/*=============================================
EDITAR CENSO
=============================================*/
$(".tablas").on("click", ".btnEditarCenso", function(){
	var DNI = $(this).attr("DNI");

	var datos = new FormData();
	datos.append("DNI", DNI);

	$.ajax({
		url: "ajax/censo.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarNombre").val(respuesta["NOMBRE"]);
			$("#editarFechaNacimiento").val(respuesta["FECHA_NACIMIENTO"]);
			$("#editarDireccion").val(respuesta["DIRECCION"]);
			$("#editarTelefono").val(respuesta["TELEFONO"]);

     		$("#DNI").val(respuesta["DNI"]);

     	}

	})


})

/*=============================================
ELIMINAR CENSO
=============================================*/
$(".tablas").on("click", ".btnEliminarCenso", function(){

	 var DNI = $(this).attr("DNI");

	 swal({
	 	title: '¿Está seguro de borrar este censo?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: '¡Si, borrar censo!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?ruta=censo&DNI="+DNI;

	 	}

	 })

})