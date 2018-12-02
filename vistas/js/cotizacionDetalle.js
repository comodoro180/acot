/*=============================================
EDITAR DETALLE COTIZACIÓN
=============================================*/
$(".tablas").on("click", ".btnEditarCotizacionDetalle", function(){

	var idCotizacionDetalle = $(this).attr("idCotizacionDetalle");
        var datos = new FormData();
	datos.append("idCotizacionDetalle", idCotizacionDetalle);        
        $.ajax({
		url:"ajax/cotizacionDetalle.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idCotizacionDetalle").val(respuesta["IDCOTIZACIONDETALLE"]);
                        $("#editarCotizacionCD").val(respuesta["IDCOTIZACION"]);
                        $("#editarCotizacionCD").html(respuesta["COTIZACION"]);
                        $("#editarValorUnitarioCD").val(respuesta["VALORUNITARIO"]);
                        $("#editarValorCotizadoCD").val(respuesta["VALORCOTIZADO"]);
                        $("#editarCantidadOriginalCD").val(respuesta["CANTIDADORIGINAL"]);
                        $("#editarCantidadCotizadaCD").val(respuesta["CANTIDADCOTIZADA"]);
                        $("#editarEstadoCD").html(respuesta["DETALLE"]);
                        $("#editarEstadoCD").val(respuesta["IDCOTIZACIONDETALLETIPOESTADO"]);
                        $("#editarProductoCD").html(respuesta["PRODUCTO"]);
                        $("#editarProductoCD").val(respuesta["IDPRODUCTO"]);
		}
	});
});

/*=============================================
ELIMINAR
=============================================*/
$(".tablas").on("click", ".btnEliminarCotizacionDetalle", function(){

  var idCotizacionDetalle = $(this).attr("idCotizacionDetalle");
  
    swal({
    title: '¿Está seguro de borrar el detalle de la cotización?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar detalle de la cotización!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=cotizacionDetalle&idCotizacionDetalle="+idCotizacionDetalle;

    }

  });

});




