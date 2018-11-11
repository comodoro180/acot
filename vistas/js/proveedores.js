/*=============================================
EDITAR PROVEEDOR
=============================================*/
$(".tablas").on("click", ".btnEditarProveedor", function(){

	var idProveedor = $(this).attr("idProveedor");
	
	var datos = new FormData();
	datos.append("idProveedor", idProveedor);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/proveedores.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idProveedor").val(respuesta["IDPROVEEDOR"]);
			$("#editarNit").val(respuesta["NIT"]);
                        $("#editarProveedor").val(respuesta["NOMBRE"]);
                        $("#editarDireccion").val(respuesta["DIRECCION"]);
                        $("#editarTelefono1").val(respuesta["TELEFONO1"]);
			$("#editarTelefono2").val(respuesta["TELEFONO2"]);
                        $("#editarCiudadProveedor").html(respuesta["CIUDAD"]);
                        $("#editarCiudadProveedor").val(respuesta["IDCIUDAD"]);
		}
	});
});

/*=============================================
ACTIVAR
=============================================*/
$(".tablas").on("click", ".btnActivarProveedor", function(){

	var idProveedor = $(this).attr("idProveedor");
	var estadoProveedor = $(this).attr("estadoProveedor");

	var datos = new FormData();
 	datos.append("activarIdProveedor", idProveedor);
  	datos.append("activarProveedor", estadoProveedor);

  	$.ajax({

	  url:"ajax/proveedores.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
          contentType: false,
          processData: false,
          success: function(respuesta){
          }
  	});

  	if(estadoProveedor == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Inactivo');
  		$(this).attr('estadoProveedor',1);

  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activo');
  		$(this).attr('estadoProveedor',0);

  	}

});


/*=============================================
ELIMINAR
=============================================*/
$(".tablas").on("click", ".btnEliminarProveedor", function(){

  var idProveedor = $(this).attr("idProveedor");
  //var fotoUsuario = $(this).attr("fotoUsuario");
  //var usuario = $(this).attr("usuario");

  swal({
    title: '�Est� seguro de borrar el proveedor?',
    text: "�Si no lo est� puede cancelar la acc��n!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar proveedor!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=proveedores&idProveedor="+idProveedor;

    }

  });

});