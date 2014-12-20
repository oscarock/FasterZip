$(document).ready(function() {
	var form = $('#form1').submit(function() {
		$.ajax({
			type:'post',
			cache:false,
			dataType:'json',
			url:form.attr('action'),
			data:$('#form1').serialize(),
			beforeSend:function (){
				$('#load').show();
			},
			success:function(data){
				$('#load').hide();
				$('.errores').html("");
				if(data.estado == false){
					var errores = "";
					for(datos in data.errores){
						errores += "<p>" + data.errores[datos] + "</p>";
					}
					$(form)[0].reset();
					$('.errors').html(errores);
				}else{
					$('.errors').show().html("<p> " + data.mensaje + "</p>");
					window.location = 'Administracion';
				}
			},
		});
		return false;
	});	
});