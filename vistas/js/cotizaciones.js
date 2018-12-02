/*=============================================
EDITAR PEDIDO
=============================================*/
$(".tablas").on("click", ".btnEditarCotizacion", function(){

	var idCotizacion = $(this).attr("idCotizacion");
        var datos = new FormData();
	datos.append("idCotizacion", idCotizacion);        
        $.ajax({
		url:"ajax/cotizaciones.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idCotizacion").val(respuesta["IDCOTIZACION"]);
                        $("#editarFechaVC").val(respuesta["FECHAVENCIMIENTO"]);
			$("#editarObservacionesC").val(respuesta["OBSERVACIONES"]);
                        $("#editarCotizacionTipoEstado").html(respuesta["ESTADO"]);
                        $("#editarCotizacionTipoEstado").val(respuesta["IDCOTIZACIONTIPOESTADO"]);
                        $("#editarPedidoC").html(respuesta["PEDIDO"]);
                        $("#editarPedidoC").val(respuesta["IDPEDIDO"]);                        
                        $("#editarProveedorC").html(respuesta["PROVEEDOR"]);
                        $("#editarProveedorC").val(respuesta["IDPROVEEDOR"]);
                        $("#editarUsuarioC").html(respuesta["USUARIO"]);
                        $("#editarUsuarioC").val(respuesta["IDUSUARIO"]);
		}
	});
});

/*=============================================
ELIMINAR
=============================================*/
$(".tablas").on("click", ".btnEliminarCotizacion", function(){

  var idCotizacion = $(this).attr("idCotizacion");
  
    swal({
    title: '¿Está seguro de borrar la cotización?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar cotización!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=cotizaciones&idCotizacion="+idCotizacion;

    }

  });

});




