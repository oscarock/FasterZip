$(document).ready(function() {
	var form = $('#form1').submit(function() {
		$.ajax({
			type:'post',
			cache:false,
			dataType:'json',
			url:form.attr('action'),
			data:$('#form1').serialize(),
			beforeSend:function(){
				$('#load').show();
			},
			success:function(data){
				$('#load').hide();
				$('.errores').html("");
				if(data.estado == false){
					var errores = "";
					for(datos in data.errores){
						errores += "<p class='text-danger'>" + data.errores[datos] + "</p>"; 
					}
					$(form)[0].reset();
					$('.errors').html(errores);
				}else{
					$('.errors').show().html("<div class='alert alert-success'>" + data.mensaje + "</div>");
				}
			},
		});
		return false;
	});	
});	