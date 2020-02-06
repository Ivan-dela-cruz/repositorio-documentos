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


Route::resource('users', 'admin\UserController');




///<<<<<=====================GRUPO DE RUTAS PARA USUARIOS UTENTICADOS=====>>>>>
Route::middleware('auth')->group(function () {
    Route::get('download-document/{id}', 'user\DocumentsUserController@downloadDocument')->name('download-document');
    Route::resource('documents', 'admin\DocumentsController');
    Route::get('edit-profile','admin\UserController@editUser')->name('edit-profile');
    Route::get('profile-user','admin\UserController@profileUser')->name('profile-user');


});



//rutas privadas para administradores
Route::group(['middleware' => ['role:admin']], function () {
    Route::resource('categories', 'admin\CategoryController');
});

//rutas privadas para usuarios
Route::group(['middleware' => ['role:user']], function () {

});


//<<<=================================RUTAS PUBLICAS ===========================================>>>>>>>>>>>>>>>>
//rutas para listas todas los articulos
Route::get('user-documents', 'user\DocumentsUserController@index')->name('user-documents');
//rutas filtar categoria
Route::get('query-category/{id}', 'user\DocumentsUserController@queryCategory')->name('query-category');
//rutar ver por categoria
Route::get('show-category/{id}', 'user\DocumentsUserController@show')->name('show-category');
///ruta para registrar usuarios
Route::post('resgiter-user', 'admin\UserController@RegisterNewUser')->name('resgiter-user');
Route::get('register-user','admin\UserController@registerUser')->name('register-user');

//ruta inicio
Route::get('/home', function (){return redirect()->route('/');})->name('home');
Route::get('/', function () {return redirect(route('user-documents'));});
Auth::routes();

