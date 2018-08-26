$("#btn-login").click(function(){
	var parametros = "correo="+$("#txt-correo").val() + "&"+
					  "pass="+$("#txt-pass").val();

	$.ajax({
		url: '../ajax/api.php?accion=iniciarSesion',
		data: parametros,
		method: 'POST',
		dataType: 'json',
		success:function(respuesta){
			if(respuesta.codigoResultado == 0){
					window.location = "../index.php";
			}else{
				console.log(respuesta);
					window.location = "../php/form-login.php";

			}
				
         	
		},error: function(error){
			console.log(error);
		}
	});
	
});



function agregarDestacado(){

	var parametros = 
					  "codigoArchivo="+$('#slc-archivos-normales').find('option:selected').val();

	$.ajax({
		url: 'ajax/api.php?accion=agregarDestacado',
		data: parametros,
		method: 'POST',
		dataType: 'json',
		success:function(respuesta){
			if (respuesta) {
				alert("Archivo agregado correctamente");
				
			}else{
				alert("algo salio mal");
			}
			
         	
		},error: function(error){
			console.log(error);
		}
	});
}

function agregarPapelera(){

	var parametros = 
					  "codigoArchivo="+$('#slc-archivos-normales').find('option:selected').val();

	$.ajax({
		url: 'ajax/api.php?accion=agregarPapelera',
		data: parametros,
		method: 'POST',
		dataType: 'json',
		success:function(respuesta){
			if (respuesta) {
				alert("Archivo agregado correctamente");
				
			}else{
				alert("algo salio mal");
			}
			
         	
		},error: function(error){
			console.log(error);
		}
	});
}




function crearCarpeta(codigoUsuario){
	var parametros = "nombre="+$("#txt-nombre-carpeta").val()+"&"+"codigoUsuario="+codigoUsuario;
	$.ajax({
		url: 'ajax/api.php?accion=crearCarpeta',
		data: parametros,
		method: 'POST',
		dataType: 'json',
		success:function(respuesta){
				alert("Carpeta creada");
				
         	
		},error: function(error){
			console.log(error);
		}
	});
}

function cargarArchivos(codigoUsuario){
	var parametros = "codigoUsuario="+codigoUsuario;
	$.ajax({
		url: 'ajax/api.php?accion=cargarArchivosUsuario',
		data: parametros,
		method: 'POST',
		dataType: 'json',
		success:function(respuesta){
			var contenido = '<br>';
			contenido += '<select class="form-control inputs" id="slc-archivos-normales">';
					for(var i = 0; i<respuesta.length; i++){
					contenido += '<option value="'+respuesta[i].CODIGO_ARCHIVO+'">'+respuesta[i].NOMBRE+'</option>';
					} 
                    contenido += '</select>';

                    console.log(respuesta);

            $("#modal-destacado").html(contenido);
            $("#modal-papelera").html(contenido);
				
         	
		},error: function(error){
			console.log(error);
		}
	});
}


$("#btn-continuar").click(function(){
	$("#div-paso-2").removeAttr("hidden");
	$("#div-paso-1").attr("hidden","hidden");
	
});



$("#btn-continuar-2").click(function(){
	$("#div-paso-2").attr("hidden", "hidden");
	$("#div-paso-3").removeAttr("hidden");
});

$("#btn-crear-cuenta").click(function(){
	var parametros = "nombre="+$("#txt-nombre").val()+"&"+
				"apellido="+$("#txt-apellido").val()+"&"+
				"correo="+$("#txt-correo").val()+"&"+
				"psw=" +$("#txt-psw").val()+"&"+
				"psw-confirm="+$("#txt-psw-confirm").val()+"&"+
				"pais="+$('#slc-paises').find('option:selected').val()+"&"+
				"telefono="+$('#txt-numero-celular').val()+"&"+
				"dia="+$("#txt-dia-nacimiento").val()+"&"+
				"mes="+$('#slc-mes-nacimiento').find('option:selected').val()+"&"+
				"anio="+$("#txt-anio-nacimiento").val()+"&"+
				"tipoCorreo="+$('#slc-correos').find('option:selected').val()+"&"+
				"correoTxt="+$('#slc-correos').find('option:selected').text()+"&"+
				"genero="+$('#slc-generos').find('option:selected').val();

		$.ajax({
		url: '../ajax/api.php?accion=registrarUsuario',
		data: parametros,
		method: 'POST',
		dataType: 'json',
		success:function(respuesta){
			if(respuesta){
					window.location.href = "../php/form-login.php";
			}else{
					window.location = "../php/form-registro.php";
			}
			
         	
		},error: function(error){
			console.log(error);
		}
	});



});



