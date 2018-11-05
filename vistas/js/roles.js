/*=============================================
EDITAR 
=============================================*/
$(".tablas").on("click", ".btnEditarRol", function(){

	var idPerfil = $(this).attr("idPerfil");
	
	var datos = new FormData();
	datos.append("idPerfil", idPerfil);        
        //alert(idUsuario);
	$.ajax({
		url:"ajax/roles.ajax.php",
		method: "POST",
		data: datos,
		cache: false,
		contentType: false,
		processData: false,
		dataType: "json",
		success: function(respuesta){
                        $("#idPerfil").val(respuesta["IDPERFIL"]);
			$("#editarRol").val(respuesta["NOMBRE"]);
                        $("#editarDescripcion").val(respuesta["DESCRPCION"]);
		}
	});
});


/*=============================================
ELIMINAR 
=============================================*/
$(".tablas").on("click", ".btnEliminarRol", function(){

  var idPerfil = $(this).attr("idPerfil");

  swal({
    title: '¿Está seguro de borrar el rol?',
    text: "¡Si no lo está puede cancelar la accíón!",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      cancelButtonText: 'Cancelar',
      confirmButtonText: 'Si, borrar el rol!'
  }).then(function(result){

    if(result.value){
      
      window.location = "index.php?ruta=roles&idRol="+idPerfil;

    }

  });

});




