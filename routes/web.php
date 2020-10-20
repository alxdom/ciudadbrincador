<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\ParkPermisos\Models\Role;
use App\ParkPermisos\Models\Permission;
use Illuminate\Support\Facades\Gate;

Auth::routes();
Route::get('/', function () {return view('welcome');});
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/panelAdmin', 'HomeController@panelAdmin')->name('panel')->middleware('auth');
Route::get('eventos/create', 'EventoController@create');




Route::resource('controlAcceso', 	'controlAccesoController')	->middleware('auth')->names('accesos');
Route::get('/asignar', 'controlAccesoController@asignar')->name('accesos.asignar');
Route::post('/asignar', 'controlAccesoController@asignarStore')->name('accesos.asignarStore');



Route::get('/sala', 'controlAccesoController@morros');
Route::resource('evento', 			'EventoController')			->middleware('auth');
Route::resource('role', 			'RoleController')			->names('roles')->middleware('auth');
Route::resource('user', 			'UserController')			->names('user')->middleware('auth');

Route::get('/fetch','controlAccesoController@fetch')->name('accesos.fetch');



//ruta para limnpiar la caché de la app
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    return 'DONE';
});

Route::group(['middleware' => 'auth'], function () {
		Route::get('icons', ['as' => 'pages.icons', 'uses' => 'PageController@icons']);
		Route::get('maps', ['as' => 'pages.maps', 'uses' => 'PageController@maps']);
		Route::get('notifications', ['as' => 'pages.notifications', 'uses' => 'PageController@notifications']);
		Route::get('rtl', ['as' => 'pages.rtl', 'uses' => 'PageController@rtl']);
		Route::get('tables', ['as' => 'pages.tables', 'uses' => 'PageController@tables']);
		Route::get('typography', ['as' => 'pages.typography', 'uses' => 'PageController@typography']);
		Route::get('upgrade', ['as' => 'pages.upgrade', 'uses' => 'PageController@upgrade']);
});

Route::group(['middleware' => 'auth'], function () {
	
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});

