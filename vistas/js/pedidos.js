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
                    
                        datos = respuesta["FECHAENTREGA"].split(" ");
                        fecha = datos[0].split("-");
                        hora = datos[1].split(":");
                        
                        $("#idPedido").val(respuesta["IDPEDIDO"]);
                        $("#editarFechaEP").val(fecha["0"]+"-"+fecha["1"]+"-"+fecha["2"]+"T"+hora[0]+":"+hora[1]);
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




