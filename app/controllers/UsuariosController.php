<?php

class UsuariosController extends BaseController{

	public function Registrar(){

		$reglas = array(
			'nombre_usu' => 'required',
			'nombrecompleto' => 'required',
			'password' => 'required',
			'id_perfil' => 'required',
		);

		$mensajes = array(
			'required' => 'El campo :attribute es Obligartorio',
		);

		$validar = Validator::make(Input::all(),$reglas,$mensajes);

		if($validar->fails()){
			//return Redirect::to('RegistrarUsuario')->withErrors($validar);
			return Response::json(array(
				'estado' => false, //si la peticon falla es false
				'errores' => $validar->getMessageBag()->toArray() //me devuelve un array de la validacion en formato json
			));
		}

		$usuarios = new Usuarios;
		$password = Input::get('password');
		$usuarios->nombre_usu = Input::get('nombre_usu');
		$usuarios->nombrecompleto = Input::get('nombrecompleto');
		$usuarios->password = Hash::make($password);
		$usuarios->id_perfil = Input::get('id_perfil');
		
		$usuarios->save();

		return Response::json(array(
			'estado' => true,
			'mensaje' => 'Usuario Registrado'
		));
	}

	public function Login(){

		$reglas = array(
			'nombre_usu' => 'required',
			'password' => 'required',
		);

		$mensaje = array(
			'required' => 'El campo :attribute es Obligartorio',
		);

		$validar = Validator::make(Input::all(),$reglas,$mensaje);

		if($validar->fails()){
			return Response::json(array(
				'estado' => false, //si la peticon falla es false
				'errores' => $validar->getMessageBag()->toArray() //me devuelve un array de la validacion en formato json
			));
		}else{
			$acceso = array(
				'nombre_usu' => Input::get('nombre_usu'),
				'password' => Input::get('password'),
			);	

			if(Auth::attempt($acceso)){
				return Response::json(array(
					'estado' => true,
					'mensaje' => 'Usuario logeado Correctamente'
				));
			}else{
				$msg = array('Usuario Incorrecto');
				return Response::json(array(
					'estado' => false,
					'errores' => $msg
				));
			}	
		}

		
	}
}