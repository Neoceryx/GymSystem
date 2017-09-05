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
//dd(env('APP_VERSION'));

Route::get('/','\HomeController@home');

Route::get('testing/nuevo',function(){ 
	return 'hola mundo de nuevo';
});

Route::get('usuarios/{nombre?}',function($nombre='roro'){ 
	return $nombre;
})->where('nombre', '[a-zA-Z]+' ) ; ;

/*
Route::get('/', function () {
    return view('welcome');
});*/
