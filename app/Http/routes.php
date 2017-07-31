<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('auth/login');
});

Route::auth();

#GRUPO DE RUTAS PARA EL ROLE ADMINISTRADOR
Route::group(['middleware'=>['auth','administrador'],'prefix'=>'administrador'], function(){
	Route::get('/', function () {
    return view('homes.administrador');
	});
	Route::resource('administrador/curso', 'CursoController');
	Route::resource('administrador/persona', 'AdminPersonaController');
	Route::resource('administrador/pabellon', 'AdminPabellonController');
	Route::resource('administrador/ambiente', 'AdminAmbienteController');
	Route::resource('administrador/padre', 'AdminPadreController');
	Route::resource('administrador/alumno', 'AdminAlumnoController');
});

#GRUPO DE RUTAS PARA ROLE PROFESOR
Route::group(['middleware'=>['auth','profesor'],'prefix'=>'profesor'], function(){
	Route::get('/', function () {
    return view('homes.profesor');
	});	
});

#GRUPO DE RUTAS PARA EL ROLE ALUMNO
Route::group(['middleware'=>['auth','alumno'],'prefix'=>'alumno'], function(){
	Route::get('/', function () {
    return view('homes.alumno');
	});
});

#GRUPO DE RUTAS PARA EL ROLE PADRE
Route::group(['middleware'=>['auth','padre'],'prefix'=>'padre'], function(){
	Route::get('/', function () {
    return view('homes.padre');
	});
});
