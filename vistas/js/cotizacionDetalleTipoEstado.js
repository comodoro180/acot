/*=============================================
EDITAR 
=============================================*/
$(".tablas").on("click", ".btnEditarCotizacionDetalleTipoEstado", function(){

	var idCotizacionDetalleTipoEstado = $(this).attr("idCotizacionDetalleTipoEstado");
	var datos = new FormData();
	datos.append("idCotizacionDetalleTipoEstado", idCotizacionDetalleTipoEstado);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/cotizacionDetalleTipoEstado.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idCotizacionDetalleTipoEstado").val(respuesta["IDCOTIZACIONDETALLETIPOESTADO"]);
			$("#editarNombreDetalle").val(respuesta["NOMBRE"]);
                        $("#editarDescripcionDetalle").val(respuesta["DESCRIPCION"]);
		}
	});
});


/*=============================================
ELIMINAR 
=============================================*/
$(".tablas").on("click", ".btnEliminarCotizacionDetalleTipoEstado", function(){

  var idCotizacionDetalleTipoEstado = $(this).attr("idCotizacionDetalleTipoEstado");

  swal({
    title: '¿Está seguro de borrar el estado del detalle de la cotización?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar el estado!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=cotizacionDetalleTipoEstado&idCotizacionDetalleTipoEstado="+idCotizacionDetalleTipoEstado;

    }

  });

});




