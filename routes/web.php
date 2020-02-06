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
    return redirect(route('user-documents'));
});
Route::resource('users', 'admin\UserController');
Route::resource('categories', 'admin\CategoryController');
Route::resource('documents', 'admin\DocumentsController');

Route::get('register-user','admin\UserController@registerUser')->name('register-user');
Route::get('profile-user','admin\UserController@profileUser')->name('profile-user');

Route::get('/user', function () {
    return view('user.base.base');
})->name('user');

Route::middleware('auth')->group(function () {
    Route::get('download-document/{id}', 'user\DocumentsUserController@downloadDocument')->name('download-document');

});
Route::get('user-documents', 'user\DocumentsUserController@index')->name('user-documents');
Route::get('query-category/{id}', 'user\DocumentsUserController@queryCategory')->name('query-category');

Route::get('show-category/{id}', 'user\DocumentsUserController@show')->name('show-category');


///rutas usuarios
Route::post('resgiter-user', 'admin\UserController@RegisterNewUser')->name('resgiter-user');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
