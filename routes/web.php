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
Route::resource('admin', 'AdminController');

Route::group(['prefix' => 'auth'], function () {
    Route::get('/{provider}', 'Auth\LoginGoogle@redirectToProvider');
    Route::get('/{provider}/callback', 'Auth\LoginGoogle@handleProviderCallback');

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
Route::get('/api/datadocente', 'CursoController@GetDataDocente');


Route::get('alumno', function(){
	return view('alumno');
})->name('alumno');

Route::get('/api/getalumno', 'AlumnoController@GetDataAlumno');
Route::post('/api/alumno', 'AlumnoController@PostAlumno');
Route::delete('/api/alumno/{id}', 'AlumnoController@DeleteAlumno');
Route::put('/api/alumno', 'AlumnoController@UpdateAlumno');


Route::get('inscripcion', function(){
	return view('inscripcion');
})->name('inscripcion');

Route::get('/api/getinscripcion', 'InscripcionController@GetDataInscripcion');
Route::post('/api/inscripcion', 'InscripcionController@PostInscripcion');
Route::delete('/api/inscripcion/{id}', 'InscripcionController@DeleteInscripcion');
Route::put('/api/inscripcion', 'InscripcionController@UpdateInscripcion');

Route::get('/alumnos/listar', 'InscripcionController@Alumnos');
Route::get('/docentes/listar', 'InscripcionController@Docentes');


Route::get('pagos', function(){
	return view('pagos');
})->name('pagos');

Route::get('/api/getpagos', 'PagosController@GetDataPagos');
Route::post('/api/pagos', 'PagosController@PostPagos');
Route::delete('/api/pagos/{id}', 'PagosController@DeletePagos');
Route::put('/api/pagos', 'PagosController@UpdatePagos');

Route::get('/alumnos/listar', 'PagosController@GetDataAlumnos');
Route::get('/cursos/listar', 'PagosController@GetDataCursos');
Route::get('/api/preciocurso/{id}', 'PagosController@CostoCurso');



Route::get('pagosalumno', function(){
	return view('pagosalumno');
})->name('pagosalumno');

Route::get('/api/getpagosalumno', 'PagosController@GetDataPagosAlumno');