$(document).ready(function(){

	$.ajax({

		url: 'ajax/api.php?accion=cargarPaises',
		dataType: 'json',
		success:function(respuesta){
			var contenido = '';
			contenido += '<select class="form-control inputs" id="slc-paises">';
					for(var i = 0; i<respuesta.length; i++){
					contenido += '<option value="'+respuesta[i].CODIGO_LUGAR+'">'+respuesta[i].NOMBRE_LUGAR+'</option>';
					} 
                    contenido += '</select>';

                    console.log(respuesta);

            $("#div-paises").html(contenido);
			console.log(respuesta);
         	
		},error: function(error){
			console.log(error);
		}
	});

});

$(document).ready(function(){
	$.ajax({
		url: 'ajax/api.php?accion=cargarArchivos',
		dataType: 'json',
		success:function(respuesta){
			var contenido = '';
					for(var i = 0; i<respuesta.length; i++){
					contenido += '<option value="'+respuesta[i].CODIGO_TIPO_ARCHIVO+'">'+respuesta[i].TIPO_ARCHIVO+'</option>';
					} 


                    console.log(respuesta);

            $("#slc-archivos").html(contenido);
			console.log(respuesta);
         	
		},error: function(error){
			console.log(error);
		}
	});
});
$(document).ready(function(){
	$.ajax({
		url: 'ajax/api.php?accion=cargarPrivacidad',
		dataType: 'json',
		success:function(respuesta){
			var contenido = '';

					for(var i = 0; i<respuesta.length; i++){
					contenido += '<option value="'+respuesta[i].CODIGO_TIPO_PRIVACIDAD+'">'+respuesta[i].NOMBRE_TIPO_PRIVACIDAD+'</option>';
					} 

                    console.log(contenido);

            $("#slc-privacidad").html(contenido);
			console.log(respuesta);
         	
		},error: function(error){
			console.log(error);
		}
	});
});

$(document).ready(function(){
	$.ajax({
		url: '../ajax/api.php?accion=cargarCorreos',
		dataType: 'json',
		success:function(respuesta){
			var contenido = '';
			contenido += '<select class="form-control inputs" id="slc-correos">';
					for(var i = 0; i<respuesta.length; i++){
					contenido += '<option value="'+respuesta[i].CODIGO_CORREO+'">'+respuesta[i].NOMBRE_TIPO_CORREO+'</option>';
					} 
                    contenido += '</select>';

                    console.log(contenido);

            $("#div-correos").html(contenido);
			console.log(respuesta);
         	
		},error: function(error){
			console.log(error);
		}
	});
});

$(document).ready(function(){
	$.ajax({
		url: '../ajax/api.php?accion=cargarGeneros',
		dataType: 'json',
		success:function(respuesta){
			var contenido = '';
			contenido += '<select class="form-control inputs" id="slc-generos">';
					for(var i = 0; i<respuesta.length; i++){
					contenido += '<option value="'+respuesta[i].CODIGO_GENERO+'">'+respuesta[i].GENERO+'</option>';
					} 
                    contenido += '</select>';

                    console.log(contenido);

            $("#div-generos").html(contenido);
			console.log(respuesta);
         	
		},error: function(error){
			console.log(error);
		}
	});
});



$(document).ready(function(){
	$.ajax({
		url: '../ajax/api.php?accion=cargarPaises',
		dataType: 'json',
		success:function(respuesta){
			var contenido = '';
			contenido += '<select class="form-control inputs" id="slc-paises">';
					for(var i = 0; i<respuesta.length; i++){
					contenido += '<option value="'+respuesta[i].CODIGO_LUGAR+'">'+respuesta[i].NOMBRE_LUGAR+'</option>';
					} 
                    contenido += '</select>';

                    console.log(contenido);

            $("#div-paises").html(contenido);
			console.log(respuesta);
         	
		},error: function(error){
			console.log(error);
		}
	});
});


$(document).ready(function(){
	$.ajax({
		url: 'ajax/api.php?accion=cargarPlanes',
		dataType: 'json',
		success:function(respuesta){
			var contenido = '';
			contenido += '<select class="form-control inputs" id="slc-planes">';
					for(var i = 0; i<respuesta.length; i++){
					contenido += '<option value="'+respuesta[i].CODIGO_PLAN+'">'+respuesta[i].NOMBRE_SUSCRIPCION+' / '+respuesta[i].PRECIO+'</option>';
					} 
                    contenido += '</select>';

                    console.log(contenido);

            $("#div-planes").html(contenido);
			console.log(respuesta);
         	
		},error: function(error){
			console.log(error);
		}
	});
});

