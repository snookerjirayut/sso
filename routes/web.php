<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group( [], function () {
	
	Route::get('/', [
		'uses' => 'SsoController@index' ,
		'as' => 'sso.index',
		'middleware' =>  ['sso.login'],
	]);

	Route::post('/', [
		'uses' => 'SsoController@store' ,
		'as' => 'sso.store',
		'middleware' =>  ['web' , 'sso.login'],
	]);

	
});

Route::get('/logout', [
	'uses' => 'SsoController@delete' ,
	'as' => 'sso.delete',
	'middleware' => ['sso.logout'],
]);