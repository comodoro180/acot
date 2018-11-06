/*=============================================
EDITAR PRODUCTO
=============================================*/
$(".tablas").on("click", ".btnEditarProducto", function(){

	var idProducto = $(this).attr("idProducto");
	
	var datos = new FormData();
	datos.append("idProducto", idProducto);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/productos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idProducto").val(respuesta["IDPRODUCTO"]);
			$("#editarProducto").val(respuesta["NOMBRE"]);
			$("#editarDescripcion").val(respuesta["DESCRIPCION"]);
                        $("#editarTipoProducto").val(respuesta["IDTIPOPRODUCTO"]);
		}
	});
});

/*=============================================
ACTIVAR
=============================================*/
$(".tablas").on("click", ".btnActivarProducto", function(){

	var idProducto = $(this).attr("idProducto");
	var estadoProducto = $(this).attr("estadoProducto");

	var datos = new FormData();
 	datos.append("activarIdProducto", idProducto);
  	datos.append("activarProducto", estadoProducto);

  	$.ajax({

	  url:"ajax/productos.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
          contentType: false,
          processData: false,
          success: function(respuesta){
          }
  	});

  	if(estadoProducto == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Inactivo');
  		$(this).attr('estadoProducto',1);

  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activo');
  		$(this).attr('estadoProducto',0);

  	}

});


/*=============================================
ELIMINAR
=============================================*/
$(".tablas").on("click", ".btnEliminarProducto", function(){

  var idProducto = $(this).attr("idProducto");
  //var fotoUsuario = $(this).attr("fotoUsuario");
  //var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar el producto?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar producto!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=productos&idProducto="+idProducto;

    }

  });

});




