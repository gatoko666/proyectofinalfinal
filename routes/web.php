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

Route::post('/changePassword','PerfilController@changePassword')->name('changePassword');

Route::post('/changePasswordOp','PerfilController@changePasswordOp')->name('changePasswordOp')->middleware('auth:operador');



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


Route::post('/editarTurno','TurnosController@editarTurnos')->name('editarTurno');

Route::post('/actualizarTurno','TurnosController@actualizarTurnos')->name('actualizarturno');


 


Route::get('solicitud', 'SolicitudController@index')->name('solicitud')->middleware('auth:operador');
Route::post('/realizarSolicitud', 'SolicitudController@realizarSolicitud')->name('realizarsolicitud')->middleware('auth:operador');

Route::get('revisarsolicitud', 'SolicitudController@revisarSolicitud')->name('revisarsolicitud')->middleware('auth:operador');

Route::get('revisarsolicitudadmin', 'SolicitudControllerAdmin@revisarSolicitudAdmin')->name('revisarsolicitudadmin')->middleware('auth');

Route::post('aprobarsolicitud', 'SolicitudControllerAdmin@aprobarSolicitud')->name('aprobarsolicitud')->middleware('auth');

Route::post('rechazarsolicitud', 'SolicitudControllerAdmin@rechazarSolicitud')->name('rechazarsolicitud')->middleware('auth');


 
// Password Reset Routes...
//Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('olvidomail');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//Route::post('password/reset', 'Auth\ResetPasswordController@reset');


Route::get('password-reset', 'PasswordController@showForm'); //I did not create this controller. it simply displays a view with a form to take the email
Route::post('password-reset', 'PasswordControllerOp@sendPasswordResetToken')->name('olvidomailop');
Route::get('reset-password/{token}', 'PasswordControllerOp@showPasswordResetForm');
Route::post('reset-password/{token}', 'PasswordControllerOp@resetPassword')->name('password.update');

