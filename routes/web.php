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

 


Route::post('logino', 'OperadorController@loginOperador')->name('loginoperador');
Route::post('logina', 'AdminController@loginAdministrador')->name('loginadministrador');
Route::get('logout', 'LoginController@logout')->name('logout');
Route::post('registrar', 'LoginController@registrar')->name('registrar');


Route::get('/indexoperador', 'MenuController@indexOperador')->middleware('auth');
Route::get('/indexadministrador', 'MenuController@indexAdministrador')->middleware('auth');





 