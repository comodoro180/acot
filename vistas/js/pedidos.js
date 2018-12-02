/*=============================================
EDITAR PEDIDO
=============================================*/
$(".tablas").on("click", ".btnEditarPedido", function(){

	var idPedido = $(this).attr("idPedido");
        var datos = new FormData();
	datos.append("idPedido", idPedido);        
        $.ajax({
		url:"ajax/pedidos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idPedido").val(respuesta["IDPEDIDO"]);
                        $("#editarFechaEP").val(respuesta["FECHAENTREGA"]);
			$("#editarObservacionesP").val(respuesta["OBSERVACIONES"]);
                        $("#editarPedidoTipoEstadoP").html(respuesta["ESTADO"]);
                        $("#editarPedidoTipoEstadoP").val(respuesta["IDPEDIDOTIPOESTADO"]);
                        $("#editarEmpresaP").html(respuesta["EMPRESA"]);
                        $("#editarEmpresaP").val(respuesta["IDEMPRESA"]);
                        $("#editarUsuarioP").html(respuesta["USUARIO"]);
                        $("#editarUsuarioP").val(respuesta["IDUSUARIO"]);
		}
	});
});

/*=============================================
ELIMINAR
=============================================*/
$(".tablas").on("click", ".btnEliminarPedido", function(){

  var idPedido = $(this).attr("idPedido");
  
    swal({
    title: '¿Está seguro de borrar el pedido?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar pedido!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=pedidos&idPedido="+idPedido;

    }

  });

});




