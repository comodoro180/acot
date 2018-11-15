/*=============================================
EDITAR 
=============================================*/
$(".tablas").on("click", ".btnEditarPedidoTipoEstado", function(){

	var idPedidoTipoEstado = $(this).attr("idPedidoTipoEstado");
	
	var datos = new FormData();
	datos.append("idPedidoTipoEstado", idPedidoTipoEstado);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/pedidoTipoEstado.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idPedidoTipoEstado").val(respuesta["IDPEDIDOTIPOESTADO"]);
			$("#editarPedidoTipoEstado").val(respuesta["NOMBRE"]);
                        $("#editarDescripcion").val(respuesta["DESCRIPCION"]);
		}
	});
});


/*=============================================
ELIMINAR 
=============================================*/
$(".tablas").on("click", ".btnEliminarPedidoTipoEstado", function(){

  var idPedidoTipoEstado = $(this).attr("idPedidoTipoEstado");

  swal({
    title: '¿Está seguro de borrar el tipo de estado de pedidos?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar el tipo de estado de pedidos!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=pedidoTipoEstado&idPedidoTipoEstado="+idPedidoTipoEstado;

    }

  });

});




