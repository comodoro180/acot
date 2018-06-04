/*=============================================
EDITAR
=============================================*/
$(".tablas").on("click", ".btnEditarEmpresa", function(){

	var idEmpresa = $(this).attr("idEmpresa");
	
	var datos = new FormData();
	datos.append("idEmpresa", idEmpresa);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/empresas.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idEmpresa").val(respuesta["IDEMPRESA"]);
			$("#editarEmpresa").val(respuesta["NOMBRE"]);
			$("#editarTelefono").val(respuesta["TELEFONOPRINCIPAL"]);
                        $("#editarDireccion").val(respuesta["DIRECCION"]);
			$("#editarNit").val(respuesta["NIT"]);                        
			$("#editarEmpresaCiudad").html(respuesta["CIUDAD"]);
                        $("#editarEmpresaCiudad").val(respuesta["IDCIUDAD"]);
		}
	});
});

/*=============================================
ACTIVAR
=============================================*/
$(".tablas").on("click", ".btnActivarEmpresa", function(){

	var idEmpresa = $(this).attr("idEmpresa");
	var estadoEmpresa = $(this).attr("estadoEmpresa");

	var datos = new FormData();
 	datos.append("activarIdEmpresa", idEmpresa);
  	datos.append("activarEmpresa", estadoEmpresa);

  	$.ajax({

	  url:"ajax/empresas.ajax.php",
	  method: "POST",
	  data: datos,
	  cache: false,
          contentType: false,
          processData: false,
          success: function(respuesta){
          }
  	});

  	if(estadoEmpresa == 0){

  		$(this).removeClass('btn-success');
  		$(this).addClass('btn-danger');
  		$(this).html('Inactiva');
  		$(this).attr('estadoEmpresa',1);

  	}else{
  		$(this).addClass('btn-success');
  		$(this).removeClass('btn-danger');
  		$(this).html('Activa');
  		$(this).attr('estadoEmpresa',0);

  	}

});


/*=============================================
ELIMINAR
=============================================*/
$(".tablas").on("click", ".btnEliminarEmpresa", function(){

  var idEmpresa = $(this).attr("idEmpresa");
  //var fotoUsuario = $(this).attr("fotoUsuario");
  //var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar la empresa?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar empresa !'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=empresas&idEmpresa="+idEmpresa;

    }

  });

});




