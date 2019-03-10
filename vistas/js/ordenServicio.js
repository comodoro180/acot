/*=============================================
EDITAR PEDIDO
=============================================*/
$(".tablas").on("click", ".btnEditarOrdenServicio", function(){

	var idOrdenServicio = $(this).attr("idOrdenServicio");
        var datos = new FormData();
	datos.append("idOrdenServicio", idOrdenServicio);        
        $.ajax({
		url:"ajax/ordenServicio.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idOrdenServicio").val(respuesta["IDORDENSERVICIO"]);
                        $("#editarTipoEstadoOS").html(respuesta["ESTADO"]);
                        $("#editarTipoEstadoOS").val(respuesta["IDORDENSERVICIOTIPOESTADO"]);
                        $("#editarCotizacionOS").html(respuesta["COTIZACION"]);
                        $("#editarCotizacionOS").val(respuesta["IDCOTIZACION"]);
                        $("#editarUsuarioOS").html(respuesta["USUARIO"]);
                        $("#editarUsuarioOS").val(respuesta["IDUSUARIO"]);
		}
	});
});

/*=============================================
ELIMINAR
=============================================*/
$(".tablas").on("click", ".btnEliminarOrdenServicio", function(){

  var idOrdenServicio = $(this).attr("idOrdenServicio");
  
    swal({
    title: '¿Está seguro de borrar la orden de servicio?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar orden de Servicio!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=ordenServicio&idOrdenServicio="+idOrdenServicio;

    }

  });

});




