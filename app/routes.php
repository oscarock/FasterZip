<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('login');
});

Route::get('RegistrarUsuario', function(){

	return View::make('AgregarUsuarios');
});
/*
Route::get('Administracion', function(){
	return View::make('panelAdministracion');
});
*/
Route::get('Administracion',function(){
	return View::make('panelAdministracion');
});

Route::get('logout', function(){
	Auth::logout();
	return Redirect::to('/');
});

Route::post('AgregarUsuario','UsuariosController@Registrar');
Route::post('login', 'UsuariosController@Login');
