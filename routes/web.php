<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'auth'], function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

    Route::get('/{provider}', 'Auth\AuthFacebook@redirectToProvider');
	Route::get('/{provider}/callback', 'Auth\AuthFacebook@handleProviderCallback');
});


Route::get('docente', function(){
	return view('docente');
})->name('docente');

Route::get('/api/getdocente', 'DocenteController@GetDataDocente');
Route::post('/api/docente', 'DocenteController@PostDocente');
Route::delete('/api/docente', 'DocenteController@DeleteDocente');
Route::put('/api/docente', 'DocenteController@UpdateDocente');
