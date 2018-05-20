/*=============================================
EDITAR 
=============================================*/
$(".tablas").on("click", ".btnEditarCiudad", function(){

	var iddepartamento = $(this).attr("idciudad");
	
	var datos = new FormData();
	datos.append("idciudad", iddepartamento);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/ciudades.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idciudad").val(respuesta["IDCIUDAD"]);
                        $("#editarCiudadIddepartamento").val(respuesta["IDDEPARTAMENTO"]);
                        $("#editarCiudadIddepartamento").html(respuesta["DEPARTAMENTO"]);
			$("#editarCiudad").val(respuesta["NOMBRE"]);

		}
	});
});


/*=============================================
ELIMINAR 
=============================================*/
$(".tablas").on("click", ".btnEliminarCiudad", function(){

  var idciudad = $(this).attr("idciudad");
  //var fotoUsuario = $(this).attr("fotoUsuario");
  //var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar la ciudad?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar!'
  }).then(function(result){

    if(result.value){

      //window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
      window.location = "index.php?ruta=ciudades&idciudad="+idciudad;

    }

  });

});




