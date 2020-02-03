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
    return redirect(route('login'));
});
Route::resource('users', 'admin\UserController');
Route::resource('categories', 'admin\CategoryController');
Route::resource('documents', 'admin\DocumentsController');
Route::get('/user', function () {
    return view('user.base.base');
})->name('user');
Route::resource('user-documents', 'user\DocumentsUserController');
Route::get('query-category/{id}','user\DocumentsUserController@queryCategory')->name('query-category');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
