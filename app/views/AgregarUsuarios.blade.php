<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro Usuarios</title>
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/RegistrarAjax.js') }}
</head>
<body>
	<form action="AgregarUsuario" method="post" id="form1">
		<div class="errors"></div>
		<span id="load" style="display:none"><img src="{{ asset('img/cargando.gif') }}" alt="">Cargando...</span>
		<input type="text" name="nombre_usu" placeholder="Usuario"><br>
		<p>{{ $errors->first('nombre_usu') }}</p>
		<input type="text" name="nombrecompleto" placeholder="Nombre"><br>
		<p>{{ $errors->first('nombrecompleto') }}</p>
		<input type="password" name="password" placeholder="Password"><br>
		<p>{{ $errors->first('clave_usu') }}</p>
		<label for="">Perfil</label>
		<select name="id_perfil" id="">
			<option value="">--Seleccionar--</option>
			<option value="1">Labalta</option>
			<option value="2">Gerencia</option>
			<option value="3">Produccion</option>
			<option value="4">Almacen</option>
			<option value="5">PruebasElect</option>
			<option value="6">Potencia</option>
			<option value="7">Ventas</option>
			<option value="8">Labaceite</option>
		</select><br>
		<p>{{ $errors->first('id_perfil') }}</p>
		<?php $status = Session::get('status'); ?>
	@if ($status == 'ok_create')
        <p>Usuario Registrado</p>
     @endif
     <input type="submit" name="btnEnviar" id="btnEnviar" value="Enviar">
	</form>
</body>
</html>
