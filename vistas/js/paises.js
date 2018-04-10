/*=============================================
EDITAR 
=============================================*/
$(".tablas").on("click", ".btnEditarPais", function(){

	var idpais = $(this).attr("idpais");
	
	var datos = new FormData();
	datos.append("idpais", idpais);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/paises.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idpais").val(respuesta["IDPAIS"]);
			$("#editarNombrePais").val(respuesta["NOMBRE"]);

		}
	});
});


/*=============================================
ELIMINAR 
=============================================*/
$(".tablas").on("click", ".btnEliminarPais", function(){

  var idpais = $(this).attr("idpais");
  //var fotoUsuario = $(this).attr("fotoUsuario");
  //var usuario = $(this).attr("usuario");

  swal({
    title: '¿Está seguro de borrar el país?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar país!'
  }).then(function(result){

    if(result.value){

      //window.location = "index.php?ruta=usuarios&idUsuario="+idUsuario+"&usuario="+usuario+"&fotoUsuario="+fotoUsuario;
      window.location = "index.php?ruta=paises&idpais="+idpais;

    }

  });

});




