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
/*
Route::get('/', function () {
    return view('index');
});
*/
Route::get('/',['as' => 'index',  function(){return view('index'); }] );

 


Route::post('logino', 'LoginController@loginOperador')->name('loginoperador');

Route::post('logina', 'AdminController@loginAdministrador')->name('loginadministrador');
Route::post('logout', 'LoginController@logout')->name('logout');
Route::post('registrar', 'LoginController@registrar')->name('registrar');


Route::get('/indexoperador', 'MenuController@indexOperador')->middleware('auth:operador');
Route::get('/indexadministrador', 'MenuController@indexAdministrador')->middleware('auth');


Route::resource('tiposdeturnos','TiposDeTurnosController')->middleware('auth');
Route::resource('administracionoperador','OperadorGestionController')->middleware('auth');
//Route::get('administracionoperador','OperadorController@index')->middleware('auth');

Route::resource('documentos','DocumentoController')->middleware('auth');
Route::get('descargadocumentos/{id}','DocumentoController@descargar')->name('descargadocumentos')->middleware('auth');



Route::resource('generarturnos','TurnosController')->middleware('auth');
Route::get('revisarturnos', 'TurnosController@turnospresentes')->middleware('auth');