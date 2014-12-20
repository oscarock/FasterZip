<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Inicio</title>
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/LoginAjax.js') }}
</head>
<body>
	{{ Form::open(array('url' => 'login', 'id' => 'form1')) }}
		<div class="errors"></div>
		<span id="load" style="display:none"><img src="{{ asset('img/cargando.gif') }}" alt="">Cargando...</span>
		@if (Session::has('login_errors'))
            <p>El nombre de  Usuario o Contraseña son Incorrectos</p>
        @else
            <p>Introduzca Usuario y Contraseña para continuar</p>      
        @endif
		<input type="text" name="nombre_usu" placeholder="Usuario"><br>
		<input type="password" name="password" placeholder="Password"><br>
		<input type="submit" name="btnIngresar" value="Ingresar">
		<p>{{ $errors->first('nombre_usu') }}</p>
		<p>{{ $errors->first('clave_usu') }}</p>
	{{ Form::close() }}
</body>
</html>	