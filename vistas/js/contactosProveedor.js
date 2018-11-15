/*=============================================
EDITAR CONTACTO PROVEEDOR
=============================================*/
$(".tablas").on("click", ".btnEditarContactoProveedor", function(){

	var idProveedorContactos = $(this).attr("idEmpresaContactos");
	
	var datos = new FormData();
	datos.append("idEmpresaContactos", idProveedorContactos);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/contactosProveedor.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idEmpresaContactos").val(respuesta["IDEMPRESACONTACTOS"]);
			$("#editarEmail").val(respuesta["EMAIL"]);
			$("#editarPrincipal").val(respuesta["PRINCIPAL"]);
                        $("#editarContactoProveedor").val(respuesta["NOMBRE"]);
                        $("#editarIdProveedor").html(respuesta["PROVEEDOR"]);
                        $("#editarIdProveedor").val(respuesta["IDPROVEEDOR"]);
		}
	});
});

/*=============================================
ACTIVAR CONTACTO PROVEEDOR
=============================================*/
$(".tablas").on("click", ".btnActivarContactoProveedor", function(){

	var idProveedorContactos = $(this).attr("idProveedorContactos");
	var estadoContactoProveedor = $(this).attr("estadoContactoProveedor");

	var datos = new FormData();
 	datos.append("activarIdContactoProveedor", idProveedorContactos);
  	datos.append("activarContactoProveedor", estadoContactoProveedor);

  	$.ajax({

	  url:"ajax/contactosProveedor.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
          contentType: false,
          processData: false,
          success: function(respuesta){
          }
  	});

  	if(estadoContactoProveedor == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Inactivo');
  		$(this).attr('estadoContactoProveedor',1);

  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activo');
  		$(this).attr('estadoContactoProveedor',0);

  	}

});


/*=============================================
ELIMINAR CONTACTO PROVEEDOR
=============================================*/
$(".tablas").on("click", ".btnEliminarContactoProveedor", function(){

  var idEmpresaContactos = $(this).attr("idEmpresaContactos");
  //var fotoUsuario = $(this).attr("fotoUsuario");
  //var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar el contacto del proveedor?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar contacto del proveedor!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=contactosProveedor&idProveedorContactos="+idEmpresaContactos;

    }

  });

});




