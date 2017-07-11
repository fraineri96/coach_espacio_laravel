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
    return view('/static/home');
});

Route::get('/contact', function () {
    return view('/static/contact');
});

Route::get('/faq', function () {
    return view('/static/faq');
});

Route::get('/tienda', function () {
    return view('/static/tienda');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/recuperar', function(){
	return view('/password/user');
});


/*Productos*/
Route::get('productos/', 'ProductController@index');
Route::get('categoria/{cat}', 'ProductController@category');
Route::get('producto/{id}', 'ProductController@show');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
	