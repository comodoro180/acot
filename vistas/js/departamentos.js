/*=============================================
EDITAR 
=============================================*/
$(".tablas").on("click", ".btnEditarDepartamento", function(){

	var iddepartamento = $(this).attr("iddepartamento");
	
	var datos = new FormData();
	datos.append("iddepartamento", iddepartamento);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/departamentos.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#iddepartamento").val(respuesta["IDDEPARTAMENTO"]);
                        $("#editarDepartamentoIdpais").val(respuesta["IDPAIS"]);
                        $("#editarDepartamentoIdpais").html(respuesta["PAIS"]);
			$("#editarDepartamento").val(respuesta["NOMBRE"]);

		}
	});
});


/*=============================================
ELIMINAR 
=============================================*/
$(".tablas").on("click", ".btnEliminarDepartamento", function(){

  var iddepartamento = $(this).attr("iddepartamento");
  //var fotoUsuario = $(this).attr("fotoUsuario");
  //var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar el departamento?',
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
      window.location = "index.php?ruta=departamentos&iddepartamento="+iddepartamento;

    }

  });

});




