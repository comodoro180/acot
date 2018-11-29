/*=============================================
EDITAR 
=============================================*/
$(".tablas").on("click", ".btnEditarCotizacionTipoEstado", function(){

	var idCotizacionTipoEstado = $(this).attr("idCotizacionTipoEstado");
	
	var datos = new FormData();
	datos.append("idCotizacionTipoEstado", idCotizacionTipoEstado);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/cotizacionTipoEstado.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idCotizacionTipoEstado").val(respuesta["IDCOTIZACIONTIPOESTADO"]);
			$("#editarNombre").val(respuesta["NOMBRE"]);
                        $("#editarDescripcion").val(respuesta["DESCRIPCION"]);
		}
	});
});


/*=============================================
ELIMINAR 
=============================================*/
$(".tablas").on("click", ".btnEliminarCotizacionTpoEstado", function(){

  var idCotizacionTipoEstado = $(this).attr("idCotizacionTipoEstado");

  swal({
    title: '¿Está seguro de borrar el tipo de estado de la cotización?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar el tipo de estado!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=cotizacionTipoEstado&idCotizacionTipoEstado="+idCotizacionTipoEstado;

    }

  });

});




