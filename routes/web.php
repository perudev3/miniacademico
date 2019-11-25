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
Route::delete('/api/docente/{id}', 'DocenteController@DeleteDocente');
Route::put('/api/docente', 'DocenteController@UpdateDocente');


Route::get('curso', function(){
	return view('curso');
})->name('curso');

Route::get('/api/getcurso', 'CursoController@GetDataCurso');
Route::post('/api/curso', 'CursoController@PostCurso');
Route::delete('/api/curso/{id}', 'CursoController@DeleteCurso');
Route::put('/api/curso', 'CursoController@UpdateCurso');


Route::get('alumno', function(){
	return view('alumno');
})->name('alumno');

Route::get('/api/getalumno', 'AlumnoController@GetDataAlumno');
Route::post('/api/alumno', 'AlumnoController@PostAlumno');
Route::delete('/api/alumno/{id}', 'AlumnoController@DeleteAlumno');
Route::put('/api/alumno', 'AlumnoController@UpdateAlumno');