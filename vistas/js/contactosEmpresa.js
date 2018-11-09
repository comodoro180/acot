/*=============================================
EDITAR CONTACTO EMPRESA
=============================================*/
$(".tablas").on("click", ".btnEditarContactoEmpresa", function(){

	var idEmpresaContactos = $(this).attr("idEmpresaContactos");
	
	var datos = new FormData();
	datos.append("idEmpresaContactos", idEmpresaContactos);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/contactosEmpresa.ajax.php",
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
                        $("#editarContactoEmpresa").val(respuesta["NOMBRE"]);
                        $("#editarIdEmpresa").val(respuesta["IDEMPRESA"]);
		}
	});
});

/*=============================================
ACTIVAR CONTACTO EMPRESA
=============================================*/
$(".tablas").on("click", ".btnActivarContactoEmpresa", function(){

	var idEmpresaContactos = $(this).attr("idEmpresaContactos");
	var estadoContactoEmpresa = $(this).attr("estadoContactoEmpresa");

	var datos = new FormData();
 	datos.append("activarIdContactoEmpresa", idEmpresaContactos);
  	datos.append("activarContactoEmpresa", estadoContactoEmpresa);

  	$.ajax({

	  url:"ajax/contactosEmpresa.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
          contentType: false,
          processData: false,
          success: function(respuesta){
          }
  	});

  	if(estadoContactoEmpresa == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Inactivo');
  		$(this).attr('estadoContactoEmpresa',1);

  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activo');
  		$(this).attr('estadoContactoEmpresa',0);

  	}

});


/*=============================================
ELIMINAR CONTACTO EMPRESA
=============================================*/
$(".tablas").on("click", ".btnEliminarContactoEmpresa", function(){

  var idContactoEmpresa = $(this).attr("idEmpresaContactos");
  //var fotoUsuario = $(this).attr("fotoUsuario");
  //var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar el contacto de la empresa?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar contacto de la empresa!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=contactosEmpresa&idEmpresaContactos="+idContactoEmpresa;

    }

  });

});




