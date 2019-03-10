/*=============================================
EDITAR PROVEEDOR TIPO PRODUCTO
=============================================*/
$(".tablas").on("click", ".btnEditarProveedorTipoProducto", function(){

	var idProveedorTipoProducto = $(this).attr("idProveedorTipoProducto");
	
	var datos = new FormData();
	datos.append("idProveedorTipoProducto", idProveedorTipoProducto);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/proveedorTipoProducto.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idProveedorTipoProducto").val(respuesta["IDPROVEEDORTIPOPRODUCTO"]);
			$("#editarIdTipoProducto").html(respuesta["TIPOPRODUCTO"]);
                        $("#editarIdTipoProducto").val(respuesta["IDTIPOPRODUCTO"]);
                        $("#editarIdProveedor").html(respuesta["PROVEEDOR"]);
			$("#editarIdProveedor").val(respuesta["IDPROVEEDOR"]);
		}
	});
});

/*=============================================
ELIMINAR PROVEEDOR TIPO PRODUCTO
=============================================*/
$(".tablas").on("click", ".btnEliminarProveedorTipoProducto", function(){

  var idProveedorTipoProducto = $(this).attr("idProveedorTipoProducto");
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
      
      window.location = "index.php?ruta=proveedorTipoProducto&idProveedorTipoProducto="+idProveedorTipoProducto;

    }

  });

});