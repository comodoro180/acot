/*=============================================
EDITAR DETALLE PEDIDO
=============================================*/
$(".tablas").on("click", ".btnEditarPedidoDetalle", function(){

	var idPedidoDetalle = $(this).attr("idPedidoDetalle");
        var datos = new FormData();
	datos.append("idPedidoDetalle", idPedidoDetalle);        
        $.ajax({
		url:"ajax/pedidoDetalle.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idPedidoDetalle").val(respuesta["IDPEDIDODETALLE"]);
                        $("#editarCantidadPD").val(respuesta["CANTIDAD"]);
                        $("#editarPedidoPD").html(respuesta["PEDIDO"]);
                        $("#editarPedidoPD").val(respuesta["IDPEDIDO"]);
                        $("#editarProductoPD").html(respuesta["PRODUCTO"]);
                        $("#editarProductoPD").val(respuesta["IDPRODUCTO"]);
		}
	});
});

/*=============================================
ELIMINAR
=============================================*/
$(".tablas").on("click", ".btnEliminarPedidoDetalle", function(){

  var idPedidoDetalle = $(this).attr("idPedidoDetalle");
  
    swal({
    title: '¿Está seguro de borrar el detalle del pedido?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar detalle del pedido!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=pedidoDetalle&idPedidoDetalle="+idPedidoDetalle;

    }

  });

});




