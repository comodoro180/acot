/*=============================================
EDITAR PRODUCTO
=============================================*/
$(".tablas").on("click", ".btnEditarProveedorProducto", function(){

	var idProveedorProducto = $(this).attr("idProveedorProducto");
	
	var datos = new FormData();
	datos.append("idProveedorProducto", idProveedorProducto);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/proveedorProducto.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idProveedorProducto").val(respuesta["IDPROVEEDORPRODUCTO"]);
			$("#editarIdProducto").html(respuesta["PRODUCTO"]);
                        $("#editarIdProducto").val(respuesta["IDPRODUCTO"]);
                        $("#editarIdProveedor").html(respuesta["PROVEEDOR"]);
			$("#editarIdProveedor").val(respuesta["IDPROVEEDOR"]);
                        $("#editarValorUnitario").val(respuesta["VALORUNITARIO"]);
		}
	});
});

/*=============================================
ELIMINAR
=============================================*/
$(".tablas").on("click", ".btnEliminarProveedorProducto", function(){

  var idProveedorProducto = $(this).attr("idProveedorProducto");
  //var fotoUsuario = $(this).attr("fotoUsuario");
  //var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar el registro?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar registro!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=proveedorProductos&idProveedorProducto="+idProveedorProducto;

    }

  });

});




