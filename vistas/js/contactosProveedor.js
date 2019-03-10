/*=============================================
EDITAR CONTACTO PROVEEDOR
=============================================*/
$(".tablas").on("click", ".btnEditarContactoProveedor", function(){

	var idProveedorContactos = $(this).attr("idEmpresaContactos");
        
	var datos = new FormData();
	datos.append("idEmpresaContactos", idProveedorContactos);
        
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
			$("#editarEmailCP").val(respuesta["EMAIL"]);
			$("#editarEmailCP").html(respuesta["EMAIL"]);
                        if(respuesta["PRINCIPAL"] == 1){
				$('#editarPrincipalCP').prop('checked', true);	
			}else{
				$('#editarPrincipalCP').prop('checked', false);	
			}
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

	var idProveedorContactos = $(this).attr("idProveedorContacto");
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
ACTIVAR CONTACTO PROVEEDOR PRINCIPAL
=============================================*/
$(".tablas").on("click", ".btnContactoProveedorPrincipal", function(){

	var idPrincipal = $(this).attr("idPrincipal");
	var principal = $(this).attr("principal");

	var datos = new FormData();
 	datos.append("idPrincipalContactoProveedor", idPrincipal);
  	datos.append("principal", principal);
        
        

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

  	if(principal == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('No Contacto Principal');
  		$(this).attr('principal',1);
  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Contacto Principal');
  		$(this).val('principal',0);
  	}
});

/*=============================================
REVISAR SI EL EMAIL YA ESTÁ REGISTRADO
=============================================*/
$("#nuevoEmailCP").change(function(){

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

	    		$("#nuevoEmailCP").parent().after('<div class="alert alert-warning">Este email ya existe en la base de datos</div>');

	    		$("#nuevoEmailCP").val(respuesta[""]);
	    	}
	    }
	});
});

/*=============================================
REVISAR SI EL EMAIL YA ESTÁ REGISTRADO COMO EMPRESA
=============================================*/
$("#nuevoEmailCP").change(function(){

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

	    		$("#nuevoEmailCP").parent().after('<div class="alert alert-warning">Este email ya pertenece a un contacto de empresa en la base de datos</div>');

	    		$("#nuevoEmailCP").val("");
	    	}
	    }
	});
});

/*=============================================
REVISAR SI EL EMAIL YA ESTÁ REGISTRADO COMO EMPRESA AL EDITAR
=============================================*/
$("#editarEmailCPR").change(function(){

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

	    		$("#editarEmailCPR").parent().after('<div class="alert alert-warning">Este email ya pertenece a un contacto de empresa en la base de datos</div>');

	    		$("#editarEmailCPR").val("");
	    	}
	    }
	});
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




