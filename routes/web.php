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

 Route::resource('turnosoperador','TurnosControllerOperador')->middleware('auth:operador');
Route::post('buscarturnosoperador', 'TurnosControllerOperador@buscarturnos')->name('buscarturnosoperador')->middleware('auth:operador');
Route::get('imprimirturnos', 'TurnosControllerOperador@imprimirturnos')->name('imprimirturnos')->middleware('auth:operador');





Route::resource('administracionoperador','OperadorGestionController')->middleware('auth');



//Route::get('administracionoperador','OperadorController@index')->middleware('auth');

Route::resource('documentos','DocumentoController')->middleware('auth');
Route::get('descargadocumentos/{id}','DocumentoController@descargar')->name('descargadocumentos')->middleware('auth');
Route::get('eliminardocumentos/{id}','DocumentoController@eliminarArchivo')->name('eliminardocumentos')->middleware('auth');


Route::resource('documentosoperador','DocumentoControllerOperador')->middleware('auth:operador');
Route::get('descargadocumentoso/{id}','DocumentoControllerOperador@descargar')->name('descargadocumentoso')->middleware('auth:operador');





Route::resource('generarturnos','TurnosController')->middleware('auth');
Route::get('revisarturnos', 'TurnosController@turnospresentes')->middleware('auth');
Route::post('buscarturnos', 'TurnosController@buscarturnos')->name('buscarturnos')->middleware('auth');




 

Route::get('perfil', 'PerfilController@index')->name('perfil')->middleware('auth');
Route::get('perfiloperador', 'PerfilController@indexOperadorPerfil')->name('perfiloperador')->middleware('auth:operador');



//Route::get('updateperfil', 'PerfilController@update')->middleware('auth');
Route::post('updateperfil/{id}','PerfilController@update')->name('updateperfil')->middleware('auth');

//Route::get('notificacionadmin', 'MailTurnosNotificacionController@notificarAdministrador')->name('notificacionadmin')->middleware('auth');

//Route::get('notificacionoperador', 'MailTurnosNotificacionController@notificarOperadorTurnos')->name('notificacionoperador')->middleware('auth:operador');


Route::get('sendemail', function () {

    $data = array(
        'name' => "Curso Laravel",
    );

    Mail::send('testmail', $data, function ($message) {

        $message->from('adturnmail@gmail.com', 'Curso Laravel');

        $message->to('adturnmail@gmail.com')->subject('test email Curso Laravel');

    });

    return "Tú email ha sido enviado correctamente";

});

Route::get('notificacionadmin', 'MailTurnosNotificacionController@notificarAdministrador')->name('notificacionadmin')->middleware('auth');

Route::get('notificacionoperador', 'MailTurnosNotificacionController@notificarOperadorTurnos')->name('notificacionoperador');


 