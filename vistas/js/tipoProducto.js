/*=============================================
EDITAR 
=============================================*/
$(".tablas").on("click", ".btnEditarTipoProducto", function(){

	var idTipoProducto = $(this).attr("idTipoProducto");
	
	var datos = new FormData();
	datos.append("idTipoProducto", idTipoProducto);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/tipoProducto.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idTipoProducto").val(respuesta["IDTIPOPRODUCTO"]);
			$("#editarNombreTipoProducto").val(respuesta["NOMBRE"]);
                        $("#editarDescripcionTipoProducto").val(respuesta["DESCRIPCION"]);
		}
	});
});


/*=============================================
ELIMINAR 
=============================================*/
$(".tablas").on("click", ".btnEliminarTipoProducto", function(){

  var idTipoProducto = $(this).attr("idTipoProducto");

  swal({
    title: '¿Está seguro de borrar el tipo de producto?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar el tipo de producto!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=tipoProducto&idTipoProducto="+idTipoProducto;

    }

  });

});