$(document).ready(function(){
	$.ajax({
		url: 'ajax/api.php?accion=cargarTarjetas',
		dataType: 'json',
		success:function(respuesta){
			var contenido = '';
			contenido += '<select class="form-control inputs" id="slc-tarjetas">';
					for(var i = 0; i<respuesta.length; i++){
					contenido += '<option value="'+respuesta[i].CODIGO_MARCA_TARJETA+'">'+respuesta[i].NOMBRE_MARCA_TARJETA+'</option>';
					} 
                    contenido += '</select>';

                    console.log(contenido);

            $("#div-tarjetas").html(contenido);
			console.log(respuesta);
         	
		},error: function(error){
			console.log(error);
		}
	});
});

$(document).ready(function(){
	$.ajax({
		url: 'ajax/api.php?accion=cargarTiposTarjetas',
		dataType: 'json',
		success:function(respuesta){
			var contenido = '';
			contenido += '<select class="form-control inputs" id="slc-tipos-tarjetas">';
					for(var i = 0; i<respuesta.length; i++){
					contenido += '<option value="'+respuesta[i].CODIGO_TIPO_TARJETA+'">'+respuesta[i].TIPO_TAREJTA+'</option>';
					} 
                    contenido += '</select>';

                    console.log(contenido);

            $("#div-tipo-tarjetas").html(contenido);
			console.log(respuesta);
         	
		},error: function(error){
			console.log(error);
		}
	});
});

$(document).ready(function(){
	$.ajax({
		url: 'ajax/api.php?accion=cargarTiposDePago',
		dataType: 'json',
		success:function(respuesta){
			var contenido = '';
			contenido += '<select class="form-control inputs" id="slc-tipos-pago">';
					for(var i = 0; i<respuesta.length; i++){
					contenido += '<option value="'+respuesta[i].CODIGO_METODO_PAGO+'">'+respuesta[i].NOMBRE_METODO_PAGO+'</option>';
					} 
                    contenido += '</select>';

                    console.log(contenido);

            $("#div-tipos-pagos").html(contenido);
			console.log(respuesta);
         	
		},error: function(error){
			console.log(error);
		}
	});
});

function suscribirse(codigoUsuario){
	var parametros = "codigoUsuario="+codigoUsuario+"&"+
					 "codigoTarjeta="+$('#slc-tarjetas').find('option:selected').val()+"&"+
					 "codigoTipoTarjeta="+$('#slc-tipos-tarjetas').find('option:selected').val()+"&"+
					 "codigoMeotodoPago="+$('#slc-tipos-pago').find('option:selected').val()+"&"+
					 "numeroTarjeta="+$('#txt-numero-tarjeta').val()+"&"+
					 "csv="+$('#txt-csv').val();
	$.ajax({
		url: 'ajax/api.php?accion=suscribirse',
		data:parametros,
		method:'POST',
		dataType: 'json',
		success:function(respuesta){
			if (respuesta) {
				alert("Suscripcion realizada");
			}else{
				alert("hay un error");
			}

		}, error: function(error){
			console.log(error);
		}
	});

}

function verDestacado(codigoUsuario){
	var parametros = "codigoUsuario="+codigoUsuario;

	$.ajax({
		url: 'ajax/api.php?accion=verDestacado',
		data: parametros,
		method: 'POST',
		dataType: 'json',
		success: function(respuesta){
			var contenido = '';
			var x;
			var imagen;

			for (var i = 0; i < respuesta.length; i++) {
				contenido += '<div class="row">';
				x = respuesta[i].CODIGO_TIPO_ARCHIVO;
				for (var j = 0; j < 4; j++) {
					switch(x){
						case 1:
						imagen = '../imagenes/word.jpg';
						break;

						case 2:
						imagen = '../imagenes/pdf.jpg';
						break;

						case 3:
						imagen = '../imagenes/ecxel.jpg';
						break;

						case 4:
						imagen = '../imagenes/imagen.png';
						break;
					}
					contenido += '<div class="col-3">'+
				                  '<img src="'+imagen+'" width="80" height="80">'+
				                  '<p>'+respuesta[i].NOMBRE+'</p>'+
				                  '<a class="inputs" onclick="(agregarComentario('+codigoUsuario+','+respuesta[i].CODIGO_ARCHIVO+'))">Agregar Comentario</a>'+
				                '</div>';
				}

				contenido+= '</div>';
			}

			$("#div-contenido").html(contenido);
			console.log(respuesta);
                
		}, error: function(error){
		
		}
	});
}

function verArchivos(codigoUsuario){
	var parametros = "codigoUsuario="+codigoUsuario;

	$.ajax({
		url: 'ajax/api.php?accion=verArchivos',
		data: parametros,
		method: 'POST',
		dataType: 'json',
		success: function(respuesta){
			console.log(respuesta);
		}, error: function(error){
			console.log(error);
		}

	});
}

