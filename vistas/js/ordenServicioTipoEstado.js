/*=============================================
EDITAR 
=============================================*/
$(".tablas").on("click", ".btnEditarOrdenServicioTipoEstado", function(){

	var idOrdenServicioTipoEstado = $(this).attr("idOrdenServicioTipoEstado");
	
	var datos = new FormData();
	datos.append("idOrdenServicioTipoEstado", idOrdenServicioTipoEstado);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/ordenServicioTipoEstado.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idOrdenServicioTipoEstado").val(respuesta["IDORDENSERVICIOTIPOESTADO"]);
			$("#editarOrdenServicioTipoEstado").val(respuesta["NOMBRE"]);
                        $("#editarDescripcionOrdenServicio").val(respuesta["DESCRIPCION"]);
		}
	});
});


/*=============================================
ELIMINAR 
=============================================*/
$(".tablas").on("click", ".btnEliminarOrdenServicioTipoEstado", function(){

  var idOrdenServicioTipoEstado = $(this).attr("idOrdenServicioTipoEstado");

  swal({
    title: '¿Está seguro de borrar el tipo de estado de la orden de servicio?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar el tipo de estado de orden de servicio!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=ordenServicioTipoEstado&idOrdenServicioTipoEstado="+idOrdenServicioTipoEstado;

    }

  });

});




