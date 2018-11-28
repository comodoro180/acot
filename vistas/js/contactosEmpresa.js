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
                        $("#editarContactoEmpresa").val(respuesta["NOMBRE"]);
                        $("#editarIdEmpresaContactoEmpresa").html(respuesta["EMPRESA"]);
                        $("#editarIdEmpresaContactoEmpresa").val(respuesta["IDEMPRESA"]);
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
ACTIVAR CONTACTO EMPRESA PRINCIPAL
=============================================*/
$(".tablas").on("click", ".btnPrincipal", function(){

	var idPrincipal = $(this).attr("idPrincipal");
	var principal = $(this).attr("principal");

	var datos = new FormData();
 	datos.append("idPrincipalContactoEmpresa", idPrincipal);
  	datos.append("principal", principal);

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

  	if(principal == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('No Contacto Principal');
  		$(this).attr('principal',1);

  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Contacto Principal');
  		$(this).attr('principal',0);

  	}

});
/*=============================================
REVISAR SI EL CONTACTO DE EMPRESA YA ESTÁ REGISTRADO
=============================================*/

$("#nuevoContactoEmpresa").change(function(){

	$(".alert").remove();

	var contactoEmpresa = $(this).val();

	var datos = new FormData();
	datos.append("validarContactoEmpresa", contactoEmpresa);

	 $.ajax({
	    url:"ajax/contactosEmpresa.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoContactoEmpresa").parent().after('<div class="alert alert-warning">Este usuario ya existe en la base de datos</div>');

	    		$("#nuevoContactoEmpresa").val("");

	    	}

	    }

	});
});

/*=============================================
REVISAR SI EL EMAIL YA ESTÁ REGISTRADO
=============================================*/
$("#nuevoEmailCE").change(function(){

	$(".alert").remove();

	var email = $(this).val();

	var datos = new FormData();
	datos.append("validarEmail", email);

	 $.ajax({
	    url:"ajax/contactosEmpresa.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoEmailCE").parent().after('<div class="alert alert-warning">Este email ya existe en la base de datos</div>');

	    		$("#nuevoEmailCE").val("");
	    	}
	    }
	});
});

/*=============================================
REVISAR SI EL EMAIL YA ESTÁ REGISTRADO COMO PROVEEDOR
=============================================*/
$("#nuevoEmailCE").change(function(){

	$(".alert").remove();

	var email = $(this).val();

	var datos = new FormData();
	datos.append("validarEmail", email);

	 $.ajax({
	    url:"ajax/contactosProveedor.ajax.php",
	    method:"POST",
	    data: datos,
	    cache: false,
	    contentType: false,
	    processData: false,
	    dataType: "json",
	    success:function(respuesta){
	    	
	    	if(respuesta){

	    		$("#nuevoEmailCE").parent().after('<div class="alert alert-warning">Este email ya pertenece a un contacto de proveedor en la base de datos</div>');

	    		$("#nuevoEmailCE").val("");
	    	}
	    }
	});
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




